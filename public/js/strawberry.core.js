//Strawberry framework core - JONES
//Requires jQuery and Bootstrap 4 js frameworks for complete functionality
//Requires font awesome(web fonts with css) v5x for icons

var Strawberry = function () {
  var _instance = this;
  //Window Load function at the end

  this.Loader = function (_parent) {
    _this = this;

    _this.showFull = function () {
      $('.spinner-backdrop').remove();
      $('body').append('<div class="spinner-backdrop"><div class="spinner-wrap"><div class="spinner"></div></div></div>');
      $('body').addClass('spinner-spinning');
    }

    _this.hideFull = function () {
      $('.spinner-backdrop').remove();
      $('body').removeClass('spinner-spinning');
    }

    _this.toggleFull = function () {

      if ($('.spinner-backdrop').length > 0) {
        _this.hideFull();
      } else {
        _this.showFull();
      }

    }
  }

  this.Workspace = function (_parent) {
    //Namespace workspace
    _this = this;
    _this.load = function (ele) {
      //This function is only for design and NOT needed in implementation
      //Clear previous onLoad

      window.workspaceScript = null;
      //Clear tooltips
      $('.tooltip').remove();


      var url = ele;
      $('#workspace').css('transition', 'all .3s ease');
      setTimeout(function () {
        $('#workspace').css({ 'transform': 'translateX(-10%)', 'opacity': '0' });
      }, 100)



      setTimeout(function () {
        $('#workspace').load(url + ".html", function (response, status, xhr) {
          if (status == 'error') {
            //return _parent.workspace.load($('[data-workspace-src=empty]'));
            window.location = "#empty";
            window.location.reload();
            return;
          }

          $('#workspace').css('transition', 'none');
          setTimeout(function () {
            $('#workspace').css({ 'transform': 'translateX(10%)', 'opacity': '0' });
            $('#workspace').css('transition', 'all .3s ease');
          }, 100);


          setTimeout(function () {
            $('#workspace').css({ 'transform': 'none', 'opacity': '1' });
          }, 500);



          //Append scripts inside view 
          $('script.dynamic').remove();
          $('#workspace script').each(function (i, e) {
            var _script = document.createElement('script');
            _script.type = 'text/javascript';
            _script.async = true;
            _script.src = $(e).attr('src');
            _script.className = 'dynamic';
            document.head.appendChild(_script);
          });

          //Call onLoad of view
          if (typeof window.workspaceScript === "object") {
            try {
              window.workspaceScript.onLoad();
            }
            catch (err) {
              console.groupCollapsed('Strawberry Core Error: Workspace Script onLoad not defined');
              console.warn(err);
              console.groupEnd();
            }
          }

          $('.sidebar-nav li a').removeClass('active');
          window.location = '#' + url;


          $('.submenu').removeClass('show');
          $('.submenu-wrapper').removeClass('open');


          if ($('[data-workspace-src="' + url + '"]').length > 0) {
            $('[data-workspace-src="' + url + '"]').addClass('active');
            $('[data-workspace-src="' + url + '"]').closest('.submenu').addClass('show');
            $('[data-workspace-src="' + url + '"]').closest('.submenu-wrapper').addClass('open');

            $('title').text($('[data-workspace-src="' + url + '"]').data('title'));
            $('.header-title').text($('[data-workspace-src="' + url + '"]').data('page-header'));
          }
          else {

            $('title').text($('#navData').data('title'));
            $('.header-title').text($('#navData').data('page-header'));
          }

          if (window.innerWidth <= 1024) {
            $("#wrapper").removeClass('toggled');
          }



          if (isFunction(_parent.workspace.generalCallback)) {

            _parent.workspace.generalCallback();
          }
        })
      }, 200)
        ;
    }


    _this.initRef = function () {
      //This function is only for design and NOT needed in implementation
      var initHash = window.location.hash || "#home";
      _parent.workspace.load(initHash.substr(1, initHash.length));

      $('body').on('click', '[data-workspace-src]', function (e) {
        e.stopPropagation();
        e.preventDefault();
        _parent.workspace.load($(this).data('workspace-src'));
      })
    }
  }

  this.Sidebar = function (_parent) {
    //Namespace sidebar
    this.toggler = function () {
      //Assign side menu toggle event
      $(".menu-toggle").click(function (e) {
        $("#wrapper").toggleClass("toggled");
        e.preventDefault();
      });
    }

    this.toggle = function () {
      //Side menu toggle
      $("#wrapper").toggleClass("toggled");
    }

    this.windowSizer = function () {
      //Check window size and show navbar if large screen
      if (window.innerWidth <= 1024) {
        $("#wrapper").removeClass('toggled');
      }

      $('#sidebar-wrapper').css('transition', 'all 0.5s ease');
      $('#wrapper').css('transition', 'all 0.5s ease');
      $('#sidebar-wrapper').removeClass('d-none');
      $('#sidebar-wrapper').removeClass('d-lg-block');

      $(window).resize(function () {
        if (window.innerWidth > 1024) {
          $("#wrapper").addClass('toggled');
        } else {
          $("#wrapper").removeClass('toggled');
        }
      });
    }

    this.submenuToggler = function () {
      //Toggle submenu
      $('.submenu-wrapper [data-toggle=submenu]').click(function () {
        var _this = $(this);
        var _target = $(_this.data('target'));
        var _parent = _this.closest('.submenu-wrapper');
        var _menuparent = $(_target.data('parent'));

        if (_parent.hasClass('open')) {
          _target.animate({
            height: "toggle",
          }, 300, 'swing', function () {

            _target.removeClass('show');
            _parent.removeClass('open');
          })
          return;
        }

        _menuparent.find('.submenu-wrapper.open > .submenu').animate({
          height: "toggle",
        }, 300, 'swing', function () {

          _menuparent.find('.submenu-wrapper.open > .submenu').removeClass('show');
          _menuparent.find('.submenu-wrapper.open').removeClass('open');
        })


        _parent.find('.submenu').animate({
          display: 'block',
          height: "toggle"
        }, 300, 'swing', function () {
          _parent.find('.submenu').addClass('show');
          _parent.addClass('open');
        });


      })
    }

  }

  this.Dialog = function (_parent) {
    var _this = this;
    _this.modal = $('<div class="modal fade" id="dialog" tabindex="-1" role="dialog" aria-labelledby="Dialog" aria-hidden="true" data-backdrop="static"><div class="modal-dialog modal-dialog-centered" role="document"><div class="modal-content shadow-lg"><div class="modal-header py-2 bg-light" style="cursor:move"><h5 class="modal-title"> <i></i> <span class="modal-title-inner"></span></h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="cursor:pointer"> <span aria-hidden="true">&times;</span> </button></div><div class="modal-body"></div><div class="modal-footer py-2 bg-light"></div></div></div></div>');

    _this.confirm = function (options) {
      if (!(options instanceof Object)) {
        console.warn("Strawberry Error: No options specified for confirm dialog");
        return;
      }

      options = {
        title: options.title || 'Confirmation',
        body: options.body || 'Are you sure?',
        icon: options.icon || 'exclamation-circle',
        yes: options.yes || function () { console.log('Strawberry Confirm Dialog: Clicked Yes') },
        no: options.no || function () { console.log('Strawberry Confirm Dialog: Clicked No') },
        showClose: options.showClose || false
      }

      _modal = _this.modal.clone();
      _modal.attr('id', 'dialogConfirm');
      _modal.find('.modal-title-inner').text(options.title);
      _modal.find('.modal-body').html(options.body);
      _modal.find('.modal-header i').attr('class', 'mr-1 text-primary fas fa-' + options.icon);
      _modal.find('.modal-body').addClass('py-4');
      _modal.find('.modal-dialog').addClass('modal-sm');

      var _btnY = $("<button class='btn btn-sm btn-outline-success border-0' data-dismiss='modal'><i class='fas fa-check mr-1'></i>Yes</button>");
      var _btnN = $("<button class='btn btn-sm btn-outline-secondary border-0' data-dismiss='modal'><i class='fas fa-times mr-1'></i>No</button>");

      if (typeof options.yes == 'function')
        _btnY.click(options.yes);
      if (typeof options.no == 'function')
        _btnN.click(options.no);

      _modal.find('.modal-footer').append(_btnN);
      _modal.find('.modal-footer').append(_btnY);

      if (!options.showClose) {
        _modal.find('button.close').addClass('d-none');
      }

      $('body #dialogConfirm').remove();

      $('body').append(_modal);

      _modal.modal('show');

      _modal.on('shown.bs.modal', function (e) {
        _btnY.focus();
        _modal.find('.modal-content').draggable({ handle: ".modal-header", containment: 'body' });
      })


    }
  }

  this.tooltipToggler = function () {
    //Trigger all tooltips which are not yet triggered
    $('[data-toggle="tooltip"]:not([data-original-title]):not(.no-tooltip)').tooltip({
      boundary: 'viewport'
    });

    //For Debugging Tooltips:
    //$('[data-toggle="tooltip"]:not([data-original-title]):not(.no-tooltip)').tooltip({trigger: 'manual'}).tooltip('show')
  }

  this.tabTriggers = function () {
    //Init all indirect tab triggers
    $('[data-toggle="tab-trigger"]').click(function () {
      $($(this).data('target')).click();
    });
  }

  this.fieldsetToggler = function () {
    //Toggle  fieldset disability
    $('[data-toggle="fieldset"]').click(function () {
      $($(this).data('target')).prop('disabled', false);
      $(this).hide();
    })

    $('[data-toggle="fieldset-disable"]').click(function () {
      $($(this).data('target')).prop('disabled', true);
      $('[data-toggle=fieldset][data-target="' + $(this).data('target') + '"]').show();
      _instance.toast.show("Edit cancelled by user", "info");
    })

    $('[data-toggle="fieldset-save"]').click(function () {
      $($(this).data('target')).prop('disabled', true);
      $('[data-toggle=fieldset][data-target="' + $(this).data('target') + '"]').show();
      _instance.toast.show("Information saved successfully", "success");
    })
  }

  this.dropdownSelectToggler = function () {
    //For using dropdowns as delct control

    $('.dropdown [data-select]').each(function () {
      $(this).closest('.dropdown').find('.dropdown-item').click(function () {

        _ele = $(this);
        _ele.closest('.dropdown').find('.text').text(_ele.text());
        _ele.closest('.dropdown').find('.dropdown-item.active').removeClass('active');
        _ele.addClass('active');
      })
    })
  }

  this.dropdownFormBubbler = function () {
    //Prevent forms inside dropdowns from closing the dropdown

    $('.dropdown.dropdown-form .dropdown-menu:not(.dropdown-no-bubble)').each(function () {
      _ele = $(this);

      _ele.click(function (e) {
        e.stopPropagation();
      })

      _ele.addClass('dropdown-no-bubble');
    })
  }

  this.Toast = function (_parent) {
    _this = this;

    _this.init = function () {
      $('body').append('<aside class="toast-wrapper"></aside>');
    }

    _this.remove = function () {
      //remove all toasts
      $('.toast').remove();
    }

    _this.show = function (_body, _type, _callback) {


      _body = _body || "";
      _type = _type || "info";
      var _icon, _title;


      switch (_type) {
        case "success":
          _icon = "<i class='fas fa-check-circle fa-fw text-success mr-2'></i>";
          _title = "Success";
          break;
        case "info":
          _icon = "<i class='fas fa-info-circle fa-fw text-info mr-2'></i>";
          _title = "Information";
          break;
        case "primary":
          _icon = "<i class='fas fa-info-circle fa-fw text-primary mr-2'></i>";
          _title = "Information";
          break;
        case "warning":
          _icon = "<i class='fas fa-exclamation-circle fa-fw text-warning mr-2'></i>";
          _title = "Warning";
          break;
        case "danger":
          _icon = "<i class='fas fa-exclamation-triangle fa-fw text-danger mr-2'></i>";
          _title = "Alert";
          break;
      }

      var _id = "toast_" + new Date().getTime();
      var _html = '<div id="' + _id + '" class="toast show animated fadeInRight shadow-lg border-' + _type + '" role="alert" aria-live="assertive" aria-atomic="true"><div class="toast-header">';
      _html += _icon;
      _html += '<strong class="mr-auto text-' + _type + '">' + _title + '</strong>';
      // _html += '<small>11 mins ago</small>';
      _html += '<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">'
      _html += '<span aria-hidden="true">&times;</span>'
      _html += '</button>';
      _html += '</div>';
      _html += '<div class="toast-body">'
      _html += _body + "</div></div>";

      $('.toast-wrapper').append(_html);

      $("#" + _id).toast({ delay: 5000, autohide: true }).toast('show').on('hidden.bs.toast', function () {
        $(this).remove();
        if (typeof _callback == 'function') {
          _callback();
        }
      });

      return; //Custom toast bellow- testing deault bootstrap toast above

      _body = _body || "";
      _type = _type || "info";
      var _icon;
      //remove all toasts
      $('.toast').remove();

      switch (_type) {
        case "success":
          _icon = "<div class='toast-icon'><i class='fas fa-check-circle fa-fw'></i></div>";
          break;
        case "info":
          _icon = "<div class='toast-icon'><i class='fas fa-info-circle fa-fw'></i></div>";
          break;
        case "primary":
          _icon = "<div class='toast-icon'><i class='fas fa-info-circle fa-fw'></i></div>";
          break;
        case "warning":
          _icon = "<div class='toast-icon'><i class='fas fa-info-circle fa-fw'></i></div>";
          break;
        case "danger":
          _icon = "<div class='toast-icon'><i class='fas fa-exclamation-triangle fa-fw'></i></div>";
          break;
      }

      var _wrapper = '<div class="toast bg-';
      var _wrapper_suf = '">';

      var _content_wrapper = '<div class="toast-content">';

      var _end = '</div>';

      var _html = '';

      if (_body != "") {
        _html = _wrapper + _type + _wrapper_suf + _icon + _content_wrapper + _body + _end + _end;

        $('body').append(_html);

        setTimeout(function () { $('.toast').css('right', '40px'); }, 100);
        setTimeout(function () {
          $('.toast').css('right', '-400px');
          if (isFunction(_callback)) {
            _callback();
          }
        }, 6000);


      }

    }

    _this.hide = function () {
      $('.toast').css('top', '-200px');
      setTimeout(function () {
        $('.toast').remove();
      }, 1000);
    }
  }

  this.placeEmptyHolder = function () {
    //Place empty placeholders "Not Available" inside fieldsets
    $('fieldset input.form-control:not(.empty-placeholder)').each(function () {
      $(this).attr('data-placeholder', $(this).attr('placeholder') || '');
      if ($(this).val().trim() == '') {
        $(this).attr('placeholder', 'Not Available');
        $(this).addClass('empty-placeholder');
      }
    })

    $('[data-toggle="fieldset"]').click(function () {
      var _target = $($(this).data('target'));
      _target.find('input.form-control.empty-placeholder').each(function () {
        $(this).attr('placeholder', $(this).data('placeholder'));
        $(this).removeClass('empty-placeholder');
      })
    })

    $('[data-toggle="fieldset-disable"]').click(function () {
      var _target = $($(this).data('target'));
      _target.find('input.form-control:not(.empty-placeholder)').each(function () {
        $(this).attr('data-placeholder', $(this).attr('placeholder') || '');
        if ($(this).val().trim() == '') {
          $(this).attr('placeholder', 'Not Available');
          $(this).addClass('empty-placeholder');
        }
      })
    })
  }

  this.Color = function (_parent) {
    _this = this;

    _this.getRandomHSL = function (_sat, _lum) {
      _sat = _sat || "70%";
      _lum = _lum || "50%";
      var _rand = Math.random(new Date().getTime());
      _rand *= 359;
      return "hsl(" + _rand + "," + _sat + "," + _lum + ")";
    }
  }

  this.Utility = function (_parent) {
    var _this = this;

    _this.addButtonFlash = function (btn, text) {
      btn = btn || "";
      if (btn != "") {
        btn.addClass('btn-flash animated bounce').tooltip({ title: text });
      }

    }

    _this.removeButtonFlash = function (btn, removeTooltip) {
      btn = btn || $('.btn-flash');
      removeTooltip = removeTooltip || false;

      btn.removeClass('btn-flash animated bounce').tooltip('dispose');

    }
  }

  this.sidebar = new this.Sidebar(this);
  this.workspace = new this.Workspace(this);
  this.toast = new this.Toast(this);
  this.loader = new this.Loader(this);
  this.color = new this.Color(this);
  this.dialog = new this.Dialog(this);
  this.utility = new this.Utility(this);

}