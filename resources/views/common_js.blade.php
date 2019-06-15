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
      $('#dataTable_filter').find('input').addClass('search-control-sm');
      $('.dataTables_length').find('select').addClass('form-control-sm');
      $('#dataTable_info').addClass('text-info');
      $('.paginate_button').addClass('btn btn-outline-dark').removeClass('paginate_button');
  }) 

  //Add new popup
  function addNewPop(addFormUrl, pkey, modelTitle='')
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
            if(modelTitle)
              $('.modal-title').text(modelTitle);
            // assigning modal title from parameter
            $("#form-modal-body").html("<p>"+html1+"</p>"); // msg in modal body
            $("#form-modal").modal("show"); // show modal instead alert box
            strawberry.tooltipToggler();
          }
        },
    });
  }

  function commonDeleteItem(alertTitle, alertBody, successTitle, successCls, deleteUrl, contentUrl) {

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
          loadTableData();
          strawberry.toast.show(successTitle, successCls);
        },
      });
    }
  }

	// When the form is submitted
  $("#ajaxModelForm").submit(function()
  {
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
            //location.reload();

            loadTableData(parsedJson.loadContentURL);
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

  function loadTableData(loadContentURL) {
    $.ajax({
              type: "GET",
              url: loadContentURL,
              data: {'loadContent' : 1},
              dataType:"html",
                  success: function(html1)
                  { 
                    var table = $('#dataTable').DataTable();
                    table.destroy(); 

                    $('#dataTable').html(html1);
                    $('#dataTable').DataTable();
                  },
          });
  }

  $('.form-control').keyup(function(){
  	$('.form_submit').addClass('btn-flash');
  })

  //PASSWORD STRENGTH
  function CheckPasswordStrength(password) {
      var password_strength = document.getElementById("password_strength");

      //TextBox left blank.
      if (password.length == 0) {
          password_strength.innerHTML = "";
          $('.progress-bar').css('width', '0%'); 
          return;
      }

      //Regular Expressions.
      var regex = new Array();
      regex.push("[A-Z]"); //Uppercase Alphabet.
      regex.push("[a-z]"); //Lowercase Alphabet.
      regex.push("[0-9]"); //Digit.
      regex.push("[$@$!%*#?&]"); //Special Character.

      var passed = 0;

      //Validate for each Regular Expression.
      for (var i = 0; i < regex.length; i++) {
          if (new RegExp(regex[i]).test(password)) {
              passed++;
          }
      }

      //Validate for length of Password.
      if (passed > 2 && password.length > 8) {
          passed++;
      }

      //Display status.
      var color    = "";
      var strength = "";        
      var progressWidth    = "0%"; 
      switch (passed) {
          case 0:
          case 1:
              strength = "Weak";
              color    = "red";
              progressWidth    = "20%";
              break;
          case 2:
              strength = "Good";
              color    = "darkorange";
              progressWidth    = "50%";
              break;
          case 3:
          case 4:
              strength = "Strong";
              color    = "green";
              progressWidth    = "80%";
              break;
          case 5:
              strength = "Very Strong";
              color    = "darkgreen";
              progressWidth    = "100%";
              break;
          default:
              progressWidth    = "0%";
      }

      password_strength.innerHTML   = strength;
      password_strength.style.color = color; 

      //Progress Bar
      $('.progress-bar').css('background-color', color);      
      $('.progress-bar').css('width', progressWidth);      
  }

  //SPEECH RECONGINITION
  function startRecognition(inputId) {
    var recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition || window.mozSpeechRecognition || window.msSpeechRecognition)();

    recognition.lang = 'en-US';
    recognition.interimResults = false;
    recognition.start();

    recognition.onresult = function(event) {
      var _result = event.results[0][0].transcript;
      $('#'+inputId).val(_result);
      $('.form_submit').addClass('btn-flash');
    };

    recognition.onerror = function(event) {
        console.log(event.error);
    };
  }
</script>