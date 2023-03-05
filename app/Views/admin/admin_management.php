<?= $this->include('admin/template/header'); ?>

<div class="card border-0 shadow">
    <div class="card-header d-flex justify-content-between">


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

        <button type="button" class="btn btn-outline-gray-600 d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#addAdmin">
            <i class=" bi bi-person-fill-add me-2"></i>
            Add Admin
        </button>

    </div>

    <div class="card-body">
        <table id="myTable" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($users as $user) : ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $user['full_name']; ?></td>
                        <td><?= $user['email']; ?></td>
                        <td><?= $user['phone']; ?></td>
                        <td><?= $user['role']; ?></td>
                        <td>
                            <form action="<?= base_url('admin/management/delete/' . $user['uuid']); ?>" method="POST" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger mb-1" onclick="return confirm('Are you sure?');"><i class="bi bi-trash-fill"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php
                    $no = $no + 1;
                endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Add Admin-->
<div class="modal fade" id="addAdmin" tabindex="-1" role="dialog" aria-labelledby="addAdminLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" id="data_add_admin">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAdminLabel">Add Admin</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action='<?= base_url("admin/management/addadmin"); ?>' method="POST">
                    <?= csrf_field(); ?>

                    <div class="mb-3">
                        <label for="fullname">FullName</label>
                        <input type="text" class="form-control" id="fullname" name="full_name">
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="example@gmail.com" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="phone">Phone Number</label>
                        <input type="number" class="form-control" id="phone" name="phone">
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="role">Role</label>
                        <select class="form-select" id="role" name="select_role">
                            <option value="1">Super Admin</option>
                            <option value="2" selected>Admin</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit_product" tabindex="-1" role="dialog" aria-labelledby="edit_product" aria-hidden="true">
    <div class="modal-dialog" role="document" id="data_edit_product">

    </div>
</div>

<?= $this->include('admin/template/footer'); ?>