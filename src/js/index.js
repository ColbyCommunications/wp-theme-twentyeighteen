import { startShrinkableMenu } from 'shrinkable-menu';
import Collapsibles from 'colby-wp-collapsible';

import startSchedule from '../../vendor/colbycomms/wp-schedule/src/js/';

import './catalog';

window.addEventListener('load', Collapsibles.init);
window.addEventListener('load', startShrinkableMenu);
window.addEventListener('load', () => startSchedule({ doCollapsibles: false }));
