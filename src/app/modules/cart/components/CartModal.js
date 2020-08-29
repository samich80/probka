import React, { useState } from 'react';
import '../styles/CartModal.styl';
import CartProductList from './CartProductList';
import Cart from '../utils/Cart';

export default ({ phoneForWhatsApp }) => {
  const [cart, setCart] = useState([...Cart.getCart()]);
  const [isOpen, setIsOpen] = useState(false);
  window.addEventListener('cartUpdate', () => {
    setCart([...Cart.getCart()]);
  });
  window.addEventListener('openModalCart', () => setIsOpen(true));
  return (
    <div className={`cart-modal ${isOpen ? '' : 'hidden'}`}>
      <h4 className="text-center">
        Корзина
        <button onClick={() => setIsOpen(false)} title="Закрыть">
          <i className="fas fa-times"/>
        </button>
      </h4>
      <div className="cart-product-list">
        <table className="table table-striped table-hover table-sm table-adaptive">
          <thead className="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Товар</th>
              <th scope="col">Цена</th>
              <th scope="col">Количество</th>
              <th scope="col">&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            <CartProductList list={cart}/>
          </tbody>
          <tfoot>
            <tr>
              <td colSpan={3} className="text-right">
                Предварительная сумма заказа:
              </td>
              <td colSpan={2}>
                <b>{Cart.getTotalSum()} руб.</b>
              </td>
            </tr>
          </tfoot>
        </table>
      </div>
      <div className="order">
        <a
          target="_blank"
          className="phone-for-whats-app"
          href={`https://wa.me/${phoneForWhatsApp}`}
          rel="noopener noreferrer"
          onClick={Cart.submitCartWhatsApp}
        >
          <i className="fab fa-whatsapp"/>
          Предварительный заказ
        </a>
      </div>
    </div>
  );
};
