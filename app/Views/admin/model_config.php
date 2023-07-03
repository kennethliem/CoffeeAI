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
            Request Retrain
        </button>
    </div>
    <div class="card-body">
        <table id="myTable" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Model Name</th>
                    <th>Version</th>
                    <th>Created at</th>
                    <th>Updated by</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($models as $model) :
                ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $model['model_name']; ?></td>
                        <td><?= $model['version']; ?></td>
                        <td><?= $model['created_at']; ?></td>
                        <td><?= $model['updated_by']; ?></td>
                    </tr>
                <?php
                    $i++;
                endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="addLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" id="data_add">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addLabel">Retrain Model</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action='<?= base_url("admin/modelconfig/retrain"); ?>' method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="name">Model Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="version">Model version</label>
                        <input type="text" class="form-control" id="version" name="version">
                    </div>
                    <div class="mb-3">
                        <label for="datasets">Datasets : </label>
                        <input type="file" class="form-control-file" id="datasets" name="datasets" accept="zip,application/octet-stream,application/zip,application/x-zip,application/x-zip-compressed">
                    </div>

                    <button type="submit" class="btn btn-success mt-3">Retrain</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->include('admin/template/footer'); ?>