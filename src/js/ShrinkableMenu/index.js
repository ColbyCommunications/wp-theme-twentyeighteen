import {hamburger} from './hamburger';

/**
 * Adds a hamburger icon and a togglable submenu when the given menu is wider
 * than the page.
 */
class ShrinkableMenu {
  onResize = this.onResize.bind(this);
  onHamburgerClick = this.onHamburgerClick.bind(this);

  constructor(
    args = {
      selector: '.subheader-nav-container',
      extraMenuClass: 'subheader-nav__extra-menu',
    }
  ) {
    this.container = document.querySelector(args.selector);
    this.list = document.querySelector(`${args.selector} > ul`);
    this.windowSize = 0;
    this.extraMenuClass = args.extraMenuClass;
    this.hamburger = null;
    this.extraMenu = null;
  }

  shouldStart = () => this.container && this.list && this.extraMenuClass;

  start() {
    this.onShrink();
    window.addEventListener('resize', this.onResize);
  }

  getButtonsWidth = () =>
    (this.hamburger ? this.hamburger.clientWidth : 0) +
    [...this.list.children].reduce(
      (sum, element) => sum + element.clientWidth,
      0
    );

  getListLastLink = () =>
    [...this.list.children].filter(child => child.tagName === 'LI').pop();

  addHamburger() {
    this.hamburger = document.createElement('BUTTON');
    this.hamburger.innerHTML = hamburger;
    this.hamburger.classList.add('btn');
    this.hamburger.classList.add('primary');
    this.container.appendChild(this.hamburger);
    this.hamburger.addEventListener('click', this.onHamburgerClick);
  }

  addExtraMenu() {
    this.extraMenu = document.createElement('UL');
    this.extraMenu.classList.add(this.extraMenuClass);
    this.container.appendChild(this.extraMenu);
  }

  initExtraMenu() {
    this.addHamburger();
    this.addExtraMenu();
    this.onShrink();
  }

  killExtraMenu() {
    this.hamburger.removeEventListener('click', this.onHamburgerClick);
    this.container.removeChild(this.hamburger);
    this.container.removeChild(this.extraMenu);
    this.hamburger = null;
    this.extraMenu = null;
  }

  onHamburgerClick() {
    if (this.hamburger.classList.contains('active')) {
      this.hamburger.classList.remove('active');
      this.extraMenu.classList.remove('active');
    } else {
      this.hamburger.classList.add('active');
      this.extraMenu.classList.add('active');
    }
  }

  onResize() {
    if (window.innerWidth > this.windowSize) {
      this.onGrowth();
    } else if (window.innerWidth < this.windowSize) {
      this.onShrink();
    }
  }

  onShrink() {
    this.windowSize = window.innerWidth;

    while (this.getButtonsWidth() > this.windowSize) {
      if (!this.hamburger) {
        this.initExtraMenu();
        return;
      }

      const lastItem = this.list.removeChild(this.getListLastLink());
      this.extraMenu.prepend(lastItem);
    }
  }

  onGrowth() {
    this.windowSize = window.innerWidth;

    while (
      this.extraMenu &&
      this.extraMenu.children.length &&
      this.getButtonsWidth() + this.extraMenu.children[0].clientWidth <
        this.windowSize
    ) {
      const firstItem = this.extraMenu.removeChild(this.extraMenu.children[0]);
      this.list.append(firstItem);

      if (!this.extraMenu.children.length) {
        this.killExtraMenu();
        return;
      }
    }
  }
}

export default ShrinkableMenu;
