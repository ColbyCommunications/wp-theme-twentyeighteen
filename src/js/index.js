import Collapsibles from 'colby-wp-collapsible';

import './catalog';
import { handleSubmenus } from './handleSubmenus';
import ShrinkableMenu from './ShrinkableMenu';

window.addEventListener('load', Collapsibles.init);
window.addEventListener('load', () => {
  const shrinkableMenu = new ShrinkableMenu();
  if (shrinkableMenu.shouldStart()) {
    shrinkableMenu.start();
  }
});
window.addEventListener('load', handleSubmenus);
