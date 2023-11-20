@extends('admin.layouts.administrations')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0">Crează un produs nou</h1>
                        <small>Aici poți crea un produs nou pentru magazinul AURARIE</small>
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
                            <h3 class="card-title">Adăugare produs</h3>
                        </div>
                        <form action="{{route('products.store')}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name_ro">Nume Produs RO</label>
                                    <input type="text" class="form-control" id="name_ro" name="name_ro"
                                           value="{{old('name_ro')}}" placeholder="Nume Produs" required>
                                </div>
                                <div class="form-group">
                                    <label for="name_ru">Имя Продукта РУ</label>
                                    <input type="text" class="form-control" id="name_ru" name="name_ru"
                                           value="{{old('name_ru')}}" placeholder="Имя Продукта" required>
                                </div>
                                <div class="form-group">
                                    <label for="desc_ro">Descrierea scurtă a produsului RO</label>
                                    <input type="text" class="form-control" id="desc_ro" name="desc_ro"
                                           value="{{old('desc_ro')}}" placeholder="Descrierea">
                                </div>
                                <div class="form-group">
                                    <label for="desc_ru">Описание продукта РУ</label>
                                    <input type="text" class="form-control" id="desc_ru" name="desc_ru"
                                           value="{{old('desc_ru')}}" placeholder="Описание">
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
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="cod">Codul produsului</label>
                                            <input type="text" class="form-control" id="cod" name="cod"
                                                   value="{{old('cod')}}" placeholder="Codul produsului">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Categoria principală</label>
                                            <select class="form-control" name="category_id">
                                                <option value="0"> -------------</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->category_id}}
                                                        | {{$category->id}}) {{$category->name_ro}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="price">Prețul produsului</label>
                                            <input type="text" class="form-control" id="price" name="price"
                                                   value="{{old('price')}}" placeholder="Prețul produsului">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="promo_price">Preț Special al produsului</label>
                                            <input type="text" class="form-control" id="promo_price" name="promo_price"
                                                   value="{{old('promo_price')}}" placeholder="Preț Special">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="cantitate">Cantitate</label>
                                            <input type="text" class="form-control" id="cantitate" name="cantitate"
                                                   value="{{old('cantitate')}}" placeholder="Cantitate">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="image_thumb">Imaginea reprezintativă</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image_thumb" name="image_thumb">
                                            <label class="custom-file-label" for="image_thumb">Selecteză poza</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="images">Pozele produsului</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="images" name="images">
                                            <label class="custom-file-label" for="images">Selecteză pozele</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Descrierea complectă a produsului RO</label>
                                    <textarea class="form-control" rows="3" name="full_desc_ro" placeholder="Scrie ..."></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Полное описание продукта РУ</label>
                                    <textarea class="form-control" rows="3" name="full_desc_ru" placeholder="Описание ..."></textarea>
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