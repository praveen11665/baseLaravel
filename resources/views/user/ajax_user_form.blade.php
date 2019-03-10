@php
	$user_id    = '';
	$name  		= '';
	$email 		= '';

	if(!empty($formData))
	{
		foreach($formData as $user)
		{
			$user_id    = $user->id;
			$name  		= $user->name;
			$email 		= $user->email;
		}
	}
@endphp
<div class="row">
	<div class="col-md-12">	
		<form action="javascript:" data-action="{{ route('user_form') }}" method="post" id="ajaxModelForm" autocomplete="off">
			<input type="hidden" name="user_id" id="user_id" value="{{$user_id}}">
			<div class="row">
				<div class="col-md-12">
					<label>Name</label>
					<input type="text" class="form-control" name="name" id="name" value="{{$name}}">
					<span class="help-block">{{ isset($error) ? isset($error['name']['0']) ? $error['name']['0'] :'' : '' }}</span>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-12">
					<label>Email</label>
					<input type="email" class="form-control" name="email" id="email" value="{{$email}}" {{($user_id) ? 'readonly' : ''}}>
					<span class="help-block">{{ isset($error) ? isset($error['email']['0']) ? $error['email']['0'] :'' : '' }}</span>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-12">
					<label>Password</label>
					<input type="password" class="form-control" name="password" id="password" value="" onkeyup="CheckPasswordStrength(this.value)">
					<span class="help-block">{{ isset($error) ? isset($error['password']['0']) ? $error['password']['0'] :'' : '' }}</span>
					<br>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <span id="password_strength"></span>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-12">
					<label>Confirm Password</label>
					<input type="password" class="form-control" name="password-confirm" id="password-confirm" value="">
					<span class="help-block">{{ isset($error) ? isset($error['password-confirm']['0']) ? $error['password-confirm']['0'] :'' : '' }}</span>
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