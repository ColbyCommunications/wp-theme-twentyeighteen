const color = require('css-color-function');

module.exports = {
  plugins: [
    require('postcss-import')(),
    require('postcss-nesting')(),
    require('postcss-bootstrap-4-grid')(),
    require('postcss-color-function'),
    require('./src/sass/postcss/sizing')({
      breakpoints: {
        sm: '576px',
        md: '768px',
        lg: '992px',
      },
    }),
    require('./src/sass/postcss/containers')(),
    require('postcss-custom-props-themes')({
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
          name: 'gray',
          inherints: 'light',
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
    require('postcss-spacing-utils')({
      spacers: [
        0,
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
  ],
};
