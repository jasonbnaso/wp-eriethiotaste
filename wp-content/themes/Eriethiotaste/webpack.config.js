const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const OptimizeCssAssetsPlugin = require("optimize-css-assets-webpack-plugin");
const cssnano = require("cssnano");
const { CleanWebpackPlugin } = require("clean-webpack-plugin");
const UglifyJsPlugin = require("uglifyjs-webpack-plugin");
const CopyPlugin = require("copy-webpack-plugin");
const DependencyExtractionWebpackPlugin = require("@wordpress/dependency-extraction-webpack-plugin");

const JS_DIR = path.resolve(__dirname, "src/js"); 
const IMG_DIR = path.resolve(__dirname, "src/img");
const LIB_DIR = path.resolve(__dirname, "src/library");
const DIST_DIR = path.resolve(__dirname, "dist");

const entry = {
  main: JS_DIR + "/main.js",
  single: JS_DIR + "/single.js",
};

const output = {
  path: DIST_DIR,
  filename: "js/[name].js",
};

const plugins = (argv) => [
  new CleanWebpackPlugin({
    cleanStaleWebpackAssets: "production" === argv.mode, 
  }),

  new MiniCssExtractPlugin({
    filename: "css/[name].css",
  }),

  new CopyPlugin({
    patterns: [{ from: LIB_DIR, to: DIST_DIR + "/library" }],
  }),

  new DependencyExtractionWebpackPlugin({
    injectPolyfill: true,
    combineAssets: true,
  }),
];
const rules = [
  {
    test: /\.js$/,
    include: [JS_DIR],
    exclude: /node_modules/,
    use: "babel-loader",
  },
   {
       test: /\.scss$/i,
       exclude: /node_modules/,
       use: [
           MiniCssExtractPlugin.loader,
           'css-loader',
           'sass-loader',
       ]
   },
  {
    test: /\.(png|jpg|svg|jpeg|gif|ico)$/,
    use: {
      loader: "file-loader",
      options: {
        name: "[path][name].[ext]",
        publicPath: "production" === process.env.NODE_ENV ? "../" : "../../",
      },
    },
  },
  {
    test: /\.(ttf|otf|eot|svg|woff(2)?)(\?[a-z0-9]+)?$/,
    exclude: [IMG_DIR, /node_modules/],
    use: {
      loader: "file-loader",
      options: {
        name: "[path][name].[ext]",
        publicPath: "production" === process.env.NODE_ENV ? "../" : "../../",
      },
    },
  },
];

/**
 * Since you may have to disambiguate in your webpack.config.js between development and production builds,
 * you can export a function from your webpack configuration instead of exporting an object
 *
 * @param {string} env environment ( See the environment options CLI documentation for syntax examples. https://webpack.js.org/api/cli/#environment-options )
 * @param argv options map ( This describes the options passed to webpack, with keys such as output-filename and optimize-minimize )
 * @return {{output: *, devtool: string, entry: *, optimization: {minimizer: [*, *]}, plugins: *, module: {rules: *}, externals: {jquery: string}}}
 *
 * @see https://webpack.js.org/configuration/configuration-types/#exporting-a-function
 */
module.exports = (env, argv) => ({
  entry: entry,
  output: output,
  watch: true,

  devtool: "source-map",
  module: {
    rules: rules,
  },

  optimization: {
    minimizer: [
      new OptimizeCssAssetsPlugin({
        cssProcessor: cssnano,
      }),

      new UglifyJsPlugin({
        cache: false,
        parallel: true,
        sourceMap: false,
      }),
    ],
  },

  plugins: plugins(argv),
});

