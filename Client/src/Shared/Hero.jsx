import React, { useEffect, useState } from 'react';
import Slider from 'react-slick';
import 'slick-carousel/slick/slick.css';
import 'slick-carousel/slick/slick-theme.css';
import { FaChevronLeft, FaChevronRight } from 'react-icons/fa';

const Hero = () => {
  const [slides, setSlides] = useState([]);

  useEffect(() => {
    fetch('https://server.rst-bd.com/api/slider')
      .then((res) => res.json())
      .then((data) => setSlides(data))
      .catch((error) => console.error('Error fetching slider data:', error));
  }, []);

  const NextArrow = ({ onClick }) => (
    <div
      className="absolute top-1/2 right-4 transform -translate-y-1/2 z-20 cursor-pointer text-white text-3xl bg-black bg-opacity-40 rounded-full p-2"
      onClick={onClick}
    >
      <FaChevronRight />
    </div>
  );

  const PrevArrow = ({ onClick }) => (
    <div
      className="absolute top-1/2 left-4 transform -translate-y-1/2 z-20 cursor-pointer text-white text-3xl bg-black bg-opacity-40 rounded-full p-2"
      onClick={onClick}
    >
      <FaChevronLeft />
    </div>
  );

  const settings = {
    dots: true,
    infinite: true,
    fade: true,
    speed: 1000,
    autoplay: true,
    autoplaySpeed: 3000,
    pauseOnHover: false,
    swipe: true,
    arrows: true,
    nextArrow: <NextArrow />,
    prevArrow: <PrevArrow />,
    appendDots: (dots) => (
      <div className="absolute bottom-6 left-0 w-full flex justify-center z-30">
        <ul className="flex space-x-2">{dots}</ul>
      </div>
    ),
    customPaging: () => <div className="custom-dot"></div>, // 👈 Dot class
  };

  return (
    <div className="relative w-full h-[30vh] sm:h-[40vh] lg:h-screen">
      <Slider {...settings}>
        {slides.map((slide) => (
          <div key={slide.id} className="relative w-full h-[30vh] sm:h-[40vh] lg:h-screen">
            <img
              src={slide.image}
              alt={slide.title}
              className="w-full h-full object-cover"
              draggable={false}
            />
          </div>
        ))}
      </Slider>
    </div>
  );
};

export default Hero;
