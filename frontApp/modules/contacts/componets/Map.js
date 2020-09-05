import React from 'react';
import '../styles/Maps.styl';

export default ({ mapLink }) => (
  <div className="contacts-map">
    <iframe
      src={mapLink}
      frameBorder="0"
      style={{ border: 0 }}
      allowFullScreen="false"
      aria-hidden="false"
    />
  </div>
);
