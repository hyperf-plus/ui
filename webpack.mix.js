const mix = require("laravel-mix");
mix.config.webpackConfig.output = {
  publicPath: "/static/",
};

mix
  .js("resources/js/app.js", "public")
  .extract(["axios", "vue", "vuex", "vue-router", "element-ui"])
  .setResourceRoot("/static")
  .setPublicPath("public")
  .copy("public", "../public/static")
  .sourceMaps()
  .webpackConfig({
    resolve: {
      alias: {
        "@": path.resolve(__dirname, "resources/js/"),
      },
    },
    module: {
      rules: [],
    },
  })
  .options({
    extractVueStyles: false,
    processCssUrls: false,
  })
  .disableNotifications()

if (mix.inProduction()) {
  mix.version();
}