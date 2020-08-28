import React from 'react';
import '../styles/Maps.styl';

export default () => (
  <div className="contacts-map">
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d709.09206493233!2d41.81238142372956!3d44.69167993981355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40f8382af5070b0d%3A0x1edfc15af02aa045!2z0YPQuy4g0KLQuNGC0L7QstCwLCA0OSwg0JrQvtGH0YPQsdC10LXQstGB0LrQvtC1LCDQodGC0LDQstGA0L7Qv9C-0LvRjNGB0LrQuNC5INC60YDQsNC5LCAzNTcwMDA!5e0!3m2!1sru!2sru!4v1598629791050!5m2!1sru!2sru"
      frameBorder="0"
      style={{ border: 0 }}
      allowFullScreen="false"
      aria-hidden="false"
    />
  </div>
);
