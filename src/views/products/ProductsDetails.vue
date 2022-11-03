<script setup>
import axios from "axios"
import Nav from "../../components/Nav.vue"
import Sidebar from "../../components/Sidebar.vue"
import { useRoute, useRouter, RouterLink } from "vue-router"
import { ref } from "vue"

const route = useRoute()
const router = useRouter()

let user = JSON.parse(localStorage.getItem('user'))
let product = ref(null)

Swal.fire({
  title: '',
  didOpen: () => {
    Swal.showLoading()
  }
})

const set_Price = async (id, amount) => {
  let data = qs.stringify({
    'id': id,
    'amount': amount
  });
  let config = {
    method: 'put',
    url: 'https://crud.jonathansoto.mx/api/presentations/set_new_price',
    data: data
  };

  axios(config)
    .then((response) => response.data)
    .catch((error) => {
      console.log(error);
    });

}
const edit = async (id,presId) => {
  const editswal = await Swal.fire({
    title: "Editar Presentacion",
    html:
      '<input placeholder="Descripcion" type="text" id="description" class="form-control mb-3">' +
      '<input placeholder="Codigo" type="text" id="code" class="form-control mb-3">' +
      '<input placeholder="Peso (gr)" type="number" id="weight_in_grams" class="form-control mb-3">' +
      '<input placeholder="Stock" type="number" id="stock" class="form-control mb-3">' +
      '<input placeholder="Stock minimo" type="number" id="stock_min" class="form-control mb-3">' +
      '<input placeholder="Stock maximo" type="number" id="stock_max" class="form-control mb-3">' +
      '<input placeholder="Precio" type="number" id="amount" class="form-control mb-3">',
    showCancelButton: true,
    focusConfirm: false,
    preConfirm: () => {
      if(document.querySelector('#description').value=='' || document.querySelector('#code').value=='' || document.querySelector('#weight_in_grams').value=='' 
      || document.querySelector('#stock').value=='' || document.querySelector('#stock_min').value=='' || document.querySelector('#stock_max').value=='' 
      || document.querySelector('#amount').value=='' ){
        swal.fire(
          'Error!',
          'No puedes dejar espacios vacios',
          'error'
        )
      }else{

        let data = new FormData();
        data.append('description', document.querySelector('#description').value);
        data.append('code', document.querySelector('#code').value);
        data.append('weight_in_grams', document.querySelector('#weight_in_grams').value);
        data.append('status', 'active');
        data.append('stock', document.querySelector('#stock').value);
        data.append('stock_min', document.querySelector('#stock_min').value);
        data.append('stock_max', document.querySelector('#stock_max').value);
        data.append('product_id', id);
        data.append('id',presId);
        data.append('amount', document.querySelector('#amount').value);
        data.append('action', 'updatePresentation');
        data.append('token', user.token);

        let config = {
          method: 'post',
          url: 'https://ecommerce-app-0a.herokuapp.com/app/PresentationsController.php',
          data: data
        };

        axios(config)
          .then((response) => {
            if (response.data.data) {
              swal.fire(
                'Editado',
                response.data.message,
                'success'
              ).then((result) => {
                if (result.isConfirmed) {
                  router.go(0)
                }
              })
              set_Price(response.data.data.id, document.querySelector('#amount').value)
            } else {
              swal.fire(
                'Error!',
                response.data.message,
                'error'
              )
            }
          })
          .catch((error) => {
            //console.log(error);
          });
      }
    },
  });

  if (!editswal.isConfirmed) {
    editswal = await swal.fire(
      "Cancelado",
      "El registro no ha sido actualizado.",
      "error"
    );
  }
};

