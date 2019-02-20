

var slider;
var errorIndex = 0;

$(document).ready(function () {

  $('[data-toggle=tooltip]').tooltip();


  slider = $('.carousel').carousel({
    interval: false
  });



  slider.showBasic = function () {
    var _btn = $('#btnSaveBasic');
    _btn.html('<i class="fas fa-check mr-1"></i> Save and continue');
    _btn.removeClass('btn-processing');
    _btn.prop('diasbled', false);

    slider.carousel(0);
  }


  slider.showIndustry = function () {
    var _btn = $('#btnSaveIndustry');
    _btn.html('<i class="fas fa-check mr-1"></i> Save and continue');
    _btn.removeClass('btn-processing');
    _btn.prop('diasbled', false);
    slider.carousel(1);
  }


  slider.showBusiness = function () {
    var _btn = $('#btnSaveBusiness');
    _btn.html('<i class="fas fa-check mr-1"></i> Save and continue');
    _btn.removeClass('btn-processing');
    _btn.prop('diasbled', false);
    slider.carousel(2);
  }


  slider.showQB = function () {
    slider.carousel(3);
  }


  //Use this to show error message
  slider.showError = function (msg) {
    $('#lblError .text').text(msg);
    $('#lblError').slideToggle();
  }  

  $('#companybasicDetails').submit(function(event){
    var _btn = $('#btnSaveBasic');

    var company_name = $('#company_name').val();
    var budget       = $('#budget').val();
    var decimal    = /^(?![0.]+$)\d+(\.\d{1,2})?$/gm;

    _btn.text('Saving... Please wait');
    _btn.addClass('btn-processing');
    _btn.prop('diasbled', true);

    if(!company_name)
    {
      $('#lblErrorBasic').show();
      $('#lblErrorBasic').text('Company Name field is required');
      _btn.html('<i class="fas fa-check mr-2"></i>Save and Continue');
      _btn.removeClass('btn-processing');

      return false;
    }
    else if(!budget)
    {
      $('#lblErrorBasic').show();
      $('#lblErrorBasic').text('Actual vs Budget field is required');
      _btn.html('<i class="fas fa-check mr-2"></i>Save and Continue');
      _btn.removeClass('btn-processing');

      return false;
    }

    if(decimal.exec(budget) == null)
    {
      $('#lblErrorBasic').show();
      $('#lblErrorBasic').text('Please give a valid Actual vs Budget');
      _btn.html('<i class="fas fa-check mr-2"></i>Save and Continue');
      _btn.removeClass('btn-processing');

      return false;
    }

    event.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        url: WEBURL+'/company/save',
        data: formData,
        type: 'post',
        async: false,
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
            $('#lblErrorBasic').show();
            $('#lblErrorBasic').text('Company Name already exist');

            $('#btnSaveBasic').html('<i class="fas fa-check mr-2"></i>Save and Continue');
            $('#btnSaveBasic').removeClass('btn-processing');
          }else
          {
            $('#lblErrorBasic').hide();

            _btn.popover({
              html: true,
              content: "<i class='fas fa-check-circle mr-2'></i> Basic details saved successfully",
              trigger: 'focus',
              placement: 'top',
              template: '<div class="popover border-success" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'
            }).popover('show');

            setTimeout(function () {
              _btn.popover('dispose');
              slider.showIndustry();
            }, 2000);
          }              
        }
    });
  });

  $('#btnSaveIndustry,#btnSaveBusiness').click(function () {
    var _btn = $(this);

    _btn.text('Saving... Please wait');
    _btn.addClass('btn-processing');
    _btn.prop('diasbled', true);

    var vertical_type = $(this).attr('data-type');
    var verticalArr   = new Array();

    if(vertical_type == 1)
    {
      $('#clVerticalsSelected input[type=hidden]').each(function(){
        verticalArr.push($(this).val());
      })
    }else{
      $('#clModelsSelected input[type=hidden]').each(function(){
        verticalArr.push($(this).val());
      })
    }

    $.ajax({
              url: WEBURL+ '/company/industry',
              type: 'POST',
              data: {'verticalArr' : verticalArr, 'vertical_type' : vertical_type},
              success: function(response) {
                if(vertical_type == 1)
                {
                   _btn.popover({
                      html: true,
                      content: "<i class='fas fa-check-circle mr-2'></i> Industry details saved successfully",
                      trigger: 'focus',
                      placement: 'top',
                      template: '<div class="popover border-success" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'
                    }).popover('show');

                  setTimeout(function () {
                    _btn.popover('dispose');
                    slider.showBusiness();
                  }, 2000);
                }else
                {
                  _btn.popover({
                    html: true,
                    content: "<i class='fas fa-check-circle mr-2'></i> Busines models saved successfully",
                    trigger: 'focus',
                    placement: 'top',
                    template: '<div class="popover border-success" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'
                  }).popover('show');

                  setTimeout(function () {
                    _btn.popover('dispose');
                    slider.showQB();
                  }, 2000);
                }
              }
          }); 
  })

  /*$('#btnSaveBusiness').click(function () {
    var _btn = $(this);

    _btn.text('Saving... Please wait');
    _btn.addClass('btn-processing');
    _btn.prop('diasbled', true);

    setTimeout(function () {
      // _btn.html('<i class="fas fa-check mr-1"></i> Save and coninue');
      // _btn.removeClass('btn-processing');
      // _btn.prop('diasbled', false);

      _btn.popover({
        html: true,
        content: "<i class='fas fa-check-circle mr-2'></i> Busines models saved successfully",
        trigger: 'focus',
        placement: 'top',
        template: '<div class="popover border-success" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'
      }).popover('show');

      setTimeout(function () {
        _btn.popover('dispose');
        slider.showQB();
      }, 2000);

    }, 2000);
  })*/
  
  
  $('#clearAllIndustry,#clearAllModels').click(function () {
    var vertical_type = $(this).attr('data-type');
    var verticalArr   = new Array();

    $.ajax({
              url: WEBURL+ '/company/industry',
              type: 'POST',
              data: {'verticalArr' : verticalArr, 'vertical_type' : vertical_type},
              success: function(response) {
              }
          }); 
  })

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
  })


  $('.btn-qb').click(function () {
    console.log('Hiding first div showing second');
    $('#divQB_0').slideToggle();
    $('#divQB_1').slideToggle();

    /*setTimeout(function () {
      console.log('Hiding second div showing third');
      $('#divQB_1').slideToggle();
      $('#divQB_2').slideToggle();

      setTimeout(function () {
        console.log('Hiding third div showing fourth');
        $('#divQB_2').slideToggle();
        $('#divQB_3').slideToggle();

        setTimeout(function () {
          location.href = "/";
        }, 3000)

      }, 4000)
    }, 3000)*/

  })

  $('#btnLogout').click(function () {
    slider.showLogin();
  })

  $('.list-group-item-action').click(function () {
    window.location.href = "/";

  })

  $('#secIndustry .btn-back').click(slider.showBasic);
  $('#secBusiness .btn-back').click(slider.showIndustry);
  $('#secQB .btn-back').click(slider.showBusiness);

  $('.connected-available .list-group-item,.connected-selected .list-group-item').each(function () {
    $(this).append('<button class="float-right btn-move"><i class="fas fa-chevron-right"></i></button>');
  });

  $('.connected-available').on('click', '.btn-move', function () {
    var _item = $(this).closest('.list-group-item');
    $(this).closest('.connected-list').find('.connected-selected').append(_item);
  })

  $('.connected-selected').on('click', '.btn-move', function () {
    var _item = $(this).closest('.list-group-item');
    $(this).closest('.connected-list').find('.connected-available').append(_item);
  })

  $('.connected-list').on('click', '.btn-clear-all', function () {
    var _items = $(this).closest('.connected-list').find('.connected-selected .list-group-item');

    $(this).closest('.connected-list').find('.connected-available').append(_items);
  })

  $('.connected-list').on('click', '.btn-select-all', function () {
    var _items = $(this).closest('.connected-list').find('.connected-available .list-group-item');

    $(this).closest('.connected-list').find('.connected-selected').append(_items);
  })

  $("#clVerticals, #clVerticalsSelected").sortable({
    connectWith: ".verticals-sortable",
  }).disableSelection();


  $("#clModels, #clModelsSelected").sortable({
    connectWith: ".models-sortable",
  }).disableSelection();



})
