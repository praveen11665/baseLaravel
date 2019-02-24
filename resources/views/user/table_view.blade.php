@extends('layouts.app_layout')

@section('content')	
<h6 class="element-header">User Management</h6>
<div class="row">
	<div class="col-md-12">
		<div class="element-box">
			<h5 class="form-header">User List</h5><hr>				
			<table class="table table-hover table-bordered" id="dataTable">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Created On</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($userData as $user)
					<tr>
						<th>{{$user->name}}</th>
						<th>{{$user->email}}</th>
						<th>{{ date('F j, Y h:i A', strtotime($user->created_at)) }}</th>
						<th>
							<a href="#" title="Edit" data-toggle="tooltip"><i class="fa fa-edit"></i></a>
							&nbsp;&nbsp;
							<a href="#" title="Delete" data-toggle="tooltip" onclick="deleteUser()"><i class="fa fa-trash"></i></a>
						</th>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready( function () {
		$('#dataTable').DataTable();
	} );

	function deleteUser() {
		strawberry.dialog.confirm({
			title:'Delete this User',
			body:'Are you sure you want delete this user??',
			yes:confirmYes
		})

		function confirmYes() {
			// body...
		}
	}

</script>
@endsection