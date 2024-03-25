@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="container m-4">
      <div class="row w-100 m-4">
        <div>
          <a href="{{ route('restaurants.index') }}">店舗一覧</a>
        </div>
        
        @foreach($restaurants as $restaurant)
        <div class="col-4">
          <div class="row mt-4">
            <div>
              <a href="{{ route('restaurants.show',$restaurant) }}">
                <img src="{{ asset('img/dummy.png') }}" class="img-thumbnail">
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
      </div>
      {{ $restaurants->links() }}
      
      <p>カテゴリ一覧</p>
      @foreach($category_names as $category_name)
      <div class="col-2">
        <div class="">
          <p>
          {{$category_name}}
          </p>
        </div>
      </div>
      @endforeach

    </div>
    </div>
  </div>
@endsection