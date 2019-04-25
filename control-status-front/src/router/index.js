import OrganizacaoEdit from "../components/OrganizacaoEdit";
import Organizacao from "../components/Organizacao";
import Home from "../components/Home";

export const routes = [
  {
    path: "",
    component: Home,
    title: "Home",
    icon: "fa-home",
    menu: true
  },
  {
    path: "/organizacao",
    component: Organizacao,
    title: "Organização",
    icon: "fa-edit",
    menu: true
  },
  {
    path: "/organizacao/:id/edit",
    component: OrganizacaoEdit,
    title: "Editar Organização",
    icon: "fa-edit",
    menu: false
  }
];
