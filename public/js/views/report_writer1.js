window.workspaceScript = new function () {
  _this = this;

  _this.onLoad = function () {

    $('#reportWriter .list-group-item:not(.header) [class^=col-]:last-child').append(
      "<span class='fas fa-bars sort-handle'></span>");

  };

  $("#reportWriter .list-group").sortable({
    handle: ".sort-handle",
    items: '.list-group-item:not(.header)'
  });

  $("#reportWriter .list-group .list-group-item").disableSelection();

};
