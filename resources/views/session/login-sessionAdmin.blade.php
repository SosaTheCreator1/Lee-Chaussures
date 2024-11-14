@extends('layouts.user_type.guest')

@section('content')

  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-info text-gradient">¡Bienvenido de vuelta!</h3>
                  <p class="mb-0">Crea una nueva cuenta<br></p>
                  <p class="mb-0">O inicia secion con tus credenciales:</p>
                </div>
                <div class="card-body">
                  <form role="form" method="POST" action="/session">
                    @csrf
                    <label>Token</label>
                    <div class="mb-3">
                      <input type="email" class="form-control" name="email" id="email" placeholder="Token" value="" aria-label="Email" aria-describedby="email-addon">
                      @error('email')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                      @enderror
                    </div>
                    <label>Contraseña</label>
                    <div class="mb-3">
                      <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" value="" aria-label="Password" aria-describedby="password-addon">
                      @error('password')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                      @enderror
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Iniciar sesion</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                <small class="text-muted">¿Tienes problemas al iniciar sesión?
                  <a href="/login/forgot-password" class="text-info text-gradient font-weight-bold">Presione aqui</a>
                </small>
                  <p class="mb-4 text-sm mx-auto">
                    ¿Aun no tienes una cuenta?
                    <a href="register" class="text-info text-gradient font-weight-bold">Registrse aqui</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="  top-10 h-100 d-md-block d-none me-n11">
                <div class="oblique bg-cover position-relative h-100 w-100" style="background-image:url('../assets/img/curved-images/full-shot-smiley-woman-wheelchair.jpg')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

@endsection
