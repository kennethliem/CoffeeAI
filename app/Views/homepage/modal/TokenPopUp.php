<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="apiKeyLabel">Your API Token</h5>
        <?php if ($tokenExpired == "Token Has been expired, please regenerate.") : ?>
            <form action="<?= base_url('/regenerate'); ?>" method="POST">
                <button type="submit">
                    <span>Regenerate</span>
                </button>
            </form>
        <?php endif; ?>
    </div>
    <div class="modal-body">
        <div class="form-floating">
            <textarea class="form-control" id="" style="height: 180px; resize: none;" disabled><?= $token; ?></textarea>
        </div>
    </div>
    <div class="modal-footer">
        <div class="row justify-content-start">
            <span>Your Regeneration Quota : <?= $regeneration_quota; ?></span>
            <p><?= $tokenExpired ?>.</p><br>
            <span style="color: red;">coffeeai.online/api/detection</span>
        </div>
    </div>
</div>