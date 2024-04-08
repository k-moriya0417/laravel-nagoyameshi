@extends('layouts.app')

@section('content')

<div class="row">
<div class="col-2 bg-light">
    @component('components.sidebar', ['categories' => $categories])
    @endcomponent
</div>

<div class="col-9 d-flex justify-content-center">

  <div class="row w-75 py-5">
      <div class="col-5 offset-1">
          <img src="{{ asset($restaurant->img) }}" class="w-100 img-fluid">
      </div>
      <div class="col">
          <div class="d-flex flex-column">
              <h1 class="">
                  {{$restaurant->name}}
              </h1>
              <p class="">
                  {{$restaurant->description}}
              </p>
              <hr>
              <p class="d-flex align-items-end">
                  営業時間：{{$restaurant->business_hours}}
              </p>
              <p class="d-flex align-items-end">
                  住所：{{$restaurant->address}}
              </p>
              <p class="d-flex align-items-end">
                  電話番号：{{$restaurant->phone_number}}
              </p>
              <p>平均評価：{{ $aveStar }}
              <span class="star-wrapper">
                <span class="star-rating" data-rate="{{ $dataStar }}"></span>
              </span>
              </p>
              <hr>
          </div>

      @include('reservations.create') 
      @include('users.upgrade')       

      <form method="POST" class="m-3 align-items-end">
            @csrf
            <input type="hidden" name="id" value="{{$restaurant->id}}">
            <input type="hidden" name="name" value="{{$restaurant->name}}">
            <div class="row">
                <div class="col-6">
                    @if ($user->membership)
                        <a href="" data-bs-toggle="modal" data-bs-target="#myModal">
                        <button type="button" class="btn nagoyameshi-submit-button w-100">
                            <i class="far fa-calendar-check"></i> 
                            予約する
                        </button>
                        </a>
                    @else
                        <a href="" data-bs-toggle="modal" data-bs-target="#noModal">
                        <button type="button" class="btn nagoyameshi-submit-button w-100">
                            <i class="far fa-calendar-check"></i> 
                            予約する
                        </button>
                        </a>
                    @endif

                </div>
                <div class="col-6">
                @if(Auth::user()->favorite_restaurants()->where('restaurant_id', $restaurant->id)->exists())
                    <a href="{{ route('favorites.destroy', $restaurant->id) }}" class="btn nagoyameshi-favorite-button text-favorite w-100" onclick="event.preventDefault(); document.getElementById('favorites-destroy-form').submit();">
                        <i class="fa fa-heart"></i>
                        お気に入り解除
                    </a>
                @else
                    <a href="{{ route('favorites.store', $restaurant->id) }}" class="btn nagoyameshi-favorite-button text-favorite w-100" onclick="event.preventDefault(); document.getElementById('favorites-store-form').submit();">
                        <i class="fa fa-heart"></i>
                        お気に入り
                    </a>
                @endif
                </div>
            </div>
      </form>
      <form id="favorites-destroy-form" action="{{ route('favorites.destroy', $restaurant->id) }}" method="POST" class="d-none">
            @csrf
            @method('DELETE')
        </form>
        <form id="favorites-store-form" action="{{ route('favorites.store', $restaurant->id) }}" method="POST" class="d-none">
            @csrf
        </form>
    
      </div>
      <div class="offset-1 col-11">
          <hr class="w-100">
          <h3 class="float-left">カスタマーレビュー</h3>
      </div>

      <div class="offset-1 col-10">
          <div class="row">
            @foreach($reviews as $review)
            <div class="offset-md-5 col-md-5 mb-4">
                <p class="h3">{{$review->title}}</p>
                <label class="">{{$review->content}}</label>
                <label>{{$review->created_at}} {{$review->user->name}}</label>
            </div>
            @endforeach
          </div><br />

          @auth
          <div class="row">
            <div class="offset-md-5 col-md-5">
                @if($user->membership)
                <form method="POST" action="{{ route('reviews.store') }}">
                    @csrf
                    <h4>評価</h4>
                    <select name="score" class="form-control m-2 review-score-color">
                    <option value="5" class="review-score-color">★★★★★</option>
                    <option value="4" class="review-score-color">★★★★</option>
                    <option value="3" class="review-score-color">★★★</option>
                    <option value="2" class="review-score-color">★★</option>
                    <option value="1" class="review-score-color">★</option>
                    </select>
                    <h4>タイトル</h4>
                    @error('title')
                        <strong>タイトルを入力してください</strong>
                    @enderror
                    <input type="text" name="title" class="form-control m-2">
                    <h4>レビュー内容</h4>
                    @error('content')
                        <strong>レビュー内容を入力してください</strong>
                    @enderror
                    <textarea name="content" class="form-control m-2"></textarea>
                    <input type="hidden" name="restaurant_id" value="{{$restaurant->id}}">
                    <button type="submit" class="btn nagoyameshi-submit-button ml-2">レビューを追加</button>
                </form> 
                @endif
            </div> 
          </div>
          @endauth
      </div>
  </div>
</div>

@endsection