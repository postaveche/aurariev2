@extends('layouts.aurarie')

@section('content')
<div class="container">
    <div class="home_title">
    <h3>Bine ai venit {{ Auth::user()->name }}</h3>
    </div>
    <div class="home_block">
        <div class="row">
        <div class="col-xl-3">
            <div class="home_sidebar">
                <div class="home_logo_block">
                    <img class="home_logo_img" src="/images/logo_black.jpg" alt="Aurarie Logo">
                </div>
                <div class="home_navigation">
                    <h4>Meniu</h4>
                    <ul class="nav d-block">
                        <li>Profil</li>
                        <li>Dorinte</li>
                        <li>Comenzi</li>
                        <li>Logout</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xl-9">
            Continut
        </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
