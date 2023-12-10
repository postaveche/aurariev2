@extends('layouts.aurarie')

@section('title', $product[0]->name_ro)

@section('description', $product[0]->desc_ro)

@section('keyword', $product[0]->key_ro)

@section('content')
    <span class="badge badge-danger">{{$discount}} %</span>
    <div class="container">
        <div class="product">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product_img">
                    <div class="item">
                        <div class="clearfix">
                            <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                                @foreach($images as $img)
                                    <li data-thumb="/storage/products/{{$img}}">
                                        <img class="product_img_slider" src="/storage/products/{{$img}}" />
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product_info">
                        <div class="product_title">
                            <h1>{{$product[0]->name_ro}}</h1>
                        </div>
                        <div class="product_code">
                            <small>Codul produsului: {{$product[0]->cod}}</small>
                            @if($product[0]->cantitate <> 0)
                                <div class="product_avalable">
                                    În stoc
                                </div>
                            @else
                                <div class="product_noavalable">
                                    Stoc epuizat
                                </div>
                            @endif
                        </div>
                        <div class="product_category">
                            Categoria: {{$product[0]->mycategory->name_ro??null}}
                        </div>
                        <hr>
                        <div class="product_price">
                            @if($product[0]->promo_price == null or $product[0]->promo_price == '')
                                {{$product[0]->price}}
                            @else
                                <div class="product_promo_price">
                                    {{$product[0]->promo_price}} Lei <div class="product_discount">- {{$discount}} %</div>
                                </div>
                                <div class="product_old_price">
                                    {{$product[0]->price}} Lei
                                </div>
                            @endif
                        </div>
                        <div class="product_addtocart">
                            <a class="btn btn-secondary w-100 @if($product[0]->cantitate == 0) disabled @endif" href="#" disabled=""><i class="bi bi-cart-check-fill"></i> Adaugă în
                                coș</a>
                        </div>
                        <hr>
                        <div class="product_location">
                            <h5>MODELUL ESTE DISPONIBIL ÎN MAGAZINELE:</h5>

                        </div>
                    </div>
                </div>
            </div>
            <hr>
            @include('block.icon')
            <hr>
            <div class="product_description">
                <h4>DESPRE PRODUS:</h4>
                {!! $product[0]->full_desc_ro !!}
            </div>
            <hr>
            @include('block.recomandat')
        </div>
    </div>
@endsection
