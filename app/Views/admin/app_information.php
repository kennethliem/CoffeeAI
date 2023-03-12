<?= $this->include('admin/template/header'); ?>

<div class="card border-0 shadow">
    <form action='<?= base_url('admin/information/update/' . $app[0]['uuid']); ?>' method="POST">
        <div class="card-header d-flex justify-content-between">

            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="fas fa-bullhorn"></span>
                    <?= session()->getFlashdata('success'); ?>
                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span class="fas fa-bullhorn"></span>
                    <?= session()->getFlashdata('error'); ?>
                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <button type="submit" class="btn btn-outline-gray-600 d-inline-flex align-items-center">
                <i class=" bi bi-person-fill-add me-2"></i>
                Update
            </button>

        </div>

        <div class="card-body">
            <?= csrf_field(); ?>

            <input type="text" class="form-control" id="uuid" value="<?= $app[0]['uuid']; ?>" name="uuid" disabled hidden>

            <div class="mb-3">
                <label for="appName" class="form-label">App Name</label>
                <input type="text" class="form-control" id="appName" value="<?= $app[0]['app_name']; ?>" name="app_name">
            </div>
            <div class="mb-3">
                <label for="appDesc" class="form-label">App Descriptions</label>
                <textarea class="form-control" id="appDesc" rows="3" name="app_description"><?= $app[0]['app_description']; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="copyright" class="form-label">Copyright</label>
                <input type="text" class="form-control" id="copyright" value="<?= $app[0]['app_copyright']; ?>" name="app_copyright">
            </div>
            <div class="mb-3">
                <label for="happyUsers" class="form-label">Total Happy Users</label>
                <input type="number" class="form-control" id="happyUsers" value="<?= $app[0]['count_happy_users']; ?>" name="count_happy_users">
            </div>
            <div class="mb-3">
                <label for="datasets" class="form-label">Total Datasets</label>
                <input type="number" class="form-control" id="datasets" value="<?= $app[0]['count_total_datasets']; ?>" name="count_total_datasets">
            </div>
            <div class="mb-3">
                <label for="accuracy" class="form-label">Total Accuracy</label>
                <input type="number" class="form-control" id="accuracy" value="<?= $app[0]['last_model_accuracy']; ?>" name="last_model_accuracy">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea type="text" class="form-control" rows="2" id="address" name="app_address"><?= $app[0]['app_address']; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="phoneNumber" class="form-label">Phone Number</label>
                <input type="number" class="form-control" id="phoneNumber" value="<?= $app[0]['app_phone_number']; ?>" name="app_phone_number">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" value="<?= $app[0]['app_email']; ?>" name="app_email">
            </div>
            <div class="mb-3">
                <label for="operationalHours" class="form-label">Operational Hours</label>
                <input type="text" class="form-control" id="operationalHours" value="<?= $app[0]['app_operational_hours']; ?>" name="app_operational_hours">
            </div>
            <div class="mb-3">
                <label for="updatedAt" class="form-label">Updated At</label>
                <input type="text" class="form-control" id="updatedAt" value="<?= $app[0]['updated_at']; ?>" name="updated_at" disabled>
            </div>
            <div class="mb-3">
                <label for="updatedBy" class="form-label">Updated By</label>
                <input type="text" class="form-control" id="updatedBy" value="<?= $app[0]['last_modified_by']; ?>" name="last_modified_by" disabled>
            </div>

            <input type="hidden" name="_method" value="PUT">
        </div>
    </form>
</div>

<?= $this->include('admin/template/footer'); ?>