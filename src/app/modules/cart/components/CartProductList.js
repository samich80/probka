import React from 'react';
import CartProduct from './CartProduct';

export default ({ list }) => list.map((product, index) => <CartProduct {...product} index={index + 1}/>);