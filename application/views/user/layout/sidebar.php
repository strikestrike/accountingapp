<!-----Start: Sidebar------>
<div class="deznav">
	<div class="deznav-scroll-in"></div>

	<div class="dez-scroll">
		<a class="btn" data-bs-toggle="collapse" href="#collapsedez">
			<span id="active-dez" style="font-size: 16px;">Select Income</span>
			<span>From 190 RON</span>
		</a>

		<div id="collapsedez" class="collapse sidebarDisabled">
			<ul>
				<li>
					<a href="<?= base_url().'user/rentalIncome' ?>" class="ai-icon" aria-expanded="false">
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input" value="">
							</label>
						</div>
						Rental
						<span>From 190 Ron</span>
					</a>
				</li>
				<li>
					<a href="<?= base_url().'user/dividentsIncome' ?>" class="ai-icon" aria-expanded="false">
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input" value="">
							</label>
						</div>
						Dividents
						<span>From 190 Ron</span>
					</a>
				</li>
				<li>
					<a href="<?= base_url('user/stocksIncome') ?>" class="ai-icon" aria-expanded="false">
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input" value="">
							</label>
						</div>
						Stock
						<span>From 190 Ron</span>
					</a>
				</li>
				<li>
					<a href="<?= base_url('user/cryptoIncome')?>" class="ai-icon" aria-expanded="false">
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input" value="">
							</label>
						</div>
						Crypto
						<span>From 190 Ron</span>
					</a>
				</li>
				<li>
					<a href="<?= base_url('user/hotelRegimIncome')?>" class="ai-icon" aria-expanded="false">
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input" value="">
							</label>
						</div>
						Hotel Regim
						<span>From 190 Ron</span>
					</a>
				</li>
				<li>
					<a href="<?= base_url('user/normaIncome')?>" class="ai-icon" aria-expanded="false">
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input" value="">
							</label>
						</div>
						Norma de Venit
						<span>From 190 Ron</span>
					</a>
				</li>
			</ul>
		</div>
	</div>


	<div class="deznav-scroll d-md-block d-none sidebarDisabled">
		<div class="deznav-scroll-wrp">



			<div class="menu-blu">
				<h4>Select one or more income sources</h4>
				<a class="video-btn" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addProjectSidebar">
					<img src="<?= base_url() ?>assets/img/paly.png" alt="play btn">
					<span>Video Example</span>
				</a>
			</div>

			<ul class="metismenu" id="menu">
				<li>
					<a href="<?= base_url().'user/rentalIncome' ?>" class="ai-icon" aria-expanded="false">
						<div class="form-check checkbox55">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input" value="">
							</label>
						</div>
						<span class="nav-text">Rental</span>
						<div class="nov-sub-text">From 190 Ron</div>
					</a>
				</li>
				<li>
					<a href="<?= base_url().'user/dividentsIncome' ?>" class="ai-icon" aria-expanded="false">
						<div class="form-check checkbox55">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input" value="">
							</label>
						</div>
						<span class="nav-text">Dividents</span>
						<div class="nov-sub-text">From 190 Ron</div>
					</a>
				</li>
				<li>
					<a href="<?= base_url('user/stocksIncome') ?>" class="ai-icon" aria-expanded="false">
						<div class="form-check checkbox55">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input" value="">
							</label>
						</div>
						<span class="nav-text">Stock</span>
						<div class="nov-sub-text">From 190 Ron</div>
					</a>
				</li>
				<li>
					<a href="<?= base_url('user/cryptoIncome')?>" class="ai-icon" aria-expanded="false">
						<div class="form-check checkbox55">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input" value="">
							</label>
						</div>
						<span class="nav-text">Crypto</span>
						<div class="nov-sub-text">From 190 Ron</div>
					</a>
				</li>
				<li>
					<a href="hotelRegimIncome" class="ai-icon" aria-expanded="false">
						<div class="form-check checkbox55">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input" value="">
							</label>
						</div>
						<span class="nav-text">Hotel Regim</span>
						<div class="nov-sub-text">From 190 Ron</div>
					</a>
				</li>
				<li>
					<a href="<?= base_url() ?>user/normaIncome" class="ai-icon" aria-expanded="false">
						<div class="form-check checkbox55">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input" value="">
							</label>
						</div>
						<span class="nav-text">Norma de venit</span>
						<div class="nov-sub-text">From 190 Ron</div>
					</a>
				</li>
			</ul>
			<!-- <div class="deznav-footer">
                        <div class="d-flex justify-content-between align-items-center">
                            <button class="btn btn-primary font-weight-bold"><i class="fas fa-sliders-h"></i>Brief</button>
                            <button class="btn btn-primary font-weight-bold">Generate More</button>
                            <div class="d-flex align-items-center">
                                <input class="form-control" value="5" type="number" id="sidebar_number">
                                <input class="form-control" value="EN" type="text" id="language_number">
                            </div>
                        </div>
                    </div> -->
		</div>
	</div>

	<div class="side-selection d-md-none d-block">

	</div>
</div>
<!-----End: Sidebar------>
