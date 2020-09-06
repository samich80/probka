import axios from 'axios';
import {
  requestStoreInfo,
  receiveStoreInfo,
} from '../actions/storeInfoActions';

const getStoreInfo = () => (dispatch) => {
  dispatch(requestStoreInfo());
  axios
    .get('/api/store/info')
    .then(({ data }) => dispatch(receiveStoreInfo(data)))
    .catch(() => {
      if (confirm('Произошёл сбой в работе сайта. Пожалуйста, перезагрузите страницу через несколько минут.')) {
        location.reload();
      }
    });
};

export {
  getStoreInfo, // eslint-disable-line import/prefer-default-export
};
