        <!--**********************************
            Scripts
        ***********************************-->
        <!-- Required vendors -->
        <script src="<?= base_url(); ?>assets/vendor/global/global.min.js"></script>
        <script src="<?= base_url(); ?>assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    	<script src="<?= base_url(); ?>assets/vendor/toastr/js/toastr.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/custom.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/deznav-init.js"></script>
        <script src="<?= base_url(); ?>assets/js/demo.js"></script>
        <script src="<?= base_url(); ?>assets/js/styleSwitcher.js"></script>
    </body>
</html>
<script>
    setTimeout(function() {
        $(".alert").fadeOut(1500);
    }, 3000);
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
		
		<?php if($this->session->flashdata('success')){ ?>
			toastr.success("<?php echo $this->session->flashdata('success'); ?>");
		<?php }else if($this->session->flashdata('error')){  ?>
			toastr.error("<?php echo $this->session->flashdata('error'); ?>");
		<?php }else if($this->session->flashdata('warning')){  ?>
			toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
		<?php }else if($this->session->flashdata('info')){  ?>
			toastr.info("<?php echo $this->session->flashdata('info'); ?>");
		<?php } ?>
		$('.validation-errors > p').delay(3000).fadeOut(800);
	</script>
