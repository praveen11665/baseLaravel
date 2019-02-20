window.workspaceScript = new function () {
  _this = this;

 $(document).ready(function(){

    $('.list-report .list-group-item').each(function () {
      $(this).append('<button class="float-right btn-move" data-toggle="tooltip" title="Edit report"><i class="fas fa-pencil"></i></button>');
    });

    strawberry.tooltipToggler();

    $('#btnTrailing').click(function () {
      $('#divTrailing').toggleClass('invisible');
    });

    /*$('.list-group-item').tooltip(
      {
        title: 'Here is the description of the report which was saved in the report writer'
      }
    )*/
  });
};
