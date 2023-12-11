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
                                <h2 class="fw-bold mb-5">Crează un cont</h2>
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="row mb-3">
                                        <label for="name"
                                               class="col-form-label text-md-start">{{ __('Nume') }}</label>

                                        <div class="">
                                            <input id="name" type="text"
                                                   class="form-control @error('name') is-invalid @enderror" name="name"
                                                   value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="phone"
                                               class="col-form-label text-md-start">{{ __('Telefon') }}</label>
                                        <div class="">
                                            <input id="telefon" type="text"
                                                   class="form-control @error('phone') is-invalid @enderror"
                                                   name="phone"
                                                   value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="adresa"
                                               class="col-form-label text-md-start">{{ __('Adresa Postala') }}</label>
                                        <div class="">
                                            <input id="adresa" type="text"
                                                   class="form-control @error('adresa') is-invalid @enderror"
                                                   name="adresa"
                                                   value="{{ old('adresa') }}" autofocus>

                                            @error('adresa')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="datanasterii"
                                               class="col-form-label text-md-start">{{ __('Data Nasterii') }}</label>
                                        <div class="">
                                            <input id="datepicker" name="datanasterii" value="{{ old('datanasterii') }}"
                                                   required autocomplete="datanasterii"/>
                                        </div>
                                        @error('datanasterii')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="row mb-3">
                                        <label for="sex"
                                               class="col-form-label text-md-start">{{ __('Sex') }}</label>
                                        <div class="text-md-start">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="sex" id="sexm"
                                                       value="1" checked>
                                                <label class="form-check-label" for="sexm">
                                                    Masculin
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="sex" value="2"
                                                       id="sexf">
                                                <label class="form-check-label" for="sexf">
                                                    Femenin
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="email"
                                               class="col-form-label text-md-start">{{ __('Email Address') }}</label>

                                        <div class="">
                                            <input id="email" type="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   name="email"
                                                   value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="password"
                                               class="col-form-label text-md-start">{{ __('Password') }}</label>

                                        <div class="">
                                            <input id="password" type="password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   name="password" required autocomplete="new-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="password-confirm"
                                               class="col-form-label text-md-start">{{ __('Confirmă parola') }}</label>

                                        <div class="">
                                            <input id="password-confirm" type="password" class="form-control"
                                                   name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="row mb-0">
                                        <div class="w-100">
                                            <button type="submit" class="btn btn-success">
                                                {{ __('Înregistrează-te') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <img src="/images/register.jpg" class="w-100 rounded-4 shadow-4"
                             alt=""/>
                    </div>
                </div>
            </div>
            <!-- Jumbotron -->
        </section>
    </div>
@endsection
