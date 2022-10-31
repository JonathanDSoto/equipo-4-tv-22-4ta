<script setup>
import axios from "axios"
import { ref } from "vue"
import { useRouter, RouterLink } from 'vue-router'
import Nav from "../../components/Nav.vue";
import Sidebar from "../../components/Sidebar.vue";

const router = useRouter()

let user = JSON.parse(localStorage.getItem('user'))
const orders = ref(null)
Swal.fire({
  title: '',
  didOpen: () => {
    Swal.showLoading()
  }
})

const edit = async (id) => {
  const editswal = await Swal.fire({
    title: 'Edit',
    html:
      '<input placeholder="order_status_id" type="text" id="order_status_id" class="form-control mb-3">',
    showCancelButton: true,
    focusConfirm: false,
    preConfirm: () => {
      let data = new FormData();
      data.append('order_status_id', document.querySelector('#order_status_id').value);
      data.append('id', id);
      data.append('token', user.token);
      data.append('action', 'update');

      let config = {
        method: 'post',
        url: 'https://ecommerce-app-0a.herokuapp.com/app/OrdersController.php',
        data: data
      };

      axios(config)
        .then((response) => {
          console.log(response.data)
          if (response.data.data) {
            swal.fire(
              'Actualizado',
              response.data.message,
              'success'
            ).then((result) => {
              if (result.isConfirmed) {
                router.go(0)
              }
            })
          } else {
            swal.fire(
              'Error!',
              response.data.message,
              'error'
            )
          }
        })
        .catch((error) => {
          console.log(error);
        });

    }
  })
  console.log(editswal)

  if (!editswal.isConfirmed) {
    editswal = await swal.fire(
      'Cancelado',
      'El registro no ha sido actualizado.',
      'error'
    )
  }
}

const deleteElement = async (id) => {
  const deleteswal = await Swal.fire({
    title: 'Estas Seguro que quieres eliminarlo',
    icon: 'error',
    showCancelButton: true,
    focusConfirm: false,
    preConfirm: () => {
      let data = new FormData();
      data.append('action', 'delete');
      data.append('token', user.token);
      data.append('id', id);

      let config = {
        method: 'post',
        url: 'https://ecommerce-app-0a.herokuapp.com/app/OrdersController.php',
        data: data
      };

      axios(config)
        .then((response) => {
          if (response.data.code === 2) {
            swal.fire(
              'Eliminado',
              response.data.message,
              'success'
            ).then((result) => {
              if (result.isConfirmed) {
                router.go(0)
              }
            })
          } else {
            swal.fire(
              'Error!',
              response.data.message,
              'error'
            )
          }
        })
        .catch((error) => {
          console.log(error);
        });

    }
  })
  console.log(deleteswal)

  if (!deleteswal.isConfirmed) {
    deleteswal = await swal.fire(
      'Cancelado',
      'El registro no ha sido Eliminado.',
      'error'
    )
  }
}

