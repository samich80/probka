const webpack = require('webpack');
const path = require('path');
const {CleanWebpackPlugin} = require('clean-webpack-plugin');
const HardSourceWebpackPlugin = require('hard-source-webpack-plugin');
const HappyPack = require('happypack');

const BUILD_DIR = path.resolve(__dirname, 'public/build');
const APP_DIR = path.resolve(__dirname, 'frontApp');

const config = {
    mode: 'development',
    entry: {
        index: APP_DIR + '/index.js',
    },
    output: {
        path: BUILD_DIR,
        filename: '[name].bundle.js'
    },
    plugins: [
        new CleanWebpackPlugin({
            verbose: true,
        }),
        new webpack.DefinePlugin({
            'process.env.NODE_ENV': JSON.stringify('production')
        }),
        new HardSourceWebpackPlugin(),
        new HappyPack({
            loaders: [
                // Capture Babel loader
                'babel-loader',
            ],
            threads: 16,
        }),
    ],
    module: {
        rules: [
            {
                enforce: 'pre',
                test: /\.(js|jsx)$/,
                exclude: /node_modules/,
                loader: 'eslint-loader',
                options: {
                    configFile: path.join(__dirname, '.eslintrc')
                }
            },
            {
                test: /\.(js|jsx)$/,
                include: APP_DIR,
                use: [{
                    loader: 'happypack/loader',
                    options: {
                        cacheDirectory: true,
                    },
                }, 'cache-loader'],
            },
            {
                test: /\.styl$/,
                use: [
                    'style-loader',
                    {loader: 'css-loader'},
                    'stylus-loader',
                    'cache-loader',
                ],
            },
            {
                test: /\.css$/,
                use: [
                    {loader: "style-loader"},
                    {loader: "css-loader"},
                    'cache-loader',
                ]
            },
            {
                test: /\.(woff(2)?|ttf|eot|svg)(\?v=\d+\.\d+\.\d+)?$/,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            name: '[name].[ext]',
                            outputPath: 'fonts/'
                        }
                    }
                ]
            }
        ]
    },
};

module.exports = config;
