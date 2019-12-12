<div class="row">
	<div class="col-md-3 stretch-card grid-margin">
		<div class="card bg-gradient-primary border-0 text-white p-3">
			<div class="card-body">
				<div class="d-flex align-items-start">
					<i class="mdi mdi-currency-usd mdi-48px"></i>
					<div class="ml-4">
						<h2 class="mb-2"><?= $totalhariini?></h2>
						<h4 class="mb-0">Hari Ini</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3 stretch-card grid-margin">
		<div class="card bg-gradient-success border-0 text-white p-3">
			<div class="card-body">
				<div class="d-flex align-items-start">
					<i class="mdi mdi-cards-outline mdi-48px"></i>
					<div class="ml-4">
						<h2 class="mb-2"><?= $laporclose?></h2>
						<h4 class="mb-0">Selesai</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3 stretch-card grid-margin">
		<div class="card bg-gradient-danger border-0 text-white p-3">
			<div class="card-body">
				<div class="d-flex align-items-start">
					<i class="mdi mdi-cards-outline mdi-48px"></i>
					<div class="ml-4">
						<h2 class="mb-2"><?= $laporopen?></h2>
						<h4 class="mb-0">Open</h4>
					</div>
				</div>
			</div>
		</div>
	</div>	
	<div class="col-md-3 stretch-card grid-margin">
		<div class="card bg-gradient-success border-0 text-white p-3">
			<div class="card-body">
				<div class="d-flex align-items-start">
					<i class="mdi mdi-chart-line mdi-48px"></i>
					<div class="ml-4">
						<h2 class="mb-2"><?= $totallapor?></h2>
						<h4 class="mb-0">Total Laporan</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-8 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title clearfix">Tickets
					<span class="float-right text-primary text-small">
						view all
					</span>
				</h4>
				<div class="d-flex align-items-start border-bottom py-4">
					<div class="form-check my-0">
						<label class="form-check-label">
							<input type="checkbox" class="form-check-input">
						</label>
					</div>
					<div class="flex-grow-1">
						<h6>
							Summarize the points in meeting
						</h6>
						<p class="text-muted mb-0">Due on 12 am 27 Jun, 2018</p>
					</div>
					<div class="ml-auto">
						<label class="badge badge-gradient-danger">High</label>
					</div>
				</div>
				<div class="d-flex align-items-start border-bottom py-4">
					<div class="form-check my-0">
						<label class="form-check-label">
							<input type="checkbox" class="form-check-input" checked>
						</label>
					</div>
					<div class="flex-grow-1">
						<h6>
							Renew the network plans
						</h6>
						<p class="text-muted mb-0">Due on 6 am 28 Jun, 2018</p>
					</div>
					<div class="ml-auto">
						<label class="badge badge-gradient-warning">Low</label>
					</div>
				</div>
				<div class="d-flex align-items-start border-bottom py-4">
					<div class="form-check my-0">
						<label class="form-check-label">
							<input type="checkbox" class="form-check-input">
						</label>
					</div>
					<div class="flex-grow-1">
						<h6>
							Plan project release date
						</h6>
						<p class="text-muted mb-0">Due 0n 5 pm 29 Jun, 2018</p>
					</div>
					<div class="ml-auto">
						<label class="badge badge-gradient-danger">High</label>
					</div>
				</div>
				<div class="d-flex align-items-start border-bottom py-4">
					<div class="form-check my-0">
						<label class="form-check-label">
							<input type="checkbox" class="form-check-input">
						</label>
					</div>
					<div class="flex-grow-1">
						<h6>
							Review the new app
						</h6>
						<p class="text-muted mb-0">Due 0n 3 pm 25 Jun, 2018</p>
					</div>
					<div class="ml-auto">
						<label class="badge badge-gradient-info">Medium</label>
					</div>
				</div>
			</div>
		</div>		
	</div>
	<div class="col-4 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Notifications</h4>
				<div class="d-flex py-4 border-bottom">
					<div class="mr-3 bg-gradient-success icon-in-bg rounded-circle text-white">
						<i class="mdi mdi-mouse-off"></i>
					</div>
					<div class="flex-grow-1">
						<h6 class="mb-2">You got 10 views</h6>
						<p class="text-muted mb-0">10 hrs ago</p>
					</div>
				</div>
				<div class="d-flex py-4 border-bottom">
					<div class="mr-3 bg-gradient-info icon-in-bg rounded-circle text-white">
						<i class="mdi mdi-database"></i>
					</div>
					<div class="flex-grow-1">
						<h6 class="mb-2">Boost your performance</h6>
						<p class="text-muted mb-0">4 hrs ago</p>
					</div>
				</div>
				<div class="d-flex py-4">
					<div class="mr-3 bg-gradient-danger icon-in-bg rounded-circle text-white">
						<i class="mdi mdi-alert"></i>
					</div>
					<div class="flex-grow-1">
						<h6 class="mb-2">Subscription ends today</h6>
						<p class="text-muted mb-0">2 hrs ago</p>
					</div>
				</div>
			</div>
		</div>
	</div>		
</div>
<?php include 'action.js'; ?>