@extends('layouts.aurarie')

@section('title', 'Catalogul de produse')

@section('description', '')

@section('keyword', '')

@section('content')
<div class="catalog">
    <div class="container">
        <div class="row d-flex">
            <div class="col-sm-2">
                <div class="catalog_sidebar">
               <div class="sidebar_left_title">
                   Categorii produse
               </div>
                <hr>
                <ul>
                    @foreach($homecategories as $homecategory)
                        <li class="homecategory"><a href="/category/{{$homecategory->slug}}">{{$homecategory->name_ro}}</a></li>
                        @foreach($categories as $category)
                            @if($category->category_id == $homecategory->id)
                                <li class="subcategory"><a href="/category/{{$category->slug}}">{{$category->name_ro}}</a></li>
                            @endif
                        @endforeach
                    @endforeach
                </ul>
                </div>
            </div>
            <div class="col-sm-10">
                <div class="catalog_products">
                    <h1>{{$curent_category[0]->name_ro??"Catalogul produselor"}}</h1>
                    Toatal produse: {{ $count_products }}
                </div>
                <div class="catalog_products_block row d-flex">
                    @foreach($products as $item)
                            <div class="catalog_product_item">
                                <div class="catalog_product_block_img">
                                    <a href="/product/{{$item->slug}}" title="{{$item->name_ro}}"><img class="catalog_product_block_thumb" src="/storage/products_thumb/{{$item->image_thumb}}" alt="{{$item->name_ro}}" title="{{$item->name_ro}}"></a>
                                    <div class="discount_block_img">
                                        - {{ App\Http\Controllers\ProductController::discount($item->price, $item->promo_price) }} %
                                    </div>
                                </div>
                                <div class="catalog_product_block_price">
                                    @if($item->promo_price == null or $item->promo_price == '')
                                        {{$item->price}} MDL
                                    @else
                                        {{$item->promo_price}} MDL <span> {{$item->price}} MDL</span>
                                    @endif
                                </div>
                                <div class="catalog_product_block_name">
                                    <a href="/product/{{$item->slug}}" title="{{$item->name_ro}}">{{$item->name_ro}}</a>
                                </div>
                            </div>
                    @endforeach
                </div>
                <div class="catalog_pagination">
                        {!! $products->links() !!}
                </div>
                <hr>
                @include('block.recomandat')
            </div>
        </div>
    </div>
</div>
@endsection
