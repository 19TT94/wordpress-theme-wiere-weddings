const mix = require("laravel-mix");

mix.js("assets/js/admin.js", "dist");
mix.js("assets/js/main.js", "dist");

mix.sass("assets/scss/admin.scss", "dist");
mix.sass("assets/scss/main.scss", "dist");
