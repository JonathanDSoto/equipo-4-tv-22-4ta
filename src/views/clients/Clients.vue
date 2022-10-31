<script setup>
import axios from "axios"
import { ref } from "vue"
import { useRouter, RouterLink } from 'vue-router'
import Nav from "../../components/Nav.vue";
import Sidebar from "../../components/Sidebar.vue";


let user = JSON.parse(localStorage.getItem('user'))
const clients = ref(null)
const router = useRouter()
var emailRegex = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

const edit = async (id) => {
  const editswal = await Swal.fire({
    title: 'Editar Cliente',
    html:
      '<input placeholder="Nombre" id="name" class="form-control mb-3" required>' +
      '<input placeholder="Correo Electrónico" id="email" class="form-control mb-3">' +
      '<input placeholder="Número Telefonico" type="number" id="phone_number" class="form-control mb-3">' +
      '<input placeholder="Contraseña" type="password" id="password" class="form-control mb-3">' +
      '<input placeholder="Suscrito" type="is_suscribed" id="is_suscribed" class="form-control mb-3">' +
      '<input placeholder="Level_id" type="level_id" id="level_id" class="form-control mb-3">',
    showCancelButton: true,
    focusConfirm: false,
    preConfirm: () => {
      if(document.getElementById('name').value=='' || document.getElementById('email').value=='' || document.getElementById('phone_number').value=='' || document.getElementById('password').value=='' || document.getElementById('is_suscribed').value=='' || document.getElementById('level_id').value==''){
        swal.fire(
              'Error!',
              'No puede dejar campos vacios.',
              'error'
            )
      }else if(document.getElementById('password').value.length <8){
        swal.fire(
          'Error!',
          'La contraseña debe contener 8 digitos o más.',
          'error'
        )
      }else if(document.getElementById('phone_number').value.includes('e') || document.getElementById('phone_number').value.includes('E')){
        swal.fire(
          'Error!',
          'El numero de telefono no puede contener letras.',
          'error'
        )
      }else if(document.getElementById('level_id').value.includes('e') || document.getElementById('level_id').value.includes('E') || document.getElementById('level_id').value.length <1 || document.getElementById('level_id').value.length >3){
        swal.fire(
          'Error!',
          'El id del nivel de cliente tiene que ser un numero.',
          'error'
        )
      }else if(document.getElementById('is_suscribed').value.includes('e') || document.getElementById('is_suscribed').value.includes('E') || document.getElementById('is_suscribed').value.length >1|| document.getElementById('is_suscribed').value.length <0){
        swal.fire(
          'Error!',
          'El estado de suscripcion del cliente solo puede ser 1 o 0 .',
          'error'
        )
      }else if(!document.getElementById('phone_number').value.length == 10 ){
        swal.fire(
          'Error!',
          'El numero de telefono debe constar de 10 digitos.',
          'error'
        )
      }else if(!emailRegex.test(document.getElementById('email').value)){
        swal.fire(
          'Error!',
          'Formato de correo invalido.',
          'error'
        )
      }else{
        var data = new FormData();
        data.append('name', document.getElementById('name').value);
        data.append('email', document.getElementById('email').value);
        data.append('password', document.getElementById('password').value);
        data.append('phone_number', document.getElementById('phone_number').value);
        data.append('action', 'updateClient');
        data.append('token', user.token);
        data.append('id', id);
        data.append('is_suscribed', document.getElementById('is_suscribed').value);
        data.append('level_id', document.getElementById('level_id').value);

        var config = {
          method: 'post',
          url: 'https://ecommerce-app-0a.herokuapp.com/app/ClientsController.php',
          data: data
        };

        axios(config)
          .then(function (response) {
            if (response.data.data) {
              swal.fire(
                'Editado',
                'El registro ha sido Editado.',
                'success'
              ).then((result) => {
                if (result.isConfirmed) {
                  router.go(0)
                }
              })
            } else {
              swal.fire(
                'Error!',
                'El registro no ha sido Editado.',
                'error'
              )
            }
          })
          .catch(function (error) {
            console.log(error);
          });
      }
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
      var data = new FormData();
      data.append('action', 'deleteClient');
      data.append('id', id);
      data.append('token', user.token);

      var config = {
        method: 'post',
        url: 'https://ecommerce-app-0a.herokuapp.com/app/ClientsController.php',
        data: data
      };

      axios(config)
        .then(function (response) {
          if (response.data.code === 2) {
            swal.fire(
              'Eliminado',
              'El cliente ha sido Eliminado.',
              'success'
            ).then((result) => {
              if (result.isConfirmed) {
                router.go(0)
              }
            })
          } else {
            swal.fire(
              'Error!',
              'El cliente no ha sido Eliminado.',
              'error'
            )
          }
        })
        .catch(function (error) {
          console.log(error);
        });

    }
  })
  console.log(deleteswal)

  if (!deleteswal.isConfirmed) {
    router.go(0)
    deleteswal = await swal.fire(
      'Cancelado',
      'El registro no ha sido Eliminado.',
      'error'
    )
  }
}

