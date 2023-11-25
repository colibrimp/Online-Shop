@extends('layouts.app')

@section('title', 'Просмотр')

@section('content')
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('uploads/products/' . $products->image) }}"  class="card-img-top" alt="images">
                    <h2>{{ $products->title }}</h2>
                    <p><b>{{ $products->price }} гр</b></p>
                    <p>{{ $products->description }}</p>
                </div>
                <button class="btn btn-secondary button_text">
                    <a href="{{ route('product.index') }}">На главную</a>
                </button>

            </div>
        </div>
    </div>
@endsection
