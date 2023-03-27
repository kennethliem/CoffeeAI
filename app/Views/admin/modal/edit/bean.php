<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="editBeanLabel">Edit Beans</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action='<?= base_url("admin/beans/edit/" . $bean['uuid']); ?>' method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="old_photo" value="<?= $bean['photo_url']; ?>">

            <div class="mb-3">
                <label for="beanName">Bean Name</label>
                <input type="text" class="form-control" id="beanName" value="<?= (old('beanName')) ? old('beanName') : $bean['name']; ?>" name="beanName" />
            </div>

            <div class="mb-3">
                <label for="beanType">Bean Type</label>
                <input type="text" class="form-control" id="beanType" value="<?= (old('beanType')) ? old('beanType') : $bean['type']; ?>" name="beanType" />
            </div>

            <div class="mb-3">
                <label for="beanDesc">Descriptions</label>
                <textarea class="form-control" id="beanDesc" rows="3" name="beanDesc"><?= (old('beanDesc')) ? old('beanDesc') : $bean['description']; ?></textarea>
            </div>

            <div class="mb-3">
                <label for="photoAlternate">Photo Alternate</label>
                <input type="text" class="form-control" id="photoAlternate" value="<?= (old('photoAlternate')) ? old('photoAlternate') : $bean['photo_alternate']; ?>" name="photoAlternate" />
            </div>

            <div class="mb-3">
                <label for="photo">Photo</label>
                <input type="file" class="form-control-file" id="photo" name="photo">
            </div>
            <button type="submit" class="btn btn-success">Update</button>

        </form>
    </div>
</div>