const create = async () => {
  const createswal = await Swal.fire({
    title: 'Crear Cliente',
    html:
      '<input placeholder="Nombre" id="name" class="form-control mb-3" required>' +
      '<input placeholder="Correo Electrónico" id="email" type="email" class="form-control mb-3">' +
      '<input placeholder="Número Telefonico" type="number" id="phone_number" class="form-control mb-3">' +
      '<input placeholder="Contraseña" type="password" id="password" class="form-control mb-3">' +
      '<input placeholder="Suscrito" type="number" id="is_suscribed" class="form-control mb-3">' +
      '<input placeholder="Level_id" type="number" id="level_id" class="form-control mb-3">',
    showCancelButton: true,
    focusConfirm: false,
    preConfirm: () => {
      if(document.getElementById('name').value=='' || document.getElementById('email').value=='' || document.getElementById('phone_number').value=='' || document.getElementById('password').value=='' || document.getElementById('is_suscribed').value=='' || document.getElementById('level_id').value==''){
        swal.fire(
          'Error!',
          'No puede dejar campos vacios.',
          'error'
        )
      }else if(document.getElementById('name').value.includes('1') || document.getElementById('name').value.includes('2') || document.getElementById('name').value.includes('3') || document.getElementById('name').value.includes('4') || document.getElementById('name').value.includes('5') || document.getElementById('name').value.includes('6') || document.getElementById('name').value.includes('7') || document.getElementById('name').value.includes('8') || document.getElementById('name').value.includes('9') || document.getElementById('name').value.includes('0') ){
        swal.fire(
          'Error!',
          'El nombre del cliente no puede contener numeros.',
          'error'
        )
      }else if(document.getElementById('password').value.length <8){
        swal.fire(
          'Error!',
          'La contraseña debe contener 8 digitos o más.',
          'error'
        )
      }else if(document.getElementById('phone_number').value.includes('e') || document.getElementById('phone_number').value.includes('E')){
        swal.fire(
          'Error!',
          'El numero de telefono no puede contener letras.',
          'error'
        )
      }else if(document.getElementById('level_id').value.includes('e') || document.getElementById('level_id').value.includes('E') || document.getElementById('level_id').value.length <1 || document.getElementById('level_id').value.length >3){
        swal.fire(
          'Error!',
          'El id del nivel de cliente tiene que ser un numero.',
          'error'
        )
      }else if(document.getElementById('is_suscribed').value.includes('e') || document.getElementById('is_suscribed').value.includes('E') || document.getElementById('is_suscribed').value.length >1|| document.getElementById('is_suscribed').value.length <0){
        swal.fire(
          'Error!',
          'El estado de suscripcion del cliente solo puede ser 1 o 0 .',
          'error'
        )
      }else if(!document.getElementById('phone_number').value.length == 10 ){
        swal.fire(
          'Error!',
          'El numero de telefono debe constar de 10 digitos.',
          'error'
        )
      }else if(!emailRegex.test(document.getElementById('email').value)){
        swal.fire(
          'Error!',
          'Formato de correo invalido.',
          'error'
        )
      }else{
        var data = new FormData();
      data.append('name', document.getElementById('name').value);
      data.append('email', document.getElementById('email').value);
      data.append('password', document.getElementById('password').value);
      data.append('phone_number', document.getElementById('phone_number').value);
      data.append('action', 'createClient');
      data.append('token', user.token);
      data.append('is_suscribed', document.getElementById('is_suscribed').value);
      data.append('level_id', document.getElementById('level_id').value);

      var config = {
        method: 'post',
        url: 'https://ecommerce-app-0a.herokuapp.com/app/ClientsController.php',
        data: data
      };

      return axios(config)
        .then(function (response) {
          if (response.data.data) {
            swal.fire(
              'Creado',
              'El cliente ha sido Creado.',
              'success'
            ).then((result) => {
              if (result.isConfirmed) {
                router.go(0)
              }
            })
          } else {
            swal.fire(
              'Error!',
              'El cliente no ha sido Creado.',
              'error'
            )
          }
        })
        .catch(function (error) {
          console.log(error);
        });
      }  
    }
  })
  console.log(createswal)

  if (!createswal.isConfirmed) {
    createswal = await swal.fire(
      'Cancelado',
      'El cliente no ha sido Creado.',
      'error'
    )
  }
}



