@extends('layouts.app')
 
@section('content')
<div class="container  d-flex justify-content-center mt-3">
    <div class="w-75">
        <h1>予約一覧</h1>

        <hr>

        <div class="row">
            @foreach ($reservation_restaurants as $reservation_restaurant)
                <div class="col-md-7 mt-2">
                    <div class="d-inline-flex w-100">
                        @foreach($restaurants as $restaurant)
                            @if($restaurant->id == $reservation_restaurant->restaurant_id)
                                <a href="{{ route('restaurants.show', $restaurant->id) }}" class="w-25">
                                <img src="{{ asset($restaurant->img) }}" class="img-fluid w-100">
                                </a>
                            @endif
                        @endforeach
                        <div class="container mt-3">
                            @foreach($restaurants as $restaurant)
                              @if($restaurant->id == $reservation_restaurant->restaurant_id)
                              <h6 class="w-100 nagoyameshi-favorite-item-text">店名：{{ $restaurant->name }}</h6>
                              @endif
                            @endforeach
                            <p class="">日時：{{$reservation_restaurant->date}}</p>
                            <p class="">人数：{{$reservation_restaurant->guests}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 d-flex align-items-center justify-content-end">
                    <a href="{{ route('reservations.destroy', $reservation_restaurant->id) }}" class="nagoyameshi-favorite-item-delete" onclick="event.preventDefault(); document.getElementById('reservations-destroy-form').submit();">
                        削除
                    </a>
                    <form id="reservations-destroy-form" action="{{ route('reservations.destroy', $reservation_restaurant->id) }}" method="POST" class="d-none">
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