import Vue from "vue";
import Vuex from "vuex";
import machineCreate from "./modules/machine/machineCreate";
import machineEdit from "./modules/machine/machineEdit";
import simulatorCreate from "./modules/simulator/simulatorCreate";
import simulatorEdit from "./modules/simulator/simulatorEdit";
import statusCreate from "./modules/status/statusCreate";
import statusUpdate from "./modules/status/statusUpdate";

Vue.use(Vuex);

export default new Vuex.Store({
  modules: {
    machineCreate,
    machineEdit,
    simulatorCreate,
    simulatorEdit,
    statusCreate,
    statusUpdate
  }
});
