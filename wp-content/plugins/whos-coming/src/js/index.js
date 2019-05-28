import RowSorter from './RowSorter';

window.addEventListener('load', () => {
  const container = document.querySelector('[data-whos-coming]');
  if (container) {
    const sorter = new RowSorter(container);

    if (sorter.shouldStart()) {
      sorter.start();
    }
  }
});
