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
                        <p class="text-white-75">Owner & Founder</p>
                        <div class="hstack text-white-50 gap-1">
                            <div class="me-2"><i class="ri-map-pin-user-line me-1 text-white-75 fs-16 align-middle"></i>California, United States</div>
                            <div>
                                <i class="ri-building-line me-1 text-white-75 fs-16 align-middle"></i>Themesbrand
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
                

            </div>
            <!--end row-->
        </div>
        
        <div class="row mt-5">
            <div class="col-lg-12">
            <div class="card mt-xxl-n5">
                <div class="card-header">
                    <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                                <i class="fas fa-home"></i> Información
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
                                            <label for="lastnameInput" class="form-label">Apellido</label>
                                            <input type="text" class="form-control" id="lastnameInput" placeholder="Apellido" value="Adame">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="phonenumberInput" class="form-label">Teléfono</label>
                                            <input type="text" class="form-control" id="phonenumberInput" placeholder="Teléfono" value="+(1) 987 6543">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="emailInput" class="form-label">Correo electrónico</label>
                                            <input type="email" class="form-control" id="emailInput" placeholder="Correo electrónico" value="daveadame@velzon.com">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="emailInput" class="form-label">Rol</label>
                                            <input type="email" class="form-control" id="emailInput" placeholder="Rol" value="daveadame@velzon.com">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="emailInput" class="form-label">Creador</label>
                                            <input type="email" class="form-control" id="emailInput" placeholder="Correo electrónico" value="daveadame@velzon.com">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="phonenumberInput" class="form-label">Fecha de creación</label>
                                            <input type="text" class="form-control" id="phonenumberInput" placeholder="Teléfono" value="+(1) 987 6543">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="emailInput" class="form-label">Ultima actualización</label>
                                            <input type="email" class="form-control" id="emailInput" placeholder="Correo electrónico" value="daveadame@velzon.com">
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    <!--end col-->
</div>
<!--end row-->


    </div><!-- container-fluid -->
</div><!-- End Page-content -->


</div><!-- end main content-->
</template>