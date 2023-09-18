import Swiper from 'swiper';
import { Navigation, Pagination, EffectFade } from 'swiper/modules';

export const swiper = async (err) => {
    if (err) {
      console.error(err);
    }

    const swiper = new Swiper('.swiper', {
        // configure Swiper to use modules
        modules: [Navigation, Pagination, EffectFade],
        effect: "fade",
        speed: 1000,

        // Optional parameters
        loop: true,

        // If we need pagination
        pagination: {
            el: '.ddp-swiper-pagination',
            clickable: true,
        },

        // Navigation arrows
        navigation: {
            nextEl: '.ddp-swiper-button-next',
            prevEl: '.ddp-swiper-button-prev',
        },
    });

  };
  
import.meta.webpackHot?.accept(swiper);

  
