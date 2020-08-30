import React, { useState } from 'react';
import '../styles/CartIndicator.styl';
import Cart from '../utils/Cart';

export default () => {
  const [totalCount, setTotalCount] = useState(Cart.getCart().length);
  window.addEventListener('cartUpdate', () => {
    setTotalCount(Cart.getCart().length);
  });
  return (
    <>
      <div className={`cart-indicator ${totalCount ? '' : 'hidden'}`}>
        <button title="Корзина" onClick={() => window.dispatchEvent(new CustomEvent('openModalCart'))}>
          <div className="amount">{totalCount}</div>
          <i className="fas fa-shopping-basket"/>
        </button>
      </div>
    </>
  );
};
