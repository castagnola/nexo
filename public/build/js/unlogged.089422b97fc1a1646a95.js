webpackJsonp([1],{

/***/ 0:
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _angularMaterial = __webpack_require__(48);
	
	var _angularMaterial2 = _interopRequireDefault(_angularMaterial);
	
	var _angularAnimate = __webpack_require__(49);
	
	var _angularAnimate2 = _interopRequireDefault(_angularAnimate);
	
	__webpack_require__(730);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	_angular2.default.module('nexo.app.unlogged', [_angularMaterial2.default, _angularAnimate2.default]).config(["$mdThemingProvider", function ($mdThemingProvider) {
	    "ngInject";
	
	    $mdThemingProvider.theme('default').primaryPalette('red').accentPalette('orange');
	}]).controller('loginController', ["$scope", function ($scope) {
	    "ngInject";
	
	    $scope.showForm = true;
	}]);
	
	_angular2.default.element(document).ready(function () {
	    _angular2.default.bootstrap(document, ['nexo.app.unlogged']);
	});

/***/ },

/***/ 730:
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ }

});
//# sourceMappingURL=unlogged.089422b97fc1a1646a95.js.map