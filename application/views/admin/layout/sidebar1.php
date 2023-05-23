<!-----Start: Sidebar------>
<div class="deznav">
	<div class="deznav-scroll-in"></div>

	<div class="dez-scroll">
		<a class="btn" data-bs-toggle="collapse" href="#collapsedez">
			<span id="active-dez" style="font-size: 16px;"></span>
			<span>From 190 RON</span>
		</a>

		<div id="collapsedez" class="collapse">
			<ul>
				<li id="system-configuration">
					<a href="<?php echo base_url() . 'admin/system_configration' ?>" class="ai-icon" aria-expanded="false">
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input" value="">
							</label>
						</div>
						System Configration
						<span>From 190 Ron</span>
					</a>
				</li>
				<li id="pricing">
					<a href="<?php echo base_url() . 'admin/pricing' ?>" class="ai-icon" aria-expanded="false">
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input" value="">
							</label>
						</div>
						Pricing
						<span>From 190 Ron</span>
					</a>
				</li>
				<li id="ong-list">
					<a href="<?php echo base_url() . 'admin/ong' ?>" class="ai-icon" aria-expanded="false">
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input" value="">
							</label>
						</div>
						ONG List
						<span>From 190 Ron</span>
					</a>
				</li>
				<li id="client-list">
					<a href="<?php echo base_url() . 'admin/client' ?>" class="ai-icon" aria-expanded="false">
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input" value="">
							</label>
						</div>
						Client List
						<span>From 190 Ron</span>
					</a>
				</li>
				<li id="county-list">
					<a href="<?php echo base_url() . 'admin/county' ?>" class="ai-icon" aria-expanded="false">
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input" value="">
							</label>
						</div>
						Counties & Localities
						<span>From 190 Ron</span>
					</a>
				</li>
				<li id="caen-list">
					<a href="<?php echo base_url() . 'admin/caen' ?>" class="ai-icon" aria-expanded="false">
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input" value="">
							</label>
						</div>
						CAEN Codes
						<span>From 190 Ron</span>
					</a>
				</li>
			</ul>
		</div>
	</div>


	<div class="deznav-scroll d-md-block d-none">
		<div class="deznav-scroll-wrp has-footer">
			<div class="copyright m-0 py-2 px-5 d-flex align-items-center">
				<img src="<?= base_url() ?>assets/img/note.png" alt="income type">
				<h5 class="mb-0 text-black">Income Type</h5>
			</div>
			<div class="menu-blu">
				<h4>Select one or more income sources</h4>
				<a class="video-btn" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addProjectSidebar">
					<img src="<?= base_url() ?>assets/img/paly.png" alt="play btn">
					<span>Video Example</span>
				</a>
			</div>

			<ul class="metismenu sidemenu" id="menu">
				<li class="<?php if ($this->uri->segment(1) == "personal_data") {
								echo 'class="mm-active"';
							} ?>">
					<a href="<?php echo base_url() . 'admin/system_configration' ?>" class="ai-icon" aria-expanded="false">
						<!-- <div class="form-check checkbox55">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input" value="">
							</label>
						</div> -->
						<span class="nav-text">System Configuration</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url() . 'admin/pricing' ?>" class="ai-icon" aria-expanded="false">
						<!-- <div class="form-check checkbox55">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input" value="">
							</label>
						</div> -->
						<span class="nav-text">Pricing</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url() . 'admin/ong' ?>" class="ai-icon" aria-expanded="false">
						<!-- <div class="form-check checkbox55">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input" value="">
							</label>
						</div> -->
						<span class="nav-text">ONG List</span>
						<!-- <div class="nov-sub-text">From 190 Ron</div> -->
					</a>
				</li>
				<li>
					<a href="<?php echo base_url() . 'admin/client' ?>" class="ai-icon" aria-expanded="false">
						<!-- <div class="form-check checkbox55">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input" value="">
							</label>
						</div> -->
						<span class="nav-text">Client List</span>
						<!-- <div class="nov-sub-text">From 190 Ron</div> -->
					</a>
				</li>
				<li>
					<a href="<?= base_url() . 'admin/county' ?>" class="ai-icon" aria-expanded="false">
						<!-- <div class="form-check checkbox55">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input" value="">
							</label>
						</div> -->
						<span class="nav-text">Judete si localitati</span>
						<!-- <div class="nov-sub-text">From 190 Ron</div> -->
					</a>
				</li>
				<li>
					<a href="<?= base_url() . 'admin/caen' ?>" class="ai-icon" aria-expanded="false">
						<!-- <div class="form-check checkbox55">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input" value="">
							</label>
						</div> -->
						<span class="nav-text">Coduri CAEN</span>
						<!-- <div class="nov-sub-text">From 190 Ron</div> -->
					</a>
				</li>
				<li>
					<a href="<?= base_url() ?>admin/variables" class="ai-icon" aria-expanded="false">
						<!-- <div class="form-check checkbox55">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input" value="">
							</label>
						</div> -->
						<span class="nav-text">Lista variabile</span>
						<!-- <div class="nov-sub-text">From 190 Ron</div> -->
					</a>
				</li>
				<li>
					<a href="<?= base_url() ?>admin/income_norms" class="ai-icon" aria-expanded="false">
						<!-- <div class="form-check checkbox55">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input" value="">
							</label>
						</div> -->
						<span class="nav-text">Import valori norme de venit</span>
						<!-- <div class="nov-sub-text">From 190 Ron</div> -->
					</a>
				</li>
				<li>
					<a href="<?= base_url() ?>admin/correction_coefficients" class="ai-icon" aria-expanded="false">
						<!-- <div class="form-check checkbox55">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input" value="">
							</label>
						</div> -->
						<span class="nav-text">Coeficienti de corectie</span>
						<!-- <div class="nov-sub-text">From 190 Ron</div> -->
					</a>
				</li>
				<li>
					<a href="<?= base_url() ?>admin/blocks" class="ai-icon" aria-expanded="false">
						<!-- <div class="form-check checkbox55">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input" value="">
							</label>
						</div> -->
						<span class="nav-text">Block-uri cu informatii</span>
						<!-- <div class="nov-sub-text">From 190 Ron</div> -->
					</a>
				</li>
				<li>
					<a href="<?= base_url() ?>admin/fieldmappings" class="ai-icon" aria-expanded="false">
						<!-- <div class="form-check checkbox55">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input" value="">
							</label>
						</div> -->
						<span class="nav-text">Field Mappings</span>
						<!-- <div class="nov-sub-text">From 190 Ron</div> -->
					</a>
				</li>
				<li>
					<a href="<?= base_url() ?>admin/mappingrule" class="ai-icon" aria-expanded="false">
						<!-- <div class="form-check checkbox55">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input" value="">
							</label>
						</div> -->
						<span class="nav-text">Mappings Rule</span>
						<!-- <div class="nov-sub-text">From 190 Ron</div> -->
					</a>
				</li>
				<li>
					<a href="<?= base_url() ?>admin/country" class="ai-icon" aria-expanded="false">
						<!-- <div class="form-check checkbox55">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input" value="">
							</label>
						</div> -->
						<span class="nav-text">Country List</span>
						<!-- <div class="nov-sub-text">From 190 Ron</div> -->
					</a>
				</li>
			</ul>

		</div>
	</div>
</div>
<!-----End: Sidebar------>
<script>
	var baseURL = "<?= base_url() ?>";
	const navLinksData = {
		"System Configuration": baseURL + "admin/system_configration",
		"Pricing": baseURL + "admin/pricing",
		"ONG List": baseURL + "admin/ong",
		"Client List": baseURL + "admin/client",
		"Judete si localitati": baseURL + "admin/county",
		"Coduri CAEN": baseURL + "admin/caen",
	}
	// console.log(navLinksData);
	window.addEventListener('load', function() {
		var activeLink = window.location.href;
		for (const key in navLinksData) {
			if (navLinksData.hasOwnProperty(key)) {
				if (navLinksData[key] == activeLink) {
					$("#active-dez").html(key)
					$("#" + createSlug(key)).hide();
				}
			}
		}
	})
</script>
<script>
	const createSlug = str =>
		str
		.toLowerCase()
		.trim()
		.replace(/[^\w\s-]/g, '')
		.replace(/[\s_-]+/g, '-')
		.replace(/^-+|-+$/g, '');
</script>
