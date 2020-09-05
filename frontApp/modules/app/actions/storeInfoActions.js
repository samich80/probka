export const REQUEST_STORE_INFO = 'REQUEST_STORE_INFO';
export const RECEIVE_STORE_INFO = 'RECEIVE_STORE_INFO';

export const requestStoreInfo = () => ({
  type: REQUEST_STORE_INFO,
});

export const receiveStoreInfo = (json) => ({
  type: RECEIVE_STORE_INFO,
  data: json,
});
