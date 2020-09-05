import React from 'react';
import '../styles/ContactsInfo.styl';
import {
  formatRusPhoneNumber,
  formatRusPhoneNumberForCall,
} from '../../../utils/formatters';
import Cart from '../../cart/utils/Cart';
import metrics from '../../../config/metrics';

export default ({ phoneForCall, phoneForWhatsapp, email, workTime, workBreaks, workDaysOff }) => (
  <div className="contacts-info">
    <h3>Контакты</h3>
    {phoneForWhatsapp &&
    <div className="form-group">
      <label htmlFor="phone-for-whats-app">
        WhatsApp (Предварительный заказ)
      </label>
      <a
        target="_blank"
        className="phone-for-whats-app"
        href={`https://wa.me/${phoneForWhatsapp}`}
        rel="noopener noreferrer"
        onClick={Cart.submitCartWhatsApp}
      >
        <i className="fab fa-whatsapp"/>
        {formatRusPhoneNumber(phoneForWhatsapp)}
      </a>
    </div>}
    {phoneForCall &&
    <div className="form-group">
      <label htmlFor="phone-for-call">Телефон</label>
      <a
        id="phone-for-call"
        href={`tel:${formatRusPhoneNumberForCall(phoneForCall)}`}
        onClick={ym(metrics.yandexId, 'reachGoal', 'clickPhone')}
      >
        <i className="fas fa-mobile-alt"/>
        {formatRusPhoneNumber(phoneForCall)}
      </a>
    </div>}
    {email &&
    <div className="form-group">
      <label htmlFor="email">Почта для отзывов и предложений</label>
      <a id="email" href={`mailto:${email}`}>
        <i className="far fa-envelope"/>
        {email}
      </a>
    </div>}
    {(workTime || workBreaks || workDaysOff) &&
    <div className="form-group schedule">
      <label htmlFor="email">Режим работы:</label>
      {workTime && <div className="schedule-time">{workTime}</div>}
      {workBreaks && <div>{workBreaks}</div>}
      {workDaysOff && <div>{workDaysOff}</div>}
    </div>}
  </div>
);
