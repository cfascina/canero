// Pages
import Home from "../pages/Home";
import Buildings from "../pages/Buildings";
import Expenses from "../pages/Expenses";

export const appRoutes = [
  {
    path: "/",
    name: "Início",
    component: Home,
    exact: true
  },
  {
    path: '/obras',
    name: "Obras",
    component: Buildings,
    exact: false
  },
  {
    path: '/gastos',
    name: "Gastos",
    component: Expenses,
    exact: false
  }
];
