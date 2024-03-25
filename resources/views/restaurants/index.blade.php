@extends('layouts.app')

@section('content')



  <div class="row">
    <div class="col-2 bg-light">
         @component('components.sidebar', ['categories' => $categories])
         @endcomponent
     </div>
    <div class="col-9 py-2">
      <div class="container">
        @if($keyword !== null)
          <a href="{{ route('top') }}">トップ</a> > 
          <a href="{{ route('restaurants.index') }}">店舗一覧</a>
          <h1>"{{ $keyword }}"の検索結果{{$total_count}}件</h1>
        @elseif ($category !== null)
          <a href="{{ route('top') }}">トップ</a> > 
          <a href="{{ route('restaurants.index') }}">店舗一覧</a>
          <h1>"{{ $category->category_name }}"の検索結果{{$total_count}}件</h1>
        @endif
      </div>

      <div class="container m-4">
        <div class="row w-100">
        
        @foreach($restaurants as $restaurant)
        <div class="col-12">
          <div class="row mt-4">
            <div class="col-6">
              <a href="{{ route('restaurants.show',$restaurant) }}">
                <img src="{{ asset($restaurant->img) }}" class="img-thumbnail">
              </a>
            </div>
            <div class="col-6">
              <h4 class="nagoyameshi-product-label mt-2 border-bottom">
                {{$restaurant->name}}
              </h4>
              <p class="nagoyameshi-product-label mt-2">
                {{$restaurant->description}}
              </p>
              
                @foreach($categories as $category)
                  @if($category->id == $restaurant->category_id)
                  <p class="nagoyameshi-product-label mt-2">
                  カテゴリ：{{$category->category_name}}
                  </p>
                  @endif
                @endforeach

              <p class="nagoyameshi-product-label mt-2">
                営業時間：{{$restaurant->business_hours}}
              </p>
              <p class="nagoyameshi-product-label mt-2">
                {{$restaurant->address}}
              </p>
            </div>
          </div>
        </div>
        @endforeach

        </div>
      </div>
      {{ $restaurants->appends(request()->query())->links() }}
    </div>
  </div>
 
@endsection