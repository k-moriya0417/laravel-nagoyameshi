<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">予約する</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-center">
                    <form action="{{ route('reservations.store') }}" method="POST">
                        @csrf
                        <table>
                            <tr>
                                <td><label class="me-2">店名</label></td>
                                <td><input type="text" value="{{ $restaurant->name }}" class="form-control nagoyameshi-login-input">
                                    <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">
                                </td>
                            </tr>
                                <td><label class="me-2">日付</label></td>
                                <td><input type="datetime-local" name="datetime" class="form-control nagoyameshi-login-input"></td>
                            </tr>
                            <tr>
                                <td><label class="me-2">人数</label></td>
                                <td><input type="number" name="guests" class="form-control nagoyameshi-login-input"></td>
                            </tr>
                        </table>

                        <div>
                            <button type="submit" class="btn nagoyameshi-submit-button">予約申込</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>