import "./bootstrap";
import "./partials/nav";

import Typed from "typed.js";


const dynamicType = document.querySelector('#jsTyping')

if(dynamicType){
    const typed = new Typed("#jsTyping", {
        strings: ["Relaks nad morzem", "Słoneczny Wypoczynek", "Spokój Plaży"],
        typeSpeed: 200,
        loop: true,
        loopCount: Infinity,
        backDelay: 700,
    });
}


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
            slidesPerView: 8,
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

    modules: [Autoplay, Navigation],
});

const figures = document.querySelectorAll('figure');

figures.forEach(originalFigure => {
    // Znajdź <img> w oryginalnym <figure>
    const originalImg = originalFigure.querySelector('img');
    if (originalImg) {
        // Utwórz nowy <figure>
        const newFigure = document.createElement('figure');
        newFigure.className = 'attachment attachment--preview attachment--png';
        newFigure.setAttribute('data-trix-content-type', 'image/png');
        newFigure.setAttribute('data-trix-attributes', '{"presentation":"gallery"}');

        // Utwórz nowy <img> i skopiuj src, width, height
        const newImg = document.createElement('img');
        newImg.src = originalImg.src;
        newImg.width = originalImg.width;
        newImg.height = originalImg.height;

        // Dodaj <img> do nowego <figure>
        newFigure.appendChild(newImg);

        // Zamień oryginalny <figure> na nowy <figure>
        originalFigure.parentNode.replaceChild(newFigure, originalFigure);
    }
});


