@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <h1 class="text-center mb-3">ご入会ありがとうございます！</h3>

            <p class="text-center lh-lg mb-5">
                予約機能を使用できるようになりました
            </p>
            <p class="text-center lh-lg mb-5">
                お気に入り機能を使用できるようになりました
            </p>
            <p class="text-center lh-lg mb-5">
                レビューの投稿ができるようになりました
            </p>

            <div class="text-center">
                <a href="{{ route('mypage.edit') }}" class="btn nagoyameshi-submit-button w-75 text-white">マイページに戻る</a>
            </div>
        </div>
    </div>
</div>
@endsection