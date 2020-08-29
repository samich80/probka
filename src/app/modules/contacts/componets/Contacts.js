import React from 'react';
import Map from './Map';
import ContactsInfo from './ContactsInfo';

export default (props) => (
  <div className="row">
    <div className="col-sm-5 col-xs-12">
      <Map {...props}/>
    </div>
    <div className="col-sm-7 col-xs-12">
      <ContactsInfo {...props}/>
    </div>
  </div>
);
