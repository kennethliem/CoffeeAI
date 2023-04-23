<?= $this->include('admin/template/header'); ?>

<div class="row mt-5">
    <div class="col-12 col-sm-6 col-xl-4 mb-4">
        <div class="card border-0 shadow">
            <div class="card-body">
                <div class="row d-block d-xl-flex align-items-center">
                    <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                        <div class="icon-shape icon-shape-primary rounded me-4 me-sm-0">
                            <svg class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
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
                        <div class="icon-shape icon-shape-primary rounded me-4 me-sm-0">
                            <svg class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
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
                        <div class="icon-shape icon-shape-primary rounded me-4 me-sm-0">
                            <svg class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
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
                                                    - <?= session()->getFlashdata('error'); ?>
                                                <?php endif; ?>
                                                <?php if (session()->getFlashdata('success')) : ?>
                                                    - <?= session()->getFlashdata('success'); ?>
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