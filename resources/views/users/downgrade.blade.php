<div class="modal fade" id="downModal" tabindex="-1" aria-labelledby="downModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="downModalLabel">解約すると有料コンテンツは利用できなくなります。</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-center">
                    <form action="" method="POST">
                        @csrf

                        <div class="d-flex justify-content-center">
                          <a class="" href="{{ route('mypage.downgrade') }}">
                            <button type="button" class="btn nagoyameshi-submit-button">解約</button>
                          </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>