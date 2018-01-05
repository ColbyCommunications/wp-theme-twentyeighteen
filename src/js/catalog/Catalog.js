import clickOutside from 'click-outside';

class Catalog {
  activateItem = this.activateItem.bind(this);
  deactivateAllButtons = this.deactivateAllButtons.bind(this);
  addButtonListener = this.addButtonListener.bind(this);

  static deactivateButton(button) {
    button.classList.remove('active');
  }

  constructor({container, buttons, contentContainer, defaultContent = ''}) {
    this.container = container;
    this.buttons = [...buttons].filter(button =>
      button.hasAttribute('data-catalog-content')
    );
    this.contentContainer = contentContainer;
    this.defaultContent = defaultContent;
  }

  shouldRun() {
    return this.buttons && this.buttons.length && this.contentContainer;
  }

  deactivateAllButtons() {
    [...this.buttons].forEach(Catalog.deactivateButton);
  }

  activateItem(button) {
    this.contentContainer.innerHTML = button.getAttribute(
      'data-catalog-content'
    );
    this.deactivateAllButtons();
    button.classList.add('active');
  }

  addButtonListener(button) {
    button.addEventListener('click', () => {
      this.activateItem(button);
    });
  }

  run() {
    [...this.buttons].forEach(this.addButtonListener);

    clickOutside(this.container, () => {
      this.deactivateAllButtons();
      this.contentContainer.innerHTML = this.defaultContent;
    });
  }
}

export default Catalog;
