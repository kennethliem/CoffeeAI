<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="editfaqLabel">Edit faqs</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action='<?= base_url("admin/faqs/edit/" . $faq['uuid']); ?>' method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="_method" value="PUT">

            <div class="mb-3">
                <label for="question">Question</label>
                <textarea class="form-control" id="question" rows="5" name="question"><?= (old('question')) ? old('question') : $faq['question']; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="answer">Answer</label>
                <textarea class="form-control" id="answer" rows="5" name="answer"><?= (old('answer')) ? old('answer') : $faq['answer']; ?></textarea>
            </div>

            <button type="submit" class="btn btn-success">Update</button>

        </form>
    </div>
</div>