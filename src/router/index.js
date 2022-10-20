import { createRouter, createWebHistory } from "vue-router";
import login from "../views/auth/Login.vue";
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "login",
      component: login,
    },
    {
      path: "/clients",
      name: "clients",
      component: () => import("../views/clients/Clients.vue"),
    },
    {
      path: "/client/:idClient",
      name: "client",
      component: () => import("../views/clients/ClientDetails.vue"),
    },
    {
      path: "/address/:idAddress",
      name: "address",
      component: () => import("../views/clients/ClientAddress.vue"),
    },
  ],
});

export default router;
