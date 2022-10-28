<template>
  <!-- ========== App Menu ========== -->
  <div class="app-menu navbar-menu 	d-none d-md-block">
    <!-- LOGO -->
    <div class="navbar-brand-box">
      <!-- Dark Logo-->
      <RouterLink :to="{name: 'users'}" class="logo logo-dark">
        <span class="logo-sm">
          <img src="../assets/images/logo-sm.png" alt="" height="22">
        </span>
        <span class="logo-lg">
          <img src="../assets/images/logo-dark.png" alt="" height="17">
        </span>
      </RouterLink>
      <!-- Light Logo-->
      <RouterLink :to="{name: 'users'}" class="logo logo-light">
        <span class="logo-sm">
          <img src="../assets/images/logo-sm.png" alt="" height="22">
        </span>
        <span class="logo-lg">
          <img src="../assets/images/logo-light.png" alt="" height="17">
        </span>
      </RouterLink>
      <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
        id="vertical-hover">
      </button>
    </div>

    <div id="scrollbar">
      <div class="container-fluid">

        <div id="two-column-menu">
        </div>
        <ul class="navbar-nav" id="navbar-nav">
          <li class="menu-title"><span data-key="t-menu">Menu</span></li>
          <!-- <li class="nav-item">
            <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button"
              aria-expanded="false" aria-controls="sidebarDashboards">
              <span data-key="t-dashboards">Dashboards</span>
            </a>
            <div class="collapse menu-dropdown" id="sidebarDashboards">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="dashboard-analytics.html" class="nav-link" data-key="t-analytics"> Analytics </a>
                </li>
                <li class="nav-item">
                  <a href="dashboard-crm.html" class="nav-link" data-key="t-crm"> CRM </a>
                </li>
                <li class="nav-item">
                  <a href="index.html" class="nav-link" data-key="t-ecommerce"> Ecommerce </a>
                </li>
                <li class="nav-item">
                  <a href="dashboard-crypto.html" class="nav-link" data-key="t-crypto"> Crypto </a>
                </li>
                <li class="nav-item">
                  <a href="dashboard-projects.html" class="nav-link" data-key="t-projects"> Projects </a>
                </li>
                <li class="nav-item">
                  <a href="dashboard-nft.html" class="nav-link" data-key="t-nft"> NFT</a>
                </li>
              </ul>
            </div>
          </li> -->

          <li class="nav-item">
            <RouterLink :to="{name: 'users'}" class="nav-link menu-link" data-bs-toggle="" role="button"
              aria-expanded="false" aria-controls="">
              <i>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people"
                  viewBox="0 0 16 16">
                  <path
                    d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
                </svg>
              </i><span data-key="t-dashboards">Usuarios</span>
            </RouterLink>
          </li> <!-- end Dashboard Menu -->

          <li class="nav-item">
            <RouterLink :to="{name: 'clients'}" class="nav-link menu-link" data-bs-toggle="" role=" button"
              aria-expanded="false" aria-controls="sidebarDashboards">
              <i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                  class="bi bi-file-person" viewBox="0 0 16 16">
                  <path
                    d="M12 1a1 1 0 0 1 1 1v10.755S12 11 8 11s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h8zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z" />
                  <path d="M8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                </svg></i><span data-key="t-dashboards">Clientes</span>
            </RouterLink>
          </li> <!-- end Dashboard Menu -->

          <li class="nav-item">
            <RouterLink :to="{name: 'products'}" class="nav-link menu-link" data-bs-toggle="" role="button"
              aria-expanded="false" aria-controls="sidebarDashboards">
              <i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-boxes"
                  viewBox="0 0 16 16">
                  <path
                    d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434L7.752.066ZM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567L4.25 7.504ZM7.5 9.933l-2.75 1.571v3.134l2.75-1.571V9.933Zm1 3.134 2.75 1.571v-3.134L8.5 9.933v3.134Zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567-2.742 1.567Zm2.242-2.433V3.504L8.5 5.076V8.21l2.75-1.572ZM7.5 8.21V5.076L4.75 3.504v3.134L7.5 8.21ZM5.258 2.643 8 4.21l2.742-1.567L8 1.076 5.258 2.643ZM15 9.933l-2.75 1.571v3.134L15 13.067V9.933ZM3.75 14.638v-3.134L1 9.933v3.134l2.75 1.571Z" />
                </svg></i><span data-key="t-dashboards">Productos</span>
            </RouterLink>
          </li> <!-- end Dashboard Menu -->

          <li class="nav-item">
            <RouterLink :to="{name: 'catalogs'}" class="nav-link menu-link" data-bs-toggle="" role="button"
              aria-expanded="false" aria-controls="sidebarDashboards">
              <i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                  class="bi bi-collection" viewBox="0 0 16 16">
                  <path
                    d="M2.5 3.5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11zm2-2a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1h-7zM0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6v7zm1.5.5A.5.5 0 0 1 1 13V6a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-13z" />
                </svg></i><span data-key="t-dashboards">Catálogos</span>
            </RouterLink>
          </li> <!-- end Dashboard Menu -->

          <li class="nav-item">
            <RouterLink :to="{name: 'coupons'}" class="nav-link menu-link" data-bs-toggle="" role="button"
              aria-expanded="false" aria-controls="sidebarDashboards">
              <i>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ticket"
                  viewBox="0 0 16 16">
                  <path
                    d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6V4.5ZM1.5 4a.5.5 0 0 0-.5.5v1.05a2.5 2.5 0 0 1 0 4.9v1.05a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-1.05a2.5 2.5 0 0 1 0-4.9V4.5a.5.5 0 0 0-.5-.5h-13Z" />
                </svg>
              </i><span data-key="t-dashboards">Cupones</span>
            </RouterLink>
          </li> <!-- end Dashboard Menu -->
          <li class="nav-item">
            <RouterLink :to="{name: 'orders'}" class="nav-link menu-link" data-bs-toggle="" role="button"
              aria-expanded="false" aria-controls="sidebarDashboards">
              <i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket"
                  viewBox="0 0 16 16">
                  <path
                    d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z" />
                </svg></i><span data-key="t-dashboards">Ordenes</span>
            </RouterLink>
          </li> <!-- end Dashboard Menu -->

        </ul>
      </div>
      <!-- Sidebar -->

    </div>

  </div>

</template>