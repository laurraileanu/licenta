/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/pages/home.js":
/*!*******************************************!*\
  !*** ./resources/assets/js/pages/home.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  // datepicker stuff
  var date = new Date();
  var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
  $('#date').datepicker.dates['ro'] = {
    days: ["Duminica", "Luni", "Marti", "Miercuri", "Joi", "Vineri", "Sambata", "Duminica"],
    daysShort: ["Dum", "Lun", "Mar", "Mie", "Joi", "Vin", "Sam", "Dum"],
    daysMin: ["Du", "Lu", "Ma", "Mi", "Jo", "Vi", "Sa", "Du"],
    months: ["Ianuarie", "Februarie", "Martie", "Aprilie", "Mai", "Iunie", "Iulie", "August", "Septembrie", "Octombrie", "Noembrie", "Decembrie"],
    monthsShort: ["Ian", "Feb", "Mar", "Apr", "Mai", "Iun", "Iul", "Aug", "Sep", "Oct", "Noe", "Dec"],
    today: "Astazi"
  };
  $('#date').datepicker({
    language: 'ro',
    format: "dd/mm/yyyy",
    todayHighlight: true,
    startDate: today,
    autoclose: true,
    weekStart: 1
  });
  $('#date').datepicker('setDate', today); // end of datepicker
  //timepicker stuff

  $('#timepicker').datetimepicker({
    format: 'HH:mm'
  }); // end fo timepicker stuff

  $('#guests').keypress(function () {
    var keycode = event.keyCode;

    if (keycode > 48 && keycode < 57) {
      return true;
    } else {
      return false;
    }
  }); //quantity buttons

  $('.qunatity-buttons button').click(function () {
    var inputVal = parseInt($('#guests').val()),
        t = $(this);

    if (t.hasClass('plus')) {
      $('#guests').attr('value', inputVal + 1);
    } else {
      $('#guests').attr('value', inputVal - 1);

      if (inputVal < 3) {
        Notify("Este nevoie de cel putin o persoana pentru a face o rezervare!", null, null, 'danger');
        $('#guests').attr('value', 1);
      }
    }
  });
  var tables = [];
  $(document).on('click', '._table.available', function () {
    $(this).toggleClass('active');
    var id = $(this).data('table-id');
    var table = tables.find(function (table) {
      return table.id === id;
    });
    table.selected = $(this).hasClass('active');
  });

  function resetTable(table) {
    table.removeClass('active');
    table.removeClass('available');
    table.removeClass('unavailable');
  }

  $("form#search-table").submit(function (e) {
    var form = $(this);
    var map = $("#restaurant-map");
    map.addClass('d-none');
    e.preventDefault();
    axios.get('/tables/available', {
      params: {
        date: form.find("input[name=\"date\"]").val(),
        time: form.find("input[name=\"time\"]").val(),
        guests: form.find("input[name=\"guests\"]").val()
      }
    }).then(function (response) {
      console.log(response);
      var map = $("#restaurant-map");
      tables = response.data.tables;
      var availableTables = tables.filter(function (table) {
        return table.status === 'available';
      }).length;
      map.find('#head-text').text("Mese disponibile pentru  ".concat(form.find("input[name=\"guests\"]").val(), " persoane pe ").concat(form.find("input[name=\"date\"]").val(), " la ").concat(form.find("input[name=\"time\"]").val()));
      tables.forEach(function (table) {
        table.DOM = $("a[data-table-id=\"".concat(table.id, "\"]")).first();
        resetTable(table.DOM);
        table.DOM.addClass(table.status);
      });
      map.removeClass('d-none');
    })["catch"](function (error) {
      var errors = error.response.data.errors;
      Object.keys(errors).forEach(function (error) {
        Notify(errors[error][0], null, null, 'danger');
      });
    });
  });
  $("#reserve").click(function (e) {
    var form = $("#search-table").first();
    var selectedTables = tables.filter(function (table) {
      if (table.selected) {
        return true;
      }
    });
    selectedTables = selectedTables.map(function (table) {
      return table.id;
    });
    console.log(selectedTables.length);

    if (selectedTables.length === 0) {
      alert('selecteaza o masa');
      return false;
    }

    axios.post('/tables/reserve', {
      date: form.find("input[name=\"date\"]").val(),
      time: form.find("input[name=\"time\"]").val(),
      guests: form.find("input[name=\"guests\"]").val(),
      selectedTables: selectedTables
    }).then(function (response) {
      window.location = response.data.redirect;
    })["catch"](function (error) {
      console.log(error);
      var errors = error.response.data.errors;
      Object.keys(errors).forEach(function (error) {
        Notify(errors[error][0], null, null, 'danger');
      });
    });
  });
});

/***/ }),

/***/ 1:
/*!*************************************************!*\
  !*** multi ./resources/assets/js/pages/home.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\Homestead\licenta\resources\assets\js\pages\home.js */"./resources/assets/js/pages/home.js");


/***/ })

/******/ });