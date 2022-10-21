<script setup>
import Nav from "../../components/Nav.vue";
import Sidebar from "../../components/Sidebar.vue";

function eliminar() {
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success m-2',
      cancelButton: 'btn btn-danger m-2'
    },
    buttonsStyling: false
  })

  swalWithBootstrapButtons.fire({
    title: '¿Estas seguro?',
    text: "¡No podrás revertir esto!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Si, eliminar!',
    cancelButtonText: 'No, cancelar!',
    reverseButtons: true
  }).then((result) => {
    if (result.isConfirmed) {
      swalWithBootstrapButtons.fire(
        'Eliminado!',
        'El registro ha sido eliminado.',
        'success'
      )
    } else if (
      /* Read more about handling dismissals below */
      result.dismiss === Swal.DismissReason.cancel
    ) {
      swalWithBootstrapButtons.fire(
        'Cancelado',
        'El registro no ha sido eliminado.',
        'error'
      )
    }
  })

}
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
              <h4 class="mb-sm-0">Product Details</h4>

              <div class="page-title-right">
                <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                  <li class="breadcrumb-item active">Product Details</li>
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
                <div class="row gx-lg-5">

                  <div class="col mx-auto">
                    <div class="">

                      <div class="swiper product-thumbnail-slider p-2 rounded bg-light">
                        <div class="">
                          <div class="">
                            <!-- <img src="../../../../assets/images/products/img-8.png" alt="" class="img-fluid d-block" /> -->
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                  <!-- end col -->

                  <div class="col-xl-8">
                    <div class="mt-xl-0 mt-5">
                      <div class="d-flex">
                        <div class="flex-grow-1">
                          <h4>Full Sleeve Sweatshirt for Men (Pink)</h4>
                          <div class="hstack gap-3 flex-wrap">
                            <div><a href="#" class="text-primary d-block">Nombre Marca</a></div>
                            <div class="vr"></div>
                            <div class="text-muted">Slug : <span class="text-body fw-medium">Zoetic Fashion</span></div>

                          </div>
                        </div>
                        <div class="flex-shrink-0">
                          <div class="">
                            <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn"
                              data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Agregar</button>
                          </div>
                        </div>

                      </div>



                      <div class="mt-4 text-muted">
                        <h5 class="fs-14">Descripción :</h5>
                        <p>Tommy Hilfiger men striped pink sweatshirt. Crafted with cotton. Material composition is 100%
                          organic cotton. This is one of the world’s leading designer lifestyle brands and is
                          internationally recognized for celebrating the essence of classic American cool style,
                          featuring preppy with a twist designs.</p>
                      </div>

                      <div class="row">
                        <div class="col-sm-6">
                          <div class="mt-3">
                            <h5 class="fs-14">Etiquetas :</h5>
                            <ul class="list-unstyled">
                              <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i> Full
                                Sleeve</li>
                              <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i> Cotton
                              </li>
                              <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i> All
                                Sizes available</li>
                              <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i> 4
                                Different Color</li>
                            </ul>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="mt-3">
                            <h5 class="fs-14">Categorias :</h5>
                            <ul class="list-unstyled product-desc-list">
                              <li class="py-1">10 Days Replacement</li>
                              <li class="py-1">Cash on Delivery available</li>
                            </ul>
                          </div>
                        </div>
                      </div>


                      <div class="product-content mt-5">
                        <h5 class="fs-14 mb-3">Descripción del producto :</h5>
                        <nav>
                          <ul class="nav nav-tabs nav-tabs-custom nav-success" id="nav-tab" role="tablist">

                            <li class="nav-item">
                              <a class="nav-link active" id="nav-detail-tab" data-bs-toggle="tab" href="#nav-detail"
                                role="tab" aria-controls="nav-detail" aria-selected="false">Caracteristicas</a>
                            </li>
                          </ul>
                        </nav>
                        <div class="tab-content border border-top-0 p-4" id="nav-tabContent">

                          <div class="tab-pane fade show active" id="nav-detail" role="tabpanel"
                            aria-labelledby="nav-detail-tab">
                            <div>
                              <h5 class="font-size-16 mb-3">Tommy Hilfiger Sweatshirt for Men (Pink)</h5>
                              <p>Tommy Hilfiger men striped pink sweatshirt. Crafted with cotton. Material composition
                                is 100% organic cotton. This is one of the world’s leading designer lifestyle brands and
                                is internationally recognized for celebrating the essence of classic American cool
                                style, featuring preppy with a twist designs.</p>

                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- product-content -->


                    </div>






                    <!-- PRESENTACIONES -->

                    <div class="col-xl-4 col-md-8 mt-5">

                      <h5 class="fs-14 mb-3">Presentaciones :</h5>

                      <div class="product-img-slider sticky-side-div">
                        <div class="swiper product-thumbnail-slider p-2 rounded bg-light">
                          <div class="swiper-wrapper">

                            <div class="swiper-slide">
                              <!-- <img src="../../assets/images/products/img-6.png" alt="" class="img-fluid d-block" /> -->
                              <div class="d-flex gap-2 justify-content-center bg-white p-2">
                                <div class="edit">
                                  <a href="details-presentations.php">
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
                            </div>

                            <div class="swiper-slide">
                              <!-- <img src="../../assets/images/products/img-1.png" alt="" class="img-fluid d-block" /> -->
                              <div class="d-flex gap-2 justify-content-center bg-white p-2">
                                <div class="edit">
                                  <button class="btn btn-sm btn-primary edit-item-btn" data-bs-toggle="modal"
                                    data-bs-target="#showModal">Ver</button>
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
                            </div>
                            <div class="swiper-slide">
                              <!-- <img src="../../assets/images/products/img-8.png" alt="" class="img-fluid d-block" /> -->
                            </div>
                          </div>
                          <div class="swiper-button-next bg-white shadow"></div>
                          <div class="swiper-button-prev bg-white shadow"></div>
                        </div>

                        <!-- end swiper thumbnail slide -->
                        <div class="swiper product-nav-slider mt-2">
                          <div class="swiper-wrapper">
                            <div class="swiper-slide">
                              <div class="nav-slide-item">
                                <!-- <img src="../../assets/images/products/img-8.png" alt="" class="img-fluid d-block" /> -->
                              </div>
                            </div>
                            <div class="swiper-slide">
                              <div class="nav-slide-item">
                                <!-- <img src="../../assets/images/products/img-6.png" alt="" class="img-fluid d-block" /> -->
                              </div>
                            </div>
                            <div class="swiper-slide">
                              <div class="nav-slide-item">
                                <!-- <img src="../../assets/images/products/img-1.png" alt="" class="img-fluid d-block" /> -->
                              </div>
                            </div>
                            <div class="swiper-slide">
                              <div class="nav-slide-item">
                                <!-- <img src="../../assets/images/products/img-8.png" alt="" class="img-fluid d-block" /> -->
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- end swiper nav slide -->
                      </div>
                    </div>



                  </div>
                  <!-- end col -->




                </div>
                <!-- end row -->



              </div>
              <!-- end card body -->




            </div>
            <!-- end card -->



            <!-- TABLA -->

            <div class="card mt-5" id="orderList">
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
                          <td class="status"><span class="badge badge-soft-warning text-uppercase">Pending</span></td>

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
          <h5 class="modal-title" id="exampleModalgridLabel">Presentación</h5>
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
                  <label for="exampleFormControlTextarea5" class="form-label">Descripción</label>
                  <textarea class="form-control" id="descripcion" rows="3" placeholder="Descripción"></textarea>
                </div>
              </div>
              <!--end col-->
              <div class="col-lg-12">
                <div>
                  <label for="lastName" class="form-label">Código</label>
                  <input type="text" class="form-control" id="codigo" placeholder="Código">
                </div>
              </div>
              <!--end col-->
              <div class="col-lg-12">
                <div>
                  <label for="lastName" class="form-label">Peso</label>
                  <input type="text" class="form-control" id="peso" placeholder="Peso">
                </div>
              </div>
              <!--end col-->
              <div class="col-lg-12">
                <div>
                  <label for="lastName" class="form-label">Stock</label>
                  <input type="text" class="form-control" id="stock" placeholder="Stock">
                </div>
              </div>
              <!--end col-->
              <div class="col-lg-12">
                <div>
                  <label for="lastName" class="form-label">Stock mínimo</label>
                  <input type="text" class="form-control" id="stock_min" placeholder="Stock mínimo">
                </div>
              </div>
              <!--end col-->
              <div class="col-lg-12">
                <div>
                  <label for="lastName" class="form-label">Stock máximo</label>
                  <input type="text" class="form-control" id="stock_max" placeholder="Stock máximo">
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