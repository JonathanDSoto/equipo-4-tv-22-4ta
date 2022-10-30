<script setup>
import axios from "axios"
import Nav from "../../components/Nav.vue"
import Sidebar from "../../components/Sidebar.vue"
import { useRoute } from "vue-router"
import { ref } from "vue"

const route = useRoute()

let user = JSON.parse(localStorage.getItem('user'))
let product = ref(null)

function eliminar() {
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success m-2',
      cancelButton: 'btn btn-danger m-2'
    },
    buttonsStyling: false
  })

  swalWithBootstrapButtons.fire({
    title: '¿Estas seguro?',
    text: "¡No podrás revertir esto!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Si, eliminar!',
    cancelButtonText: 'No, cancelar!',
    reverseButtons: true
  }).then((result) => {
    if (result.isConfirmed) {
      swalWithBootstrapButtons.fire(
        'Eliminado!',
        'El registro ha sido eliminado.',
        'success'
      )
    } else if (
      /* Read more about handling dismissals below */
      result.dismiss === Swal.DismissReason.cancel
    ) {
      swalWithBootstrapButtons.fire(
        'Cancelado',
        'El registro no ha sido eliminado.',
        'error'
      )
    }
  })

}

const getProduct = () => {
  var data = new FormData();
  data.append('action', 'getProductBySlug');
  data.append('token', user.token);
  data.append('slug', route.params.slugProduct);

  var config = {
    method: 'post',
    url: 'https://ecommerce-app-0a.herokuapp.com/app/ProductsController.php',
    data: data
  };

  axios(config)
    .then(function (response) {
      product.value = response.data.data
      console.log(product.value);
    })
    .catch(function (error) {
      console.log(error);
    });
}
getProduct()
</script>

<template>

  <Nav />
  <Sidebar />
  <div v-if="product" class="main-content">

    <div class="page-content">
      <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
          <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
              <h4 class="mb-sm-0">Product Details</h4>

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

                  <div class="col mx-auto">
                    <div class="">

                      <div class="swiper product-thumbnail-slider p-2 rounded bg-light">
                        <div class="">
                          <div class="">
                            <img :src="product.cover" alt="" class="img-fluid d-block" />
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
                          <h4>{{ product.name }}</h4>
                          <div class="hstack gap-3 flex-wrap">
                            <div><a href="#" class="text-primary d-block" v-if="product.brand">{{ product.brand.name
                            }}</a></div>
                            <div class="vr"></div>
                            <div class="text-muted">Slug : <span class="text-body fw-medium">{{ product.slug }}</span>
                            </div>

                          </div>
                        </div>


                      </div>



                      <div class="mt-4 text-muted">
                        <h5 class="fs-14">Descripción :</h5>
                        <p>{{ product.description }}</p>
                      </div>

                      <div class="row">
                        <div class="col-sm-6">
                          <div class="mt-3">
                            <h5 class="fs-14">Etiquetas :</h5>
                            <ul v-if="product.tags" class="list-unstyled">
                              <li class="py-1" v-for="tag in product.tags" :key="tag.id">
                                <i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i> {{ tag.name }}
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="mt-3">
                            <h5 class="fs-14">Categorias :</h5>
                            <ul class="list-unstyled product-desc-list">
                              <li class="py-1" v-for="categorie in product.categories" :key="categorie.id">{{
                                  categorie.name
                              }}</li>
                            </ul>
                          </div>
                        </div>
                      </div>


                      <div class="product-content mt-5">
                        <h5 class="fs-14 mb-3">Descripción del producto :</h5>
                        <nav>
                          <ul class="nav nav-tabs nav-tabs-custom nav-success" id="nav-tab" role="tablist">

                            <li class="nav-item">
                              <a class="nav-link active" id="nav-detail-tab" data-bs-toggle="tab" href="#nav-detail"
                                role="tab" aria-controls="nav-detail" aria-selected="false">Caracteristicas</a>
                            </li>
                          </ul>
                        </nav>
                        <div class="tab-content border border-top-0 p-4" id="nav-tabContent">

                          <div class="tab-pane fade show active" id="nav-detail" role="tabpanel"
                            aria-labelledby="nav-detail-tab">
                            <div>
                              <h5 class="font-size-16 mb-3">{{ product.name }}</h5>
                              <p>{{ product.features }}</p>

                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- product-content -->


                    </div>






                    <!-- PRESENTACIONES -->

                  </div>
                  <!-- end col -->




                </div>
                <!-- end row -->



              </div>
              <!-- end card body -->




            </div>
            <!-- end card -->



            <!-- TABLA -->

            <div v-if="product.presentations[0]" class="card mt-5" id="orderList">
              <div class="card-header  border-0">
                <div class="d-flex align-items-center">
                  <h5 class="card-title mb-0 flex-grow-1">Ordenes</h5>

                </div>
              </div>
              <div class="card-body border border-dashed border-end-0 border-start-0">

              </div>
              <div class="card-body pt-0">
                <div>

                  <div class="table-responsive table-card mb-1">
                    <table class="table table-nowrap align-middle" id="orderTable">
                      <thead class="text-muted table-light">
                        <tr class="text-uppercase">

                          <th class="" data-sort="id">ID</th>
                          <th class="" data-sort="customer_name">Folio</th>
                          <th class="" data-sort="product_name">Total</th>
                          <th class="" data-sort="date">Cliente</th>
                          <th class="" data-sort="status">Estatus</th>

                        </tr>
                      </thead>
                      <tbody class="list form-check-all">
                        <tr v-for="order in product.presentations[0].orders" :key="order.id">

                          <td class="id">{{ order.id }}</td>
                          <td class="customer_name ">{{ order.folio }}</td>
                          <td class="product_name">{{ order.total }}</td>
                          <td class="date">{{ order.client_id }}</td>
                          <td class="status">{{ order.order_status_id }}</td>

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



              </div>
            </div>


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




  <!-- Grids in modals -->

  <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalgridLabel">Presentación</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="javascript:void(0);">
            <div class="row g-3">
              <div class="col-lg-12">
                <label for="formFile" class="form-label">Imagen</label>
                <input class="form-control" type="file" id="formFile">
              </div>
              <div class="col-lg-12">
                <div>
                  <label for="exampleFormControlTextarea5" class="form-label">Descripción</label>
                  <textarea class="form-control" id="descripcion" rows="3" placeholder="Descripción"></textarea>
                </div>
              </div>
              <!--end col-->
              <div class="col-lg-12">
                <div>
                  <label for="lastName" class="form-label">Código</label>
                  <input type="text" class="form-control" id="codigo" placeholder="Código">
                </div>
              </div>
              <!--end col-->
              <div class="col-lg-12">
                <div>
                  <label for="lastName" class="form-label">Peso</label>
                  <input type="text" class="form-control" id="peso" placeholder="Peso">
                </div>
              </div>
              <!--end col-->
              <div class="col-lg-12">
                <div>
                  <label for="lastName" class="form-label">Stock</label>
                  <input type="text" class="form-control" id="stock" placeholder="Stock">
                </div>
              </div>
              <!--end col-->
              <div class="col-lg-12">
                <div>
                  <label for="lastName" class="form-label">Stock mínimo</label>
                  <input type="text" class="form-control" id="stock_min" placeholder="Stock mínimo">
                </div>
              </div>
              <!--end col-->
              <div class="col-lg-12">
                <div>
                  <label for="lastName" class="form-label">Stock máximo</label>
                  <input type="text" class="form-control" id="stock_max" placeholder="Stock máximo">
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
</template>