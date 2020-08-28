import React from 'react';
import Product from './Product';
import '../styles/ProductList.styl';

export default ({ title, list }) => (
  <div className="product-list">
    <h3>{title}</h3>
    <table className="table table-striped table-hover table-sm ">
      <thead className="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Товар</th>
          <th scope="col">Цена</th>
        </tr>
      </thead>
      <tbody>
        {list.map(
          (product, index) => (<Product {...product} index={index + 1}/>))}
      </tbody>
    </table>
    <hr/>
  </div>
);
