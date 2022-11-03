
<script setup>
import axios from "axios"
import { ref } from "vue"
import { useRouter, RouterLink } from 'vue-router'
import Nav from "./../components/Nav.vue"
import Sidebar from "./../components/Sidebar.vue"
import "https://cdn.lordicon.com/qjzruarw.js"
</script>
<template>


  <div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
    <div class="bg-overlay"></div>
    <div class="auth-page-content overflow-hidden pt-lg-5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-5">
            <div class="card overflow-hidden">
              <div class="card-body p-4">
                <div class="text-center">
                  <lord-icon src="https://cdn.lordicon.com/vyukcgvf.json" trigger="loop" delay="1000"
                    style="width:250px;height:250px">
                  </lord-icon>
                  <h1 class="text-primary mb-4">Oops !</h1>
                  <h4 class="text-uppercase">Lo siento, página no encontrada</h4>
                  <p class="text-muted mb-4">La página que buscas no esta disponible!</p>
                  <RouterLink :to="{ path: '/' }" class="text-dark"><a class="btn btn-success"><i
                        class="mdi mdi-home me-1"></i>Regresar al inicio</a></RouterLink>

                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</template>