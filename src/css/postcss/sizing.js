/**
 * Creates classes .small-1, .small-2 etc. / .large-1, .large-2 etc for sizing.
 */

const postcss = require('postcss');

const makeLargeClasses = (inset = '') =>
  Array.from(Array(14).keys())
    .slice(1)
    .reduce(
      (output, _, i) => ({
        css: `${output.css}

.large${inset}-${i} {
	font-size: ${output.size * 100}% !important;
}
`,
        size: output.size * 1.05946,
      }),
      { css: '', size: 1 }
    ).css;

const makeSmallClasses = (inset = '') =>
  Array.from(Array(14).keys())
    .slice(1)
    .reduce(
      (output, _, i) => ({
        css: `${output.css}

.small${inset}-${i} {
	font-size: ${output.size * 100}% !important;
}
`,
        size: output.size * 0.94387707,
      }),
      { css: '', size: 1 }
    ).css;

const makeBreakpointClasses = opts =>
  Object.keys(opts.breakpoints)
    .map(
      breakpoint =>
        `
@media screen and (min-width: ${opts.breakpoints[breakpoint]}) {
	${makeSmallClasses(`-${breakpoint}`)}
	${makeLargeClasses(`-${breakpoint}`)}
}
`
    )
    .join('');

module.exports = postcss.plugin('sizing', (opts = {}) => root => {
  root.walkAtRules('sizing', rule => {
    rule.before(
      makeSmallClasses() + makeLargeClasses() + makeBreakpointClasses(opts)
    );
    rule.remove();
  });
});
