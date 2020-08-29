import React from 'react';
import 'react-responsive-carousel/lib/styles/carousel.min.css'; // requires a loader
import { Carousel } from 'react-responsive-carousel';
import '../styles/Slider.styl';

export default ({ list }) => (
  <div className="slider-top">
    <Carousel
      showThumbs={false}
      dynamicHeight={false}
      autoPlay
      infiniteLoop
    >
      {list.map(({ image, title }) => (
        <div>
          <img src={image}/>
          <p className="legend">{title}</p>
        </div>
      ))}
    </Carousel>
  </div>
);
