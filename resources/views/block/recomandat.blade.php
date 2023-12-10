<div class="recomandat">
    <h4>Produse recomandate:</h4>
    <div class="row">
        @foreach($recomandat as $item)
            <div class="col-sm-6 col-lg-3 product_recomandat">
                <div class="product_block">
                    <div class="product_block_img">
                        <a href="/product/{{$item->slug}}" title="{{$item->name_ro}}"><img class="product_block_thumb" src="/storage/products_thumb/{{$item->image_thumb}}" alt="{{$item->name_ro}}" title="{{$item->name_ro}}"></a>
                    <div class="discount_block_img">
                       - {{ App\Http\Controllers\ProductController::discount($item->price, $item->promo_price) }} %
                    </div>
                    </div>
                    <div class="product_block_price">
                        @if($item->promo_price == null or $item->promo_price == '')
                            {{$item->price}} MDL
                            @else
                            {{$item->promo_price}} MDL <span> {{$item->price}} MDL</span>
                        @endif
                    </div>
                    <div class="product_block_name">
                        <a href="/product/{{$item->slug}}" title="{{$item->name_ro}}">{{$item->name_ro}}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
