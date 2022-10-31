<script setup>
import axios from "axios"
import { ref } from "vue"
import { useRouter, RouterLink } from 'vue-router'
import Nav from "../../components/Nav.vue"
import Sidebar from "../../components/Sidebar.vue"

let user = JSON.parse(localStorage.getItem('user'))
let users = ref(null)
const idusuario = ref(null)
const router = useRouter()

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
      '<input placeholder="name" id="name" class="form-control mb-3" required>' +
      '<input placeholder="lastname" id="lastname" class="form-control mb-3">' +
      '<input placeholder="email" id="email" class="form-control mb-3">' +
      '<input placeholder="phone_number" type="number" id="phone_number" class="form-control mb-3">' +
      '<input placeholder="password" type="password" id="password" class="form-control mb-3">',
    showCancelButton: true,
    focusConfirm: false,
    
    preConfirm: () => {
      if(document.getElementById('name').value=='' || document.getElementById('email').value=='' || document.getElementById('phone_number').value=='' || document.getElementById('password').value=='' || document.getElementById('lastname').value=='' ){
        swal.fire(
          'Error!',
          'No puede dejar campos vacios.',
          'error'
        )
      }else if(document.getElementById('name').value.includes('1') || document.getElementById('name').value.includes('2') || document.getElementById('name').value.includes('3') || document.getElementById('name').value.includes('4') || document.getElementById('name').value.includes('5') || document.getElementById('name').value.includes('6') || document.getElementById('name').value.includes('7') || document.getElementById('name').value.includes('8') || document.getElementById('name').value.includes('9') || document.getElementById('name').value.includes('0') ){
        swal.fire(
          'Error!',
          'El nombre del usuario no puede contener numeros.',
          'error'
        )
      }else if(document.getElementById('lastname').value.includes('1') || document.getElementById('lastname').value.includes('2') || document.getElementById('lastname').value.includes('3') || document.getElementById('lastname').value.includes('4') || document.getElementById('lastname').value.includes('5') || document.getElementById('lastname').value.includes('6') || document.getElementById('lastname').value.includes('7') || document.getElementById('lastname').value.includes('8') || document.getElementById('lastname').value.includes('9') || document.getElementById('lastname').value.includes('0') ){
        swal.fire(
          'Error!',
          'El apellido del usuario no puede contener numeros.',
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
      } 
      else if(!document.getElementById('email').value.includes('@') || !document.getElementById('email').value.includes('.')){
        swal.fire(
          'Error!',
          'Formato de correo invalido.',
          'error'
        )
      }
      else if(!document.getElementById('phone_number').value.length == 10 ){
        swal.fire(
          'Error!',
          'El numero de telefono debe constar de 10 digitos.',
          'error'
        )
      }
      else{
        var data = new FormData();
        data.append('name', document.getElementById('name').value);
        data.append('lastname', document.getElementById('lastname').value);
        data.append('email', document.getElementById('email').value);
        data.append('phone_number', document.getElementById('phone_number').value.toString());
        data.append('created_by', 'jonathan soto');
        data.append('role', 'Administrador');
        data.append('password', document.getElementById('password').value);
        data.append('action', 'edit');
        data.append('token', user.token);
        data.append('id', id);
        console.log(typeof document.getElementById('email').value)
        var config = {
          method: 'post',
          url: 'https://ecommerce-app-0a.herokuapp.com/app/UsersController.php',
          data: data
        };

        return axios(config)
          .then(function (response) {
            if (response.data.data) {
              swal.fire(
                'Actualizado!',
                'El registro ha sido actualizado.',
                'success'
              ).then((result) => {
                if (result.isConfirmed) {
                  router.go(0)
                }
              })
            } else {
              swal.fire(
                'Error!',
                'El registro no ha sido actualizado. Uno de los datos ya esta registrado',
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
      data.append('action', 'delete');
      data.append('id', id);
      data.append('token', user.token);

      var config = {
        method: 'post',
        url: 'https://ecommerce-app-0a.herokuapp.com/app/UsersController.php',
        data: data
      };

      return axios(config)
        .then(function (response) {
          if (response.data.code === 2) {
            swal.fire(
              'Eliminado!',
              'El registro ha sido Eliminado.',
              'success'
            ).then((result) => {
              if (result.isConfirmed) {
                router.go(0)
              }
            })
          } else {
            swal.fire(
              'Error',
              'El registro no ha sido Eliminado.',
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
    deleteswal = await swal.fire(
      'Cancelado',
      'El registro no ha sido Eliminado.',
      'error'
    )
  }
}

const create = async () => {
  const createswal = await Swal.fire({
    title: 'Crear Usuario',
    html:
      '<input placeholder="name" id="name" class="form-control mb-3" required>' +
      '<input placeholder="lastname" id="lastname" class="form-control mb-3">' +
      '<input placeholder="email" id="email" class="form-control mb-3">' +
      '<input placeholder="phone_number" type="number" id="phone_number" class="form-control mb-3">' +
      '<input placeholder="password" type="password" id="password" class="form-control mb-3">' +
      '<input placeholder="profile_photo"  accept="image/png,image/jpeg" type="file" id="profile_photo" class="form-control mb-3">',
    showCancelButton: true,
    focusConfirm: false,
    preConfirm: () => {
      if(document.getElementById('name').value=='' || document.getElementById('email').value=='' || document.getElementById('phone_number').value=='' || document.getElementById('password').value=='' || document.getElementById('lastname').value=='' ){
        swal.fire(
          'Error!',
          'No puede dejar campos vacios.',
          'error'
        )
      }else if(document.getElementById('name').value.includes('1') || document.getElementById('name').value.includes('2') || document.getElementById('name').value.includes('3') || document.getElementById('name').value.includes('4') || document.getElementById('name').value.includes('5') || document.getElementById('name').value.includes('6') || document.getElementById('name').value.includes('7') || document.getElementById('name').value.includes('8') || document.getElementById('name').value.includes('9') || document.getElementById('name').value.includes('0') ){
        swal.fire(
          'Error!',
          'El nombre del usuario no puede contener numeros.',
          'error'
        )
      }else if(document.getElementById('lastname').value.includes('1') || document.getElementById('lastname').value.includes('2') || document.getElementById('lastname').value.includes('3') || document.getElementById('lastname').value.includes('4') || document.getElementById('lastname').value.includes('5') || document.getElementById('lastname').value.includes('6') || document.getElementById('lastname').value.includes('7') || document.getElementById('lastname').value.includes('8') || document.getElementById('lastname').value.includes('9') || document.getElementById('lastname').value.includes('0') ){
        swal.fire(
          'Error!',
          'El apellido del usuario no puede contener numeros.',
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
      } 
      else if(!document.getElementById('email').value.includes('@') || !document.getElementById('email').value.includes('.')){
        swal.fire(
          'Error!',
          'Formato de correo invalido.',
          'error'
        )
      }
      else if(!document.getElementById('phone_number').value.length == 10 ){
        swal.fire(
          'Error!',
          'El numero de telefono debe constar de 10 digitos.',
          'error'
        )
      }else{
        var data = new FormData();
        data.append('name', document.getElementById('name').value);
        data.append('lastname', document.getElementById('lastname').value);
        data.append('email', document.getElementById('email').value);
        data.append('phone_number', document.getElementById('phone_number').value);
        data.append('password', document.getElementById('password').value);
        data.append('profile_photo', document.getElementById('profile_photo').files[0]);
        data.append('action', 'create');
        data.append('token', user.token);
        var config = {
          method: 'post',
          url: 'https://ecommerce-app-0a.herokuapp.com/app/UsersController.php',
          data: data
        };

        return axios(config)
          .then(function (response) {
            if (response.data.data) {
              swal.fire(
                'Usuario Creado',
                'El Usuario ha sido Creado.',
                'success'
              ).then((result) => {
                if (result.isConfirmed) {
                  router.go(0)
                }
              })
            } else {
              swal.fire(
                'Error',
                'El registro no ha sido Creado.',
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
      'El registro no ha sido Creado.',
      'error'
    )
  }
}

const getAllusers = () => {
  var data = new FormData()
  data.append('action', 'getAlluser')
  data.append('token', user.token)

  var config = {
    method: 'post',
    url: 'https://ecommerce-app-0a.herokuapp.com/app/UsersController.php',
    data: data
  }

  axios(config)
    .then((response) => {
      if (response.data.code > 0) {
        users.value = response.data.data
        Swal.close()
      }
    })
    .catch(function (error) {
      console.log(error)
    })

}

getAllusers()

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
              <h4 class="mb-sm-0">Usuarios</h4>

              <div class="page-title-right">
                <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="javascript: void(0)">Tabla</a></li>
                  <li class="breadcrumb-item active">Usuarios</li>
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
                        <button @click="create" class="btn btn-success add-btn" id="create-btn"><i
                            class="ri-add-line align-bottom me-1"></i> Agregar</button>
                      </div>
                    </div>

                  </div>

                  <div class="table-responsive table-card mt-3 mb-1">
                    <table class="table align-middle table-nowrap" id="customerTable">
                      <thead class="table-light">
                        <tr>
                          <th class="" data-sort="id">ID</th>
                          <th class="" data-sort="name">Nombre</th>
                          <th class="" data-sort="lastname">Apellido</th>
                          <th class="" data-sort="email">Correo electrónico</th>
                          <th class="" data-sort="rol">Rol</th>
                          <th class="" data-sort="action">Action</th>
                        </tr>
                      </thead>
                      <tbody class="list form-check-all">
                        <tr v-for="item in users" :key="item.id">
                          <td class="id">{{ item.id }}</td>
                          <td class="name">{{ item.name }}</td>
                          <td class="lastname">{{ item.lastname }}</td>
                          <td class="email">{{ item.email }}</td>
                          <td class="rol">{{ item.role }}</td>
                          <td>
                            <div class="d-flex gap-2">
                              <div class="edit">
                                <a href="details.php">
                                  <RouterLink :to="{ path: '/users/' + item.id }"
                                    class="btn btn-sm btn-primary edit-item-btn">Ver</RouterLink>
                                </a>
                              </div>
                              <div class="edit">
                                <button class="btn btn-sm btn-warning edit-item-btn" data-bs-toggle="modal"
                                  data-bs-target="#showModalEdit" @click="edit(item.id)">Editar</button>
                              </div>
                              <div class="remove">
                                <button class="btn btn-sm btn-danger remove-item-btn"
                                  @click="deleteElement(item.id)">Eliminar</button>
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

  <!-- <div class="modal fade" id="showModalEdit" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalgridLabel">Editar Usuario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="javascript:void(0)">
            <div class="row g-3">
              <div class="col-lg-12">
                <div>
                  <label for="firstName" class="form-label">Nombre</label>
                  <input required type="text" class="form-control" v-model="editfirstName" placeholder="Nombre">
                </div>
              </div>
              <div class="col-lg-12">
                <div>
                  <label for="lastName" class="form-label">Apellido</label>
                  <input required type="text" class="form-control" v-model="editlastName" placeholder="Apellido">
                </div>
              </div>
              <div class="col-lg-12">
                <div>
                  <label for="lastName" class="form-label">Teléfono</label>
                  <input required type="text" class="form-control" v-model="editphone" placeholder="Teléfono">
                </div>
              </div>
              <div class="col-lg-12">
                <div>
                  <label for="emailInput" class="form-label">Correo electrónico</label>
                  <input required type="email" class="form-control" v-model="editemailInput"
                    placeholder="Correo electrónico">
                </div>
              </div>
              <div class="col-lg-12">
                <div>
                  <label for="passwordInput" class="form-label">Contraseña</label>
                  <input required type="password" class="form-control" v-model="editpasswordInput"
                    placeholder="451326546">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="hstack gap-2 justify-content-end">
                  <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" @click="edit">Guardar</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="showModalAdd" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalgridLabel">Agregar Usuario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="javascript:void(0)">
            <div class="row g-3">
              <div class="col-lg-12">
                <label for="formFile" class="form-label">Foto de perfil</label>
                <input required class="form-control" type="file" id="formFile">
              </div>
              <div class="col-lg-12">
                <div>
                  <label for="firstName" class="form-label">Nombre</label>
                  <input required type="text" class="form-control" id="firstName" placeholder="Nombre">
                </div>
              </div>
              <div class="col-lg-12">
                <div>
                  <label for="lastName" class="form-label">Apellido</label>
                  <input required type="text" class="form-control" id="lastName" placeholder="Apellido">
                </div>
              </div>
              <div class="col-lg-12">
                <div>
                  <label for="lastName" class="form-label">Teléfono</label>
                  <input required type="text" class="form-control" id="phone" placeholder="Teléfono">
                </div>
              </div>
              <div class="col-lg-12">
                <div>
                  <label for="emailInput" class="form-label">Correo electrónico</label>
                  <input required type="email" class="form-control" placeholder="Correo electrónico">
                </div>
              </div>
              <div class="col-lg-12">
                <div>
                  <label for="passwordInput" class="form-label">Contraseña</label>
                  <input required type="password" class="form-control" id="passwordInput" value="451326546">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="hstack gap-2 justify-content-end">
                  <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div> -->

</template>