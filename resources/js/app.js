import "./bootstrap";
import "./partials/nav";
import './partials/dynamicTyping'
import './partials/swipers'





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


