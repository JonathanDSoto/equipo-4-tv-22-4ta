<script setup>
import { ref } from "vue"
import axios from 'axios'
import { useRouter } from 'vue-router'
const router = useRouter()

const mail = ref(null)
const pass = ref(null)

const login = () => {
  let data = new FormData()
  data.append('action', 'access')
  data.append('email', mail.value)
  data.append('password', pass.value)

  let config = {
    method: 'post',
    url: 'http://localhost/app/AuthController.php',
    data: data
  }

  axios(config)
    .then(function (response) {
      if (response.data.code > 0) {
        localStorage.setItem('user', JSON.stringify(response.data.data))
        router.push({ path: '/users' })
      }
    })
    .catch(function (error) {
      console.log(error)
    })
}

</script>

<template>
  <div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
    <div class="bg-overlay"></div>
    <!-- auth-page content -->
    <div class="auth-page-content overflow-hidden pt-lg-5">
      <div class="container col-lg-8 col-xxl-5">
        <div class="row">
          <div class="col-lg-12">
            <div class="card overflow-hidden">
              <div class="row g-0">
                <div class="col-lg-6">
                  <div class="p-lg-5 p-4 auth-one-bg h-100">
                    <div class="bg-overlay"></div>
                    <div class="position-relative h-100 d-flex flex-column">
                      <div class="mb-4">
                        <img src="../../assets/images/logo-light.png" alt="" height="18">
                      </div>
                      <div class="mt-auto">
                        <div class="mb-3 ">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-quote " viewBox="0 0 16 16">
                            <path
                              d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 9 7.558V11a1 1 0 0 0 1 1h2Zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 3 7.558V11a1 1 0 0 0 1 1h2Z" />
                          </svg>
                        </div>

                        <div id="qoutescarouselIndicators" class="carousel slide" data-bs-ride="carousel">
                          <div class="carousel-indicators">
                            <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="0"
                              class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="1"
                              aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="2"
                              aria-label="Slide 3"></button>
                          </div>
                          <div class="carousel-inner text-center text-white pb-5">
                            <div class="carousel-item active">
                              <p class="fs-15 fst-italic">"Great! Clean code, clean design, easy for customization.
                                Thanks very much!"</p>
                            </div>
                            <div class="carousel-item">
                              <p class="fs-15 fst-italic">"The theme is really great with an amazing customer support."
                              </p>
                            </div>
                            <div class="carousel-item">
                              <p class="fs-15 fst-italic">"Great! Clean code, clean design, easy for customization.
                                Thanks very much!"</p>
                            </div>
                          </div>
                        </div>
                        <!-- end carousel -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end col -->

                <div class="col-lg-6">
                  <div class="p-lg-5 p-4">
                    <div>
                      <h5 class="text-primary">Welcome Back !</h5>
                      <p class="text-muted">Sign in to continue to Velzon.</p>
                    </div>

                    <div class="mt-4">
                      <form>

                        <div class="mb-3">
                          <label for="username" class="form-label">Email</label>
                          <input v-model="mail" type="email" class="form-control" id="username"
                            placeholder="Enter Email">
                        </div>

                        <div class="mb-3">

                          <label class="form-label" for="password-input">Password</label>
                          <div class="position-relative auth-pass-inputgroup mb-3">
                            <input v-model="pass" type="password" class="form-control pe-5 password-input"
                              placeholder="Enter password" id="password-input">
                            <button
                              class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                              type="button" id="password-addon"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                <path
                                  d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                              </svg></button>
                          </div>
                        </div>


                        <div class="mt-4">
                          <button class="btn btn-success w-100" type="submit" v-on:click.prevent="login()">Sign
                            In</button>
                        </div>


                      </form>
                    </div>
                  </div>
                </div>
                <!-- end col -->
              </div>
              <!-- end row -->
            </div>
            <!-- end card -->
          </div>
          <!-- end col -->

        </div>
        <!-- end row -->
      </div>
      <!-- end container -->
    </div>
    <!-- end auth page content -->

    <!-- footer -->
    <!-- end Footer -->
  </div>
</template>