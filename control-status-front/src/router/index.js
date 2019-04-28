import Home from "../components/Home";
import Machine from "../components/machine/Machine";
import MachineCreate from "../components/machine/MachineCreate";
import MachineEdit from "../components/machine/MachineEdit";
import Status from "../components/status/Status";
import StatusCreate from "../components/status/StatusCreate";
import StatusEdit from "../components/status/StatusEdit";

export const routes = [
  {
    path: "",
    component: Home,
    title: "Home",
    icon: "fa fa-home",
    menu: true
  },
  {
    path: "/machine",
    component: Machine,
    title: "Máquinas",
    icon: "fa fa-home",
    menu: true
  },
  {
    path: "/machine/create",
    component: MachineCreate,
    title: "Cadastro de Máquina",
    menu: false
  },
  {
    path: "/machine/:id/edit",
    component: MachineEdit,
    title: "Edição de Máquina",
    menu: false
  },
  {
    path: "/status",
    component: Status,
    title: "Status",
    icon: "fa fa-home",
    menu: true
  },
  {
    path: "/status/create",
    component: StatusCreate,
    title: "Cadastro de Status",
    menu: false
  },
  {
    path: "/status/create",
    component: StatusEdit,
    title: "Edição de Status",
    menu: false
  }
];
