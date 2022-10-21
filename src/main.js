import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";

import "./assets/css/app.min.css";
import "./assets/css/bootstrap.min.css";
import "./assets/css/icons.min.css";

import "./assets/js/layout.js";
import "./assets/libs/bootstrap/js/bootstrap.bundle.min.js";
import "./assets/libs/simplebar/simplebar.min.js";
// import "./assets/libs/node-waves/waves.min.js";
// import "./assets/libs/feather-icons/feather.min.js";
import "./assets/js/pages/plugins/lord-icon-2.1.0.js";
import "./assets/js/plugins.js";
import "./assets/libs/nouislider/nouislider.min.js";
import "./assets/libs/wnumb/wNumb.min.js";
// import "./assets/libs/gridjs/gridjs.umd.js";
// import "./assets/js/pages/ecommerce-product-list.init.js";
// import "./assets/js/app.js";
import "./assets/libs/prismjs/prism.js";
// import "./assets/libs/list.js/list.min.js";
// import "./assets/libs/list.pagination.js/list.pagination.min.js";
// import "./assets/js/pages/listjs.init.js";
import "./assets/libs/sweetalert2/sweetalert2.min.js";
import "./assets/js/pages/profile-setting.init.js";
// import "./assets/libs/swiper/swiper-bundle.min.js";
import "./assets/libs/masonry-layout/masonry.pkgd.min.js";
import "./assets/libs/apexcharts/apexcharts.min.js";
import "./assets/libs/jsvectormap/js/jsvectormap.min.js";
import "./assets/libs/jsvectormap/maps/world-merc.js";
import "./assets/libs/jsvectormap/maps/us-merc-en.js";

import "./assets/js/pages/widgets.init.js";

const app = createApp(App);

app.use(router);

app.mount("#app");
