<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
    <?php include "../layouts/head.template.php" ?>
</head>

<body>

    <?php include "../layouts/nav.template.php" ?>
    <?php include "../layouts/sidebar.template.php" ?>


    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">cupones</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tabla</a></li>
                                    <li class="breadcrumb-item active">Cupones</li>
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
                                                    <th class="" data-sort="lastname">Fecha de inicio</th>
                                                    <th class="" data-sort="email">Fecha final</th>
                                                    <th class="" data-sort="rol">Tipo</th>
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
                    <h5 class="modal-title" id="exampleModalgridLabel">Cupones</h5>
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
                            </div><!--end col-->
                            <div class="col-lg-6">
                                <div>
                                    <label for="lastName" class="form-label">Código</label>
                                    <input type="text" class="form-control" id="lastName" placeholder="Código">
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-6">
                                <div>
                                    <label for="lastName" class="form-label">Porcentaje de descuento</label>
                                    <input type="text" class="form-control" id="lastName" placeholder="Porcentaje de descuento">
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-6">
                                <div>
                                    <label for="emailInput" class="form-label">Cantidad mínima requerida</label>
                                    <input type="email" class="form-control" id="emailInput" placeholder="Cantidad mínima requerida">
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-6">
                                <div>
                                    <label for="passwordInput" class="form-label">Producto mínimo requerido</label>
                                    <input type="email" class="form-control" id="emailInput" placeholder="Producto mínimo requerido">
                                </div>
                            </div><!--end col-->
                            <!-- Input Date -->
                            <div class="col-lg-6">
                                <label for="exampleInputdate" class="form-label">Fecha de inicio</label>
                                <input type="date" class="form-control" id="exampleInputdate">
                            </div>
                            <!-- Input Date -->
                            <div class="col-lg-6">
                                <label for="exampleInputdate" class="form-label">Fecha final</label>
                                <input type="date" class="form-control" id="exampleInputdate">
                            </div>
                            <div class="col-lg-12">
                                <div>
                                    <label for="passwordInput" class="form-label">Usos máximos</label>
                                    <input type="text" class="form-control" id="firstName" placeholder="Usos máximos">
                                </div>
                            </div><!--end col-->
                            
                            <div class="col-lg-12">
                                <!-- Select -->
                                <label for="exampleFormControlTextarea5" class="form-label">Valido solo para la primera compra</label>
                                <div class="input-group">
                                    <label class="input-group-text" for="inputGroupSelect01">Opciones</label>
                                    <select class="form-select" id="inputGroupSelect01">
                                        <option selected>...</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-12">
                                <!-- Select -->
                                <label for="exampleFormControlTextarea5" class="form-label">Estatus</label>
                                <div class="input-group">
                                    <label class="input-group-text" for="inputGroupSelect01">Opciones</label>
                                    <select class="form-select" id="inputGroupSelect01">
                                        <option selected>...</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
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
    

    <script type="text/javascript">
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





    <?php include "../layouts/footer.template.php" ?>
    
    <?php include "../layouts/scripts.template.php" ?>
    
</body>

</html>