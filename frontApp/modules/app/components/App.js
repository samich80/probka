import React, { useCallback, useEffect, useState } from 'react';
import { useDispatch, useSelector } from 'react-redux';
import '../styles/App.styl';
import Header from './Header';
import Footer from './Footer';
import Slider from '../../slider/components/Slider';
import ProductsList from '../../products/components/ProductsList';
import Contacts from '../../contacts/componets/Contacts';
import 'bootstrap/dist/css/bootstrap.min.css';
import productList from '../../../config/products';
import contacts from '../../../config/contacts';
import CartIndicator from '../../cart/components/CartIndicator';
import CartModal from '../../cart/components/CartModal';
import slides from '../../../config/slides';
import AgeConfirm from './AgeConfirm';
import { getStoreInfo } from '../dispatchers/storeInfoDispatchers';
import SiteLoader from './SiteLoader';

const App = () => {
  const [has18, setHas18] = useState(!!localStorage.getItem('has18'));
  const dispatch = useDispatch();
  const dispatchStoreInfo = useCallback(() => dispatch(getStoreInfo()), [dispatch]);
  const storeInfo = useSelector((state) => state.storeInfo);
  useEffect(() => {
    window.addEventListener('setHas18', () => setHas18(true));
    if (!Object.keys(storeInfo).length) {
      dispatchStoreInfo();
    }
  });

  if (!storeInfo.isLoaded) {
    return <SiteLoader/>;
  }

  return (
    <>
      <div className={has18 ? '' : 'blurred'}>
        <Header {...contacts} />
        <main className="container">
          <Slider list={slides}/>
          <ProductsList title="Пивные радости" list={productList.filter((p) => p.category === 'beer')}/>
          <ProductsList title="Подпивные радости" list={productList.filter((p) => p.category === 'snack')}/>
          <Contacts {...contacts}/>
        </main>
        <Footer {...contacts}/>
        <CartIndicator/>
        <CartModal {...contacts}/>
      </div>
      <AgeConfirm/>
    </>
  );
};

export default App;
