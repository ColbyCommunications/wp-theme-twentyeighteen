/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(1);
module.exports = __webpack_require__(8);


/***/ }),
/* 1 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var _RowSorter = __webpack_require__(2);

var _RowSorter2 = _interopRequireDefault(_RowSorter);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

window.addEventListener('load', function () {
  var container = document.querySelector('[data-whos-coming]');
  if (container) {
    var sorter = new _RowSorter2.default(container);

    if (sorter.shouldStart()) {
      sorter.start();
    }
  }
});

/***/ }),
/* 2 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _startSelect = __webpack_require__(3);

var _startSearch = __webpack_require__(4);

var _startSortByColumn = __webpack_require__(5);

var _upArrow = __webpack_require__(6);

var _downArrow = __webpack_require__(7);

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

function _toConsumableArray(arr) { if (Array.isArray(arr)) { for (var i = 0, arr2 = Array(arr.length); i < arr.length; i++) { arr2[i] = arr[i]; } return arr2; } else { return Array.from(arr); } }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var KEY_ROW_SELECTOR = '.whos-coming__row--key';
var NOT_KEY_ROW_SELECTOR = '.whos-coming__row:not(.whos-coming__row--key)';
var COLUMN_FIELD_DATA_ATTRIBUTE = 'data-whos-coming-data';
var COLUMN_DATA_ATTRIBUTE = 'data-whos-coming-column';
var SEARCH_DATA_ATTRIBUTE = 'data-whos-coming-search';
var SELECT_DATA_ATTRIBUTE = 'data-whos-coming-select';
var ARROW_CLASS = 'whos-coming__arrow';

var RowSorter = function () {

  /**
   * Class constructor.
   *
   * @param {HTMLElement} container The HTML root element.
   */


  /**
   * Gathers data attributes from inside a row.
   *
   * @param {HTMLElement} element An HTML element.
   * @return {object} An object containing the data attribute values as keys
   *                  and innerHTML as values.
   */
  function RowSorter(container) {
    var _this = this;

    _classCallCheck(this, RowSorter);

    this.columnUSort = this.columnUSort.bind(this);
    this.setActiveOption = this.setActiveOption.bind(this);
    this.setSearchTerm = this.setSearchTerm.bind(this);
    this.setSortColumn = this.setSortColumn.bind(this);
    this.activeOption = null;
    this.searchField = null;
    this.selectField = null;
    this.searchTerm = null;
    this.sortDirection = 'asc';

    this.shouldStart = function () {
      return _this.keyRow && _this.rows && _this.columns;
    };

    this.container = container;
    this.setUp();
  }

  /**
   * Initializes class variables.
   */


  /**
   * Assembles an array of objects with data for all the rows.
   *
   * @return {array} The objects containing the elements and the data.
   */


  _createClass(RowSorter, [{
    key: 'setUp',
    value: function setUp() {
      try {
        this.keyRow = this.container.querySelector(KEY_ROW_SELECTOR);
        this.columns = [].concat(_toConsumableArray(this.keyRow.querySelectorAll('[' + COLUMN_DATA_ATTRIBUTE + ']')));
        this.columnToSortBy = this.columns[0].getAttribute(COLUMN_DATA_ATTRIBUTE);
        this.rows = RowSorter.makeRows();
      } catch (e) {
        // Do nothing.
      }
    }

    /**
     * Whether to continue after the constructor.
     */

  }, {
    key: 'start',
    value: function start() {
      (0, _startSortByColumn.startSortByColumn)({ columns: this.columns, onChange: this.setSortColumn });
      this.maybeStartSearch();
      this.maybeStartSelect();
      this.render();
    }

    /**
     * Sets up the search if a search input is found.
     */

  }, {
    key: 'maybeStartSearch',
    value: function maybeStartSearch() {
      var searchInput = document.querySelector('[' + SEARCH_DATA_ATTRIBUTE + ']');

      if (searchInput) {
        this.searchField = searchInput.getAttribute(SEARCH_DATA_ATTRIBUTE);
        (0, _startSearch.startSearch)({ onChange: this.setSearchTerm, searchInput: searchInput });
      }
    }

    /**
     * Sets up the select input if the input is found.
     */

  }, {
    key: 'maybeStartSelect',
    value: function maybeStartSelect() {
      var select = document.querySelector('[' + SELECT_DATA_ATTRIBUTE + ']');
      if (select) {
        this.selectField = select.getAttribute(SELECT_DATA_ATTRIBUTE);
        (0, _startSelect.startSelect)({
          select: select,
          selectField: this.selectField,
          onChange: this.setActiveOption,
          rows: this.rows
        });
      }
    }

    /**
     * Sets the active option (the select field value) and rerenders.
     */

  }, {
    key: 'setActiveOption',
    value: function setActiveOption(option) {
      this.activeOption = option;
      this.render();
    }

    /**
     * Sets the search term and rerenders.
     */

  }, {
    key: 'setSearchTerm',
    value: function setSearchTerm(searchTerm) {
      this.searchTerm = searchTerm;
      this.render();
    }

    /**
     * Sets the column to sort by and the sort direction and rerenders.
     */

  }, {
    key: 'setSortColumn',
    value: function setSortColumn(column) {
      var field = column.getAttribute(COLUMN_DATA_ATTRIBUTE);

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

  }, {
    key: 'matchesSearch',
    value: function matchesSearch(searchWords, textWords) {
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

  }, {
    key: 'columnUSort',
    value: function columnUSort(a, b) {
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

  }, {
    key: 'renderDirectionalArrow',
    value: function renderDirectionalArrow() {
      this.columns.forEach(function (column) {
        var arrow = column.querySelector('.' + ARROW_CLASS);
        if (arrow) {
          column.removeChild(arrow);
        }
      });

      var arrowContainer = document.createElement('SPAN');
      arrowContainer.classList.add(ARROW_CLASS);
      arrowContainer.innerHTML = this.sortDirection === 'asc' ? _downArrow.downArrow : _upArrow.upArrow;

      var column = document.querySelector('[' + COLUMN_DATA_ATTRIBUTE + '="' + this.columnToSortBy + '"]');
      column.appendChild(arrowContainer);
    }

    /**
     * Filters and orders the rows.
     */

  }, {
    key: 'render',
    value: function render() {
      var _container,
          _this2 = this;

      this.container.innerHTML = '';
      (_container = this.container).append.apply(_container, _toConsumableArray([this.keyRow].concat(this.rows.filter(function (row) {
        if (!_this2.activeOption) {
          return true;
        }

        return row.data[_this2.selectField] === _this2.activeOption;
      }).filter(function (row) {
        if (!_this2.searchTerm) {
          return true;
        }

        return _this2.matchesSearch(_this2.searchTerm.replace(/[^a-zA-Z\d\s:]/g, '').toLowerCase().split(' ').filter(function (word) {
          return word.length;
        }), row.data[_this2.searchField].replace(/[^a-zA-Z\d\s:]/g, '').toLowerCase().split(' ').filter(function (word) {
          return word.length;
        }));
      }).sort(this.columnUSort).map(function (row) {
        return row.element;
      }))));

      this.renderDirectionalArrow();
    }
  }]);

  return RowSorter;
}();

RowSorter.getRowData = function (element) {
  return [].concat(_toConsumableArray(element.querySelectorAll('[' + COLUMN_FIELD_DATA_ATTRIBUTE + ']'))).reduce(function (data, span) {
    return Object.assign({}, data, _defineProperty({}, span.getAttribute(COLUMN_FIELD_DATA_ATTRIBUTE), span.innerHTML.trim()));
  }, {});
};

RowSorter.makeRows = function () {
  return [].concat(_toConsumableArray(document.querySelectorAll(NOT_KEY_ROW_SELECTOR))).map(function (element) {
    return {
      element: element,
      data: RowSorter.getRowData(element)
    };
  });
};

exports.default = RowSorter;

/***/ }),
/* 3 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});

function _toConsumableArray(arr) { if (Array.isArray(arr)) { for (var i = 0, arr2 = Array(arr.length); i < arr.length; i++) { arr2[i] = arr[i]; } return arr2; } else { return Array.from(arr); } }

var addOptionsElements = function addOptionsElements(_ref) {
  var options = _ref.options,
      select = _ref.select;

  options.forEach(function (option) {
    var optionElement = document.createElement('OPTION');
    optionElement.setAttribute('value', option);
    optionElement.innerHTML = option;
    select.append(optionElement);
  });
};

var getOptions = function getOptions(_ref2) {
  var rows = _ref2.rows,
      selectField = _ref2.selectField;
  return [].concat(_toConsumableArray(rows)).reduce(function (options, row) {
    if (options.indexOf(row.data[selectField]) === -1) {
      options.push(row.data[selectField]);
    }

    return options;
  }, []);
};

var handleSelectChange = function handleSelectChange(_ref3) {
  var select = _ref3.select,
      onChange = _ref3.onChange;

  var activeOption = select.value && select.value.indexOf('--') === -1 ? select.value : null;
  onChange(activeOption);
};

var startSelect = exports.startSelect = function startSelect(_ref4) {
  var selectField = _ref4.selectField,
      select = _ref4.select,
      onChange = _ref4.onChange,
      rows = _ref4.rows;

  var options = getOptions({ rows: rows, selectField: selectField });
  options.sort();

  addOptionsElements({ options: options, select: select });

  select.addEventListener('change', function () {
    handleSelectChange({ select: select, onChange: onChange });
  });
};

/***/ }),
/* 4 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});
var startSearch = exports.startSearch = function startSearch(_ref) {
  var onChange = _ref.onChange,
      searchInput = _ref.searchInput;

  searchInput.addEventListener('keyup', function (event) {
    onChange(event.target.value);
  });

  searchInput.addEventListener('search', function (event) {
    if (!event.target.value.trim()) {
      onChange(null);
    }
  });
};

/***/ }),
/* 5 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});
var addColumnClickListener = function addColumnClickListener(_ref) {
  var column = _ref.column,
      onChange = _ref.onChange;

  column.addEventListener('click', function () {
    return onChange(column);
  });
};

var startSortByColumn = exports.startSortByColumn = function startSortByColumn(_ref2) {
  var columns = _ref2.columns,
      onChange = _ref2.onChange;

  columns.forEach(function (column) {
    return addColumnClickListener({ column: column, onChange: onChange });
  });
};

/***/ }),
/* 6 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});
/* eslint max-len: 0 */

var upArrow = exports.upArrow = "<svg width=\"1792\" height=\"1792\" viewBox=\"0 0 1792 1792\">\n<path d=\"M1395 1184q0 13-10 23l-50 50q-10 10-23 10t-23-10l-393-393-393 393q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l466 466q10 10 10 23z\" fill=\"currentColor\"/>\n</svg>";

/***/ }),
/* 7 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});
/* eslint max-len: 0 */
var downArrow = exports.downArrow = "<svg width=\"1792\" height=\"1792\" viewBox=\"0 0 1792 1792\" class=\"down-arrow-svg\">\n<title>Open</title>\n<path d=\"M1395 736q0 13-10 23l-466 466q-10 10-23 10t-23-10l-466-466q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l393 393 393-393q10-10 23-10t23 10l50 50q10 10 10 23z\" fill=\"currentColor\"/>\n</svg>";

/***/ }),
/* 8 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
/******/ ]);
//# sourceMappingURL=whos-coming.js.map