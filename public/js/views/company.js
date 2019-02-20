var oldCompanyName = $('#company_name').val();
var oldBudget 	   = $('#budget').val();

$('#companybasicDetails').submit(function(event){

	var _btn 		 = $('.btn-success');
	_btn.text('Saving... Please wait');
	_btn.addClass('btn-processing');	

	var company_name = $('#company_name').val();
	var budget 	     = $('#budget').val();
	var decimal    = /^(?![0.]+$)\d+(\.\d{1,2})?$/gm;

	if(!company_name)
	{
		strawberry.toast.show("Company name field is required", "danger");
		_btn.html('<i class="fas fa-check mr-1"></i>Save');
      	_btn.removeClass('btn-processing');
		return false;
	}else if(!budget)
	{
		strawberry.toast.show("Actual vs Budget field is required", "danger");
		_btn.html('<i class="fas fa-check mr-1"></i>Save');
      	_btn.removeClass('btn-processing');
		return false;
	}

	if(decimal.exec(budget) == null)
	{
		strawberry.toast.show("Please give a valid Actual vs Budget", "danger");
        _btn.html('<i class="fas fa-check mr-1"></i>Save');
      	_btn.removeClass('btn-processing');
		return false;
	}

	event.preventDefault();
    var formData = new FormData(this);    
    $.ajax({
	          url: WEBURL+'/company/save',
	          data: formData,
	          type: 'post',
	          processData: false,
	          contentType: false,
	          success:function(response){

	            if(response['logoPath'])
	            {
	              var logoPath = WEBURL+'/img/'+response['logoPath'];
	              $("#company-logo").attr("src", logoPath);
	              $("#company-logo").attr("width", "50%");
                  $("#removeLogoContent").show();
	            }

	            if(response['exist'])
	            {
      				strawberry.toast.show("Company name already exist", "danger");
	            }else
	            {
                	$('.global_company_name, .list_company_'+response.id).text(response.name);
                	_btn.html('<i class="fas fa-check mr-1"></i>Save');
      				_btn.removeClass('btn-processing');
                	$('#fsPolicy').prop('disabled', true);
                	$('[data-toggle=fieldset][data-target="#fsPolicy"]').show();
	            	strawberry.toast.show("Information saved successfully", "success");
	            }            
	          }
      	  });
});

$('#removeLogo').click(function(){
	
	strawberry.dialog.confirm({
		title: 'Deleting Company Logo',
		body : 'Are you sure to delete this logo?',
		yes  : confirmRemove,
	})

	function confirmRemove() 
	{
		$.ajax({
					url: WEBURL+'/company/remove_logo',
			        type: 'GET',
			        success: function(response) {
			          var logoPath = WEBURL+'/img/logo.png';
			          $("#company-logo").attr("src", logoPath);
			          $("#company-logo").attr("width", "");
                  	  $("#removeLogoContent").hide();
			        }
		       });		
	}
});

$('[data-toggle="fieldset-disable"]').click(function () {
	$("#company_name").val(oldCompanyName);
	$("#budget").val(oldBudget);
});