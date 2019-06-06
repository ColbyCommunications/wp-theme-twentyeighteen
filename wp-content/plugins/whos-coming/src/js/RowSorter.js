import { startSelect } from './startSelect';
import { startSearch } from './startSearch';
import { startSortByColumn } from './startSortByColumn';
import { upArrow } from './upArrow';
import { downArrow } from './downArrow';

const KEY_ROW_SELECTOR = '.whos-coming__row--key';
const NOT_KEY_ROW_SELECTOR = '.whos-coming__row:not(.whos-coming__row--key)';
const COLUMN_FIELD_DATA_ATTRIBUTE = 'data-whos-coming-data';
const COLUMN_DATA_ATTRIBUTE = 'data-whos-coming-column';
const SEARCH_DATA_ATTRIBUTE = 'data-whos-coming-search';
const SELECT_DATA_ATTRIBUTE = 'data-whos-coming-select';
const ARROW_CLASS = 'whos-coming__arrow';

class RowSorter {
  columnUSort = this.columnUSort.bind(this);
  setActiveOption = this.setActiveOption.bind(this);
  setSearchTerm = this.setSearchTerm.bind(this);
  setSortColumn = this.setSortColumn.bind(this);

  activeOption = null;
  searchField = null;
  selectField = null;
  searchTerm = null;
  sortDirection = 'asc';

  /**
   * Gathers data attributes from inside a row.
   *
   * @param {HTMLElement} element An HTML element.
   * @return {object} An object containing the data attribute values as keys
   *                  and innerHTML as values.
   */
  static getRowData = element =>
    [...element.querySelectorAll(`[${COLUMN_FIELD_DATA_ATTRIBUTE}]`)].reduce(
      (data, span) =>
        Object.assign({}, data, {
          [span.getAttribute(
            COLUMN_FIELD_DATA_ATTRIBUTE
          )]: span.innerHTML.trim(),
        }),
      {}
    );

  /**
   * Assembles an array of objects with data for all the rows.
   *
   * @return {array} The objects containing the elements and the data.
   */
  static makeRows = () =>
    [...document.querySelectorAll(NOT_KEY_ROW_SELECTOR)].map(element => ({
      element,
      data: RowSorter.getRowData(element),
    }));

  /**
   * Class constructor.
   *
   * @param {HTMLElement} container The HTML root element.
   */
  constructor(container) {
    this.container = container;
    this.setUp();
  }

  /**
   * Initializes class variables.
   */
  setUp() {
    try {
      this.keyRow = this.container.querySelector(KEY_ROW_SELECTOR);
      this.columns = [
        ...this.keyRow.querySelectorAll(`[${COLUMN_DATA_ATTRIBUTE}]`),
      ];
      this.columnToSortBy = this.columns[0].getAttribute(COLUMN_DATA_ATTRIBUTE);
      this.rows = RowSorter.makeRows();
    } catch (e) {
      // Do nothing.
    }
  }

  /**
   * Whether to continue after the constructor.
   */
  shouldStart = () => this.keyRow && this.rows && this.columns;

  start() {
    startSortByColumn({ columns: this.columns, onChange: this.setSortColumn });
    this.maybeStartSearch();
    this.maybeStartSelect();
    this.render();
  }

  /**
   * Sets up the search if a search input is found.
   */
  maybeStartSearch() {
    const searchInput = document.querySelector(`[${SEARCH_DATA_ATTRIBUTE}]`);

    if (searchInput) {
      this.searchField = searchInput.getAttribute(SEARCH_DATA_ATTRIBUTE);
      startSearch({ onChange: this.setSearchTerm, searchInput });
    }
  }

  /**
   * Sets up the select input if the input is found.
   */
  maybeStartSelect() {
    const select = document.querySelector(`[${SELECT_DATA_ATTRIBUTE}]`);
    if (select) {
      this.selectField = select.getAttribute(SELECT_DATA_ATTRIBUTE);
      startSelect({
        select,
        selectField: this.selectField,
        onChange: this.setActiveOption,
        rows: this.rows,
      });
    }
  }

  /**
   * Sets the active option (the select field value) and rerenders.
   */
  setActiveOption(option) {
    this.activeOption = option;
    this.render();
  }

  /**
   * Sets the search term and rerenders.
   */
  setSearchTerm(searchTerm) {
    this.searchTerm = searchTerm;
    this.render();
  }

  /**
   * Sets the column to sort by and the sort direction and rerenders.
   */
  setSortColumn(column) {
    const field = column.getAttribute(COLUMN_DATA_ATTRIBUTE);

    if (field === this.columnToSortBy) {
      this.sortDirection = this.sortDirection === 'asc' ? 'desc' : 'asc';
    } else {
      this.sortDirection = 'asc';
      this.columnToSortBy = field;
    }

    this.render();
  }

  /**
   * Checks whether a search term and a search string match.
   *
   * @param {array} searchWords An array of words (should be lowercased).
   * @param {array} textWords An array of words (should be lowercased).
   * @return {boolean} Whether there is a match.
   */
  matchesSearch(searchWords, textWords) {
    for (var i = 0; i < searchWords.length; i += 1) {
      for (var j = 0; j < textWords.length; j += 1) {
        if (searchWords[i].indexOf(textWords[j]) !== -1) {
          console.log(searchWords, textWords);
          return true;
        }

        if (textWords[j].indexOf(searchWords[i]) !== -1) {
          return true;
        }
      }
    }

    return false;
  }

  /**
   * Callback that sorts rows by a specified column.
   * @param {Object} a First row.
   * @param {Object} b Second row.
   * @return {Number} Zero, -1, or 1;
   */
  columnUSort(a, b) {
    if (a.data[this.columnToSortBy] === b.data[this.columnToSortBy]) {
      return 0;
    }

    if (this.sortDirection === 'asc') {
      return a.data[this.columnToSortBy] < b.data[this.columnToSortBy] ? -1 : 1;
    }

    return a.data[this.columnToSortBy] > b.data[this.columnToSortBy] ? -1 : 1;
  }

  /**
   * Clears the directional arrow and re-adds it to the active row.
   */
  renderDirectionalArrow() {
    this.columns.forEach(column => {
      const arrow = column.querySelector(`.${ARROW_CLASS}`);
      if (arrow) {
        column.removeChild(arrow);
      }
    });

    const arrowContainer = document.createElement('SPAN');
    arrowContainer.classList.add(ARROW_CLASS);
    arrowContainer.innerHTML =
      this.sortDirection === 'asc' ? downArrow : upArrow;

    const column = document.querySelector(
      `[${COLUMN_DATA_ATTRIBUTE}="${this.columnToSortBy}"]`
    );
    column.appendChild(arrowContainer);
  }

  /**
   * Filters and orders the rows.
   */
  render() {
    this.container.innerHTML = '';
    this.container.append(
      ...[this.keyRow].concat(
        this.rows
          .filter(row => {
            if (!this.activeOption) {
              return true;
            }

            return row.data[this.selectField] === this.activeOption;
          })
          .filter(row => {
            if (!this.searchTerm) {
              return true;
            }

            return this.matchesSearch(
              this.searchTerm
                .replace(/[^a-zA-Z\d\s:]/g, '')
                .toLowerCase()
                .split(' ')
                .filter(word => word.length),
              row.data[this.searchField]
                .replace(/[^a-zA-Z\d\s:]/g, '')
                .toLowerCase()
                .split(' ')
                .filter(word => word.length)
            );
          })
          .sort(this.columnUSort)
          .map(row => row.element)
      )
    );

    this.renderDirectionalArrow();
  }
}

export default RowSorter;
