import React from 'react';
import '../styles/App.styl';
import Header from './Header';
import Footer from './Footer';
import Slider from '../../slider/components/Slider';
import ProductsList from '../../products/components/ProductsList';
import Contacts from '../../contacts/componets/Contacts';
import 'bootstrap/dist/css/bootstrap.min.css';
// import '@fortawesome/fontawesome-free/js/fontawesome.min.js';
// import '@fortawesome/fontawesome-free/js/solid.min';
// import '@fortawesome/fontawesome-free/js/brands.min';
// import '@fortawesome/fontawesome-free/css/fontawesome.min.css';
// import '@fortawesome/fontawesome-free/css/solid.min.css';
// import '@fortawesome/fontawesome-free/css/brands.min.css';
import productList from '../../../config/products';
import contacts from '../../../config/contacts';
import CartIndicator from '../../cart/components/CartIndicator';
import CartModal from '../../cart/components/CartModal';
import slides from '../../../config/slides';

const App = () => (
  <>
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
  </>
);

export default App;
