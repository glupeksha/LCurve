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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 44);
/******/ })
/************************************************************************/
/******/ ({

/***/ 44:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(45);


/***/ }),

/***/ 45:
/***/ (function(module, exports) {

//Calander Function - start
$(function () {
	var transEndEventNames = {
		'WebkitTransition': 'webkitTransitionEnd',
		'MozTransition': 'transitionend',
		'OTransition': 'oTransitionEnd',
		'msTransition': 'MSTransitionEnd',
		'transition': 'transitionend'
	},
	    transEndEventName = transEndEventNames[Modernizr.prefixed('transition')],
	    $wrapper = $('#custom-inner'),
	    $calendar = $('#calendar'),
	    cal = $calendar.calendario({
		onDayClick: function onDayClick($el, $contentEl, dateProperties) {
			if ($contentEl.length > 0) {
				showEvents($contentEl, dateProperties);
			}
		},
		caldata: codropsEvents,
		displayWeekAbbr: true
	}),
	    $month = $('#custom-month').html(cal.getMonthName()),
	    $year = $('#custom-year').html(cal.getYear());

	$('#custom-next').on('click', function () {
		cal.gotoNextMonth(updateMonthYear);
	});
	$('#custom-prev').on('click', function () {
		cal.gotoPreviousMonth(updateMonthYear);
	});

	function updateMonthYear() {
		$month.html(cal.getMonthName());
		$year.html(cal.getYear());
	}

	// just an example..
	function showEvents($contentEl, dateProperties) {
		hideEvents();
		var $events = $('<div id="custom-content-reveal" class="custom-content-reveal"><h4>Events for ' + dateProperties.monthname + ' ' + dateProperties.day + ', ' + dateProperties.year + '</h4></div>'),
		    $close = $('<span class="custom-content-close"></span>').on('click', hideEvents);

		$events.append($contentEl.html(), $close).insertAfter($wrapper);

		setTimeout(function () {
			$events.css('top', '0%');
		}, 25);
	}
	function hideEvents() {

		var $events = $('#custom-content-reveal');
		if ($events.length > 0) {

			$events.css('top', '100%');
			Modernizr.csstransitions ? $events.on(transEndEventName, function () {
				$(this).remove();
			}) : $events.remove();
		}
	}
});
//Calander Function - end

/***/ })

/******/ });