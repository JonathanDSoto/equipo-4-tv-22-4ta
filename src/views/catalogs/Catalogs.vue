<script setup>
import axios from "axios"
import { ref } from "vue"
import Nav from "../../components/Nav.vue";
import Sidebar from "../../components/Sidebar.vue";


let user = JSON.parse(localStorage.getItem('user'))

const categorias = ref(null)
const categoriasCounter = ref(0)
const brands = ref(null)
const brandsCounter = ref(0)
const tags = ref(null)
const tagsCounter = ref(0)



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
      console.log(error);
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
      console.log(error);
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
      console.log(error);
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
                        <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn"
                          data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Agregar</button>

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
                          <td class="name">{{ category.name }}</td>
                          <td class="descripcion">{{ category.description }}</td>


                          <td>
                            <div class="d-flex gap-2">
                              <div class="edit">
                                <button class="btn btn-sm btn-warning edit-item-btn" data-bs-toggle="modal"
                                  data-bs-target="#showModal">Editar</button>
                              </div>
                              <div class="remove">
                                <button onclick="eliminar()" class="btn btn-sm btn-danger remove-item-btn"
                                  data-bs-toggle="modal" data-bs-target="#deleteRecordModal">Eliminar</button>
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
                        <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn"
                          data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Agregar</button>

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
                          <td class="name">{{ brand.name }}</td>
                          <td class="descripcion">{{ brand.description }}</td>


                          <td>
                            <div class="d-flex gap-2">
                              <div class="edit">
                                <button class="btn btn-sm btn-warning edit-item-btn" data-bs-toggle="modal"
                                  data-bs-target="#showModal">Editar</button>
                              </div>
                              <div class="remove">
                                <button onclick="eliminar()" class="btn btn-sm btn-danger remove-item-btn"
                                  data-bs-toggle="modal" data-bs-target="#deleteRecordModal">Eliminar</button>
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
                        <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn"
                          data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Agregar</button>

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
                          <td class="name">{{ tag.name }}</td>
                          <td class="descripcion">{{ tag.description }}</td>


                          <td>
                            <div class="d-flex gap-2">
                              <div class="edit">
                                <button class="btn btn-sm btn-warning edit-item-btn" data-bs-toggle="modal"
                                  data-bs-target="#showModal">Editar</button>
                              </div>
                              <div class="remove">
                                <button onclick="eliminar()" class="btn btn-sm btn-danger remove-item-btn"
                                  data-bs-toggle="modal" data-bs-target="#deleteRecordModal">Eliminar</button>
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