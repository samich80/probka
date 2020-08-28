import React from 'react';
import '../styles/ContactsInfo.styl';
import {
  formatRusPhoneNumber,
  formatRusPhoneNumberForCall,
} from '../../../utils/formatters';

export default ({
  phoneForCall = '78002000600',
  phoneForWhatsApp = '78002000600', // !IMPORTANT do not change format
  email = 'propka@probka.com',
}) => (
  <div className="contacts-info">
    <h3>Контакты</h3>
    <div className="form-group">
      <label htmlFor="phone-for-whats-app">
        WhatsApp (Предварительный заказ)
      </label>
      <a
        target="_blank"
        id="phone-for-whats-app"
        href={`https://wa.me/${phoneForWhatsApp}`}
        rel="noopener noreferrer"
      >
        <i className="fab fa-whatsapp"/>
        {formatRusPhoneNumber(phoneForWhatsApp)}
      </a>
    </div>
    <div className="form-group">
      <label htmlFor="phone-for-call">Телефон</label>
      <a id="phone-for-call" href={`tel:${formatRusPhoneNumberForCall(phoneForCall)}`}>
        <i className="fas fa-mobile-alt"/>
        {formatRusPhoneNumber(phoneForCall)}
      </a>
    </div>
    <div className="form-group">
      <label htmlFor="email">Почта для отзывов и предложений</label>
      <a id="email" href={`mailto:${email}`}>
        <i className="far fa-envelope"/>
        {email}
      </a>
    </div>
  </div>
);
