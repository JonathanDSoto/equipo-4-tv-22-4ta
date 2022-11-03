<script setup>
import axios from "axios";
import { ref } from "vue";
import { RouterLink, useRoute, useRouter } from "vue-router";
import Nav from "../../components/Nav.vue";
import Sidebar from "../../components/Sidebar.vue";

let user = JSON.parse(localStorage.getItem("user"));
const route = useRoute();
const router = useRouter();
let cpRegex = /^(?:0?[1-9]|[1-4]\d|5[0-2])\d{3}$/;
let nameRegex = /^[A-Za-zÑñ ]+$/i;

Swal.fire({
  title: "",
  didOpen: () => {
    Swal.showLoading();
  },
});
const client = ref(null);
const addresses = ref(null);
const level = ref(null);
const orders = ref(null);
let cantOrders = ref(null);

const deleteElement = async (id) => {
  const deleteswal = await Swal.fire({
    title: "Estas Seguro que quieres eliminarlo",
    icon: "error",
    showCancelButton: true,
    focusConfirm: false,
    preConfirm: () => {
      let data = new FormData();
      data.append("action", "deleteAddress");
      data.append("token", user.token);
      data.append("id", id);

      let config = {
        method: "post",
        url: "https://ecommerce-app-0a.herokuapp.com/adress",
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
          console.log(error);
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

const edit = async (id, client_id) => {
  const editswal = await Swal.fire({
    title: "Editar Direccion",
    html:
      '<input placeholder="Nombre(s)" type="text" id="first_name" class="form-control mb-3">' +
      '<input placeholder="Apellido" type="text" id="last_name" class="form-control mb-3">' +
      '<input placeholder="Calle y número" type="text" id="street_and_use_number" class="form-control mb-3">' +
      '<input placeholder="Código Postal" type="number" id="postal_code" class="form-control mb-3">' +
      '<input placeholder="Ciudad" type="text" id="city" class="form-control mb-3">' +
      '<input placeholder="Provincia" type="text" id="province" class="form-control mb-3">' +
      '<input placeholder="Número Telefonico" type="number" id="phone_number" class="form-control mb-3">',
    showCancelButton: true,
    focusConfirm: false,
    preConfirm: () => {
      if(document.getElementById('first_name').value=='' || document.getElementById('last_name').value=='' || document.getElementById('street_and_use_number').value=='' 
      || document.getElementById('postal_code').value=='' || document.getElementById('city').value=='' || document.getElementById('province').value=='' 
      || document.getElementById('phone_number').value==''){
        swal.fire(
          'Error!',
          'No puedes dejar espacios vacios',
          'error'
        )
      }else if(!cpRegex.test(document.getElementById('postal_code').value)){
        swal.fire(
          'Error!',
          'El formato de codigo postal es incorrecto',
          'error'
        )
      }else if (!document.getElementById('phone_number').value.length == 10) {
        swal.fire(
          'Error!',
          'El numero de telefono debe constar de 10 digitos.',
          'error'
        )
      }else if (!nameRegex.test(document.getElementById('first_name').value)) {
        swal.fire(
          'Error!',
          'El nombre del cliente solo puede contener letras.',
          'error'
        )
      }
      else if (!nameRegex.test(document.getElementById('last_name').value)) {
        swal.fire(
          'Error!',
          'El apellido del cliente solo puede contener letras.',
          'error'
        )
      }else{
        let data = new FormData();
        data.append("action", "updateAddress");
        data.append("token", user.token);
        data.append("first_name", document.querySelector("#first_name").value);
        data.append("last_name", document.querySelector("#last_name").value);
        data.append(
          "street_and_use_number",
          document.querySelector("#street_and_use_number").value
        );
        data.append("postal_code", document.querySelector("#postal_code").value);
        data.append("city", document.querySelector("#city").value);
        data.append("province", document.querySelector("#province").value);
        data.append("phone_number", document.querySelector("#phone_number").value);
        data.append("is_billing_address", "1");
        data.append("id", id);
        data.append("client_id", client_id);

        let config = {
          method: "post",
          url: "https://ecommerce-app-0a.herokuapp.com/adress",
          data: data,
        };

        axios(config)
          .then((response) => {
            if (response.data.data) {
              swal.fire("Creado", response.data.message, "success").then((result) => {
                if (result.isConfirmed) {
                  router.go(0);
                }
              });
            } else {
              swal.fire("Error", response.data.message, "error");
            }
          })
          .catch((error) => {
            console.log(error);
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

const create = async (id) => {
  const editswal = await Swal.fire({
    title: "Crear Direccion",
    html:
    '<input placeholder="Nombre(s)" type="text" id="first_name" class="form-control mb-3">' +
      '<input placeholder="Apellido" type="text" id="last_name" class="form-control mb-3">' +
      '<input placeholder="Calle y número" type="text" id="street_and_use_number" class="form-control mb-3">' +
      '<input placeholder="Código Postal" type="number" id="postal_code" class="form-control mb-3">' +
      '<input placeholder="Ciudad" type="text" id="city" class="form-control mb-3">' +
      '<input placeholder="Provincia" type="text" id="province" class="form-control mb-3">' +
      '<input placeholder="Número Telefonico" type="number" id="phone_number" class="form-control mb-3">',
    showCancelButton: true,
    focusConfirm: false,
    preConfirm: () => {
      if(document.getElementById('first_name').value=='' || document.getElementById('last_name').value=='' || document.getElementById('street_and_use_number').value=='' 
      || document.getElementById('postal_code').value=='' || document.getElementById('city').value=='' || document.getElementById('province').value=='' 
      || document.getElementById('phone_number').value==''){
        swal.fire(
          'Error!',
          'No puedes dejar espacios vacios',
          'error'
        )
      }else if(!cpRegex.test(document.getElementById('postal_code').value)){
        swal.fire(
          'Error!',
          'El formato de codigo postal es incorrecto',
          'error'
        )
      }else if (!document.getElementById('phone_number').value.length == 10) {
        swal.fire(
          'Error!',
          'El numero de telefono debe constar de 10 digitos.',
          'error'
        )
      }else if (!nameRegex.test(document.getElementById('first_name').value)) {
        swal.fire(
          'Error!',
          'El nombre del cliente solo puede contener letras.',
          'error'
        )
      }
      else if (!nameRegex.test(document.getElementById('last_name').value)) {
        swal.fire(
          'Error!',
          'El apellido del cliente solo puede contener letras.',
          'error'
        )
      }else{
        let data = new FormData();
        data.append("action", "createAddress");
        data.append("token", user.token);
        data.append("first_name", document.querySelector("#first_name").value);
        data.append("last_name", document.querySelector("#last_name").value);
        data.append(
          "street_and_use_number",
          document.querySelector("#street_and_use_number").value
        );
        data.append("postal_code", document.querySelector("#postal_code").value);
        data.append("city", document.querySelector("#city").value);
        data.append("province", document.querySelector("#province").value);
        data.append("phone_number", document.querySelector("#phone_number").value);
        data.append("is_billing_address", "1");
        data.append("client_id", id);

        let config = {
          method: "post",
          url: "https://ecommerce-app-0a.herokuapp.com/adress",
          data: data,
        };

        axios(config)
          .then((response) => {
            if (response.data.data) {
              swal.fire("Creado", response.data.message, "success").then((result) => {
                if (result.isConfirmed) {
                  router.go(0);
                }
              });
            } else {
              swal.fire("Error", response.data.message, "error");
            }
          })
          .catch((error) => {
            console.log(error);
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

const getClient = () => {
  var data = new FormData();
  data.append("action", "getClient");
  data.append("id", route.params.idClient);
  data.append("token", user.token);

  var config = {
    method: "post",
    url: "https://ecommerce-app-0a.herokuapp.com/client",
    data: data,
  };

  axios(config)
    .then(function (response) {
      client.value = response.data.data;
      addresses.value = response.data.data.addresses;
      level.value = response.data.data.level;
      orders.value = response.data.data.orders;
      cantOrders.value = Object.keys(orders.value);
      Swal.close();
    })
    .catch(function (error) {
      console.log(error);
    });
};
getClient();
</script>

<template>
  <Nav />
  <Sidebar />

  <div v-if="client" class="main-content">
    <div class="page-content">
      <div class="container-fluid">
        <div class="profile-foreground position-relative mx-n4 mt-n4">
          <div class="profile-wid-bg">
            <img
              src="../../assets/images/profile-bg.jpg"
              alt=""
              class="profile-wid-img"
            />
          </div>
        </div>
        <div class="pt-4 mb-4 mb-lg-3 pb-lg-4">
          <div class="row g-4">
            <div class="col-auto">
              <div class="avatar-lg">
                <img
                  src="https://images.vexels.com/media/users/3/136558/isolated/lists/43cc80b4c098e43a988c535eaba42c53-icono-de-usuario-de-persona.png"
                  alt="user-img"
                  class="img-thumbnail rounded-circle"
                />
              </div>
            </div>
            <!--end col-->
            <div class="col">
              <div class="p-2">
                <h3 class="text-white mb-1">{{ client.name }}</h3>
                <p class="text-white-75">Cliente</p>
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
                                  <th class="ps-0" scope="row">Nombre :</th>
                                  <td class="text-muted">{{ client.name }}</td>
                                </tr>
                                <tr>
                                  <th class="ps-0" scope="row">Correo electrónico :</th>
                                  <td class="text-muted">{{ client.email }}</td>
                                </tr>
                                <tr>
                                  <th class="ps-0" scope="row">Teléfono :</th>
                                  <td class="text-muted">
                                    {{ client.phone_number }}
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <!-- end card body -->
                      </div>
                      <!-- end card -->

                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title mb-3">Nivel {{ level.id }}</h5>
                          <p>{{ level.name }}</p>
                          <p>Descuento: {{ level.percentage_discount }} %</p>
                        </div>
                      </div>

                      <div class="card-body">
                        <div class="card card-animate bg-primary">
                          <div class="card-body">
                            <div class="d-flex align-items-center">
                              <div class="flex-grow-1">
                                <p class="text-uppercase fw-medium text-white-50 mb-0">
                                  Orders
                                </p>
                              </div>
                            </div>
                            <div
                              class="d-flex align-items-end justify-content-between mt-4"
                            >
                              <div>
                                <h4
                                  class="fs-22 fw-semibold ff-secondary mb-4 text-white"
                                >
                                  <span class="counter-value" data-target="36894">{{
                                    cantOrders.length
                                  }}</span>
                                </h4>
                              </div>
                              <div class="avatar-sm flex-shrink-0">
                                <span
                                  class="avatar-title bg-soft-light rounded fs-3 shadow"
                                >
                                  <i class="bx bx-shopping-bag text-white"></i>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--end col-->

                    <div class="col-xxl-9">
                      <div class="card" id="orderList">
                        <div class="card-header border-0">
                          <div class="d-flex align-items-center">
                            <h5 class="card-title mb-0 flex-grow-1">Ordenes</h5>
                          </div>
                        </div>
                        <div
                          class="card-body border border-dashed border-end-0 border-start-0"
                        ></div>
                        <div class="card-body pt-0">
                          <div>
                            <div
                              v-if="cantOrders.length > 0"
                              class="table-responsive table-card mb-1"
                            >
                              <table
                                class="table table-nowrap align-middle"
                                id="orderTable"
                              >
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
                                  <tr v-for="order in orders" :key="order.id">
                                    <td class="id">
                                      {{ order.id }}
                                    </td>
                                    <td class="folio"><RouterLink :to="{path: '/orders/' + order.id,}">#{{ order.folio }}</RouterLink></td>
                                    <td class="customer_name">
                                      {{ client.name }}
                                    </td>
                                    <td class="date">{{ client.name }}</td>
                                    <td class="status">
                                      <span class="">{{
                                        order.presentations[0].status
                                      }}</span>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>

                            <div v-else class="mb-5">
                              <h3>No hay Ordenes</h3>
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

                      <div class="card" id="orderList">
                        <div class="card-header border-0">
                          <div class="d-flex align-items-center">
                            <h5 class="card-title mb-0 flex-grow-1">Direcciones</h5>
                            <div>
                              <button
                                @click="create(client.id)"
                                class="btn btn-success add-btn"
                              >
                                <i class="ri-add-line align-bottom me-1"></i>
                                Agregar
                              </button>
                            </div>
                          </div>
                        </div>

                        <div class="card-body">
                          <div v-if="addresses[0]" id="customerList">
                            <div class="row g-4 mb-3">
                              <div class="col-sm-auto">
                                <div>
                                  <!-- <button class="btn btn-soft-danger" onClick="deleteMultiple()"><i
                                      class="ri-delete-bin-2-line"></i></button> -->
                                </div>
                              </div>
                            </div>

                            <div class="table-responsive table-card mt-3 mb-1">
                              <table
                                class="table align-middle table-nowrap"
                                id="customerTable"
                              >
                                <thead class="table-light">
                                  <tr>
                                    <th class="" data-sort="id">ID</th>
                                    <th class="" data-sort="streetandusenumber">
                                      Calle y número
                                    </th>
                                    <th class="" data-sort="postalcode">Código postal</th>
                                    <th class="" data-sort="city">Ciudad</th>
                                    <th class="" data-sort="province">Provincia</th>
                                    <th class="" data-sort="action">Action</th>
                                  </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                  <tr v-for="address in addresses" :key="addresse">
                                    <td class="num">{{ address.id }}</td>
                                    <td class="streetandusenumber">
                                      {{ address.street_and_use_number }}
                                    </td>
                                    <td class="num">
                                      {{ address.phone_number }}
                                    </td>
                                    <td class="postalcode">
                                      {{ address.postal_code }}
                                    </td>
                                    <td class="city">{{ address.city }}</td>
                                    <td class="province">
                                      {{ address.province }}
                                    </td>

                                    <td>
                                      <div class="d-flex gap-2">
                                        <div class="edit">
                                          <a href="details-address.php">
                                            <RouterLink
                                              :to="{
                                                path: '/address/' + address.id,
                                              }"
                                              class="btn btn-sm btn-primary edit-item-btn"
                                              >Ver
                                            </RouterLink>
                                          </a>
                                        </div>
                                        <div class="edit">
                                          <button
                                            @click="edit(address.id, client.id)"
                                            class="btn btn-sm btn-warning edit-item-btn"
                                          >
                                            Editar
                                          </button>
                                        </div>
                                        <div class="remove">
                                          <button
                                            @click="deleteElement(address.id)"
                                            class="btn btn-sm btn-danger remove-item-btn"
                                          >
                                            Eliminar
                                          </button>
                                        </div>
                                      </div>
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

                          <div v-else class="mb-5">
                            <h3>No hay Direcciones</h3>
                          </div>
                        </div>
                        <!-- end card -->
                      </div>
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
      </div>
      <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
  </div>

  <!-- Grids in modals -->

  <div
    class="modal fade"
    id="showModal"
    tabindex="-1"
    aria-labelledby="exampleModalgridLabel"
    aria-modal="true"
  >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalgridLabel">Direcciones</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">
          <form action="javascript:void(0)">
            <div class="row g-3">
              <div class="col-lg-12">
                <div>
                  <label for="firstName" class="form-label">Nombre</label>
                  <input
                    type="text"
                    class="form-control"
                    id="firstName"
                    placeholder="Nombre"
                  />
                </div>
              </div>
              <!--end col-->

              <div class="col-lg-12">
                <div>
                  <label for="lastName" class="form-label">Apellido</label>
                  <input
                    type="text"
                    class="form-control"
                    id="lastName"
                    placeholder="Apellido"
                  />
                </div>
              </div>
              <!--end col-->
              <div class="col-lg-12">
                <div>
                  <label for="lastName" class="form-label">Calle y número</label>
                  <input
                    type="text"
                    class="form-control"
                    id="lastName"
                    placeholder="Calle y número"
                  />
                </div>
              </div>
              <!--end col-->
              <div class="col-lg-12">
                <div>
                  <label for="lastName" class="form-label">Código postal</label>
                  <input
                    type="text"
                    class="form-control"
                    id="lastName"
                    placeholder="Código postal"
                  />
                </div>
              </div>
              <!--end col-->

              <div class="col-lg-6">
                <!-- Select -->
                <label for="exampleFormControlTextarea5" class="form-label">Ciudad</label>
                <div class="input-group">
                  <label class="input-group-text" for="inputGroupSelect01"
                    >Opciones</label
                  >
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
                <label for="exampleFormControlTextarea5" class="form-label"
                  >Provincia</label
                >
                <div class="input-group">
                  <label class="input-group-text" for="inputGroupSelect01"
                    >Opciones</label
                  >
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
                  <input
                    type="text"
                    class="form-control"
                    id="lastName"
                    placeholder="Teléfono"
                  />
                </div>
              </div>
              <!--end col-->
              <div class="col-lg-12">
                <div class="hstack gap-2 justify-content-end">
                  <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                    Cerrar
                  </button>
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
