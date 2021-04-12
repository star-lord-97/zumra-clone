const mix = require("laravel-mix");

mix.js("resources/js/scripts.js", "resources/js/bundled.js")
    .postCss("style.css", "resources/css", [require("tailwindcss"), require("postcss-nested")])
    .browserSync({
        proxy: "http://localhost/zumra-clone/",
        files: ["*.php", "templates/*.php", "resources/js/*.js", "style.css"],
        notify: false,
    });
