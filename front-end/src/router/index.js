import { createRouter, createWebHashHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";
import MenuView from "../views/MenuView.vue";
import DashboardView from "../views/DashboardView.vue";
import CartComponent from '@/components/CartComponent.vue';
import Profileview from "../views/ProfileView.vue";


const routes = [
  {
    path: "/",
    name: "home",
    component: HomeView,
  },
  {
    path: "/Menu",
    name: "Menu",
    component: MenuView,
  },
  {
    path: "/about",
    name: "about",
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/AboutView.vue"),
  },
  {
    path: "/Dashboard",
    name: "Dashboard",
    component: DashboardView,
  },
  {
    path: "/Cart",
    name:"Cart",
    component: CartComponent,
  },
  {
    path:"/Profile",
    name:"Profile",
    component:Profileview,
  }
];

const router = createRouter({
  history: createWebHashHistory(),
  routes,
});

export default router;
