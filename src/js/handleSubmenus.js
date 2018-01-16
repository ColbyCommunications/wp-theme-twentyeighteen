import clickOutside from 'click-outside';

const onTogglerClick = ({ toggler, menu }) => {
  if (toggler.classList.contains('active')) {
    toggler.classList.remove('active');
    menu.classList.remove('active');
  } else {
    toggler.classList.add('active');
    menu.classList.add('active');
  }
};

const startListener = container => {
  const toggler = container.querySelector('.submenu-toggler');
  const menu = container.querySelector('.sub-menu');

  toggler.addEventListener('click', () => {
    onTogglerClick({ toggler, menu });
  });

  clickOutside(container, () => {
    toggler.classList.remove('active');
    menu.classList.remove('active');
  });
};

export const handleSubmenus = () => {
  [...document.querySelectorAll('.menu-item-has-children')].forEach(
    startListener
  );
};
