import React from 'react';
import '../styles/App.styl';
import Header from './Header';
import Footer from './Footer';
import Slider from '../../slider/components/Slider';
import ProductsList from '../../products/components/ProductsList';
import Contacts from '../../contacts/componets/Contacts';
import 'bootstrap/dist/css/bootstrap.min.css';
import '@fortawesome/fontawesome-free/js/all.min.js';
import '@fortawesome/fontawesome-free/css/all.min.css';
import { beerList, productList } from '../../../config/products';
import { contacts } from '../../../config/contacts';

const App = () => (
  <>
    <Header {...contacts} />
    <main className="container">

      <Slider/>
      <ProductsList title="Пивные радости" list={beerList}/>
      <ProductsList title="Подпивные радости" list={productList}/>
      <Contacts {...contacts}/>
    </main>
    <Footer {...contacts}/>
  </>
);

export default App;
