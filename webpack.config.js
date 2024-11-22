const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");
const path = require('path');

module.exports = {
  entry: './assets/src/index.js',
  output: {
    filename: 'main.bundle.js',
    path: path.resolve(__dirname, 'assets/dist'),
    clean: true
  },
  module: {
   rules: [
      {
        test: /\.scss$/,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          'sass-loader', 
        ],
      },
   ],
 },
 plugins: [
   new MiniCssExtractPlugin({
     filename: '[name].css', 
   }),
 ],
 optimization: {
   minimize: true,
   minimizer: [
     `...`,
     new CssMinimizerPlugin(),
   ],
 },
  mode: 'production', // 'development' or 'production'
};
