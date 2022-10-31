<script setup>
import axios from "axios"
import { ref } from "vue"
import { useRoute } from 'vue-router'
import Nav from "../../components/Nav.vue";
import Sidebar from "../../components/Sidebar.vue";

let user = JSON.parse(localStorage.getItem('user'))
const route = useRoute()

const item = ref(null)

Swal.fire({
  title: '',
  didOpen: () => {
    Swal.showLoading()
  }
})

const getbrand = () => {
  let data = new FormData();
  data.append('action', 'getBrand');
  data.append('id', route.params.id);
  data.append('token', user.token);

  let config = {
    method: 'post',
    url: 'https://ecommerce-app-0a.herokuapp.com/app/BrandsController.php',
    data: data
  };

  axios(config)
    .then((response) => {
      item.value = response.data.data
      Swal.close()
    })
    .catch((error) => {
      console.log(error);
    });

}

const getTags = () => {
  let data = new FormData();
  data.append('action', 'getone');
  data.append('id', route.params.id);
  data.append('token', user.token);

  let config = {
    method: 'post',
    url: 'https://ecommerce-app-0a.herokuapp.com/app/TagsController.php',
    data: data
  };

  axios(config)
    .then((response) => {
      item.value = response.data.data
      Swal.close()
    })
    .catch((error) => {
      console.log(error);
    });

}

const getCategories = () => {
  let data = new FormData();
  data.append('action', 'getCategory');
  data.append('id', route.params.id);
  data.append('token', user.token);

  let config = {
    method: 'post',
    url: 'https://ecommerce-app-0a.herokuapp.com/app/CategoriesController.php',
    data: data
  };

  axios(config)
    .then((response) => {
      item.value = response.data.data
      Swal.close()
    })
    .catch((error) => {
      console.log(error);
    });

}

if (route.params.type === 'brand') {
  getbrand()
} else if (route.params.type === 'tag') {
  getTags()
} else if (route.params.type === 'category') {
  getCategories()
}
</script>

<template>
  <Nav />
  <Sidebar />

  <div v-if="item" class="main-content">

    <div class="page-content">
      <div class="container-fluid">

        <div class="row">
          <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
              <h4 class="mb-sm-0">Detalles de {{ route.params.type }}</h4>

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

        <div class="product-content mt-2 bg-white">

          <div class="tab-content border border-top-0 p-4" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-speci" role="tabpanel" aria-labelledby="nav-speci-tab">
              <div class="table-responsive">
                <table class="table mb-0">
                  <tbody>
                    <tr>
                      <th scope="row" style="width: 200px;">Nombre</th>
                      <td>{{ item.name }}</td>
                    </tr>
                    <tr>
                      <th scope="row">Descripción</th>
                      <td>{{ item.description }}</td>
                    </tr>
                    <tr>
                      <th scope="row">Slug</th>
                      <td>{{ item.slug }}</td>
                    </tr>

                  </tbody>
                </table>
              </div>
            </div>

          </div>
        </div>
        <!-- product-content -->



        <!-- start page title -->

        <div class="row mt-5">
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
                          <th class="" data-sort="name">Nombre</th>
                          <th class="" data-sort="description">Descripción</th>

                        </tr>
                      </thead>
                      <tbody class="list form-check-all">
                        <tr v-if="item.products" v-for="product in item.products" :key="product.id">
                          <td class="id">{{ product.id }}</td>

                          <td>
                            <div class="d-flex align-items-center">
                              <div class="flex-shrink-0 me-3">
                                <div class="avatar-sm bg-light rounded p-1">
                                  <img
                                    :src="route.params.type === 'brand' ? 'https://crud.jonathansoto.mx/storage/products/' + product.cover : product.cover"
                                    alt="" class="img-fluid d-block">
                                </div>
                              </div>
                              <div class="flex-grow-1">
                                <h5 class="fs-14 mb-1">
                                  <RouterLink :to="{ path: '/products/' + product.slug }" class="link-primary">
                                    {{ product.name }}</RouterLink>
                                </h5>
                              </div>
                            </div>

                          </td>

                          <td class="description">{{ product.description }}</td>

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
      <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
  </div>
  <!-- end main content-->

</template>