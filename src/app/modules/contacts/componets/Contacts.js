import React from 'react';
import Map from './Map';
import ContactsInfo from './ContactsInfo';

export default () => (
  <div className="row">
    <div className="col-sm-5 col-xs-12">
      <Map/>
    </div>
    <div className="col-sm-7 col-xs-12">
      <ContactsInfo/>
    </div>
  </div>
);
