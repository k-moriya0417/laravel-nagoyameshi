@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-xl-9">
            <h1 class="mb-5">ご予約内容</h1>

            <div class="row justify-content-between">
                <div class="col-lg-7">
                    <hr class="mt-0 mb-4">

                    <div class="mb-4">
                        <form action="{{ route('checkout.store') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn nagoyameshi-submit-button text-white w-100">お支払い</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
