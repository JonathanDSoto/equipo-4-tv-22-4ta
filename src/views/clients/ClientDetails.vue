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
        <div class="profile-foreground position-relative mx-n4 mt-n4">
          <div class="profile-wid-bg">
            <img src="../../assets/images/profile-bg.jpg" alt="" class="profile-wid-img" />
          </div>
        </div>
        <div class="pt-4 mb-4 mb-lg-3 pb-lg-4">
          <div class="row g-4">
            <div class="col-auto">
              <div class="avatar-lg">
                <img src="../../assets/images/users/avatar-1.jpg" alt="user-img" class="img-thumbnail rounded-circle" />
              </div>
            </div>
            <!--end col-->
            <div class="col">
              <div class="p-2">
                <h3 class="text-white mb-1">Anna Adame</h3>
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
                                  <td class="text-muted">Anna Adame</td>
                                </tr>
                                <tr>
                                  <th class="ps-0" scope="row">Correo electrónico :</th>
                                  <td class="text-muted">+(1) 987 6543</td>
                                </tr>
                                <tr>
                                  <th class="ps-0" scope="row">Teléfono :</th>
                                  <td class="text-muted">daveadame@velzon.com</td>
                                </tr>

                              </tbody>
                            </table>
                          </div>
                        </div><!-- end card body -->
                      </div><!-- end card -->


                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title mb-3">Nivel</h5>
                          <p>Normal</p>
                        </div>
                      </div>

                      <div class="card-body">
                        <div class="card card-animate bg-primary">
                          <div class="card-body">
                            <div class="d-flex align-items-center">
                              <div class="flex-grow-1">
                                <p class="text-uppercase fw-medium text-white-50 mb-0">Orders</p>
                              </div>
                              <div class="flex-shrink-0">
                                <h5 class="text-warning fs-14 mb-0">
                                  <i class="ri-arrow-right-down-line fs-13 align-middle"></i> -3.57 %
                                </h5>
                              </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                              <div>
                                <h4 class="fs-22 fw-semibold ff-secondary mb-4 text-white"><span class="counter-value"
                                    data-target="36894">0</span></h4>
                                <a href="#" class="text-decoration-underline text-white-50">View all
                                  orders</a>
                              </div>
                              <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-light rounded fs-3 shadow">
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
                        <div class="card-header  border-0">
                          <div class="d-flex align-items-center">
                            <h5 class="card-title mb-0 flex-grow-1">Ordenes</h5>

                          </div>
                        </div>
                        <div class="card-body border border-dashed border-end-0 border-start-0">

                        </div>
                        <div class="card-body pt-0">
                          <div>

                            <div class="table-responsive table-card mb-1">
                              <table class="table table-nowrap align-middle" id="orderTable">
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
                                  <tr>
                                    <td class="id"><a href="apps-ecommerce-order-details.html"
                                        class="fw-medium link-primary">#VZ2101</a></td>
                                    <td class="customer_name">Frank Hook</td>
                                    <td class="product_name">Puma Tshirt</td>
                                    <td class="date">20 Dec, 2021, <small class="text-muted">02:21 AM</small></td>
                                    <td class="status"><span
                                        class="badge badge-soft-warning text-uppercase">Pending</span></td>
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



                        </div>
                      </div>


                      <div class="card" id="orderList">

                        <div class="card-header  border-0">
                          <div class="d-flex align-items-center">
                            <h5 class="card-title mb-0 flex-grow-1">Direcciones</h5>

                          </div>
                        </div>

                        <div class="card-body">
                          <div id="customerList">
                            <div class="row g-4 mb-3">
                              <div class="col-sm-auto">

                                <div>
                                  <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal"
                                    id="create-btn" data-bs-target="#showModal"><i
                                      class="ri-add-line align-bottom me-1"></i> Agregar</button>
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
                                    <th class="" data-sort="streetandusenumber">Calle y número</th>
                                    <th class="" data-sort="postalcode">Código postal</th>
                                    <th class="" data-sort="city">Ciudad</th>
                                    <th class="" data-sort="province">Provincia</th>
                                    <th class="" data-sort="action">Action</th>
                                  </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                  <tr>
                                    <th scope="row">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="chk_child"
                                          value="option1">
                                      </div>
                                    </th>
                                    <td class="id" style="display:none;"><a href="javascript:void(0);"
                                        class="fw-medium link-primary">#VZ2101</a></td>
                                    <td class="num">1</td>
                                    <td class="id">1</td>
                                    <td class="streetandusenumber">Mary Cousar</td>
                                    <td class="postalcode">marycousar@velzon.com</td>
                                    <td class="city">marycousar@velzon.com</td>
                                    <td class="province">marycousar@velzon.com</td>


                                    <td>
                                      <div class="d-flex gap-2">
                                        <div class="edit">
                                          <a href="details-address.php">
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

      </div><!-- container-fluid -->
    </div><!-- End Page-content -->
  </div>






  <!-- Grids in modals -->

  <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalgridLabel">Direcciones</h5>
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
                  <label for="lastName" class="form-label">Apellido</label>
                  <input type="text" class="form-control" id="lastName" placeholder="Apellido">
                </div>
              </div>
              <!--end col-->
              <div class="col-lg-12">
                <div>
                  <label for="lastName" class="form-label">Calle y número</label>
                  <input type="text" class="form-control" id="lastName" placeholder="Calle y número">
                </div>
              </div>
              <!--end col-->
              <div class="col-lg-12">
                <div>
                  <label for="lastName" class="form-label">Código postal</label>
                  <input type="text" class="form-control" id="lastName" placeholder="Código postal">
                </div>
              </div>
              <!--end col-->

              <div class="col-lg-6">
                <!-- Select -->
                <label for="exampleFormControlTextarea5" class="form-label">Ciudad</label>
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
              <div class="col-lg-6">
                <!-- Select -->
                <label for="exampleFormControlTextarea5" class="form-label">Provincia</label>
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
                <div>
                  <label for="lastName" class="form-label">Teléfono</label>
                  <input type="text" class="form-control" id="lastName" placeholder="Teléfono">
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