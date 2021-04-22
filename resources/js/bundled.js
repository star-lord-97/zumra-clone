/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/scripts.js":
/*!*********************************!*\
  !*** ./resources/js/scripts.js ***!
  \*********************************/
/***/ (() => {

/* import Glide from "@glidejs/glide";

new Glide(".glide", {
    type: "carousel",
    gap: 0,
    animationDuration: 1000,
    animationTimingFunc: "ease-in-out",
}).mount();
 */
//////////////////////////////////////////////////////////////////////////

/* single-product JS code */
//////////////////////////////////////////////////////////////////////////
document.addEventListener('DOMContentLoaded', function () {
  var productRating = 3;
  var starPercentage = productRating / 5 * 100; // Round to nearest 10

  var starPercentageRounded = "".concat(Math.round(starPercentage / 10) * 10, "%"); // Set width of stars-inner to percentage

  var star_elements = document.querySelectorAll('.stars-inner');

  for (var i = 0; i < star_elements.length; i++) {
    star_elements[i].style.width = starPercentageRounded;
  } // In stock handler


  var add_btn = document.querySelector('.add-stock');
  var remove_btn = document.querySelector('.remove-stock');
  add_btn.addEventListener('click', function () {
    var counter = document.querySelector('.stock-counter');

    if (parseInt(counter.innerHTML, 10) >= 1) {
      counter.innerHTML = parseInt(counter.innerHTML, 10) + 1;
      return parseInt(counter.innerHTML, 10);
    }
  });
  remove_btn.addEventListener('click', function () {
    var counter = document.querySelector('.stock-counter');

    if (parseInt(counter.innerHTML, 10) > 1) {
      counter.innerHTML = parseInt(counter.innerHTML, 10) - 1;
      return parseInt(counter.innerHTML, 10);
    }
  });
}); //////////////////////////////////////////////////////////////////////////

/* archive-product.php && taxonomy-product-category.php JS functions */
//////////////////////////////////////////////////////////////////////////
// get the current location url search parameters (returns as a string)

var currentLocation = window.location; // match this string for sequance of numbers using regex

var numberPattern = /\d+/g;
var getRequest_numArr = currentLocation.search.match(numberPattern); // match this string for some sorting values using regex

var orderbyPattern = /(?:DESC|ASC|price|date)/g;
var getRequest_orderby = currentLocation.search.match(orderbyPattern);
/* if there is sorting by any paramter then put the sorting value in single 
string to use it for comparison to render select options tag */

if (getRequest_orderby) {
  var orderby_val = getRequest_orderby[0] + ' ' + getRequest_orderby[1];
} // get the order list with the sorting by option selected if not render the default sorting list options


var orderbyList = document.getElementById("orderby-list");

if (orderby_val === 'DESC price') {
  orderbyList.innerHTML = "\n        <option value=\"default\">default sorting</option>\n        <option value=\"ASC price\" >sort by price low to high</option>\n        <option selected=\"selected\" value=\"DESC price\" >sort by price high to low</option>\n        <option value=\"DESC date\" >sort by latest</option>";
} else if (orderby_val === 'ASC price') {
  orderbyList.innerHTML = "\n        <option value=\"default\">default sorting</option>\n        <option selected=\"selected\" value=\"ASC price\" >sort by price low to high</option>\n        <option value=\"DESC price\" >sort by price high to low</option>\n        <option value=\"DESC date\" >sort by latest</option>";
} else if (orderby_val === 'DESC date') {
  orderbyList.innerHTML = "\n        <option value=\"default\">default sorting</option>\n        <option value=\"ASC price\" >sort by price low to high</option>\n        <option value=\"DESC price\" >sort by price high to low</option>\n        <option selected=\"selected\" value=\"DESC date\" >sort by latest</option>";
} else {
  orderbyList.innerHTML = "\n        <option selected=\"selected\" value=\"default\">default sorting</option>\n        <option value=\"ASC price\" >sort by price low to high</option>\n        <option value=\"DESC price\" >sort by price high to low</option>\n        <option value=\"DESC date\" >sort by latest</option>";
} // set the defualt slider values


var slider_low = 0;
var slider_up = 1000; // if the slider is moved change the default value

if (getRequest_numArr) {
  slider_low = getRequest_numArr[0];
  slider_up = getRequest_numArr[1];
} // create slider using nouislider js lib


var handlesSlider = document.getElementById('slider-handles');
noUiSlider.create(handlesSlider, {
  start: [slider_low, slider_up],
  step: 10,
  connect: true,
  behaviour: 'drag-tap',
  range: {
    'min': [0],
    'max': [1000]
  }
}); // add event listener to update slider reading values

var stepSliderValueElement = document.getElementById('slider-value');
handlesSlider.noUiSlider.on('update', function (values) {
  stepSliderValueElement.innerHTML = values.join(' - ');
}); // get the values of the slider handler and send them via GET request to the current url

var filterBtn = document.getElementById('filter-btn'); // filter by price range button eventlistener

filterBtn.addEventListener('click', function () {
  // get the handler values
  var priceRange = handlesSlider.noUiSlider.get(); // split them to upper and lower and return them as integers

  var lowerPrice = parseInt(priceRange[0], 10);
  var upperPrice = parseInt(priceRange[1], 10); // get all the hidden input tags and set there values to the new handler values to send them via GET

  var lower_input = document.querySelectorAll('#lower');
  var upper_input = document.querySelectorAll('#upper');

  for (var i = 0; i < lower_input.length; i++) {
    lower_input[i].value = lowerPrice;
    upper_input[i].value = upperPrice;
  } // send sortby select option value via get method


  var sort_val = document.getElementById("sort-filter"); // if the sorting is default don't send any sorting values else send the values

  if (orderbyList.value == 'default') {
    sort_val.setAttribute("name", "");
  } else {
    sort_val.value = orderbyList.value;
  }
}); // sort list change event listener 

orderbyList.addEventListener("change", function () {
  // get the handler values
  var priceRange = handlesSlider.noUiSlider.get(); // split them to upper and lower and return them as integers

  var lowerPrice = parseInt(priceRange[0], 10);
  var upperPrice = parseInt(priceRange[1], 10); // get all the hidden input tags and set there values to the new handler values to send them via GET

  var lower_input = document.querySelectorAll('#lower');
  var upper_input = document.querySelectorAll('#upper');

  for (var i = 0; i < lower_input.length; i++) {
    lower_input[i].value = lowerPrice;
    upper_input[i].value = upperPrice;
  } // click on form submit hidden button


  var sort_btn = document.getElementById('sort-btn');
  sort_btn.click();
});

/***/ }),

/***/ "./style.css":
/*!*******************!*\
  !*** ./style.css ***!
  \*******************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					result = fn();
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/resources/js/bundled": 0,
/******/ 			"resources/css/style": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			for(moduleId in moreModules) {
/******/ 				if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 					__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 				}
/******/ 			}
/******/ 			if(runtime) runtime(__webpack_require__);
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkIds[i]] = 0;
/******/ 			}
/******/ 			__webpack_require__.O();
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["resources/css/style"], () => (__webpack_require__("./resources/js/scripts.js")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["resources/css/style"], () => (__webpack_require__("./style.css")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;