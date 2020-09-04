import React from 'react';
import '../styles/Maps.styl';

export default ({ mapIframeLink }) => (
  <div className="contacts-map">
    <iframe
      src={mapIframeLink}
      frameBorder="0"
      style={{ border: 0 }}
      allowFullScreen="false"
      aria-hidden="false"
    />
  </div>
);
