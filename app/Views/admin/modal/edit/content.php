<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="editContentLabel">Edit Content</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action='<?= base_url("admin/contents/edit/" . $content['uuid']); ?>' method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="old_thumbnail" value="<?= $content['thumbnail_url']; ?>">
            <div class="mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" value="<?= (old('title')) ? old('title') : $content['title']; ?>" name="title" />
            </div>

            <div class="mb-3">
                <label for="description">Descriptions</label>
                <textarea class="form-control" id="description" rows="3" name="description"><?= (old('description')) ? old('description') : $content['description']; ?></textarea>
            </div>

            <div class="mb-3">
                <label for="thumbnailAlternate">Thumbnail Alternate</label>
                <input type="text" class="form-control" id="thumbnailAlternate" value="<?= (old('thumbnailAlternate')) ? old('thumbnailAlternate') : $content['thumbnail_alternate']; ?>" name="thumbnailAlternate" />
            </div>

            <div class="mb-3">
                <label for="contentUrl">Content Url</label>
                <input type="text" class="form-control" id="contentUrl" value="<?= (old('contentUrl')) ? old('contentUrl') : $content['content_url']; ?>" name="contentUrl" />
            </div>

            <div class="mb-3">
                <label for="thumbnail">File Thumbnail</label>
                <input type="file" class="form-control-file" id="thumbnail" name="thumbnail">
            </div>
            <button type="submit" class="btn btn-success">Update</button>

        </form>
    </div>
</div>