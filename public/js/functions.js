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

/***/ "./resources/js/functions.js":
/*!***********************************!*\
  !*** ./resources/js/functions.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(function () {
  // Manager dynamicly selects
  $.fn.selectInOut = function (p) {
    var selected = document.querySelector("div.in-out > div.select-wrapper > ul > li.selected > span").innerHTML;

    if (selected == "Entrada") {
      $(".out").removeClass("hide");
      $(".in").addClass("hide");
    } else if (selected == "Saída") {
      $(".in").removeClass("hide");
      $(".out").addClass("hide");
    }
  }; // Manager dynamicly odometer input


  $.fn.odometerCalculator = function (p) {
    var odometerIni = p.lastIndexOf("(") + 1;
    var odometerEnd = p.lastIndexOf(")") - odometerIni;
    p.substr(odometerIni, odometerEnd);
    var odometerValue = p.substr(odometerIni, odometerEnd);
    $("#last_odometer").val(odometerValue.replace(/(.)(?=(\d{3})+$)/g, '$1.'));
  }; // Manager dynamicly difference value of inputs


  $.fn.differenceValue = function (p) {
    var difference_set = $(p + "-set").val();
    var difference_default = $(p + "-default").val();
    var difference_result = difference_set.replaceAll(".", "") - difference_default.replaceAll(".", "");
    $(p + "-result").val(difference_result.toString().replace(/(.)(?=(\d{3})+$)/g, '$1.') + " Km");

    if (difference_result <= 10000 && difference_result >= -10) {
      $(p + "-result").css({
        'border-bottom': '1px solid #4CAF50',
        'box-shadow': 'box-shadow: 0 1px 0 0 #4CAF50'
      });
    } else {
      $(p + "-result").css({
        'border-bottom': '1px solid #F44336',
        'box-shadow': 'box-shadow: 0 1px 0 0 #F44336'
      });
    }
  };
});
$(document).ready(function () {
  // Initialize and configure Materilize JS/JQuery functions
  $(".sidenav").sidenav();
  $(".parallax").parallax();
  $(".modal").modal();
  $(".dropdown-trigger").dropdown();
  $("select").formSelect();
  $(".collapsible").collapsible();
  $(".tooltipped").tooltip();
  $("input.counter, textarea.counter").characterCounter();
  $(".tabs").tabs();
  $(".tap-target").tapTarget();
  $(".datepicker").datepicker({
    format: "dd/mm/yyyy",
    showClearBtn: true,
    i18n: {
      cancel: "Voltar",
      clear: "Limpar",
      done: "Enviar",
      months: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
      monthsShort: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
      weekdays: ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado"],
      weekdaysShort: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab"],
      weekdaysAbbrev: ["D", "S", "T", "Q", "Q", "S", "S"]
    }
  });
  $(".timepicker").timepicker({
    showClearBtn: true,
    twelveHour: false,
    i18n: {
      cancel: "Voltar",
      clear: "Limpar",
      done: "Enviar"
    }
  });
  $(".nav-search-trigger").click(function () {
    if ($("#nav-search").hasClass("scale-out")) {
      $("#nav-search").removeClass("scale-out");
    } else {
      $("#nav-search").addClass("scale-out");
    }
  }); // Manager responsivity Navbar, Sidenav and logos

  $(window).resize(function () {
    if ($(window).width() <= 600) {
      $("#brand-logo").addClass("truncate");
      $("#nav-wrapper").removeClass("container");
    } else {
      $("#brand-logo").removeClass("truncate");
      $("#nav-wrapper").addClass("container");
    }
  }).resize();
  $(window).resize(function () {
    if ($(window).width() > 992) {
      $("#sidenav-mobile-div").hide();
    } else {
      $("#sidenav-mobile-div").show();
    }
  }).resize();
  $(window).resize(function () {
    if ($(window).width() <= 1400) {
      $(".nav-items").hide();
      $(".li-nav-items").css("width", "54px");
    } else {
      $(".nav-items").show();
      $(".li-nav-items").css("width", "auto");
    }
  }).resize(); // Manager SideNav for desktop

  if (window.location.href.indexOf("/login") == -1 && window.location.href.indexOf("/register/") == -1 && window.location.href.indexOf("/password") == -1 && window.location.href.indexOf("/home") == -1 && window.location.href.indexOf("/birthday") == -1) {
    $(document).ready(function () {
      $("#mobile-demo").addClass("sidenav-fixed");
      $(window).resize(function () {
        if ($(window).width() < 992) {
          $("header, main, footer").css("padding-left", "0px");
          $("#mobile-demo").css("transform", "translateX(-105%)");
        } else {
          $("header, main, footer").css("padding-left", "260px");
          $("#mobile-demo").css("transform", "none");
        }
      }).resize();
    });
  } else {
    $(document).ready(function () {
      $("#mobile-demo").removeClass("sidenav-fixed");
    });
  } // Manager Footer


  if (window.location.href.indexOf("/login") == -1 && window.location.href.indexOf("/register/") == -1 && window.location.href.indexOf("/password") == -1) {
    $("#footer-container").removeClass("hide");
  } // Validations with Jquery Mask


  var phoneOptions = {
    onKeyPress: function onKeyPress(phone, e, field, options) {
      var masks = ["(00) 00000-0000", "(00) 0000-00009"];
      var mask = phone.length < 15 ? masks[1] : masks[0];
      $(".phone-validation").mask(mask, options);
    }
  };
  $(".phone-validation").mask("(00) 00000-0000", phoneOptions);
  var phoneOptions2 = {
    onKeyPress: function onKeyPress(phone, e, field, options) {
      var masks = ["(00) 00000-0000", "(00) 0000-00009"];
      var mask = phone.length < 15 ? masks[1] : masks[0];
      $(".phone-validation-2").mask(mask, options);
    }
  };
  $(".phone-validation-2").mask("(00) 00000-0000", phoneOptions2);
  $(".date-validation").mask("T0/O0/T000", {
    translation: {
      T: {
        pattern: /[0-3]/,
        optional: false
      },
      O: {
        pattern: /[0-1]/,
        optional: false
      }
    }
  });
  $(".time-validation").mask("T0:S0", {
    translation: {
      T: {
        pattern: /[0-2]/,
        optional: false
      },
      S: {
        pattern: /[0-6]/,
        optional: false
      }
    }
  });
  $(".timeComplete-validation").mask("00:00:00");
  $(".licensePlate-validation").mask("SSS-0A00");
  $(".cep-validation").mask("00000-000");
  $(".cpf-validation").mask("000.000.000-00", {
    reverse: true
  });
  $(".cnpj-validation").mask("00.000.000/0000-00", {
    reverse: true
  });
  $(".money-validation").mask("#.##0,00", {
    reverse: true
  });
  $(".number-validation").mask("#.##0", {
    reverse: true
  });
  $(".ipAddress-validation").mask("099.099.099.099");
  $(".percent-validation").mask("##0,00%", {
    reverse: true
  }); // Manager Timepicker and Datepicker Icon to input

  $(".datepicker-done").on("click", function (event) {
    if ($(".datepicker").val() == "") {
      var dateVal = new Date().toLocaleDateString();
    } else {
      var dateVal = $(".datepicker").val();
    }

    $(".datepicker-control").val(dateVal);
  });
  $(".datepicker-clear").on("click", function (event) {
    $(".datepicker-control").val("");
  });
  $(".timepicker-close").on("click", function (event) {
    var timeVal = $(".timepicker").val();
    $(".timepicker-control").val(timeVal);
  });
  $(".timepicker-clear").on("click", function (event) {
    $(".timepicker-control").val("");
  }); // Manager dynamicly selects

  var select = document.querySelector("div.in-out > div.select-wrapper > ul > li.selected > span");

  if (select != null) {
    if (select.innerHTML != "") {
      $().selectInOut();
    }
  }

  $("div.in-out div.select-wrapper ul li").on("click", function () {
    $().selectInOut();
  }); // Manager dynamicly odometer input

  if (document.querySelector("div.odometerIn div.select-wrapper ul li") != null && document.querySelector("div.odometerOut div.select-wrapper ul li") != null) {
    if (document.querySelector("div.odometerIn div.select-wrapper ul li").className == "disabled selected" && document.querySelector("div.odometerOut div.select-wrapper ul li").className != "disabled selected") {
      $().odometerCalculator($("div.odometerIn div.select-wrapper ul li.selected span")[0].innerText);
    }

    if (document.querySelector("div.odometerOut div.select-wrapper ul li").className == "disabled selected" && document.querySelector("div.odometerIn div.select-wrapper ul li").className != "disabled selected") {
      $().odometerCalculator($("div.odometerOut div.select-wrapper ul li.selected span")[0].innerText);
    }
  }

  $("div.odometerIn div.select-wrapper ul li").on("click", function () {
    $().odometerCalculator($("div.odometerIn div.select-wrapper ul li.selected span")[0].innerText);
  });
  $("div.odometerOut div.select-wrapper ul li").on("click", function () {
    $().odometerCalculator($("div.odometerOut div.select-wrapper ul li.selected span")[0].innerText);
  }); // Manager dynamicly difference value of inputs

  if ($(".difference-set").length > 0) {
    if ($(".difference-set").val() != "") {
      $().differenceValue(".difference");
    }
  }

  $(".difference-set").on("input", function () {
    $().differenceValue(".difference");
  });
});

/***/ }),

/***/ 1:
/*!*****************************************!*\
  !*** multi ./resources/js/functions.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\laragon\www\braddok\resources\js\functions.js */"./resources/js/functions.js");


/***/ })

/******/ });