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
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#apiKey">
                                    See your API Key
                                </button>
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


<div class="modal fade" id="apiKey" tabindex="-1" role="dialog" aria-labelledby="apiKeyLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" id="data_apiKey">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="apiKeyLabel">Your API Key</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span class="badge bg-warning text-dark"></span>
            </div>
            <div class="modal-footer">
                <p>The tokens will expire within 30 days.But a new token will be given every time you log in, so you can use that token to access this feature through the API endpoint below.</p><br>
                <span style="color: red;">coffeeai.online/api/detection</span>
            </div>
        </div>
    </div>
</div>

<?= $this->include('homepage/template/footer'); ?>