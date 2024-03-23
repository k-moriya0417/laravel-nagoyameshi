@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center mt-3">
    <div class="w-50">
        <h1>マイページ</h1>

        <hr>

        <div class="container">
            <div class="d-flex justify-content-between">
                <div class="row">
                    <div class="col-2 d-flex align-items-center">
                        <i class="fas fa-user fa-3x mypage-icon"></i>
                    </div>
                    <div class="col-9 d-flex align-items-center ms-3 mt-3">
                        <div class="d-flex flex-column">
                            <label for="user-name">会員情報の編集</label>
                            <p>アカウント情報の編集</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <a href="{{route('mypage.edit')}}">
                        <i class="fas fa-chevron-right fa-2x mypage-icon"></i>
                    </a>
                </div>
            </div>
        </div>

        <hr>

        <div class="container">
            <div class="d-flex justify-content-between">
                <div class="row">
                    <div class="col-2 d-flex align-items-center">
                      <i class="far fa-heart fa-3x mypage-icon"></i>
                    </div>
                    <div class="col-9 d-flex align-items-center mt-3">
                        <div class="d-flex flex-column">
                            <label for="user-name">お気に入り</label>
                            <p>お気に入りに登録した店舗を閲覧できます</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <a href="{{route('mypage')}}">
                        <i class="fas fa-chevron-right fa-2x mypage-icon"></i>
                    </a>
                </div>
            </div>
        </div>

        <hr>

        <div class="container">
            <div class="d-flex justify-content-between">
                <div class="row">
                    <div class="col-2 d-flex align-items-center">
                      <i class="far fa-calendar-check fa-3x mypage-icon"></i>
                    </div>
                    <div class="col-9 d-flex align-items-center ms-3 mt-3">
                        <div class="d-flex flex-column">
                            <label for="user-name">予約一覧</label>
                            <p>予約を確認できます</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <a href="{{route('mypage')}}">
                        <i class="fas fa-chevron-right fa-2x mypage-icon"></i>
                    </a>
                </div>
            </div>
        </div>

        <hr>

        <div class="container">
            <div class="d-flex justify-content-between">
                <div class="row">
                    <div class="col-2 d-flex align-items-center">
                        <i class="fa-solid fa-right-from-bracket fa-3x mypage-icon"></i>
                    </div>
                    <div class="col-9 d-flex align-items-center ms-3 mt-3">
                        <div class="d-flex flex-column">
                            <label for="user-name">ログアウト</label>
                            <p>ログアウトします</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-chevron-right fa-2x mypage-icon"></i>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>

        <hr>
    </div>
</div>
@endsection