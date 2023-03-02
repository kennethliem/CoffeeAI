<footer class="bg-white rounded shadow p-5 mb-4 mt-4">
    <div class="row">
        <div class="col-12 col-md-4 col-xl-6 mb-4 mb-md-0">
            <p class="mb-0 text-center text-lg-start">© 2019-<span class="current-year"></span> <a class="text-primary fw-normal" href="https://themesberg.com" target="_blank">Themesberg</a></p>
        </div>
        <div class="col-12 col-md-8 col-xl-6 text-center text-lg-start">
            <!-- List -->
            <ul class="list-inline list-group-flush list-group-borderless text-md-end mb-0">
                <li class="list-inline-item px-0 px-sm-2">
                    <a href="https://themesberg.com/about">About</a>
                </li>
                <li class="list-inline-item px-0 px-sm-2">
                    <a href="https://themesberg.com/themes">Themes</a>
                </li>
                <li class="list-inline-item px-0 px-sm-2">
                    <a href="https://themesberg.com/blog">Blog</a>
                </li>
                <li class="list-inline-item px-0 px-sm-2">
                    <a href="https://themesberg.com/contact">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</footer>
</main>

<!-- Core -->
<script src="<?= base_url('admin_assets/vendor/@popperjs/core/dist/umd/popper.min.js'); ?>"></script>
<script src="<?= base_url('admin_assets/vendor/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>

<!-- Charts -->
<script src="<?= base_url('admin_assets/vendor/chartist/dist/chartist.min.js'); ?>"></script>
<script src="<?= base_url('admin_assets/vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js'); ?>"></script>

<!-- Sweet Alerts 2 -->
<script src="<?= base_url('admin_assets/vendor/sweetalert2/dist/sweetalert2.all.min.js'); ?>"></script>

<!-- Volt JS -->
<script src="<?= base_url('admin_assets/assets/js/volt.js'); ?>"></script>

<script>
    var dataTable = new DataTable("#myTable", {
        searchable: true,
        sortable: true,
        fixedHeight: true,
        layout: {
            top: "{select}{search}",
            bottom: "{pager}{info}"
        },
    });
</script>

</body>

</html>