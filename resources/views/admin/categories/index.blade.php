@extends('admin.layouts.administrations')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0">Toate categoriile de produse</h1>
                        <small>Vizualizarea tuturor categoriilor de produse disponibile în magazin</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container">
                <div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Lista de categorii...</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 10px">ID</th>
                                    <th>Denumirea</th>
                                    <th>URL</th>
                                    <th style="width: 80px">Actiuni</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td><b>{{$category->maincategory->name_ro??null}}</b> * {{$category->name_ro}} | {{$category->name_ru}} ({{$category->category_id}})</td>
                                        <td>
                                            {{$category->slug}}
                                        </td>
                                        <td>
                                            <a class="badge badge-success" href="{{route('categories.edit', $category->id)}}" title="Edit"><i class="fas fa-edit"></i></a>
                                            <a class="badge badge-danger" onclick="return confirm('Doriți să ștergeți categoria?')" href="{{route('categories.destroy', $category->id)}}" title="Delete"><i class="fas fa-trash"></i></a>
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
