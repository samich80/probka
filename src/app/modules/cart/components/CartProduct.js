import React, { useState } from 'react';
import Cart from '../../cart/utils/Cart';
import '../styles/CartProduct.styl';

export default ({ index, title, price, measure, id, amountStep, amount, minAmount }) => {
  const onDecAmount = () => {
    if (amount - amountStep < minAmount) return;
    Cart.updateProduct(id, { amount: amount - amountStep });
  };
  const onIncAmount = () => {
    let newAmount = amount + amountStep;
    if (newAmount < minAmount) {
      newAmount = minAmount;
    }
    Cart.updateProduct(id, { amount: newAmount });
  };
  const onRemoveProduct = () => {
    Cart.removeProduct(id);
  };
  return (
    <tr className="product">
      <th scope="row">{index}</th>
      <td data-column-title="Товар">{title}</td>
      <td data-column-title="Цена">{price} руб. / {measure}</td>
      <td>
        <div className="form">
          <div className="amount">
            <div className="input-group">
              <div className="input-group-prepend">
                <button
                  title="Убрать"
                  className="input-group-text"
                  onClick={onDecAmount}
                >
                  <i className="fas fa-minus"/>
                </button>
              </div>
              <input
                type="number"
                className="form-control"
                aria-label="Количество"
                step={amountStep}
                min={0}
                value={amount || ''}
              />
              <div className="input-group-append">
                <button
                  title="Добавить"
                  className="input-group-text"
                  onClick={onIncAmount}
                >
                  <i className="fas fa-plus"/>
                </button>
              </div>
            </div>
          </div>
        </div>
      </td>
      <td>
        <div className="actions">
          <button
            title="Удалить"
            className="btn btn-primary"
            onClick={onRemoveProduct}
          >
            <i className="far fa-trash-alt"/>
          </button>
        </div>
      </td>
    </tr>
  );
}