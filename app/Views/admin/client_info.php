<?= $this->include('admin/template/header'); ?>

<div class="card border-0 shadow">
    <div class="card-header d-flex justify-content-start">
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
    </div>
    <div class="card-body">
        <table id="myTable" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Email</th>
                    <th>Fullname</th>
                    <th>Updated at</th>
                    <th>Last updated by</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($clients as $client) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $client['email']; ?></td>
                        <td><?= $client['fullname']; ?></td>
                        <td><?= $client['updated_at']; ?></td>
                        <td><?= $client['updated_by']; ?></td>
                        <td>
                            <form action="<?= base_url('admin/clients/update/' . $client['uuid']); ?>" method="POST" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="put">
                                <button type="submit" class="btn btn-primary mb-1">Reset Quota</button>
                            </form>
                            <form action="<?= base_url('admin/clients/generate/' . $client['uuid']); ?>" method="POST" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="put">
                                <input type="number" name="duration" placeholder="days">
                                <button type="submit" class="btn btn-danger mb-1 mt-1">Generate</button>
                            </form>
                            <button type="button" class="btn btn-info view_data" id="<?= $client['uuid']; ?>">
                                Check
                            </button>
                        </td>
                    </tr>
                <?php
                    $i++;
                endforeach; ?>

            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="apiKey" tabindex="-1" role="dialog" aria-labelledby="apiKeyLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" id="data_apiKey">

    </div>
</div>

<script defer>
    $(document).ready(function() {
        $('body').on("click", ".view_data", function(event) {
            var uuid = $(this).attr("id");
            // memulai ajax
            $.ajax({
                url: '<?= base_url('admin/clients/detail'); ?>' + '/' + uuid,
                method: 'get',
                success: function(data) {
                    $('#data_apiKey').html(data);
                    $('#apiKey').modal("show");
                }
            });
        });
    });
</script>

<?= $this->include('admin/template/footer'); ?>