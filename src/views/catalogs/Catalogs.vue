<script setup>
import axios from "axios"
import { ref } from "vue"
import { useRouter, RouterLink } from 'vue-router'
import Nav from "../../components/Nav.vue";
import Sidebar from "../../components/Sidebar.vue";


let user = JSON.parse(localStorage.getItem('user'))

const categorias = ref(null)
const categoriasCounter = ref(0)
const brands = ref(null)
const brandsCounter = ref(0)
const tags = ref(null)
const tagsCounter = ref(0)
const router = useRouter()

const editcategories = async (id) => {
  const editswal = await Swal.fire({
    title: 'Editar categoria',
    html:
      '<input placeholder="Nombre" type="text" id="name" class="form-control mb-3">' +
      '<input placeholder="Descripción" type="text" id="description" class="form-control mb-3">' +
      '<input placeholder="Slug" type="text" id="slug" class="form-control mb-3">',
    showCancelButton: true,
    focusConfirm: false,
    preConfirm: () => {
      
      if(document.getElementById('name').value=='' || document.getElementById('description').value=='' || document.getElementById('slug').value==''){
        swal.fire(
          'Cancelado',
          'No puedes dejar campos vacios',
          'error'
        )
      }else{
        let data = new FormData();
        data.append('action', 'updateCategory');
        data.append('token', user.token);
        data.append('name', document.querySelector('#name').value);
        data.append('description', document.querySelector('#description').value);
        data.append('slug', document.querySelector('#slug').value);
        data.append('id', id);

        let config = {
          method: 'post',
          url: 'https://ecommerce-app-0a.herokuapp.com/app/CategoriesController.php',
          data: data
        };

        axios(config)
          .then((response) => {
            if (response.data.data) {
              swal.fire(
                'Actualizar',
                response.data.message,
                'success'
              ).then((result) => {
                if (result.isConfirmed) {
                  router.go(0)
                }
              })
            } else {
              swal.fire(
                'Cancelado',
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
  console.log(editswal)

  if (!editswal.isConfirmed) {
    editswal = await swal.fire(
      'Cancelado',
      'El registro no ha sido actualizado.',
      'error'
    )
  }
}

const deletecategories = async (id) => {
  const deleteswal = await Swal.fire({
    title: 'Estas Seguro que quieres eliminarlo',
    icon: 'error',
    showCancelButton: true,
    focusConfirm: false,
    preConfirm: () => {
      let data = new FormData();
      data.append('action', 'deleteCategory');
      data.append('token', user.token);
      data.append('id', id);

      let config = {
        method: 'post',
        url: 'https://ecommerce-app-0a.herokuapp.com/app/CategoriesController.php',
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
              'Eliminado',
              response.data.message,
              'error'
            )
          }
        })
        .catch((error) => {
          //console.log(error);
        });

    }
  })

  if (!deleteswal.isConfirmed) {
    deleteswal = await swal.fire(
      'Cancelado',
      'El registro no ha sido Eliminado.',
      'error'
    )
  }
}

const createcategories = async () => {
  const createswal = await Swal.fire({
    title: 'Crear categoria',
    html:
      '<input placeholder="name" type="text" id="name" class="form-control mb-3">' +
      '<input placeholder="description" type="text" id="description" class="form-control mb-3">' +
      '<input placeholder="slug" type="text" id="slug" class="form-control mb-3">',
    showCancelButton: true,
    focusConfirm: false,
    preConfirm: () => {
      if(document.getElementById('name').value=='' || document.getElementById('description').value=='' || document.getElementById('slug').value==''){
        swal.fire(
          'Cancelado',
          'No puedes dejar campos vacios',
          'error'
        )
      }else{
        
        let data = new FormData();
        data.append('action', 'createCategory');
        data.append('token', user.token);
        data.append('name', document.querySelector('#name').value);
        data.append('description', document.querySelector('#description').value);
        data.append('slug', document.querySelector('#slug').value);

        let config = {
          method: 'post',
          url: 'https://ecommerce-app-0a.herokuapp.com/app/CategoriesController.php',
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
                'Error',
                response.data.message,
                'error'
              )
            }
          })
          .catch((error) => {
            console.log(error);
          });
      }
    }
  })

  if (!createswal.isConfirmed) {
    createswal = await swal.fire(
      'Cancelado',
      'El registro no ha sido Creado.',
      'error'
    )
  }
}


const createbrands = async () => {
  const createswal = await Swal.fire({
    title: 'Crear Marca',
    html:
      '<input placeholder="Nombre" type="text" id="name" class="form-control mb-3">' +
      '<input placeholder="Descripción" type="text" id="description" class="form-control mb-3">' +
      '<input placeholder="Slug" type="text" id="slug" class="form-control mb-3">',
    showCancelButton: true,
    focusConfirm: false,
    preConfirm: () => {
      if(document.getElementById('name').value=='' || document.getElementById('description').value=='' || document.getElementById('slug').value==''){
        swal.fire(
          'Cancelado',
          'No puedes dejar campos vacios',
          'error'
        )
      }else{
        let data = new FormData();
        data.append('action', 'createBrand');
        data.append('token', user.token);
        data.append('name', document.querySelector('#name').value);
        data.append('description', document.querySelector('#description').value);
        data.append('slug', document.querySelector('#slug').value);

        let config = {
          method: 'post',
          url: 'https://ecommerce-app-0a.herokuapp.com/app/BrandsController.php',
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
                'Error',
                response.data.message,
                'error'
              )
            }
          })
          .catch((error) => {
            //console.log(error);
          });
        }
    }
  })

  if (!createswal.isConfirmed) {
    createswal = await swal.fire(
      'Cancelado',
      'El registro no ha sido Creado.',
      'error'
    )
  }
}
const deletebrands = async (id) => {
  const deleteswal = await Swal.fire({
    title: 'Estas Seguro que quieres eliminarlo',
    icon: 'error',
    showCancelButton: true,
    focusConfirm: false,
    preConfirm: () => {
      let data = new FormData();
      data.append('action', 'deleteBrand');
      data.append('id', id);
      data.append('token', user.token);

      let config = {
        method: 'post',
        url: 'https://ecommerce-app-0a.herokuapp.com/app/BrandsController.php',
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
              'Eliminado',
              response.data.message,
              'error'
            )
          }
        })
        .catch((error) => {
          //console.log(error);
        });

    }
  })

  if (!deleteswal.isConfirmed) {
    deleteswal = await swal.fire(
      'Cancelado',
      'El registro no ha sido Eliminado.',
      'error'
    )
  }
}
const editbrands = async (id) => {
  const editswal = await Swal.fire({
    title: 'Editar Marca',
    html:
      '<input placeholder="Nombre" type="text" id="name" class="form-control mb-3">' +
      '<input placeholder="Descripción" type="text" id="description" class="form-control mb-3">' +
      '<input placeholder="Slug" type="text" id="slug" class="form-control mb-3">',
    showCancelButton: true,
    focusConfirm: false,
    preConfirm: () => {
      if(document.getElementById('name').value=='' || document.getElementById('description').value=='' || document.getElementById('slug').value==''){
        swal.fire(
          'Cancelado',
          'No puedes dejar campos vacios',
          'error'
        )
      }else{
        let data = new FormData();
        data.append('action', 'updateBrand');
        data.append('token', user.token);
        data.append('name', document.querySelector('#name').value);
        data.append('description', document.querySelector('#description').value);
        data.append('slug', document.querySelector('#slug').value);
        data.append('id', id);

        let config = {
          method: 'post',
          url: 'https://ecommerce-app-0a.herokuapp.com/app/BrandsController.php',
          data: data
        };

        axios(config)
          .then((response) => {
            if (response.data.data) {
              swal.fire(
                'Actualizar',
                response.data.message,
                'success'
              ).then((result) => {
                if (result.isConfirmed) {
                  router.go(0)
                }
              })
            } else {
              swal.fire(
                'Cancelado',
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
  console.log(editswal)

  if (!editswal.isConfirmed) {
    editswal = await swal.fire(
      'Cancelado',
      'El registro no ha sido actualizado.',
      'error'
    )
  }
}


const createtags = async () => {
  const createswal = await Swal.fire({
    title: 'Crear Etiqueta',
    html:
      '<input placeholder="Nombre" type="text" id="name" class="form-control mb-3">' +
      '<input placeholder="Descripción" type="text" id="description" class="form-control mb-3">' +
      '<input placeholder="Slug" type="text" id="slug" class="form-control mb-3">',
    showCancelButton: true,
    focusConfirm: false,
    preConfirm: () => {
      if(document.getElementById('name').value=='' || document.getElementById('description').value=='' || document.getElementById('slug').value==''){
        swal.fire(
          'Cancelado',
          'No puedes dejar campos vacios',
          'error'
        )
      }else{
        let data = new FormData();
        data.append('action', 'create');
        data.append('token', user.token);
        data.append('name', document.querySelector('#name').value);
        data.append('description', document.querySelector('#description').value);
        data.append('slug', document.querySelector('#slug').value);

        let config = {
          method: 'post',
          url: 'https://ecommerce-app-0a.herokuapp.com/app/TagsController.php',
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
                'Error',
                response.data.message,
                'error'
              )
            }
          })
          .catch((error) => {
            //console.log(error);
          });
      }
    }
  })

  if (!createswal.isConfirmed) {
    createswal = await swal.fire(
      'Cancelado',
      'El registro no ha sido Creado.',
      'error'
    )
  }
}
const deletetags = async (id) => {
  const deleteswal = await Swal.fire({
    title: 'Estas Seguro que quieres eliminarlo',
    icon: 'error',
    showCancelButton: true,
    focusConfirm: false,
    preConfirm: () => {
      let data = new FormData();
      data.append('action', 'delete');
      data.append('id', id);
      data.append('token', user.token);

      let config = {
        method: 'post',
        url: 'https://ecommerce-app-0a.herokuapp.com/app/TagsController.php',
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
              'Eliminado',
              response.data.message,
              'error'
            )
          }
        })
        .catch((error) => {
          //console.log(error);
        });

    }
  })

  if (!deleteswal.isConfirmed) {
    deleteswal = await swal.fire(
      'Cancelado',
      'El registro no ha sido Eliminado.',
      'error'
    )
  }
}
const edittags = async (id) => {
  const editswal = await Swal.fire({
    title: 'Editar Marca',
    html:
      '<input placeholder="Nombre" type="text" id="name" class="form-control mb-3">' +
      '<input placeholder="Descripción" type="text" id="description" class="form-control mb-3">' +
      '<input placeholder="Slug" type="text" id="slug" class="form-control mb-3">',
    showCancelButton: true,
    focusConfirm: false,
    preConfirm: () => {
      if(document.getElementById('name').value=='' || document.getElementById('description').value=='' || document.getElementById('slug').value==''){
        swal.fire(
          'Cancelado',
          'No puedes dejar campos vacios',
          'error'
        )
      }else{
        let data = new FormData();
        data.append('action', 'update');
        data.append('token', user.token);
        data.append('name', document.querySelector('#name').value);
        data.append('description', document.querySelector('#description').value);
        data.append('slug', document.querySelector('#slug').value);
        data.append('id', id);

        let config = {
          method: 'post',
          url: 'https://ecommerce-app-0a.herokuapp.com/app/TagsController.php',
          data: data
        };

        axios(config)
          .then((response) => {
            if (response.data.data) {
              swal.fire(
                'Actualizar',
                response.data.message,
                'success'
              ).then((result) => {
                if (result.isConfirmed) {
                  router.go(0)
                }
              })
            } else {
              swal.fire(
                'Cancelado',
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
  console.log(editswal)

  if (!editswal.isConfirmed) {
    editswal = await swal.fire(
      'Cancelado',
      'El registro no ha sido actualizado.',
      'error'
    )
  }
}



const getcategories = () => {
  Swal.fire({
    title: '',
    didOpen: () => {
      Swal.showLoading()
    }
  })
  var data = new FormData();
  data.append('action', 'getCategories');
  data.append('token', user.token);

  var config = {
    method: 'post',
    url: 'https://ecommerce-app-0a.herokuapp.com/app/CategoriesController.php',
    data: data
  };

  axios(config)
    .then((response) => {
      categorias.value = response.data.data
      Swal.close()
    })
    .catch(function (error) {
      //console.log(error);
    });
}
getcategories()

const getbrands = () => {
  Swal.fire({
    title: '',
    didOpen: () => {
      Swal.showLoading()
    }
  })
  var data = new FormData();
  data.append('action', 'getBrands');
  data.append('token', user.token);

  var config = {
    method: 'post',
    url: 'https://ecommerce-app-0a.herokuapp.com//app/BrandsController.php',
    data: data
  };

  axios(config)
    .then(function (response) {
      brands.value = response.data.data
      Swal.close()
    })
    .catch(function (error) {
      //console.log(error);
    });
}
getbrands()

const getTags = () => {
  Swal.fire({
    title: '',
    didOpen: () => {
      Swal.showLoading()
    }
  })
  var data = new FormData();
  data.append('action', 'getTags');
  data.append('token', user.token);

  var config = {
    method: 'post',
    url: 'https://ecommerce-app-0a.herokuapp.com//app/TagsController.php',
    data: data
  };

  axios(config)
    .then((response) => {
      tags.value = response.data.data
      Swal.close()
    })
    .catch(function (error) {
      //console.log(error);
    });
}
getTags()
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
              <h4 class="mb-sm-0">CATÁLOGOS</h4>

              <div class="page-title-right">
                <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Tabla</a></li>
                  <li class="breadcrumb-item active">Catálogos</li>
                </ol>
              </div>

            </div>
          </div>
        </div>
        <!-- end page title -->



        <div class="row">

          <div class="col-lg-12">
            <div class="card">
              <div class="card-body border border-dashed border-end-0 border-start-0">
                <h5 class="">CATEGORÍAS</h5>
              </div>

              <div class="card-body">
                <div id="customerList">
                  <div class="row g-4 mb-3">
                    <div class="col-sm-auto">
                      <div>
                        <button @click="createcategories" class="btn btn-success add-btn"><i
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
                          <th class="" data-sort="descripcion">Descripción</th>
                          <th class="" data-sort="action">Action</th>
                        </tr>
                      </thead>
                      <tbody class="list form-check-all">
                        <tr v-if="categorias"
                          v-for="category in categorias.slice(categoriasCounter, categoriasCounter + 5)"
                          :key="category.id">
                          <td class="id">{{ category.id }}</td>
                          <td>
                            <RouterLink class="link-primary" :to="{ path: '/catalogs/category/' + category.id }">{{
                                category.name
                            }}
                            </RouterLink>
                          </td>
                          <td class="descripcion">{{ category.description }}</td>


                          <td>
                            <div class="d-flex gap-2">
                              <div class="edit">
                                <button @click="editcategories(category.id)"
                                  class="btn btn-sm btn-warning edit-item-btn">Editar</button>
                              </div>
                              <div class="remove">
                                <button @click="deletecategories(category.id)"
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
                        @click="categoriasCounter > 0 ? categoriasCounter -= 5 : categoriasCounter = 0">
                        Previous
                      </a>
                      <ul class="pagination listjs-pagination mb-0"></ul>
                      <a class="page-item pagination-next"
                        @click="categoriasCounter < categorias.length ? categoriasCounter += 5 : categoriasCounter">
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



        <div class="row">

          <div class="col-lg-12">
            <div class="card">
              <div class="card-body border border-dashed border-end-0 border-start-0">
                <h5 class="">MARCAS</h5>
              </div>

              <div class="card-body">
                <div id="customerList">
                  <div class="row g-4 mb-3">
                    <div class="col-sm-auto">
                      <div>
                        <button @click="createbrands" class="btn btn-success add-btn"><i
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
                          <th class="" data-sort="descripcion">Descripción</th>
                          <th class="" data-sort="action">Action</th>
                        </tr>
                      </thead>
                      <tbody class="list form-check-all">
                        <tr v-if="brands" v-for="brand in brands.slice(brandsCounter, brandsCounter + 5)"
                          :key="brand.id">
                          <td class="id">{{ brand.id }}</td>
                          <td>
                            <RouterLink class="link-primary" :to="{ path: '/catalogs/brand/' + brand.id }">{{ brand.name
                            }}</RouterLink>
                          </td>
                          <td class="descripcion">{{ brand.description }}</td>


                          <td>
                            <div class="d-flex gap-2">
                              <div class="edit">
                                <button @click="editbrands(brand.id)"
                                  class="btn btn-sm btn-warning edit-item-btn">Editar</button>
                              </div>
                              <div class="remove">
                                <button @click="deletebrands(brand.id)"
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
                      <a @click="brandsCounter > 0 ? brandsCounter -= 5 : brandsCounter = 0"
                        class="page-item pagination-prev ">
                        Previous
                      </a>
                      <ul class="pagination listjs-pagination mb-0"></ul>
                      <a @click="brandsCounter < brands.length ? brandsCounter += 5 : brandsCounter"
                        class="page-item pagination-next">
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



        <div class="row">

          <div class="col-lg-12">
            <div class="card">

              <div class="card-body border border-dashed border-end-0 border-start-0">
                <h5 class="">ETIQUETAS</h5>
              </div>

              <div class="card-body">
                <div id="customerList">
                  <div class="row g-4 mb-3">
                    <div class="col-sm-auto">
                      <div>
                        <button @click="createtags" class="btn btn-success add-btn"><i
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
                          <th class="" data-sort="descripcion">Descripción</th>
                          <th class="" data-sort="action">Action</th>
                        </tr>
                      </thead>
                      <tbody class="list form-check-all">
                        <tr v-if="tags" v-for="tag in tags.slice(tagsCounter, tagsCounter + 5)" :key="tag.id">
                          <td class="id">{{ tag.id }}</td>
                          <td>
                            <RouterLink class="link-primary" :to="{ path: '/catalogs/tag/' + tag.id }">{{ tag.name }}
                            </RouterLink>
                          </td>
                          <td class="descripcion">{{ tag.description }}</td>


                          <td>
                            <div class="d-flex gap-2">
                              <div class="edit">
                                <button @click="edittags(tag.id)"
                                  class="btn btn-sm btn-warning edit-item-btn">Editar</button>
                              </div>
                              <div class=" remove">
                                <button @click="deletetags(tag.id)"
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
                      <button class="page-item pagination-prev "
                        @click="tagsCounter > 0 ? tagsCounter -= 5 : tagsCounter = 0">
                        Previous
                      </button>
                      <ul class="pagination listjs-pagination mb-0"></ul>
                      <button class="page-item pagination-next"
                        @click="tagsCounter < tags.length ? tagsCounter += 5 : tagsCounter">
                        Next
                      </button>
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

</template>