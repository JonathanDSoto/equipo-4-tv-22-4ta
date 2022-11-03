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
                <div class="profile-foreground position-relative mx-n4 mt-n4">
                    <div class="profile-wid-bg">
                        <img src="../public/assets/images/profile-bg.jpg" alt="" class="profile-wid-img" />
                    </div>
                </div>
                <div class="pt-4 mb-4 mb-lg-4 pb-lg-4">
                    <div class="row g-4">
                        <div class="col">
                            <div class="p-2">
                                <h3 class="text-white mb-1">Detalles de cupón</h3>
                                <p class="text-white-75">#codigo</p>
                                
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
                                            
                                        <div class="col-lg-12">
                                            <div class="card mt-xxl-n5">
                                            <div class="card-header">
                                                <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                                                            <i class="fas fa-home"></i> Información
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#changePassword" role="tab">
                                                            <i class="far fa-user"></i> Especificaciones
                                                        </a>
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                            <div class="card-body p-4">
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                                        <form action="javascript:void(0);">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label for="firstnameInput" class="form-label">Nombre</label>
                                                                        <input type="text" class="form-control" id="firstnameInput" placeholder="Nombre" value="Dave">
                                                                    </div>
                                                                </div>
                                                                <!--end col-->
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label for="lastnameInput" class="form-label">Código</label>
                                                                        <input type="text" class="form-control" id="lastnameInput" placeholder="Apellido" value="Adame">
                                                                    </div>
                                                                </div>
                                                                <!--end col-->
                                                                <div class="col-lg-12">
                                                                    <div class="mb-3">
                                                                        <label for="phonenumberInput" class="form-label">Porcentaje de descuento</label>
                                                                        <input type="text" class="form-control" id="phonenumberInput" placeholder="Calle y número" value="+(1) 987 6543">
                                                                    </div>
                                                                </div>
                                                                <!--end col-->
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label for="emailInput" class="form-label">Cantidad mínima requerida</label>
                                                                        <input type="email" class="form-control" id="emailInput" placeholder="Apartamento" value="daveadame@velzon.com">
                                                                    </div>
                                                                </div>
                                                                <!--end col-->
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label for="phonenumberInput" class="form-label">Producto mínimo requerido</label>
                                                                        <input type="text" class="form-control" id="phonenumberInput" placeholder="Calle y número" value="+(1) 987 6543">
                                                                    </div>
                                                                </div>
                                                                <!--end col-->
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label for="emailInput" class="form-label">Fecha de inicio</label>
                                                                        <input type="email" class="form-control" id="emailInput" placeholder="Apartamento" value="daveadame@velzon.com">
                                                                    </div>
                                                                </div>
                                                                <!--end col-->
                                                                
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label for="emailInput" class="form-label">Fecha final</label>
                                                                        <input type="email" class="form-control" id="emailInput" placeholder="Correo electrónico" value="daveadame@velzon.com">
                                                                    </div>
                                                                </div>
                                                                <!--end col-->
                                                                
                                                                
                                                            </div>
                                                            <!--end row-->
                                                        </form>
                                                    </div>


                                                    <div class="tab-pane" id="changePassword" role="tabpanel">
                                                        <form action="javascript:void(0);">
                                                            <div class="row">
                                                            <div class="col-lg-12">
                                                                    <div class="mb-3">
                                                                        <label for="emailInput" class="form-label">Usos maximos</label>
                                                                        <input type="email" class="form-control" id="emailInput" placeholder="ID" value="daveadame@velzon.com">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="mb-3">
                                                                        <label for="firstnameInput" class="form-label">Usos</label>
                                                                        <input type="text" class="form-control" id="firstnameInput" placeholder="Nombre" value="Dave">
                                                                    </div>
                                                                </div>
                                                                <!--end col-->
                                                                <div class="col-lg-12">
                                                                    <div class="mb-3">
                                                                        <label for="lastnameInput" class="form-label">Valido solo para la primera compra</label>
                                                                        <input type="text" class="form-control" id="lastnameInput" placeholder="Correo electrónico" value="Adame">
                                                                    </div>
                                                                </div>
                                                                <!--end col-->
                                                                
                                                                <div class="col-lg-12">
                                                                    <div class="mb-3">
                                                                        <label for="emailInput" class="form-label">Estatus</label>
                                                                        <input type="email" class="form-control" id="emailInput" placeholder="Correo electrónico" value="daveadame@velzon.com">
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
                                    


                                        <div class="card-body">
                                            <div class="card card-height-100">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <span class="avatar-title bg-danger text-white rounded-2 fs-2 shadow">
                                                                <i class="bx bxs-badge-dollar"></i>
                                                            </span>
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <p class="text-uppercase fw-medium text-muted mb-3">Totales descontado</p>
                                                            <h4 class="fs-4 mb-3">$<span class="counter-value" data-target="2845.05">0</span></h4>
                                                            <p class="text-muted mb-0">From $1,750.04 last year</p>
                                                        </div>
                                                        <div class="flex-shrink-0 align-self-center">
                                                            <span class="badge badge-soft-success fs-12"><i class="ri-arrow-up-s-line fs-13 align-middle me-1"></i>22.96 %<span>
                                                        </div>
                                                    </div>
                                                </div><!-- end card body -->
                                            </div>
                                        </div> <!-- end col-->


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
                                                                    <td class="id"><a href="apps-ecommerce-order-details.html" class="fw-medium link-primary">#VZ2101</a></td>
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

    
    

   





    <?php include "../layouts/footer.template.php" ?>
    
    <?php include "../layouts/scripts.template.php" ?>
    
</body>

</html>