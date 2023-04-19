<?= $this->include('homepage/template/header'); ?>

<section id="detection">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-sm-12">
                <form action='<?= base_url("/detection"); ?>' method="POST" enctype="multipart/form-data">
                    <div class="card text-center mt-5">
                        <div class="card-header">
                            Coffee Detection
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center mb-2">
                                <div>
                                    <button type="button" class="btn btn-brown view_data">
                                        See your API Token
                                    </button>
                                </div>
                            </div>
                            <div class=" row justify-content-center">
                                <img src="<?= base_url('home_assets/img/empty.png'); ?>" id="uploaded_image" alt="uploaded_image" height="350px">
                            </div>
                        </div>
                        <div class="card-footer text-muted">
                            <input type="file" onchange="readURL(this);" class="form-control-file" id="image" name="image" />
                            <button type="submit" class="btn btn-brown">Detect</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#uploaded_image')
                    .attr('src', e.target.result)
                    .width(350)
                    .height(350);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>




<div class="modal fade" id="resultPopUp" tabindex="-1" aria-labelledby="resultPopUpLabel" aria-hidden="true"> <!-- Add this line to your code -->
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                CoffeeAI - Discover and savor your coffee with ease.
                <h5 class="modal-title" id="resultPopUpLabel"></h5>
            </div>
            <div class="modal-body">
                <?php if (session()->getFlashdata('coffeeType')) : ?>
                    <div class="alert alert-success" role="alert">
                        This is your Coffee Bean Type 😉 : <?= session()->getFlashdata('coffeeType'); ?>
                    </div>
                <?php endif; ?>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> <!-- And the relavant closing div tag -->

<?php if (session()->getFlashdata('success') || session()->getFlashdata('error') != null) : ?>
    <script type="text/javascript">
        window.onload = () => {
            $('#resultPopUp').modal('show');
        }
    </script>
<?php endif; ?>

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
                url: '<?= base_url('/tokenDetail'); ?>',
                method: 'get',
                success: function(data) {
                    $('#data_apiKey').html(data);
                    $('#apiKey').modal("show");
                }
            });
        });
    });
</script>

<?= $this->include('homepage/template/footer'); ?>