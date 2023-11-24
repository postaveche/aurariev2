@extends('admin.layouts.administrations')

@section('title', 'Crearea Tagurilor pentru magazin')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0">Crează TAG</h1>
                        <small>Aici poți crea un tag nou pentru produse</small>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.messages.succes')
        @include('admin.messages.error')
        <div class="content">
            <div class="container">
                <div class="col-12">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Adăugare TAG</h3>
                        </div>
                        <form action="{{route('tags.store')}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name_ro">Nume TAG RO</label>
                                    <input type="text" class="form-control" id="name_ro" name="name_ro"
                                           value="{{old('name_ro')}}" placeholder="Nume TAG" required>
                                </div>
                                <div class="form-group">
                                    <label for="name_ru">Имя Тэга РУ</label>
                                    <input type="text" class="form-control" id="name_ru" name="name_ru"
                                           value="{{old('name_ru')}}" placeholder="Имя Тэга" required>
                                </div>
                                <div class="form-group">
                                    <label for="desc_ro">Descrierea Tagului RO</label>
                                    <input type="text" class="form-control" id="desc_ro" name="desc_ro"
                                           value="{{old('desc_ro')}}" placeholder="Descrierea Tagului">
                                </div>
                                <div class="form-group">
                                    <label for="desc_ru">Описание Тэга РУ</label>
                                    <input type="text" class="form-control" id="desc_ru" name="desc_ru"
                                           value="{{old('desc_ru')}}" placeholder="Описание Тэга">
                                </div>
                                <div class="form-group">
                                    <label for="key_ro">Cuvinte cheie RO</label>
                                    <input type="text" class="form-control" id="key_ro" name="key_ro"
                                           value="{{old('key_ro')}}" placeholder="Cuvinte cheie">
                                </div>
                                <div class="form-group">
                                    <label for="key_ru">Ключевые слова РУ</label>
                                    <input type="text" class="form-control" id="key_ru" name="key_ru"
                                           value="{{old('key_ru')}}" placeholder="Ключевые слова">
                                </div>
                                <div class="form-group">
                                    <label>Tagul principal</label>
                                    <select class="form-control" name="tag_id">
                                        <option value="0"> -------------</option>
                                        @foreach($tags as $tag)
                                            <option value="{{$tag->id}}">{{$tag->tag_id}} | {{$tag->id}}) {{$tag->name_ro}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Salvează</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
