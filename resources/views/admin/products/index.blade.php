@extends('admin.layouts.administrations')

@section('title', 'Lista de produse AMANET')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0">Toate Produsele</h1>
                        <small>Vizualizarea tuturor produselor disponibile în magazin</small>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.messages.succes')
        @include('admin.messages.error')
        <div class="content">
            <div class="container">
                <div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Lista de produse...</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 10px">ID</th>
                                    <th style="width: 100px">Foto</th>
                                    <th>Denumirea</th>
                                    <th>Categoria</th>
                                    <th>URL</th>
                                    <th>Pret</th>
                                    <th style="width: 80px">Actiuni</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td><b>{{$product->id}}</b></td>
                                        <td><img style="width: 90px; border: #565757 1px solid; border-radius: 10px;" src="/storage/products_thumb/{{$product->image_thumb}}" alt="{{$product->name_ro}}"></td>
                                        <td><b>{{$product->name_ro}}</b> <br> <small>{{$product->name_ru}}</small></td>
                                        <td>{{$product->category_id}}</td>
                                        <td>
                                            {{$product->slug}}
                                        </td>
                                        <td>{{$product->price}} MDL</td>
                                        <td>
                                            <a class="badge badge-success" href="{{route('products.edit', $product->id)}}" title="Edit"><i class="fas fa-edit"></i></a>
                                            <a class="badge badge-danger" onclick="return confirm('Doriți să ștergeți produsul?')" href="{{route('products.destroy', $product->id)}}" title="Delete"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
