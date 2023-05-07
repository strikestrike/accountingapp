<!-- Required vendors -->
<script src="<?= base_url() ?>assets/vendor/global/global.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/just-validate/package/dist/just-validate.production.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/toastr/js/toastr.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jQuery-date-dropdown/dist/jquery.date-dropdowns.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/Form-Fields-Repeater/repeater.js"></script>
<script src="<?= base_url() ?>assets/js/repeater.js"></script>
<script src="<?= base_url(); ?>assets/vendor/select2/js/select2.min.js"></script>

<script src="<?= base_url(); ?>assets/vendor/moment/moment.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
<script src="<?= base_url(); ?>assets/js/plugins-init/material-date-picker-init.js"></script>

<script src="<?= base_url() ?>assets/js/custom.min.js"></script>
<script src="<?= base_url() ?>assets/js/deznav-init.js"></script>
<script src="<?= base_url() ?>assets/js/demo.js"></script>
<script src="<?= base_url() ?>assets/js/styleSwitcher.js"></script>
<script>
	$('.select2').select2();
</script>
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
