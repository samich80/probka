import React from 'react';
import '../styles/ProductList.styl';
import '../styles/Product.styl';
import ProductsList from './ProductsList';

export default ({ products, categories }) => (
  categories
    .filter((category) => products.find((product) => product.categoryId === category.id))
    .map((category) => (
      <ProductsList title={category.title} list={products.filter((product) => product.categoryId === category.id)}/>))
);
