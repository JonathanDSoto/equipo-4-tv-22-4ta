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
                        <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn"
                          data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Agregar</button>
                        <button class="btn btn-soft-danger" onClick="deleteMultiple()"><i
                            class="ri-delete-bin-2-line"></i></button>
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
                          <th class="" data-sort="description">Descripción</th>
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

                          <td>
                            <div class="d-flex align-items-center">
                              <div class="flex-shrink-0 me-3">
                                <div class="avatar-sm bg-light rounded p-1">
                                  <!-- <img src="../../assets/images/products/img-1.png" alt="" class="img-fluid d-block"> -->
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