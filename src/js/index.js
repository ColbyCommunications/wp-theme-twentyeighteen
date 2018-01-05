import {accordionize} from './accordionize';
import './catalog';

window.addEventListener('load', () => {
  [...document.querySelectorAll('[data-accordion]')].forEach(container => {
    const heading = container.querySelector('.accordion-heading');
    const panel = container.querySelector('.accordion-panel');

    if (heading && panel) {
      accordionize({heading, panel});
    }
  });
});
