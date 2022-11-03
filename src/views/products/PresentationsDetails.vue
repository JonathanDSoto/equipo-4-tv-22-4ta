<script setup>
import axios from "axios"
import Nav from "../../components/Nav.vue"
import Sidebar from "../../components/Sidebar.vue"
import { useRoute, useRouter, RouterLink } from "vue-router"
import { ref } from "vue"

const route = useRoute()
const router = useRouter()

let user = JSON.parse(localStorage.getItem('user'))
let presentation = ref(null)

Swal.fire({
  title: '',
  didOpen: () => {
    Swal.showLoading()
  }
})


const getPresentation = () => {
  let data = new FormData();
  data.append('action', 'getPresentation');
  data.append('id', route.params.idpresentation);
  data.append('token', user.token);

  let config = {
    method: 'post',
    url: 'https://ecommerce-app-0a.herokuapp.com/presentation',
    data: data
  };

  axios(config)
    .then((response) => {
      if (response.data.data) {
        presentation.value = response.data.data
        Swal.close()
      } else {
        swal.fire(
          'Error',
          'Error de carga!',
          'error'
        ).then((result) => {
          if (result.isConfirmed) {
            router.go(-1)
          }
        })
      }
    })
    .catch((error) => {
      console.log(error);
    });
}
getPresentation()
</script>

<template>

  <Nav />
  <Sidebar />

  <div v-if="presentation" class="main-content">

    <div class="page-content">
      <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
          <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
              <h4 class="mb-sm-0">Detalles de producto</h4>

              <div class="page-title-right">
                <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                  <li class="breadcrumb-item active">Product Details</li>
                </ol>
              </div>

            </div>
          </div>
        </div>
        <!-- end page title -->

        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <div class="row gx-lg-5">
                  <div class="col-xl-4 col-md-8 mx-auto">
                    <div class="product-img-slider sticky-side-div">

                      <div class="swiper product-thumbnail-slider p-2 rounded bg-light">
                        <div class="swiper-wrapper">
                          <div class="swiper-slide">
                            <img :src="presentation.cover" alt="" class="img-fluid d-block" />
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                  <!-- end col -->

                  <div class="col-xl-8">
                    <div class="mt-xl-0 mt-5">
                      <div class="d-flex">
                        <div class="flex-grow-1">
                          <h4>{{ presentation.product.name }}</h4>
                          <div class="hstack gap-3 flex-wrap">
                            <div class="text-muted">Slug : <span class="text-body fw-medium">{{
                                presentation.product.slug
                            }}</span></div>

                          </div>
                        </div>


                      </div>

                      <div class="row mt-4">
                        <div class="col-lg-3 col-sm-6">
                          <div class="p-2 border border-dashed rounded">
                            <div class="d-flex align-items-center">
                              <div class="avatar-sm me-2">
                                <div class="avatar-title rounded bg-transparent text-success fs-24">
                                  <i class="ri-money-dollar-circle-fill"></i>
                                </div>
                              </div>
                              <div class="flex-grow-1">
                                <p class="text-muted mb-1">Precio :</p>
                                <h5 class="mb-0" v-if="presentation.current_price">$ {{
                                    presentation.current_price.amount
                                }}</h5>
                                <h5 class="mb-0" v-else>Sin Datos</h5>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- end col -->
                        <div class="col-lg-3 col-sm-6">
                          <div class="p-2 border border-dashed rounded">
                            <div class="d-flex align-items-center">
                              <div class="avatar-sm me-2">
                                <div class="avatar-title rounded bg-transparent text-success fs-24">
                                  <i class="ri-file-copy-2-fill"></i>
                                </div>
                              </div>
                              <div class="flex-grow-1">
                                <p class="text-muted mb-1">Stock :</p>
                                <h5 class="mb-0">{{ presentation.stock }}</h5>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- end col -->
                        <div class="col-lg-3 col-sm-6">
                          <div class="p-2 border border-dashed rounded">
                            <div class="d-flex align-items-center">
                              <div class="avatar-sm me-2">
                                <div class="avatar-title rounded bg-transparent text-success fs-24">
                                  <i class="ri-stack-fill"></i>
                                </div>
                              </div>
                              <div class="flex-grow-1">
                                <p class="text-muted mb-1">Stock mínimo :</p>
                                <h5 class="mb-0">{{ presentation.stock_min }}</h5>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- end col -->
                        <div class="col-lg-3 col-sm-6">
                          <div class="p-2 border border-dashed rounded">
                            <div class="d-flex align-items-center">
                              <div class="avatar-sm me-2">
                                <div class="avatar-title rounded bg-transparent text-success fs-24">
                                  <i class="ri-inbox-archive-fill"></i>
                                </div>
                              </div>
                              <div class="flex-grow-1">
                                <p class="text-muted mb-1">Stock máximo :</p>
                                <h5 class="mb-0">{{ presentation.stock_max }}</h5>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- end col -->
                      </div>



                      <div class="mt-4 text-muted">
                        <h5 class="fs-14">Descripción :</h5>
                        <p>{{ presentation.product.description }}</p>
                      </div>




                      <div class="product-content mt-5">
                        <h5 class="fs-14 mb-3">Descripción del producto :</h5>
                        <nav>
                          <ul class="nav nav-tabs nav-tabs-custom nav-success" id="nav-tab" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" id="nav-speci-tab" data-bs-toggle="tab" href="#nav-speci"
                                role="tab" aria-controls="nav-speci" aria-selected="true">Especificaciones</a>
                            </li>
                          </ul>
                        </nav>
                        <div class="tab-content border border-top-0 p-4" id="nav-tabContent">
                          <div class="tab-pane fade show active" id="nav-speci" role="tabpanel"
                            aria-labelledby="nav-speci-tab">
                            <div class="table-responsive">
                              <table class="table mb-0">
                                <tbody>
                                  <tr>
                                    <th scope="row" style="width: 200px;">ID</th>
                                    <td>{{ presentation.product.id }}</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Código</th>
                                    <td># {{ presentation.code }}</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Peso</th>
                                    <td>{{ presentation.weight_in_grams }}gr</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Status</th>
                                    <td>{{ presentation.status }}</td>
                                  </tr>

                                </tbody>
                              </table>
                            </div>
                          </div>

                        </div>
                      </div>
                      <!-- product-content -->
                    </div>
                  </div>
                  <!-- end col -->
                </div>
                <!-- end row -->
              </div>
              <!-- end card body -->
            </div>
            <!-- end card -->
          </div>
          <!-- end col -->
        </div>
        <!-- end row -->
      </div>
      <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
  </div>
  <!-- end main content-->
</template>