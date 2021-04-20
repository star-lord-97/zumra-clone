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

/* single-product js */
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
});
var handlesSlider = document.getElementById('slider-handles');
noUiSlider.create(handlesSlider, {
  start: [0, 1000],
  step: 10,
  connect: true,
  behaviour: 'drag-tap',
  range: {
    'min': [0],
    'max': [1000]
  }
});
var stepSliderValueElement = document.getElementById('slider-value');
handlesSlider.noUiSlider.on('update', function (values) {
  stepSliderValueElement.innerHTML = values.join(' - ');
}); // get the values of the slider handler

var filterBtn = document.getElementById('filter-btn');
filterBtn.addEventListener('click', function () {
  var priceRange = handlesSlider.noUiSlider.get();
  var lowerPrice = parseInt(priceRange[0], 10);
  var upperPrice = parseInt(priceRange[1], 10);
  var lower_input = document.querySelectorAll('#lower');
  var upper_input = document.querySelectorAll('#upper');

  for (var i = 0; i < lower_input.length; i++) {
    lower_input[i].value = lowerPrice;
    upper_input[i].value = upperPrice;
  }
});
var sort_btn = document.getElementById('sort-btn');
sort_btn.addEventListener('click', function () {
  var priceRange = handlesSlider.noUiSlider.get();
  var lowerPrice = parseInt(priceRange[0], 10);
  var upperPrice = parseInt(priceRange[1], 10);
  var lower_input = document.querySelectorAll('#lower');
  var upper_input = document.querySelectorAll('#upper');

  for (var i = 0; i < lower_input.length; i++) {
    lower_input[i].value = lowerPrice;
    upper_input[i].value = upperPrice;
  }
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