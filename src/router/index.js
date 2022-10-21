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
      path: "/clients/:idClient",
      name: "client",
      component: () => import("../views/clients/ClientDetails.vue"),
    },
    {
      path: "/address/:idAddress",
      name: "address",
      component: () => import("../views/clients/ClientAddress.vue"),
    },
    {
      path: "/users",
      name: "users",
      component: () => import("../views/users/Users.vue"),
    },
    {
      path: "/users/:idUser",
      name: "user",
      component: () => import("../views/users/UsersDetails.vue"),
    },
    {
      path: "/products",
      name: "products",
      component: () => import("../views/products/Products.vue"),
    },
    {
      path: "/products/:slugProduct",
      name: "product",
      component: () => import("../views/products/ProductsDetails.vue"),
    },
    {
      path: "/products/pres",
      name: "presentation",
      component: () => import("../views/products/PresentationsDetails.vue"),
    },
    {
      path: "/orders",
      name: "orders",
      component: () => import("../views/orders/Orders.vue"),
    },
    {
      path: "/orders/details",
      name: "order",
      component: () => import("../views/orders/OrdersDetails.vue"),
    },
    {
      path: "/catalogs/details",
      name: "catalog",
      component: () => import("../views/catalogs/CatalogsDetails.vue"),
    },
    {
      path: "/catalogs",
      name: "catalogs",
      component: () => import("../views/catalogs/Catalogs.vue"),
    },
    {
      path: "/coupons/details",
      name: "coupons",
      component: () => import("../views/coupons/CouponsDetails.vue"),
    },
    {
      path: "/coupons",
      name: "coupon",
      component: () => import("../views/coupons/Coupons.vue"),
    },
  ],
});

export default router;
