@php
	$role_id   = '';
	$role_name = '';

	if(!empty($formData))
	{
		foreach($formData as $role)
		{
			$role_id   = $role->role_id;
			$role_name = $role->role_name;
		}
	}
@endphp
<div class="row">
	<div class="col-md-12">		
		<form action="javascript:" data-action="{{ route('role_form') }}" method="post" id="ajaxModelForm" autocomplete="off">
			<input type="hidden" name="role_id" id="role_id" value="{{$role_id}}" x-webkit-speech>
			<div class="row">
				<div class="col-md-12">
					<label>Role Name</label>
					<input type="text" class="form-control" name="role_name" id="role_name" value="{{$role_name}}">
					<i class="fas fa-microphone shadow" data-toggle="tooltip" title="Alert, Set up your mic for speech recognition, It's working on HTTPS and localhost" onclick="startRecognition('role_name')"></i>
					<span class="help-block">{{ isset($error) ? $error['0'] : '' }}</span>
				</div>
			</div>
			<hr>
			<div class="form-buttons">
				<button class="btn btn-outline-success form_submit" type="submit" data-msg="Role created successfully" data-alert-class="success">Save</button>
				<button data-dismiss="modal" class="btn btn-outline-danger form_cancel" data-alert-msg="Role cacelled by user" data-alert-class="primary">Cancel</button>
			</div>
		</form>
	</div>
</div> 
@php(require_once(base_path().'\resources\views\common_js.blade.php'))