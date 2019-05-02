import Vue from "vue";
import App from "./App";
import VueResource from "vue-resource";

import VueRouter from "vue-router";
import { routes } from "./router";

import Toasted from "vue-toasted";
import Vuetable from "vuetable-2";

import "./plugins/assets";
import store from "./store";

Vue.config.productionTip = false;
Vue.use(VueResource);
Vue.use(VueRouter);
Vue.use(Toasted);

Vue.use(Vuetable);
Vue.component("vuetable", Vuetable);

const router = new VueRouter({
  routes,
  mode: "history"
});

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount("#app");
