import React, { useState } from 'react';
import Cart from '../../cart/utils/Cart';
import { roundToTwoDigits } from '../../../utils/formatters';

export default ({ id, amountStep, minAmount }) => {
  const [amount, setAmount] = useState(0);
  const onDecAmount = () => {
    if (amount - amountStep < minAmount) return;
    setAmount(roundToTwoDigits(amount - amountStep));
  };
  const onIncAmount = () => {
    let newAmount = roundToTwoDigits(amount + amountStep);
    if (newAmount < minAmount) {
      newAmount = minAmount;
    }
    setAmount(newAmount);
  };
  const onAddProduct = () => {
    if (!amount) return;
    Cart.addProduct({ id, amount });
    setAmount(0);
  };
  return (
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
            className="form-control text-center"
            aria-label="Количество"
            step={amountStep}
            min={minAmount || 0}
            value={amount || ''}
            onChange={({ target }) => setAmount(roundToTwoDigits(target.value))}
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
      <div className="order">
        <button
          title="Добавить к заказу"
          className="btn btn-primary"
          onClick={onAddProduct}
        >
          <i className="fas fa-shopping-basket"/>
        </button>
      </div>
    </div>
  );
};
