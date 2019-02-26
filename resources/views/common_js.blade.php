<script type="text/javascript">

  $(document).ready(function(){
      //User Time Greeting
      const date = new Date;
      let hours  = date.getHours();

      if(hours >= 5 && hours <= 12)
      {
        $('.user-greeting').html('<i class="fas fa-sun"></i> Good Morning, ');
        status = 'Good Morning';
      }else if(hours > 12 && hours <= 17)
      {
        $('.user-greeting').html('<i class="fas fa-sun"></i> Good Afternoon, ');
      }else if(hours > 17 && hours <= 20)
      {
        $('.user-greeting').html('<i class="fas fa-cloud-sun"></i> Good Evening, ');
      }else
      {
        $('.user-greeting').html('Hi, ');
      }      

      var sidebar_height = $('#sidebar-wrapper').innerHeight();

      if($('#sidebar-wrapper').find('.active').length > 0){
            var menu_active_height = $('#sidebar-wrapper').find('.active').offset().top + $('#sidebar-wrapper').find('.active').innerHeight();
      
            if(menu_active_height > sidebar_height){
              console.log($('#sidebar-wrapper').find('.active').offset().top)
              $('#sidebar-wrapper').scrollTop($('#sidebar-wrapper').find('.active').offset().top);
            }
      }

      //Datatable
      $('#dataTable').DataTable();
  }) 

  //Add new popup
  function addNewPop(addFormUrl, pkey)
  {
    $.ajax({
    type: "GET",
    url: addFormUrl,
    data: {'pkey_id' : pkey},
    dataType:"html",
        success: function(html1)
        {      
          if(html1 != 'success')
          {
            // assigning modal title from parameter
            $("#form-modal-body").html("<p>"+html1+"</p>"); // msg in modal body
            $("#form-modal").modal("show"); // show modal instead alert box
          }
        },
    });
  }

  function commonDeleteItem(alertTitle, alertBody, successTitle, successCls, deleteUrl) {

    strawberry.dialog.confirm({
      title: (alertTitle) ? alertTitle : 'Delete this item',
      body:(alertBody) ? alertBody : 'Are you sure you want delete this item??',
      yes:confirmYes
    })

    function confirmYes() {
      $.ajax({
        type: "GET",
        url: deleteUrl,
        success: function()
        {
          location.reload();
          strawberry.toast.show(successTitle, successCls);
        },
      });
    }
  }

	// When the form is submitted
  $("#ajaxModelForm").submit(function()
  {
    	// 'this' refers to the current submitted form 
      /*var str       = $(this).serialize();
      var $btn = $(document.activeElement);*/
      event.preventDefault();
      var actionUrl = $(this).data('action');
      var formData  = new FormData(this); 
      $.ajax({
      type: "POST",
      url: actionUrl, 
      data: formData,
      processData: false,
      contentType: false,
        success: function(html1)
        {
          try 
          {
            var parsedJson = JSON.parse(html1);
            if(parsedJson.result == 'success')
            {
              var parsedJson = JSON.parse(html1);
              $('#form-modal').modal('hide');
              location.reload();

              strawberry.toast.show("Information saved sucessfully", "success");
            }       
          } 
          catch(e) 
          {
            $("#form-modal-body").html("<p>"+html1+"</p>"); // msg in modal body
            $("#form-modal").modal("show"); // show modal instead alert box
          }
        },
      });
  }); // end submit event 

  $('.form-control').keyup(function(){
  	$('.form_submit').addClass('btn-flash');
  })
</script>