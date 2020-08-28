import React from 'react';
import '../styles/Header.styl';
import {
  formatRusPhoneNumber,
  formatRusPhoneNumberForCall,
} from '../../../utils/formatters';

export default ({ phoneForCall, phoneForWhatsApp }) => (
  <header className="container-fluid">
    <div className="row">
      <div className="container">
        <div className="row">
          <div className="col-md-6 col-sm-12 logo">
            <a href="/">
              <h1>#PROBKA</h1>
              <h2>Магазин пивных радостей</h2>
            </a>
          </div>
          <div className="col-md-6 col-sm-12 info">
            <div>
              <div className="phone">
                <a href={`tel:${formatRusPhoneNumberForCall(phoneForCall)}`}>
                  {formatRusPhoneNumber(phoneForCall)}
                </a>
              </div>
              <div className="cart">
                <a
                  target="_blank"
                  id="phone-for-whats-app"
                  href={`https://wa.me/${phoneForWhatsApp}`}
                  rel="noopener noreferrer"
                >
                  <i className="fab fa-whatsapp"/>
                  Предварительный заказ
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
);