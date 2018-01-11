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

module.exports = {
  plugins: [
    postcssImport,
    grid,
    colorFunction,
    sizing({
      breakpoints: {
        sm: '576px',
        md: '768px',
        lg: '992px',
      },
    }),
    containers,
    themes({
      defaultTheme: 'light',
      themes: [
        {
          name: 'light',
          color: '#353535',
          'background-color': 'white',
          'background-hover-color': color.convert('color(white shade(10%))'),
          'link-color': '#214280',
          'link-hover-color': '#214280',
          'heading-color': '#214280',
          'heading-link-color': '#214280',
          'heading-link-hover-color': '#214280',
          'border-color': color.convert('color(white shade(10%))'),
        },
        {
          name: 'primary',
          color: 'white',
          'background-color': '#214280',
          'background-hover-color': color.convert('color(#214280 shade(10%))'),
          'link-color': 'white',
          'link-hover-color': 'white',
          'heading-color': 'white',
          'heading-link-color': 'white',
          'heading-link-hover-color': 'white',
          'border-color': color.convert('color(#214280 tint(10%))'),
        },
        {
          name: 'highlight',
          inherits: 'primary',
          color: 'white',
          'background-color': '#D14124',
          'background-hover-color': color.convert('color(#D14124 shade(10%))'),
          'border-color': color.convert('color(#D14124 tint(10%))'),
        },
        {
          name: 'gray',
          inherits: 'light',
          'background-color': '#e6e6e6',
          'background-hover-color': '#b3b3b3',
          'border-color': '#cccccc',
          'hover-color': '#cccccc',
        },
        {
          name: 'dark',
          inherits: 'primary',
          'background-color': '#353535',
        },
        {
          name: 'dark-transparent',
          inherits: 'primary',
          'background-color': 'transparent',
        },
      ],
    }),
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
