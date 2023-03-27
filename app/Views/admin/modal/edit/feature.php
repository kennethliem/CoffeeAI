<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="editFeatureLabel">Edit Feature</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action='<?= base_url("admin/features/editfeature/" . $feature['uuid']); ?>' method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="old_thumbnail" value="<?= $feature['icon_url']; ?>">
            <div class="mb-3">
                <label for="featureName">Nama Game</label>
                <input type="text" class="form-control" id="featureName" value="<?= (old('featureName')) ? old('featureName') : $feature['feature_name']; ?>" name="featureName" />
            </div>

            <div class="mb-3">
                <label for="featureDesc">Deskripsi Game</label>
                <textarea class="form-control" id="featureDesc" rows="3" name="featureDesc"><?= (old('featureDesc')) ? old('featureDesc') : $feature['feature_description']; ?></textarea>
            </div>

            <div class="mb-3">
                <label for="iconAlternate">Nama Game</label>
                <input type="text" class="form-control" id="iconAlternate" value="<?= (old('iconAlternate')) ? old('iconAlternate') : $feature['icon_alternate']; ?>" name="iconAlternate" />
            </div>

            <div class="mb-3">
                <label for="thumbnail">File Thumbnail</label>
                <input type="file" class="form-control-file" id="thumbnail" name="thumbnail">
            </div>
            <button type="submit" class="btn btn-success">Update</button>

        </form>
    </div>
</div>