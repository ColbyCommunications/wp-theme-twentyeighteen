import Catalog from './Catalog';

function runCatalog(container) {
  const buttons = container.querySelectorAll('[data-catalog-content]');
  const contentContainer = container.querySelector('[data-catalog-container]');

  const catalog = new Catalog({
    buttons,
    contentContainer,
    container,
    defaultContent: contentContainer.innerHTML,
  });

  if (catalog.shouldRun()) {
    catalog.run();
  }
}

function runCatalogs() {
  [...document.querySelectorAll('[data-catalog]')].forEach(runCatalog);
}

window.addEventListener('load', runCatalogs);
