

  var refreshLinks = function () {
    $('.reference-line').remove();
    $('#reportWriter .rw-result-reference').each(function () {
      var _reference = $(this);
      var _source = $('#' + _reference.attr('data-reference'));
      var _height = _reference.offset().top - _source.offset().top;
      //alert(_height);
      if (_height > 0) {
        //$('#reportWriter').append('<div class="reference-line" style="height:' + _height + 'px;top:' + _source.offset().top + 'px;left:' + ($('#reportWriter').offset().left - 7) + 'px;border-color:' + strawberry.color.getRandomHSL() + '" data-reference-id="' + _reference.attr('id') + '"></div>');
     
        $('#reportWriter').append('<div class="reference-line" style="height:' + _height + 'px;top:' + (_source.offset().top - window.reportWriter.offset().top) + 'px;border-color:' + strawberry.color.getRandomHSL() + '" data-reference-id="' + _reference.attr('id') + '"></div>');
      }
      else {

        window.reportWriter.find('.list-group-item').css('opacity', '0.5');
        window.reportWriter.find('.list-group-item').css('pointer-events', 'none');
        window.reportWriter.find('.list-group-item').css('cursor', 'not-allowed');

        _reference.css('opacity', '1');
        _reference.popover({
          html: true,
          content: "<i class='fas fa-times mr-2 text-danger'></i> Cannot use a reference before its original source",
          trigger: 'focus',
          placement: 'top',
          template: '<div class="popover border border-danger text-white shadow" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'
        }).popover('show');

        setTimeout(function () {
          window.reportWriter.find('.list-group-item').css('opacity', '1');
          window.reportWriter.find('.list-group-item').css('pointer-events', 'auto');
          window.reportWriter.find('.list-group-item').css('cursor', 'auto');
          _reference.popover('dispose');
          window.reportWriter.sortable('cancel');
        refreshLinks();
        }, 5000);

      }

    })
  }

  var attractSave = function () {
    strawberry.utility.addButtonFlash($('#btnSaveIncomeStatement:not(.btn-flash)'),'You have unsaved changes');
  }
  


  $(document).ready(function () {

    if (window.innerWidth < 1400) {
      strawberry.sidebar.toggle();
      
    }

    $('.rw-result-reference').each(function(){
      var __ele = $(this);
      if(!__ele.parent().hasClass('d-none')){
        var ref  = __ele.data('ref');
        var ref_id = $('[data-unique='+ref+']').attr('id');
        __ele.attr('data-reference', ref_id);
        console.log(ref_id)
      }
    })



   $('.btn-del').tooltip({ title: 'Delete row' });
   $('.btn-reference').tooltip({ title: 'Add a reference to this result' });



    $('#reportWriter .list-group-item:not(.header) [class^=col-]:first-child').append(
      "<span class='fas fa-grip-lines sort-handle'></span>");


    window.reportWriter = $("#reportWriter .list-group");

    refreshLinks();

    window.reportWriter.sortable({
      handle: ".sort-handle",
      items: '.list-group-item:not(.header)',
      stop: refreshLinks
    });

    $("#reportWriter .list-group .list-group-item").disableSelection();


    $('[data-report-rows]').on('click', '[rw-add-row]', function (e) {
      attractSave();
      $('.tooltip').remove();

      var _btn = $(this);
      var _record = _btn.closest('button');

      var _id = _record.data('id');
      var _name = _record.data('name');
      var _type_id = _record.data('type-id');
      var _type_name = _record.data('type-name');

      var _type_qb = _record.data('type-qb');

      var _newRecord = $('#rwStandard').clone();

      var _chkId1 = new Date().getTime();

      _newRecord.find('.rw-name').text(_name);
      _newRecord.find('.rw-name').tooltip({ title: _type_name });
      _newRecord.find('.rw-name').text(_name);
      _newRecord.find('.rw-name').attr('data-type-qb', _type_qb);
      _newRecord.find('.rw-name').attr('data-group', _type_id);
      _newRecord.find('.rw-display').prop('checked', true);
      _newRecord.find('.rw-display').attr('id', 'chkDisp_' + _type_id + _id + _chkId1);
      _newRecord.find('.rw-display').next('label').attr('for', 'chkDisp_' + _type_id + _id + _chkId1);

      _newRecord.find('.rw-style #chkRW_style_Bold').attr('id', 'chkRW_style_Bold' + _type_id + _id + _chkId1)
      _newRecord.find('.rw-style [for=chkRW_style_Bold]').attr('for', 'chkRW_style_Bold' + _type_id + _id + _chkId1);

      _newRecord.find('.rw-style #chkRW_style_Underline').attr('id', 'chkRW_style_Underline' + _type_id + _id + _chkId1)
      _newRecord.find('.rw-style [for=chkRW_style_Underline]').attr('for', 'chkRW_style_Underline' + _type_id + _id + _chkId1);

      _newRecord.find('.rw-style #chkRW_style_Underline_db').attr('id', 'chkRW_style_Underline_db' + _type_id + _id + _chkId1)
      _newRecord.find('.rw-style [for=chkRW_style_Underline_db]').attr('for', 'chkRW_style_Underline_db' + _type_id + _id + _chkId1);

      _newRecord.removeAttr('id');
      _newRecord.find('[class^=col-]:last-child').append("<span class='fas fa-trash text-muted btn-del fa-fw'></span>");
      _newRecord.find('[class^=col-]:first-child').append("<span class='fas fa-grip-lines sort-handle'></span>");
      _newRecord.find('.btn-del').tooltip({ title: 'Delete row' });
      $('#reportWriter .list-group').append(_newRecord);
     refreshLinks();
    })


    $('#btnAddBlank').on('click', function (e) {

      strawberry.utility.addButtonFlash($('#btnSaveIncomeStatement:not(.btn-flash)'),'You have unsaved changes');

      $('.tooltip').remove();
      var _newRecord = $('#rwBlank').clone();

      _newRecord.removeAttr('id');
      _newRecord.find('[class^=col-]:first-child').append("<span class='fas fa-grip-lines sort-handle'></span>");
      _newRecord.find('[class^=col-]:last-child').append("<span class='fas fa-trash text-muted btn-del fa-fw'></span>");
      _newRecord.find('.btn-del').tooltip({ title: 'Delete row' });
      $('#reportWriter .list-group').append(_newRecord);
      refreshLinks();
    })

    $('#btnAddResult').on('click', function (e) {

      strawberry.utility.addButtonFlash($('#btnSaveIncomeStatement:not(.btn-flash)'),'You have unsaved changes');

      $('.tooltip').remove();
      var _newRecord = $('#rwResult').clone();
      var _chkId = new Date().getTime();
      _newRecord.attr('id', 'rw_result_' + new Date().getTime());
      _newRecord.find('.rw-display').attr('id', 'chkDisp_' + _chkId);
      _newRecord.find('.rw-display').next('label').attr('for', 'chkDisp_' + _chkId);
      _newRecord.find('[class^=col-]:first-child').append("<span class='fas fa-grip-lines sort-handle'></span>");
      _newRecord.find('[class^=col-]:last-child').append("<span class='fas fa-trash fa-fw text-muted btn-del'></span>");
      _newRecord.find('[class^=col-]:last-child').append("<span class='fas fa-link fa-fw text-warning btn-reference'></span>");
      _newRecord.find('.btn-del').tooltip({ title: 'Delete row' });
      _newRecord.find('.btn-reference').tooltip({ title: 'Add a reference to this result' });

      _newRecord.find('.rw-style #chkRW_style_Bold').attr('id', 'chkRW_style_Bold' + _chkId)
      _newRecord.find('.rw-style [for=chkRW_style_Bold]').attr('for', 'chkRW_style_Bold' + _chkId);

      _newRecord.find('.rw-style #chkRW_style_Underline').attr('id', 'chkRW_style_Underline' + _chkId)
      _newRecord.find('.rw-style [for=chkRW_style_Underline]').attr('for', 'chkRW_style_Underline' + _chkId);

      _newRecord.find('.rw-style #chkRW_style_Underline_db').attr('id', 'chkRW_style_Underline_db'+ _chkId)
      _newRecord.find('.rw-style [for=chkRW_style_Underline_db]').attr('for', 'chkRW_style_Underline_db' + _chkId);

      $('#reportWriter .list-group').append(_newRecord);
      refreshLinks();
    })

    $("#reportWriter").on('click', '.btn-del', function () {
      $('.tooltip').remove();
      var _btn = $(this);
      var _record = $(this).closest('.list-group-item');

      if ($("[data-reference=" + _record.attr('id') + "]").length > 0) {
        _btn.popover({
          html: true,
          content: "<i class='fas fa-times mr-2 text-danger'></i> Please remove references to this row before deleting",
          trigger: 'focus',
          placement: 'top',
          template: '<div class="popover border border-danger text-white shadow" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'
        }).popover('show');

        setTimeout(function () {
          _btn.popover('dispose');
        }, 4000);
      }
      else {

        strawberry.dialog.confirm({
          title: 'Deleting Row',
          body : 'Are you sure to delete this row?',
          yes  : confirmRemove,
        })      

        function confirmRemove() {
          _record.remove();
        }
      }

     refreshLinks();
    });

    $("#reportWriter").on('click', '.btn-reference', function () {

      strawberry.utility.addButtonFlash($('#btnSaveIncomeStatement:not(.btn-flash)'),'You have unsaved changes');

      $('.tooltip').remove();
      var _result = $(this).closest('.list-group-item');
      var _refId = _result.attr('id');

      var _newRecord = $('#rwResultReference').clone();
      var _chkId = new Date().getTime();
      _newRecord.attr('id', 'rw_reference_' + new Date().getTime());
      _newRecord.attr('data-reference', _refId);
      _newRecord.find('.rw-display').attr('id', 'chkDisp_' + _chkId);
      _newRecord.find('.rw-display').next('label').attr('for', 'chkDisp_' + _chkId);
      _newRecord.find('[class^=col-]:first-child').append("<span class='fas fa-grip-lines sort-handle'></span>");
      _newRecord.find('[class^=col-]:last-child').append("<span class='fas fa-trash fa-fw text-muted btn-del'></span>");
      _newRecord.find('[class^=col-]:last-child').append("<span class='fas fa-link fa-fw text-warning btn-reference'></span>");
      _newRecord.find('.btn-del').tooltip({ title: 'Delete row' });
      _newRecord.find('.btn-reference').tooltip({ title: 'Add a reference to this result' });

      _newRecord.find('.rw-style #chkRW_style_Bold').attr('id', 'chkRW_style_Bold' + _chkId)
      _newRecord.find('.rw-style [for=chkRW_style_Bold]').attr('for', 'chkRW_style_Bold' + _chkId);

      _newRecord.find('.rw-style #chkRW_style_Underline').attr('id', 'chkRW_style_Underline' + _chkId)
      _newRecord.find('.rw-style [for=chkRW_style_Underline]').attr('for', 'chkRW_style_Underline' + _chkId);

      _newRecord.find('.rw-style #chkRW_style_Underline_db').attr('id', 'chkRW_style_Underline_db'+ _chkId)
      _newRecord.find('.rw-style [for=chkRW_style_Underline_db]').attr('for', 'chkRW_style_Underline_db' + _chkId);

      $('#reportWriter .list-group').append(_newRecord);
      refreshLinks();
    }); 

  $('#reportWriter').on('mouseenter', '.list-group-item.rw-result-reference', function () {
    var _reference = $(this);
    var _line = $(".reference-line[data-reference-id=" + _reference.attr('id') + "]");
    $(".reference-line").removeClass('active');
    _line.addClass('active');
  })


  $('#reportWriter').on('mouseleave', '.list-group-item.rw-result-reference', function () {
    var _reference = $(this);
    var _line = $(".reference-line[data-reference-id=" + _reference.attr('id') + "]");

    _line.removeClass('active');
  })

 });