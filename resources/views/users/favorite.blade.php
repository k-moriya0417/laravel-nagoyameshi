@extends('layouts.app')
 
@section('content')
<div class="container  d-flex justify-content-center mt-3">
    <div class="w-75">
        <h1>お気に入り</h1>

        <hr>

        <div class="row">
            @foreach ($favorite_restaurants as $favorite_restaurant)
                <div class="col-md-7 mt-2">
                    <div class="d-inline-flex">
                        <a href="{{ route('restaurants.show', $favorite_restaurant->id) }}" class="w-25">
                            <img src="{{ asset($favorite_restaurant->img) }}" class="img-fluid w-100">
                        </a>
                        <div class="container mt-3">
                            <h5 class="w-100 nagoyameshi-favorite-item-text">{{ $favorite_restaurant->name }}</h5>
                            @foreach($categories as $category)
                              @if($category->id == $favorite_restaurant->category_id)
                                <p class="nagoyameshi-product-label mt-2">
                                カテゴリ：{{$category->category_name}}
                                </p>
                              @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-2 d-flex align-items-center justify-content-end">
                    <a href="{{ route('favorites.destroy', $favorite_restaurant->id) }}" class="nagoyameshi-favorite-item-delete" onclick="event.preventDefault(); document.getElementById('favorites-destroy-form').submit();">
                        削除
                    </a>
                    <form id="favorites-destroy-form" action="{{ route('favorites.destroy', $favorite_restaurant->id) }}" method="POST" class="d-none">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            @endforeach
        </div>

        <hr>
    </div>
</div>
@endsection