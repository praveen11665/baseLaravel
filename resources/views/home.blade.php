@extends('layouts.app_layout')

@section('content')
<script type="text/javascript" src="{{ asset('/js/views/home.js') }}" class="dynamic"></script>	
<h6 class="element-header">Dashboard</h6>

<div class="header pb-8 pt-md-8">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row">
				<div class="col-xl-3 col-lg-6">
					<div class="card card-stats mb-4 mb-xl-0">
						<div class="card-body">
							<div class="row">
								<div class="col">
									<h5 class="card-title text-uppercase text-muted mb-0">Title 1</h5>
									<span class="h2 font-weight-bold mb-0">100</span>
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
									<div class="icon icon-shape bg-info text-white rounded-circle shadow">
										<i class="fas fa-credit-card"></i>
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
									<div class="icon icon-shape bg-green text-white rounded-circle shadow">
										<i class="fas fa-thumbs-up"></i>
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
									<h5 class="card-title text-uppercase text-muted mb-0">Title 4</h5>
									<span class="h2 font-weight-bold mb-0">400</span>
								</div>
								<div class="col-auto">
									<div class="icon icon-shape bg-danger text-white rounded-circle shadow">
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

<h6 class="element-header mt-3">Sample Chart (Line)</h6>
<div class="row">
	<div class="col-12">
		<div class="card border-0 bg-white shadow-sm rounded">			
			<div class="card-body">
				<div class="position:relative" style="height:300px;width:100%">
					<div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
						<div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
							<div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0">	
							</div>
						</div>
						<div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
							<div style="position:absolute;width:200%;height:200%;left:0; top:0">
							</div>
						</div>
					</div>
					<canvas id="cnvATTR" style="display: block; width: 803px; height: 300px;" height="300" class="chartjs-render-monitor" width="803"></canvas>
				</div>
			</div>
		</div>
	</div>
</div>

<h6 class="element-header mt-3">Sample Chart (Bar)</h6>
<div class="row">
	<div class="col-12">
		<div class="card border-0 bg-white shadow-sm rounded">			
			<div class="card-body">
				<div class="position:relative" style="height:300px;width:100%">
					<div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
						<div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
							<div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0">	
							</div>
						</div>
						<div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
							<div style="position:absolute;width:200%;height:200%;left:0; top:0">
							</div>
						</div>
					</div>
					<canvas id="cnvMRR" style="display: block; width: 803px; height: 300px;" height="300" class="chartjs-render-monitor" width="803"></canvas>
				</div>
			</div>
		</div>
	</div>
</div>

<h6 class="element-header mt-3">Sample Chart (Pie)</h6>
<div class="row">
	<div class="col-12">
		<div class="card border-0 bg-white shadow-sm rounded">			
			<div class="card-body">
				<div class="position:relative" style="height:300px;width:100%">
					<div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
						<div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
							<div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0">	
							</div>
						</div>
						<div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
							<div style="position:absolute;width:200%;height:200%;left:0; top:0">
							</div>
						</div>
					</div>
					<canvas id="cnvARR" style="display: block; width: 803px; height: 300px;" height="300" class="chartjs-render-monitor" width="803"></canvas>					
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		window.workspaceScript.onLoad();
	})
</script>  	
@endsection
