<?= $this->include('homepage/template/header'); ?>

<section id="detection">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card text-center mt-5">
                    <div class="card-header">
                        Coffee Detection
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <span>Your API Token : $routes->get('/signin', 'Admin\Auth::index');</span>
                        </div>
                        <div class="row">
                            <img src="home_assets/img/about.jpg" alt="uploaded_image" height="500px" width="500px">
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <a href="#" class="btn btn-primary">Upload Images</a>
                        <a href="#" class="btn btn-danger">Detect</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->include('homepage/template/footer'); ?>