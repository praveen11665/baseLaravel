window.designMode = false;
window.strawberry = new Strawberry();

function workspaceCallback() {
  strawberry.tooltipToggler();
  strawberry.fieldsetToggler();
  strawberry.placeEmptyHolder();
  strawberry.tabTriggers();
  strawberry.dropdownSelectToggler();
  strawberry.dropdownFormBubbler();
  preventEmptyHash();

}

function strawberryLoad() {
  //Execute necessary methods
  strawberry.sidebar.windowSizer();
  strawberry.sidebar.toggler();
  strawberry.sidebar.submenuToggler();
  //strawberry.toast.init();

  if (window.designMode) {
    strawberry.workspace.initRef();
  }

  strawberry.tooltipToggler();
  strawberry.fieldsetToggler();
  strawberry.placeEmptyHolder();
  strawberry.tabTriggers();
  preventEmptyHash();
  strawberry.dropdownFormBubbler();

  strawberry.dropdownSelectToggler();
}

strawberry.workspace.generalCallback = workspaceCallback;
window.onload = strawberryLoad;


function getQueryParam(param) {
  var url = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
  for (var i = 0; i < url.length; i++) {
    var urlparam = url[i].split('=');
    if (urlparam[0] == param) {
      return urlparam[1];
    }
  }
}


function preventEmptyHash() {
  $('a[href="#"]').click(function (e) { e.preventDefault(); })
}

//typeof checkers
function isObject(value) {
  return value && typeof value === 'object';
}

function isFunction(value) {
  return typeof value === 'function';
}

function isNumber(value) {
  return typeof value === 'number' && isFinite(value);
}

function isString(value) {
  return typeof value === 'string' || value instanceof String;
}

function isDateObj(value) {
  return (value instanceof Date)
}