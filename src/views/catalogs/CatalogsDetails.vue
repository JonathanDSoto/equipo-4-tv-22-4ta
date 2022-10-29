<script setup>
import Nav from '../../components/Nav.vue';
import Sidebar from '../../components/Sidebar.vue';
</script>

<template>
  <Nav />
  <Sidebar />

  <div class="main-content">

    <div class="page-content">
      <div class="container-fluid">

        <div class="row">
          <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
              <h4 class="mb-sm-0">Detalles de "titulo"</h4>

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
                      <td>T-Shirt</td>
                    </tr>
                    <tr>
                      <th scope="row">Descripción</th>
                      <td>Blue</td>
                    </tr>
                    <tr>
                      <th scope="row">Slug</th>
                      <td>Cotton</td>
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
                          <th class="" data-sort="num">#</th>
                          <th class="" data-sort="id">ID</th>
                          <th class="" data-sort="name">Nombre</th>
                          <th class="" data-sort="description">Descripción</th>

                        </tr>
                      </thead>
                      <tbody class="list form-check-all">
                        <tr>
                          <td class="id" style="display:none;"><a href="javascript:void(0);"
                              class="fw-medium link-primary">#VZ2101</a></td>
                          <td class="num">1</td>
                          <td class="id">1</td>

                          <td>
                            <div class="d-flex align-items-center">
                              <div class="flex-shrink-0 me-3">
                                <div class="avatar-sm bg-light rounded p-1">
                                  <img src="../../assets/images/products/img-1.png" alt="" class="img-fluid d-block">
                                </div>
                              </div>
                              <div class="flex-grow-1">
                                <h5 class="fs-14 mb-1">
                                  <a href="apps-ecommerce-product-details.html" class="text-dark">Half Sleeve Round Neck
                                    T-Shirts</a>
                                </h5>
                                <p class="text-muted mb-0">Marca : <span class="fw-medium">Fashion</span></p>
                              </div>
                            </div>

                          </td>

                          <td class="description">Este moderno comedor Ikal, es una excelente opción para complementar
                            los muebles del interior de tu hogar.</td>

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

</template>