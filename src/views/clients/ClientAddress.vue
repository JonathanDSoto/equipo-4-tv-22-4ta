<script setup>
import axios from "axios"
import { ref } from "vue"
import { useRoute, RouterLink } from 'vue-router'
import Nav from "../../components/Nav.vue";
import Sidebar from "../../components/Sidebar.vue";

let user = JSON.parse(localStorage.getItem('user'))
const address = ref(null)
const route = useRoute()

const getAddress = () => {
  var data = new FormData();
  data.append('action', 'getAddress');
  data.append('id', route.params.idAddress);
  data.append('token', user.token);

  var config = {
    method: 'post',
    url: 'https://ecommerce-app-0a.herokuapp.com/app/AddressController.php',
    data: data
  };

  axios(config)
    .then((response) => {
      address.value = response.data.data
    })
    .catch(function (error) {
      console.log(error);
    });
}
getAddress();
</script>

<template>
  <Nav />
  <Sidebar />
  <div class="main-content">

    <div class="page-content">
      <div class="container-fluid">
        <div class="profile-foreground position-relative mx-n4 mt-n4">
          <div class="profile-wid-bg">
            <img src="../../assets/images/profile-bg.jpg" alt="" class="profile-wid-img" />
          </div>
        </div>
        <div class="pt-4 mb-4 mb-lg-3 pb-lg-4">
          <div class="row g-4">


            <div class="col">
              <div class="p-2">
                <h3 class="text-white mb-1">Detalles de dirección</h3>
                <p class="text-white-75">{{ address.street_and_use_number }}</p>

              </div>
            </div>



          </div>

        </div>



        <div class="row mt-5">
          <div class="col-lg-12">
            <div class="card mt-xxl-n5">
              <div class="card-header">
                <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                      <i class="fas fa-home"></i> Dirección
                    </a>
                  </li>


                </ul>
              </div>
              <div class="card-body p-4">
                <div class="tab-content">
                  <div class="tab-pane active" id="personalDetails" role="tabpanel">
                    <form action="javascript:void(0);">
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="mb-3">
                            <label for="firstnameInput" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="firstnameInput" placeholder="Nombre"
                              :value="address.first_name" disabled>
                          </div>
                        </div>

                        <div class="col-lg-6">
                          <div class="mb-3">
                            <label for="lastnameInput" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="lastnameInput" placeholder="Apellido"
                              :value="address.last_name" disabled>
                          </div>
                        </div>


                        <div class="col-lg-6">
                          <div class="mb-3">
                            <label for="phonenumberInput" class="form-label">Calle y número</label>
                            <input type="text" class="form-control" id="phonenumberInput" placeholder="Calle y número"
                              :value="address.street_and_use_number" disabled>
                          </div>
                        </div>

                        <div class="col-lg-6">
                          <div class="mb-3">
                            <label for="emailInput" class="form-label">Apartamento</label>
                            <input type="email" class="form-control" id="emailInput" placeholder="Apartamento"
                              :value="address.apartment" disabled>
                          </div>
                        </div>

                        <div class="col-lg-12">
                          <div class="mb-3">
                            <label for="lastnameInput" class="form-label">Código postal</label>
                            <input type="text" class="form-control" id="lastnameInput" placeholder="Apellido"
                              :value="address.postal_code" disabled>
                          </div>
                        </div>


                        <div class="col-lg-6">
                          <div class="mb-3">
                            <label for="phonenumberInput" class="form-label">Ciudad</label>
                            <input type="text" class="form-control" id="phonenumberInput" placeholder="Calle y número"
                              :value="address.city" disabled>
                          </div>
                        </div>

                        <div class="col-lg-6">
                          <div class="mb-3">
                            <label for="emailInput" class="form-label">Provincia</label>
                            <input type="email" class="form-control" id="emailInput" placeholder="Apartamento"
                              :value="address.province" disabled>
                          </div>
                        </div>


                        <div class="col-lg-12">
                          <div class="mb-3">
                            <label for="emailInput" class="form-label">Teléfono</label>
                            <input type="email" class="form-control" id="emailInput" placeholder="(612) 000-0000"
                              :value="address.phone_number" disabled>
                          </div>
                        </div>



                      </div>

                    </form>
                  </div>





                </div>
              </div>
            </div>
          </div>

        </div>



      </div>
    </div>


  </div>
</template>