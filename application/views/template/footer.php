</div>
<!-- latest jquery-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="<?php echo base_url('assets') ?>/js/bootstrap/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url('assets') ?>/js/icons/feather-icon/feather.min.js"></script>
<script src="<?php echo base_url('assets') ?>/js/icons/feather-icon/feather-icon.js"></script>
<script src="<?php echo base_url('assets') ?>/js/scrollbar/simplebar.js"></script>
<script src="<?php echo base_url('assets') ?>/js/scrollbar/custom.js"></script>
<script src="<?php echo base_url('assets') ?>/js/config.js"></script>
<script src="<?php echo base_url('assets') ?>/js/sidebar-menu.js"></script>
<script src="<?php echo base_url('assets') ?>/js/clock.js"></script>
<script src="<?php echo base_url('assets') ?>/js/slick/slick.min.js"></script>
<script src="<?php echo base_url('assets') ?>/js/slick/slick.js"></script>
<script src="<?php echo base_url('assets') ?>/js/header-slick.js"></script>
<!-- <script src="<?php echo base_url('assets') ?>/js/chart/apex-chart/apex-chart.js"></script> -->
<script src="<?php echo base_url('assets') ?>/js/chart/apex-chart/moment.min.js"></script>
<script src="<?php echo base_url('assets') ?>/js/notify/bootstrap-notify.min.js"></script>
<script src="<?php echo base_url('assets') ?>/js/dashboard/default.js"></script>
<script src="<?php echo base_url('assets') ?>/js/typeahead/handlebars.js"></script>
<script src="<?php echo base_url('assets') ?>/js/typeahead/typeahead.bundle.js"></script>
<script src="<?php echo base_url('assets') ?>/js/typeahead/typeahead.custom.js"></script>
<script src="<?php echo base_url('assets') ?>/js/typeahead-search/handlebars.js"></script>
<script src="<?php echo base_url('assets') ?>/js/typeahead-search/typeahead-custom.js"></script>
<script src="<?php echo base_url('assets') ?>/js/height-equal.js"></script>
<script src="<?php echo base_url('assets') ?>/js/animation/wow/wow.min.js"></script>
<!-- <script src="<?php echo base_url('assets') ?>/js/modalpage/validation-modal.js"></script> -->
<script src="<?php echo base_url('assets') ?>/js/datatable/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets') ?>/js/datatable/datatables/datatable.custom.js"></script>
<!-- <script src="<?php echo base_url('assets') ?>/js/notify/index.js"></script> -->
<script src="<?php echo base_url('assets') ?>/js/script.js"></script>
<!-- <script src="<?php echo base_url('assets') ?>/js/theme-customizer/customizer.js"></script> -->
<script>
    new WOW().init();
</script>
<script type="text/javascript">
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 5000);
</script>

<!-- Fungsi Jenis-->
<script type="text/javascript">
    $(document).on('click', '.ubah_data', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        let name = $(this).data('name');
        $('input[name="nama_jenis"]').val(name);
        $('button[name="save"]').val(id);
    });
</script>

<!-- Fungsi Kategori-->
<script type="text/javascript">
    $(document).on('click', '.ubah_data', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        let name = $(this).data('name');
        $('input[name="nama_kategori"]').val(name);
        $('button[name="save"]').val(id);
    });
</script>
</body>

</html>