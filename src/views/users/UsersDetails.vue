<script setup>
import axios from "axios"
import Nav from "../../components/Nav.vue"
import Sidebar from "../../components/Sidebar.vue"
import { useRoute } from "vue-router"
import { ref } from "vue"

const route = useRoute()

let user = JSON.parse(localStorage.getItem('user'))
let userInfo = ref(null)

const getUser = () => {
  var data = new FormData()
  data.append('action', 'getuser')
  data.append('id', route.params.idUser)
  data.append('token', user.token)

  var config = {
    method: 'post',
    url: 'https://ecommerce-app-0a.herokuapp.com/app/UsersController.php',
    data: data
  }

  axios(config)
    .then((response) => {
      userInfo.value = response.data.data
    })
    .catch(function (error) {
      console.log(error)
    })

}



getUser()

</script>

<template>

  <Nav />
  <Sidebar />
  <div v-if="userInfo" class="main-content">

    <div class="page-content">
      <div class="container-fluid">
        <div class="profile-foreground position-relative mx-n4 mt-n4">
          <div class="profile-wid-bg">
            <img src="../../assets/images/profile-bg.jpg" alt="" class="profile-wid-img" />
          </div>
        </div>
        <div class="pt-4 mb-4 mb-lg-3 pb-lg-4">
          <div class="row g-4">
            <div class="col-auto">
              <div class="avatar-lg">
                <img :src="userInfo.avatar" alt="user-img" class="img-thumbnail rounded-circle" />
              </div>
            </div>
            <!--end col-->
            <div class="col">
              <div class="p-2">
                <h3 class="text-white mb-1">{{ userInfo.name + ' ' + userInfo.lastname }}</h3>
                <p class="text-white-75">{{ userInfo.role }}</p>
                <div class="hstack text-white-50 gap-1">
                  <div class="me-2"><i class="ri-map-pin-user-line me-1 text-white-75 fs-16 align-middle"></i>{{
                      userInfo.email
                  }}
                  </div>
                  <div>
                    <i class="ri-building-line me-1 text-white-75 fs-16 align-middle"></i>{{ userInfo.created_by }}
                  </div>
                </div>
              </div>
            </div>
            <!--end col-->


          </div>
          <!--end row-->
        </div>

        <div class="row mt-5">
          <div class="col-lg-12">
            <div class="card mt-xxl-n5">
              <div class="card-header">
                <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                      <i class="fas fa-home"></i> Información
                    </a>
                  </li>

                </ul>
              </div>
              <div class="card-body p-4">
                <div class="tab-content">
                  <div class="tab-pane active" id="personalDetails" role="tabpanel">
                    <form action="javascript:void(0)">
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="mb-3">
                            <label for="firstnameInput" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="firstnameInput" :placeholder="userInfo.name" disabled>
                          </div>
                        </div>
                        <!--end col-->
                        <div class="col-lg-6">
                          <div class="mb-3">
                            <label for="lastnameInput" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="lastnameInput" :placeholder="userInfo.lastname" disabled>
                          </div>
                        </div>
                        <!--end col-->
                        <div class="col-lg-6">
                          <div class="mb-3">
                            <label for="phonenumberInput" class="form-label">Teléfono</label>
                            <input type="text" class="form-control" id="phonenumberInput" placeholder="Teléfono" disabled>
                          </div>
                        </div>
                        <!--end col-->
                        <div class="col-lg-6">
                          <div class="mb-3">
                            <label for="emailInput" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" id="emailInput" :placeholder="userInfo.email" disabled>
                          </div>
                        </div>
                        <!--end col-->
                        <div class="col-lg-12">
                          <div class="mb-3">
                            <label for="emailInput" class="form-label">Rol</label>
                            <input type="email" class="form-control" id="emailInput" :placeholder="userInfo.role" disabled>
                          </div>
                        </div>
                        <!--end col-->
                        <div class="col-lg-12">
                          <div class="mb-3">
                            <label for="emailInput" class="form-label">Creador</label>
                            <input type="email" class="form-control" id="emailInput" :placeholder="userInfo.created_by" disabled>
                          </div>
                        </div>
                        <!--end col-->
                        <div class="col-lg-6">
                          <div class="mb-3">
                            <label for="phonenumberInput" class="form-label">Fecha de creación</label>
                            <input type="text" class="form-control" id="phonenumberInput"
                              :placeholder="userInfo.created_at" disabled>
                          </div>
                        </div>
                        <!--end col-->
                        <div class="col-lg-6">
                          <div class="mb-3">
                            <label for="emailInput" class="form-label">Ultima actualización</label>
                            <input type="email" class="form-control" id="emailInput" :placeholder="userInfo.updated_at" disabled>
                          </div>
                        </div>


                      </div>
                      <!--end row-->
                    </form>
                  </div>


                </div>
              </div>
            </div>
          </div>
          <!--end col-->
        </div>
        <!--end row-->


      </div><!-- container-fluid -->
    </div><!-- End Page-content -->


  </div><!-- end main content-->
</template>