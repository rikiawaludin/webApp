<!-- Sidebar -->

<!-- End Sidebar -->

<div class="main-panel">
	<div class="content">
		<div class="panel-header bg-primary-gradient">
			<div class="page-inner py-5">
				<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
					<div>
						<h1 class="text-white pb-2 fw-bold">
							<?= $title; ?>
						</h1>
					</div>
				</div>
			</div>
		</div>
		<div class="page-inner mt--6">
			<div class="row">
				<div class="col-lg-8">
					<?= $this->session->flashdata('message'); ?>
				</div>
			</div>
		</div>

		<div class="page-inner mt--5">
			<div>
				<div class="card mb-3 col-lg-6">
					<div class="row g-0">
						<div class="col-md-6">
							<div class="card-body">
								<h4 class="card-title">
									Username:
									<?= $user['username']; ?>
								</h4> <br>
								<h4 class="card-title">
									Departemen ID:
									<?= $user['departemen_id']; ?>
								</h4> <br>
								<h4 class="card-title">
									Nama:
									<?= $user['name']; ?>
								</h4> <br>
								<p class="card-text">
									<i class="fas fa-envelope"></i>
									<?= $user['email'] ?> <br>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>