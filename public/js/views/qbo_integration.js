window.workspaceScript = new function () {
  _this = this;

  _this.onLoad = function () {
    $('#workspace').on('click', '.btn-click-sync', function () {
      _this = $(this);
      _this.find('.fa-sync').addClass('fa-spin');
      $('.tooltip').remove();
      setTimeout(function () {
        _this.find('.fa-sync').removeClass('fa-spin');
      }, 2000);
    });

    $('#workspace').on('click', '.btn-click-sync-all', function () {

      $('.btn-click-sync .fa-sync').addClass('fa-spin');
      $('.tooltip').remove();
      setTimeout(function () {
        $('.btn-click-sync .fa-sync').removeClass('fa-spin');
      }, 2000);
    });


    $('#btnRefreshConnStatus').click(function () {
      $('.tooltip').remove();

      $('#lblConnStatus').removeClass('text-success text-danger text-warning text-info text-light text-muted text-primary text-success');
      $('#lblConnStatus').text('Checking...');
      $('#lblConnStatus').addClass('text-muted');

      setTimeout(function () {
        $('#lblConnStatus').removeClass('text-muted');

        $('#lblConnStatus').text('Connected');
        $('#lblConnStatus').addClass('text-success');
      }, 2000);

    })

  };
}
