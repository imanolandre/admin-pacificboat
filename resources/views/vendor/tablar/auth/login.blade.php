<div id="full-page-loader" class="full-page-loader">
    <!-- Puedes ajustar la clase según la implementación de spinners de Tabler.io -->
    <div class="spinner"></div>
</div>
<div id="content">
@extends('tablar::auth.layout')
@section('title', 'Login')
@section('content')
    <div class="container container-tight py-4">
        <div class="text-center mb-2 mt-5">
            <a href="/" class="navbar-brand ">
                <img src="{{asset(config('tablar.auth_logo.img.path','assets/logo.svg'))}}" height="120"
                     alt="">
            </a>
        </div>
        <div class="card card-md">
            <div class="card-body">
                <h2 class="h2 text-center mb-4">Login</h2>
                <form action="{{route('login')}}" method="post" autocomplete="off" novalidate>
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">E-mail</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                               placeholder="Enter your email address"
                               autocomplete="off">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label class="form-label">
                            Password
                            <span class="form-label-description">
                  </span>
                        </label>
                        <div class="input-group input-group-flat">
                            <input id="passwordField" type="password" name="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   placeholder="Enter your password"
                                   autocomplete="off">
                            <span class="input-group-text">
                                <a id="showPassword" class="link-secondary cursor-pointer" title="Ver contraseña" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                                         stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                         stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12"
                                                                                                                                cy="12"
                                                                                                                                r="2"/><path
                                                d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"/></svg>
                                </a>
                            </span>
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="form-check">
                            <input type="checkbox" class="form-check-input"/>
                            <span class="form-check-label">Remember me on this device</span>
                        </label>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">Sign in</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const passwordField = document.getElementById('passwordField');
            const showPassword = document.getElementById('showPassword');

            showPassword.addEventListener('click', function () {
                if (passwordField.type === 'password') {
                    passwordField.type = 'text';
                } else {
                    passwordField.type = 'password';
                }
            });
        });
    </script>
@endsection
</div>
<style>
    #full-page-loader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgb(255, 255, 255);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000; /* Asegura que esté por encima de otros elementos */
}

/* Estilos del Spinner */
.spinner {
    border: 4px solid rgba(255, 255, 255, 0.3);
    border-radius: 50%;
    border-top: 4px solid #244062; /* Puedes ajustar el color según el esquema de colores de tu aplicación */
    width: 40px;
    height: 40px;
    animation: spin 1s linear infinite;
}

/* Animación del Spinner */
@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>
<script>
    // Ocultar el Spinner cuando la página se carga completamente
    window.addEventListener('load', function () {
        document.getElementById('full-page-loader').style.display = 'none';
    });
</script>