const create = async () => {
  const createswal = await Swal.fire({
    title: 'Crear Orden',
    html:
      '<input placeholder="folio" type="text" id="folio" class="form-control mb-3">' +
      '<input placeholder="total" type="number" id="total" class="form-control mb-3">' +
      '<input placeholder="is_paid" type="number" id="is_paid" class="form-control mb-3">' +
      '<input placeholder="client_id" type="number" id="client_id" class="form-control mb-3">' +
      '<input placeholder="address_id" type="number" id="address_id" class="form-control mb-3">' +
      '<input placeholder="order_status_id" type="number" id="order_status_id" class="form-control mb-3">' +
      '<input placeholder="payment_type_id" type="number" id="payment_type_id" class="form-control mb-3">' +
      '<input placeholder="coupon_id" type="number" id="coupon_id" class="form-control mb-3">' +
      '<input placeholder="presentations_id" type="number" id="presentations_id" class="form-control mb-3">' +
      '<input placeholder="presentations_quantity" type="number" id="presentations_quantity" class="form-control mb-3">',
    showCancelButton: true,
    focusConfirm: false,
    preConfirm: () => {
      let data = new FormData();
      data.append('folio', document.querySelector('#folio').value);
      data.append('total', document.querySelector('#total').value);
      data.append('is_paid', document.querySelector('#is_paid').value);
      data.append('client_id', document.querySelector('#client_id').value);
      data.append('address_id', document.querySelector('#address_id').value);
      data.append('order_status_id', document.querySelector('#order_status_id').value);
      data.append('payment_type_id', document.querySelector('#payment_type_id').value);
      data.append('coupon_id', document.querySelector('#coupon_id').value);
      data.append('presentations_id', document.querySelector('#presentations_id').value);
      data.append('presentations_quantity', document.querySelector('#presentations_quantity').value);
      data.append('action', 'create');
      data.append('token', user.token);

      let config = {
        method: 'post',
        url: 'https://ecommerce-app-0a.herokuapp.com/app/OrdersController.php',
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
          } else {
            swal.fire(
              'Error!',
              response.data.message,
              'error'
            )
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
  })
  console.log(createswal)

  if (!createswal.isConfirmed) {
    createswal = await swal.fire(
      'Cancelado',
      'El registro no ha sido Creado.',
      'error'
    )
  }
}

const getOrders = () => {
  var data = new FormData();
  data.append('action', 'getOrders');
  data.append('token', user.token);

  var config = {
    method: 'post',
    url: 'https://ecommerce-app-0a.herokuapp.com/app/OrdersController.php',
    data: data
  };

  axios(config)
    .then((response) => {
      orders.value = response.data.data
      Swal.close()
    })
    .catch(function (error) {
      console.log(error);
    });

}
getOrders()
</script>

<template>

  <Nav />
  <Sidebar />
  <div class="main-content">

    <div class="page-content">
      <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
          <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
              <h4 class="mb-sm-0">Ordenes</h4>

              <div class="page-title-right">
                <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Tabla</a></li>
                  <li class="breadcrumb-item active">Ordenes</li>
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
                <div id="customerList">
                  <div class="row g-4 mb-3">
                    <div class="col-sm-auto">
                      <div class="">
                        <button @click="create" class="btn btn-success add-btn"><i
                            class="ri-add-line align-bottom me-1"></i> Agregar</button>
                      </div>
                    </div>
                    <div class="col-sm">
                      <div class="d-flex justify-content-sm-end">
                        <!-- <div class="">
                                                    <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Agregar</button>
                                                    <button class="btn btn-soft-danger" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                                                </div> -->
                        <!-- <div class="search-box ms-2">
                                                    <input type="text" class="form-control search" placeholder="Search...">
                                                    <i class="ri-search-line search-icon"></i>
                                                </div> -->
                      </div>
                    </div>

                  </div>

                  <div class="table-responsive table-card mt-3 mb-1">
                    <table class="table align-middle table-nowrap" id="customerTable">
                      <thead class="table-light">
                        <tr>
                          <th class="" data-sort="id">ID</th>
                          <th class="" data-sort="name">Folio</th>
                          <th class="" data-sort="lastname">Total</th>
                          <th class="" data-sort="email">Cliente</th>
                          <th class="" data-sort="rol">Estatus</th>
                          <th class="" data-sort="action">Action</th>
                        </tr>
                      </thead>
                      <tbody class="list form-check-all">
                        <tr v-if="orders" v-for="order in orders" :key="order.id">
                          <td class="id">{{ order.id }}</td>
                          <td class="">
                            <RouterLink class="text-primary" :to="{ path: '/orders/' + order.id }">{{ order.folio }}
                            </RouterLink>
                          </td>
                          <td class="lastname">{{ order.total }}</td>
                          <td class="email">{{ order.client_id }}</td>
                          <td class="subscription">
                            {{ order.order_status_id === 1 ? 'Active' : 'Inactive' }}
                          </td>

                          <td>
                            <div class="d-flex gap-2">
                              <div class="edit">
                                <a href="details.php">
                                  <RouterLink :to="{ path: '/orders/' + order.id }"
                                    class="btn btn-sm btn-primary edit-item-btn">Ver</RouterLink>
                                </a>
                              </div>
                              <div class="edit">
                                <button @click="edit(order.id)"
                                  class="btn btn-sm btn-warning edit-item-btn">Editar</button>
                              </div>
                              <div class="remove">
                                <button @click="deleteElement(order.id)"
                                  class="btn btn-sm btn-danger remove-item-btn">Eliminar</button>
                              </div>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>

                  </div>

                  <div class="d-flex justify-content-end">
                    <div class="pagination-wrap hstack gap-2">
                      <a class="page-item pagination-prev disabled" href="#">
                        Previous
                      </a>
                      <ul class="pagination listjs-pagination mb-0"></ul>
                      <a class="page-item pagination-next" href="#">
                        Next
                      </a>
                    </div>
                  </div>
                </div>

              </div><!-- end card -->
            </div>
            <!-- end col -->
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
          <h5 class="modal-title" id="exampleModalgridLabel">Ordenes</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="javascript:void(0);">
            <div class="row g-3">

              <div class="col-lg-6">
                <div>
                  <label for="firstName" class="form-label">Folio</label>
                  <input type="text" class="form-control" id="firstName" placeholder="Folio">
                </div>
              </div>
              <!--end col-->
              <div class="col-lg-6">
                <div>
                  <label for="lastName" class="form-label">Total</label>
                  <input type="text" class="form-control" id="lastName" placeholder="Total">
                </div>
              </div>
              <!--end col-->
              <div class="col-lg-12">
                <!-- Select -->
                <label for="exampleFormControlTextarea5" class="form-label">Pagado</label>
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
                <label for="exampleFormControlTextarea5" class="form-label">Cliente</label>
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
                <label for="exampleFormControlTextarea5" class="form-label">Dirección</label>
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
              <div class="col-lg-6">
                <!-- Select -->
                <label for="exampleFormControlTextarea5" class="form-label">Estatus de orden</label>
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
              <div class="col-lg-6">
                <!-- Select -->
                <label for="exampleFormControlTextarea5" class="form-label">Método de pago</label>
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
                <label for="exampleFormControlTextarea5" class="form-label">Cupón</label>
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