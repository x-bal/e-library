<a href="javascript:;" class="btn btn-icon btn-circle btn-primary btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
<!-- END scroll-top-btn -->
</div>

<!-- ================== BEGIN core-js ================== -->
<script src="<?= base_url('/') ?>assets/js/vendor.min.js"></script>
<script src="<?= base_url('/') ?>assets/js/app.min.js"></script>
<script src="<?= base_url('/') ?>assets/js/theme/apple.min.js"></script>
<!-- ================== END core-js ================== -->

<!-- ================== BEGIN page-js ================== -->
<script src="<?= base_url('/') ?>assets/plugins/d3/d3.min.js"></script>
<script src="<?= base_url('/') ?>assets/plugins/nvd3/build/nv.d3.min.js"></script>
<script src="<?= base_url('/') ?>assets/plugins/jvectormap-next/jquery-jvectormap.min.js"></script>
<script src="<?= base_url('/') ?>assets/plugins/jvectormap-next/jquery-jvectormap-world-mill.js"></script>
<script src="<?= base_url('/') ?>assets/plugins/bootstrap-calendar/js/bootstrap_calendar.min.js"></script>
<script src="<?= base_url('/') ?>assets/js/demo/dashboard-v2.js"></script>

<script src="<?= base_url('/') ?>assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('/') ?>assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('/') ?>assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('/') ?>assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('/') ?>assets/plugins/select2/dist/js/select2.min.js"></script>
<!-- ================== END page-js ================== -->

<script>
    $('#data-table-default').DataTable({
        responsive: true
    });

    $(".buku-select2").select2({
        placeholder: "Pilih buku"
    });
</script>
</body>

</html>