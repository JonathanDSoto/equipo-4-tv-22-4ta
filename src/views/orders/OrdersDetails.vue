<script setup>
import axios from "axios"
import Nav from "../../components/Nav.vue"
import Sidebar from "../../components/Sidebar.vue"
import { useRoute } from "vue-router"
import { ref } from "vue"

const route = useRoute()

let user = JSON.parse(localStorage.getItem('user'))
let order = ref(null)

Swal.fire({
  title: '',
  didOpen: () => {
    Swal.showLoading()
  }
})


const getOrder = () => {
  var data = new FormData();
  data.append('action', 'getOrder');
  data.append('id', route.params.orderId);
  data.append('token', user.token);

  var config = {
    method: 'post',
    url: 'https://ecommerce-app-0a.herokuapp.com/app/OrdersController.php',
    data: data
  };

  axios(config)
    .then(function (response) {
      order.value = response.data.data
      console.log(order.value)
      Swal.close()
    })
    .catch(function (error) {
      console.log(error);
    });

}
getOrder()
</script>

<template>

  <Nav />
  <Sidebar />

  <div v-if="order" class="main-content">
    <div class="page-content">
      <div class="container-fluid">
        <div class="profile-foreground position-relative mx-n4 mt-n4">
          <div class="profile-wid-bg">
            <img src="../../assets/images/profile-bg.jpg" alt="" class="profile-wid-img" />
          </div>
        </div>
        <div class="pt-4 mb-4 mb-lg-0 pb-lg-0">
          <div class="row g-4">


            <div class="col">
              <div class="p-2">
                <h3 class="text-white mb-1">Detalles de orden</h3>
                <p class="text-white-75">#{{ order.folio }}</p>

              </div>
            </div>
            <!--end col-->


          </div>
          <!--end row-->
        </div>

        <div class="row">
          <div class="col-lg-12">
            <div>

              <!-- Tab panes -->
              <div class="tab-content pt-4 text-muted">
                <div class="tab-pane active" id="overview-tab" role="tabpanel">
                  <div class="row">
                    <div class="col-xxl-3">


                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title mb-3">Información</h5>
                          <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                              <tbody>
                                <tr>
                                  <th class="ps-0" scope="row">Folio :</th>
                                  <td class="text-muted"># {{ order.folio }}</td>
                                </tr>
                                <tr>
                                  <th class="ps-0" scope="row">Total :</th>
                                  <td class="text-muted">$ {{ order.total }}</td>
                                </tr>
                                <tr>
                                  <th class="ps-0" scope="row">Pago :</th>
                                  <td class="text-muted">{{ order.is_paid > 0 ? 'Pagado' : 'Pendiente' }}</td>
                                </tr>
                                <tr>
                                  <th class="ps-0" scope="row">Método :</th>
                                  <td class="text-muted" v-if="order.payment_type">{{ order.payment_type.name }}</td>
                                </tr>

                              </tbody>
                            </table>
                          </div>
                        </div><!-- end card body -->
                      </div><!-- end card -->


                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title mb-3">Estatus</h5>
                          <p v-if="order.presentations">{{ order.presentations[0].status }}</p>
                        </div>
                      </div>






                      <div v-if="order.coupon" class="card">
                        <div class="card-body p-0">
                          <div class="alert alert-warning border-0 rounded-top rounded-0 m-0 d-flex align-items-center"
                            role="alert">

                            <div class="flex-shrink-0">
                              <RouterLink :to="{
                                path: '/coupons/' + order.coupon.id
                              }" class="text-reset text-decoration-underline"><b>CUPÓN</b>
                              </RouterLink>
                            </div>
                          </div>
                          <div class="d-flex p-3">
                            <div class="flex-shrink-0">
                              <div class="avatar-md me-3">
                                <span class="avatar-title bg-soft-danger rounded-circle fs-1">
                                  <i class="ri-gift-2-line text-danger"></i>
                                </span>
                              </div>
                            </div>
                            <div>
                              <p class="fs-16 lh-base">{{ order.coupon.name }}</p>
                              <p><span class="fw-semibold">{{ order.coupon.code }}</span></p>

                            </div>
                          </div>
                        </div> <!-- end card-body-->
                      </div>




                    </div>
                    <!--end col-->

                    <div class="col-xxl-9">


                      <div class="row mt-5">
                        <div class="col-lg-12">
                          <div class="card mt-xxl-n5">
                            <div class="card-header">
                              <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                                    <i class="fas fa-home"></i> Cliente
                                  </a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" data-bs-toggle="tab" href="#changePassword" role="tab">
                                    <i class="far fa-user"></i> Dirección
                                  </a>
                                </li>

                              </ul>
                            </div>
                            <div class="card-body p-4">
                              <div class="tab-content">



                                <div class="tab-pane active" id="personalDetails" v-if="order.client" role="tabpanel">
                                  <form action="javascript:void(0);">
                                    <div class="row">

                                      <div class="col-lg-12">
                                        <div class="mb-3">
                                          <label for="firstnameInput" class="form-label">Nombre</label>
                                          <input type="text" class="form-control" id="firstnameInput"
                                            placeholder="Nombre" :value="order.client.name" disabled>
                                        </div>
                                      </div>
                                      <!--end col-->
                                      <div class="col-lg-12">
                                        <div class="mb-3">
                                          <label for="lastnameInput" class="form-label">Correo electrónico</label>
                                          <input type="text" class="form-control" id="lastnameInput"
                                            placeholder="Correo electrónico" :value="order.client.email" disabled>
                                        </div>
                                      </div>
                                      <!--end col-->

                                      <div class="col-lg-12">
                                        <div class="mb-3">
                                          <label for="emailInput" class="form-label">Teléfono</label>
                                          <input type="email" class="form-control" id="emailInput"
                                            placeholder="Correo electrónico" :value="order.client.phone_number" disabled>
                                        </div>
                                      </div>
                                      <!--end col-->




                                    </div>
                                    <!--end row-->
                                  </form>
                                </div>

                                <div class="tab-pane" id="changePassword" role="tabpanel">
                                  <form action="javascript:void(0);">
                                    <div class="row">
                                      <div class="col-lg-6">
                                        <div class="mb-3">
                                          <label for="phonenumberInput" class="form-label">Calle y número</label>
                                          <input type="text" class="form-control" id="phonenumberInput"
                                            placeholder="Calle y número" :value="order.address.street_and_use_number" disabled>
                                        </div>
                                      </div>
                                      <!--end col-->
                                      <div class="col-lg-6">
                                        <div class="mb-3">
                                          <label for="emailInput" class="form-label">Apartamento</label>
                                          <input type="email" class="form-control" id="emailInput"
                                            placeholder="Apartamento" :value="order.address.apartment" disabled>
                                        </div>
                                      </div>
                                      <!--end col-->
                                      <div class="col-lg-12">
                                        <div class="mb-3">
                                          <label for="lastnameInput" class="form-label">Código postal</label>
                                          <input type="text" class="form-control" id="lastnameInput"
                                            placeholder="Apellido" :value="order.address.postal_code" disabled>
                                        </div>
                                      </div>

                                      <!--end col-->
                                      <div class="col-lg-6">
                                        <div class="mb-3">
                                          <label for="phonenumberInput" class="form-label">Ciudad</label>
                                          <input type="text" class="form-control" id="phonenumberInput"
                                            placeholder="Calle y número" :value="order.address.city" disabled>
                                        </div>
                                      </div>
                                      <!--end col-->
                                      <div class="col-lg-6">
                                        <div class="mb-3">
                                          <label for="emailInput" class="form-label">Provincia</label>
                                          <input type="email" class="form-control" id="emailInput"
                                            placeholder="Apartamento" :value="order.address.province" disabled>
                                        </div>
                                      </div>
                                      <!--end col-->

                                      <div class="col-lg-12">
                                        <div class="mb-3">
                                          <label for="emailInput" class="form-label">Teléfono</label>
                                          <input type="email" class="form-control" id="emailInput"
                                            placeholder="612 000 0000" :value="order.address.phone_number" disabled>
                                        </div>
                                      </div>
                                      <!--end col-->



                                    </div>
                                    <!--end row-->
                                  </form>
                                </div>


                              </div>
                            </div>
                          </div>
                        </div>














                        <div class="row">
                          <div class="col-lg-12">
                            <div class="card">

                              <div class="card-header  border-0">
                                <div class="d-flex align-items-center">
                                  <h5 class="card-title mb-0 flex-grow-1">Productos</h5>

                                </div>
                              </div>
                              <div class="card-body border border-dashed border-end-0 border-start-0">

                              </div>

                              <div class="card-body pt-0">
                                <div id="customerList">
                                  <div class="table-responsive table-card  mb-1">
                                    <table class="table align-middle table-nowrap" id="customerTable">
                                      <thead class="table-light">
                                        <tr>
                                          <th class="" data-sort="id">ID</th>
                                          <th class="" data-sort="name">name</th>
                                          <th class="" data-sort="description">Descripción</th>

                                        </tr>
                                      </thead>
                                      <tbody class="list form-check-all">
                                        <tr v-if="order.presentations" v-for="presentation in order.presentations"
                                          :key="presentation.id">
                                          <td class="id">{{ presentation.id }}</td>
                                          <td>
                                            <div class="fs-14 mb-1">
                                              <RouterLink v-if="presentation.product" class="text-primary"
                                                :to="{ path: '/products/' + presentation.product.slug }">{{
                                                    presentation.product.name
                                                }}</RouterLink>
                                              <p v-else>Sin presentacion</p>
                                            </div>
                                          </td>
                                          <td>
                                            <h5 class="fs-14 mb-1">{{ presentation.description }}</h5>
                                          </td>

                                        </tr>
                                      </tbody>
                                    </table>

                                  </div>

                                  <!-- <div class="d-flex justify-content-end">
                                    <div class="pagination-wrap hstack gap-2">
                                      <a class="page-item pagination-prev disabled" href="#">
                                        Previous
                                      </a>
                                      <ul class="pagination listjs-pagination mb-0"></ul>
                                      <a class="page-item pagination-next" href="#">
                                        Next
                                      </a>
                                    </div>
                                  </div> -->
                                </div>

                              </div><!-- end card -->
                            </div>
                            <!-- end col -->
                          </div>
                          <!-- end col -->
                        </div>
                        <!-- end row -->





                      </div>
                      <!-- end col -->



                    </div>
                    <!--end row-->
                  </div>



                </div>
                <!--end tab-content-->
              </div>
            </div>
            <!--end col-->
          </div>
          <!--end row-->

        </div><!-- container-fluid -->
      </div><!-- End Page-content -->
    </div>






    <!-- Grids in modals -->

    <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalgridLabel">Direcciones</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="javascript:void(0);">
              <div class="row g-3">

                <div class="col-lg-12">
                  <div>
                    <label for="firstName" class="form-label">ID</label>
                    <input type="text" class="form-control" id="firstName" placeholder="ID">
                  </div>
                </div>
                <!--end col-->
                <div class="col-lg-12">
                  <div>
                    <label for="firstName" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="firstName" placeholder="Nombre">
                  </div>
                </div>
                <!--end col-->

                <div class="col-lg-12">
                  <div>
                    <label for="lastName" class="form-label">Apellido</label>
                    <input type="text" class="form-control" id="lastName" placeholder="Apellido">
                  </div>
                </div>
                <!--end col-->
                <div class="col-lg-12">
                  <div>
                    <label for="lastName" class="form-label">Calle y número</label>
                    <input type="text" class="form-control" id="lastName" placeholder="Calle y número">
                  </div>
                </div>
                <!--end col-->
                <div class="col-lg-12">
                  <div>
                    <label for="lastName" class="form-label">Código postal</label>
                    <input type="text" class="form-control" id="lastName" placeholder="Código postal">
                  </div>
                </div>
                <!--end col-->

                <div class="col-lg-12">
                  <!-- Select -->
                  <label for="exampleFormControlTextarea5" class="form-label">Ciudad</label>
                  <div class="input-group">
                    <label class="input-group-text" for="inputGroupSelect01">Opciones</label>
                    <select class="form-select" id="inputGroupSelect01">
                      <option selected>...</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
                </div>
                <!--end col-->
                <div class="col-lg-12">
                  <!-- Select -->
                  <label for="exampleFormControlTextarea5" class="form-label">Provincia</label>
                  <div class="input-group">
                    <label class="input-group-text" for="inputGroupSelect01">Opciones</label>
                    <select class="form-select" id="inputGroupSelect01">
                      <option selected>...</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
                </div>
                <!--end col-->
                <div class="col-lg-12">
                  <!-- Select -->
                  <label for="exampleFormControlTextarea5" class="form-label">Facturación</label>
                  <div class="input-group">
                    <label class="input-group-text" for="inputGroupSelect01">Opciones</label>
                    <select class="form-select" id="inputGroupSelect01">
                      <option selected>...</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
                </div>
                <!--end col-->
                <div class="col-lg-12">
                  <div>
                    <label for="lastName" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" id="lastName" placeholder="Teléfono">
                  </div>
                </div>
                <!--end col-->
                <div class="col-lg-12">
                  <div class="hstack gap-2 justify-content-end">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                  </div>
                </div>
                <!--end col-->

              </div>
              <!--end row-->
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>