const createPresentation = async (id) => {
  const createswal = await Swal.fire({
    title: 'Crear presentacion',
    html:
      '<input placeholder="cover" type="file" accept="image/png,image/jpeg" id="cover" class="form-control mb-3">' +
      '<input placeholder="Descripcion" type="text" id="description" class="form-control mb-3">' +
      '<input placeholder="Codigo" type="text" id="code" class="form-control mb-3">' +
      '<input placeholder="Peso (gr)" type="number" id="weight_in_grams" class="form-control mb-3">' +
      '<input placeholder="Stock" type="number" id="stock" class="form-control mb-3">' +
      '<input placeholder="Stock minimo" type="number" id="stock_min" class="form-control mb-3">' +
      '<input placeholder="Stock maximo" type="number" id="stock_max" class="form-control mb-3">' +
      '<input placeholder="Precio" type="number" id="amount" class="form-control mb-3">',
    showCancelButton: true,
    focusConfirm: false,
    preConfirm: () => {
      if(document.getElementById('description').value=='' || document.getElementById('code').value=='' || document.getElementById('weight_in_grams').value=='' 
      || document.getElementById('stock').value=='' || document.getElementById('stock_min').value=='' || document.getElementById('stock_max').value=='' 
      || document.getElementById('amount').value=='' || document.getElementById('cover').value==''){
        swal.fire(
          'Error!',
          'No puedes dejar espacios vacios',
          'error'
        )
      }else{

        let data = new FormData();
        data.append('description', document.querySelector('#description').value);
        data.append('code', document.querySelector('#code').value);
        data.append('weight_in_grams', document.querySelector('#weight_in_grams').value);
        data.append('status', 'active');
        data.append('cover', document.querySelector('#cover').files[0]);
        data.append('stock', document.querySelector('#stock').value);
        data.append('stock_min', document.querySelector('#stock_min').value);
        data.append('stock_max', document.querySelector('#stock_max').value);
        data.append('product_id', id);
        data.append('amount', document.querySelector('#amount').value);
        data.append('action', 'createPresentation');
        data.append('token', user.token);

        let config = {
          method: 'post',
          url: 'https://ecommerce-app-0a.herokuapp.com/app/PresentationsController.php',
          data: data
        };

        axios(config)
          .then((response) => {
            if (response.data.data) {
              swal.fire(
                'Creado',
                response.data.message,
                'success'
              ).then((result) => {
                if (result.isConfirmed) {
                  router.go(0)
                }
              })
              set_Price(response.data.data.id, document.querySelector('#amount').value)
            } else {
              swal.fire(
                'Error!',
                response.data.message,
                'error'
              )
            }
          })
          .catch((error) => {
            //console.log(error);
          });
      }
    },
  })

  if (!createswal.isConfirmed) {
    createswal = await swal.fire(
      'Cancelado',
      'El registro no ha sido Creado.',
      'error'
    )
  }
}
const deletePresentation = async (id) => {
  const deleteswal = await Swal.fire({
    title: "Estas Seguro que quieres eliminarlo",
    icon: "error",
    showCancelButton: true,
    focusConfirm: false,
    preConfirm: () => {
      let data = new FormData();
      data.append("action", "deletePresentation");
      data.append("token", user.token);
      data.append("id", id);

      let config = {
        method: "post",
        url: "https://ecommerce-app-0a.herokuapp.com/app/PresentationsController.php",
        data: data,
      };

      axios(config)
        .then((response) => {
          if (response.data.code === 2) {
            swal.fire("Eliminado", response.data.message, "success").then((result) => {
              if (result.isConfirmed) {
                router.go(0);
              }
            });
          } else {
            swal.fire("Error!", response.data.message, "error");
          }
        })
        .catch((error) => {
          //console.log(error);
        });
    },
  });
  console.log(deleteswal);

  if (!deleteswal.isConfirmed) {
    deleteswal = await swal.fire(
      "Cancelado",
      "El registro no ha sido Eliminado.",
      "error"
    );
  }
};

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
      if (product.value) {
        Swal.close()
      } else {
        swal.fire(
          'Error al cargar',
          response.data.message,
          'error'
        ).then((result) => {
          if (result.isConfirmed) {
            router.go(-1)
          }
        })
      }

    })
    .catch(function (error) {
      //console.log(error);
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
                            <div>
                              <RouterLink :to="{ path: '/catalogs/brand/' + product.brand.id }"
                                class="text-primary d-block" v-if="product.brand">{{
                                    product.brand.name
                                }}</RouterLink>
                            </div>
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
                        <div v-if="product.tags[0]" class="col-sm-6">
                          <div class="mt-3">
                            <h5 class="fs-14">Etiquetas :</h5>
                            <ul v-if="product.tags" class="list-unstyled">
                              <li class="py-1" v-for="tag in product.tags" :key="tag.id">
                                <i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i>
                                <RouterLink :to="{ path: '/catalogs/tag/' + tag.id }" class="text-primary">{{
                                    tag.name
                                }}
                                </RouterLink>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div v-if="product.categories[0]" class="col-sm-6">
                          <div class="mt-3">
                            <h5 class="fs-14">Categorias :</h5>
                            <ul class="list-unstyled product-desc-list">
                              <li class="py-1" v-for="category in product.categories" :key="category.id">
                                <RouterLink :to="{ path: '/catalogs/category/' + category.id }" class="text-primary">{{
                                    category.name
                                }}
                                </RouterLink>
                              </li>
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
            <!-- <div v-if="product.presentations[0]" class="mt-5">

              
            </div> -->
            <!--Tabla presentations-->
            
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex align-items-center">
                  <h5 class="card-title mb-0 flex-grow-1">Presentaciones :</h5>
                  <button @click="createPresentation(product.id)" class="btn btn-success add-btn">
                    <i class="ri-add-line align-bottom me-1"></i>
                    Agregar
                  </button>
                </div>
              </div>
            </div>

            <div class="card-body">
              <div v-if="product.presentations[0]" id="presentationList">
              <div class="table-responsive table-card mt-3 mb-1" >
                      <table class="table align-middle table-nowrap" id="customerTable">
                        <thead class="table-light">
                          <tr>
                            <th class="" data-sort="id">ID</th>
                            <th class="" data-sort="code">Codigo</th>
                            <th class="" data-sort="description">Descripción</th>
                            <th class="" data-sort="action">Action</th>
                          </tr>
                        </thead>
                        <tbody class="list form-check-all" >
                          
                          <tr v-for="presentation in product.presentations"
                            :key="presentation.id">
                            <td class="id">{{ presentation.id }}</td>

                            <td>
                              <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-3">
                                  <div class="avatar-sm bg-light rounded p-1">
                                    <img :src="product.cover" alt="" class="img-fluid d-block">
                                  </div>
                                </div>
                                <div class="flex-grow-1">
                                  <h5 class="fs-14 mb-1">
                                    <RouterLink :to="{ path: '/products/presentation/' + presentation.id }" class="text-dark">
                                    {{ presentation.code}}
                                  </RouterLink>
                                  </h5>
                                  
                                </div>
                              </div>

                            </td>

                            <td class="description text-break col-md-3 " v-if="presentation.description"> {{ presentation.description
                            }}
                            </td>

                            <td>
                              <div class="d-flex gap-2">
                                <div class="edit">
                                  <a>
                                    <RouterLink :to="{ path: '/products/presentation/' + presentation.id }"
                                      class="btn btn-sm btn-primary edit-item-btn">Ver</RouterLink>
                                  </a>

                                </div>
                                <div class="edit">
                                  <button @click="edit(product.id,presentation.id)"
                                    class="btn btn-sm btn-warning edit-item-btn"
                                  >Editar
                                  </button>
                                </div>
                                <div class="remove">
                                  <button @click="deletePresentation(presentation.id)"
                                    class="btn btn-sm btn-danger remove-item-btn">Eliminar</button>
                                </div>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>

                    </div>
                  </div>

                  <div v-else class="mb-5">
                      <h3>No hay Presentaciones</h3>
                  </div>
                </div>

                
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
                          <td>
                            <RouterLink :to="{ path: '/orders/' + order.id }" class="text-primary">{{ order.folio }}
                            </RouterLink>
                          </td>
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

  <div v-else class="main-content">
    <h5 class="text-center">No se encontro el producto</h5>
  </div>


  <!-- Grids in modals -->

</template>