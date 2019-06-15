<table class="table table-no-border shadow-sm mb-0" id="dataTable">
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
		<td>{{$user->name}}</td>
		<td>{{$user->email}}</td>
		<td>{{ date('F j, Y h:i A', strtotime($user->created_at)) }}</td>
		<td>
			<button class="btn btn-outline-primary flex-fill border-0" data-toggle="tooltip" title="Edit" onclick="addNewPop('{{route("user_form")}}', '{{$user->id}}', 'Edit User')">
              <i class="fas fa-pencil-alt"></i>
            </button>
            @php($deleteRoute = route('delete_user', [$user->id]))
            <button class="btn btn-outline-danger flex-fill border-0" data-toggle="tooltip" title="Delete" onclick="commonDeleteItem('Delete this user', 'Are you sure you want delete this user??', 'User deleted Sucessfully!', 'primary', '{{$deleteRoute}}', '{{route("user")}}')">
              <i class="fas fa-trash"></i>
            </button>
		</td>						
	</tr>
	@endforeach
</tbody>
</table>