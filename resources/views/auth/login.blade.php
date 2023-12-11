@extends('layouts.aurarie')

@section('content')
<div class="container">
    <!-- Section: Design Block -->
    <section class="text-center text-lg-start">
        <style>
            .cascading-right {
                margin-right: -50px;
            }

            @media (max-width: 991.98px) {
                .cascading-right {
                    margin-right: 0;
                }
            }
        </style>

        <!-- Jumbotron -->
        <div class="container py-4">
            <div class="row g-0 align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="card cascading-right" style="
            background: hsla(0, 0%, 100%, 0.55);
            backdrop-filter: blur(30px);
            ">
                        <div class="card-body p-5 shadow-5 text-center">
                            <h2 class="fw-bold mb-5">Intră în contul personal</h2>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <label class="form-label" style="font-weight: 600" for="email">{{ __('Email') }}</label>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <label class="form-label" style="font-weight: 600" for="password">{{ __('Parola') }}</label>
                                </div>

                                <!-- Checkbox -->
                                <div class="form-check d-flex justify-content-center mb-4">
                                    <input class="form-check-input" style="margin-right: 5px" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Conectat tot timpul') }}
                                    </label>
                                </div>

                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary btn-block mb-4" style="width: 100%; font-weight: 600">
                                    {{ __('Autentificare') }}
                                </button>
                                <div class="login_register_btn">
                                    <a class="btn btn-outline-danger" style="width: 80%; font-weight: 600" href="/register"> {{ __('Înregistreazăte') }} </a>
                                </div>

                                <!-- Register buttons -->
                                <div class="text-center">
                                    <p>sau intră cu:</p>
                                    <button type="button" class="btn btn-link btn-floating mx-1" style="color: #000000">
                                        <i class="bi bi-facebook"></i>
                                    </button>

                                    <button type="button" class="btn btn-link btn-floating mx-1" style="color: #000000">
                                        <i class="bi bi-google"></i>
                                    </button>

                                    <button type="button" class="btn btn-link btn-floating mx-1" style="color: #000000">
                                        <i class="bi bi-twitter-x"></i>
                                    </button>

                                    <button type="button" class="btn btn-link btn-floating mx-1" style="color: #000000">
                                        <i class="bi bi-github"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <img src="/images/login.jpg" class="w-100 rounded-4 shadow-4"
                         alt="" />
                </div>
            </div>
        </div>
        <!-- Jumbotron -->
    </section>
</div>
@endsection
