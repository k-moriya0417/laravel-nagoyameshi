@extends('layouts.app')

@section('content')

  <div class="container">
      
  </div>

  <div class="row">
    <div class="col-12">
      <div class="container m-4">
        <div class="row w-100">
        
        @foreach($restaurants as $restaurant)
        <div class="col-12">
          <div class="row mt-4">
            <div class="col-6">
              <a href="{{ route('restaurants.show',$restaurant) }}">
                <img src="{{ asset('img/dummy.png') }}" class="img-thumbnail">
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
    </div>
  </div>
 
@endsection