import React from 'react';
import '../styles/ContactsInfo.styl';
import {
  formatRusPhoneNumber,
  formatRusPhoneNumberForCall,
} from '../../../utils/formatters';
import Cart from '../../cart/utils/Cart';
import metrics from '../../../config/metrics';

export default ({ phoneForCall, phoneForWhatsApp, email, schedule }) => (
  <div className="contacts-info">
    <h3>Контакты</h3>
    {phoneForWhatsApp &&
    <div className="form-group">
      <label htmlFor="phone-for-whats-app">
        WhatsApp (Предварительный заказ)
      </label>
      <a
        target="_blank"
        className="phone-for-whats-app"
        href={`https://wa.me/${phoneForWhatsApp}`}
        rel="noopener noreferrer"
        onClick={Cart.submitCartWhatsApp}
      >
        <i className="fab fa-whatsapp"/>
        {formatRusPhoneNumber(phoneForWhatsApp)}
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
    {schedule &&
    <div className="form-group schedule">
      <label htmlFor="email">Режим работы:</label>
      {schedule.time && <div className="schedule-time">{schedule.time}</div>}
      {schedule.breaks && <div>{schedule.breaks}</div>}
      {schedule.daysOff && <div>{schedule.daysOff}</div>}
    </div>}
  </div>
);
