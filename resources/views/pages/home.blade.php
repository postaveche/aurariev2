@extends('layouts.aurarie')

@section('title', 'Aurarie')

@section('content')
<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        <div class="swiper-slide"><img class="homeslider_img" src="https://parada.md/wp-content/uploads/2023/08/Slide8.jpg" alt=""></div>
        <div class="swiper-slide"><img class="homeslider_img" src="https://parada.md/wp-content/uploads/2023/08/Slide7.jpg" alt=""></div>
        <div class="swiper-slide"><img class="homeslider_img" src="https://parada.md/wp-content/uploads/2023/08/Slide4.jpg" alt=""></div>
        <div class="swiper-slide"><img class="homeslider_img" src="https://parada.md/wp-content/uploads/2023/08/Slide7.jpg" alt=""></div>
        <div class="swiper-slide"><img class="homeslider_img" src="https://parada.md/wp-content/uploads/2023/08/Slide8.jpg" alt=""></div>
    </div>
    <div class="swiper-pagination"></div>
</div>
@include('block.icon')
@include('block.main_categories')
<div class="home_category">
    <div class="container">
        <div class="title d-flex justify-content-center text-uppercase p-3">
            <h4>Ar putea să-ți placă</h4>
        </div>
        <hr>
        @include('block.recomandat')
    </div>
</div>
@endsection
