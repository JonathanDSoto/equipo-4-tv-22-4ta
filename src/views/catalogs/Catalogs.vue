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
                                          <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Agregar</button>
                                          <button class="btn btn-soft-danger" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
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
                                              <th class="" data-sort="descripcion">Descripción</th>
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
                                              <td class="id" style="display:none;"><a href="javascript:void(0);" class="fw-medium link-primary">#VZ2101</a></td>
                                              <td class="num">1</td>
                                              <td class="id">1</td>
                                              <td class="name">Nombre</td>
                                              <td class="descripcion">Este moderno comedor Ikal, es una excelente opción para complementar los muebles del interior de tu hogar.</td>
                                            
                                              
                                              <td>
                                                  <div class="d-flex gap-2">
                                                      <div class="edit">
                                                          <a href="details.php">
                                                              <button class="btn btn-sm btn-primary edit-item-btn" data-bs-toggle="modal" data-bs-target="">Ver</button>
                                                          </a>
                                                      </div>
                                                      <div class="edit">
                                                          <button class="btn btn-sm btn-warning edit-item-btn" data-bs-toggle="modal" data-bs-target="#showModal">Editar</button>
                                                      </div>
                                                      <div class="remove">
                                                          <button onclick="eliminar()" class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal">Eliminar</button>
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
                                          <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Agregar</button>
                                          <button class="btn btn-soft-danger" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
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
                                              <th class="" data-sort="descripcion">Descripción</th>
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
                                              <td class="id" style="display:none;"><a href="javascript:void(0);" class="fw-medium link-primary">#VZ2101</a></td>
                                              <td class="num">1</td>
                                              <td class="id">1</td>
                                              <td class="name">Nombre</td>
                                              <td class="descripcion">Este moderno comedor Ikal, es una excelente opción para complementar los muebles del interior de tu hogar.</td>
                                            
                                              
                                              <td>
                                                  <div class="d-flex gap-2">
                                                      <div class="edit">
                                                          <a href="details.php">
                                                              <button class="btn btn-sm btn-primary edit-item-btn" data-bs-toggle="modal" data-bs-target="">Ver</button>
                                                          </a>
                                                      </div>
                                                      <div class="edit">
                                                          <button class="btn btn-sm btn-warning edit-item-btn" data-bs-toggle="modal" data-bs-target="#showModal">Editar</button>
                                                      </div>
                                                      <div class="remove">
                                                          <button onclick="eliminar()" class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal">Eliminar</button>
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
                                          <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Agregar</button>
                                          <button class="btn btn-soft-danger" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
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
                                              <th class="" data-sort="descripcion">Descripción</th>
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
                                              <td class="id" style="display:none;"><a href="javascript:void(0);" class="fw-medium link-primary">#VZ2101</a></td>
                                              <td class="num">1</td>
                                              <td class="id">1</td>
                                              <td class="name">Nombre</td>
                                              <td class="descripcion">Este moderno comedor Ikal, es una excelente opción para complementar los muebles del interior de tu hogar.</td>
                                            
                                              
                                              <td>
                                                  <div class="d-flex gap-2">
                                                      <div class="edit">
                                                          <a href="details.php">
                                                              <button class="btn btn-sm btn-primary edit-item-btn" data-bs-toggle="modal" data-bs-target="">Ver</button>
                                                          </a>
                                                      </div>
                                                      <div class="edit">
                                                          <button class="btn btn-sm btn-warning edit-item-btn" data-bs-toggle="modal" data-bs-target="#showModal">Editar</button>
                                                      </div>
                                                      <div class="remove">
                                                          <button onclick="eliminar()" class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal">Eliminar</button>
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

</template>