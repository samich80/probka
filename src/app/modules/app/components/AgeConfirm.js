import React, { useState } from 'react';
import '../styles/AgeConfirm.styl';

export default () => {
  const [has18, setHas18] = useState(!!localStorage.getItem('has18'));
  if (has18) return null;
  const leaveSite = () => {
    if (window.history?.length > 1) {
      window.history.back();
      return;
    }
    window.close();
    location.href = '//yandex.ru';
  };
  const onConfirm = () => {
    setHas18(true);
    localStorage.setItem('has18', '1');
    window.dispatchEvent(new CustomEvent('setHas18'));
  };
  return (
    <div className="has18-confirm-modal">
      <div className="content">
        <div className="form-group">
          <p>Здравствуйте! Вам исполнилось 18 лет?</p>
          <p>Просмотр сайта запрещен несовершеннолетним лицам.</p>
        </div>
        <div className="form-group">
          <div className="actions">
            <button onClick={leaveSite}>Покинуть сайт</button>
            <button onClick={onConfirm}>Мне есть 18</button>
          </div>
        </div>
      </div>
    </div>
  );
}
