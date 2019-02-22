@extends('layouts.app_layout')

@section('content')
	<style type="text/css">
		.col-auto {
    width: auto;
    max-width: none;
    flex: 0 0 auto;
    padding: 0px;
}

.icon-shape {
    display: inline-flex;
    padding: 12px;
    text-align: center;
    border-radius: 50%;
    align-items: center;
    justify-content: center;
}
.icon {
    width: 3rem;
    height: 3rem;
}
.text-white {
    color: #fff !important;
}

.rounded-circle {
    border-radius: 50% !important;
}
.bg-warning {
    background-color: #fb6340 !important;
}

.icon-shape svg {
    font-size: 1.25rem;
}
	</style>
    <h3>Dashboard</h3>
  	<div class="header pb-8 pt-5 pt-md-8">
    	<div class="container-fluid">
      		<div class="header-body">
        		<div class="row">
          			<div class="col-xl-3 col-lg-6">
            			<div class="card card-stats mb-4 mb-xl-0">
              				<div class="card-body">
                				<div class="row">
                  					<div class="col">
					                    <h5 class="card-title text-uppercase text-muted mb-0">Title 1</h5>
					                    <span class="h2 font-weight-bold mb-0">20</span>
					                 </div>
									<div class="col-auto">
										<div class="icon icon-shape bg-warning text-white rounded-circle shadow">
										<i class="fas fa-clock"></i>
										</div>
									</div>
                				</div>
				                <p class="mt-3 mb-0 text-muted text-sm">
				                  <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
				                  <span class="text-nowrap">Since last month</span>
				                </p>
              				</div>
            			</div>
          			</div>

          			<div class="col-xl-3 col-lg-6">
						<div class="card card-stats mb-4 mb-xl-0">
							<div class="card-body">
								<div class="row">
									<div class="col">
										<h5 class="card-title text-uppercase text-muted mb-0">Title 2</h5>
										<span class="h2 font-weight-bold mb-0">200</span>
									</div>
									<div class="col-auto">
										<div class="icon icon-shape bg-warning text-white rounded-circle shadow">
											<i class="fas fa-clock"></i>
										</div>
									</div>
								</div>
								<p class="mt-3 mb-0 text-muted text-sm">
								<span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
								<span class="text-nowrap">Since last week</span>
								</p>
							</div>
						</div>
					</div>

					<div class="col-xl-3 col-lg-6">
						<div class="card card-stats mb-4 mb-xl-0">
							<div class="card-body">
								<div class="row">
									<div class="col">
										<h5 class="card-title text-uppercase text-muted mb-0">Title 3</h5>
										<span class="h2 font-weight-bold mb-0">300</span>
									</div>
									<div class="col-auto">
										<div class="icon icon-shape bg-info text-white rounded-circle shadow">
											<i class="fas fa-cart-plus"></i>
										</div>
									</div>
								</div>
								<p class="mt-3 mb-0 text-muted text-sm">
								<span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
								<span class="text-nowrap">Since last month</span>
								</p>
							</div>
						</div>
					</div>

					<div class="col-xl-3 col-lg-6">
						<div class="card card-stats mb-4 mb-xl-0">
							<div class="card-body">
								<div class="row">
									<div class="col">
										<h5 class="card-title text-uppercase text-muted mb-0">Title 3</h5>
										<span class="h2 font-weight-bold mb-0">300</span>
									</div>
									<div class="col-auto">
										<div class="icon icon-shape bg-info text-white rounded-circle shadow">
											<i class="fas fa-cart-plus"></i>
										</div>
									</div>
								</div>
								<p class="mt-3 mb-0 text-muted text-sm">
								<span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
								<span class="text-nowrap">Since last month</span>
								</p>
							</div>
						</div>
					</div>
      			</div>
    		</div>
  		</div>
  	</div>
@endsection
