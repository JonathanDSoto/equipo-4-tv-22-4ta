<script setup>
import axios from "axios";
import { useRouter, RouterLink } from 'vue-router'
const router = useRouter()

let user = JSON.parse(localStorage.getItem('user'))

const logout = () => {
  let data = new FormData()
  data.append('action', 'logout')
  data.append('email', user.email)
  data.append('token', user.token)

  let config = {
    method: 'post',
    url: 'https://ecommerce-app-0a.herokuapp.com/auth',
    data: data
  }

  axios(config)
    .then(function (response) {
      console.log(response.data)
      if (response.data.code > 0) {
        router.push({ path: '/' })
      }
    })
    .catch(function (error) {
      console.log(error)
    })
}

const getUser = () => {
  var data = new FormData();
  data.append('action', 'getuser');
  data.append('id', user.id);
  data.append('token', user.token);

  var config = {
    method: 'post',
    url: 'https://ecommerce-app-0a.herokuapp.com/app/UsersController.php',
    data: data
  };

  axios(config)
    .then((response) => {
      user = response.data
    })
    .catch(function (error) {
      console.log(error);
    });

}

getUser()

</script>

<template>
  <!-- Begin page -->
  <div id="layout-wrapper">

    <header id="page-topbar">
      <div class="layout-width">
        <div class="navbar-header">
          <div class="d-md-none">
            <!-- LOGO -->
            <div class=" horizontal-logo">
              <RouterLink :to="{ name: 'users' }" class="logo logo-dark">
                <span class="logo-sm">
                  <img src="../assets/images/logo-sm.png" alt="" height="22">
                </span>
                <span class="logo-lg">
                  <img src="../assets/images/logo-dark.png" alt="" height="17">
                </span>
              </RouterLink>

              <RouterLink :to="{ name: 'users' }" class="logo logo-light">
                <span class="logo-sm">
                  <img src="../assets/images/logo-sm.png" alt="" height="22">
                </span>
                <span class="logo-lg">
                  <img src="../assets/images/logo-light.png" alt="" height="17">
                </span>
              </RouterLink>
            </div>
          </div>

          <div class="ms-auto d-flex align-items-center">


            <div class="ms-1 header-item d-none d-sm-flex">
              <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle shadow-none"
                data-toggle="fullscreen">
                <i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-fullscreen" viewBox="0 0 16 16">
                    <path
                      d="M1.5 1a.5.5 0 0 0-.5.5v4a.5.5 0 0 1-1 0v-4A1.5 1.5 0 0 1 1.5 0h4a.5.5 0 0 1 0 1h-4zM10 .5a.5.5 0 0 1 .5-.5h4A1.5 1.5 0 0 1 16 1.5v4a.5.5 0 0 1-1 0v-4a.5.5 0 0 0-.5-.5h-4a.5.5 0 0 1-.5-.5zM.5 10a.5.5 0 0 1 .5.5v4a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 0 14.5v-4a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v4a1.5 1.5 0 0 1-1.5 1.5h-4a.5.5 0 0 1 0-1h4a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 1 .5-.5z" />
                  </svg></i>
              </button>
            </div>

            <div class="ms-1 header-item d-none d-sm-flex">
              <button type="button"
                class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode shadow-none">
                <i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-moon"
                    viewBox="0 0 16 16">
                    <path
                      d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278zM4.858 1.311A7.269 7.269 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.316 7.316 0 0 0 5.205-2.162c-.337.042-.68.063-1.029.063-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286z" />
                  </svg></i>
              </button>
            </div>


            <div class="dropdown ms-sm-3 header-item topbar-user">

              <button type="button" class="btn shadow-none" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="d-flex align-items-center">
                  <img class="rounded-circle header-profile-user" :src="user.avatar" alt="Header Avatar">
                  <span class="text-start ms-xl-2">
                    <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ user.name }}</span>
                    <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">{{ user.role }}</span>
                  </span>
                </span>
              </button>

              <div class="dropdown-menu dropdown-menu-end">
                <!-- item-->
                <h6 class="dropdown-header">Welcome {{ user.name }}!</h6>
                <RouterLink :to="{ path: '/users/' + user.id }" class="dropdown-item">
                  <span class="align-middle">Profile</span>
                </RouterLink>

                <RouterLink :to="{ path: '/' }" v-on:click="logout" class="dropdown-item"><i
                    class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle"
                    data-key="t-logout">Logout</span></RouterLink>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
  </div>
</template>