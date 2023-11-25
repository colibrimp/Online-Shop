@extends('layouts.app')

@section('title', 'Online Shop')

@section('content')

    {{-- вывод ошибок --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
    @endif

            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Название</label>
                    <input type="text" name="title" class="form-control" id="title"  value="{{ old('title') }}" >
                </div>
                <div class="mb-3">
                    <label for="formFileMultiple" class="form-label">Вставте картинку</label>
                    <input class="form-control" type="file"  name="image" id="formFileMultiple" multiple  value="{{ old('image') }}" >

                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Цена</label>
                    <input type="text" name="price" class="form-control" id="price"  value="{{ old('price') }}" >
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Описание товара</label>
                    <input type="text" name="description" class="form-control" id="description"  value="{{ old('description') }}" >
                </div>
                <div class="mb-3">
                   <button type="submit" class="btn btn-outline-primary">Добавить новый товар</button>
                </div>
            </form>


@endsection
