import React, { useCallback, useEffect, useState } from 'react';
import { useDispatch, useSelector } from 'react-redux';
import '../styles/App.styl';
import Header from './Header';
import Footer from './Footer';
import Slider from '../../slider/components/Slider';
import Contacts from '../../contacts/componets/Contacts';
import 'bootstrap/dist/css/bootstrap.min.css';
import CartIndicator from '../../cart/components/CartIndicator';
import CartModal from '../../cart/components/CartModal';
import AgeConfirm from './AgeConfirm';
import { getStoreInfo } from '../dispatchers/storeInfoDispatchers';
import SiteLoader from './SiteLoader';
import ProductsByCategoriesList from '../../products/components/ProductsByCategoriesList';
import Cart from '../../cart/utils/Cart';

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

  Cart.setProductList(storeInfo.products);

  return (
    <>
      <div className={has18 ? '' : 'blurred'}>
        <Header {...storeInfo.info} />
        <main className="container">
          <Slider list={storeInfo.slides}/>
          <ProductsByCategoriesList products={storeInfo.products} categories={storeInfo.productCategories}/>
          <Contacts {...storeInfo.info}/>
        </main>
        <Footer {...storeInfo.info}/>
        <CartIndicator/>
        <CartModal {...storeInfo.info}/>
      </div>
      <AgeConfirm/>
    </>
  );
};

export default App;
