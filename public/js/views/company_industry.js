window.workspaceScript = new function () {
  _this = this;

  $(document).ready(function(){

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


    $('#btnSaveVerticals,#btnSaveModels').click(function () {
      var _btn = $(this);
      _btn.text('Saving...');
      _btn.addClass('btn-processing');
      _btn.prop('diasbled', true);

      setTimeout(function () {
        _btn.text('Save');
        _btn.removeClass('btn-processing');
        _btn.prop('diasbled', false);


        _btn.popover({
          html: true,
          content: "<i class=fas fa-check-circle mr-2'></i> Information saved successfully",
          trigger: 'focus',
          placement: 'top',
          template: '<div class="popover border-success" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'
        }).popover('show');

        setTimeout(function () {
          _btn.popover('dispose');
        }, 6000);

        strawberry.toast.show("Information saved successfully", "success");
      }, 3000);
    })
    
  });
};
