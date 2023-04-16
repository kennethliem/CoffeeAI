<?= $this->include('homepage/template/header'); ?>

<section id="detection">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card text-center mt-5">
                    <div class="card-header">
                        Coffee Detection
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center mb-2">
                            <div>
                                <a href="#" class="btn btn-danger">See your API KEY</a>
                            </div>
                        </div>
                        <div class="row">
                            <img src="home_assets/img/about.jpg" alt="uploaded_image" height="350px">
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <a href="#" class="btn btn-primary">Upload Images</a>
                        <a href="#" class="btn btn-success">Detect</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->include('homepage/template/footer'); ?>