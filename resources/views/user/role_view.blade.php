@extends('layouts.app_layout')

@section('content')	
<button class="btn btn-outline-primary float-right btn-add-new" onclick="addNewPop('{{route("role_form")}}')"><i class="fa fa-plus"></i>  New</button>
<div class="row">
	<div class="col-md-12">
		<h6 class="element-header">Role Management</h6>		
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="element-box">
			<h5 class="form-header">Role List</h5><hr>
			<table class="table table-hover table-bordered" id="dataTable">
				<thead>
					<tr>
						<th>Role Name</th>
						<th>Created At</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($roleData as $role)
					<tr>
						<th>{{$role->role_name}}</th>
						<th>{{ date('F j, Y h:i A', strtotime($role->created_at)) }}</th>
						<th>
							<a href="#" title="Edit" data-toggle="tooltip" onclick="addNewPop('{{route("role_form")}}', '{{$role->role_id}}')"><i class="fa fa-edit"></i></a>
							&nbsp;&nbsp;
							@php($deleteRoute = route('delete_role', [$role->role_id]))
							<a href="#" title="Delete" data-toggle="tooltip" onclick="commonDeleteItem('Delete this role', 'Are you sure you want delete this role??', 'Sucessfully deleted role', 'primary', '{{$deleteRoute}}')"><i class="fa fa-trash"></i></a>
						</th>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection