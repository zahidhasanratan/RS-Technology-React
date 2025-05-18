import { Swiper, SwiperSlide } from 'swiper/react';
import 'swiper/css';
import 'swiper/css/effect-fade';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import { EffectFade, Navigation, Pagination } from 'swiper/modules';

import slider1 from '../assets/rs-tech-asset/slider-1.jpg';
import slider2 from '../assets/rs-tech-asset/slider-2.jpg';
import slider3 from '../assets/rs-tech-asset/slider-3.jpg';

const Hero = () => {
    return (
        <div className="relative">
            <Swiper
                spaceBetween={30}
                effect="fade"
                navigation={{
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                }}
                pagination={{ clickable: true }}
                loop={true}
                modules={[EffectFade, Navigation, Pagination]}
                className="h-[30vh] lg:min-h-screen w-full"
            >
                <SwiperSlide>
                    <img
                        src={slider1}
                        alt="Slider 1"
                        className="w-full lg:h-screen sm:h-[30vh] object-cover"
                    />
                </SwiperSlide>
                <SwiperSlide>
                    <img
                        src={slider2}
                        alt="Slider 2"
                        className="w-full lg:h-screen sm:h-[30vh] object-cover"
                    />
                </SwiperSlide>
                <SwiperSlide>
                    <img
                        src={slider3}
                        alt="Slider 3"
                        className="w-full lg:h-screen sm:h-[30vh] object-cover"
                    />
                </SwiperSlide>
                
                {/* Custom navigation buttons (larger, no background) */}
                <div className="swiper-button-prev !w-12 !h-12 sm:!w-16 sm:!h-16"></div>
                <div className="swiper-button-next !w-12 !h-12 sm:!w-16 sm:!h-16"></div>
            </Swiper>
            
            {/* Custom CSS (larger arrows, transparent) */}
            <style jsx global>{`
                .swiper-button-prev,
                .swiper-button-next {
                    --swiper-navigation-size: 32px; /* Larger default size */
                    --swiper-navigation-color: #000; /* Black arrows */
                    background: transparent !important; /* No background */
                    width: var(--swiper-navigation-button-width, 48px);
                    height: var(--swiper-navigation-button-height, 48px);
                }
                
                /* Mobile adjustments (slightly smaller) */
                @media (max-width: 640px) {
                    .swiper-button-prev,
                    .swiper-button-next {
                        --swiper-navigation-size: 24px;
                        --swiper-navigation-button-width: 36px;
                        --swiper-navigation-button-height: 36px;
                    }
                }
            `}</style>
        </div>
    );
};

export default Hero;