@extends('layouts.app_layout')

@section('content')	
<h4 class="mt-0 border-bottom border-info border-2">
  User Management
  <button class="btn btn-sm btn-info float-right" onclick="addNewPop('{{route("user_form")}}')">
    <i class="fa fa-plus"></i> New
  </button>
</h4>
<div class="row">
	<div class="col-md-12">
		<div class="element-box">
			<h5 class="mt-0 border-2">User List</h5><hr>				
			{!! $tableContent !!}
		</div>
	</div>
</div>
@endsection