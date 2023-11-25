@extends('layouts.app')

@section('title', 'Online Shop')

@section('content')

    {{--для выведения сообщения о действии--}}
    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    {{--   кнопка создать--}}
    <a href="{{route('product.create')}}" class="btn btn-outline-primary">
        Cоздать <i class="fas fa-plus"></i>
    </a>

    <div class="row">

        @foreach($products as $product)

            <div class="card m-lg-4" style="width: 20rem;">

                <img src="{{ asset('uploads/products/' . $product->image) }}" class="card-img-top" alt="images">

                <div class="card-body">

                    <h5 class="card-title">{{ $product->title }}</h5>
                    <h4>{{ $product->price }} гр</h4>
                    <p class="card-text">{{ $product->description }}</p>

                    <div class="d-flex justify-content-center">
                        {{--  кнопка показать --}}
                        <a href="{{route('product.show', $product->id)}}" class="btn btn-outline-success me-3">
                            <i class="far fa-eye"></i>
                        </a>
                        {{-- кнопка редактировать--}}
                        <a href="{{route('product.edit', $product->id)}}" class="btn btn-outline-warning me-3">
                            <i class="far fa-edit"></i>
                        </a>

                        {{--  кнопка удалить--}}
                        <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger"><i class="far fa-trash-alt"></i>
                            </button>
                        </form>

                    </div>


                </div>

            </div>

        @endforeach


    </div>


    <nav aria-label="">
        <ul class="pagination">
            {{$products->links('vendor.pagination.bootstrap-4')}}
        </ul>
    </nav>


@endsection

