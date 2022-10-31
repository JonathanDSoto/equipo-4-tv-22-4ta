<script setup>
import axios from "axios"
import { ref } from "vue"
import { useRouter, RouterLink } from 'vue-router'
import Nav from "../../components/Nav.vue";
import Sidebar from "../../components/Sidebar.vue";

const productsCounter = ref(0)

let user = JSON.parse(localStorage.getItem('user'))
const products = ref(null)
const router = useRouter()

const edit = async (id) => {
  const editswal = await Swal.fire({
    title: 'Edit',
    html:
      '<input placeholder="name" type="text" id="name" class="form-control mb-3">' +
      '<input placeholder="slug-name" type="text" id="slug" class="form-control mb-3">' +
      '<input placeholder="description" type="text" id="description" class="form-control mb-3">' +
      '<select placeholder="brand" id="brand"  name="select" class="form-control mb-3"><option value="" disabled selected>Marca</option></select>' +
      '<select placeholder="categorie" id="categorie"  name="select" class="form-control mb-3"><option value="" disabled selected>Categoria</option></select>' +
      '<select placeholder="tag" id="tag"  name="select" class="form-control mb-3"><option value="" disabled selected>Tag</option></select>' +
      '<textarea rows="4" cols="50" placeholder="features" id="features" class="form-control mb-3">',
    showCancelButton: true,
    focusConfirm: false,
    preConfirm: () => {
      if(document.getElementById('name').value=='' || document.getElementById('slug').value=='' || document.getElementById('description').value=='' || document.getElementById('features').value=='') {
        swal.fire(
          'Error!',
          'No puedes dejar espacios vacios.',
          'error'
        )
      }else if(document.getElementById('brand').value=='')
      {
        swal.fire(
          'Error!',
          'No ha seleccionado una marca.',
          'error'
        )
      }else if(document.getElementById('categorie').value=='')
      {
        swal.fire(
          'Error!',
          'No ha seleccionado una categoria.',
          'error'
        )
      }else if(document.getElementById('tag').value=='')
      {
        swal.fire(
          'Error!',
          'No ha seleccionado una etiqueta.',
          'error'
        )
      }else{
        let data = new FormData();
        data.append('name', document.querySelector('#name').value);
        data.append('slug', document.querySelector('#slug').value);
        data.append('description', document.querySelector('#description').value);
        data.append('features', document.querySelector('#features').value);
        data.append('brand_id', document.querySelector('#brand').value);
        data.append('categories', document.querySelector('#categorie').value);
        data.append('tags', document.querySelector('#tag').value);
        data.append('token', user.token);
        data.append('action', 'update');
        data.append('id', id);

        let config = {
          method: 'post',
          url: 'https://ecommerce-app-0a.herokuapp.com/app/ProductsController.php',
          data: data
        };

        axios(config)
          .then((response) => {
            if (response.data.data) {
              swal.fire(
                'Actualizado',
                'El registro ha sido actualizado.',
                'success'
              ).then((result) => {
                if (result.isConfirmed) {
                  router.go(0)
                }
              })
            } else {
              swal.fire(
                'Error',
                'El registro no ha sido actualizado.',
                'error'
              )
            }
          })
          .catch((error) => {
            console.log(error);
          });
      }
    },
    willOpen: () => {
      const brandSelect = document.querySelector('#brand')
      const categorieSelect = document.querySelector('#categorie')
      const tagSelect = document.querySelector('#tag')
      var data = new FormData();
      data.append('action', 'getBrands');
      data.append('token', user.token);
      var config = {
        method: 'post',
        url: 'https://ecommerce-app-0a.herokuapp.com/app/BrandsController.php',
        data: data
      };
      axios(config)
        .then((response) => {
          for (const iterator of response.data.data) {
            const option = document.createElement('option')
            option.value = iterator.id
            option.text = iterator.name
            brandSelect.appendChild(option)
          }
        })
        .catch(function (error) {
          console.log(error);
        });


      data = new FormData();
      data.append('action', 'getCategories');
      data.append('token', user.token);

      config = {
        method: 'post',
        url: 'https://ecommerce-app-0a.herokuapp.com/app/CategoriesController.php',
        data: data
      };

      axios(config)
        .then((response) => {
          for (const iterator of response.data.data) {
            const option = document.createElement('option')
            option.value = iterator.id
            option.text = iterator.name
            categorieSelect.appendChild(option)
          }
        })
        .catch(function (error) {
          console.log(error);
        });


      data = new FormData();
      data.append('action', 'getTags');
      data.append('token', user.token);

      config = {
        method: 'post',
        url: 'https://ecommerce-app-0a.herokuapp.com/app/TagsController.php',
        data: data
      };

      axios(config)
        .then((response) => {
          for (const iterator of response.data.data) {
            const option = document.createElement('option')
            option.value = iterator.id
            option.text = iterator.name
            tagSelect.appendChild(option)
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
        url: 'https://ecommerce-app-0a.herokuapp.com/app/ProductsController.php',
        data: data
      };

      axios(config)
        .then((response) => {
          if (response.data.code === 2) {
            swal.fire(
              'Eliminado',
              'El registro ha sido Eliminado correctamente.',
              'success'
            ).then((result) => {
              if (result.isConfirmed) {
                router.go(0)
              }
            })
          } else {
            swal.fire(
              'Error!',
              'El registro no ha sido Eliminado.',
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
    title: 'Crear Producto',
    html:
      '<input placeholder="cover" type="file" accept="image/png,image/jpeg" id="cover" class="form-control mb-3">' +
      '<input placeholder="name" type="text" id="name" class="form-control mb-3">' +
      '<input placeholder="slug-name" type="text" id="slug" class="form-control mb-3">' +
      '<input placeholder="description" type="text" id="description" class="form-control mb-3">' +
      '<select placeholder="brand" id="brand"  name="select" class="form-control mb-3"><option value="" disabled selected>Marca</option></select>' +
      '<select placeholder="categorie" id="categorie"  name="select" class="form-control mb-3"><option value="" disabled selected>Categoria</option></select>' +
      '<select placeholder="tag" id="tag"  name="select" class="form-control mb-3"><option value="" disabled selected>Tag</option></select>' +
      '<textarea rows="4" cols="50" placeholder="features" id="features" class="form-control mb-3">',
    showCancelButton: true,
    focusConfirm: false,
    preConfirm: () => {
      if(document.getElementById('name').value=='' || document.getElementById('slug').value=='' || document.getElementById('description').value=='' || document.getElementById('features').value=='') {
        swal.fire(
          'Error!',
          'No puedes dejar espacios vacios.',
          'error'
        )
      }else if(document.getElementById('brand').value=='')
      {
        swal.fire(
          'Error!',
          'No ha seleccionado una marca.',
          'error'
        )
      }else if(document.getElementById('categorie').value=='')
      {
        swal.fire(
          'Error!',
          'No ha seleccionado una categoria.',
          'error'
        )
      }else if(document.getElementById('tag').value=='')
      {
        swal.fire(
          'Error!',
          'No ha seleccionado una etiqueta.',
          'error'
        )
      }else{ 
        var data = new FormData();
        data.append('name', document.querySelector('#name').value);
        data.append('slug', document.querySelector('#slug').value);
        data.append('description', document.querySelector('#description').value);
        data.append('features', document.querySelector('#features').value);
        data.append('brand_id', document.querySelector('#brand').value);
        data.append('cover', document.querySelector('#cover').files[0]);
        data.append('categories', document.querySelector('#categorie').value);
        data.append('tags', document.querySelector('#tag').value);
        data.append('token', user.token);
        data.append('action', 'create');

        var config = {
          method: 'post',
          url: 'https://ecommerce-app-0a.herokuapp.com/app/ProductsController.php',
          data: data
        };

        axios(config)
          .then(function (response) {
            if (response.data.data) {
              swal.fire(
                'Creado',
                'El producto ha sido Creado.',
                'success'
              ).then((result) => {
                if (result.isConfirmed) {
                  router.go(0)
                }
              })
            } else {
              swal.fire(
                'Error!',
                'El producto no ha sido Creado.',
                'error'
              )
            }
          })
          .catch(function (error) {
            console.log(error);
          });
      }
      
    },
    willOpen: () => {
      const brandSelect = document.querySelector('#brand')
      const categorieSelect = document.querySelector('#categorie')
      const tagSelect = document.querySelector('#tag')
      var data = new FormData();
      data.append('action', 'getBrands');
      data.append('token', user.token);
      var config = {
        method: 'post',
        url: 'https://ecommerce-app-0a.herokuapp.com/app/BrandsController.php',
        data: data
      };
      axios(config)
        .then((response) => {
          for (const iterator of response.data.data) {
            const option = document.createElement('option')
            option.value = iterator.id
            option.text = iterator.name
            brandSelect.appendChild(option)
          }
        })
        .catch(function (error) {
          console.log(error);
        });


      data = new FormData();
      data.append('action', 'getCategories');
      data.append('token', user.token);

      config = {
        method: 'post',
        url: 'https://ecommerce-app-0a.herokuapp.com/app/CategoriesController.php',
        data: data
      };

      axios(config)
        .then((response) => {
          for (const iterator of response.data.data) {
            const option = document.createElement('option')
            option.value = iterator.id
            option.text = iterator.name
            categorieSelect.appendChild(option)
          }
        })
        .catch(function (error) {
          console.log(error);
        });


      data = new FormData();
      data.append('action', 'getTags');
      data.append('token', user.token);

      config = {
        method: 'post',
        url: 'https://ecommerce-app-0a.herokuapp.com/app/TagsController.php',
        data: data
      };

      axios(config)
        .then((response) => {
          for (const iterator of response.data.data) {
            const option = document.createElement('option')
            option.value = iterator.id
            option.text = iterator.name
            tagSelect.appendChild(option)
          }
        })
        .catch((error) => {
          console.log(error);
        });

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


const getProducts = () => {
  var data = new FormData();
  data.append('action', 'getProducts');
  data.append('token', user.token);

  var config = {
    method: 'post',
    url: 'https://ecommerce-app-0a.herokuapp.com/app/ProductsController.php',
    data: data
  };

  axios(config)
    .then(function (response) {
      products.value = response.data.data
    })
    .catch(function (error) {
      console.log(error);
    });
}
getProducts()
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
              <h4 class="mb-sm-0">Productos</h4>

              <div class="page-title-right">
                <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Tabla</a></li>
                  <li class="breadcrumb-item active">Productos</li>
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
                        <button @click="create" class="btn btn-success add-btn"><i
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
                          <th class="" data-sort="description">Descripción</th>
                          <th class="" data-sort="action">Action</th>
                        </tr>
                      </thead>
                      <tbody class="list form-check-all">
                        <tr v-if="products" v-for="product in products.slice(productsCounter, productsCounter + 7)"
                          :key="product.id">
                          <td class="id">{{ product.id }}</td>

                          <td>
                            <div class="d-flex align-items-center">
                              <div class="flex-shrink-0 me-3">
                                <div class="avatar-sm bg-light rounded p-1">
                                  <img :src="product.cover" alt="" class="img-fluid d-block">
                                </div>
                              </div>
                              <div class="flex-grow-1">
                                <h5 class="fs-14 mb-1">
                                  <RouterLink :to="{ path: '/products/' + product.slug }" class="text-dark">{{
                                      product.name
                                  }}</RouterLink>
                                </h5>
                                <p class="text-muted mb-0" v-if="product.brand">Marca : <span class="fw-medium">{{
                                    product.brand.name
                                }}</span></p>
                              </div>
                            </div>

                          </td>

                          <td class="description text-break col-md-3" v-if="product.description">{{ product.description
                          }}
                          </td>

                          <td>
                            <div class="d-flex gap-2">
                              <div class="edit">
                                <a href="details.php">
                                  <RouterLink :to="{ path: '/products/' + product.slug }"
                                    class="btn btn-sm btn-primary edit-item-btn">Ver</RouterLink>
                                </a>

                              </div>
                              <div class="edit">
                                <button @click="edit(product.id)"
                                  class="btn btn-sm btn-warning edit-item-btn">Editar</button>
                              </div>
                              <div class="remove">
                                <button @click="deleteElement(product.id)"
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
                      <a class="page-item pagination-prev "
                        @click="productsCounter > 0 ? productsCounter -= 7 : productsCounter">
                        Previous
                      </a>
                      <ul class="pagination listjs-pagination mb-0"></ul>
                      <a class="page-item pagination-next" @click="productsCounter += 7">
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
          <h5 class="modal-title" id="exampleModalgridLabel">Productos</h5>
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
                  <label for="firstName" class="form-label">Nombre</label>
                  <input type="text" class="form-control" id="firstName" placeholder="Nombre">
                </div>
              </div>
              <!--end col-->
              <div class="col-lg-12">
                <div>
                  <label for="lastName" class="form-label">Slug</label>
                  <input type="text" class="form-control" id="lastName" placeholder="Apellido">
                </div>
              </div>
              <!--end col-->
              <div class="col-lg-12">
                <div>
                  <label for="exampleFormControlTextarea5" class="form-label">Descripción</label>
                  <textarea class="form-control" id="exampleFormControlTextarea5" rows="3"></textarea>
                </div>
              </div>
              <!--end col-->
              <div class="col-lg-12">
                <div>
                  <label for="exampleFormControlTextarea5" class="form-label">Caracteristicas</label>
                  <textarea class="form-control" id="exampleFormControlTextarea5" rows="3"></textarea>
                </div>
              </div>
              <!--end col-->
              <div class="col-lg-12">
                <!-- Select -->
                <label for="exampleFormControlTextarea5" class="form-label">Marca</label>
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