@extends('layouts.aurarie')

@section('title', 'Aurarie')

@section('content')
    <header class="justify-content-center">
        <div class="header_container">
            @include('block.header')
        </div>
    </header>
    @yield('content')
    @include('block.footer')
@endsection
