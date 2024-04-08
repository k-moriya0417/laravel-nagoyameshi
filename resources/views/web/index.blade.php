@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="container m-4">
      <div class="row w-100 m-4">
        <div>
          <a href="{{ route('restaurants.index') }}"><h1>店舗一覧</h1></a>
        </div>
        
        <h1 class="mt-2">新着店舗</h1>
        @foreach($restaurants as $restaurant)
        <div class="col-4">
          <div class="row mt-4">
            <div>
              <a href="{{ route('restaurants.show',$restaurant) }}">
                <img src="{{ asset($restaurant->img) }}" class="img-thumbnail">
              </a>
            </div>
            <div>
              <h3 class="nagoyameshi-product-label mt-2 border-bottom">
                {{$restaurant->name}}
              </h3>
            </div>
          </div>
        </div>
        @endforeach
      
      <div class="mt-5">
        <h1>カテゴリ一覧</h1>
        <div class="d-flex flex-wrap mx-1 mb-1">
          @foreach($categories as $category)
          <a href="{{ route('restaurants.index', ['category' => $category->id]) }}">
            <label class="btn btn-outline-secondary btn-sm me-1 mb-2">{{$category->category_name}}</label>
          </a>
          @endforeach
        </div>
      </div>

    </div>
    </div>
  </div>
@endsection