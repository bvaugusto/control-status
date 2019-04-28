// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from "vue";
import App from "./App";
import VueResource from "vue-resource";

import VueRouter from "vue-router";
import { routes } from "./router";

// import jquery from "vue-jquery";
import Toasted from "vue-toasted";
import "./plugins/assets";
import store from "./store";

import Vuetable from "vuetable-2";

// import "jquery/dist/jquery.js";
// import jQuery from "jQuery";
// window.jQuery = jQuery;

// window.$ = require('jquery')
// window.JQuery = require('jquery')

// import "jquery/dist/jquery.js";
// import "bootstrap/dist/js/bootstrap.js";

// import $ from "jquery";
// window.jQuery = $;
// window.$ = $;

Vue.config.productionTip = false;
Vue.use(VueResource);
Vue.use(VueRouter);
// Vue.use(jquery);
Vue.use(Toasted);

Vue.use(Vuetable);
Vue.component("vuetable", Vuetable);

const router = new VueRouter({
  routes,
  mode: "history"
});

/* eslint-disable no-new */
// new Vue({
//   el: "#app",
//   router,
//   store,
//   components: { App },
//   template: "<App/>"
// });

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount("#app");
