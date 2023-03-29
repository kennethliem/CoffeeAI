<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="editSponsorLabel">Edit Sponsor</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action='<?= base_url("admin/sponsors/edit/" . $sponsor['uuid']); ?>' method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="old_photo" value="<?= $sponsor['photo_url']; ?>">

            <div class="mb-3">
                <label for="sponsorName">sponsor Name</label>
                <input type="text" class="form-control" id="sponsorName" value="<?= (old('sponsorName')) ? old('sponsorName') : $sponsor['sponsor_name']; ?>" name="sponsorName" />
            </div>

            <div class="mb-3">
                <label for="photoAlternate">Photo Alternate</label>
                <input type="text" class="form-control" id="photoAlternate" value="<?= (old('photoAlternate')) ? old('photoAlternate') : $sponsor['photo_alternate']; ?>" name="photoAlternate" />
            </div>

            <div class="mb-3">
                <label for="photo">Photo</label>
                <input type="file" class="form-control-file" id="photo" name="photo">
            </div>
            <button type="submit" class="btn btn-success">Update</button>

        </form>
    </div>
</div>