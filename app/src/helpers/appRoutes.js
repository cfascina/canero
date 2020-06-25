// Pages
import BuildingDetails from "../pages/BuildingDetails";
import BuildingEdit from "../pages/BuildingEdit";
import BuildingList from "../pages/BuildingList";
import Expenses from "../pages/Expenses";
import Home from "../pages/Home";

export const appRoutes = [
  {
    path: "/",
    name: "Início",
    component: Home,
    exact: true,
    atSidebar: true
  },
  {
    path: '/obras',
    name: "Obras",
    component: BuildingList,
    exact: true,
    atSidebar: true
  },
  {
    path: '/obras/:id/editar',
    name: "Obras - Editar",
    component: BuildingEdit,
    exact: false,
    atSidebar: false
  },
  {
    path: '/obras/:id/detalhes',
    name: "Obras - Detalhes",
    component: BuildingDetails,
    exact: false,
    atSidebar: false
  },
  {
    path: '/gastos',
    name: "Gastos",
    component: Expenses,
    exact: false,
    atSidebar: true
  }
];
