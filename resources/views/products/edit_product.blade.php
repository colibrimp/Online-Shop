@extends('layouts.app')

@section('title', 'Online Shop')

@section('content')

    {{-- вывода ошибок--}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br/>
    @endif

    <form action="{{ route('product.update', $products->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Название</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ $products->title }}">
        </div>
        <div class="mb-3">
            <label for="formFileMultiple" class="form-label">Вставте картинку</label>
            <input class="form-control" type="file" name="image" id="formFileMultiple" multiple>
            <div style="width: 18rem">
                <img src="{{ asset('uploads/products/' . $products->image) }}" class="card-img-top" width="280px"
                     height="245px" alt="images">
            </div>

        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Цена</label>
            <input type="text" name="price" class="form-control" id="price" value="{{ $products->price }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Описание товара</label>
            <input type="text" name="description" class="form-control" id="description"
                   value="{{ $products->description}}">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-outline-warning">Редактировать</button>
        </div>
    </form>


@endsection
