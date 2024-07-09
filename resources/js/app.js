import "./bootstrap";
import "./partials/nav";

import Typed from "typed.js";

const typed = new Typed("#jsTyping", {
    strings: ["Relaks nad morzem", "Słoneczny Wypoczynek", "Spokój Plaży"],
    typeSpeed: 200,
    loop: true,
    loopCount: Infinity,
    backDelay: 700,
});

import Swiper from "swiper";
import {
    Autoplay,
    EffectFade,
    Navigation,
    Pagination,
    EffectCoverflow,
} from "swiper/modules";
import "swiper/swiper-bundle.css";

//HERO CAROUSEL
new Swiper(".mySwiper", {
  loop: true,
  effect: "fade",
  grabCursor: true,
  slidesPerView: 2,

  breakpoints: {
      450: {
          slidesPerView: 3,
         
      },
      650: {
          slidesPerView: 4,
         
      },
      1000: {
          slidesPerView: 6,
         
      },
      1250: {
          slidesPerView:8,
          
      },
  },

  autoplay: {
      delay: 3500,
      disableOnInteraction: true,
      pauseOnMouseEnter: true,
  },
  navigation: {
      nextEl: ".icon-next",
      prevEl: ".icon-prev",
  },
  
  modules: [Autoplay, Navigation,],
});
