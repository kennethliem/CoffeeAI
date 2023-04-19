<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
    <title>CoffeeAI - 404 Not Found Page</title>
    <!-- Sweet Alert -->
    <link type="text/css" href="<?= base_url('admin_assets/vendor/sweetalert2/dist/sweetalert2.min.css'); ?>" rel="stylesheet">
    <!-- Notyf -->
    <link type="text/css" href="<?= base_url('admin_assets/vendor/notyf/notyf.min.css'); ?>" rel="stylesheet">
    <!-- Volt CSS -->
    <link type="text/css" href="<?= base_url('admin_assets/css/volt.css'); ?>" rel="stylesheet">
    <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->

</head>

<body>
    <main>
        <section class="vh-100 d-flex align-items-center justify-content-center">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center d-flex align-items-center justify-content-center">
                        <div>
                            <img class="img-fluid" src="<?= base_url('admin_assets/assets/img/illustrations/welcome_icon.png'); ?>" alt="429 not found" width="250px" height="250px">
                            <h1 class="mt-5">Too many <span class="fw-bolder text-primary">request</span></h1>
                            <p class="lead my-4">
                                Oops! Looks like you have to many requests. If you think this is a problem with us, please tell us.
                            </p>
                            <a href="<?= base_url('/'); ?>" class="btn btn-gray-800 d-inline-flex align-items-center justify-content-center mb-4">
                                <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                                </svg>
                                Back to homepage
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Volt JS -->
    <script src="<?= base_url('admin_assets/assets/js/volt.js'); ?>"></script>
</body>

</html>