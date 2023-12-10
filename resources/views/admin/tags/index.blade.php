@extends('admin.layouts.administrations')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0">Toate Tagurile produselor</h1>
                        <small>Vizualizarea tuturor tagurile de sortare a produselor disponibile în magazin</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container">
                <a class="btn btn-primary m-2" href="{{route('tags.create')}}">Adaugă TAG</a>
                <div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Lista de taguri...</h3>
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
                                @foreach($tags as $tag)
                                    <tr>
                                        <td>{{$tag->id}}</td>
                                        <td>{{$tag->name_ro}} | {{$tag->name_ru}}</td>
                                        <td>
                                            {{$tag->slug}}
                                        </td>
                                        <td>
                                            <a class="badge badge-success" href="{{route('tags.edit', $tag->id)}}" title="Edit"><i class="fas fa-edit"></i></a>
                                            <form action="{{route('tags.destroy', $tag->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                           <button class="btn btn-outline-danger" type="submit" onclick="return confirm('Doriți să ștergeți tagul?')"><i class="fas fa-trash"></i></button>
                                            </form>
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
