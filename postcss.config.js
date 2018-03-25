const color = require('css-color-function');
const postcssImport = require('postcss-import');
const grid = require('postcss-bootstrap-4-grid');
const containers = require('./src/css/postcss/containers');
const colorFunction = require('postcss-color-function');
const sizing = require('./src/css/postcss/sizing');
const themes = require('postcss-custom-props-themes');
const spacing = require('postcss-spacing-utils');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');
const cssThemes = require('./css-themes');

module.exports = {
  plugins: [
    postcssImport,
    colorFunction,
    grid({ gridGutterWidth: '3rem' }),
    sizing({
      breakpoints: {
        sm: '576px',
        md: '768px',
        lg: '932px',
      },
    }),
    containers,
    themes(cssThemes),
    spacing({
      spacers: [
        '0',
        '0.375rem',
        '0.75rem',
        '1.5rem',
        '2.25rem',
        '3rem',
        '4.5rem',
        '6rem',
        '7.5rem',
        '9rem',
      ],
    }),
    autoprefixer,
    cssnano,
  ],
};
