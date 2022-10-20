<script setup>
import Nav from "../../components/Nav.vue";
import Sidebar from "../../components/Sidebar.vue";
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
                        <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn"
                          data-bs-target="#showModal">Agregar</button>
                        <button class="btn btn-danger mx-2"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path
                              d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                            <path fill-rule="evenodd"
                              d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                          </svg></button>
                      </div>
                    </div>

                  </div>

                  <div class="table-responsive table-card mt-3 mb-1">
                    <table class="table align-middle table-nowrap" id="customerTable">
                      <thead class="table-light">
                        <tr>
                          <th scope="col" style="width: 50px;">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                            </div>
                          </th>
                          <th class="" data-sort="num">#</th>
                          <th class="" data-sort="id">ID</th>
                          <th class="" data-sort="name">Nombre</th>
                          <th class="" data-sort="phone">Teléfono</th>
                          <th class="" data-sort="email">Correo electrónico</th>
                          <th class="" data-sort="subscription">Suscripción</th>
                          <th class="" data-sort="action">Action</th>
                        </tr>
                      </thead>
                      <tbody class="list form-check-all">
                        <tr>
                          <th scope="row">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                            </div>
                          </th>
                          <td class="id" style="display:none;"><a href="javascript:void(0);"
                              class="fw-medium link-primary">#VZ2101</a></td>
                          <td class="num">1</td>
                          <td class="id">1</td>
                          <td class="name">Mary Cousar</td>
                          <td class="email">marycousar@velzon.com</td>
                          <td class="phone">marycousar@velzon.com</td>
                          <td class="subscription">
                            <span class="badge badge-soft-success text-uppercase">Active</span>
                          </td>

                          <td>
                            <div class="d-flex gap-2">
                              <div class="edit">
                                <a href="details.php">
                                  <button class="btn btn-sm btn-primary edit-item-btn" data-bs-toggle="modal"
                                    data-bs-target="">Ver</button>
                                </a>
                              </div>
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
                <label for="exampleFormControlTextarea5" class="form-label">Nivel</label>
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