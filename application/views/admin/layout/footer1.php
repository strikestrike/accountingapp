<!-- Required vendors -->
<script src="<?= base_url(); ?>assets/vendor/global/global.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/just-validate/package/dist/just-validate.production.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/jquery-validation/jquery.validate.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="<?= base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/jszip/jszip.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url() ?>assets/vendor/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- datatables plugins end -->
<script src="<?= base_url(); ?>assets/vendor/toastr/js/toastr.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
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
<script>
	toastr.options = {
		"closeButton": true,
		"newestOnTop": false,
		"progressBar": true,
		"positionClass": "toast-top-right",
		"preventDuplicates": false,
		"onclick": null,
		"showDuration": "300",
		"hideDuration": "1000",
		"timeOut": "5000",
		"extendedTimeOut": "1000",
		"showEasing": "swing",
		"hideEasing": "linear",
		"showMethod": "fadeIn",
		"hideMethod": "fadeOut"
	}

	<?php if ($this->session->flashdata('success')) { ?>
		toastr.success("<?php echo $this->session->flashdata('success'); ?>");
	<?php } else if ($this->session->flashdata('error')) {  ?>
		toastr.error("<?php echo $this->session->flashdata('error'); ?>");
	<?php } else if ($this->session->flashdata('warning')) {  ?>
		toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
	<?php } else if ($this->session->flashdata('info')) {  ?>
		toastr.info("<?php echo $this->session->flashdata('info'); ?>");
	<?php } ?>
	$('.validation-errors > p').delay(3000).fadeOut(800);
</script>

</body>

</html>
