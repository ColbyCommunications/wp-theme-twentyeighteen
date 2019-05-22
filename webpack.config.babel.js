import ExtractTextPlugin from 'extract-text-webpack-plugin';
import path from 'path';
import webpack from 'webpack';

import packageJson from './package.json';

const main = () => {
  const PROD = process.argv.includes('-p');
  const min = PROD ? '.min' : '';
  const entry = {
    [packageJson.name]: ['./src/js/index.js', './src/css/main.css'],
    [`${packageJson.name}-editor`]: [
      './src/js/editor/index.js',
      './src/css/editor/editor.css',
    ],
    [`${packageJson.name}-blocks`]: [
      './src/js/editor/index.js',
      './src/css/blocks/index.css',
    ],
  };
  const filename = `[name]${min}.js`;
  const plugins = [new ExtractTextPlugin(`[name]${min}.css`)];

  return {
    entry,
    output: {
      filename,
      path: path.resolve(__dirname, 'dist'),
    },
    plugins,
    module: {
      rules: [
        {
          test: /\.js$/,
          use: [
            {
              loader: 'babel-loader',
              options: { presets: ['env', 'stage-0', 'react'] },
            },
          ],
        },
        {
          test: /\.css$/,
          exclude: [/editor.css$/],
          use: ExtractTextPlugin.extract({
            fallback: 'style-loader',
            use: ['css-loader', 'postcss-loader'],
          }),
        },
        {
          test: [/editor.css$/],
          use: ExtractTextPlugin.extract({
            fallback: 'style-loader',
            use: ['css-loader'],
          }),
        },
      ],
    },
  };
};

export default main;
