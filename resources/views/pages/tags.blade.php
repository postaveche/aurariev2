@extends('layouts.aurarie')

@section('title', $tag->name_ro??null.' Toate produsele cu aceasta eticheta')

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
                    <h1>{{$tag->name_ro??"Produse dupa taguri:"}}</h1>
                    Toatal produse: {{ $count_products }}
                </div>
                <div class="catalog_products_block row d-flex">
                    @foreach($products as $item)
                            <div class="catalog_product_item">
                                <div class="catalog_product_block_img">
                                    <a href="/product/{{$item->myproduct->slug??null}}" title="{{$item->myproduct->name_ro??null}}"><img class="catalog_product_block_thumb" src="/storage/products_thumb/{{$item->myproduct->image_thumb??null}}" alt="{{$item->myproduct->name_ro??null}}" title="{{$item->myproduct->name_ro??null}}"></a>
                                    <div class="discount_block_img">
                                        - {{ App\Http\Controllers\ProductController::discount($item->myproduct->price??null, $item->myproduct->promo_price??null) }} %
                                    </div>
                                </div>
                                <div class="catalog_product_block_price">
                                    @if($item->myproduct->promo_price == null or $item->myproduct->promo_price == '')
                                        {{$item->myproduct->price}} MDL
                                    @else
                                        {{$item->myproduct->promo_price}} MDL <span> {{$item->myproduct->price}} MDL</span>
                                    @endif
                                </div>
                                <div class="catalog_product_block_name">
                                    <a href="/product/{{$item->myproduct->slug}}" title="{{$item->myproduct->name_ro}}">{{$item->myproduct->name_ro}}</a>
                                </div>
                            </div>
                    @endforeach
                </div>
                <div class="catalog_pagination">
                        {!! $products->links() !!}
                </div>
                <hr>
                <div class="product_tags">
                    @foreach($alltags as $tag)
                        <div class="product_tag"><a href="{{route('showtag', $tag->slug??null)}}" title="{{$tag->name_ro??null}}">{{$tag->name_ro??null}}</a></div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
