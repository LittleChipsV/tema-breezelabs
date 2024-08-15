const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const TerserWebpackPlugin = require('terser-webpack-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');

module.exports = (env, argv) => {
  const isProduction = argv.mode === 'production';

  return {
    entry: {
      main: './assets/src/js/main.js',
    },
    output: {
      path: path.resolve(__dirname, 'assets/dist'),
      filename: 'js/[name].bundle.js'
    },
    watch: !isProduction,
    module: {
      rules: [
        {
          test: /\.js$/,
          exclude: /node_modules/,
          use: {
            loader: 'babel-loader',
            options: {
              presets: ['@babel/preset-env']
            }
          }
        },
        {
          test: /\.(sa|sc|c)ss$/,
          use: [
            MiniCssExtractPlugin.loader,
            'css-loader',
            {
              loader: 'postcss-loader',
              options: {
                postcssOptions: {
                  plugins: [
                    require('autoprefixer')()
                  ],
                },
              },
            },
            'sass-loader'
          ]
        }
      ]
    },
    optimization: {
      minimize: isProduction,
      minimizer: [
        new TerserWebpackPlugin(),
        new CssMinimizerPlugin()
      ]
    },
    plugins: [
      new CleanWebpackPlugin(),
      new MiniCssExtractPlugin({
        filename: 'css/[name].css'
      })
    ],
    devtool: isProduction ? 'source-map' : 'eval-source-map',
  }
};