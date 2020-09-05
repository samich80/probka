import {
  REQUEST_STORE_INFO,
  RECEIVE_STORE_INFO,
} from '../actions/storeInfoActions';

const storeInfo = (state = {}, action) => {
  switch (action.type) {
    case REQUEST_STORE_INFO:
      return {
        ...action.data,
        isLoaded: false,
      };
    case RECEIVE_STORE_INFO:
      return {
        ...action.data,
        isLoaded: true,
      };
    default:
      return state;
  }
};

export {
  storeInfo, // eslint-disable-line import/prefer-default-export
};
