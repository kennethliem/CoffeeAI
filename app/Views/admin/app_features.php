<?= $this->include('admin/template/header'); ?>

<div class="card border-0 shadow">
    <div class="card-header d-flex justify-content-end">
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('success'); ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>

        <button type="button" class="btn btn-outline-gray-600 d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#add">
            <i class="bi bi-plus-circle me-2"></i>
            Add Feature
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="myTable" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Feature</th>
                        <th>Description</th>
                        <th>Icon</th>
                        <th>Updated By</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($features as $feature) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $feature['feature_name']; ?></td>
                            <td><?= $feature['feature_description']; ?></td>
                            <td><img src="<?= base_url('assets/images/features/' . $feature['icon_url']); ?>" width="100px" height="100px" alt="<?= $feature['icon_alternate']; ?>"></td>
                            <td><?= $feature['last_modified_by']; ?></td>
                            <td>
                                <form action="<?= base_url('admin/features/delete/' . $feature['uuid']); ?>" method="POST" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');"><i class="bi bi-trash-fill"></i></button>
                                </form>
                                <a id="<?= $feature['uuid']; ?>" class="btn btn-primary view_data"><i class="bi bi-pencil-square"></i></a>
                            </td>
                        </tr>
                    <?php
                        $i++;
                    endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="addLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" id="data_add">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addLabel">Add Feature</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action='<?= base_url("admin/features/add"); ?>' method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>

                    <div class="mb-3">
                        <label for="featureName">Feature Name</label>
                        <input type="text" class="form-control" id="featureName" name="featureName">
                    </div>
                    <div class="mb-3">
                        <label for="featureDesc">Descriptions</label>
                        <textarea class="form-control" id="featureDesc" rows="3" name="featureDesc"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="iconAlternate">Icon Alternate</label>
                        <input type="text" class="form-control" id="iconAlternate" name="iconAlternate">
                    </div>
                    <div class="mb-3">
                        <label for="thumbnail">icon : </label>
                        <input type="file" class="form-control-file" id="thumbnail" name="thumbnail">
                    </div>

                    <button type="submit" class="btn btn-success mt-3">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog" role="document" id="data_edit">

    </div>
</div>

<script defer>
    $(document).ready(function() {
        $('body').on("click", ".view_data", function(event) {
            var uuid = $(this).attr("id");
            // memulai ajax
            $.ajax({
                url: '<?= base_url('admin/features/detail'); ?>' + '/' + uuid,
                method: 'get',
                success: function(data) {
                    $('#data_edit').html(data);
                    $('#edit').modal("show");
                }
            });
        });
    });
</script>

<?= $this->include('admin/template/footer'); ?>