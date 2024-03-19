@extends('layouts.app')

@section('content')

<div>
  <h2>新規店舗登録</h2>
</div>

<form action="{{ route('restaurants.store') }}" method="POST">
  @csrf

  <div>
    <strong>店名</strong>
    <input type="text" name="name" placeholder="店名">
  </div>
  <div>
      <strong>カテゴリ</strong>
      <select name="category_id">
      @foreach ($categories as $category)
      <option value="{{ $category->id }}">{{ $category->category_name }}</option>
      @endforeach
      </select>
  </div>
  <div>
    <strong>紹介文</strong>
    <textarea style="height:150px" name="description" placeholder="紹介文"></textarea>
  </div>
  <div>
    <strong>営業時間</strong>
    <input type="text" name="business_hours" placeholder="営業時間">
  </div>
  <div>
    <strong>住所</strong>
    <input type="text" name="address" placeholder="住所">
  </div>
  <div>
    <strong>連絡先</strong>
    <input type="text" name="phone_number" placeholder="連絡先">
  </div>

  <div>
    <button type="submit">登録</button>
  </div>

  </form>
@endsection