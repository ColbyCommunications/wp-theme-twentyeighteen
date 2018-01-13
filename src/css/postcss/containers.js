const postcss = require('postcss');

/**
 * Creates alternative container sizes.
 */
module.exports = postcss.plugin('containers', () => root => {
  root.walkAtRules('containers', rule => {
    const sizes = { sm: '568px', md: '768px', lg: '992px', xl: '1200px' };
    const baseDecls = `
  margin: 0 auto;
	padding-left: .75rem;
	padding-right: .75rem;
`;
    const baseRule =
      Object.keys(sizes)
        .map(size => `.container-${size}`)
        .join(', ') + `{${baseDecls}}`;

    const css =
      baseRule +
      Object.keys(sizes)
        .map(
          size => `
.container-${size} {
	max-width: ${sizes[size]};
}
`
        )
        .join('');
    rule.before(css);
    rule.remove();
  });
});
