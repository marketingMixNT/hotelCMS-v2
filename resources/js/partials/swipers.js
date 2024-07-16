import Swiper from "swiper";
import {
    Autoplay,
   
    Navigation,
   
} from "swiper/modules";
import "swiper/swiper-bundle.css";

// ADVANTAGES
new Swiper(".advantages-swiper", {
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
            slidesPerView: 5,
        },
        1250: {
            slidesPerView: 7,
        },
    },

    autoplay: {
        delay: 3500,
        disableOnInteraction: true,
        pauseOnMouseEnter: true,
    },
    navigation: {
        nextEl: ".advantages-next",
        prevEl: ".advantages-prev",
    },

    modules: [Autoplay, Navigation],
});