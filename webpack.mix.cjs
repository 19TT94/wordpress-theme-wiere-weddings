const mix = require("laravel-mix");

mix.sass("assets/scss/main.scss", "dist");
mix.js("assets/js/main.ts", "dist");
mix.webpackConfig({
  module: {
    rules: [
      {
        test: /\.tsx?$/,
        loader: "ts-loader",
        exclude: /node_modules/
      }
    ]
  },
  resolve: {
    extensions: ["*", ".js", ".ts"]
  }
});
