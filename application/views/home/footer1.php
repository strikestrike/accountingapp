    <!-- Required vendors -->
    <script src="<?= base_url(); ?>assets/vendor/global/global.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/custom.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/deznav-init.js"></script>
    <script src="<?= base_url(); ?>assets/js/demo.js"></script>
    <script src="<?= base_url(); ?>assets/js/styleSwitcher.js"></script>
    <script>
        jQuery('a[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
            var hrefTarget = jQuery(this).attr('href');
            if (hrefTarget == '#boxed') {
                jQuery('#BoxedViewTabLink').removeClass('d-none');
                jQuery('#ListViewTabLink').addClass('d-none');

            } else if (hrefTarget == '#list') {
                jQuery('#ListViewTabLink').removeClass('d-none');
                jQuery('#BoxedViewTabLink').addClass('d-none');
            }

        });

         
    </script>
</body>

</html>