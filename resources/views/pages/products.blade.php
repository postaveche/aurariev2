@extends('layouts.aurarie')

@section('title', $product[0]->name_ro)

@section('description', $product[0]->desc_ro)

@section('keyword', $product[0]->key_ro)

@section('content')
    <div class="container">
        @if(session('succes'))
            @include('messages.succes')
        @elseif(session('error'))
            @include('messages.error')
        @endif
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
                            <small><b>Codul produsului:</b> {{$product[0]->cod}}</small>
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
                            Categoria: <a href="/category/{{$product[0]->mycategory->slug??null}}">{{$product[0]->mycategory->name_ro??null}}</a>
                        </div>
                        <div class="product_weight">
                            <b>Greutatea produsului:</b> 2.76 grame
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
                            <form action="{{ route('addtocart') }}" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product[0]->id }}">
                                <input type="hidden" name="cantitate" value="1" min="1">
                                <button class="btn btn-secondary w-100" type="submit"><i class="bi bi-cart-check-fill"></i> Adaugă în coș</button>
                            </form>
                        </div>
                        <hr>
                        <div class="product_location">
                            <h5>MODELUL ESTE DISPONIBIL ÎN MAGAZINELE:</h5>
                            <div class="product_shop">
                                <div class="product_shop_item">
                                    <img src="/images/logo_black.jpg" alt="Aurarie Logo">
                                </div>
                                <div class="product_shop_item">
                                Str. Armenească 51A
                                </div>
                            </div>
                            <div class="product_shop">
                                <div class="product_shop_item">
                                    <img src="/images/logo_black.jpg" alt="Aurarie Logo">
                                </div>
                                <div class="product_shop_item">
                                    bd. Stefan ce Mare 8, CC “Unic”
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="product_tags">
                            @foreach($tags as $tag)
                               <div class="product_tag"><a href="{{route('showtag', $tag->mytags->slug??null)}}">{{$tag->mytags->name_ro??null}}</a></div>
                            @endforeach
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
