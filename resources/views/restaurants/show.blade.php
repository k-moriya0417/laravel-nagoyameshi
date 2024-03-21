@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center">
  <div class="row w-75">
      <div class="col-5 offset-1">
          <img src="{{ asset('img/dummy.png')}}" class="w-100 img-fluid">
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
                  {{$restaurant->business_hours}}
              </p>
              <hr>
          </div>
      </div>

      <div class="offset-1 col-11">
          <hr class="w-100">
          <h3 class="float-left">カスタマーレビュー</h3>
      </div>

      <div class="offset-1 col-10">
          <div class="row">
            @foreach($reviews as $review)
            <div class="offset-md-5 col-md-5">
                <p class="h3">{{$review->title}}</p>
                <p class="h4">{{$review->content}}</p>
                <label>{{$review->created_at}} {{$review->user->name}}</label>
            </div>
            @endforeach
          </div><br />

          @auth
          <div class="row">
            <div class="offset-md-5 col-md-5">
                <form method="POST" action="{{ route('reviews.store') }}">
                    @csrf
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
            </div> 
          </div>
          @endauth
      </div>
  </div>
</div>

@endsection