const getClients = () => {
  var data = new FormData();
  data.append('action', 'getClients');
  data.append('token', user.token);

  var config = {
    method: 'post',
    url: 'https://ecommerce-app-0a.herokuapp.com/app/ClientsController.php',
    data: data
  };

  axios(config)
    .then((response) => {
      clients.value = response.data.data
    })
    .catch(function (error) {
      console.log(error);
    });
}
getClients();
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
              <h4 class="mb-sm-0">clientes</h4>

              <div class="page-title-right">
                <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Tabla</a></li>
                  <li class="breadcrumb-item active">Clientes</li>
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
                      <div>
                        <button @click="create" class="btn btn-success add-btn">Agregar</button>

                      </div>
                    </div>

                  </div>

                  <div class="table-responsive table-card mt-3 mb-1">
                    <table class="table align-middle table-nowrap" id="customerTable">
                      <thead class="table-light">
                        <tr>
                          <th class="" data-sort="id">ID</th>
                          <th class="" data-sort="name">Nombre</th>
                          <th class="" data-sort="phone">Teléfono</th>
                          <th class="" data-sort="email">Correo electrónico</th>
                          <th class="" data-sort="subscription">Suscripción</th>
                          <th class="" data-sort="action">Action</th>
                        </tr>
                      </thead>
                      <tbody class="list form-check-all">
                        <tr v-for="item in clients" :key="item.id">
                          <td class="id">{{ item.id }}</td>
                          <td class="name">{{ item.name }}</td>
                          <td class="email">{{ item.phone_number }}</td>
                          <td class="phone">{{ item.email }}</td>
                          <td class="subscription">
                            <span class="btn  btn-outline-success disabled">Active</span>
                          </td>

                          <td>
                            <div class="d-flex gap-2">
                              <div class="edit">
                                <a href="details.php">
                                  <RouterLink :to="{ path: '/clients/' + item.id }"
                                    class="btn btn-sm btn-primary edit-item-btn">
                                    Ver</RouterLink>
                                </a>
                              </div>
                              <div class="edit">
                                <button @click="edit(item.id)"
                                  class="btn btn-sm btn-warning edit-item-btn">Editar</button>
                              </div>
                              <div class="remove">
                                <button @click="deleteElement(item.id)"
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
          <h5 class="modal-title" id="exampleModalgridLabel">Clientes</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="javascript:void(0);">
            <div class="row g-3">


              <div class="col-lg-12">
                <div>
                  <label for="firstName" class="form-label">Nombre</label>
                  <input type="text" class="form-control" id="firstName" placeholder="Nombre">
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
                <div>
                  <label for="emailInput" class="form-label">Correo electrónico</label>
                  <input type="email" class="form-control" id="emailInput" placeholder="Correo electrónico">
                </div>
              </div>
              <!--end col-->

              <div class="col-lg-12">
                <!-- Select -->
                <label for="exampleFormControlTextarea5" class="form-label">Suscripción</label>
                <div class="input-group">
                  <label class="input-group-text" for="inputGroupSelect01">Opciones</label>
                  <select class="form-select">
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
                <label for="exampleFormControlTextarea5" class="form-label">Nivel</label>
                <div class="input-group">
                  <label class="input-group-text" for="inputGroupSelect01">Opciones</label>
                  <select class="form-select">
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