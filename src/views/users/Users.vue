<script setup>
import Nav from "../../components/Nav.vue";
import Sidebar from "../../components/Sidebar.vue";

  function eliminar()
  {
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
                      <h4 class="mb-sm-0">Usuarios</h4>

                      <div class="page-title-right">
                          <ol class="breadcrumb m-0">
                              <li class="breadcrumb-item"><a href="javascript: void(0);">Tabla</a></li>
                              <li class="breadcrumb-item active">Usuarios</li>
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
                                              <th class="" data-sort="lastname">Apellido</th>
                                              <th class="" data-sort="email">Correo electrónico</th>
                                              <th class="" data-sort="rol">Rol</th>
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
                                              <td class="name">Mary Cousar</td>
                                              <td class="lastname">Mary Cousar</td>
                                              <td class="email">marycousar@velzon.com</td>
                                              <td class="rol">Administrador</td>
                                              
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





  <!-- Grids in modals -->

  <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Usuarios</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0);">
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <label for="formFile" class="form-label">Foto de perfil</label>
                            <input class="form-control" type="file" id="formFile">
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label for="firstName" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="firstName" placeholder="Nombre">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div>
                                <label for="lastName" class="form-label">Apellido</label>
                                <input type="text" class="form-control" id="lastName" placeholder="Apellido">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div>
                                <label for="lastName" class="form-label">Teléfono</label>
                                <input type="text" class="form-control" id="lastName" placeholder="Teléfono">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div>
                                <label for="emailInput" class="form-label">Correo electrónico</label>
                                <input type="email" class="form-control" id="emailInput" placeholder="Correo electrónico">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div>
                                <label for="passwordInput" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="passwordInput" value="451326546">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </form>
            </div>
        </div>
      </div>
  </div>
</template>