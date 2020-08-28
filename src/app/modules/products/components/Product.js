import React from 'react';

export default ({ index, title, price, measure }) => (
  <tr>
    <th scope="row">{index}</th>
    <td>{title}</td>
    <td>{price} руб. / {measure}</td>
  </tr>
);