import React from 'react';
import 'react-responsive-carousel/lib/styles/carousel.min.css'; // requires a loader
import { Carousel } from 'react-responsive-carousel';
import '../styles/Slider.styl';

export default () => (
  <div className="slider-top">
    <Carousel
      showThumbs={false}
      dynamicHeight={false}
      autoPlay
      infiniteLoop
    >
      <div>
        <img src="/assets/images/1.jpeg"/>
        <p className="legend">Широкий ассортимент снэков</p>
      </div>
      <div>
        <img src="/assets/images/2.jpeg"/>
        <p className="legend">Рыба и морепродукты</p>
      </div>
      <div>
        <img src="/assets/images/3.jpeg"/>
        <p className="legend">Добро пожаловать!</p>
      </div>
    </Carousel>
  </div>
);
