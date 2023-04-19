<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="apiKeyLabel">Your API Token</h5>
        <form action="<?= base_url('/regenerate'); ?>" method="POST">
            <button type="submit">
                <span>Regenerate</span>
            </button>
        </form>
    </div>
    <div class="modal-body">
        <div class="form-floating">
            <textarea class="form-control" id="" style="height: 180px; resize: none;" disabled><?= session()->get('token'); ?></textarea>
        </div>
    </div>
    <div class="modal-footer">
        <p><?= $tokenExpired ?>.</p><br>
        <span style="color: red;">coffeeai.online/api/detection</span>
    </div>
</div>