import React from 'react';
import ReactDOM from 'react-dom';
import { applyMiddleware, combineReducers, createStore } from 'redux';
import { Provider } from 'react-redux';
import thunk from 'redux-thunk';
import App from './modules/app/components/App';
import { storeInfo } from './modules/app/reducers/storeInfoReducers';

const rootReducer = combineReducers({
                                      storeInfo,
                                    });

const store = createStore(
  rootReducer,
  applyMiddleware(...[thunk]),
);

console.error({ store });

const modules = () => {
  if (document.getElementById('root')) {
    ReactDOM.render(
      <Provider store={store}>
        <App/>
      </Provider>,
      document.getElementById('root'));
  }
};

export default modules;
export { store };
