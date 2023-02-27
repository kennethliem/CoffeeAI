<?= $this->include('admin/template/header'); ?>

<main>
    <section class="vh-100 d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="row align-items-center ">
                <div class="col-12 col-lg-5 order-2 order-lg-1 text-center text-lg-left">
                    <h1 class="mt-5">Hello, Welcome back <span class="text-danger">admin</span> name</h1>
                    <p class="lead my-4">It's nice to see you back, have a nice day and don't forget to drink a glass of coffee <span class="text-danger">-CoffeeAI</span></p>
                    <a href="<?= base_url('/admin/dashboard'); ?>" class="btn btn-gray-800 d-inline-flex align-items-center justify-content-center mb-4">
                        Go to Dashboard
                    </a>
                </div>
                <div class="col-12 col-lg-7 order-1 order-lg-2 text-center d-flex align-items-center justify-content-center">
                    <img class="img-fluid w-50" src="<?= base_url('admin_assets/assets/img/illustrations/welcome_icon.png'); ?>" alt="office">
                </div>
            </div>
        </div>
    </section>
</main>

<?= $this->include('admin/template/footer'); ?>