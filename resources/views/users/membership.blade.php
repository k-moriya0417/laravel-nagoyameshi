<div class="modal fade" id="memberModal" tabindex="-1" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="memberModalLabel">有料会員は月額300円です</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-center">
                    <form action="" method="POST">
                        @csrf
                        <table>
                            <tr>
                                <td><label class="me-2">クレジットカード番号</label></td>
                                <td><input type="text" value="" class="form-control nagoyameshi-login-input">
                                    <input type="hidden" name="restaurant_id" value="">
                                </td>
                            </tr>
                                <td><label class="me-2">セキュリティ番号</label></td>
                                <td><input type="num" name="date" class="form-control nagoyameshi-login-input"></td>
                            </tr>
                        </table>

                        <div class="d-flex justify-content-center">
                          <a class="" href="{{ route('mypage.upgrade') }}">
                            <button type="button" class="btn nagoyameshi-submit-button">登録</button>
                          </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>