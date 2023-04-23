<?= $this->include('admin/template/header'); ?>

<div class="row mt-5">
    <div class="col-12 col-sm-6 col-xl-4 mb-4">
        <div class="card border-0 shadow">
            <div class="card-body">
                <div class="row d-block d-xl-flex align-items-center">
                    <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                        <div class="icon-shape icon-shape-success rounded me-4 me-sm-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-badge-fill" viewBox="0 0 16 16">
                                <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm4.5 0a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm5 2.755C12.146 12.825 10.623 12 8 12s-4.146.826-5 1.755V14a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-.245z" />
                            </svg>
                        </div>
                        <div class="d-sm-none">
                            <h2 class="h5">Total Active Clients</h2>
                            <h3 class="fw-extrabold mb-1"><?= $countUser['total_clients']; ?></h3>
                        </div>
                    </div>
                    <div class="col-12 col-xl-7 px-xl-0">
                        <div class="d-none d-sm-block">
                            <h2 class="h6 text-gray-400 mb-0">Total Active Clients</h2>
                            <h3 class="fw-extrabold mb-2"><?= $countUser['total_clients']; ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-4 mb-4">
        <div class="card border-0 shadow">
            <div class="card-body">
                <div class="row d-block d-xl-flex align-items-center">
                    <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                        <div class="icon-shape icon-shape-info rounded me-4 me-sm-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-clipboard-data" viewBox="0 0 16 16">
                                <path d="M4 11a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1zm6-4a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V7zM7 9a1 1 0 0 1 2 0v3a1 1 0 1 1-2 0V9z" />
                                <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                                <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                            </svg>
                        </div>
                        <div class="d-sm-none">
                            <h2 class="h5">Total Datasets</h2>
                            <h3 class="fw-extrabold mb-1"><?= $app[0]['count_total_datasets']; ?></h3>
                        </div>
                    </div>
                    <div class="col-12 col-xl-7 px-xl-0">
                        <div class="d-none d-sm-block">
                            <h2 class="h6 text-gray-400 mb-0">Total Datasets</h2>
                            <h3 class="fw-extrabold mb-2"><?= $app[0]['count_total_datasets']; ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-4 mb-4">
        <div class="card border-0 shadow">
            <div class="card-body">
                <div class="row d-block d-xl-flex align-items-center">
                    <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                        <div class="icon-shape icon-shape-danger rounded me-4 me-sm-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-cpu" viewBox="0 0 16 16">
                                <path d="M5 0a.5.5 0 0 1 .5.5V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2A2.5 2.5 0 0 1 14 4.5h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14a2.5 2.5 0 0 1-2.5 2.5v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14A2.5 2.5 0 0 1 2 11.5H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2A2.5 2.5 0 0 1 4.5 2V.5A.5.5 0 0 1 5 0zm-.5 3A1.5 1.5 0 0 0 3 4.5v7A1.5 1.5 0 0 0 4.5 13h7a1.5 1.5 0 0 0 1.5-1.5v-7A1.5 1.5 0 0 0 11.5 3h-7zM5 6.5A1.5 1.5 0 0 1 6.5 5h3A1.5 1.5 0 0 1 11 6.5v3A1.5 1.5 0 0 1 9.5 11h-3A1.5 1.5 0 0 1 5 9.5v-3zM6.5 6a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z" />
                            </svg>
                        </div>
                        <div class="d-sm-none">
                            <h2 class="h5">Last Model Accuracy</h2>
                            <h3 class="fw-extrabold mb-1"><?= $app[0]['last_model_accuracy']; ?>%</h3>
                        </div>
                    </div>
                    <div class="col-12 col-xl-7 px-xl-0">
                        <div class="d-none d-sm-block">
                            <h2 class="h6 text-gray-400 mb-0">Last Model Accuracy</h2>
                            <h3 class="fw-extrabold mb-2"><?= $app[0]['last_model_accuracy']; ?>%</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-xl-8">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="fs-5 fw-bold mb-0">Engine Request</h2>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th class="border-bottom" scope="col">Page name</th>
                                    <th class="border-bottom" scope="col">Total Requests</th>
                                    <th class="border-bottom" scope="col">Total Success</th>
                                    <th class="border-bottom" scope="col">Total Error</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <th class="text-gray-900" scope="row">
                                        <a href="<?= base_url('/detection'); ?>">/detection</a>
                                    </th>
                                    <td class="fw-bolder text-gray-500">
                                        <?= $requests['web_total_request']; ?>
                                    </td>
                                    <td class="fw-bolder text-gray-500">
                                        <?= $requests['web_success_request']; ?>
                                    </td>
                                    <td class="fw-bolder text-gray-500">
                                        <?= $requests['web_error_request']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-gray-900" scope="row">
                                        <a href="<?= base_url('/api/detection'); ?>">/api/detection</a>
                                    </th>
                                    <td class="fw-bolder text-gray-500">
                                        <?= $requests['api_total_request']; ?>
                                    </td>
                                    <td class="fw-bolder text-gray-500">
                                        <?= $requests['api_success_request']; ?>
                                    </td>
                                    <td class="fw-bolder text-gray-500">
                                        <?= $requests['api_error_request']; ?>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xxl-6 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-header border-bottom d-flex align-items-center justify-content-between">
                        <h2 class="fs-5 fw-bold mb-0">Engine Status</h2>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush list my--3">
                            <li class="list-group-item px-0">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <a href="<?= base_url('/'); ?>" class="avatar">
                                            <img class="rounded" alt="Image placeholder" src="<?= base_url('admin_assets/assets/logo/logo.png'); ?>">
                                        </a>
                                    </div>
                                    <div class="col-auto ms--2">
                                        <h4 class="h6 mb-0">
                                            <a>CoffeeAI - Deep Learning Backend</a>
                                        </h4>
                                        <div class="d-flex align-items-center">
                                            <div class="bg-<?= $engine['status'] ==  "Online" ? 'success' : 'danger'; ?> dot rounded-circle me-1"></div>
                                            <small>
                                                <?= $engine['status']; ?> - <?= $engine['message']; ?>
                                                <?php if (session()->getFlashdata('error')) : ?>
                                                    <span class="badge bg-danger"><?= session()->getFlashdata('error'); ?></span>
                                                <?php endif; ?>
                                                <?php if (session()->getFlashdata('success')) : ?>
                                                    <span class="badge bg-success"><?= session()->getFlashdata('success'); ?></span>
                                                <?php endif; ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col text-end">
                                        <?php
                                        if ($engine['message'] != "Server disconnected") :
                                            if (session()->get('role') == 1) : ?>
                                                <form action="<?= base_url('admin/dashboard/engine'); ?>" method="POST" class="d-inline">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="PUT">
                                                    <input type="hidden" name="setEnable" value="<?= $engine['status'] ==  "Online" ? '0' : '1'; ?>">
                                                    <button type="submit" class="btn btn-<?= $engine['status'] ==  "Online" ? 'danger' : 'primary'; ?> mb-1"><i class="<?= $engine['status'] ==  'Online' ? 'bi bi-stop-circle-fill' : 'bi bi-play-circle-fill'; ?>"></i></button>
                                                </form>
                                        <?php
                                            endif;
                                        endif; ?>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xxl-6 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-header border-bottom d-flex align-items-center justify-content-between">
                        <h2 class="fs-5 fw-bold mb-0">Common Error</h2>
                    </div>
                    <div class="card-body">
                        <!-- Project 1 -->
                        <?php foreach ($errors as $error) : ?>
                            <div class="row mb-4">
                                <div class="col">
                                    <div class="progress-wrapper">
                                        <div class="progress-info">
                                            <?php $percent = (int)$error['total'] / (int)$requests['total_request'] * 100; ?>
                                            <div class="h6 mb-0"><?= $error['result']; ?></div>
                                            <div class="small fw-bold text-gray-500"><span><?= $percent; ?> %</span></div>
                                        </div>
                                        <div class="progress mb-0">
                                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="<?= $percent; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $percent; ?>%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-xl-4">
        <div class="col-12 px-0 mb-4">
            <div class="card border-0 shadow">
                <div class="card-header d-flex flex-row align-items-center flex-0 border-bottom">
                    <div class="d-block">
                        <div class="h6 fw-normal text-gray mb-2">Total Requests</div>
                        <h2 class="h3 fw-extrabold"><?= $requests['total_request']; ?></h2>
                    </div>
                </div>
                <div class="card-body p-2">
                    <div class="ct-chart-sales-value ct-golden-section ct-series-a"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('admin/template/footer'); ?>
<?= $this->include('admin/chart/weeklyReport'); ?>