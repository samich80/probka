import React from 'react';
import Product from './Product';
import '../styles/ProductList.styl';
import '../styles/Product.styl';

export default ({ title, list }) => (
  <div className="product-list">
    <h3>{title}</h3>
    <table className="table table-striped table-hover table-sm table-adaptive">
      <thead className="thead-dark">
        <tr>
          <th scope="col" width="10%">#</th>
          <th scope="col" width="35%">Товар</th>
          <th scope="col" width="20%">Цена</th>
          <th scope="col" width="35%" className="text-center">Заказать</th>
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
