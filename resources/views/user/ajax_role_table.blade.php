<table class="table table-sm bg-white table-bordered shadow-sm mb-0" id="dataTable">
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
			<td>{{$role->role_name}}</td>
			<td>{{ date('F j, Y h:i A', strtotime($role->created_at)) }}</td>
			<td>
				<button class="btn btn-outline-primary flex-fill border-0" data-toggle="tooltip" title="Edit" onclick="addNewPop('{{route("role_form")}}', '{{$role->role_id}}', 'Edit Role')">
                  <i class="fas fa-pencil-alt"></i>
                </button>
                @php($deleteRoute = route('delete_role', [$role->role_id]))
                <button class="btn btn-outline-danger flex-fill border-0" data-toggle="tooltip" title="Delete" onclick="commonDeleteItem('Delete this role', 'Are you sure you want delete this role??', 'Role deleted sucessfully!', 'primary', '{{$deleteRoute}}', '{{route("role")}}')">
                  <i class="fas fa-trash"></i>
                </button>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>