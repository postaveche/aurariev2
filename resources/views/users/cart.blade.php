@extends('layouts.aurarie')

@section('content')
    <div class="cart">
        <div class="container">
            @if(session('succes'))
                @include('messages.succes')
            @elseif(session('error'))
                @include('messages.error')
            @endif
            <h1>Coșul de cumpărături</h1>
            <table class="table table-hover">
                <tr>
                    <td><b>Nr.</b></td>
                    <td><b>Imagine</b></td>
                    <td><b>Denumire</b></td>
                    <td><b>Pret</b></td>
                    <td><b>Cantitate</b></td>
                    <td><b>Total</b></td>
                    <td></td>
                </tr>
            @foreach($products as $product)
                @php
                $total_item = $product->products->price * $product->cantitate;
                $total_price = $total_price + $total_item;
                $item_nr = $item_nr+1;
                @endphp
                    <tr>
                        <td>{{$item_nr}}</td>
                        <td><img src="/storage/products_thumb/{{$product->products->image_thumb}}" alt="{{$product->products->name_ro}}" style="width: 100px; height: 100px"></td>
                        <td><a href="/product/{{$product->products->slug}}" title="{{$product->products->name_ro}}"><b>{{$product->products->name_ro}}</b></a></td>
                        <td>{{$product->products->price}} Lei</td>
                        <td>
                            <form action="{{route('update_cantitate', $product->products->id)}}" method="POST">
                                @csrf
                            <input name="cantitate" value="{{$product->cantitate}}" type="number"> buc
                                <button class="btn" type="submit"><i class="bi bi-arrow-clockwise"></i></button>
                            </form>
                        </td>
                        <td>{{$total_item}} Lei</td>
                        <td>
                            <form action="{{route('product_remove_cart', $product->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn" type="submit"><i class="bi bi-x-circle"></i></button>
                            </form></td>
                    </tr>
            @endforeach
            </table>
            <div class="card_total">
                Total: {{ $total_price }} Lei
            </div>
        </div>
    </div>
@endsection
