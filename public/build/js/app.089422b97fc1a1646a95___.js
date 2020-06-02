webpackJsonp([0],[
/* 0 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	__webpack_require__(1);
	
	__webpack_require__(3);
	
	__webpack_require__(6);
	
	__webpack_require__(8);
	
	__webpack_require__(25);
	
	__webpack_require__(27);
	
	__webpack_require__(31);
	
	var _jquery = __webpack_require__(43);
	
	var _jquery2 = _interopRequireDefault(_jquery);
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _angularMaterial = __webpack_require__(48);
	
	var _angularMaterial2 = _interopRequireDefault(_angularMaterial);
	
	var _angularSanitize = __webpack_require__(54);
	
	var _angularSanitize2 = _interopRequireDefault(_angularSanitize);
	
	var _angularMessages = __webpack_require__(56);
	
	var _angularMessages2 = _interopRequireDefault(_angularMessages);
	
	var _angularAnimate = __webpack_require__(49);
	
	var _angularAnimate2 = _interopRequireDefault(_angularAnimate);
	
	var _angularJwt = __webpack_require__(58);
	
	var _angularJwt2 = _interopRequireDefault(_angularJwt);
	
	__webpack_require__(60);
	
	var _index = __webpack_require__(61);
	
	var _index2 = _interopRequireDefault(_index);
	
	var _index3 = __webpack_require__(398);
	
	var _index4 = _interopRequireDefault(_index3);
	
	var _index5 = __webpack_require__(452);
	
	var _index6 = _interopRequireDefault(_index5);
	
	var _index7 = __webpack_require__(657);
	
	var _index8 = _interopRequireDefault(_index7);
	
	var _index9 = __webpack_require__(663);
	
	var _index10 = _interopRequireDefault(_index9);
	
	var _index11 = __webpack_require__(672);
	
	var _index12 = _interopRequireDefault(_index11);
	
	__webpack_require__(682);
	
	__webpack_require__(727);
	
	var _app = __webpack_require__(728);
	
	var _app2 = _interopRequireDefault(_app);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	// styles
	
	
	_angular2.default.module('app', [_angularAnimate2.default, _angularMaterial2.default, _angularSanitize2.default, _angularMessages2.default, _angularJwt2.default,
	
	// w/o modules
	'ngStorage',
	
	// config
	_index2.default.name,
	// services
	_index10.default.name,
	// components
	_index4.default.name,
	// filters
	_index8.default.name,
	// pages
	_index6.default.name,
	// forms
	_index12.default.name, 'kendo.directives']).constant('NEXO', window.NEXO).constant('TEAM_ID', _.get(window, 'NEXO.team.id', false)).constant('IS_TEAM', !!_.get(window, 'NEXO.team.id', false)).component('app', _app2.default);

/***/ },
/* 1 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 2 */,
/* 3 */,
/* 4 */,
/* 5 */,
/* 6 */,
/* 7 */,
/* 8 */,
/* 9 */,
/* 10 */,
/* 11 */,
/* 12 */,
/* 13 */,
/* 14 */,
/* 15 */,
/* 16 */,
/* 17 */,
/* 18 */,
/* 19 */,
/* 20 */,
/* 21 */,
/* 22 */,
/* 23 */,
/* 24 */,
/* 25 */,
/* 26 */,
/* 27 */,
/* 28 */,
/* 29 */,
/* 30 */,
/* 31 */,
/* 32 */,
/* 33 */,
/* 34 */,
/* 35 */,
/* 36 */,
/* 37 */,
/* 38 */,
/* 39 */,
/* 40 */,
/* 41 */,
/* 42 */,
/* 43 */,
/* 44 */,
/* 45 */,
/* 46 */,
/* 47 */,
/* 48 */,
/* 49 */,
/* 50 */,
/* 51 */,
/* 52 */,
/* 53 */,
/* 54 */,
/* 55 */,
/* 56 */,
/* 57 */,
/* 58 */,
/* 59 */,
/* 60 */,
/* 61 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _material = __webpack_require__(62);
	
	var _material2 = _interopRequireDefault(_material);
	
	var _moment = __webpack_require__(154);
	
	var _moment2 = _interopRequireDefault(_moment);
	
	var _breadcrumb = __webpack_require__(259);
	
	var _breadcrumb2 = _interopRequireDefault(_breadcrumb);
	
	var _formly = __webpack_require__(262);
	
	var _formly2 = _interopRequireDefault(_formly);
	
	var _map = __webpack_require__(377);
	
	var _map2 = _interopRequireDefault(_map);
	
	var _upload = __webpack_require__(384);
	
	var _upload2 = _interopRequireDefault(_upload);
	
	var _wizard = __webpack_require__(388);
	
	var _wizard2 = _interopRequireDefault(_wizard);
	
	var _jwt = __webpack_require__(392);
	
	var _jwt2 = _interopRequireDefault(_jwt);
	
	var _translate = __webpack_require__(393);
	
	var _translate2 = _interopRequireDefault(_translate);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('app.config', [_translate2.default.name, _material2.default.name, _moment2.default.name, _breadcrumb2.default.name, _formly2.default.name, _map2.default.name, _upload2.default.name, _wizard2.default.name, _jwt2.default.name]);

/***/ },
/* 62 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	ThemeConfig.$inject = ["$mdThemingProvider", "mdcDatetimePickerDefaultLocaleProvider"];
	IconsConfig.$inject = ["$mdIconProvider"];
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var angular = _interopRequireWildcard(_angular);
	
	var _angularMaterial = __webpack_require__(48);
	
	var _angularMaterial2 = _interopRequireDefault(_angularMaterial);
	
	__webpack_require__(63);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }
	
	__webpack_require__(65);
	
	exports.default = angular.module('app.config.material', [_angularMaterial2.default, 'ngMaterialDatePicker']).config(ThemeConfig).config(IconsConfig);
	
	
	function ThemeConfig($mdThemingProvider, mdcDatetimePickerDefaultLocaleProvider) {
	    "ngInject";
	
	    $mdThemingProvider.theme('nexo').primaryPalette('red');
	
	    $mdThemingProvider.theme('default').primaryPalette('grey');
	
	    mdcDatetimePickerDefaultLocaleProvider.setDefaultLocale('es');
	}
	
	function IconsConfig($mdIconProvider) {
	    "ngInject";
	
	    $mdIconProvider.defaultIconSet('/mdi.svg');
	}

/***/ },
/* 63 */,
/* 64 */,
/* 65 */,
/* 66 */,
/* 67 */,
/* 68 */
/***/ function(module, exports, __webpack_require__) {

	var map = {
		"./af": 69,
		"./af.js": 69,
		"./ar": 70,
		"./ar-ma": 71,
		"./ar-ma.js": 71,
		"./ar-sa": 72,
		"./ar-sa.js": 72,
		"./ar-tn": 73,
		"./ar-tn.js": 73,
		"./ar.js": 70,
		"./az": 74,
		"./az.js": 74,
		"./be": 75,
		"./be.js": 75,
		"./bg": 76,
		"./bg.js": 76,
		"./bn": 77,
		"./bn.js": 77,
		"./bo": 78,
		"./bo.js": 78,
		"./br": 79,
		"./br.js": 79,
		"./bs": 80,
		"./bs.js": 80,
		"./ca": 81,
		"./ca.js": 81,
		"./cs": 82,
		"./cs.js": 82,
		"./cv": 83,
		"./cv.js": 83,
		"./cy": 84,
		"./cy.js": 84,
		"./da": 85,
		"./da.js": 85,
		"./de": 86,
		"./de-at": 87,
		"./de-at.js": 87,
		"./de.js": 86,
		"./el": 88,
		"./el.js": 88,
		"./en-au": 89,
		"./en-au.js": 89,
		"./en-ca": 90,
		"./en-ca.js": 90,
		"./en-gb": 91,
		"./en-gb.js": 91,
		"./eo": 92,
		"./eo.js": 92,
		"./es": 93,
		"./es.js": 93,
		"./et": 94,
		"./et.js": 94,
		"./eu": 95,
		"./eu.js": 95,
		"./fa": 96,
		"./fa.js": 96,
		"./fi": 97,
		"./fi.js": 97,
		"./fo": 98,
		"./fo.js": 98,
		"./fr": 99,
		"./fr-ca": 100,
		"./fr-ca.js": 100,
		"./fr.js": 99,
		"./fy": 101,
		"./fy.js": 101,
		"./gl": 102,
		"./gl.js": 102,
		"./he": 103,
		"./he.js": 103,
		"./hi": 104,
		"./hi.js": 104,
		"./hr": 105,
		"./hr.js": 105,
		"./hu": 106,
		"./hu.js": 106,
		"./hy-am": 107,
		"./hy-am.js": 107,
		"./id": 108,
		"./id.js": 108,
		"./is": 109,
		"./is.js": 109,
		"./it": 110,
		"./it.js": 110,
		"./ja": 111,
		"./ja.js": 111,
		"./jv": 112,
		"./jv.js": 112,
		"./ka": 113,
		"./ka.js": 113,
		"./km": 114,
		"./km.js": 114,
		"./ko": 115,
		"./ko.js": 115,
		"./lb": 116,
		"./lb.js": 116,
		"./lt": 117,
		"./lt.js": 117,
		"./lv": 118,
		"./lv.js": 118,
		"./me": 119,
		"./me.js": 119,
		"./mk": 120,
		"./mk.js": 120,
		"./ml": 121,
		"./ml.js": 121,
		"./mr": 122,
		"./mr.js": 122,
		"./ms": 123,
		"./ms-my": 124,
		"./ms-my.js": 124,
		"./ms.js": 123,
		"./my": 125,
		"./my.js": 125,
		"./nb": 126,
		"./nb.js": 126,
		"./ne": 127,
		"./ne.js": 127,
		"./nl": 128,
		"./nl.js": 128,
		"./nn": 129,
		"./nn.js": 129,
		"./pl": 130,
		"./pl.js": 130,
		"./pt": 131,
		"./pt-br": 132,
		"./pt-br.js": 132,
		"./pt.js": 131,
		"./ro": 133,
		"./ro.js": 133,
		"./ru": 134,
		"./ru.js": 134,
		"./si": 135,
		"./si.js": 135,
		"./sk": 136,
		"./sk.js": 136,
		"./sl": 137,
		"./sl.js": 137,
		"./sq": 138,
		"./sq.js": 138,
		"./sr": 139,
		"./sr-cyrl": 140,
		"./sr-cyrl.js": 140,
		"./sr.js": 139,
		"./sv": 141,
		"./sv.js": 141,
		"./ta": 142,
		"./ta.js": 142,
		"./th": 143,
		"./th.js": 143,
		"./tl-ph": 144,
		"./tl-ph.js": 144,
		"./tr": 145,
		"./tr.js": 145,
		"./tzl": 146,
		"./tzl.js": 146,
		"./tzm": 147,
		"./tzm-latn": 148,
		"./tzm-latn.js": 148,
		"./tzm.js": 147,
		"./uk": 149,
		"./uk.js": 149,
		"./uz": 150,
		"./uz.js": 150,
		"./vi": 151,
		"./vi.js": 151,
		"./zh-cn": 152,
		"./zh-cn.js": 152,
		"./zh-tw": 153,
		"./zh-tw.js": 153
	};
	function webpackContext(req) {
		return __webpack_require__(webpackContextResolve(req));
	};
	function webpackContextResolve(req) {
		return map[req] || (function() { throw new Error("Cannot find module '" + req + "'.") }());
	};
	webpackContext.keys = function webpackContextKeys() {
		return Object.keys(map);
	};
	webpackContext.resolve = webpackContextResolve;
	module.exports = webpackContext;
	webpackContext.id = 68;


/***/ },
/* 69 */,
/* 70 */,
/* 71 */,
/* 72 */,
/* 73 */,
/* 74 */,
/* 75 */,
/* 76 */,
/* 77 */,
/* 78 */,
/* 79 */,
/* 80 */,
/* 81 */,
/* 82 */,
/* 83 */,
/* 84 */,
/* 85 */,
/* 86 */,
/* 87 */,
/* 88 */,
/* 89 */,
/* 90 */,
/* 91 */,
/* 92 */,
/* 93 */,
/* 94 */,
/* 95 */,
/* 96 */,
/* 97 */,
/* 98 */,
/* 99 */,
/* 100 */,
/* 101 */,
/* 102 */,
/* 103 */,
/* 104 */,
/* 105 */,
/* 106 */,
/* 107 */,
/* 108 */,
/* 109 */,
/* 110 */,
/* 111 */,
/* 112 */,
/* 113 */,
/* 114 */,
/* 115 */,
/* 116 */,
/* 117 */,
/* 118 */,
/* 119 */,
/* 120 */,
/* 121 */,
/* 122 */,
/* 123 */,
/* 124 */,
/* 125 */,
/* 126 */,
/* 127 */,
/* 128 */,
/* 129 */,
/* 130 */,
/* 131 */,
/* 132 */,
/* 133 */,
/* 134 */,
/* 135 */,
/* 136 */,
/* 137 */,
/* 138 */,
/* 139 */,
/* 140 */,
/* 141 */,
/* 142 */,
/* 143 */,
/* 144 */,
/* 145 */,
/* 146 */,
/* 147 */,
/* 148 */,
/* 149 */,
/* 150 */,
/* 151 */,
/* 152 */,
/* 153 */,
/* 154 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	MomentRun.$inject = ["$rootScope", "$translate", "amMoment", "$timeout"];
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	__webpack_require__(155);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('app.config.moment', ['angularMoment']).run(MomentRun);
	
	
	function MomentRun($rootScope, $translate, amMoment, $timeout) {
	    "ngInject";
	
	    $timeout(function () {
	        return amMoment.changeLocale($translate.use());
	    });
	
	    $rootScope.$on('lang:changed', function (event, lang) {
	
	        // Si es portugues, llamar al portugues brasilero
	        if (lang == 'pt') lang = 'pt-br';
	
	        amMoment.changeLocale(lang);
	    });
	}

/***/ },
/* 155 */,
/* 156 */,
/* 157 */
/***/ function(module, exports, __webpack_require__) {

	var map = {
		"./af": 158,
		"./af.js": 158,
		"./ar": 159,
		"./ar-ma": 160,
		"./ar-ma.js": 160,
		"./ar-sa": 161,
		"./ar-sa.js": 161,
		"./ar-tn": 162,
		"./ar-tn.js": 162,
		"./ar.js": 159,
		"./az": 163,
		"./az.js": 163,
		"./be": 164,
		"./be.js": 164,
		"./bg": 165,
		"./bg.js": 165,
		"./bn": 166,
		"./bn.js": 166,
		"./bo": 167,
		"./bo.js": 167,
		"./br": 168,
		"./br.js": 168,
		"./bs": 169,
		"./bs.js": 169,
		"./ca": 170,
		"./ca.js": 170,
		"./cs": 171,
		"./cs.js": 171,
		"./cv": 172,
		"./cv.js": 172,
		"./cy": 173,
		"./cy.js": 173,
		"./da": 174,
		"./da.js": 174,
		"./de": 175,
		"./de-at": 176,
		"./de-at.js": 176,
		"./de.js": 175,
		"./dv": 177,
		"./dv.js": 177,
		"./el": 178,
		"./el.js": 178,
		"./en-au": 179,
		"./en-au.js": 179,
		"./en-ca": 180,
		"./en-ca.js": 180,
		"./en-gb": 181,
		"./en-gb.js": 181,
		"./en-ie": 182,
		"./en-ie.js": 182,
		"./en-nz": 183,
		"./en-nz.js": 183,
		"./eo": 184,
		"./eo.js": 184,
		"./es": 185,
		"./es-do": 186,
		"./es-do.js": 186,
		"./es.js": 185,
		"./et": 187,
		"./et.js": 187,
		"./eu": 188,
		"./eu.js": 188,
		"./fa": 189,
		"./fa.js": 189,
		"./fi": 190,
		"./fi.js": 190,
		"./fo": 191,
		"./fo.js": 191,
		"./fr": 192,
		"./fr-ca": 193,
		"./fr-ca.js": 193,
		"./fr-ch": 194,
		"./fr-ch.js": 194,
		"./fr.js": 192,
		"./fy": 195,
		"./fy.js": 195,
		"./gd": 196,
		"./gd.js": 196,
		"./gl": 197,
		"./gl.js": 197,
		"./he": 198,
		"./he.js": 198,
		"./hi": 199,
		"./hi.js": 199,
		"./hr": 200,
		"./hr.js": 200,
		"./hu": 201,
		"./hu.js": 201,
		"./hy-am": 202,
		"./hy-am.js": 202,
		"./id": 203,
		"./id.js": 203,
		"./is": 204,
		"./is.js": 204,
		"./it": 205,
		"./it.js": 205,
		"./ja": 206,
		"./ja.js": 206,
		"./jv": 207,
		"./jv.js": 207,
		"./ka": 208,
		"./ka.js": 208,
		"./kk": 209,
		"./kk.js": 209,
		"./km": 210,
		"./km.js": 210,
		"./ko": 211,
		"./ko.js": 211,
		"./ky": 212,
		"./ky.js": 212,
		"./lb": 213,
		"./lb.js": 213,
		"./lo": 214,
		"./lo.js": 214,
		"./lt": 215,
		"./lt.js": 215,
		"./lv": 216,
		"./lv.js": 216,
		"./me": 217,
		"./me.js": 217,
		"./mk": 218,
		"./mk.js": 218,
		"./ml": 219,
		"./ml.js": 219,
		"./mr": 220,
		"./mr.js": 220,
		"./ms": 221,
		"./ms-my": 222,
		"./ms-my.js": 222,
		"./ms.js": 221,
		"./my": 223,
		"./my.js": 223,
		"./nb": 224,
		"./nb.js": 224,
		"./ne": 225,
		"./ne.js": 225,
		"./nl": 226,
		"./nl.js": 226,
		"./nn": 227,
		"./nn.js": 227,
		"./pa-in": 228,
		"./pa-in.js": 228,
		"./pl": 229,
		"./pl.js": 229,
		"./pt": 230,
		"./pt-br": 231,
		"./pt-br.js": 231,
		"./pt.js": 230,
		"./ro": 232,
		"./ro.js": 232,
		"./ru": 233,
		"./ru.js": 233,
		"./se": 234,
		"./se.js": 234,
		"./si": 235,
		"./si.js": 235,
		"./sk": 236,
		"./sk.js": 236,
		"./sl": 237,
		"./sl.js": 237,
		"./sq": 238,
		"./sq.js": 238,
		"./sr": 239,
		"./sr-cyrl": 240,
		"./sr-cyrl.js": 240,
		"./sr.js": 239,
		"./ss": 241,
		"./ss.js": 241,
		"./sv": 242,
		"./sv.js": 242,
		"./sw": 243,
		"./sw.js": 243,
		"./ta": 244,
		"./ta.js": 244,
		"./te": 245,
		"./te.js": 245,
		"./th": 246,
		"./th.js": 246,
		"./tl-ph": 247,
		"./tl-ph.js": 247,
		"./tlh": 248,
		"./tlh.js": 248,
		"./tr": 249,
		"./tr.js": 249,
		"./tzl": 250,
		"./tzl.js": 250,
		"./tzm": 251,
		"./tzm-latn": 252,
		"./tzm-latn.js": 252,
		"./tzm.js": 251,
		"./uk": 253,
		"./uk.js": 253,
		"./uz": 254,
		"./uz.js": 254,
		"./vi": 255,
		"./vi.js": 255,
		"./x-pseudo": 256,
		"./x-pseudo.js": 256,
		"./zh-cn": 257,
		"./zh-cn.js": 257,
		"./zh-tw": 258,
		"./zh-tw.js": 258
	};
	function webpackContext(req) {
		return __webpack_require__(webpackContextResolve(req));
	};
	function webpackContextResolve(req) {
		return map[req] || (function() { throw new Error("Cannot find module '" + req + "'.") }());
	};
	webpackContext.keys = function webpackContextKeys() {
		return Object.keys(map);
	};
	webpackContext.resolve = webpackContextResolve;
	module.exports = webpackContext;
	webpackContext.id = 157;


/***/ },
/* 158 */,
/* 159 */,
/* 160 */,
/* 161 */,
/* 162 */,
/* 163 */,
/* 164 */,
/* 165 */,
/* 166 */,
/* 167 */,
/* 168 */,
/* 169 */,
/* 170 */,
/* 171 */,
/* 172 */,
/* 173 */,
/* 174 */,
/* 175 */,
/* 176 */,
/* 177 */,
/* 178 */,
/* 179 */,
/* 180 */,
/* 181 */,
/* 182 */,
/* 183 */,
/* 184 */,
/* 185 */,
/* 186 */,
/* 187 */,
/* 188 */,
/* 189 */,
/* 190 */,
/* 191 */,
/* 192 */,
/* 193 */,
/* 194 */,
/* 195 */,
/* 196 */,
/* 197 */,
/* 198 */,
/* 199 */,
/* 200 */,
/* 201 */,
/* 202 */,
/* 203 */,
/* 204 */,
/* 205 */,
/* 206 */,
/* 207 */,
/* 208 */,
/* 209 */,
/* 210 */,
/* 211 */,
/* 212 */,
/* 213 */,
/* 214 */,
/* 215 */,
/* 216 */,
/* 217 */,
/* 218 */,
/* 219 */,
/* 220 */,
/* 221 */,
/* 222 */,
/* 223 */,
/* 224 */,
/* 225 */,
/* 226 */,
/* 227 */,
/* 228 */,
/* 229 */,
/* 230 */,
/* 231 */,
/* 232 */,
/* 233 */,
/* 234 */,
/* 235 */,
/* 236 */,
/* 237 */,
/* 238 */,
/* 239 */,
/* 240 */,
/* 241 */,
/* 242 */,
/* 243 */,
/* 244 */,
/* 245 */,
/* 246 */,
/* 247 */,
/* 248 */,
/* 249 */,
/* 250 */,
/* 251 */,
/* 252 */,
/* 253 */,
/* 254 */,
/* 255 */,
/* 256 */,
/* 257 */,
/* 258 */,
/* 259 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Config.$inject = ["$breadcrumbProvider"];
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _breadcrumb = __webpack_require__(260);
	
	var _breadcrumb2 = _interopRequireDefault(_breadcrumb);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	__webpack_require__(261);
	
	exports.default = _angular2.default.module('app.config.breadcrumb', ['ncy-angular-breadcrumb']).config(Config);
	
	
	function Config($breadcrumbProvider) {
	    "ngInject";
	
	    $breadcrumbProvider.setOptions({
	        templateUrl: _breadcrumb2.default
	    });
	}

/***/ },
/* 260 */
/***/ function(module, exports) {

	var path = '/Users/rigobcastro/Code/nexo.dev/angular/app/config/breadcrumb.html';
	var html = "<div>\n    <h3 class=\"md-toolbar-item md-breadcrumb md-headline\">\n        <a href=\"{{step.ncyBreadcrumbLink}}\" ng-repeat=\"step in steps | limitTo:(steps.length-1)\">\n          <span class=\"hide-md hide-sm\" ng-bind-html=\"step.ncyBreadcrumbLabel | translate\">Layout</span>\n          <span class=\"docs-menu-separator-icon hide-md hide-sm\" hide-sm=\"\" hide-md=\"\" style=\"transform: translate3d(0, 1px, 0)\">\n            <md-icon md-svg-icon=\"chevron-right\" aria-hidden=\"true\" style=\"margin-top: -2px\"></md-icon>\n          </span>\n        </a>\n        <span ng-repeat=\"step in steps | limitTo:-1\" class=\"md-breadcrumb-page\" ng-bind-html=\"step.ncyBreadcrumbLabel | translate\"></span>\n    </h3>\n</div>\n";
	window.angular.module('ng').run(['$templateCache', function(c) { c.put(path, html) }]);
	module.exports = path;

/***/ },
/* 261 */,
/* 262 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Config.$inject = ["formlyConfigProvider"];
	Run.$inject = ["formlyValidationMessages", "$translate"];
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _lodash = __webpack_require__(263);
	
	var _lodash2 = _interopRequireDefault(_lodash);
	
	var _angularFormly = __webpack_require__(264);
	
	var _angularFormly2 = _interopRequireDefault(_angularFormly);
	
	var _angularFormlyMaterial = __webpack_require__(266);
	
	var _angularFormlyMaterial2 = _interopRequireDefault(_angularFormlyMaterial);
	
	var _repeatSection = __webpack_require__(267);
	
	var _repeatSection2 = _interopRequireDefault(_repeatSection);
	
	var _inputContainer = __webpack_require__(268);
	
	var _inputContainer2 = _interopRequireDefault(_inputContainer);
	
	var _label = __webpack_require__(269);
	
	var _label2 = _interopRequireDefault(_label);
	
	var _index = __webpack_require__(270);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('app.config.formly', [_angularFormly2.default, _angularFormlyMaterial2.default, _index.Module.name]).config(Config).run(Run);
	
	
	function Config(formlyConfigProvider) {
	    "ngInject";
	
	    /**
	     * Cambiando el wrapper
	     */
	
	    formlyConfigProvider.setWrapper({
	        name: 'inputContainer',
	        templateUrl: _inputContainer2.default,
	        overwriteOk: true
	    });
	
	    formlyConfigProvider.setWrapper({
	        name: 'label',
	        templateUrl: _label2.default,
	        overwriteOk: true
	    });
	
	    for (var i = 0; i < _index.Types.length; i++) {
	        _index.Types[i](formlyConfigProvider);
	    }
	
	    formlyConfigProvider.extras.errorExistsAndShouldBeVisibleExpression = 'fc.$touched || form.$submitted';
	}
	
	function Run(formlyValidationMessages, $translate) {
	    "ngInject";
	
	    formlyValidationMessages.messages.required = '"' + $translate.instant('GLOBAL.VALIDACION.REQUERIDO') + '"';
	}

/***/ },
/* 263 */,
/* 264 */,
/* 265 */,
/* 266 */,
/* 267 */
/***/ function(module, exports) {

	var path = '/Users/rigobcastro/Code/nexo.dev/angular/app/config/formly/repeat-section.html';
	var html = "<div>\n    <!--loop through each element in model array-->\n    <div class=\"{{hideRepeat}}\">\n        <div class=\"repeatsection\" ng-repeat=\"element in model[options.key] track by $index\" ng-init=\"fields = copyFields(to.fields)\">\n\n            <p class=\"text-muted\">{{ to.label }} #{{$index+1}}</p>\n\n            <formly-form fields=\"fields\" model=\"element\" form=\"form\"></formly-form>\n            <div style=\"margin-bottom:20px;\">\n                <button type=\"button\" class=\"btn btn-sm btn-danger\" ng-click=\"model[options.key].splice($index, 1)\" ng-show=\"model[options.key].length > 1\">\n                    Eliminar\n                </button>\n            </div>\n            <hr>\n        </div>\n        <p class=\"AddNewButton\">\n            <button type=\"button\" class=\"btn btn-primary\" ng-click=\"addNew()\">{{to.btnText}}</button>\n        </p>\n    </div>\n</div>\n\n";
	window.angular.module('ng').run(['$templateCache', function(c) { c.put(path, html) }]);
	module.exports = path;

/***/ },
/* 268 */
/***/ function(module, exports) {

	var path = '/Users/rigobcastro/Code/nexo.dev/angular/app/config/formly/input-container.html';
	var html = "\n<md-input-container class=\"md-block\" md-theme=\"{{to.theme}}\">\n    <formly-transclude></formly-transclude>\n</md-input-container>";
	window.angular.module('ng').run(['$templateCache', function(c) { c.put(path, html) }]);
	module.exports = path;

/***/ },
/* 269 */
/***/ function(module, exports) {

	var path = '/Users/rigobcastro/Code/nexo.dev/angular/app/config/formly/label.html';
	var html = "<label for=\"{{id}}\">\n   {{ to.label | translate }}\n</label>\n<formly-transclude></formly-transclude>";
	window.angular.module('ng').run(['$templateCache', function(c) { c.put(path, html) }]);
	module.exports = path;

/***/ },
/* 270 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	exports.Module = exports.Types = undefined;
	
	var _toConsumableArray2 = __webpack_require__(271);
	
	var _toConsumableArray3 = _interopRequireDefault(_toConsumableArray2);
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _index = __webpack_require__(325);
	
	var _index2 = _interopRequireDefault(_index);
	
	var _index3 = __webpack_require__(327);
	
	var _index4 = _interopRequireDefault(_index3);
	
	var _index5 = __webpack_require__(329);
	
	var _index6 = _interopRequireDefault(_index5);
	
	var _index7 = __webpack_require__(331);
	
	var _index8 = _interopRequireDefault(_index7);
	
	var _index9 = __webpack_require__(335);
	
	var _index10 = _interopRequireDefault(_index9);
	
	var _index11 = __webpack_require__(341);
	
	var _index12 = _interopRequireDefault(_index11);
	
	var _index13 = __webpack_require__(343);
	
	var _index14 = _interopRequireDefault(_index13);
	
	var _address = __webpack_require__(345);
	
	var _address2 = _interopRequireDefault(_address);
	
	var _index15 = __webpack_require__(348);
	
	var _index16 = _interopRequireDefault(_index15);
	
	var _index17 = __webpack_require__(371);
	
	var _index18 = _interopRequireDefault(_index17);
	
	var _index19 = __webpack_require__(373);
	
	var _index20 = _interopRequireDefault(_index19);
	
	var _index21 = __webpack_require__(375);
	
	var _index22 = _interopRequireDefault(_index21);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var types = [_index2.default, _index4.default, _index6.default, _index8.default, _index10.default, _index12.default, _index14.default, _address2.default];
	
	// assign fields
	
	
	var Types = exports.Types = [].concat(types, (0, _toConsumableArray3.default)(_index16.default));
	
	var Module = exports.Module = _angular2.default.module('app.config.types', [_index18.default.name, _index20.default.name, _index22.default.name]);

/***/ },
/* 271 */,
/* 272 */,
/* 273 */,
/* 274 */,
/* 275 */,
/* 276 */,
/* 277 */,
/* 278 */,
/* 279 */,
/* 280 */,
/* 281 */,
/* 282 */,
/* 283 */,
/* 284 */,
/* 285 */,
/* 286 */,
/* 287 */,
/* 288 */,
/* 289 */,
/* 290 */,
/* 291 */,
/* 292 */,
/* 293 */,
/* 294 */,
/* 295 */,
/* 296 */,
/* 297 */,
/* 298 */,
/* 299 */,
/* 300 */,
/* 301 */,
/* 302 */,
/* 303 */,
/* 304 */,
/* 305 */,
/* 306 */,
/* 307 */,
/* 308 */,
/* 309 */,
/* 310 */,
/* 311 */,
/* 312 */,
/* 313 */,
/* 314 */,
/* 315 */,
/* 316 */,
/* 317 */,
/* 318 */,
/* 319 */,
/* 320 */,
/* 321 */,
/* 322 */,
/* 323 */,
/* 324 */,
/* 325 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Controller.$inject = ["$scope", "Store"];
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _template = __webpack_require__(326);
	
	var _template2 = _interopRequireDefault(_template);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = function (formlyConfigProvider) {
	    formlyConfigProvider.setType({
	        template: _template2.default,
	        name: 'autocomplete',
	        wrapper: ['messages'],
	        controller: Controller,
	        defaultOptions: {
	            templateOptions: {
	                labelProp: 'name',
	                valueProp: 'id',
	                disabled: false,
	                noCache: false,
	                minLength: 0,
	                limit: 30,
	                resourceParams: {},
	                resourceOptions: {}
	            },
	            ngModelAttrs: {
	                required: {
	                    attribute: '',
	                    bound: ''
	                }
	            }
	        },
	        apiCheck: function apiCheck(check) {
	            return {
	                templateOptions: {
	                    resourceName: check.string.optional,
	                    resourceParams: check.object.optional,
	                    resourceOptions: check.object.optional,
	                    disabled: check.bool.optional,
	                    noCache: check.bool.optional,
	                    labelProp: check.string.optional,
	                    valueProp: check.string.optional,
	                    onClose: check.func.optional,
	                    onOpen: check.func.optional,
	                    theme: check.string.optional,
	                    minLength: check.number.optional,
	                    maxLength: check.number.optional,
	                    limit: check.number.optional
	                }
	            };
	        }
	    });
	};
	
	function Controller($scope, Store) {
	    "ngInject";
	
	    var valueProp = _.get($scope, 'to.valueProp', false),
	        resourceName = $scope.to.resourceName;
	
	    $scope.search = search;
	    $scope.selectedItemChange = selectedItemChange;
	    $scope.items = [];
	
	    var unwatchModel = $scope.$watch('model.' + $scope.options.key, function (nv, ov) {
	        if (nv) {
	            var item = Store.get(resourceName, nv);
	
	            if (item) {
	                $scope.searchText = item[$scope.to.labelProp];
	                $scope.items.push(item);
	            } else {
	                Store.find(resourceName, nv).then(function (response) {
	                    $scope.searchText = response[$scope.to.labelProp];
	                    $scope.items.push(response);
	                });
	            }
	        }
	        unwatchModel();
	    });
	
	    function search(query) {
	        var queryParams = {
	            search: query,
	            limit: $scope.to.limit,
	            t: _.now() + 1
	        };
	
	        Store.findAll(resourceName, angular.extend(queryParams, $scope.to.resourceParams), $scope.to.resourceOptions).then(function (response) {
	            return $scope.items = response.data;
	        });
	    }
	
	    function selectedItemChange(item) {
	        var value = item;
	
	        if (!_.isEmpty(valueProp)) {
	            value = _.get(item, valueProp);
	        }
	
	        if (_.isUndefined(item)) {
	            if (_.has($scope.model, $scope.options.key)) {
	                delete $scope.model[$scope.options.key];
	            }
	        } else {
	            _.set($scope.model, $scope.options.key, value);
	        }
	    }
	}

/***/ },
/* 326 */
/***/ function(module, exports) {

	module.exports = "<md-autocomplete\n        ng-disabled=\"to.disabled\"\n        ng-required=\"to.required\"\n        md-input-name=\"{{ options.name }}\"\n        md-no-cache=\"to.noCache\"\n        md-selected-item=\"selectedItem\"\n        md-search-text=\"searchText\"\n        md-search-text-change=\"search(searchText)\"\n        md-selected-item-change=\"selectedItemChange(item)\"\n        md-items=\"item in items\"\n        md-item-text=\"item[to.labelProp]\"\n        md-theme=\"{{ to.theme }}\"\n        md-floating-label=\"{{ to.label | translate }}\">\n    <md-item-template>\n        <span md-highlight-text=\"searchText\" md-highlight-flags=\"^i\">{{ item[to.labelProp] }}</span>\n    </md-item-template>\n    <md-not-found>\n        <span translate=\"FORMS.CAMPOS.AUTOCOMPLETAR.NO_HAY_RESULTADOS\" translate-value-texto=\"searchText\"></span>\n    </md-not-found>\n\n</md-autocomplete>";

/***/ },
/* 327 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Controller.$inject = ["$scope", "Store"];
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _template = __webpack_require__(328);
	
	var _template2 = _interopRequireDefault(_template);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = function (formlyConfigProvider) {
	    formlyConfigProvider.setType({
	        template: _template2.default,
	        name: 'autocomplete-kendo',
	        wrapper: ['messages'],
	        controller: Controller,
	        defaultOptions: {
	            templateOptions: {
	                labelProp: 'name',
	                valueProp: 'id',
	                disabled: false,
	                noCache: false,
	                minLength: 0,
	                limit: 30,
	                resourceParams: {},
	                resourceOptions: {}
	            },
	            ngModelAttrs: {
	                required: {
	                    attribute: '',
	                    bound: ''
	                }
	            }
	        },
	        apiCheck: function apiCheck(check) {
	            return {
	                templateOptions: {
	                    resourceName: check.string.optional,
	                    resourceParams: check.object.optional,
	                    resourceOptions: check.object.optional,
	                    disabled: check.bool.optional,
	                    noCache: check.bool.optional,
	                    labelProp: check.string.optional,
	                    valueProp: check.string.optional,
	                    onClose: check.func.optional,
	                    onOpen: check.func.optional,
	                    theme: check.string.optional,
	                    minLength: check.number.optional,
	                    maxLength: check.number.optional,
	                    limit: check.number.optional
	                }
	            };
	        }
	    });
	};
	
	function Controller($scope, Store) {
	    "ngInject";
	
	    $scope.valueProp = _.get($scope, 'to.valueProp', false);
	    $scope.labelProp = _.get($scope, 'to.labelProp', false);
	    var resourceName = $scope.to.resourceName;
	
	    $scope.items = new kendo.data.DataSource({
	        type: "odata",
	        serverFiltering: false,
	        transport: {
	            read: {
	                type: "get",
	                dataType: "json",
	                url: "http://qa.nexologistica.com/api/customers?t=1468534255054&include=addresses&token=" + window.NEXO.token + "&team_id=zean8qpejzr5gxlepm39a4kbo7d6rq"
	            }
	        },
	        schema: {
	            data: function data(response) {
	                console.log(response.data);
	                return response.data;
	            }
	        }
	    });
	    /*let queryParams = {
	        search: 'a',
	        limit: $scope.to.limit,
	        t: _.now() + 1
	    };
	     Store.findAll(resourceName, angular.extend(queryParams, $scope.to.resourceParams), $scope.to.resourceOptions).then((response) => {$scope.items = response.data; console.log($scope.items)});*/
	}

/***/ },
/* 328 */
/***/ function(module, exports) {

	module.exports = "<select kendo-combo-box\n    ng-disabled=\"to.disabled\"\n    ng-required=\"to.required\"\n    k-placeholder=\"'Seleccione'\"\n    k-data-text-field=\"labelProp\"\n    k-data-value-field=\"valueProp\"\n    k-filter=\"'contains'\"\n    k-auto-bind=\"false\"\n    k-min-length=\"1\"\n    k-data-source=\"items.data\"\n    k-ng-model=\"kendoAuto\"\n    style=\"width: 100%\" >\n</select>\n<p class=\"demo-hint\">Your selection: {{ model[options.key] }}</p>\n<p class=\"demo-hint\">Your selection: {{ kendoAuto }}</p>\n<pre>\n  {{ items | json}}\n</pre>\n";

/***/ },
/* 329 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Controller.$inject = ["$scope"];
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _template = __webpack_require__(330);
	
	var _template2 = _interopRequireDefault(_template);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = function (formlyConfigProvider) {
	    formlyConfigProvider.setType({
	        template: _template2.default,
	        name: 'repeatSection',
	        controller: Controller
	    });
	};
	
	var unique = 1;
	
	function Controller($scope) {
	    "ngInject";
	
	    var addNew, _addRandomIds, checkValidity, copyFields, getRandomInt, unwatchFormControl;
	    _addRandomIds = function addRandomIds(fields) {
	        unique++;
	        angular.forEach(fields, function (field, index) {
	            if (field.fieldGroup) {
	                _addRandomIds(field.fieldGroup);
	                return;
	            }
	            if (field.templateOptions && field.templateOptions.fields) {
	                _addRandomIds(field.templateOptions.fields);
	            }
	            field.id = field.id || field.key + '_' + index + '_' + unique + getRandomInt(0, 9999);
	        });
	    };
	    copyFields = function copyFields(fields) {
	        fields = angular.copy(fields);
	        _addRandomIds(fields);
	        return fields;
	    };
	    addNew = function addNew() {
	        var newsection, repeatsection;
	        $scope.model[$scope.options.key] = $scope.model[$scope.options.key] || [];
	        repeatsection = $scope.model[$scope.options.key];
	        newsection = {};
	        repeatsection.push(newsection);
	    };
	    getRandomInt = function getRandomInt(min, max) {
	        Math.floor(Math.random() * (max - min)) + min;
	        $scope.formOptions = {
	            formState: $scope.formState
	        };
	        $scope.addNew = addNew;
	        return $scope.copyFields = copyFields;
	    };
	    $scope.formOptions = {
	        formState: $scope.formState
	    };
	    $scope.addNew = addNew;
	    $scope.copyFields = copyFields;
	    if (_.isEmpty($scope.model[$scope.options.key])) {
	        $scope.model[$scope.options.key] = [{}];
	    }
	    checkValidity = function checkValidity(expression) {
	        var valid;
	        if ($scope.to.required) {
	            valid = false;
	            expression;
	            return $scope.fc.$setValidity('required', valid);
	        }
	    };
	    if ($scope.to.required) {
	        return unwatchFormControl = $scope.$watch('fc', function (nv) {
	            if (!nv) {
	                return;
	            }
	            checkValidity(true);
	            unwatchFormControl();
	            return $scope.$watch("model." + $scope.options.key, function (nv) {
	                return checkValidity(true);
	            });
	        });
	    }
	}

/***/ },
/* 330 */
/***/ function(module, exports) {

	module.exports = "<div class=\"column\">\n    <!--loop through each element in model array-->\n    <div class=\"{{hideRepeat}}\">\n        <div class=\"repeatsection\" ng-repeat=\"element in model[options.key] track by $index\" ng-init=\"fields = copyFields(to.fields)\">\n\n            <div layout=\"row\" layout-fill>\n                <h4 flex>{{ to.label }} #{{$index+1}}</h4>\n                <div flex class=\"ta-r\">\n                    <md-button class=\"md-raised\" ng-click=\"model[options.key].splice($index, 1)\" ng-show=\"model[options.key].length > 1\">\n                        Eliminar\n                    </md-button>\n                </div>\n            </div>\n\n            <formly-form fields=\"fields\" model=\"element\" form=\"form\"></formly-form>\n        </div>\n        <md-button class=\"md-raised\" ng-click=\"addNew()\">\n            {{to.btnText}}\n        </md-button>\n    </div>\n</div>\n\n";

/***/ },
/* 331 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Controller.$inject = ["Upload", "$scope", "$mdMedia", "$mdDialog"];
	DialogController.$inject = ["$scope", "$mdDialog", "image"];
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _template = __webpack_require__(332);
	
	var _template2 = _interopRequireDefault(_template);
	
	var _dialog = __webpack_require__(333);
	
	var _dialog2 = _interopRequireDefault(_dialog);
	
	__webpack_require__(334);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = function (formlyConfigProvider) {
	    formlyConfigProvider.setType({
	        template: _template2.default,
	        name: 'image',
	        controller: Controller
	    });
	};
	
	function Controller(Upload, $scope, $mdMedia, $mdDialog) {
	    "ngInject";
	
	    $scope.croppedDataUrl = null;
	
	    $scope.upload = function (dataUrl, name) {
	        Upload.upload({
	            url: 'https://angular-file-upload-cors-srv.appspot.com/upload',
	            data: {
	                file: Upload.dataUrltoBlob(dataUrl, name)
	            }
	        }).then(function (response) {
	            $timeout(function () {
	                $scope.result = response.data;
	            });
	        }, function (response) {
	            if (response.status > 0) $scope.errorMsg = response.status + ': ' + response.data;
	        }, function (evt) {
	            $scope.progress = parseInt(100.0 * evt.loaded / evt.total);
	        });
	    };
	
	    $scope.customFullscreen = $mdMedia('xs') || $mdMedia('sm');
	
	    $scope.openResizeImageDialog = function () {
	        if ($scope.image) {
	
	            var useFullScreen = ($mdMedia('sm') || $mdMedia('xs')) && $scope.customFullscreen;
	            $mdDialog.show({
	                controller: DialogController,
	                templateUrl: _dialog2.default,
	                parent: _angular2.default.element(document.body),
	                clickOutsideToClose: false,
	                fullscreen: useFullScreen,
	                locals: {
	                    image: $scope.image
	                }
	            }).then(function (croppedDataUrl) {
	                $scope.model[$scope.options.key] = croppedDataUrl;
	            });
	
	            $scope.$watch(function () {
	                return $mdMedia('xs') || $mdMedia('sm');
	            }, function (wantsFullScreen) {
	                $scope.customFullscreen = wantsFullScreen === true;
	            });
	        }
	    };
	
	    $scope.$watch(function () {
	        return $scope.model[$scope.options.key];
	    }, function (nv) {
	        $scope.croppedDataUrl = nv;
	    });
	}
	
	function DialogController($scope, $mdDialog, image) {
	    "ngInject";
	
	    $scope.croppedDataUrl = '';
	    $scope.image = image;
	
	    $scope.hide = function () {
	        $mdDialog.hide();
	    };
	    $scope.cancel = function () {
	        $mdDialog.cancel();
	    };
	    $scope.save = function () {
	        $mdDialog.hide($scope.croppedDataUrl);
	    };
	}

/***/ },
/* 332 */
/***/ function(module, exports) {

	module.exports = "<!--\n\n-->\n\n<div ngf-select\n     ngf-change=\"openResizeImageDialog($files, $file, $newFiles, $duplicateFiles, $invalidFiles, $event)\"\n     ngf-drop\n     ng-model=\"image\"\n     accept=\"image/*\"\n     ngf-pattern=\"image/*\"\n     class=\"nx-image-field\"\n     layout=\"column\"\n     layout-align=\"center center\">\n\n    <md-icon md-svg-icon=\"file-image\" ng-hide=\"!!croppedDataUrl\"></md-icon>\n    <div class=\"md-caption\" ng-hide=\"!!croppedDataUrl\">\n        {{ to.placeholder || 'Seleccione o arrastre la imagen' }}\n    </div>\n\n    <img ng-src=\"{{croppedDataUrl}}\" ng-if=\"croppedDataUrl\" />\n</div>\n";

/***/ },
/* 333 */
/***/ function(module, exports) {

	var path = '/Users/rigobcastro/Code/nexo.dev/angular/app/config/formly/types/image/dialog.html';
	var html = "<md-dialog class=\"nx-image-field-dialog\" aria-label=\"Recortar image\" ng-cloak md-theme=\"nexo\">\n        <md-toolbar>\n            <div class=\"md-toolbar-tools\">\n                <h2>Recortar imagen</h2>\n            </div>\n        </md-toolbar>\n        <md-dialog-content>\n            <div class=\"md-dialog-content\">\n                <img-crop image=\"image | ngfDataUrl\"\n                          result-image=\"croppedDataUrl\"\n                          area-type=\"square\">\n                </img-crop>\n            </div>\n        </md-dialog-content>\n        <md-dialog-actions layout=\"row\">\n            <span flex></span>\n            <md-button ng-click=\"save()\" class=\"mr\">\n                Guardar\n            </md-button>\n        </md-dialog-actions>\n</md-dialog>";
	window.angular.module('ng').run(['$templateCache', function(c) { c.put(path, html) }]);
	module.exports = path;

/***/ },
/* 334 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 335 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Controller.$inject = ["$scope"];
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _keys = __webpack_require__(336);
	
	var _keys2 = _interopRequireDefault(_keys);
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _template = __webpack_require__(340);
	
	var _template2 = _interopRequireDefault(_template);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = function (formlyConfigProvider) {
	    formlyConfigProvider.setType({
	        template: _template2.default,
	        name: 'checkboxes',
	        wrapper: ['messages'],
	        controller: Controller,
	        defaultOptions: {
	            templateOptions: {
	                disabled: false
	            },
	            ngModelAttrs: {
	                disabled: {
	                    bound: 'ng-disabled'
	                },
	                onClose: {
	                    bound: 'md-on-close'
	                },
	                onOpen: {
	                    bound: 'md-on-open'
	                }
	            }
	        },
	        apiCheck: function apiCheck(check) {
	            return {
	                templateOptions: {
	                    disabled: check.bool.optional,
	                    options: check.arrayOf(check.object),
	                    labelProp: check.string.optional,
	                    valueProp: check.string.optional,
	                    onClose: check.func.optional,
	                    onOpen: check.func.optional,
	                    theme: check.string.optional
	                }
	            };
	        }
	    });
	};
	
	function Controller($scope) {
	    "ngInject";
	
	    var to = $scope.to;
	    var opts = $scope.options;
	
	    $scope.multiCheckbox = {
	        checked: [],
	        change: setModel
	    };
	
	    // initialize the checkboxes check property
	    $scope.$watch('model', function modelWatcher(newModelValue) {
	        var modelValue = void 0,
	            valueProp = void 0;
	        if ((0, _keys2.default)(newModelValue).length) {
	            modelValue = newModelValue[opts.key];
	            $scope.$watch('to.options', function optionsWatcher(newOptionsValues) {
	                if (newOptionsValues && Array.isArray(newOptionsValues) && Array.isArray(modelValue)) {
	                    valueProp = to.valueProp || 'value';
	                    for (var index = 0; index < newOptionsValues.length; index++) {
	                        $scope.multiCheckbox.checked[index] = modelValue.indexOf(newOptionsValues[index][valueProp]) !== -1;
	                    }
	                }
	            });
	        }
	    }, true);
	
	    function checkValidity(expressionValue) {
	        if ($scope.to.required) {
	            var valid = _angular2.default.isArray($scope.model[opts.key]) && $scope.model[opts.key].length > 0 && expressionValue;
	
	            $scope.fc.$setValidity('required', valid);
	        }
	    }
	
	    function setModel() {
	        $scope.model[opts.key] = [];
	        _angular2.default.forEach($scope.multiCheckbox.checked, function (checkbox, index) {
	            if (checkbox) {
	                $scope.model[opts.key].push(to.options[index][to.valueProp || 'value']);
	            }
	        });
	
	        // Must make sure we mark as touched because only the last checkbox due to a bug in angular.
	        $scope.fc.$setTouched();
	        checkValidity(true);
	
	        if ($scope.to.onChange) {
	            $scope.to.onChange();
	        }
	    }
	
	    if (opts.expressionProperties && opts.expressionProperties['templateOptions.required']) {
	        $scope.$watch(function () {
	            return $scope.to.required;
	        }, function (newValue) {
	            checkValidity(newValue);
	        });
	    }
	
	    if ($scope.to.required) {
	        var unwatchFormControl = $scope.$watch('fc', function (newValue) {
	            if (!newValue) {
	                return;
	            }
	
	            checkValidity(true);
	
	            unwatchFormControl();
	        });
	    }
	}

/***/ },
/* 336 */,
/* 337 */,
/* 338 */,
/* 339 */,
/* 340 */
/***/ function(module, exports) {

	module.exports = "<label class=\"md-single-label\">{{ to.label }}</label>\n\n<div class=\"mt mb\" layout=\"column\">\n    <div flex ng-repeat=\"item in to.options\">\n        <md-checkbox ng-model=\"multiCheckbox.checked[$index]\" ng-change=\"multiCheckbox.change()\">\n            {{ item[to.labelProp || ''] }}\n        </md-checkbox>\n    </div>\n</div>";

/***/ },
/* 341 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Controller.$inject = ["$scope"];
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _template = __webpack_require__(342);
	
	var _template2 = _interopRequireDefault(_template);
	
	var _moment = __webpack_require__(156);
	
	var _moment2 = _interopRequireDefault(_moment);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = function (formlyConfigProvider) {
	    formlyConfigProvider.setType({
	        template: _template2.default,
	        name: 'datetime-picker',
	        wrapper: ['label', 'messages', 'inputContainer'],
	        controller: Controller,
	        defaultOptions: {
	            templateOptions: {
	                disabled: false,
	                format: 'YYYY-MM-DD HH:mm',
	                showDate: true,
	                showTime: true,
	                shortTime: true,
	                cancelText: 'Cancelar',
	                okText: 'Seleccionar'
	            },
	            ngModelAttrs: {
	                disabled: {
	                    bound: 'ng-disabled'
	                },
	                minDate: {
	                    bound: 'min-date'
	                },
	                maxDate: {
	                    bound: 'max-date'
	                },
	                showDate: {
	                    bound: 'date'
	                },
	                showTime: {
	                    bound: 'time'
	                },
	                shortTime: {
	                    bound: 'short-time'
	                }
	            }
	        },
	        apiCheck: function apiCheck(check) {
	            return {
	                templateOptions: {
	                    disabled: check.bool.optional,
	                    showDate: check.bool.optional,
	                    showTime: check.bool.optional,
	                    shortTime: check.bool.optional,
	                    format: check.string.optional,
	                    labelProp: check.string.optional,
	                    valueProp: check.string.optional,
	                    cancelText: check.string.optional,
	                    okText: check.string.optional,
	                    minDate: check.instanceOf(Date).optional,
	                    maxDate: check.instanceOf(Date).optional,
	                    theme: check.string.optional
	                }
	            };
	        }
	    });
	};
	
	function Controller($scope) {
	    "ngInject";
	
	    $scope.$watch('model.' + $scope.options.key, function (currentDate) {
	        if (currentDate) {
	            var momentDate = currentDate;
	
	            if (!_moment2.default.isMoment(currentDate)) {
	                momentDate = (0, _moment2.default)(currentDate);
	            }
	            $scope.model[$scope.options.key] = momentDate.format($scope.to.format);
	        }
	    });
	}

/***/ },
/* 342 */
/***/ function(module, exports) {

	module.exports = "<input mdc-datetime-picker type=\"text\" ng-model=\"model[options.key]\" format=\"{{ to.format }}\" cancel-text=\"{{ to.cancelText }}\" ok-text=\"{{ to.okText }}\" ng-required=\"to.required\" lang=\"es\">";

/***/ },
/* 343 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _template = __webpack_require__(344);
	
	var _template2 = _interopRequireDefault(_template);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = function (formlyConfigProvider) {
	    formlyConfigProvider.setType({
	        template: _template2.default,
	        name: 'select-item',
	        extends: 'select'
	    });
	};

/***/ },
/* 344 */
/***/ function(module, exports) {

	module.exports = "<md-select ng-model=\"model[options.key]\" md-theme=\"{{to.theme}}\">\n    <md-option ng-repeat=\"option in to.options\" ng-value=\"option[to.valueProp || 'id']\">\n        {{ option[to.labelProp || 'name'] }}\n    </md-option>\n</md-select>";

/***/ },
/* 345 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Controller.$inject = ["$scope", "uiGmapIsReady", "uiGmapGoogleMapApi", "$timeout"];
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _template = __webpack_require__(346);
	
	var _template2 = _interopRequireDefault(_template);
	
	var _searchbox = __webpack_require__(347);
	
	var _searchbox2 = _interopRequireDefault(_searchbox);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = function (formlyConfigProvider) {
	    formlyConfigProvider.setType({
	        template: _template2.default,
	        name: 'address',
	        wrapper: ['label', 'messages'],
	        controller: Controller,
	        defaultOptions: {
	            templateOptions: {
	                disabled: false
	            },
	            ngModelAttrs: {
	                disabled: {
	                    bound: 'ng-disabled'
	                }
	            }
	        },
	        apiCheck: function apiCheck(check) {
	            return {
	                templateOptions: {
	                    disabled: check.bool.optional,
	                    theme: check.string.optional
	                }
	            };
	        }
	    });
	};
	
	function Controller($scope, uiGmapIsReady, uiGmapGoogleMapApi, $timeout) {
	    "ngInject";
	
	    console.log($scope.model);
	
	    $scope.addressOptions = {
	        types: ['address']
	    };
	
	    $scope.address = {};
	
	    $scope.model.latitude = $scope.model.latitude || 4.6486259;
	    $scope.model.longitude = $scope.model.longitude || -74.247892;
	
	    $scope.map = {
	        id: $scope.model.id,
	        center: {
	            latitude: $scope.model.latitude,
	            longitude: $scope.model.longitude
	        },
	        zoom: 16,
	        options: {
	            scrollwheel: false,
	            disableDefaultUI: false
	        }
	    };
	
	    uiGmapGoogleMapApi.then(function (GoogleMaps) {
	
	        $scope.show = true;
	
	        $scope.marker = {
	            id: 0,
	            coords: {
	                latitude: angular.copy($scope.model.latitude),
	                longitude: angular.copy($scope.model.longitude)
	            },
	            options: {
	                draggable: true
	            },
	            events: {
	                dragend: function dragend(marker, eventName, args) {
	                    var lat = marker.getPosition().lat();
	                    var lon = marker.getPosition().lng();
	
	                    $scope.model.latitude = lat;
	                    $scope.model.longitude = lon;
	                }
	            }
	        };
	
	        $scope.searchbox = {
	            template: _searchbox2.default,
	            events: {
	                place_changed: function place_changed(autocomplete) {
	                    console.log('place', autocomplete);
	                }
	            }
	        };
	
	        uiGmapIsReady.promise(1).then(function (instances) {
	            instances.forEach(function (inst) {
	                var map = inst.map,
	                    center = new google.maps.LatLng($scope.model.latitude, $scope.model.longitude);
	
	                google.maps.event.trigger(map, 'resize');
	                map.panTo(center);
	
	                // Watcheando address
	                $scope.$watch('address', function (address) {
	                    console.log(address);
	                    if (address) {
	                        console.log('entre');
	                        var newMarkerLocation = _.get(address, 'place.geometry.location');
	
	                        if (newMarkerLocation) {
	                            map.panTo(newMarkerLocation);
	
	                            $scope.marker.coords = {
	                                latitude: newMarkerLocation.lat(),
	                                longitude: newMarkerLocation.lng()
	                            };
	
	                            $scope.model.latitude = angular.copy($scope.marker.coords.latitude);
	                            $scope.model.longitude = angular.copy($scope.marker.coords.longitude);
	
	                            $scope.model.city = address.components.city;
	                            $scope.model.country = address.components.country;
	                            $scope.model.country_code = address.components.countryCode;
	                            $scope.model.district = address.components.district;
	                            $scope.model.state = address.components.state;
	                            $scope.model.street = _.get(address, 'place.name');
	                            $scope.model.street_number = address.components.streetNumber;
	                            $scope.model.place_id = address.components.placeId;
	                            $scope.model.is_autocompleted = 1;
	
	                            $scope.model.address = _.get(address, 'place.formatted_address');
	                            $scope.model.vicinity = _.get(address, 'place.vicinity');
	
	                            console.log('MODEL', address);
	                        }
	                    }
	                }, true);
	
	                var unwatch = $scope.$watch('model.' + $scope.options.key, function (nv) {
	                    _.set($scope.address, 'name', nv);
	                    unwatch();
	                });
	            });
	        });
	    });
	}

/***/ },
/* 346 */
/***/ function(module, exports) {

	module.exports = "<h5 class=\"noteAddress\">Nota: Se debe colocar la dirección y la ciudad para que la busqueda sea mas exacta\n    <br><br>\n    Ejemplo: Cl. 22 #2-45, Bogotá\n</h5>\n\n<md-input-container class=\"md-block\" md-theme=\"nexo\" md-no-float >\n    <input\n        ng-if=\"show\"\n        vs-google-autocomplete=\"addressOptions\"\n        ng-model=\"address.name\"\n        vs-place=\"address.place\"\n        vs-place-id=\"address.components.placeId\"\n        vs-street-number=\"address.components.streetNumber\"\n        vs-street=\"address.components.street\"\n        vs-city=\"address.components.city\"\n        vs-state=\"address.components.state\"\n        vs-country-short=\"address.components.countryCode\"\n        vs-country=\"address.components.country\"\n        vs-district = \"address.components.district\"\n        name=\"address\"\n        type=\"text\"\n        placeholder=\"Escriba la dirección y seleccionela del listado\">\n\n</md-input-container>\n\n<ui-gmap-google-map center=\"map.center\" zoom=\"map.zoom\" draggable=\"true\" options=\"map.options\">\n    <ui-gmap-marker idKey='marker.id' coords='marker.coords' events='marker.events' options=\"marker.options\"></ui-gmap-marker>\n</ui-gmap-google-map>\n";

/***/ },
/* 347 */
/***/ function(module, exports) {

	var path = '/Users/rigobcastro/Code/nexo.dev/angular/app/config/formly/types/address/searchbox.html';
	var html = "<md-input-container>\n  <label>Buscar</label>\n    <input type=\"text\" placeholder=\"Search\">\n</md-input-container>\n";
	window.angular.module('ng').run(['$templateCache', function(c) { c.put(path, html) }]);
	module.exports = path;

/***/ },
/* 348 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _index = __webpack_require__(349);
	
	var _index2 = _interopRequireDefault(_index);
	
	var _index3 = __webpack_require__(358);
	
	var _index4 = _interopRequireDefault(_index3);
	
	var _index5 = __webpack_require__(361);
	
	var _index6 = _interopRequireDefault(_index5);
	
	var _index7 = __webpack_require__(369);
	
	var _index8 = _interopRequireDefault(_index7);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = [_index2.default, _index4.default, _index6.default, _index8.default];

/***/ },
/* 349 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Controller.$inject = ["Store", "$scope", "$mdDialog", "$timeout"];
	DialogEditAddressController.$inject = ["$log", "$scope", "$mdDialog", "addressId", "Store", "CustomerForm"];
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _template = __webpack_require__(350);
	
	var _template2 = _interopRequireDefault(_template);
	
	var _dialog = __webpack_require__(351);
	
	var _dialog2 = _interopRequireDefault(_dialog);
	
	var _lodash = __webpack_require__(263);
	
	var _lodash2 = _interopRequireDefault(_lodash);
	
	var _store = __webpack_require__(352);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = function (formlyConfigProvider) {
	    formlyConfigProvider.setType({
	        template: _template2.default,
	        name: 'customerAddress',
	        controller: Controller,
	        wrapper: ['inputContainer'],
	        defaultOptions: {
	            noFormControl: false,
	            ngModelAttrs: {
	                required: {
	                    attribute: '',
	                    bound: ''
	                }
	            }
	        },
	        apiCheck: function apiCheck(check) {
	            return {
	                templateOptions: {
	                    disabled: check.bool.optional,
	                    labelProp: check.string.optional,
	                    valueProp: check.string.optional,
	                    theme: check.string.optional,
	                    required: check.bool.optional
	                }
	            };
	        }
	    });
	};
	
	function Controller(Store, $scope, $mdDialog, $timeout) {
	    "ngInject";
	
	    var opts = $scope.options;
	    var key = opts.key;
	
	    $scope.editAddress = function (ev, index, address) {
	        $mdDialog.show({
	            event: ev,
	            controller: DialogEditAddressController,
	            template: _dialog2.default,
	            parent: angular.element(document.body),
	            clickOutsideToClose: true,
	            locals: {
	                addressId: address.id
	            }
	        });
	    };
	
	    $scope.select = function (item) {
	        $scope.model[$scope.options.key] = item.id;
	
	        // Setteando variables de ubicación al modelo
	        var coords = _lodash2.default.pick(item, ['latitude', 'longitude']);
	        _lodash2.default.set($scope.model, 'latitude', _lodash2.default.get(coords, 'latitude'));
	        _lodash2.default.set($scope.model, 'longitude', _lodash2.default.get(coords, 'longitude'));
	        _lodash2.default.set($scope.model, 'map', item.map);
	        _lodash2.default.set($scope.model, 'address', item.address);
	        _lodash2.default.set($scope.model, 'city_id', item.city_id);
	        _lodash2.default.set($scope.model, 'city', item.city);
	
	        $scope.fc.$setTouched();
	        checkValidity(true);
	    };
	
	    $scope.isSelected = function (item) {
	        return $scope.model[$scope.options.key] == item.id;
	    };
	
	    $scope.fix = function ($event, item) {
	        item.fixing = true;
	
	        Store.mapper('address').fix(item.customer_id, item.id).then(function (response) {
	            $scope.$apply(function () {
	                item.fixing = false;
	            });
	            loadAddresses(item.customer_id);
	        }, function (errorResponse) {
	            item.fixing = false;
	            item.errorFixing = true;
	        });
	    };
	
	    $scope.$watch('model.customer_id', function (customerId) {
	        if (customerId) {
	            var customer = _store.store.get('customer', customerId);
	
	            if (!_lodash2.default.isEmpty(customer)) {
	                $scope.addresses = _lodash2.default.get(customer, 'addresses', []);
	                console.log('1', $scope.addresses);
	            } else {
	                loadAddresses(customerId);
	            }
	        }
	    });
	
	    if ($scope.to.required) {
	        var unwatchFormControl = $scope.$watch('fc', function (newValue) {
	            if (!newValue) {
	                return;
	            }
	            checkValidity(true);
	            unwatchFormControl();
	        });
	    }
	
	    function loadAddresses(customerId) {
	        console.debug('--- Loading addresses ==> ', customerId);
	
	        $scope.loading = true;
	        $scope.addresses = [];
	        _store.store.findAll('address', {
	            customer_id: customerId
	        }).then(function (response) {
	
	            $scope.$apply(function () {
	                $scope.addresses.data = _lodash2.default.get(response, 'data', response);
	                console.log('2', $scope.addresses);
	                $scope.loading = false;
	            });
	
	            console.debug('--- Loaded addresses ==> ', $scope.addresses);
	        }, function (errorResponse) {
	            console.error('--- Loaded addresses ==> ', errorResponse);
	            $scope.loading = false;
	        });
	    }
	
	    function checkValidity() {
	        if ($scope.to.required) {
	            var valid = angular.isDefined($scope.model[$scope.options.key]);
	            $scope.fc.$setValidity('required', valid);
	        }
	    }
	}
	
	function DialogEditAddressController($log, $scope, $mdDialog, addressId, Store, CustomerForm) {
	    "ngInject";
	
	    var address = _store.store.get('address', addressId);
	
	    $scope.model = _lodash2.default.pick(address, ['place_id', 'address', 'latitude', 'longitude', 'street', 'street_number', 'city', 'district', 'state', 'country', 'country_code', 'observations', 'vicinity', 'is_autocompleted']);
	
	    $scope.fields = _lodash2.default.get(CustomerForm, 'addresses.0.templateOptions.fields', {});
	
	    $scope.hide = function () {
	        $mdDialog.hide();
	    };
	
	    $scope.cancel = function () {
	        $mdDialog.cancel();
	    };
	
	    $scope.save = function () {
	        $scope.saving = true;
	        Store.onUpdate('address', address.id, $scope.model, {
	            params: {
	                customer_id: address.customer_id
	            }
	        }).then(function (response) {
	            $mdDialog.hide(response);
	        }, function () {
	            return $scope.saving = false;
	        });
	    };
	}

/***/ },
/* 350 */
/***/ function(module, exports) {

	module.exports = "<div class=\"md-single-label\" translate=\"FORMS.ASSIGN.SELECCIONAR_DIRECCION\"></div>\n\n<div class=\"mt\" layout=\"row\" layout-margin flex>\n\n    <div ng-if=\"loading\">\n        <md-progress-circular md-mode=\"indeterminate\" md-theme=\"nexo\"></md-progress-circular>\n    </div>\n\n    <nx-alert message=\"{{ 'FORMS.ASSIGN.NO_DIRECCIONES' | translate }}\" ng-if=\"!loading && !addresses.data.length\" type=\"warning\"></nx-alert>\n\n    <div ng-repeat='item in addresses.data' flex-xs=\"100\" flex=\"50\">\n        <div md-whiteframe=\"1\">\n            <md-toolbar class=\"md-toolbar-grey md-toolbar-grey-panel\">\n                <div class=\"md-toolbar-tools\">\n                    <div layout=\"column\">\n                        <div class=\"md-subhead\">{{ item.street }}</div>\n                        <div class=\"md-caption\">\n                            <span ng-if=\"!!item.vicinity\">{{ item.vicinity }},</span> <span ng-if=\"!!item.city\">{{ item.city }},</span>\n                            <span ng-if=\"!!item.state\">{{ item.state }}</span>\n                        </div>\n                    </div>\n                    <span flex></span>\n                    <md-button class=\"md-icon-button\" ng-click=\"editAddress($event, $index, item)\" aria-label=\"Editar dirección\">\n                        <md-icon md-svg-icon=\"pencil\"></md-icon>\n                    </md-button>\n                    <md-button class=\"md-raised md-primary mr-0\" md-theme=\"nexo\" ng-click=\"select(item)\" ng-disabled=\"isSelected(item)\">\n                        <span ng-hide=\"isSelected(item)\">{{ 'GLOBAL.SELECCIONAR' | translate }}</span>\n                        <span ng-show=\"isSelected(item)\">{{ 'GLOBAL.SELECCIONADA' | translate }}</span>\n                    </md-button>\n                </div>\n            </md-toolbar>\n\n            <md-content layout=\"column\" layout-align=\"center center\" style=\"min-height: 550px; background-color: #ECECEC;\">\n                <img ng-src=\"{{ item.map }}\" alt=\"{{ item.address }}\" style=\"width: 100%;\" ng-if=\"!!item.map\">\n                <nx-alert type=\"warning\" message=\"No conocemos la ubicación de esta dirección\" ng-if=\"!item.map\">\n                    <md-button class=\"md-raised\" ng-click=\"fix($event, item)\" ng-disabled=\"item.fixing\">Corregir</md-button>\n                </nx-alert>\n            </md-content>\n        </div>\n    </div>\n</div>\n\n<input type=\"hidden\" ng-model=\"model[options.key]\">\n";

/***/ },
/* 351 */
/***/ function(module, exports) {

	module.exports = "<style>\n    .angular-google-map-container {\n        height: 400px;\n    }\n</style>\n\n<md-dialog aria-label=\"Agregar direccion\" ng-cloak md-theme=\"nexo\" flex=\"50\">\n    <form name=\"form\" autocomplete=\"off\" ng-submit=\"onSubmit()\" novalidate>\n        <md-toolbar>\n            <div class=\"md-toolbar-tools\">\n                <h2>{{ 'FORMS.ASSIGN.EDITAR_DIRECCION' | translate }}</h2>\n            </div>\n        </md-toolbar>\n        <md-dialog-content>\n            <div class=\"md-dialog-content\">\n                <formly-form model=\"model\" fields=\"fields\" form=\"form\"></formly-form>\n            </div>\n        </md-dialog-content>\n        <md-dialog-actions layout=\"row\">\n            <span flex></span>\n\n            <md-button ng-click=\"cancel()\" class=\"mr\">\n                {{ 'GLOBAL.CANCELAR' | translate }}\n            </md-button>\n            <md-button ng-click=\"save()\" ng-disabled=\"saving\">\n                {{ 'GLOBAL.GUARDAR' | translate }}\n            </md-button>\n\n        </md-dialog-actions>\n    </form>\n</md-dialog>\n";

/***/ },
/* 352 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	exports.store = exports.adapter = undefined;
	
	var _jsData = __webpack_require__(353);
	
	var _jsDataHttp = __webpack_require__(354);
	
	var _lodash = __webpack_require__(263);
	
	var _lodash2 = _interopRequireDefault(_lodash);
	
	var _relations = __webpack_require__(356);
	
	var relations = _interopRequireWildcard(_relations);
	
	function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var schemas = __webpack_require__(357)(_jsData.Schema); // DataStore is mostly recommended for use in the browser
	
	console.debug('Using JSDataHttp v' + _jsDataHttp.version.full);
	
	var adapter = exports.adapter = new _jsDataHttp.HttpAdapter({
	    // Our API sits behind the /api path
	    basePath: '/api',
	    queryTransform: function queryTransform(resourceConfig, params) {
	
	        if (params.order) {
	            var order_direction = 'asc';
	
	            if (params.order.charAt(0) === '-') {
	                order_direction = 'desc';
	                params.order = params.order.slice(1);
	            }
	
	            params.orderBy = params.order;
	            params.sortedBy = order_direction;
	
	            delete params.order;
	        }
	        return params;
	    },
	    beforeHTTP: function beforeHTTP(config) {
	        config.headers || (config.headers = {});
	
	        var token = _lodash2.default.get(window, 'NEXO.token'),
	            teamId = _lodash2.default.get(window, 'NEXO.team.id'),
	            lang = _lodash2.default.get(window, 'NEXO.lang');
	
	        config.headers.Authorization = 'Bearer ' + token;
	
	        if (!_lodash2.default.isEmpty(teamId)) {
	            config.headers['Team-Account-ID'] = teamId;
	        }
	
	        if (!_lodash2.default.isEmpty(lang)) {
	            config.headers['Lang'] = lang;
	        }
	    },
	    serialize: function serialize(mapper, data, opts) {
	        data = _lodash2.default.omit(data, ['created_at', 'updated_at']);
	
	        // Use the original behavior
	        return _jsDataHttp.HttpAdapter.prototype.serialize.call(this, mapper, data, opts);
	    },
	    deserialize: function deserialize(mapper, response, opts) {
	        console.debug('HttpAdapter#deserialize:' + mapper.name, response.data);
	
	        // Fix relations that are nested under a "data" property
	
	        if (response.data && Array.isArray(response.data.data)) {
	            (function () {
	                var records = response.data.data;
	                mapper.relationList.forEach(function (def) {
	                    if (def.type === 'hasMany') {
	                        records.forEach(function (record) {
	                            var relatedData = record[def.localField];
	                            if (relatedData && Array.isArray(relatedData.data)) {
	                                // e.g. customers.addresses = customers.addresses.data
	                                record[def.localField] = relatedData.data;
	                            }
	                        });
	                    }
	                });
	            })();
	        }
	
	        if (_lodash2.default.isObject(response.data)) {
	            (function () {
	                var record = response.data;
	                mapper.relationList.forEach(function (def) {
	                    if (def.type === 'hasMany') {
	                        var relatedData = record[def.localField];
	                        if (relatedData && Array.isArray(relatedData.data)) {
	                            // e.g. customers.addresses = customers.addresses.data
	                            record[def.localField] = relatedData.data;
	                        }
	                    }
	                });
	            })();
	        }
	
	        // Use the original behavior
	        return _jsDataHttp.HttpAdapter.prototype.deserialize.call(this, mapper, response, opts);
	    }
	});
	
	var store = exports.store = new _jsData.DataStore({
	    addToCache: function addToCache(name, result, opts) {
	        console.debug('DataStore#cacheFindAll:' + name, result);
	
	        // Make sure the right thing gets added to the store
	        if (result && Array.isArray(result.data)) {
	            result.data = _jsData.DataStore.prototype.addToCache.call(this, name, result.data, opts);
	        } else {
	            result = _jsData.DataStore.prototype.addToCache.call(this, name, result, opts);
	        }
	        return result;
	    },
	    mapperDefaults: {
	        wrap: function wrap(data, opts) {
	            console.debug('Mapper#wrap:' + this.name, data);
	
	            // Make sure the right thing gets wrapped in the Record class
	            _jsData.Mapper.prototype.wrap.call(this, data.data, opts);
	            return data;
	        },
	        finishImport: function finishImport(items) {
	            return store.getAdapter('http').POST('/api/import/' + this.endpoint + '/finish', {
	                items: items
	            });
	        }
	    }
	});
	
	store.registerAdapter('http', adapter, {
	    default: true
	});
	
	// The User Resource
	store.defineMapper('team', {
	    endpoint: 'teams',
	    relations: relations.team,
	
	    quickStats: function quickStats(teamId) {
	        return store.getAdapter('http').POST('/api/' + this.endpoint + '/' + teamId + '/quick-stats');
	    },
	    rolesLimits: function rolesLimits(teamId) {
	        return store.getAdapter('http').GET('/api/' + this.endpoint + '/' + teamId + '/roles-limits');
	    },
	    usersLocalizations: function usersLocalizations(teamId) {
	        var params = arguments.length <= 1 || arguments[1] === undefined ? {} : arguments[1];
	
	        return store.getAdapter('http').GET('/api/' + this.endpoint + '/' + teamId + '/users-localizations', { params: params });
	    }
	});
	
	store.defineMapper('teamRoleLimit', {
	    endpoint: 'team-roles-limit',
	    relations: relations.teamRoleLimit
	});
	
	store.defineMapper('customer', {
	    endpoint: 'customers',
	    relations: relations.customer,
	
	    getAddresses: function getAddresses(customerId) {
	        return store.getAdapter('http').GET('/api/' + this.endpoint + '/' + customerId + '/addresses');
	    },
	    getServices: function getServices(customerId) {
	        return store.getAdapter('http').GET('/api/' + this.endpoint + '/' + customerId + '/services');
	    }
	});
	
	store.defineMapper('address', {
	    endpoint: 'addresses',
	    relations: relations.address,
	
	    fix: function fix(customerId, addressId) {
	        return store.getAdapter('http').POST('/api/customers/' + customerId + '/' + this.endpoint + '/' + addressId + '/fix');
	    }
	});
	
	store.defineMapper('phone', {
	    endpoint: 'phones',
	    relations: relations.phone
	});
	
	store.defineMapper('city', {
	    endpoint: 'cities',
	    relations: relations.city
	});
	
	store.defineMapper('product', {
	    endpoint: 'products'
	});
	
	store.defineMapper('productCategory', {
	    endpoint: 'products-categories'
	});
	
	store.defineMapper('module', {
	    endpoint: 'modules',
	    relations: relations.module
	});
	
	store.defineMapper('assignment', {
	    endpoint: 'assignments',
	
	    calculateRecurrence: function calculateRecurrence(data) {
	        return store.getAdapter('http').POST('/api/' + this.endpoint + '/calculate-recurrence', data);
	    }
	});
	
	store.defineMapper('serviceType', {
	    endpoint: 'services-types'
	});
	
	store.defineMapper('serviceStatus', {
	    endpoint: 'services-statuses'
	});
	
	store.defineMapper('userLocation', {
	    endpoint: 'users-locations'
	});
	
	store.defineMapper('user', {
	    endpoint: 'users',
	    relations: relations.user,
	
	    changeLang: function changeLang(langKey) {
	        return store.getAdapter('http').POST('/api/' + this.endpoint + '/change-lang', {
	            lang: langKey
	        });
	    },
	    assignments: function assignments(userId) {
	        var params = arguments.length <= 1 || arguments[1] === undefined ? {} : arguments[1];
	
	        return store.getAdapter('http').GET('/api/' + this.endpoint + '/' + userId + '/assignments', {
	            params: params
	        });
	    }
	});
	
	store.defineMapper('userContact', {
	    endpoint: 'contact',
	    relations: relations.userContact
	});
	
	store.defineMapper('role', {
	    endpoint: 'roles'
	});
	
	store.defineMapper('transport', {
	    endpoint: 'transports'
	});
	
	store.defineMapper('service', {
	    endpoint: 'services-types'
	});
	
	store.defineMapper('langs', {
	    endpoint: 'langs'
	});
	
	store.defineMapper('poll', {
	    endpoint: 'polls'
	});
	
	store.defineMapper('pollAnswer', {
	    endpoint: 'polls-answers'
	});
	
	store.defineMapper('customerService', {
	    endpoint: 'customer.services'
	});

/***/ },
/* 353 */,
/* 354 */,
/* 355 */,
/* 356 */
/***/ function(module, exports) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	var team = exports.team = {};
	
	var _module = {};
	
	exports.module = _module;
	var teamRoleLimit = exports.teamRoleLimit = {};
	
	var customer = exports.customer = {};
	
	/*hasMany: {
	  address: {
	      localField: 'addresses',
	      foreignKey: 'customer_id'
	  },
	  phone: {
	      localField: 'phones',
	      foreignKey: 'customer_id'
	  }
	}*/
	var address = exports.address = {
	    belongsTo: {
	        customer: {
	            localField: 'customer',
	            foreignKey: 'customer_id',
	            parent: true
	        }
	    }
	};
	
	/*
	city: {
	    localField: 'city',
	    foreignKey: 'city_id'
	}
	*/
	var phone = exports.phone = {
	    belongsTo: {
	        customer: {
	            localField: 'customer',
	            foreignKey: 'customer_id'
	        }
	    }
	};
	
	var city = exports.city = {
	    hasMany: {
	        address: {
	            localField: 'addresses',
	            foreignKey: 'city_id'
	        }
	    }
	};
	
	var user = exports.user = {};
	
	/*hasMany: {
	    userContact: {
	        localField: 'contact',
	        foreignKey: 'city_id'
	    }
	}*/
	var userContact = exports.userContact = {};

/***/ },
/* 357 */
/***/ function(module, exports) {

	'use strict';
	
	module.exports = function (Schema) {
	    return {
	        meta: new Schema({
	            properties: {
	                id: {
	                    type: 'string'
	                },
	                name: {
	                    type: 'string'
	                }
	            }
	        }),
	
	        customer: new Schema({
	            properties: {
	                id: { type: 'string' }
	            }
	        }),
	
	        post: new Schema({
	            properties: {
	                id: { type: 'string' },
	                // Only the DataStore component cares about the "indexed" attribute
	                user_id: { type: 'string', indexed: true },
	                title: { type: 'string' },
	                content: { type: 'string' }
	            }
	        }),
	
	        comment: new Schema({
	            properties: {
	                id: { type: 'string' },
	                // Only the DataStore component cares about the "indexed" attribute
	                post_id: { type: 'string', indexed: true },
	                // Only the DataStore component cares about the "indexed" attribute
	                user_id: { type: 'string', indexed: true },
	                content: { type: 'string' }
	            }
	        })
	    };
	};

/***/ },
/* 358 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Controller.$inject = ["$scope", "Store"];
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _template = __webpack_require__(359);
	
	var _template2 = _interopRequireDefault(_template);
	
	__webpack_require__(360);
	
	var _lodash = __webpack_require__(263);
	
	var _lodash2 = _interopRequireDefault(_lodash);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = function (formlyConfigProvider) {
	    formlyConfigProvider.setType({
	        template: _template2.default,
	        name: 'assign-products',
	        controller: Controller,
	        defaultOptions: {
	            noFormControl: false,
	            ngModelAttrs: {
	                required: {
	                    attribute: '',
	                    bound: ''
	                }
	            }
	        },
	        apiCheck: function apiCheck(check) {
	            return {
	                templateOptions: {
	                    labelProp: check.string.optional,
	                    valueProp: check.string.optional
	                }
	            };
	        }
	    });
	};
	
	function Controller($scope, Store) {
	    "ngInject";
	
	    var opts = $scope.options;
	
	    $scope.loadingProducts = true;
	    $scope.query = {};
	    $scope.showFilter = false;
	
	    $scope.productFields = [{
	        key: 'quantity',
	        type: 'input',
	        name: 'product-quantity',
	        templateOptions: {
	            label: 'GLOBAL.CANTIDAD',
	            required: true,
	            min: 1,
	            type: 'number'
	        }
	    }];
	
	    Store.mapper('product').findAll().then(function (response) {
	        $scope.products = _lodash2.default.map(response.data, function (product) {
	            if (_lodash2.default.isEmpty(product.quantity)) {
	                product.quantity = 1;
	            }
	            return product;
	        });
	        $scope.loadingProducts = false;
	    }, function () {
	        $scope.loadingProducts = false;
	    });
	
	    $scope.productsCategories = Store.filter('productCategory');
	
	    $scope.toggle = function (product) {
	        if ($scope.isChecked(product.id)) {
	            _lodash2.default.remove($scope.model[opts.key], {
	                id: product.id
	            });
	        } else {
	            $scope.model[opts.key].push(product);
	        }
	    };
	
	    $scope.isChecked = function (productId) {
	        return _lodash2.default.some($scope.model[opts.key], {
	            id: productId
	        });
	    };
	}

/***/ },
/* 359 */
/***/ function(module, exports) {

	module.exports = "<div class=\"md-padding\">\n  <md-progress-circular md-mode=\"indeterminate\" ng-show=\"loadingProducts\" md-theme=\"nexo\"></md-progress-circular>\n\n  <input name=\"products-counter\" type=\"number\" ng-model=\"model[options.key].length\" min=\"1\" style=\"display: none;\">\n\n  <div ng-hide=\"loadingProducts\">\n      <nx-alert class=\"mt mb-xs\" type=\"warning\" message=\"Ningún producto creado o disponible.\" ng-if=\"!products.length\"></nx-alert>\n      <nx-alert type=\"warning\" message=\"Seleccione uno o más productos de la lista de productos disponibles.\" ng-if=\"!model[options.key].length && products.length\"></nx-alert>\n  </div>\n\n  <div layout=\"column\" layout-fill layout-wrap ng-hide=\"loadingProducts\" ng-show=\"products.length\">\n      <div class=\"md-list-dashed\" md-whiteframe=\"1\" flex layout=\"column\" layout-padding>\n          <div layout=\"row\" layout-wrap>\n              <md-subheader flex>\n                  {{ 'FORMS.ASSIGN.PRODUCTOS_DISPONIBLES' | translate:{cantidad:products.length} }}\n              </md-subheader>\n              <md-input-container class=\"mt-0\" md-no-float flex>\n                  <input type=\"search\" placeholder=\"{{ 'FORMS.ASSIGN.BUSCAR_PRODUCTO' | translate }}\" ng-model=\"query.$\" ng-required=\"false\" autofocus>\n              </md-input-container>\n              <md-input-container class=\"mt-0\" md-no-float flex>\n                  <label>Categoría</label>\n                  <md-select ng-model=\"query.category.id\" ng-required=\"false\">\n                      <md-option ng-repeat=\"item in productsCategories\" ng-value=\"item.id\">\n                          {{item.name}}\n                      </md-option>\n                  </md-select>\n              </md-input-container>\n              <md-button class=\"md-icon-button\" ng-click=\"query = {}\" aria-label=\"Limpiar búsqueda\">\n                  <md-icon md-svg-icon=\"close\"></md-icon>\n              </md-button>\n          </div>\n\n          <md-virtual-repeat-container id=\"vr-productos-disponibles\">\n              <div class=\"list-item\" layout=\"row\" layout-align=\"center\" md-virtual-repeat=\"product in products | filter:query | orderBy:'name'\">\n                  <md-checkbox ng-checked=\"isChecked(product.id)\" aria-label=\"Seleccionar producto\" ng-click=\"toggle(product)\"></md-checkbox>\n                  <div>{{ product.name }}</div>\n                  <span flex></span>\n                  <div ng-show=\"isChecked(product.id)\" layout=\"row\" layout-align=\"center center\">\n                      <p class=\"md-single-label mr\">{{ 'GLOBAL.CANTIDAD' | translate }}</p>\n                      <div style=\"height:44px; max-width:100px\">\n                          <input kendo-numeric-text-box k-min=\"1\" k-step=\"1\" k-format=\"'#'\" k-decimals=\"0\" k-ng-model=\"product.quantity\" style=\"width: 100%;\" />\n                      </div>\n                  </div>\n              </div>\n          </md-virtual-repeat-container>\n      </div>\n  </div>\n\n</div>\n";

/***/ },
/* 360 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 361 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Controller.$inject = ["$rootScope", "$scope", "Store", "$timeout", "$mdDialog", "uiGmapGoogleMapApi", "TEAM_ID"];
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _template = __webpack_require__(362);
	
	var _template2 = _interopRequireDefault(_template);
	
	var _dialog = __webpack_require__(363);
	
	var _dialog2 = _interopRequireDefault(_dialog);
	
	var _dialog3 = __webpack_require__(364);
	
	var _dialog4 = _interopRequireDefault(_dialog3);
	
	var _lodash = __webpack_require__(263);
	
	var _lodash2 = _interopRequireDefault(_lodash);
	
	var _store = __webpack_require__(352);
	
	var _moment = __webpack_require__(156);
	
	var _moment2 = _interopRequireDefault(_moment);
	
	__webpack_require__(366);
	
	var _service = __webpack_require__(367);
	
	var _service2 = _interopRequireDefault(_service);
	
	var _maleBlue = __webpack_require__(368);
	
	var _maleBlue2 = _interopRequireDefault(_maleBlue);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	// markers
	
	exports.default = function (formlyConfigProvider) {
	    formlyConfigProvider.setType({
	        template: _template2.default,
	        name: 'assign-users',
	        controller: Controller,
	        //wrapper: ['messages'],
	        defaultOptions: {
	            ngModelAttrs: {
	                required: {
	                    attribute: '',
	                    bound: ''
	                }
	            }
	        },
	        apiCheck: function apiCheck(check) {
	            return {
	                templateOptions: {
	                    disabled: check.bool.optional,
	                    labelProp: check.string.optional,
	                    valueProp: check.string.optional,
	                    theme: check.string.optional
	                }
	            };
	        }
	    });
	};
	
	function Controller($rootScope, $scope, Store, $timeout, $mdDialog, uiGmapGoogleMapApi, TEAM_ID) {
	    "ngInject";
	
	    var opts = $scope.options;
	    $scope.users = [];
	
	    // Esperando al mapa
	    uiGmapGoogleMapApi.then(function (GoogleMaps) {
	
	        // Para que el mapa no aparezca "gris" solo se muestra si está en el paso deseado
	        $rootScope.$on('wizard:stepChanged', function (ev, step) {
	            $timeout(function () {
	                $scope.showMap = step.index == 2;
	            });
	        });
	
	        // Iniciamos el mapa
	        var coords = _lodash2.default.pick($scope.model, ['latitude', 'longitude']);
	
	        if (_lodash2.default.isEmpty(coords)) {
	            coords = {
	                latitude: 4.598002,
	                longitude: -74.076186
	            };
	        };
	
	        $scope.map = {
	            center: coords,
	            zoom: 16,
	            control: {},
	            options: {
	                styles: [{
	                    "stylers": [{
	                        "saturation": -100
	                    }]
	                }]
	            }
	        };
	
	        //
	        // Traemos todas las localizaciones que tengan los usuarios
	        //
	        Store.mapper('team').usersLocalizations(TEAM_ID, {
	            roles: 'rutero'
	        }).then(function (response) {
	            // Si el mapa está vacio, centrar el mapa con la ubicación del primer usuario
	            if (_lodash2.default.isEmpty($scope.map.center)) {
	                $scope.map.center = _lodash2.default.pick(_lodash2.default.first(response.data), ['latitude', 'longitude']);
	            }
	            // Iteramos para arreglar la información de los markers
	            $scope.users = _lodash2.default.map(response.data, function (user) {
	                var icon = new google.maps.MarkerImage(user.avatar.xs);
	
	                user.options = {
	                    icon: _maleBlue2.default
	                };
	
	                return user;
	            });
	
	            $scope.$watch('model.users', function (usersIds) {
	                var users = _lodash2.default.filter($scope.users, function (user) {
	                    return _lodash2.default.includes(usersIds, user.id);
	                });
	                _lodash2.default.set($scope, 'model.users_data', users);
	            }, true);
	        });
	
	        //
	        // Observamos las coordenadas para centrar el mapa y crear el marker
	        //
	        $scope.$watchGroup(['model.latitude', 'model.longitude'], function (nv) {
	            if (!_lodash2.default.isEmpty(nv)) {
	                $scope.centerMapToAddress(false, true);
	            }
	        });
	
	        //
	        // Centrar el amapa
	        //
	        $scope.centerMapToAddress = function () {
	            var zoom = arguments.length <= 0 || arguments[0] === undefined ? false : arguments[0];
	            var createMarker = arguments.length <= 1 || arguments[1] === undefined ? false : arguments[1];
	
	            var coords = _lodash2.default.pick($scope.model, ['latitude', 'longitude']);
	
	            if (createMarker) {
	                $scope.map.center = coords;
	                $scope.addressMarker = {
	                    coords: angular.copy(coords),
	                    id: 0,
	                    options: {
	                        icon: _service2.default
	                    }
	                };
	            } else {
	                var latLng = new GoogleMaps.LatLng(coords.latitude, coords.longitude),
	                    map = $scope.map.control.getGMap();
	
	                if (zoom) {
	                    map.setZoom(21);
	                }
	
	                map.panTo(latLng);
	            }
	        };
	
	        //
	        // Observamos el tipo de asignación para determinar si es requerido o no
	        //
	        $scope.$watch('model.assignment_type', function (assignmentType) {
	            if (assignmentType) {
	                $scope.isRequired = assignmentType == 'mandatory';
	                $scope.minUsers = $scope.isRequired ? 1 : 0;
	            }
	        });
	    });
	
	    //
	    // Cuando damos click desde el mapa sobre un rutero
	    //
	    $scope.onClickUser = function (ev, evName, user) {
	        $scope.openUserDialog(ev, user);
	    };
	
	    //
	    // Abrir el dialogo que contiene toda la información del rutero
	    //
	    $scope.openUserDialog = function (ev, user) {
	
	        var userData = _lodash2.default.find($scope.users, {
	            id: user.id
	        }),
	            dialogOptions = {
	            event: ev,
	            controller: _dialog4.default,
	            controllerAs: 'vm',
	            template: _dialog2.default,
	            parent: angular.element(document.body),
	            clickOutsideToClose: true,
	            locals: {
	                user: user,
	                isSelected: $scope.isChecked(user.id),
	                model: $scope.model
	            }
	        };
	
	        // Abrir el dialogo con un $timeout para evitar glitch
	        $timeout(function () {
	            $mdDialog.show(dialogOptions).then(function (user) {
	                if (!_lodash2.default.isEmpty(user)) {
	                    $scope.toggle(user.id);
	                }
	            });
	        });
	
	        // Centramos el mapa en la posición del rutero solo si existe la información
	        if (!_lodash2.default.isEmpty(userData)) {
	            var userDataCoords = _lodash2.default.pick(userData, ['latitude', 'longitude']);
	            if (!_lodash2.default.isEmpty(userDataCoords)) {
	                $scope.map.center = userDataCoords;
	                $scope.map.zoom = 20;
	            }
	        }
	    };
	
	    //
	    // Acciones para check
	    //
	    $scope.toggle = function (id) {
	        if (!_lodash2.default.isArray($scope.model[opts.key])) {
	            $scope.model[opts.key] = [];
	        }
	
	        if ($scope.isChecked(id)) {
	            _lodash2.default.remove($scope.model[opts.key], function (value) {
	                return value == id;
	            });
	        } else {
	            $scope.model[opts.key].push(id);
	        }
	    };
	
	    $scope.isChecked = function (id) {
	        return _lodash2.default.some($scope.model[opts.key], function (value) {
	            return value == id;
	        });
	    };
	}

/***/ },
/* 362 */
/***/ function(module, exports) {

	module.exports = "<!-- Validación -->\n<input type=\"text\" ng-model=\"model[options.key]\" ng-required=\"isRequired\" style=\"display: none;\">\n\n<div class=\"md-padding pb-0\">\n    <nx-alert type=\"warning\" message=\"Seleccione al menos un rutero de la lista poder continuar.\" ng-if=\"isRequired && !model[options.key].length\"></nx-alert>\n</div>\n\n<div class=\"usuarios-asignacion md-padding pt-0\" layout=\"row\" layout-fill layout-wrap ng-if=\"showMap\" flex>\n    <div flex=\"40\" layout=\"column\" md-whiteframe=\"1\">\n        <md-list class=\"users-list md-list-dashed\" flex>\n            <div layout=\"row\" layout-wrap>\n                <md-subheader>\n                    {{ 'FORMS.ASSIGN.RUTEROS_DISPONIBLES' | translate }}\n                </md-subheader>\n            </div>\n            <md-list-item ng-form=\"usersListForm\" class=\"md-2-line\" ng-repeat=\"user in users | orderBy:'name'\">\n                <md-checkbox ng-click=\"toggle(user.id)\" ng-checked=\"isChecked(user.id)\" ng-required=\"false\" aria-label=\"Seleccionar/Deseleccionar usuario\"></md-checkbox>\n                <img alt=\"{{ user.name }}\" ng-src=\"{{ user.avatar.small }}\" class=\"md-avatar\" />\n                <div class=\"md-list-item-text\">\n                    <h3>{{ user.name }}</h3>\n                    <p ng-if=\"user.last_localization.date\">\n                        <small style=\"font-size: 12px;\">{{ user.last_localization.date | amTimeAgo }}</small>\n                    </p>\n                    <p ng-if=\"!user.last_localization.date\">\n                        <small style=\"font-size: 12px;\">Nunca conectado</small>\n                    </p>\n                </div>\n                <span flex></span>\n                <md-button class=\"md-icon-button mt\" ng-click=\"openUserDialog($event, user)\" aria-label=\"Ver rutero\">\n                    <md-icon md-svg-icon=\"eye\"></md-icon>\n                </md-button>\n            </md-list-item>\n        </md-list>\n    </div>\n\n    <div class=\"map\" flex>\n        <md-button class=\"go-to-address-button md-raised\" ng-click=\"centerMapToAddress(true)\" aria-label=\"Buscar dirección\">\n            <md-icon md-svg-icon=\"home-map-marker\"></md-icon>\n        </md-button>\n        <ui-gmap-google-map center='map.center' zoom='map.zoom' options=\"map.options\" control=\"map.control\" flex>\n            <ui-gmap-marker coords=\"addressMarker.coords\" options=\"addressMarker.options\" idkey=\"addressMarker.id\"></ui-gmap-marker>\n            <ui-gmap-markers models='users' coords=\"'self'\" doCluster=\"true\" options=\"'options'\" click=\"onClickUser\"></ui-gmap-markers>\n        </ui-gmap-google-map>\n    </div>\n</div>\n";

/***/ },
/* 363 */
/***/ function(module, exports) {

	module.exports = "<md-dialog aria-label=\"Agregar direccion\" ng-cloak md-theme=\"nexo\">\n\n\n    <md-dialog-content style=\"min-width: 600px\">\n        <div class=\"md-dialog-content\" layout=\"row\" layout-wrap>\n            <div layout=\"column\" layout-align=\"start center\" flex=\"20\">\n                <img class=\"nx-avatar-user\" ng-src=\"{{ vm.user.avatar.medium }}\" alt=\"{{ vm.user.name }}\">\n\n                <div class=\"md-subtitle mt\">{{ vm.user.name }}</div>\n\n                <div class=\"mt-lg\" layout=\"row\" layout-sm=\"column\" layout-align=\"space-around\" ng-show=\"vm.loading\">\n                    <md-progress-circular md-theme=\"nexo\" md-mode=\"indeterminate\" md-diameter=\"100px\"></md-progress-circular>\n                </div>\n            </div>\n\n            <div flex=\"80\">\n                <div kendo-scheduler k-options=\"vm.schedulerOptions\" ng-if=\"vm.showScheduler\"></div>\n            </div>\n        </div>\n    </md-dialog-content>\n    <md-dialog-actions layout=\"row\">\n        <span flex></span>\n\n        <md-button ng-click=\"vm.cancel()\" class=\"mr\">\n            Cerrar\n        </md-button>\n        <md-button ng-click=\"vm.toggleSelect()\" ng-if=\"!vm.isSelected\">\n            Seleccionar\n        </md-button>\n        <md-button ng-click=\"vm.toggleSelect()\" ng-if=\"vm.isSelected\">\n            Quitar\n        </md-button>\n\n    </md-dialog-actions>\n</md-dialog>\n";

/***/ },
/* 364 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _classCallCheck2 = __webpack_require__(365);
	
	var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
	
	var _moment = __webpack_require__(156);
	
	var _moment2 = _interopRequireDefault(_moment);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var DialogController = function DialogController($scope, $mdDialog, $timeout, user, isSelected, Store, model) {
	    "ngInject";
	
	    (0, _classCallCheck3.default)(this, DialogController);
	    var vm = this;
	    vm.user = user;
	    vm.loading = true;
	    vm.isSelected = isSelected;
	    vm.cancel = function () {
	        $mdDialog.cancel();
	    };
	
	    vm.toggleSelect = function () {
	        $mdDialog.hide(user);
	    };
	
	    // Variables
	    var observableEvents = new kendo.data.ObservableArray([]),
	        date = new Date(),
	        startTime = new Date();
	
	    // Crear EVENTO DEMO solo si es nuevo
	    if (_.isEmpty(model.id)) {
	        if (model.date_type == 'recurrent') {
	            vm.loading = true;
	            Store.mapper('assignment').calculateRecurrence(model).then(function (response) {
	                var recurrentEvents = response.data;
	
	                _.forEach(recurrentEvents, function (recurrentEvent, recurrentEventIndex) {
	                    var demoEvent = {
	                        id: recurrentEventIndex + 1,
	                        start: (0, _moment2.default)(recurrentEvent.start).toDate(),
	                        end: (0, _moment2.default)(recurrentEvent.end).toDate(),
	                        title: 'Asignación en creación'
	                    };
	
	                    // Agregando demoEvent al
	                    observableEvents.push(new kendo.data.SchedulerEvent(demoEvent));
	                });
	
	                vm.loading = false;
	            });
	        } else {
	            var startAt = (0, _moment2.default)();
	
	            if (model.date_type == 'schedule') {
	                startAt = (0, _moment2.default)(model.start_at);
	            }
	
	            var endAt = angular.copy(startAt).add(model.duration, 'minutes');
	
	            var demoEvent = {
	                id: 1,
	                start: startAt.toDate(),
	                end: endAt.toDate(),
	                title: 'Asignación en creación'
	            };
	
	            // Agregando demoEvent al
	            observableEvents.push(new kendo.data.SchedulerEvent(demoEvent));
	        }
	    }
	
	    // Obteniendo la información completa del usuario
	    Store.mapper('user').find(user.id, {
	        params: {
	            include: 'services'
	        }
	    }).then(function (response) {
	        var services = _.get(response, 'services.data', []);
	
	        _.forEach(services, function (service) {
	            var newService = {
	                id: service.id,
	                title: '#' + service.code + ' (' + service.status.name + ')',
	                start: new Date(service.start_at.date),
	                end: new Date(service.end_at.date),
	                status_id: service.status.id
	            };
	
	            observableEvents.push(new kendo.data.SchedulerEvent(newService));
	        });
	
	        vm.loading = false;
	    }, function () {
	        return vm.loading = false;
	    });
	
	    $scope.ds = new kendo.data.SchedulerDataSource({
	        data: observableEvents
	    });
	
	    vm.schedulerOptions = {
	        date: date,
	        //startTime: startTime,
	        height: '100%',
	        views: [{
	            type: 'day',
	            allDaySlot: false
	        }, {
	            type: 'week',
	            selected: true,
	            allDaySlot: false
	        }, 'month'],
	        //timezone: "Etc/UTC",
	        editable: false,
	        dataSource: $scope.ds,
	        resources: [{
	            field: "status_id",
	            title: "Estado",
	            dataSource: Store.getAll('serviceStatus').map(function (status) {
	                return {
	                    text: status.name,
	                    value: status.id,
	                    color: status.color
	                };
	            })
	        }]
	    };
	
	    $timeout(function () {
	        return vm.showScheduler = true;
	    });
	};
	DialogController.$inject = ["$scope", "$mdDialog", "$timeout", "user", "isSelected", "Store", "model"];
	
	exports.default = DialogController;

/***/ },
/* 365 */,
/* 366 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 367 */,
/* 368 */,
/* 369 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Controller.$inject = ["$scope"];
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _moment = __webpack_require__(156);
	
	var _moment2 = _interopRequireDefault(_moment);
	
	var _template = __webpack_require__(370);
	
	var _template2 = _interopRequireDefault(_template);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = function (formlyConfigProvider) {
	    formlyConfigProvider.setType({
	        template: _template2.default,
	        name: 'assign-days',
	        controller: Controller,
	        wrapper: ['messages', 'inputContainer'],
	        defaultOptions: {
	            templateOptions: {
	                disabled: false
	            },
	            ngModelAttrs: {
	                disabled: {
	                    bound: 'ng-disabled'
	                }
	            }
	        },
	        apiCheck: function apiCheck(check) {
	            return {
	                templateOptions: {
	                    disabled: check.bool.optional,
	                    labelProp: check.string.optional,
	                    valueProp: check.string.optional,
	                    theme: check.string.optional
	                }
	            };
	        }
	    });
	};
	
	function Controller($scope) {
	    "ngInject";
	
	    $scope.days = _.range(0, 7).map(function (day) {
	        var dayName = (0, _moment2.default)().day(day).format('dddd');
	        return {
	            value: day,
	            label: dayName.charAt(0).toUpperCase() + dayName.slice(1)
	        };
	    });
	
	    $scope.toggle = function (item, list) {
	        var idx = list.indexOf(item);
	        if (idx > -1) {
	            list.splice(idx, 1);
	        } else {
	            list.push(item);
	        }
	    };
	    $scope.exists = function (item, list) {
	        return list.indexOf(item) > -1;
	    };
	}

/***/ },
/* 370 */
/***/ function(module, exports) {

	module.exports = "<p class=\"md-single-label\">{{ 'FORMS.ASSIGN.REPETIR_EL' | translate }}</p>\n\n<div flex layout=\"row\" layout-align=\"center center\">\n\n    <div class=\"demo-select-all-checkboxes\" flex ng-repeat=\"day in days\">\n        <md-checkbox ng-checked=\"exists(day.value, model[options.key])\" ng-click=\"toggle(day.value, model[options.key])\">\n            {{ day.label }}\n        </md-checkbox>\n    </div>\n</div>";

/***/ },
/* 371 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _template = __webpack_require__(372);
	
	var _template2 = _interopRequireDefault(_template);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('app.config.types.numeric', []).config(["formlyConfigProvider", function (formlyConfigProvider) {
	    "ngInject";
	
	    formlyConfigProvider.setType({
	        template: _template2.default,
	        name: 'numeric',
	        //controller: Controller,
	        wrapper: ['messages'],
	        defaultOptions: {
	            templateOptions: {
	                disabled: false,
	                min: 0,
	                max: 100,
	                step: 1,
	                decimals: 0,
	                format: '#'
	            }
	        },
	        apiCheck: function apiCheck(check) {
	            return {
	                templateOptions: {
	                    disabled: check.bool.optional,
	                    labelProp: check.string.optional,
	                    valueProp: check.string.optional,
	                    theme: check.string.optional,
	                    min: check.number.optional,
	                    max: check.number.optional,
	                    step: check.number.optional,
	                    decimals: check.number.optional,
	                    format: check.string.optional,
	                    label: check.string.optional
	                }
	            };
	        }
	    });
	}]);
	
	
	function Controller($scope) {}

/***/ },
/* 372 */
/***/ function(module, exports) {

	module.exports = "<div style=\"padding: 0 8px; margin: 18px 0;  display: block;\">\n\n    <div layout=\"row\" layout-fill layout-align=\"center center\" style=\"max-height: 40px;\">\n\n        <!--<div class=\"mr\" ng-if=\"!!to.label\">\n            <p class=\"md-single-label mb-0\">{{ to.label | translate }}</p>\n        </div>-->\n\n        <div flex style=\"padding-top: 30px;\">\n          <p class=\"md-single-label xs\">{{ to.label | translate }}</p>\n            <input kendo-numeric-text-box\n                   k-min=\"{{ to.min }}\"\n                   k-max=\"{{ to.max }}\"\n                   k-ng-model=\"model[options.key]\"\n                   k-step=\"{{ to.step }}\"\n                   k-decimals=\"{{ to.decimals }}\"\n                   k-format=\"to.format\"\n                   style=\"width: 100%;\"\n                   ng-required=\"to.required\"/>\n        </div>\n\n    </div>\n\n</div>\n";

/***/ },
/* 373 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Controller.$inject = ["$scope", "$translate"];
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _template = __webpack_require__(374);
	
	var _template2 = _interopRequireDefault(_template);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('app.config.types.multiselect', []).config(["formlyConfigProvider", function (formlyConfigProvider) {
	    "ngInject";
	
	    formlyConfigProvider.setType({
	        template: _template2.default,
	        name: 'multiselect',
	        controller: Controller,
	        wrapper: ['messages', 'inputContainer'],
	        defaultOptions: {
	            noFormControl: false,
	            ngModelAttrs: {
	                required: {
	                    attribute: '',
	                    bound: ''
	                }
	            }
	        },
	        apiCheck: function apiCheck(check) {
	            return {
	                templateOptions: {
	                    options: check.arrayOf(check.object),
	                    labelProp: check.string.optional,
	                    valueProp: check.string.optional
	                }
	            };
	        }
	    });
	}]);
	
	
	function Controller($scope, $translate) {
	    "ngInject";
	
	    var opts = $scope.options;
	
	    $scope.selectOptions = {
	        placeholder: $translate.instant('GLOBAL.SELECCIONE_UNA_O_VARIAS_OPCIONES'),
	        dataTextField: $scope.to.labelProp,
	        dataValueField: $scope.to.valueProp,
	        valuePrimitive: true,
	        autoBind: false,
	        dataSource: {
	            data: $scope.to.options
	        }
	    };
	
	    if ($scope.to.required) {
	        var unwatchFormControl = $scope.$watch('fc', function (newValue) {
	            if (!newValue) {
	                return;
	            }
	            $scope.$watch('model.' + $scope.options.key, function () {
	                checkValidity();
	            });
	
	            checkValidity();
	            unwatchFormControl();
	        });
	    }
	
	    function checkValidity() {
	        if ($scope.to.required) {
	            var valid = _angular2.default.isArray($scope.model[opts.key]) && $scope.model[opts.key].length > 0;
	            $scope.fc.$setValidity('required', valid);
	        }
	    }
	}

/***/ },
/* 374 */
/***/ function(module, exports) {

	module.exports = "<p class=\"md-single-label\">{{ to.label | translate }}</p>\n<select class=\"mb\" kendo-multi-select k-options=\"selectOptions\" k-ng-model=\"model[options.key]\"></select>\n<input type=\"hidden\" ng-model=\"model[options.key]\">\n";

/***/ },
/* 375 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _template = __webpack_require__(376);
	
	var _template2 = _interopRequireDefault(_template);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('app.config.types.datetime', []).config(["formlyConfigProvider", function (formlyConfigProvider) {
	    "ngInject";
	
	    formlyConfigProvider.setType({
	        template: _template2.default,
	        name: 'datetime',
	        //  controller: Controller,
	        wrapper: ['messages'],
	        defaultOptions: {
	            ngModelAttrs: {
	                required: {
	                    attribute: '',
	                    bound: ''
	                }
	            },
	            templateOptions: {
	                showTime: true
	            }
	        },
	        apiCheck: function apiCheck(check) {
	            return {
	                templateOptions: {
	                    labelProp: check.string.optional,
	                    valueProp: check.string.optional,
	                    showTime: check.bool.optional,
	                    format: check.string.optional
	                }
	            };
	        }
	    });
	}]);
	
	
	function Controller($scope) {}

/***/ },
/* 376 */
/***/ function(module, exports) {

	module.exports = "<div style=\"padding: 0 8px; margin: 18px 0;  display: block;\">\n    <p class=\"md-single-label xs\">{{ to.label | translate }}</p>\n\n    <input kendo-date-time-picker k-ng-model=\"model[options.key]\"  ng-if=\"to.showTime\" k-format=\"'{{ to.format || 'yyyy-MM-dd hh:mm tt' }}'\" style=\"width: 100%;\" />\n    <input kendo-date-picker k-ng-model=\"model[options.key]\" ng-if=\"!to.showTime\" k-options=\"to.pickerOptions\" k-format=\"'{{ to.format || 'yyyy-MM-dd' }}'\" style=\"width: 100%;\" />\n</div>\n";

/***/ },
/* 377 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Config.$inject = ["uiGmapGoogleMapApiProvider"];
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	__webpack_require__(378);
	
	__webpack_require__(382);
	
	__webpack_require__(383);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('app.config.map', ['nemLogging', 'uiGmapgoogle-maps', 'vsGoogleAutocomplete']).config(Config);
	
	
	function Config(uiGmapGoogleMapApiProvider) {
	    "ngInject";
	
	    uiGmapGoogleMapApiProvider.configure({
	        key: 'AIzaSyBKaguJ1IPG9mqB8JF1g1SEn5FqCOQ9GWI',
	        //  v: '3.20', //defaults to latest 3.X anyhow
	        libraries: 'weather,geometry,visualization,places'
	    });
	}

/***/ },
/* 378 */,
/* 379 */,
/* 380 */,
/* 381 */,
/* 382 */,
/* 383 */,
/* 384 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _ngFileUpload = __webpack_require__(385);
	
	var _ngFileUpload2 = _interopRequireDefault(_ngFileUpload);
	
	__webpack_require__(387);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('app.config.upload', [_ngFileUpload2.default, 'ngImgCrop']);

/***/ },
/* 385 */,
/* 386 */,
/* 387 */,
/* 388 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	        value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	__webpack_require__(389);
	
	__webpack_require__(390);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('app.config.wizard', ['mgo-angular-wizard']).config(Config);
	
	
	function Config() {}

/***/ },
/* 389 */,
/* 390 */,
/* 391 */,
/* 392 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Config.$inject = ["$httpProvider", "jwtInterceptorProvider"];
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	__webpack_require__(58);
	
	exports.default = _angular2.default.module('app.config.JWT', ['angular-jwt']).config(Config);
	
	
	function Config($httpProvider, jwtInterceptorProvider) {
	    "ngInject";
	
	    var teamId = _.get(window.NEXO, 'team.id');
	
	    // Please note we're annotating the function so that the $injector works when the file is minified
	    jwtInterceptorProvider.tokenGetter = function () {
	        return window.NEXO.token;
	    };
	
	    $httpProvider.defaults.headers.common['Team-Account-Id'] = teamId;
	
	    $httpProvider.interceptors.push('jwtInterceptor');
	}

/***/ },
/* 393 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Config.$inject = ["$translateProvider"];
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _angularTranslate = __webpack_require__(394);
	
	var _angularTranslate2 = _interopRequireDefault(_angularTranslate);
	
	__webpack_require__(395);
	
	var _app = __webpack_require__(396);
	
	var _app2 = _interopRequireDefault(_app);
	
	var _app3 = __webpack_require__(397);
	
	var _app4 = _interopRequireDefault(_app3);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	// locales
	exports.default = _angular2.default.module('app.config.translate', [_angularTranslate2.default]).config(Config);
	
	
	function Config($translateProvider) {
	    "ngInject";
	
	    $translateProvider.translations('es', _app2.default);
	    $translateProvider.translations('pt', _app4.default);
	
	    $translateProvider.preferredLanguage(window.NEXO.lang || 'es');
	    $translateProvider.useSanitizeValueStrategy(null);
	}

/***/ },
/* 394 */,
/* 395 */,
/* 396 */,
/* 397 */,
/* 398 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _index = __webpack_require__(399);
	
	var _index2 = _interopRequireDefault(_index);
	
	var _index3 = __webpack_require__(411);
	
	var _index4 = _interopRequireDefault(_index3);
	
	var _index5 = __webpack_require__(416);
	
	var _index6 = _interopRequireDefault(_index5);
	
	var _nxImport = __webpack_require__(432);
	
	var _nxImport2 = _interopRequireDefault(_nxImport);
	
	var _nxAlert = __webpack_require__(437);
	
	var _nxAlert2 = _interopRequireDefault(_nxAlert);
	
	var _assignmentDetail = __webpack_require__(442);
	
	var _assignmentDetail2 = _interopRequireDefault(_assignmentDetail);
	
	var _dashboardMap = __webpack_require__(447);
	
	var _dashboardMap2 = _interopRequireDefault(_dashboardMap);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('app.components', [_index2.default.name, _index4.default.name, _index6.default.name, _nxImport2.default.name, _nxAlert2.default.name, _assignmentDetail2.default.name, _dashboardMap2.default.name]);

/***/ },
/* 399 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	        value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _angularUiRouter = __webpack_require__(400);
	
	var _angularUiRouter2 = _interopRequireDefault(_angularUiRouter);
	
	var _component = __webpack_require__(401);
	
	var _component2 = _interopRequireDefault(_component);
	
	var _menuToggle = __webpack_require__(407);
	
	var _menuLink = __webpack_require__(409);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var _module = _angular2.default.module('sidenav.component', [_angularUiRouter2.default]).directive('menuToggle', _menuToggle.MenuToggleDirective).directive('menuLink', _menuLink.MenuLinkDirective).component('nxSidenav', _component2.default);
	
	exports.default = _module;

/***/ },
/* 400 */,
/* 401 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _template = __webpack_require__(402);
	
	var _template2 = _interopRequireDefault(_template);
	
	__webpack_require__(403);
	
	var _controller = __webpack_require__(404);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = {
	    templateUrl: _template2.default,
	    controller: _controller.Controller,
	    controllerAs: 'vm',
	    bindings: {
	        isTeam: '<'
	    }
	};

/***/ },
/* 402 */
/***/ function(module, exports) {

	var path = '/Users/rigobcastro/Code/nexo.dev/angular/app/components/nxSidenav/template.html';
	var html = "<md-sidenav\n        class=\"md-sidenav-left sidenav-component\"\n        md-component-id=\"left\"\n        md-is-locked-open=\"$mdMedia('gt-sm')\"\n        md-disable-backdrop>\n    <md-toolbar>\n        <div id=\"nexo-avatar\" class=\"logo\">\n            <div></div>\n        </div>\n    </md-toolbar>\n    <md-content md-theme=\"default\" flex>\n        <ul class=\"menu\">\n            <li ng-repeat=\"item in vm.menu\">\n                <md-button ng-click=\"item.open = !item.open\" ng-if=\"!!item.children\">\n                    <div flex layout=\"row\">\n                        {{ 'MENU.' + item.name | translate }}\n                        <span flex></span>\n                        <span aria-hidden=\"true\" class=\"md-toggle-icon\">\n                          <md-icon md-svg-src=\"chevron-down\" aria-hidden=\"true\" ng-if=\"!item.open\"></md-icon>\n                          <md-icon md-svg-src=\"chevron-up\" aria-hidden=\"true\" ng-if=\"item.open\"></md-icon>\n                        </span>\n                    </div>\n                </md-button>\n\n                <md-button ui-sref=\"{{ item.url }}\" ng-if=\"!item.children\">\n                    {{ 'MENU.' + item.name | translate }}\n                </md-button>\n\n                <ul class=\"menu-children\" ng-if=\"!!item.children\" ng-show=\"item.open\">\n                    <li ng-repeat=\"children in item.children\">\n                        <md-button ui-sref=\"{{ children.url }}\">\n                            {{ 'MENU.' + children.name | translate }}\n                        </md-button>\n                    </li>\n                </ul>\n            </li>\n            <li>\n                <md-button href=\"/logout\" target=\"_self\">\n                    {{ 'MENU.SALIR' | translate }}\n                </md-button>\n            </li>\n        </ul>\n    </md-content>\n\n    <md-menu class=\"lang-button\">\n        <md-button aria-label=\"Abrir menu de cambio de lenguaje\" class=\"md-block\"  md-menu-origin ng-click=\"$mdOpenMenu($event)\">\n            {{ 'LANG' | translate }}\n        </md-button>\n        <md-menu-content width=\"4\">\n            <md-menu-item ng-if=\"vm.currentLang == 'es'\">\n                <md-button ng-click=\"vm.changeLang('pt')\">\n                    Português\n                </md-button>\n            </md-menu-item>\n\n            <md-menu-item ng-if=\"vm.currentLang == 'pt'\">\n                <md-button ng-click=\"vm.changeLang('es')\">\n                    Español\n                </md-button>\n            </md-menu-item>\n        </md-menu-content>\n    </md-menu>\n</md-sidenav>";
	window.angular.module('ng').run(['$templateCache', function(c) { c.put(path, html) }]);
	module.exports = path;

/***/ },
/* 403 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 404 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Controller.$inject = ["$rootScope", "$translate", "NEXO", "Store", "Toasts", "$mdDialog", "$window"];
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	exports.Controller = Controller;
	
	var _lodash = __webpack_require__(263);
	
	var _lodash2 = _interopRequireDefault(_lodash);
	
	var _nexoLogoSmall = __webpack_require__(405);
	
	var _nexoLogoSmall2 = _interopRequireDefault(_nexoLogoSmall);
	
	var _changingLangTemplate = __webpack_require__(406);
	
	var _changingLangTemplate2 = _interopRequireDefault(_changingLangTemplate);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	function Controller($rootScope, $translate, NEXO, Store, Toasts, $mdDialog, $window) {
	    "ngInject";
	
	    var vm = this;
	
	    if (this.isTeam) {
	
	        var logo = _lodash2.default.get(NEXO, 'team_logo');
	
	        if (_lodash2.default.isEmpty(logo)) {
	            logo = _nexoLogoSmall2.default;
	        }
	
	        vm.logo = logo;
	
	        vm.menu = [{
	            name: 'DASHBOARD',
	            url: 'dashboard'
	        }, {
	            name: 'ASIGNACIONES',
	            url: 'asignaciones'
	        }, {
	            name: 'CONFIGURACION',
	            children: [{
	                name: 'PRODUCTOS.PRODUCTOS',
	                url: 'productos'
	            }, {
	                name: 'SERVICIOS',
	                url: 'servicios'
	            }, {
	                name: 'CLIENTES',
	                url: 'clientes'
	            }, {
	                name: 'USUARIOS',
	                url: 'usuarios'
	            }]
	        }, {
	            name: 'ESTADISTICAS.ESTADISTICAS',
	            children: [{
	                name: 'ESTADISTICAS.POR_ESTADO',
	                url: 'estadisticas.servicios'
	            }, {
	                name: 'ESTADISTICAS.POR_RUTERO',
	                url: 'estadisticas.ruteros'
	            }, {
	                name: 'ESTADISTICAS.ENCUESTAS',
	                url: 'estadisticas.encuestas'
	            }]
	        }];
	    } else {
	        vm.logo = _nexoLogoSmall2.default;
	
	        vm.menu = [{
	            name: 'EMPRESAS',
	            url: 'empresas'
	        }, {
	            name: 'USUARIOS',
	            url: 'usuarios'
	        }];
	    }
	
	    vm.currentLang = $translate.use();
	
	    vm.changeLang = function (langKey) {
	        $mdDialog.show({
	            template: _changingLangTemplate2.default,
	            parent: angular.element(document.body),
	            clickOutsideToClose: false
	        });
	
	        Store.mapper('user').changeLang(langKey).then(function () {
	            return $window.location.reload();
	        });
	    };
	
	    // Colocando logo con jquery (es antiguo pero funciona)
	    $('head').append('<style>#nexo-avatar:after{ background:url(' + vm.logo + '); background-size: cover; }</style>');
	}

/***/ },
/* 405 */,
/* 406 */
/***/ function(module, exports) {

	module.exports = "<md-dialog aria-label=\"Mango (Fruit)\"  ng-cloak>\n\n        <md-dialog-content>\n            <div class=\"md-dialog-content\">\n               <p translate=\"GLOBAL.CAMBIANDO_IDIOMA\"></p>\n            </div>\n        </md-dialog-content>\n</md-dialog>";

/***/ },
/* 407 */
/***/ function(module, exports, __webpack_require__) {

	"use strict";
	
	MenuToggleDirective.$inject = ["$timeout", "$mdUtil"];
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	exports.MenuToggleDirective = MenuToggleDirective;
	
	var _menuToggleDirectiveTemplate = __webpack_require__(408);
	
	var _menuToggleDirectiveTemplate2 = _interopRequireDefault(_menuToggleDirectiveTemplate);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	function MenuToggleDirective($timeout, $mdUtil) {
	    "ngInject";
	
	    return {
	        restrict: "E",
	        templateUrl: _menuToggleDirectiveTemplate2.default,
	        link: link,
	        scope: {
	            section: '='
	        }
	    };
	
	    function link($scope, $element) {
	        var controller = $element.parent().controller();
	
	        $scope.isOpen = function () {
	            return controller.isOpen($scope.section);
	        };
	        $scope.toggle = function () {
	            controller.toggleOpen($scope.section);
	        };
	
	        $mdUtil.nextTick(function () {
	            $scope.$watch(function () {
	                return controller.isOpen($scope.section);
	            }, function (open) {
	                var $ul = $element.find('ul');
	
	                var targetHeight = open ? getTargetHeight() : 0;
	                $timeout(function () {
	                    $ul.css({ height: targetHeight + 'px' });
	                }, 0, false);
	
	                function getTargetHeight() {
	                    var targetHeight;
	                    $ul.addClass('no-transition');
	                    $ul.css('height', '');
	                    targetHeight = $ul.prop('clientHeight');
	                    $ul.css('height', 0);
	                    $ul.removeClass('no-transition');
	                    return targetHeight;
	                }
	            });
	        });
	
	        var parentNode = $element[0].parentNode.parentNode.parentNode;
	        if (parentNode.classList.contains('parent-list-item')) {
	            var heading = parentNode.querySelector('h2');
	            $element[0].firstChild.setAttribute('aria-describedby', heading.id);
	        }
	    }
	}

/***/ },
/* 408 */
/***/ function(module, exports) {

	var path = '/Users/rigobcastro/Code/nexo.dev/angular/app/components/nxSidenav/menu-toggle.directive.template.html';
	var html = "<md-button class=\"md-button-toggle\"\n           ng-click=\"toggle()\"\n           aria-controls=\"docs-menu-{{section.name | nospace}}\"\n           aria-expanded=\"{{isOpen()}}\">\n    <div flex layout=\"row\">\n        {{section.name}}\n        <span flex></span>\n    <span aria-hidden=\"true\" class=\"md-toggle-icon\"\n          ng-class=\"{'toggled' : isOpen()}\">\n      <md-icon md-svg-src=\"md-toggle-arrow\"></md-icon>\n    </span>\n    </div>\n  <span class=\"md-visually-hidden\">\n    Toggle {{isOpen()? 'expanded' : 'collapsed'}}\n  </span>\n</md-button>\n\n<ul id=\"docs-menu-{{section.name | nospace}}\" class=\"menu-toggle-list\">\n    <li ng-repeat=\"page in section.pages\">\n        <menu-link section=\"page\"></menu-link>\n    </li>\n</ul>";
	window.angular.module('ng').run(['$templateCache', function(c) { c.put(path, html) }]);
	module.exports = path;

/***/ },
/* 409 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	exports.MenuLinkDirective = MenuLinkDirective;
	
	var _menuLinkDirectiveTemplate = __webpack_require__(410);
	
	var _menuLinkDirectiveTemplate2 = _interopRequireDefault(_menuLinkDirectiveTemplate);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	function MenuLinkDirective() {
	    return {
	        restrict: "E",
	        templateUrl: _menuLinkDirectiveTemplate2.default,
	        link: link,
	        scope: {
	            section: '='
	        }
	    };
	
	    function link($scope, $element) {
	        var controller = $element.parent().controller();
	
	        $scope.isSelected = function () {
	            return controller.isSelected($scope.section);
	        };
	
	        $scope.focusSection = function () {
	            // set flag to be used later when
	            // $locationChangeSuccess calls openPage()
	            controller.autoFocusContent = true;
	        };
	    }
	}

/***/ },
/* 410 */
/***/ function(module, exports) {

	var path = '/Users/rigobcastro/Code/nexo.dev/angular/app/components/nxSidenav/menu-link.directive.template.html';
	var html = "<md-button\n        ng-class=\"{'active' : isSelected()}\"\n        ng-href=\"{{section.url}}\"\n        ng-click=\"focusSection()\">\n    {{section | humanizeDoc}}\n  <span class=\"_md-visually-hidden\"\n        ng-if=\"isSelected()\">\n    current page\n  </span>\n</md-button>";
	window.angular.module('ng').run(['$templateCache', function(c) { c.put(path, html) }]);
	module.exports = path;

/***/ },
/* 411 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	        value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _header = __webpack_require__(412);
	
	var _header2 = _interopRequireDefault(_header);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	__webpack_require__(261);
	
	var headerComponentModule = _angular2.default.module('header.component', ['ncy-angular-breadcrumb']).component('nxHeader', _header2.default);
	
	exports.default = headerComponentModule;

/***/ },
/* 412 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _headerComponent = __webpack_require__(413);
	
	var _headerComponent2 = _interopRequireDefault(_headerComponent);
	
	var _header = __webpack_require__(414);
	
	var _header2 = _interopRequireDefault(_header);
	
	__webpack_require__(415);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var headerComponent = {
	    restrict: 'E',
	    template: _headerComponent2.default,
	    controller: _header2.default,
	    controllerAs: 'vm'
	};
	
	exports.default = headerComponent;

/***/ },
/* 413 */
/***/ function(module, exports) {

	module.exports = "<md-toolbar class=\"md-whiteframe-3dp\" md-theme=\"nexo\">\n    <div class=\"md-toolbar-tools\">\n        <md-button class=\"md-icon-button\" aria-label=\"Informacion\"  ng-click=\"vm.toggleSidenav()\" ng-if=\"vm.showSidenavToggleButton\">\n            <md-icon md-svg-icon=\"menu\"></md-icon>\n        </md-button>\n        <div ncy-breadcrumb></div>\n        <span flex></span>\n    </div>\n</md-toolbar>\n";

/***/ },
/* 414 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _classCallCheck2 = __webpack_require__(365);
	
	var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var HeaderController = function HeaderController($rootScope, $scope, $mdSidenav, $mdMedia, $translate, $timeout) {
	    "ngInject";
	
	    (0, _classCallCheck3.default)(this, HeaderController);
	    var vm = this;
	
	    vm.langs = [{
	        name: 'Español',
	        key: 'es'
	    }, {
	        name: 'Português',
	        key: 'pr'
	    }, {
	        name: 'English',
	        key: 'en'
	    }];
	
	    $rootScope.$watch('title', function (title) {
	        vm.title = title;
	    });
	
	    /*$timeout(() => {
	        $mdSidenav('left').then(function (instance) {
	            vm.sidenav = instance;
	             $scope.$watch(() => $mdMedia('gt-sm'), (gtSm) => {
	                vm.showSidenavToggleButton = !gtSm;
	            })
	        });
	    });
	     vm.toggleSidenav = () => {
	        $timeout(() => $mdSidenav('left').toggle())
	    }*/
	};
	HeaderController.$inject = ["$rootScope", "$scope", "$mdSidenav", "$mdMedia", "$translate", "$timeout"];
	
	exports.default = HeaderController;

/***/ },
/* 415 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 416 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	        value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _angularMaterialDataTable = __webpack_require__(417);
	
	var _angularMaterialDataTable2 = _interopRequireDefault(_angularMaterialDataTable);
	
	var _nxTable = __webpack_require__(419);
	
	var _nxTable2 = _interopRequireDefault(_nxTable);
	
	var _row = __webpack_require__(429);
	
	var _index = __webpack_require__(430);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('app.nxTable.component', [_angularMaterialDataTable2.default]).filter('row', _row.RowFilter).directive('nxTableActionsButtons', _index.NxTableActionsButtonsDirective).component('nxTable', _nxTable2.default);

/***/ },
/* 417 */,
/* 418 */,
/* 419 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _nxTableComponent = __webpack_require__(420);
	
	var _nxTableComponent2 = _interopRequireDefault(_nxTableComponent);
	
	var _nxTable = __webpack_require__(421);
	
	var _nxTable2 = _interopRequireDefault(_nxTable);
	
	__webpack_require__(426);
	
	__webpack_require__(428);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var nxTableComponent = {
	    restrict: 'E',
	    bindings: {
	        options: '<'
	    },
	    template: _nxTableComponent2.default,
	    controller: _nxTable2.default,
	    controllerAs: 'vm'
	};
	
	exports.default = nxTableComponent;

/***/ },
/* 420 */
/***/ function(module, exports) {

	module.exports = "<div ng-hide=\"vm.pagination.total == 0 && !filterValue.length\">\n    <md-toolbar class=\"md-toolbar-grey md-table-toolbar\">\n        <div class=\"md-toolbar-tools\">\n\n            <form class=\"search\" name=\"filter.form\" ng-class=\"{'focus' : focussed}\" click-outside=\"focus = false\">\n                <div layout=\"row\" layout-align=\"start center\">\n                    <md-icon ng-hide=\"!!filterValue\" md-svg-icon=\"magnify\"></md-icon>\n                    <md-icon ng-show=\"!!filterValue\" md-svg-icon=\"close\"></md-icon>\n                    <input type=\"text\" placeholder=\"{{ 'TABLE.BUSCAR' | translate }}\" ng-model=\"filterValue\" ng-change=\"vm.onFilter(filterValue, filterUser)\" ng-model-options=\"{debounce:500}\" aria-invalid=\"false\" ng-focus=\"focussed = true\">\n\n                    <md-select ng-if=\"vm.resource == 'assignment'\" placeholder=\"Usuarios\" ng-model=\"filterUser\" style=\"min-width: 200px;\" class=\"selectFilter\" ng-change=\"vm.onFilter(filterValue, filterUser)\">\n                        <md-option ng-value=\"\">Todos</md-option>\n                        <md-option ng-value=\"user.id\" ng-repeat=\"user in vm.users\">{{user.name}}</md-option>\n                    </md-select>\n                </div>\n            </form>\n\n            <span flex></span>\n\n            <div ng-if=\"!!vm.actions.header\">\n                <md-button md-theme=\"nexo\" ui-sref=\"{{ button.state }}\" class=\"md-raised md-secondary mr-0\" ng-repeat=\"button in vm.actions.header\" translate=\"{{ button.text }}\"></md-button>\n            </div>\n\n            <div ng-if=\"!!vm.actions.import\">\n                <md-button md-theme=\"nexo\" ui-sref=\"{{ vm.actions.import }}\" class=\"md-raised md-secondary mr-0\">\n                    {{ 'TABLE.IMPORTAR' | translate }}\n                </md-button>\n            </div>\n            <div ng-if=\"!!vm.actions.create\">\n                <md-button md-theme=\"nexo\" ui-sref=\"{{ vm.actions.create }}\" class=\"md-raised md-primary mr-0\">\n                    {{ 'TABLE.CREAR' | translate }}\n                </md-button>\n            </div>\n        </div>\n    </md-toolbar>\n\n    <md-table-container>\n        <table md-table ng-model=\"vm.selected\" md-progress=\"vm.promise\" md-theme=\"nexo\">\n            <thead md-head md-order=\"vm.query.order\" md-on-reorder=\"vm.getItems\">\n                <tr md-row>\n                    <th md-column md-order-by=\"{{ column.orderBy }}\" ng-repeat=\"column in vm.columns\" ng-attr-md-numeric=\"column.isNumeric\">\n                        <span>{{ vm.getColumnName(column) }}</span>\n                    </th>\n                    <th md-column md-numeric></th>\n                </tr>\n            </thead>\n            <tbody md-body>\n                <tr md-row md-select=\"item\" md-select-id=\"id\" md-auto-select ng-repeat=\"item in vm.items\">\n                    <td md-cell ng-repeat=\"column in vm.columns\">\n                        <div ng-if=\"!column.isImage\">{{ item | row:column }}</div>\n                        <div class=\"avatar\" ng-if=\"column.isImage\">\n                            <img ng-src=\"{{ vm.getImage(item, column) }}?{{$index}}\">\n                        </div>\n                    </td>\n\n                    <td md-cell>\n                        <md-menu md-position-mode=\"target-right target\">\n                            <md-button aria-label=\"Open demo menu\" class=\"md-icon-button\" ng-click=\"$mdOpenMenu($event)\">\n                                <md-icon md-menu-origin md-svg-icon=\"dots-vertical\"></md-icon>\n                            </md-button>\n                            <md-menu-content width=\"3\">\n                                <md-menu-item ng-repeat=\"button in vm.buttons\">\n                                    <md-button aria-label=\"{{ button.label }}\" ng-attr-ng-href=\"{{ vm.getButtonUrl(item, button) }}\" ng-attr-target=\"{{ button.target }}\">\n                                        {{ vm.getButtonName(button) }}\n                                    </md-button>\n                                </md-menu-item>\n                                <md-menu-item ng-if=\"!!vm.actions.show\">\n                                    <md-button aria-label=\"{{ 'TABLE.VER' | translate }}\" ng-click=\"vm.goToClick(vm.actions.show, { id: item.id })\">\n                                        {{ 'TABLE.VER' | translate }}\n                                    </md-button>\n                                </md-menu-item>\n                                <md-menu-item ng-if=\"!!vm.actions.edit\">\n                                    <md-button aria-label=\"{{ 'TABLE.EDITAR' | translate }}\" ng-click=\"vm.goToClick(vm.actions.edit, { id: item.id })\">\n                                        {{ 'TABLE.EDITAR' | translate }}\n                                    </md-button>\n                                </md-menu-item>\n                                <md-menu-item ng-hide=\"vm.actions.hideDelete\">\n                                    <md-button ng-click=\"vm.onDelete($event, item)\" aria-label=\"{{ 'TABLE.ELIMINAR' | translate }}\">\n                                        {{ 'TABLE.ELIMINAR' | translate }}\n                                    </md-button>\n                                </md-menu-item>\n                            </md-menu-content>\n                        </md-menu>\n                    </td>\n                </tr>\n            </tbody>\n        </table>\n\n\n    </md-table-container>\n\n    <md-table-pagination md-limit=\"vm.query.limit\" md-limit-options=\"[10, 25, 50, 100]\" md-page=\"vm.query.page\" md-total=\"{{vm.pagination.total}}\" md-on-paginate=\"vm.getItems\" md-label=\"{{ vm.paginationLabels }}\" md-page-select>\n    </md-table-pagination>\n</div>\n\n\n<div class=\"no-records\" ng-show=\"vm.pagination.total == 0 && !filterValue.length\">\n    <md-content layout=\"column\" layout-align=\"center center\">\n        <h3>{{ vm.lang.noRecords | translate }}</h3>\n        <md-button md-theme=\"nexo\" ng-if=\"!!vm.actions.create\" ui-sref=\"{{ vm.actions.create }}\" class=\"md-raised md-primary\">{{ vm.lang.createFirst | translate }}</md-button>\n        <md-button class=\"md-raised\" md-theme=\"nexo\" ng-if=\"!!vm.actions.import\" ui-sref=\"{{ vm.actions.import }}\">{{ vm.lang.orImport | translate }}</md-button>\n    </md-content>\n</div>\n";

/***/ },
/* 421 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _classCallCheck2 = __webpack_require__(365);
	
	var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
	
	var _createClass2 = __webpack_require__(422);
	
	var _createClass3 = _interopRequireDefault(_createClass2);
	
	var _lodash = __webpack_require__(263);
	
	var _lodash2 = _interopRequireDefault(_lodash);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var NxTableController = function () {
	    NxTableController.$inject = ["$translate", "Store", "$mdDialog", "$mdToast", "$interpolate", "$state", "$filter", "$timeout"];
	    function NxTableController($translate, Store, $mdDialog, $mdToast, $interpolate, $state, $filter, $timeout) {
	        "ngInject";
	
	        (0, _classCallCheck3.default)(this, NxTableController);
	        var vm = this;
	
	        var _vm$options = vm.options;
	        var _vm$options$resource = _vm$options.resource;
	        var resource = _vm$options$resource === undefined ? null : _vm$options$resource;
	        var _vm$options$columns = _vm$options.columns;
	        var columns = _vm$options$columns === undefined ? {} : _vm$options$columns;
	        var _vm$options$actions = _vm$options.actions;
	        var actions = _vm$options$actions === undefined ? {} : _vm$options$actions;
	        var _vm$options$buttons = _vm$options.buttons;
	        var buttons = _vm$options$buttons === undefined ? {} : _vm$options$buttons;
	        var _vm$options$locale = _vm$options.locale;
	        var locale = _vm$options$locale === undefined ? {} : _vm$options$locale;
	        var _vm$options$lang = _vm$options.lang;
	        var lang = _vm$options$lang === undefined ? {
	            noRecords: 'TABLE.NO_RESULTADOS',
	            createFirst: 'TABLE.CREAR_EL_PRIMERO',
	            orImport: 'TABLE.O_IMPORTAR'
	        } : _vm$options$lang;
	        var _vm$options$defaultOr = _vm$options.defaultOrder;
	        var defaultOrder = _vm$options$defaultOr === undefined ? '-id' : _vm$options$defaultOr;
	        var _vm$options$include = _vm$options.include;
	        var include = _vm$options$include === undefined ? null : _vm$options$include;
	
	
	        vm.$mdDialog = $mdDialog;
	        vm.$mdToast = $mdToast;
	        vm.$interpolate = $interpolate;
	        vm.$state = $state;
	        vm.Store = Store;
	        vm.$filter = $filter;
	
	        vm.locale = locale;
	        vm.resource = resource;
	        vm.columns = columns;
	        vm.lang = lang;
	        vm.buttons = buttons;
	        vm.actions = actions;
	        vm.selected = [];
	        vm.query = {
	            order: defaultOrder,
	            limit: 10,
	            page: 1,
	            include: include
	        };
	
	        vm.minItemsPerPage = 10;
	        vm.maxItemsPerPage = 100;
	
	        // paginations labels
	        vm.paginationLabels = {
	            page: $translate.instant('TABLE.PAGINATION.PAGE'),
	            rowsPerPage: $translate.instant('TABLE.PAGINATION.ROWS_PER_PAGE'),
	            of: $translate.instant('TABLE.PAGINATION.OF')
	        };
	
	        vm.getItems = getItems;
	        vm.onFilter = onFilter;
	
	        // Primera carga
	        getItems();
	
	        if (vm.resource == 'assignment') {
	            Store.mapper('user').findAll({ role: 'rutero' }).then(function (response) {
	                vm.users = response.data;
	            });
	        }
	
	        function onFilter(search, search_user) {
	            vm.query.page = 1;
	            vm.query.search = search;
	
	            if (vm.resource == 'assignment') {
	                vm.query.search_user = search_user;
	            }
	
	            getItems();
	        }
	
	        function getItems() {
	            var onSuccess = function onSuccess(response) {
	                vm.items = response.data;
	                vm.pagination = _lodash2.default.get(response, 'meta.pagination');
	            };
	
	            vm.promise = Store.mapper(vm.resource).findAll(vm.query).then(onSuccess);
	        }
	    }
	
	    (0, _createClass3.default)(NxTableController, [{
	        key: 'onDelete',
	        value: function onDelete(event, item) {
	            var vm = this,
	                name = _lodash2.default.get(item, 'name', 'el recurso');
	
	            // Appending dialog to document.body to cover sidenav in docs app
	            var confirm = vm.$mdDialog.confirm().title('¿Desea eliminar a "' + name + '"?').textContent('Esta acción no se puede deshacer.').ariaLabel('Eliminar').targetEvent(event).theme('nexo').ok('Eliminar').cancel('Cancelar');
	
	            vm.$mdDialog.show(confirm).then(function () {
	                vm.Store.destroy({
	                    resource: vm.resource,
	                    data: item
	                }).then(function () {
	                    vm.getItems();
	                });
	            });
	        }
	    }, {
	        key: 'getColumnName',
	        value: function getColumnName(column) {
	            return this.$filter('translate')('PAGES.' + this.locale.page + '.TABLE.COLUMNS.' + this.$filter('uppercase')(column.name));
	        }
	    }, {
	        key: 'getImage',
	        value: function getImage(item, column) {
	            return _lodash2.default.get(item, column.value);
	        }
	    }, {
	        key: 'getButtonName',
	        value: function getButtonName(button) {
	            var buttonName = button.label.split(' ').join('_');
	            return this.$filter('translate')('PAGES.' + this.locale.page + '.TABLE.BUTTONS.' + this.$filter('uppercase')(buttonName));
	        }
	    }, {
	        key: 'getButtonUrl',
	        value: function getButtonUrl(item, button) {
	            return _lodash2.default.get(item, button.href);
	        }
	    }, {
	        key: 'goToClick',
	        value: function goToClick(state, params) {
	            if (!_lodash2.default.isEmpty(state)) {
	                this.$state.go(state, params, {
	                    reload: true
	                });
	            }
	        }
	    }, {
	        key: 'getState',
	        value: function getState(state) {
	            var params = arguments.length <= 1 || arguments[1] === undefined ? {} : arguments[1];
	
	            if (_lodash2.default.isEmpty(state)) {
	                return false;
	            }
	            return this.$state.href(state, params);
	        }
	    }]);
	    return NxTableController;
	}();
	
	exports.default = NxTableController;

/***/ },
/* 422 */,
/* 423 */,
/* 424 */,
/* 425 */,
/* 426 */,
/* 427 */,
/* 428 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 429 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	RowFilter.$inject = ["$interpolate", "$filter"];
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	exports.RowFilter = RowFilter;
	
	var _lodash = __webpack_require__(263);
	
	var _lodash2 = _interopRequireDefault(_lodash);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	function RowFilter($interpolate, $filter) {
	    "ngInject";
	
	    return function (item, column) {
	        var key = _lodash2.default.get(column, 'value', _lodash2.default.get(column, 'orderBy')),
	            filter = _lodash2.default.get(column, 'filter', false),
	            value = _lodash2.default.get(item, key);
	
	        if (!!filter) {
	            var result = $interpolate('{{ value | ' + filter + ' }}');
	            return result({ value: value });
	        }
	
	        return value;
	    };
	}

/***/ },
/* 430 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	exports.NxTableActionsButtonsDirective = NxTableActionsButtonsDirective;
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _jquery = __webpack_require__(43);
	
	var _jquery2 = _interopRequireDefault(_jquery);
	
	var _template = __webpack_require__(431);
	
	var _template2 = _interopRequireDefault(_template);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	function NxTableActionsButtonsDirective() {
	    "ngInject";
	
	    return {
	        restrict: "EA",
	        template: _template2.default,
	        link: link
	    };
	
	    function link($scope, element) {
	        var $element = (0, _jquery2.default)(element),
	            $table = $element.parent().find('table');
	    }
	}

/***/ },
/* 431 */
/***/ function(module, exports) {

	module.exports = "<div class=\"nx-table-actions-buttons\" style=\"display: none;\">\n    <md-button class=\"md-icon-button\">\n        <md-icon md-svg-icon=\"pencil\"></md-icon>\n    </md-button>\n\n    <md-button class=\"md-icon-button\">\n        <md-icon md-svg-icon=\"delete-variant\"></md-icon>\n    </md-button>\n</div>";

/***/ },
/* 432 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _nxImport = __webpack_require__(433);
	
	var _nxImport2 = _interopRequireDefault(_nxImport);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var nxImportComponentModule = _angular2.default.module('nxImport.component', []).component('nxImport', _nxImport2.default);
	
	exports.default = nxImportComponentModule;

/***/ },
/* 433 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _nxImportComponent = __webpack_require__(434);
	
	var _nxImportComponent2 = _interopRequireDefault(_nxImportComponent);
	
	var _nxImport = __webpack_require__(435);
	
	var _nxImport2 = _interopRequireDefault(_nxImport);
	
	__webpack_require__(436);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var nxImportComponent = {
	    restrict: 'E',
	    bindings: {
	        resource: '<',
	        redirectTo: '<'
	    },
	    template: _nxImportComponent2.default,
	    controller: _nxImport2.default,
	    controllerAs: 'vm',
	    transclude: {
	        header: '?nxImportHeader',
	        instructions: 'nxImportInstructions'
	    }
	};
	
	exports.default = nxImportComponent;

/***/ },
/* 434 */
/***/ function(module, exports) {

	module.exports = "<div ng-hide=\"vm.importing\">\n    <md-toolbar class=\"md-toolbar-grey\" ng-transclude=\"header\" ng-hide=\"vm.initImported\"></md-toolbar>\n\n    <md-toolbar class=\"md-toolbar-grey\" ng-show=\"vm.initImported\">\n        <div class=\"md-toolbar-tools\">\n            <h3>\n                <span>Finalizar importación</span>\n            </h3>\n\n            <span flex></span>\n\n            <md-button class=\"md-raised\" ui-sref=\"{{ vm.redirectTo || 'dashboard' }}\">\n                Cancelar\n            </md-button>\n\n            <md-button class=\"md-raised\" ng-click=\"vm.initImported = false\" ng-show=\"vm.initImported\">\n                Reintentar\n            </md-button>\n\n            <md-button class=\"md-raised md-primary\" ng-click=\"vm.finish($event)\" md-theme=\"nexo\"\n                       ng-if=\"vm.initImportData.total_ready > 0\">\n                Finalizar\n            </md-button>\n        </div>\n    </md-toolbar>\n</div>\n\n\n<div layout=\"row\" layout-sm=\"column\" layout-align=\"space-around\" ng-show=\"vm.importing\">\n    <md-progress-circular md-theme=\"nexo\" md-mode=\"indeterminate\" md-diameter=\"100px\"></md-progress-circular>\n</div>\n\n<md-content layout=\"column\" layout-padding ng-hide=\"vm.importing || vm.initImported\">\n    <div ng-transclude=\"instructions\"></div>\n\n    <md-divider></md-divider>\n\n    <div class=\"md-body-1\" layout=\"row\" layout-sm=\"column\" layout-wrap layout-fill layout-padding\n         layout-align=\"center center\" flex>\n\n        <div flex>\n            <p>Cuando esté listo su archivo, seleccionelo desde su computador y presione iniciar importación.</p>\n        </div>\n\n        <div flex>\n\n            <form name=\"importForm\" novalidate flex>\n\n                <md-button class=\"md-raised md-primary\"\n                           md-theme=\"nexo\"\n                           ngf-select\n                           ngf-change=\"vm.upload(importForm, $file, $event)\"\n                           ngf-drop=\"vm.upload(importForm, $file, $event)\"\n                           ng-model=\"vm.model.file\"\n                           name=\"file\"\n                           ngf-pattern=\"'.xls,.xlsx,.csv'\"\n                           ngf-accept=\"'.xls,.xlsx,.csv'\"\n                           ngf-multiple=\"false\">\n                    Seleccionar archivo e iniciar importación\n                </md-button>\n\n            </form>\n\n            <div ng-messages=\"importForm.file.$error\" ng-if=\"importForm.file.$invalid\">\n                <div class=\"alert alert-danger mt\" ng-message=\"pattern\">Extensión del archivo inválida. Seleccione un\n                    archivo con extensión <strong>xls, xlsx o csv</strong>.\n                </div>\n                <div class=\"alert alert-danger mt\" ng-message=\"required\" ng-if=\"importForm.$submitted\">Por favor\n                    seleccione un archivo con extensión <strong>xls, xlsx o csv</strong>.\n                </div>\n            </div>\n        </div>\n\n    </div>\n\n</md-content>\n\n\n<md-content layout=\"column\" layout-padding ng-if=\"vm.initImported\" ng-hide=\"vm.importing\">\n\n    <md-toolbar class=\"md-table-toolbar md-default\">\n        <div class=\"md-toolbar-tools\">\n            <span ng-if=\"vm.initImportData.total_ready != vm.initImportData.total && vm.initImportData.total_ready > 0\">\n                Solo {{ vm.initImportData.total_ready }} elementos listos para importar y {{ vm.initImportData.total_unready }} con errores\n            </span>\n            <span ng-if=\"vm.initImportData.total_ready > 0 && vm.initImportData.total_unready <= 0\">{{ vm.initImportData.total }} elementos para importar</span>\n            <span ng-if=\"vm.initImportData.total_ready <= 0 && vm.initImportData.total_unready > 0\">Ningún elemento para importar</span>\n        </div>\n    </md-toolbar>\n\n    <!-- exact table from live demo -->\n    <md-table-container>\n        <table md-table multiple ng-model=\"vm.selected\" data-md-row-select=\"false\">\n            <thead md-head>\n            <tr md-row>\n                <th md-column></th>\n                <th md-column ng-repeat=\"column in vm.initImportData.columns | orderBy:'order'\">\n                    <span>{{ column.label }}</span></th>\n            </tr>\n            </thead>\n            <tbody md-body>\n            <tr md-row md-select=\"item\" md-select-id=\"id\" ng-repeat=\"item in vm.initImportData.items\">\n                <td md-cell class=\"ta-c\" style=\"max-width: 50px\">\n                    <md-icon class=\"md-primary\" md-svg-icon=\"alert\" md-theme=\"nexo\" ng-if=\"item.errors.length\">\n                        <md-tooltip>\n                            <span ng-repeat-start=\"error in item.errors\">{{ error }}</span><br ng-repeat-end>\n                        </md-tooltip>\n                    </md-icon>\n                </td>\n                <td md-cell ng-repeat=\"column in vm.initImportData.columns | orderBy:'order'\"\n                    ng-style=\"{ minWidth: column.min_width }\">{{item[column.value]}}\n                </td>\n            </tr>\n            </tbody>\n        </table>\n    </md-table-container>\n</md-content>";

/***/ },
/* 435 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _classCallCheck2 = __webpack_require__(365);
	
	var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
	
	var _createClass2 = __webpack_require__(422);
	
	var _createClass3 = _interopRequireDefault(_createClass2);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var NxImportController = function () {
	    NxImportController.$inject = ["$state", "Store", "Upload", "Dialogs", "Toasts"];
	    function NxImportController($state, Store, Upload, Dialogs, Toasts) {
	        "ngInject";
	
	        (0, _classCallCheck3.default)(this, NxImportController);
	        var vm = this;
	
	        vm.$state = $state;
	        vm.Store = Store;
	        vm.Upload = Upload;
	        vm.Dialogs = Dialogs;
	        vm.Toasts = Toasts;
	        vm.selected = [];
	    }
	
	    (0, _createClass3.default)(NxImportController, [{
	        key: 'upload',
	        value: function upload(form, $file, $event) {
	            var vm = this,
	                mapper = vm.Store.mapper(vm.resource);
	
	            vm.initImported = false;
	
	            form.$setSubmitted();
	
	            if (form.$valid) {
	
	                vm.importing = true;
	
	                var params = {
	                    url: '/api/import/' + mapper.endpoint + '/init',
	                    data: {
	                        file: $file
	                    }
	                };
	
	                vm.Upload.upload(params).then(success, error);
	            }
	
	            function success(response) {
	                vm.importing = false;
	                vm.initImported = true;
	                vm.initImportData = response.data;
	
	                var unready = _.get(response, 'data.total_unready', 0),
	                    ready = _.get(response, 'data.total_ready', 0);
	
	                if (unready > 0) {
	                    vm.Dialogs.showAlert({
	                        title: 'Elemento con errores',
	                        content: 'Se han encontrado ' + unready + ' elemento(s) con errores, solo se importarán ' + ready + ' elemento(s). Le recomendamos cambiar el/los elemento(s) y volver a subir el archivo'
	                    });
	                }
	            }
	
	            function error(response) {
	                vm.importing = false;
	
	                vm.Dialogs.showAlert({
	                    title: 'Error importando',
	                    content: _.get(response, 'data.message', 'Hubo un error iniciando la importación')
	                });
	            }
	        }
	    }, {
	        key: 'finish',
	        value: function finish($event) {
	            var vm = this,
	                data = vm.initImportData.items_ready;
	
	            vm.importing = true;
	            vm.Store.finishImport(vm.resource, data).then(success, error);
	
	            function success(response) {
	                vm.importing = false;
	
	                vm.Toasts.showActionToast({
	                    content: 'Se han importado ' + response.data.saved + ' elementos correctamente'
	                });
	
	                var redirectTo = _.get(vm, 'redirectTo', '^');
	
	                vm.$state.go(redirectTo);
	            }
	
	            function error(response) {
	                vm.importing = false;
	                vm.Dialogs.showAlert({
	                    title: 'Error importando',
	                    content: _.get(response, 'data.message', 'Hubo un error ejecutando la importación')
	                });
	            }
	        }
	    }]);
	    return NxImportController;
	}();
	
	exports.default = NxImportController;

/***/ },
/* 436 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 437 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _nxAlert = __webpack_require__(438);
	
	var _nxAlert2 = _interopRequireDefault(_nxAlert);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var nxAlertComponentModule = _angular2.default.module('nxAlert.component', []).component('nxAlert', _nxAlert2.default);
	
	exports.default = nxAlertComponentModule;

/***/ },
/* 438 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _nxAlertComponent = __webpack_require__(439);
	
	var _nxAlertComponent2 = _interopRequireDefault(_nxAlertComponent);
	
	var _nxAlert = __webpack_require__(440);
	
	var _nxAlert2 = _interopRequireDefault(_nxAlert);
	
	__webpack_require__(441);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var nxAlertComponent = {
	    restrict: 'E',
	    bindings: {
	        icon: '@',
	        message: '@',
	        type: '@'
	    },
	    template: _nxAlertComponent2.default,
	    controller: _nxAlert2.default,
	    controllerAs: 'vm',
	    transclude: true
	};
	
	exports.default = nxAlertComponent;

/***/ },
/* 439 */
/***/ function(module, exports) {

	module.exports = "<div class=\"nx-alert-body\">\n    <md-icon class=\"nx-alert-icon\" md-svg-icon=\"{{ vm.icon }}\"></md-icon>\n    <div class=\"nx-alert-message\" ng-bind-html=\"vm.message\"></div>\n</div>\n<div ng-transclude class=\"nx-alert-actions\"></div>\n\n\n";

/***/ },
/* 440 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _classCallCheck2 = __webpack_require__(365);
	
	var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var NxAlertController = function NxAlertController() {
	    "ngInject";
	
	    (0, _classCallCheck3.default)(this, NxAlertController);
	    var vm = this;
	
	    if (!vm.icon) {
	        switch (vm.type) {
	            case 'warning':
	                vm.icon = 'alert-box';
	                break;
	        }
	    }
	};
	
	exports.default = NxAlertController;

/***/ },
/* 441 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 442 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _assignmentDetail = __webpack_require__(443);
	
	var _assignmentDetail2 = _interopRequireDefault(_assignmentDetail);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var _module = _angular2.default.module('assignmentDetail.component', []).component('assignmentDetail', _assignmentDetail2.default);
	
	exports.default = _module;

/***/ },
/* 443 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _assignmentDetailComponent = __webpack_require__(444);
	
	var _assignmentDetailComponent2 = _interopRequireDefault(_assignmentDetailComponent);
	
	var _assignmentDetail = __webpack_require__(445);
	
	var _assignmentDetail2 = _interopRequireDefault(_assignmentDetail);
	
	__webpack_require__(446);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var component = {
	    restrict: 'E',
	    template: _assignmentDetailComponent2.default,
	    controller: _assignmentDetail2.default,
	    controllerAs: 'vm',
	    bindings: {
	        item: '<',
	        creationMode: '<',
	        users: '<',
	        recurrenceDates: '<',
	        services: '<',
	        products: '<'
	    }
	};
	
	exports.default = component;

/***/ },
/* 444 */
/***/ function(module, exports) {

	module.exports = "<md-content layout=\"row\" layout-margin layout-fill>\n    <div flex-xs=\"100\" flex=\"50\" layout=\"column\">\n        <div class=\"md-nx-panel mb\" md-whiteframe=\"1\">\n            <md-toolbar>\n                <div class=\"md-toolbar-tools\">\n                    <h5>Información del cliente</h5>\n                </div>\n            </md-toolbar>\n            <ul class=\"nx-detail-list\">\n                <li>\n                    <strong>Nombre</strong>\n                    <span class=\"fl-r\">{{vm.item.customer.name}}</span>\n                </li>\n\n                <li>\n                    <strong>Documento</strong>\n                    <span class=\"fl-r\">{{vm.item.customer.document_formatted}}</span>\n                </li>\n\n                <li>\n                    <strong>Email</strong>\n                    <span class=\"fl-r\">{{vm.item.customer.email}}</span>\n                </li>\n\n                <li ng-repeat=\"phone in vm.item.customer.phones.data\">\n                    <strong>Teléfono {{$index+1}}</strong>\n                    <span class=\"fl-r\">{{phone.phone}}</span>\n                </li>\n            </ul>\n        </div>\n\n        <div class=\"md-nx-panel\" md-whiteframe=\"1\">\n            <img class=\"img-fluid\" ng-src=\"{{ vm.item.map }}\" alt=\"Mapa de la asignación\">\n\n            <ul class=\"nx-detail-list\">\n                <li>\n                    <strong>Dirección</strong>\n                    <span class=\"fl-r\">{{vm.item.address }}</span>\n                </li>\n            </ul>\n        </div>\n    </div>\n\n\n\n    <div flex-xs=\"100\" flex=\"50\" layout=\"column\">\n        <div class=\"md-nx-panel mb\" md-whiteframe=\"1\" ng-if=\"vm.users.length > 0\">\n            <md-toolbar>\n                <div class=\"md-toolbar-tools\">\n                    <h5>Ruteros asignados</h5>\n                </div>\n            </md-toolbar>\n            <md-content layout=\"column\" layout-padding>\n                <md-list>\n                    <md-list-item ng-repeat=\"user in vm.users\">\n                        <img ng-src=\"{{user.avatar[150]}}\" class=\"md-avatar\" alt=\"{{user.name}}\" />\n                        <p>{{user.name}}</p>\n                    </md-list-item>\n                </md-list>\n            </md-content>\n        </div>\n\n        <div class=\"md-nx-panel mb\" md-whiteframe=\"1\" ng-if=\"!vm.creationMode\">\n            <md-toolbar>\n                <div class=\"md-toolbar-tools\">\n                    <h5>Información general</h5>\n                </div>\n            </md-toolbar>\n            <ul class=\"nx-detail-list\">\n                <li>\n                    <strong>Estado</strong>\n\n                    <div class=\"fl-r\">\n                        <span class=\"label nexo-service-{{service.status.slug}}\">{{vm.item.status.name}}</span>\n                    </div>\n                </li>\n\n                <li>\n                    <strong>Código del servicio</strong>\n                    <span class=\"fl-r\">{{vm.item.code }}</span>\n                </li>\n\n                <li>\n                    <strong>Código de verificación</strong>\n                    <span class=\"fl-r\">{{vm.item.verification_code }}</span>\n                </li>\n\n                <li ng-if=\"!!vm.item.observations\">\n                    <strong>Observaciones</strong>\n                    <span class=\"fl-r\">{{vm.item.observations }}</span>\n                </li>\n            </ul>\n        </div>\n\n        <!-- Programación -->\n        <div class=\"md-nx-panel mb\" md-whiteframe=\"1\">\n            <md-toolbar>\n                <div class=\"md-toolbar-tools\">\n                    <h5>Programación de la asignación</h5>\n                </div>\n            </md-toolbar>\n            <ul class=\"nx-detail-list\">\n                <li>\n                    <strong>Tipo de programación</strong>\n                    <span class=\"fl-r\">{{ 'OPTIONS.' + vm.item.date_type | uppercase |translate }}</span>\n                </li>\n\n                <li>\n                    <strong>Tipo de asignación</strong>\n                    <span class=\"fl-r\">{{ 'OPTIONS.' + vm.item.assignment_type | uppercase | translate }}</span>\n                </li>\n\n                <li>\n                    <strong>Inicia</strong>\n                    <span class=\"fl-r\">{{ vm.item.start_at.date || vm.item.start_at | amDateFormat:'LLLL' }}</span>\n                </li>\n\n                <li>\n                    <strong>Finaliza</strong>\n                    <span class=\"fl-r\">{{ vm.item.end_at.date || vm.item.end_at | amDateFormat:'LLLL' }}</span>\n                </li>\n\n                <li>\n                    <strong>Duración</strong>\n                    <span class=\"fl-r\">{{ vm.item.duration }} minutos</span>\n                </li>\n            </ul>\n        </div>\n\n        <!-- Recurrencia -->\n        <div class=\"md-nx-panel mb\" md-whiteframe=\"1\" ng-if=\"vm.recurrenceDates.length > 0\">\n            <md-toolbar>\n                <div class=\"md-toolbar-tools\">\n                    <h5>Recurrencia ({{ vm.recurrenceDates.length }} veces)</h5>\n                </div>\n            </md-toolbar>\n            <md-list class=\"md-dense\">\n                <md-virtual-repeat-container id=\"vr-recurrencia\">\n                    <md-list-item md-virtual-repeat=\"date in vm.recurrenceDates\">\n                        <md-icon md-svg-icon=\"calendar\"></md-icon>\n                        <p>\n                            <small>\n                            {{ date.start.date || date.start | amDateFormat:'LLLL' }} ({{ date.start.date || date.end | amTimeAgo }})\n                          </small>\n                        </p>\n                    </md-list-item>\n                </md-virtual-repeat-container>\n            </md-list>\n        </div>\n\n        <!-- Servicios -->\n        <div class=\"md-nx-panel mb\" md-whiteframe=\"1\" ng-if=\"vm.services.length > 0 && vm.item.with_services\">\n            <md-toolbar>\n                <div class=\"md-toolbar-tools\">\n                    <h5>Servicio(s)</h5>\n                </div>\n            </md-toolbar>\n            <ul class=\"nx-detail-list\">\n                <li ng-repeat=\"service in vm.services\">\n                    <span>{{ service.name }}</span>\n                </li>\n            </ul>\n        </div>\n\n        <!-- Productos -->\n        <div class=\"md-nx-panel mb\" md-whiteframe=\"1\" ng-if=\"vm.products.length > 0 && vm.item.with_products\">\n            <md-toolbar>\n                <div class=\"md-toolbar-tools\">\n                    <h5>Producto(s)</h5>\n                </div>\n            </md-toolbar>\n            <ul class=\"nx-detail-list\">\n                <li ng-repeat=\"serviceProduct in vm.products\">\n                    <span>{{ serviceProduct.product.name }}</span>\n                    <span class=\"fl-r\">{{ serviceProduct.quantity }} unds</span>\n                </li>\n            </ul>\n        </div>\n    </div>\n</md-content>\n";

/***/ },
/* 445 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _classCallCheck2 = __webpack_require__(365);
	
	var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var Controller = function Controller(Store) {
	    "ngInject";
	
	    (0, _classCallCheck3.default)(this, Controller);
	    var vm = this;
	
	    // Corrigiendo with
	    if (!_.isUndefined(vm.item.with)) {
	        vm.item.with_services = vm.item.with == 'services' || vm.item.with == 'both';
	        vm.item.with_products = vm.item.with == 'products' || vm.item.with == 'both';
	    }
	};
	Controller.$inject = ["Store"];
	
	exports.default = Controller;

/***/ },
/* 446 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 447 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _dashboardMap = __webpack_require__(448);
	
	var _dashboardMap2 = _interopRequireDefault(_dashboardMap);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var dashboardMapComponentModule = _angular2.default.module('dashboardMap.component', []).component('dashboardMap', _dashboardMap2.default);
	
	exports.default = dashboardMapComponentModule;

/***/ },
/* 448 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _dashboardMapComponent = __webpack_require__(449);
	
	var _dashboardMapComponent2 = _interopRequireDefault(_dashboardMapComponent);
	
	var _dashboardMap = __webpack_require__(450);
	
	var _dashboardMap2 = _interopRequireDefault(_dashboardMap);
	
	__webpack_require__(451);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var dashboardMapComponent = {
	    restrict: 'E',
	    bindings: {},
	    template: _dashboardMapComponent2.default,
	    controller: _dashboardMap2.default,
	    controllerAs: 'vm'
	};
	
	exports.default = dashboardMapComponent;

/***/ },
/* 449 */
/***/ function(module, exports) {

	module.exports = "<ui-gmap-google-map center=\"map.center\" zoom=\"map.zoom\" draggable=\"true\" options=\"map.options\">\n    <ui-gmap-markers models=\"vm.dashboardMarkers\" coords=\"'self'\" icon=\"'icon'\"></ui-gmap-markers>\n</ui-gmap-google-map>";

/***/ },
/* 450 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _classCallCheck2 = __webpack_require__(365);
	
	var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
	
	var _createClass2 = __webpack_require__(422);
	
	var _createClass3 = _interopRequireDefault(_createClass2);
	
	var _maleBlue = __webpack_require__(368);
	
	var _maleBlue2 = _interopRequireDefault(_maleBlue);
	
	var _service = __webpack_require__(367);
	
	var _service2 = _interopRequireDefault(_service);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var DashboardMapController = function () {
	    DashboardMapController.$inject = ["$scope", "uiGmapIsReady", "uiGmapGoogleMapApi", "$timeout", "Store"];
	    function DashboardMapController($scope, uiGmapIsReady, uiGmapGoogleMapApi, $timeout, Store) {
	        "ngInject";
	
	        (0, _classCallCheck3.default)(this, DashboardMapController);
	        var vm = this;
	
	        $timeout(function () {
	            vm.center = { latitude: 4.6486259, longitude: -74.247892 };
	
	            vm.dashboardMarkers = [];
	
	            var onSuccessUsers = function onSuccessUsers(response) {
	                var users = response.data;
	
	                angular.forEach(users, function (value, key) {
	                    vm.createPoint(value, 1);
	                });
	            };
	
	            var getUsers = Store.findAll('userLocation').then(onSuccessUsers);
	
	            var onSuccess = function onSuccess(response) {
	                var services = response.data;
	
	                angular.forEach(services, function (value, key) {
	                    vm.createPoint(value, 2);
	                });
	            };
	
	            var getServices = Store.findAll('assignment').then(onSuccess);
	
	            $scope.map = {
	                id: 'dashboard',
	                center: {
	                    latitude: vm.center.latitude,
	                    longitude: vm.center.longitude
	                },
	                zoom: 10,
	                options: {
	                    scrollwheel: false,
	                    disableDefaultUI: false
	                }
	            };
	
	            uiGmapGoogleMapApi.then(function (GoogleMaps) {
	
	                uiGmapIsReady.promise(1).then(function (instances) {
	                    instances.forEach(function (inst) {
	
	                        var map = inst.map,
	                            center = new google.maps.LatLng(vm.center.latitude, vm.center.longitude);
	
	                        google.maps.event.trigger(map, 'resize');
	                        map.panTo(center);
	                    });
	                });
	            });
	        });
	    }
	
	    (0, _createClass3.default)(DashboardMapController, [{
	        key: 'addUserPointer',
	        value: function addUserPointer() {
	            var vm = this;
	
	            var latitude = Math.random() * (4.8803933 - 4.458819) + 4.458819;
	            var longitude = Math.random() * (-74.4980257 - -73.8392807) + -73.8392807;
	
	            var points = { latitude: latitude, longitude: longitude };
	
	            vm.createPoint(points, 1);
	        }
	    }, {
	        key: 'deleteUserPointer',
	        value: function deleteUserPointer() {
	            var vm = this;
	
	            if (vm.dashboardMarkers.length > 0) {
	                angular.forEach(vm.dashboardMarkers, function (value, key) {
	                    if (value.type == 1) {
	                        vm.dashboardMarkers.splice(key, 1);
	                        return;
	                    }
	                });
	            }
	        }
	    }, {
	        key: 'addServicePointer',
	        value: function addServicePointer() {
	            var vm = this;
	
	            var latitude = Math.random() * (4.8803933 - 4.458819) + 4.458819;
	            var longitude = Math.random() * (-74.4980257 - -73.8392807) + -73.8392807;
	
	            var points = { latitude: latitude, longitude: longitude };
	
	            vm.createPoint(points, 2);
	        }
	    }, {
	        key: 'deleteServicePointer',
	        value: function deleteServicePointer() {
	            var vm = this;
	
	            if (vm.dashboardMarkers.length > 0) {
	                angular.forEach(vm.dashboardMarkers, function (value, key) {
	                    if (value.type == 2) {
	                        vm.dashboardMarkers.splice(key, 1);
	                        return;
	                    }
	                });
	            }
	        }
	    }, {
	        key: 'createPoint',
	        value: function createPoint(value, type) {
	            var vm = this;
	
	            if (!_.isEmpty(value)) {
	                var count = vm.dashboardMarkers.length + 1;
	
	                var point = {
	                    latitude: value.latitude,
	                    longitude: value.longitude,
	                    title: 'point ' + count,
	                    id: count,
	                    icon: type == 1 ? _maleBlue2.default : _service2.default,
	                    type: type
	                };
	
	                vm.dashboardMarkers.push(point);
	            }
	        }
	    }]);
	    return DashboardMapController;
	}();
	
	exports.default = DashboardMapController;

/***/ },
/* 451 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 452 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _index = __webpack_require__(453);
	
	var _index2 = _interopRequireDefault(_index);
	
	var _index3 = __webpack_require__(458);
	
	var _index4 = _interopRequireDefault(_index3);
	
	var _index5 = __webpack_require__(463);
	
	var _index6 = _interopRequireDefault(_index5);
	
	var _index7 = __webpack_require__(478);
	
	var _index8 = _interopRequireDefault(_index7);
	
	var _index9 = __webpack_require__(503);
	
	var _index10 = _interopRequireDefault(_index9);
	
	var _index11 = __webpack_require__(530);
	
	var _index12 = _interopRequireDefault(_index11);
	
	var _index13 = __webpack_require__(575);
	
	var _index14 = _interopRequireDefault(_index13);
	
	var _index15 = __webpack_require__(600);
	
	var _index16 = _interopRequireDefault(_index15);
	
	var _index17 = __webpack_require__(615);
	
	var _index18 = _interopRequireDefault(_index17);
	
	var _index19 = __webpack_require__(635);
	
	var _index20 = _interopRequireDefault(_index19);
	
	var _index21 = __webpack_require__(642);
	
	var _index22 = _interopRequireDefault(_index21);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('app.pages', [_index2.default.name, _index4.default.name, _index6.default.name, _index8.default.name, _index10.default.name, _index12.default.name, _index14.default.name, _index16.default.name, _index18.default.name, _index20.default.name, _index22.default.name]);

/***/ },
/* 453 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _angularUiRouter = __webpack_require__(400);
	
	var _angularUiRouter2 = _interopRequireDefault(_angularUiRouter);
	
	var _lodash = __webpack_require__(263);
	
	var _lodash2 = _interopRequireDefault(_lodash);
	
	var _dashboard = __webpack_require__(454);
	
	var _dashboard2 = _interopRequireDefault(_dashboard);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var dashboardPageModule = _angular2.default.module('dashboard.component', [_angularUiRouter2.default]).component('dashboard', _dashboard2.default).config(["$urlRouterProvider", "$stateProvider", function ($urlRouterProvider, $stateProvider) {
	    "ngInject";
	
	    var teamId = _lodash2.default.get(window, 'NEXO.team.id', false),
	        isTeam = !!teamId;
	
	    $urlRouterProvider.otherwise(function ($injector) {
	        var $state = $injector.get('$state');
	        $state.go(isTeam ? 'dashboard' : 'empresas');
	    });
	
	    $stateProvider.state({
	        name: 'dashboard',
	        url: '/',
	        component: 'dashboard',
	        resolve: {
	            users: /*@ngInject*/["Store", function users(Store) {
	                return Store.mapper('user').findAll({
	                    order: '-created_at',
	                    limit: 5
	                }).then(function (response) {
	                    return response.data;
	                });
	            }],
	            assignments: /*@ngInject*/["Store", function assignments(Store) {
	                return Store.mapper('assignment').findAll({
	                    order: '-created_at',
	                    limit: 5
	                }).then(function (response) {
	                    return response.data;
	                });
	            }],
	            team: /*@ngInject*/["NEXO", function team(NEXO) {
	                return NEXO.team;
	            }],
	            rolesLimits: /*@ngInject*/["Store", "NEXO", function rolesLimits(Store, NEXO) {
	                return Store.mapper('team').rolesLimits(NEXO.team.id).then(function (response) {
	                    return response.data;
	                });
	            }]
	        },
	        ncyBreadcrumb: {
	            label: _lodash2.default.get(window, 'NEXO.team.name', 'Home')
	        }
	    });
	}]);
	
	exports.default = dashboardPageModule;

/***/ },
/* 454 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _dashboardPage = __webpack_require__(455);
	
	var _dashboardPage2 = _interopRequireDefault(_dashboardPage);
	
	var _dashboardPage3 = __webpack_require__(456);
	
	var _dashboardPage4 = _interopRequireDefault(_dashboardPage3);
	
	__webpack_require__(457);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var dashboardPage = {
	    restrict: 'E',
	    bindings: {
	        users: '<',
	        assignments: '<',
	        team: '<',
	        rolesLimits: '<'
	    },
	    template: _dashboardPage2.default,
	    controller: _dashboardPage4.default,
	    controllerAs: 'vm'
	};
	
	exports.default = dashboardPage;

/***/ },
/* 455 */
/***/ function(module, exports) {

	module.exports = "<div class=\"md-padding\">\n\n    <md-content layout=\"row\" layout-margin layout-wrap layout-fill>\n        <div flex>\n            <div class=\"md-nx-panel\" md-whiteframe=\"1\">\n                <md-toolbar>\n                    <div class=\"md-toolbar-tools\">\n                        <h5 translate=\"PAGES.DASHBOARD.ULTIMAS_ASIGNACIONES_CREADAS\"></h5>\n                    </div>\n                </md-toolbar>\n                <md-content layout=\"column\" layout-padding>\n                  <p ng-if=\"!vm.assignments.length\">No hay asignaciones creadas</p>\n                    <md-list>\n                        <md-list-item ng-repeat=\"item in vm.assignments\" ui-sref=\"asignaciones.ver({ id : item.id })\">\n                            <p>#{{ item.name }}</p>\n                            <span class=\"md-secondary md-caption\">{{ item.created_at.date | amTimeAgo }}</span>\n                        </md-list-item>\n                    </md-list>\n                </md-content>\n            </div>\n\n            <div class=\"md-nx-panel mt\" md-whiteframe=\"1\">\n                <md-toolbar>\n                    <div class=\"md-toolbar-tools\">\n                        <h5 translate=\"PAGES.DASHBOARD.ULTIMOS_USUARIOS_CREADOS\"></h5>\n                    </div>\n                </md-toolbar>\n                <md-content layout=\"column\" layout-padding>\n                  <p ng-if=\"!vm.users.length\">No hay usuarios creados</p>\n                    <md-list class=\"md-dense\">\n                        <md-list-item class=\"md-2-line\" ng-repeat=\"user in vm.users\" ui-sref=\"usuarios.ver({ id : item.id })\">\n                            <img ng-src=\"{{ user.avatar.xs }}\" class=\"md-avatar\" alt=\"{{ user.name }}\" />\n                            <div class=\"md-list-item-text\">\n                                <h3>{{ user.name }}</h3>\n                                <p>{{ user.role }}</p>\n                            </div>\n                            <span class=\"md-secondary md-caption\">{{ user.created_at.date | amTimeAgo }}</span>\n                        </md-list-item>\n                    </md-list>\n                </md-content>\n            </div>\n        </div>\n\n        <div flex>\n            <div class=\"md-nx-panel md-whiteframe-1dp\" md-whiteframe=\"1\">\n                <md-toolbar>\n                    <div class=\"md-toolbar-tools\">\n                        <h5 translate=\"PAGES.DASHBOARD.MODULOS\"></h5>\n                    </div>\n                </md-toolbar>\n                <md-content layout=\"column\" layout-padding>\n                    <md-list class=\"md-dense\">\n                        <md-list-item class=\"pl-0 pr-0\" ng-repeat=\"item in vm.team.modules\">\n\n                            <p>{{ item.name }}</p>\n                            <span flex></span>\n                            <span class=\"nx-label\" ng-class=\"{ green: item.active, red: !item.active }\">\n                              {{ item.active ? 'GLOBAL.ACTIVADO' : 'GLOBAL.DESACTIVADO' | translate }}\n                            </span>\n\n                        </md-list-item>\n                    </md-list>\n                </md-content>\n            </div>\n\n            <div class=\"md-nx-panel md-whiteframe-1dp mt\" md-whiteframe=\"1\">\n                <md-toolbar>\n                    <div class=\"md-toolbar-tools\">\n                        <h5 translate=\"PAGES.DASHBOARD.LIMITES_POR_GRUPO\"></h5>\n                    </div>\n                </md-toolbar>\n                <md-content layout=\"column\" layout-padding>\n                    <md-list class=\"md-dense\">\n                        <md-list-item class=\"pl-0 pr-0\" ng-repeat=\"limit in vm.rolesLimits\">\n\n                            <p translate=\"{{ limit.name }}\"></p>\n                            <div style=\"width: 50%; margin-top: 20px;\">\n                                <div class=\"nx-progress\">\n                                    <div class=\"nx-progress-bar purple\" ng-style=\"{ width: limit.percentage + '%' }\">\n                                      {{ limit.used }} / {{ limit.limit }}\n                                    </div>\n                                </div>\n                            </div>\n\n                        </md-list-item>\n                    </md-list>\n                </md-content>\n            </div>\n\n            <dashboard-map latitude=\"4.709634\" longitude=\"-74.2257879\" ></dashboard-map>\n\n        </div>\n    </md-content>\n</div>\n";

/***/ },
/* 456 */
/***/ function(module, exports, __webpack_require__) {

	"use strict";
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _classCallCheck2 = __webpack_require__(365);
	
	var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var DashboardController = function DashboardController($timeout, uiGmapGoogleMapApi, Firebase, NEXO, Store) {
	    "ngInject";
	
	    (0, _classCallCheck3.default)(this, DashboardController);
	    var vm = this;
	
	    vm.modules = Store.getAll('module');
	};
	DashboardController.$inject = ["$timeout", "uiGmapGoogleMapApi", "Firebase", "NEXO", "Store"];
	
	exports.default = DashboardController;

/***/ },
/* 457 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 458 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _angularUiRouter = __webpack_require__(400);
	
	var _angularUiRouter2 = _interopRequireDefault(_angularUiRouter);
	
	var _mapa = __webpack_require__(459);
	
	var _mapa2 = _interopRequireDefault(_mapa);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var _module = _angular2.default.module('mapa.component', [_angularUiRouter2.default]).config(["$urlRouterProvider", "$stateProvider", function ($urlRouterProvider, $stateProvider) {
	    "ngInject";
	
	    $stateProvider.state({
	        name: 'mapa',
	        url: '/mapa',
	        component: 'mapaPage',
	
	        ncyBreadcrumb: {
	            parent: 'dashboard',
	            label: 'Mapa'
	        }
	    });
	}]).component('mapaPage', _mapa2.default);
	
	exports.default = _module;

/***/ },
/* 459 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _mapaPage = __webpack_require__(460);
	
	var _mapaPage2 = _interopRequireDefault(_mapaPage);
	
	var _mapaPage3 = __webpack_require__(461);
	
	var _mapaPage4 = _interopRequireDefault(_mapaPage3);
	
	__webpack_require__(462);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var dashboardPage = {
	    restrict: 'E',
	    bindings: {
	        users: '<',
	        assignments: '<'
	    },
	    template: _mapaPage2.default,
	    controller: _mapaPage4.default,
	    controllerAs: 'vm'
	};
	
	exports.default = dashboardPage;

/***/ },
/* 460 */
/***/ function(module, exports) {

	module.exports = "<div class=\"map-panels\">\n    <div class=\"maximize-button\" ng-show=\"panelMinized\">\n        <md-button md-theme=\"nexo\" class=\"md-fab md-mini\" aria-label=\"Informacion\" ng-click=\"panelMinized = false\">\n            <md-icon md-svg-icon=\"information-outline\"></md-icon>\n        </md-button>\n    </div>\n\n\n    <section class=\"md-whiteframe-z1\" ng-hide=\"panelMinized\">\n        <md-toolbar>\n            <div class=\"md-toolbar-tools\">\n                <h4>Información rápida</h4>\n                <span class=\"flex\"></span>\n                <md-button class=\"md-icon-button\" ng-click=\"panelMinized = true\">\n                    <md-icon md-svg-icon=\"minus\"></md-icon>\n                </md-button>\n            </div>\n        </md-toolbar>\n        <md-content>\n            <md-list>\n                <md-list-item ng-click=\"navigateTo('data usage', $event)\">\n                    <span class=\"number\">{{ vm.quickStats.services.por_ejecutar }}</span>\n                    <p>Servicios por ejecutar</p>\n                </md-list-item>\n                <md-list-item ng-click=\"navigateTo('data usage', $event)\">\n                    <span class=\"number yellow\">{{ vm.quickStats.services.en_ejecucion }}</span>\n                    <p>Servicios en ejecución</p>\n                </md-list-item>\n                <md-list-item ng-click=\"navigateTo('data usage', $event)\">\n                    <span class=\"number red\">{{ vm.quickStats.services.vencido }}</span>\n                    <p>Servicios vencidos</p>\n                </md-list-item>\n                <md-list-item ng-click=\"navigateTo('data usage', $event)\">\n                    <span class=\"number green\">{{ vm.quickStats.services.realizado}}</span>\n                    <p>Servicios finalizados</p>\n                </md-list-item>\n                <md-list-item ng-click=\"navigateTo('data usage', $event)\">\n                    <span class=\"number blue\">{{ vm.quickStats.users.active || 0 }}</span>\n                    <p>Ruteros conectados</p>\n                </md-list-item>\n            </md-list>\n        </md-content>\n    </section>\n</div>\n\n<ui-gmap-google-map center='vm.map.center' zoom='vm.map.zoom'></ui-gmap-google-map>";

/***/ },
/* 461 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _classCallCheck2 = __webpack_require__(365);
	
	var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var DashboardController = function DashboardController($timeout, uiGmapGoogleMapApi, Firebase, NEXO, Store) {
	    "ngInject";
	
	    (0, _classCallCheck3.default)(this, DashboardController);
	    var vm = this;
	
	    vm.map = {
	        center: {
	            latitude: 4.7368545,
	            longitude: -74.0421179
	        },
	        zoom: 13
	    };
	
	    uiGmapGoogleMapApi.then(mapReady);
	
	    function mapReady() {}
	
	    // Actualizando en vivo las estadisticas del team
	    Firebase.team(NEXO.team_id, 'counters').on('value', function (snap) {
	        $timeout(vm.quickStats = snap.val());
	    });
	};
	DashboardController.$inject = ["$timeout", "uiGmapGoogleMapApi", "Firebase", "NEXO", "Store"];
	
	exports.default = DashboardController;

/***/ },
/* 462 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 463 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _angularUiRouter = __webpack_require__(400);
	
	var _angularUiRouter2 = _interopRequireDefault(_angularUiRouter);
	
	var _empresas = __webpack_require__(464);
	
	var _empresas2 = _interopRequireDefault(_empresas);
	
	var _crear = __webpack_require__(468);
	
	var _crear2 = _interopRequireDefault(_crear);
	
	var _editar = __webpack_require__(473);
	
	var _editar2 = _interopRequireDefault(_editar);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var empresasPageModule = _angular2.default.module('empresas.component', [_angularUiRouter2.default, _crear2.default.name, _editar2.default.name]).config(["$stateProvider", function ($stateProvider) {
	    "ngInject";
	
	    $stateProvider.state({
	        name: 'empresas',
	        url: '/empresas',
	        component: 'empresasPage',
	        ncyBreadcrumb: {
	            label: 'PAGES.EMPRESAS.TITLE'
	        }
	    });
	}]).component('empresasPage', _empresas2.default);
	
	exports.default = empresasPageModule;

/***/ },
/* 464 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _empresasPage = __webpack_require__(465);
	
	var _empresasPage2 = _interopRequireDefault(_empresasPage);
	
	var _empresasPage3 = __webpack_require__(466);
	
	var _empresasPage4 = _interopRequireDefault(_empresasPage3);
	
	__webpack_require__(467);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var empresasPage = {
	    restrict: 'E',
	    bindings: {},
	    template: _empresasPage2.default,
	    controller: _empresasPage4.default,
	    controllerAs: 'vm'
	};
	
	exports.default = empresasPage;

/***/ },
/* 465 */
/***/ function(module, exports) {

	module.exports = "<nx-table options=\"vm.options\"></nx-table>";

/***/ },
/* 466 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _classCallCheck2 = __webpack_require__(365);
	
	var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var EmpresasController = function EmpresasController() {
	    "ngInject";
	
	    (0, _classCallCheck3.default)(this, EmpresasController);
	    var vm = this;
	
	    vm.options = {
	        resource: 'team',
	        locale: {
	            page: 'EMPRESAS'
	        },
	        columns: [{
	            name: 'Logo',
	            orderBy: false,
	            isImage: true,
	            value: 'logo'
	        }, {
	            name: 'Nombre',
	            orderBy: 'name'
	        }, {
	            name: 'Asignaciones',
	            value: 'services_count'
	        }, {
	            name: 'Usuarios',
	            value: 'users_count'
	        }, {
	            name: 'Creada',
	            orderBy: 'created_at',
	            value: 'created_at.date',
	            filter: 'amTimeAgo'
	        }, {
	            name: 'Modificada',
	            orderBy: 'updated_at',
	            value: 'updated_at.date',
	            filter: 'amTimeAgo'
	        }],
	        buttons: [{
	            icon: 'link-variant',
	            href: 'url',
	            target: 'blank',
	            label: 'Ver empresa'
	        }],
	        actions: {
	            create: 'empresas.crear',
	            edit: 'empresas.editar'
	        }
	    };
	};
	
	exports.default = EmpresasController;

/***/ },
/* 467 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 468 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _angularUiRouter = __webpack_require__(400);
	
	var _angularUiRouter2 = _interopRequireDefault(_angularUiRouter);
	
	var _crear = __webpack_require__(469);
	
	var _crear2 = _interopRequireDefault(_crear);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('empresas.crear.page', [_angularUiRouter2.default]).config(["$stateProvider", function ($stateProvider) {
	    "ngInject";
	
	    $stateProvider.state({
	        name: 'empresas.crear',
	        url: '/crear',
	        views: {
	            "@": {
	                component: 'empresasCrearPage'
	            }
	        },
	        ncyBreadcrumb: {
	            label: 'Crear'
	        },
	        resolve: {
	            modules: /*@ngInject*/["Store", function modules(Store) {
	                return Store.findAll('module');
	            }],
	            roles: /*@ngInject*/["Store", function roles(Store) {
	                return Store.findAll('role');
	            }]
	        }
	    });
	}]).component('empresasCrearPage', _crear2.default);

/***/ },
/* 469 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _crearPage = __webpack_require__(470);
	
	var _crearPage2 = _interopRequireDefault(_crearPage);
	
	var _crearPage3 = __webpack_require__(471);
	
	var _crearPage4 = _interopRequireDefault(_crearPage3);
	
	__webpack_require__(472);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var crearPage = {
	    restrict: 'E',
	    bindings: {},
	    template: _crearPage2.default,
	    controller: _crearPage4.default,
	    controllerAs: 'vm'
	};
	
	exports.default = crearPage;

/***/ },
/* 470 */
/***/ function(module, exports) {

	module.exports = "<form name=\"vm.form\" autocomplete=\"off\" ng-submit=\"vm.onSubmit()\" novalidate autocomplete=\"off\">\n\n    <md-toolbar class=\"md-toolbar-grey\">\n        <div class=\"md-toolbar-tools\">\n            <span flex></span>\n\n            <md-button md-theme=\"nexo\" type=\"submit\" class=\"md-raised md-primary\">Guardar</md-button>\n            <md-button ui-sref=\"empresas\" class=\"md-raised nd-default\">Cancelar</md-button>\n        </div>\n    </md-toolbar>\n\n\n    <md-content layout=\"row\" layout-margin layout-wrap layout-fill>\n        <div flex layout=\"column\">\n            <md-whiteframe class=\"md-nx-panel md-whiteframe-1dp\" flex>\n                <md-toolbar>\n                    <div class=\"md-toolbar-tools\">\n                        <h5>Información básica</h5>\n                    </div>\n                </md-toolbar>\n                <md-content layout=\"column\" layout-padding>\n                    <formly-form model=\"vm.model\" fields=\"vm.fields.basic\" form=\"vm.form\"></formly-form>\n                </md-content>\n            </md-whiteframe>\n        </div>\n\n        <div flex layout=\"column\">\n            <md-whiteframe class=\"md-nx-panel md-whiteframe-1dp\" flex>\n                <md-toolbar>\n                    <div class=\"md-toolbar-tools\">\n                        <h5>Configuración</h5>\n                    </div>\n                </md-toolbar>\n                <md-content layout=\"column\" layout-padding>\n                    <formly-form model=\"vm.model\" fields=\"vm.fields.configuration\" form=\"vm.form\"></formly-form>\n                </md-content>\n            </md-whiteframe>\n        </div>\n    </md-content>\n</form>";

/***/ },
/* 471 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _classCallCheck2 = __webpack_require__(365);
	
	var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
	
	var _createClass2 = __webpack_require__(422);
	
	var _createClass3 = _interopRequireDefault(_createClass2);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var Controller = function () {
	    Controller.$inject = ["Store", "TeamForm"];
	    function Controller(Store, TeamForm) {
	        "ngInject";
	
	        (0, _classCallCheck3.default)(this, Controller);
	        var vm = this;
	
	        vm.Store = Store;
	        vm.fields = TeamForm;
	        vm.model = {};
	    }
	
	    (0, _createClass3.default)(Controller, [{
	        key: 'onSubmit',
	        value: function onSubmit() {
	            var vm = this;
	
	            vm.Store.submit({
	                form: vm.form,
	                resource: 'team',
	                data: vm.model,
	                redirectTo: 'empresas'
	            });
	        }
	    }]);
	    return Controller;
	}();
	
	exports.default = Controller;

/***/ },
/* 472 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 473 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _angularUiRouter = __webpack_require__(400);
	
	var _angularUiRouter2 = _interopRequireDefault(_angularUiRouter);
	
	var _editar = __webpack_require__(474);
	
	var _editar2 = _interopRequireDefault(_editar);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('empresas.editar.page', [_angularUiRouter2.default]).config(["$stateProvider", function ($stateProvider) {
	    "ngInject";
	
	    var itemParams = {
	        params: {
	            include: 'modules'
	        }
	    };
	
	    $stateProvider.state({
	        name: 'empresas.editar',
	        url: '/:id/editar',
	        views: {
	            "@": {
	                component: 'empresasEditarPage'
	            }
	        },
	        ncyBreadcrumb: {
	            label: 'Editar {{name}}'
	        },
	        resolve: {
	            modules: /*@ngInject*/["Store", function modules(Store) {
	                return Store.findAll('module');
	            }],
	            item: /*@ngInject*/["Store", "$stateParams", function item(Store, $stateParams) {
	                return Store.find('team', $stateParams.id, itemParams).then(function (response) {
	                    return response;
	                });
	            }],
	            roles: /*@ngInject*/["Store", function roles(Store) {
	                return Store.findAll('role');
	            }]
	        }
	    });
	}]).component('empresasEditarPage', _editar2.default);

/***/ },
/* 474 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _editarPage = __webpack_require__(475);
	
	var _editarPage2 = _interopRequireDefault(_editarPage);
	
	var _editarPage3 = __webpack_require__(476);
	
	var _editarPage4 = _interopRequireDefault(_editarPage3);
	
	__webpack_require__(477);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var EditarPage = {
	    restrict: 'E',
	    bindings: {},
	    template: _editarPage2.default,
	    controller: _editarPage4.default,
	    controllerAs: 'vm'
	};
	
	exports.default = EditarPage;

/***/ },
/* 475 */
/***/ function(module, exports) {

	module.exports = "<form name=\"vm.form\" autocomplete=\"off\" ng-submit=\"vm.onSubmit()\" novalidate autocomplete=\"off\">\n\n    <md-toolbar class=\"md-toolbar-grey\">\n        <div class=\"md-toolbar-tools\">\n            <span flex></span>\n\n            <md-button md-theme=\"nexo\" type=\"submit\" class=\"md-raised md-primary\">Guardar</md-button>\n            <md-button ui-sref=\"empresas\" class=\"md-raised nd-default\">Cancelar</md-button>\n        </div>\n    </md-toolbar>\n\n\n    <md-content layout=\"row\" layout-margin layout-wrap layout-fill>\n        <div flex layout=\"column\">\n            <md-whiteframe class=\"md-nx-panel md-whiteframe-1dp\" flex>\n                <md-toolbar>\n                    <div class=\"md-toolbar-tools\">\n                        <h5>Información básica</h5>\n                    </div>\n                </md-toolbar>\n                <md-content layout=\"column\" layout-padding>\n                    <formly-form model=\"vm.model\" fields=\"vm.fields.basic\" form=\"vm.form\"></formly-form>\n                </md-content>\n            </md-whiteframe>\n        </div>\n\n        <div flex layout=\"column\">\n            <md-whiteframe class=\"md-nx-panel md-whiteframe-1dp\" flex>\n                <md-toolbar>\n                    <div class=\"md-toolbar-tools\">\n                        <h5>Configuración</h5>\n                    </div>\n                </md-toolbar>\n                <md-content layout=\"column\" layout-padding>\n                    <formly-form model=\"vm.model\" fields=\"vm.fields.configuration\" form=\"vm.form\"></formly-form>\n                </md-content>\n            </md-whiteframe>\n        </div>\n    </md-content>\n</form>";

/***/ },
/* 476 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _classCallCheck2 = __webpack_require__(365);
	
	var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
	
	var _createClass2 = __webpack_require__(422);
	
	var _createClass3 = _interopRequireDefault(_createClass2);
	
	var _lodash = __webpack_require__(263);
	
	var _lodash2 = _interopRequireDefault(_lodash);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var CrearController = function () {
	    CrearController.$inject = ["$stateParams", "Store", "TeamForm"];
	    function CrearController($stateParams, Store, TeamForm) {
	        "ngInject";
	
	        (0, _classCallCheck3.default)(this, CrearController);
	        var vm = this;
	
	        vm.Store = Store;
	        vm.fields = TeamForm;
	        vm.resourceName = 'team';
	
	        var item = Store.get(vm.resourceName, $stateParams.id),
	            itemPick = _lodash2.default.pick(item, ['id', 'name', 'limits', 'slug', 'logo', 'status', 'modules']);
	
	        if (itemPick.modules.data) {
	            itemPick.modules = _lodash2.default.map(itemPick.modules.data, 'id');
	        }
	
	        vm.model = itemPick;
	    }
	
	    (0, _createClass3.default)(CrearController, [{
	        key: 'onSubmit',
	        value: function onSubmit() {
	            var vm = this;
	
	            vm.Store.submit({
	                update: true,
	                form: vm.form,
	                resource: vm.resourceName,
	                data: vm.model,
	                redirectTo: 'empresas'
	            });
	        }
	    }]);
	    return CrearController;
	}();
	
	exports.default = CrearController;

/***/ },
/* 477 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 478 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _angularUiRouter = __webpack_require__(400);
	
	var _angularUiRouter2 = _interopRequireDefault(_angularUiRouter);
	
	var _asignaciones = __webpack_require__(479);
	
	var _asignaciones2 = _interopRequireDefault(_asignaciones);
	
	var _form = __webpack_require__(483);
	
	var _form2 = _interopRequireDefault(_form);
	
	var _crear = __webpack_require__(488);
	
	var _crear2 = _interopRequireDefault(_crear);
	
	var _ver = __webpack_require__(493);
	
	var _ver2 = _interopRequireDefault(_ver);
	
	var _editar = __webpack_require__(498);
	
	var _editar2 = _interopRequireDefault(_editar);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	// common components
	
	
	var asignacionesPageModule = _angular2.default.module('asignaciones.component', [_angularUiRouter2.default, _form2.default.name, _crear2.default.name, _ver2.default.name, _editar2.default.name]).config(["$stateProvider", function ($stateProvider) {
	    "ngInject";
	
	    $stateProvider.state({
	        name: 'asignaciones',
	        url: '/asignaciones',
	        component: 'asignacionesPage',
	        ncyBreadcrumb: {
	            parent: 'dashboard',
	            label: 'PAGES.ASIGNACIONES.TITLE'
	        }
	    });
	}]).component('asignacionesPage', _asignaciones2.default);
	
	// subpages
	
	
	exports.default = asignacionesPageModule;

/***/ },
/* 479 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _asignacionesPage = __webpack_require__(480);
	
	var _asignacionesPage2 = _interopRequireDefault(_asignacionesPage);
	
	var _asignacionesPage3 = __webpack_require__(481);
	
	var _asignacionesPage4 = _interopRequireDefault(_asignacionesPage3);
	
	__webpack_require__(482);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var asignacionesPage = {
	    restrict: 'E',
	    bindings: {},
	    template: _asignacionesPage2.default,
	    controller: _asignacionesPage4.default,
	    controllerAs: 'vm'
	};
	
	exports.default = asignacionesPage;

/***/ },
/* 480 */
/***/ function(module, exports) {

	module.exports = "<nx-table options=\"vm.options\"></nx-table>";

/***/ },
/* 481 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _classCallCheck2 = __webpack_require__(365);
	
	var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var AsignacionesController = function AsignacionesController() {
	    "ngInject";
	
	    (0, _classCallCheck3.default)(this, AsignacionesController);
	    var vm = this;
	
	    vm.options = {
	        resource: 'assignment',
	        locale: {
	            page: 'ASIGNACIONES'
	        },
	        defaultOrder: '-code',
	        columns: [{
	            name: 'CODIGO',
	            orderBy: 'services.code',
	            value: 'code'
	        }, {
	            name: 'ESTADO',
	            orderBy: 'services_statuses:service_status_id|services_statuses.name',
	            value: 'status.name'
	        }, {
	            name: 'TIPO',
	            orderBy: 'date_type',
	            value: 'date_type_name'
	        }, {
	            name: 'TIPO_DE_ASIGNACION',
	            orderBy: 'assignment_type',
	            value: 'assignment_type_name'
	        }, {
	            name: 'FECHA_DE_INICIO',
	            orderBy: 'start_at',
	            value: 'start_at.date',
	            filter: 'amDateFormat:"L HH:mm A"'
	        }, {
	            name: 'MODIFICADO',
	            orderBy: 'updated_at',
	            value: 'updated_at.date',
	            filter: 'amTimeAgo'
	        }],
	        actions: {
	            show: 'asignaciones.ver',
	            create: 'asignaciones.crear',
	            edit: 'asignaciones.editar'
	        },
	        lang: {
	            single: 'ASIGNACION',
	            multiple: 'ASIGNACIONES',
	            noRecords: 'NO_HAY_NINGUNA_ASIGNACION_CREADA',
	            createFirst: 'CREAR_LA_PRIMERA'
	        }
	    };
	};
	
	exports.default = AsignacionesController;

/***/ },
/* 482 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 483 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _form = __webpack_require__(484);
	
	var _form2 = _interopRequireDefault(_form);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var _module = _angular2.default.module('asignaciones.components.form', []).component('assignmentsForm', _form2.default);
	
	exports.default = _module;

/***/ },
/* 484 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _formComponent = __webpack_require__(485);
	
	var _formComponent2 = _interopRequireDefault(_formComponent);
	
	var _form = __webpack_require__(486);
	
	var _form2 = _interopRequireDefault(_form);
	
	__webpack_require__(487);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var component = {
	    restrict: 'E',
	    template: _formComponent2.default,
	    controller: _form2.default,
	    controllerAs: 'vm',
	    bindings: {
	        model: '<',
	        createMode: '<'
	    }
	};
	
	exports.default = component;

/***/ },
/* 485 */
/***/ function(module, exports) {

	module.exports = "<form name=\"vm.form\" autocomplete=\"off\" novalidate ng-hide=\"vm.submitting\">\n    <wizard on-finish=\"vm.onSubmit()\" hide-indicators=\"true\">\n        <md-toolbar class=\"md-toolbar-grey\">\n            <div class=\"md-toolbar-tools\">\n                <h3>{{ vm.wizard.currentStepTitle() }}</h3>\n                <span flex></span>\n\n                <md-button ui-sref=\"asignaciones\" class=\"md-raised nd-default\">\n                    {{ 'GLOBAL.CANCELAR' | translate }}\n                </md-button>\n                <md-button class=\"md-raised nd-default\" ng-show=\"vm.wizard.currentStepNumber() > 1\" wz-previous>\n                    {{ 'GLOBAL.REGRESAR' | translate }}\n                </md-button>\n                <md-button md-theme=\"nexo\" class=\"md-raised md-primary\" ng-click=\"vm.nextStep()\" ng-if=\"vm.wizard.currentStepNumber() < vm.wizard.totalStepCount()\">\n                    {{ 'GLOBAL.SIGUIENTE' | translate }}\n                </md-button>\n                <md-button md-theme=\"nexo\" class=\"md-raised md-primary\" wz-finish ng-if=\"vm.wizard.currentStepNumber() == vm.wizard.totalStepCount()\">\n                    {{ 'GLOBAL.ENVIAR' | translate }}\n                </md-button>\n            </div>\n        </md-toolbar>\n\n        <md-content layout=\"row\" layout-margin layout-wrap layout-fill>\n            <wz-step wz-title=\"{{ 'FORMS.ASSIGN.PASOS.SELECCIONAR_CLIENTE' | translate }}\" flex>\n                <formly-form model=\"vm.model\" fields=\"vm.fields.step1\" form=\"vm.forms.step1\" options=\"vm.forms.options1\"></formly-form>\n            </wz-step>\n            <wz-step wz-title=\"{{ 'FORMS.ASSIGN.PASOS.SELECCIONAR_SERVICIOS' | translate }}\" canenter=\"vm.canEnterValidation(vm.forms.step1)\" flex>\n                <formly-form model=\"vm.model\" fields=\"vm.fields.step2\" form=\"vm.forms.step2\" options=\"vm.forms.options2\"></formly-form>\n            </wz-step>\n            <wz-step wz-title=\"{{ 'FORMS.ASSIGN.PASOS.SELECCIONAR_FECHA' | translate }}\" flex>\n                <formly-form model=\"vm.model\" fields=\"vm.fields.step3\" form=\"vm.forms.step3\" options=\"vm.forms.options3\"></formly-form>\n            </wz-step>\n\n            <!-- resumen -->\n            <wz-step wz-title=\"{{ 'FORMS.ASSIGN.PASOS.RESUMEN' | translate }}\" flex>\n                <div ng-if=\"vm.wizard.currentStepNumber() == vm.wizard.totalStepCount()\">\n                    <assignment-detail item=\"vm.model\" users=\"vm.model.users_data\" recurrence-dates=\"vm.model.recurrence_dates\" services=\"vm.model.services_data\" products=\"vm.model.products_data\" creation-mode=\"true\"></assignment-detail>\n                </div>\n            </wz-step>\n        </md-content>\n    </wizard>\n</form>\n\n\n<div layout=\"row\" layout-sm=\"column\" layout-align=\"space-around\" ng-show=\"vm.submitting\">\n    <md-progress-circular md-theme=\"nexo\" md-mode=\"indeterminate\" md-diameter=\"100px\"></md-progress-circular>\n</div>\n";

/***/ },
/* 486 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _classCallCheck2 = __webpack_require__(365);
	
	var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
	
	var _createClass2 = __webpack_require__(422);
	
	var _createClass3 = _interopRequireDefault(_createClass2);
	
	var _moment = __webpack_require__(156);
	
	var _moment2 = _interopRequireDefault(_moment);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var Controller = function () {
	    Controller.$inject = ["NEXO", "Store", "Dialogs", "AssignForm", "WizardHandler", "$timeout", "$log"];
	    function Controller(NEXO, Store, Dialogs, AssignForm, WizardHandler, $timeout, $log) {
	        "ngInject";
	
	        (0, _classCallCheck3.default)(this, Controller);
	        var vm = this;
	        var assignmentsOptions = NEXO.assignments_options;
	
	        vm.Dialogs = Dialogs;
	        vm.Store = Store;
	        vm.fields = AssignForm;
	        vm.$log = $log;
	
	        vm.model = angular.copy(vm.model);
	
	        if (!_.isEmpty(vm.model)) {
	            var services = _.get(vm.model, 'services.data', vm.model.services),
	                products = _.get(vm.model, 'products.data', vm.model.products),
	                users = _.get(vm.model, 'users.data', vm.model.users),
	                recurrence_dates = _.get(vm.model, 'recurrence_dates.data', vm.model.recurrence_dates);
	
	            vm.model.services = _.map(services, function (service) {
	                return service.id || service;
	            });
	            vm.model.products = angular.copy(products);
	            vm.model.users = _.map(angular.copy(users), function (user) {
	                return user.id || user;
	            });
	            vm.model.recurrence_dates = angular.copy(recurrence_dates);
	            vm.model.start_at = (0, _moment2.default)(angular.copy(vm.model.start_at).date).toDate();
	            vm.model.end_at = (0, _moment2.default)(angular.copy(vm.model.end_at).date).toDate();
	
	            if (!_.isEmpty(vm.model.recurrence_start)) {
	                vm.model.recurrence_start = (0, _moment2.default)(angular.copy(vm.model.recurrence_start).date).toDate();
	            }
	            if (!_.isEmpty(vm.model.recurrence_end)) {
	                vm.model.recurrence_end = (0, _moment2.default)(angular.copy(vm.model.recurrence_end).date).toDate();
	            }
	        }
	
	        $timeout(function () {
	            return vm.wizard = WizardHandler.wizard();
	        });
	    }
	
	    (0, _createClass3.default)(Controller, [{
	        key: 'onSubmit',
	        value: function onSubmit() {
	            var vm = this,
	                model = angular.copy(vm.model);
	
	            // Before
	            model = _.omit(model, ['addresses', 'customer', 'customer_address', 'users_data', 'products_data', 'services_data', 'created_at', 'updated_at', 'city', 'status', 'items']);
	
	            vm.submitting = true;
	
	            vm.Store.submit({
	                form: vm.form,
	                resource: 'assignment',
	                data: model,
	                redirectTo: 'asignaciones',
	                update: !_.isEmpty(vm.model.id),
	                onSuccess: success,
	                onError: error
	            });
	
	            function success(response) {
	                vm.$log.debug('SUCCESS ON SUBMIT ==> ', response);
	                vm.submitting = false;
	                vm.resetForms();
	            }
	
	            function error(response) {
	                vm.$log.error('ERROR ON SUBMIT ==> ', response);
	                vm.submitting = false;
	            }
	        }
	    }, {
	        key: 'nextStep',
	        value: function nextStep() {
	            var vm = this,
	                wizard = vm.wizard,
	                stepNumber = wizard.currentStepNumber(),
	                stepName = 'step' + stepNumber,
	                form = vm.forms[stepName];
	
	            form.$setSubmitted();
	
	            if (form.$valid) {
	                vm.wizard.next();
	            } else {
	                vm.$log.error('VALIDATION ERROR => ', vm.form.$error);
	
	                vm.Dialogs.showAlert({
	                    title: 'No se pudo continuar',
	                    content: 'Verifique que toda la información esté completa y se haya digitado de forma correcta.'
	                });
	            }
	        }
	    }, {
	        key: 'resetForms',
	        value: function resetForms() {
	            var vm = this;
	
	            _.forEach(vm.forms, function (form) {
	                if (_.has(form, 'resetModel')) {
	                    form.resetModel();
	                }
	            });
	
	            delete vm.model;
	
	            vm.$log.debug('--- MODEL RESET ---');
	        }
	    }]);
	    return Controller;
	}();
	
	exports.default = Controller;

/***/ },
/* 487 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 488 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _angularUiRouter = __webpack_require__(400);
	
	var _angularUiRouter2 = _interopRequireDefault(_angularUiRouter);
	
	var _crear = __webpack_require__(489);
	
	var _crear2 = _interopRequireDefault(_crear);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('asignaciones.crear.page', [_angularUiRouter2.default]).config(["$stateProvider", function ($stateProvider) {
	    "ngInject";
	
	    $stateProvider.state({
	        name: 'asignaciones.crear',
	        url: '/crear',
	        views: {
	            "@": {
	                component: 'asignacionesCrearPage'
	            }
	        },
	        resolve: {
	            productCategories: /*@ngInject*/["Store", function productCategories(Store) {
	                return Store.findAll('productCategory');
	            }],
	            serviceType: /*@ngInject*/["Store", function serviceType(Store) {
	                return Store.findAll('serviceType');
	            }],
	            statuses: /*@ngInject*/["Store", function statuses(Store) {
	                return Store.findAll('serviceStatus');
	            }]
	        },
	        ncyBreadcrumb: {
	            label: 'Crear asignación'
	        }
	    });
	}]).component('asignacionesCrearPage', _crear2.default);

/***/ },
/* 489 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _crearPage = __webpack_require__(490);
	
	var _crearPage2 = _interopRequireDefault(_crearPage);
	
	var _crearPage3 = __webpack_require__(491);
	
	var _crearPage4 = _interopRequireDefault(_crearPage3);
	
	__webpack_require__(492);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var crearPage = {
	    restrict: 'E',
	    bindings: {},
	    template: _crearPage2.default,
	    controller: _crearPage4.default,
	    controllerAs: 'vm'
	};
	
	exports.default = crearPage;

/***/ },
/* 490 */
/***/ function(module, exports) {

	module.exports = "<assignments-form model=\"{}\"></assignments-form>\n";

/***/ },
/* 491 */
/***/ function(module, exports, __webpack_require__) {

	"use strict";
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _classCallCheck2 = __webpack_require__(365);
	
	var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var CrearController = function CrearController() {
	    (0, _classCallCheck3.default)(this, CrearController);
	
	    var vm = this;
	};
	
	exports.default = CrearController;

/***/ },
/* 492 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 493 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _angularUiRouter = __webpack_require__(400);
	
	var _angularUiRouter2 = _interopRequireDefault(_angularUiRouter);
	
	var _ver = __webpack_require__(494);
	
	var _ver2 = _interopRequireDefault(_ver);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var itemParams = {
	    params: {
	        include: 'users,services,products,recurrence_dates',
	        t: _.now()
	    }
	};
	
	exports.default = _angular2.default.module('asignaciones.ver.page', [_angularUiRouter2.default]).config(["$stateProvider", function ($stateProvider) {
	    "ngInject";
	
	    $stateProvider.state({
	        name: 'asignaciones.ver',
	        url: '/:id',
	        views: {
	            "@": {
	                component: 'asignacionesVerPage'
	            }
	        },
	        resolve: {
	            item: /*@ngInject*/["Store", "$stateParams", function item(Store, $stateParams) {
	                return Store.find('assignment', $stateParams.id, itemParams).then(function (response) {
	                    return response;
	                });
	            }]
	        },
	        ncyBreadcrumb: {
	            label: '{{ $resolve.item.name }}'
	        }
	    });
	}]).component('asignacionesVerPage', _ver2.default);

/***/ },
/* 494 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _verPage = __webpack_require__(495);
	
	var _verPage2 = _interopRequireDefault(_verPage);
	
	var _verPage3 = __webpack_require__(496);
	
	var _verPage4 = _interopRequireDefault(_verPage3);
	
	__webpack_require__(497);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var page = {
	    restrict: 'E',
	    bindings: {
	        item: '<'
	    },
	    template: _verPage2.default,
	    controller: _verPage4.default,
	    controllerAs: 'vm'
	};
	
	exports.default = page;

/***/ },
/* 495 */
/***/ function(module, exports) {

	module.exports = "<md-toolbar class=\"md-toolbar-grey\">\n    <div class=\"md-toolbar-tools\">\n        <h3>\n            <span>Asignación #{{ vm.item.code }} - {{ vm.item.status.name }}</span>\n        </h3>\n        <span flex></span>\n\n        <!-- <md-button md-theme=\"nexo\" type=\"submit\" class=\"md-raised md-primary\">Guardar</md-button> -->\n        <md-button ui-sref=\"asignaciones.editar({id:vm.item.id})\" class=\"md-raised nd-default\" translate=\"TABLE.EDITAR\"></md-button>\n    </div>\n</md-toolbar>\n\n<assignment-detail item=\"vm.item\" users=\"vm.item.users.data\" services=\"vm.item.services.data\" products=\"vm.item.products.data\" recurrence-dates=\"vm.item.recurrence_dates.data\"></assignment-detail>\n";

/***/ },
/* 496 */
/***/ function(module, exports, __webpack_require__) {

	"use strict";
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _classCallCheck2 = __webpack_require__(365);
	
	var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var Controller = function Controller(Store, $stateParams) {
	    "ngInject";
	
	    (0, _classCallCheck3.default)(this, Controller);
	    var vm = this;
	
	    vm.item = Store.get('assignment', $stateParams.id);
	};
	Controller.$inject = ["Store", "$stateParams"];
	
	exports.default = Controller;

/***/ },
/* 497 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 498 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _angularUiRouter = __webpack_require__(400);
	
	var _angularUiRouter2 = _interopRequireDefault(_angularUiRouter);
	
	var _editar = __webpack_require__(499);
	
	var _editar2 = _interopRequireDefault(_editar);
	
	var _store = __webpack_require__(352);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('asignaciones.editar.page', [_angularUiRouter2.default]).config(["$stateProvider", function ($stateProvider) {
	    "ngInject";
	
	    $stateProvider.state({
	        name: 'asignaciones.editar',
	        url: '/:id/editar',
	        views: {
	            "@": {
	                component: 'asignacionesEditarPage'
	            }
	        },
	        ncyBreadcrumb: {
	            label: 'Editar {{$resolve.item.name}}'
	        },
	        resolve: {
	            item: /*@ngInject*/["$stateParams", function item($stateParams) {
	                return _store.store.find('assignment', $stateParams.id, {
	                    params: {
	                        include: 'services,products.product,recurrence_dates,users'
	                    }
	                }).then(function (response) {
	                    return response;
	                });
	            }],
	            productCategories: /*@ngInject*/["Store", function productCategories(Store) {
	                return Store.findAll('productCategory', {
	                    t: _.now()
	                });
	            }],
	            serviceType: /*@ngInject*/["Store", function serviceType(Store) {
	                return Store.findAll('serviceType', {
	                    t: _.now()
	                });
	            }],
	            statuses: /*@ngInject*/["Store", function statuses(Store) {
	                return Store.findAll('serviceStatus');
	            }]
	        }
	    });
	}]).component('asignacionesEditarPage', _editar2.default);

/***/ },
/* 499 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _editarPage = __webpack_require__(500);
	
	var _editarPage2 = _interopRequireDefault(_editarPage);
	
	var _editarPage3 = __webpack_require__(501);
	
	var _editarPage4 = _interopRequireDefault(_editarPage3);
	
	__webpack_require__(502);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var EditarPage = {
	    restrict: 'E',
	    bindings: {
	        item: '<'
	    },
	    template: _editarPage2.default,
	    controller: _editarPage4.default,
	    controllerAs: 'vm'
	};
	
	exports.default = EditarPage;

/***/ },
/* 500 */
/***/ function(module, exports) {

	module.exports = "<assignments-form model=\"vm.model\"></assignments-form>\n";

/***/ },
/* 501 */
/***/ function(module, exports, __webpack_require__) {

	"use strict";
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _classCallCheck2 = __webpack_require__(365);
	
	var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var Controller = function Controller($stateParams, Store) {
	    "ngInject";
	
	    (0, _classCallCheck3.default)(this, Controller);
	    var vm = this;
	
	    vm.model = Store.get('assignment', $stateParams.id);
	};
	Controller.$inject = ["$stateParams", "Store"];
	
	exports.default = Controller;

/***/ },
/* 502 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 503 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _angularUiRouter = __webpack_require__(400);
	
	var _angularUiRouter2 = _interopRequireDefault(_angularUiRouter);
	
	var _clientes = __webpack_require__(504);
	
	var _clientes2 = _interopRequireDefault(_clientes);
	
	var _index = __webpack_require__(508);
	
	var _index2 = _interopRequireDefault(_index);
	
	var _index3 = __webpack_require__(513);
	
	var _index4 = _interopRequireDefault(_index3);
	
	var _index5 = __webpack_require__(518);
	
	var _index6 = _interopRequireDefault(_index5);
	
	var _index7 = __webpack_require__(523);
	
	var _index8 = _interopRequireDefault(_index7);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('clientes.page', [_angularUiRouter2.default, _index2.default.name, _index8.default.name, _index4.default.name, _index6.default.name]).config(["$stateProvider", function ($stateProvider) {
	    "ngInject";
	
	    $stateProvider.state({
	        name: 'clientes',
	        url: '/clientes',
	        component: 'clientesPage',
	        ncyBreadcrumb: {
	            parent: 'dashboard',
	            label: 'PAGES.CLIENTES.TITLE'
	        }
	    });
	}]).component('clientesPage', _clientes2.default);

/***/ },
/* 504 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _clientesPage = __webpack_require__(505);
	
	var _clientesPage2 = _interopRequireDefault(_clientesPage);
	
	var _clientesPage3 = __webpack_require__(506);
	
	var _clientesPage4 = _interopRequireDefault(_clientesPage3);
	
	__webpack_require__(507);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var clientesPage = {
	    restrict: 'E',
	    bindings: {},
	    template: _clientesPage2.default,
	    controller: _clientesPage4.default,
	    controllerAs: 'vm'
	};
	
	exports.default = clientesPage;

/***/ },
/* 505 */
/***/ function(module, exports) {

	module.exports = "<nx-table options=\"vm.options\"></nx-table>";

/***/ },
/* 506 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _classCallCheck2 = __webpack_require__(365);
	
	var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var ClientesController = function ClientesController() {
	    "ngInject";
	
	    (0, _classCallCheck3.default)(this, ClientesController);
	    var vm = this;
	
	    vm.options = {
	        resource: 'customer',
	        locale: {
	            page: 'CLIENTES'
	        },
	        columns: [{
	            name: 'NOMBRES',
	            orderBy: 'first_name'
	        }, {
	            name: 'APELLIDOS',
	            orderBy: 'last_name'
	        }, {
	            name: 'EMAIL',
	            orderBy: 'email'
	        }, {
	            name: 'DOCUMENTO',
	            orderBy: 'document'
	        }, {
	            name: 'Creado',
	            orderBy: 'created_at',
	            value: 'created_at.date',
	            filter: 'amTimeAgo'
	        }, {
	            name: 'Modificado',
	            orderBy: 'updated_at',
	            value: 'updated_at.date',
	            filter: 'amTimeAgo'
	        }],
	        actions: {
	            import: 'clientes.importar',
	            create: 'clientes.crear',
	            edit: 'clientes.editar',
	            show: 'clientes.ver'
	        },
	        lang: {
	            single: 'CLIENTE',
	            multiple: 'CLIENTES',
	            noRecords: 'NO_HAY_NINGUN_CLIENTE_CREADO',
	            createFirst: 'CREAR_EL_PRIMERO',
	            orImport: 'OR_IMPORT'
	        }
	    };
	};
	
	exports.default = ClientesController;

/***/ },
/* 507 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 508 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _angularUiRouter = __webpack_require__(400);
	
	var _angularUiRouter2 = _interopRequireDefault(_angularUiRouter);
	
	var _crear = __webpack_require__(509);
	
	var _crear2 = _interopRequireDefault(_crear);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('clientes.crear.page', [_angularUiRouter2.default]).config(["$stateProvider", function ($stateProvider) {
	    "ngInject";
	
	    $stateProvider.state({
	        name: 'clientes.crear',
	        url: '/crear',
	        views: {
	            "@": {
	                component: 'clientesCrearPage'
	            }
	        },
	        ncyBreadcrumb: {
	            label: 'Crear'
	        }
	    });
	}]).component('clientesCrearPage', _crear2.default);

/***/ },
/* 509 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _crearPage = __webpack_require__(510);
	
	var _crearPage2 = _interopRequireDefault(_crearPage);
	
	var _crearPage3 = __webpack_require__(511);
	
	var _crearPage4 = _interopRequireDefault(_crearPage3);
	
	__webpack_require__(512);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var crearPage = {
	    restrict: 'E',
	    bindings: {},
	    template: _crearPage2.default,
	    controller: _crearPage4.default,
	    controllerAs: 'vm'
	};
	
	exports.default = crearPage;

/***/ },
/* 510 */
/***/ function(module, exports) {

	module.exports = "<form name=\"vm.form\" autocomplete=\"off\" ng-submit=\"vm.onSubmit()\" novalidate autocomplete=\"off\">\n\n    <md-toolbar class=\"md-toolbar-grey\">\n        <div class=\"md-toolbar-tools\">\n            <span flex></span>\n\n            <md-button ui-sref=\"clientes\" class=\"md-raised nd-default\">Cancelar</md-button>\n            <md-button md-theme=\"nexo\" type=\"submit\" class=\"md-raised md-primary\">Guardar</md-button>\n        </div>\n    </md-toolbar>\n\n\n    <md-content layout=\"row\" layout-margin layout-wrap>\n        <div flex layout=\"column\">\n            <div class=\"md-nx-panel\" md-whiteframe=\"1\">\n                <md-toolbar>\n                    <div class=\"md-toolbar-tools\">\n                        <h5>Información general</h5>\n                    </div>\n                </md-toolbar>\n                <md-content layout=\"column\" layout-padding>\n                    <formly-form model=\"vm.model\" fields=\"vm.fields.basic\" form=\"vm.form\"></formly-form>\n                </md-content>\n            </div>\n        </div>\n\n\n        <div flex layout=\"column\">\n            <div class=\"md-nx-panel mb\" md-whiteframe=\"1\">\n                <md-toolbar>\n                    <div class=\"md-toolbar-tools\">\n                        <h5>Direcciones</h5>\n                    </div>\n                </md-toolbar>\n                <md-content layout=\"column\" layout-padding>\n                    <formly-form model=\"vm.model\" fields=\"vm.fields.addresses\" form=\"vm.form\"></formly-form>\n                </md-content>\n            </div>\n            <div class=\"md-nx-panel\" md-whiteframe=\"1\">\n                <md-toolbar>\n                    <div class=\"md-toolbar-tools\">\n                        <h5>Teléfonos</h5>\n                    </div>\n                </md-toolbar>\n                <md-content layout=\"column\" layout-padding>\n                    <formly-form model=\"vm.model\" fields=\"vm.fields.phones\" form=\"vm.form\"></formly-form>\n                </md-content>\n            </div>\n        </div>\n    </md-content>\n</form>";

/***/ },
/* 511 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _classCallCheck2 = __webpack_require__(365);
	
	var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
	
	var _createClass2 = __webpack_require__(422);
	
	var _createClass3 = _interopRequireDefault(_createClass2);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var CrearController = function () {
	    CrearController.$inject = ["Store", "CustomerForm"];
	    function CrearController(Store, CustomerForm) {
	        "ngInject";
	
	        (0, _classCallCheck3.default)(this, CrearController);
	        var vm = this;
	
	        vm.Store = Store;
	        vm.fields = CustomerForm;
	        vm.model = {};
	    }
	
	    (0, _createClass3.default)(CrearController, [{
	        key: 'onSubmit',
	        value: function onSubmit() {
	            var vm = this;
	
	            console.log(vm.model);
	            console.log(vm.form);
	
	            vm.Store.submit({
	                form: vm.form,
	                resource: 'customer',
	                data: vm.model,
	                redirectTo: 'clientes',
	                resourceOptions: {
	                    with: ['addresses', 'phones']
	                }
	            });
	        }
	    }]);
	    return CrearController;
	}();
	
	exports.default = CrearController;

/***/ },
/* 512 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 513 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _angularUiRouter = __webpack_require__(400);
	
	var _angularUiRouter2 = _interopRequireDefault(_angularUiRouter);
	
	var _editar = __webpack_require__(514);
	
	var _editar2 = _interopRequireDefault(_editar);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('clientes.editar.page', [_angularUiRouter2.default]).config(["$stateProvider", function ($stateProvider) {
	    "ngInject";
	
	    $stateProvider.state({
	        name: 'clientes.editar',
	        url: '/:id/editar',
	        views: {
	            "@": {
	                component: 'clientesEditarPage'
	            }
	        },
	        ncyBreadcrumb: {
	            label: 'Editar {{$resolve.item.name}}'
	        },
	        resolve: {
	            item: /*@ngInject*/["Store", "$stateParams", function item(Store, $stateParams) {
	                return Store.find('customer', $stateParams.id).then(function (response) {
	                    return response;
	                });
	            }]
	        }
	    });
	}]).component('clientesEditarPage', _editar2.default);

/***/ },
/* 514 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _editarPage = __webpack_require__(515);
	
	var _editarPage2 = _interopRequireDefault(_editarPage);
	
	var _editarPage3 = __webpack_require__(516);
	
	var _editarPage4 = _interopRequireDefault(_editarPage3);
	
	__webpack_require__(517);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var EditarPage = {
	    restrict: 'E',
	    bindings: {
	        customer: '<'
	    },
	    template: _editarPage2.default,
	    controller: _editarPage4.default,
	    controllerAs: 'vm'
	};
	
	exports.default = EditarPage;

/***/ },
/* 515 */
/***/ function(module, exports) {

	module.exports = "<form name=\"vm.form\" autocomplete=\"off\" ng-submit=\"vm.onSubmit()\" novalidate autocomplete=\"off\">\n\n    <md-toolbar class=\"md-toolbar-grey\">\n        <div class=\"md-toolbar-tools\">\n            <span flex></span>\n\n            <md-button ui-sref=\"clientes\" class=\"md-raised nd-default\">Cancelar</md-button>\n            <md-button md-theme=\"nexo\" type=\"submit\" class=\"md-raised md-primary\">Guardar</md-button>\n        </div>\n    </md-toolbar>\n\n\n    <md-content layout=\"row\" layout-margin>\n        <div flex layout=\"column\">\n            <div class=\"md-nx-panel\" md-whiteframe=\"1\">\n                <md-toolbar>\n                    <div class=\"md-toolbar-tools\">\n                        <h5>Información general</h5>\n                    </div>\n                </md-toolbar>\n                <md-content layout=\"column\" layout-padding>\n                    <formly-form model=\"vm.model\" fields=\"vm.fields.basic\" form=\"vm.form\"></formly-form>\n                </md-content>\n            </div>\n        </div>\n\n\n        <div flex layout=\"column\">\n            <div class=\"md-nx-panel mb\" md-whiteframe=\"1\">\n                <md-toolbar>\n                    <div class=\"md-toolbar-tools\">\n                        <h5>Direcciones</h5>\n                    </div>\n                </md-toolbar>\n                <md-content layout=\"column\" layout-padding>\n                    <formly-form model=\"vm.model\" fields=\"vm.fields.addresses\" form=\"vm.form\"></formly-form>\n                </md-content>\n            </div>\n\n            <div class=\"md-nx-panel\" md-whiteframe=\"1\">\n                <md-toolbar>\n                    <div class=\"md-toolbar-tools\">\n                        <h5>Teléfonos</h5>\n                    </div>\n                </md-toolbar>\n                <md-content layout=\"column\" layout-padding>\n                    <formly-form model=\"vm.model\" fields=\"vm.fields.phones\" form=\"vm.form\"></formly-form>\n                </md-content>\n            </div>\n        </div>\n    </md-content>\n</form>\n";

/***/ },
/* 516 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _classCallCheck2 = __webpack_require__(365);
	
	var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
	
	var _createClass2 = __webpack_require__(422);
	
	var _createClass3 = _interopRequireDefault(_createClass2);
	
	var _store = __webpack_require__(352);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var CrearController = function () {
	    CrearController.$inject = ["$stateParams", "Store", "CustomerForm"];
	    function CrearController($stateParams, Store, CustomerForm) {
	        "ngInject";
	
	        (0, _classCallCheck3.default)(this, CrearController);
	        var vm = this;
	
	        vm.Store = Store;
	        vm.fields = CustomerForm;
	        vm.resourceName = 'customer';
	
	        var item = Store.get(vm.resourceName, $stateParams.id),
	            itemPlain = item.toJSON();
	
	        if (!_.isEmpty(item.addresses.data)) {
	            itemPlain.addresses = item.addresses.data.map(function (address) {
	                return address;
	            });
	        }
	
	        if (!_.isEmpty(item.phones.data)) {
	            itemPlain.phones = item.phones.data.map(function (phone) {
	                return {
	                    id: phone.id,
	                    type: phone.type.slug,
	                    phone: phone.phone
	                };
	            });
	        }
	
	        console.log(itemPlain);
	
	        vm.model = itemPlain;
	    }
	
	    (0, _createClass3.default)(CrearController, [{
	        key: 'onSubmit',
	        value: function onSubmit() {
	            var vm = this;
	
	            console.log('MODEL', vm.model);
	
	            vm.Store.submit({
	                update: true,
	                form: vm.form,
	                resource: vm.resourceName,
	                data: vm.model,
	                redirectTo: 'clientes',
	                resourceOptions: {
	                    with: ['addresses', 'phones']
	                }
	            });
	        }
	    }]);
	    return CrearController;
	}();
	
	exports.default = CrearController;

/***/ },
/* 517 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 518 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _angularUiRouter = __webpack_require__(400);
	
	var _angularUiRouter2 = _interopRequireDefault(_angularUiRouter);
	
	var _ver = __webpack_require__(519);
	
	var _ver2 = _interopRequireDefault(_ver);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('clientes.ver.page', [_angularUiRouter2.default]).config(["$stateProvider", function ($stateProvider) {
	    "ngInject";
	
	    $stateProvider.state({
	        name: 'clientes.ver',
	        url: '/:id',
	        views: {
	            "@": {
	                component: 'clientesVerPage'
	            }
	        },
	        resolve: {
	            item: /*@ngInject*/["Store", "$stateParams", function item(Store, $stateParams) {
	                return Store.find('customer', $stateParams.id).then(function (response) {
	                    return response;
	                });
	            }]
	        },
	        ncyBreadcrumb: {
	            label: 'Ver respuesta'
	        }
	    });
	}]).component('clientesVerPage', _ver2.default);

/***/ },
/* 519 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _verPage = __webpack_require__(520);
	
	var _verPage2 = _interopRequireDefault(_verPage);
	
	var _verPage3 = __webpack_require__(521);
	
	var _verPage4 = _interopRequireDefault(_verPage3);
	
	__webpack_require__(522);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var page = {
	    restrict: 'E',
	    bindings: {
	        item: '<'
	    },
	    template: _verPage2.default,
	    controller: _verPage4.default,
	    controllerAs: 'vm'
	};
	
	exports.default = page;

/***/ },
/* 520 */
/***/ function(module, exports) {

	module.exports = "<md-toolbar class=\"md-toolbar-grey\">\n    <div class=\"md-toolbar-tools\">\n        <h3>\n            <span>Cliente #{{ vm.item.id }}</span>\n        </h3>\n        <span flex></span>\n\n        <!-- <md-button md-theme=\"nexo\" type=\"submit\" class=\"md-raised md-primary\">Guardar</md-button> -->\n        <!-- <md-button ui-sref=\"clientes\" class=\"md-raised nd-default\">Cancelar</md-button> -->\n    </div>\n</md-toolbar>\n\n<md-content layout=\"row\" layout-margin layout-fill>\n    <div flex-xs=\"100\" flex=\"50\" layout=\"column\">\n        <div class=\"md-nx-panel mb\" md-whiteframe=\"1\">\n            <md-toolbar>\n                <div class=\"md-toolbar-tools\">\n                    <h5>Cliente</h5>\n                </div>\n            </md-toolbar>\n\n            <ul class=\"nx-detail-list\">\n                <li>\n                    <strong>Nombre</strong>\n                    <span class=\"fl-r\">{{vm.item.name }}</span>\n                </li>\n                <li>\n                    <strong>Documento</strong>\n                    <span class=\"fl-r\">{{vm.item.document_formatted }}</span>\n                </li>\n                <li>\n                    <strong>Correo</strong>\n                    <span class=\"fl-r\">{{vm.item.email }}</span>\n                </li>\n            </ul>\n        </div>\n\n        <div class=\"md-nx-panel mb\" md-whiteframe=\"1\">\n            <md-toolbar>\n                <div class=\"md-toolbar-tools\">\n                    <h5>Direcciones</h5>\n                </div>\n            </md-toolbar>\n              <ul class=\"nx-detail-list\" ng-repeat=\"option in vm.item.addresses.data\">\n                <li>\n                    <strong>Dirección</strong>\n                    <span class=\"fl-r\">{{option.address}}</span>\n                </li>\n                <li>\n                    <strong>Observación</strong>\n                    <span class=\"fl-r\">{{option.observations}}</span>\n                </li>\n            </ul>\n        </div>\n\n        <div class=\"md-nx-panel mb\" md-whiteframe=\"1\">\n            <md-toolbar>\n                <div class=\"md-toolbar-tools\">\n                    <h5>Telefonos</h5>\n                </div>\n            </md-toolbar>\n            <ul class=\"nx-detail-list\" ng-repeat=\"option in vm.item.phones.data\">\n                <li>\n                    <strong>Tipo</strong>\n                    <span class=\"fl-r\">{{option.type.name}}</span>\n                </li>\n                <li>\n                    <strong>Telefono</strong>\n                    <span class=\"fl-r\">{{option.phone}}</span>\n                </li>\n            </ul>\n        </div>\n\n    </div>\n\n    <div flex-xs=\"100\" flex=\"50\" layout=\"column\">\n        <div class=\"md-nx-panel\" md-whiteframe=\"1\">\n            <md-toolbar>\n                <div class=\"md-toolbar-tools\">\n                    <h5>Asignaciones</h5>\n                </div>\n            </md-toolbar>\n            <md-content layout=\"column\" layout-padding>\n                <p ng-if=\"!vm.services.data.length\">No hay asignaciones asignadas a este cliente</p>\n                <md-list>\n                    <md-list-item ng-repeat=\"service in vm.services.data | orderBy: 'created_at':true\" ui-sref=\"asignaciones.ver({ id : service.id })\">\n                        <p>#{{ service.name }}</p>\n                        <span class=\"md-secondary md-caption\">{{ service.created_at.date | amTimeAgo }}</span>\n                    </md-list-item>\n                </md-list>\n            </md-content>\n        </div>\n    </div>\n\n\n</md-content>\n";

/***/ },
/* 521 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _classCallCheck2 = __webpack_require__(365);
	
	var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var Controller = function Controller(Store, $stateParams, $timeout) {
	    "ngInject";
	
	    (0, _classCallCheck3.default)(this, Controller);
	    var vm = this;
	
	    vm.item = Store.get('customer', $stateParams.id);
	    vm.services = [];
	    Store.mapper('customer').getServices($stateParams.id).then(function (response) {
	        return $timeout(function () {
	            vm.services = response.data;
	        });
	    });
	};
	Controller.$inject = ["Store", "$stateParams", "$timeout"];
	
	exports.default = Controller;

/***/ },
/* 522 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 523 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _angularUiRouter = __webpack_require__(400);
	
	var _angularUiRouter2 = _interopRequireDefault(_angularUiRouter);
	
	var _importar = __webpack_require__(524);
	
	var _importar2 = _interopRequireDefault(_importar);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('clientes.importar.page', [_angularUiRouter2.default]).config(["$stateProvider", function ($stateProvider) {
	    "ngInject";
	
	    $stateProvider.state({
	        name: 'clientes.importar',
	        url: '/importar',
	        views: {
	            "@": {
	                component: 'clientesImportarPage'
	            }
	        },
	        ncyBreadcrumb: {
	            label: 'Importar clientes'
	        }
	    });
	}]).component('clientesImportarPage', _importar2.default);

/***/ },
/* 524 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _importarPage = __webpack_require__(525);
	
	var _importarPage2 = _interopRequireDefault(_importarPage);
	
	var _importarPage3 = __webpack_require__(526);
	
	var _importarPage4 = _interopRequireDefault(_importarPage3);
	
	__webpack_require__(529);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var importarPage = {
	    restrict: 'E',
	    bindings: {},
	    template: _importarPage2.default,
	    controller: _importarPage4.default,
	    controllerAs: 'vm'
	};
	
	exports.default = importarPage;

/***/ },
/* 525 */
/***/ function(module, exports) {

	module.exports = "<nx-import resource=\"vm.resource\" redirect-to=\"vm.redirectTo\">\n\n    <nx-import-header class=\"md-toolbar-tools\">\n        <h4>\n            <span>Importación de clientes</span>\n        </h4>\n        <span flex></span>\n\n        <md-button ui-sref=\"clientes\" class=\"md-raised nd-default\">Cancelar</md-button>\n    </nx-import-header>\n\n    <nx-import-instructions>\n        <div class=\"md-body-1\" layout=\"row\" layout-sm=\"column\" layout-wrap layout-fill layout-padding layout-align=\"center center\" flex>\n            <div flex>\n                <p>Descargue el archivo guía para realizar la importación de manera correcta. Recomendamos no alterar el nombre o la posición de las columnas.</p>\n            </div>\n\n            <div flex>\n                <md-button ng-href=\"{{ vm.files.guide }}\" class=\"md-raised\" target=\"_blank\">\n                    <i class=\"fa fa-arrow-down\"></i>\n                    Descargar archivo guia\n                </md-button>\n            </div>\n        </div>\n\n        <md-divider></md-divider>\n\n        <div class=\"md-body-1\" layout=\"row\" layout-sm=\"column\" layout-wrap layout-fill layout-padding layout-align=\"center center\" flex>\n            <div flex>\n                <p>Para rellenar la columna <strong>\"Tipo de documento\"</strong> tiene que escribir el código que corresponda al tipo deseado.</p>\n\n                <p>En la tabla mostramos los tipos de documentos disponibles.</p>\n            </div>\n\n            <div flex>\n                <table class=\"md-api-table\">\n                    <thead>\n                    <tr>\n                        <th>Nombre</th>\n                        <th>Código</th>\n                    </tr>\n                    </thead>\n                    <tbody>\n                    <tr>\n                        <td>Cédula de ciudadanía</td>\n                        <td>CC</td>\n                    </tr>\n                    <tr>\n                        <td>NIT</td>\n                        <td>NIT</td>\n                    </tr>\n                    <tr>\n                        <td>Cédula de extranjería</td>\n                        <td>CE</td>\n                    </tr>\n\n                    </tbody>\n                </table>\n            </div>\n        </div>\n\n        <!--<md-divider></md-divider>\n\n        <div class=\"md-body-1\" layout=\"row\" layout-sm=\"column\" layout-wrap layout-fill layout-padding layout-align=\"center center\" flex>\n            <div flex>\n                <p>Para rellenar la columna <strong>\"Ciudad\"</strong> puede escribir el nombre exacto de la ciudad <i>(ej: Bogotá D.C.)</i> o su código. Es recomendable usar el código para\n                    evitar incoherencias al momento de importar.</p>\n            </div>\n\n            <div flex>\n                <md-button ng-href=\"{{ vm.files.municipios }}\" class=\"md-raised\" target=\"_blank\">\n                    Descargar listado de ciudades con código\n                </md-button>\n            </div>\n        </div>-->\n    </nx-import-instructions>\n</nx-import>";

/***/ },
/* 526 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _classCallCheck2 = __webpack_require__(365);
	
	var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
	
	var _guia = __webpack_require__(527);
	
	var _guia2 = _interopRequireDefault(_guia);
	
	var _guia3 = __webpack_require__(528);
	
	var _guia4 = _interopRequireDefault(_guia3);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var ImportarController = function ImportarController() {
	    "ngInject";
	
	    (0, _classCallCheck3.default)(this, ImportarController);
	    var vm = this;
	
	    vm.files = { guide: _guia2.default, municipios: _guia4.default };
	    vm.resource = 'customer';
	    vm.redirectTo = 'clientes';
	};
	
	exports.default = ImportarController;

/***/ },
/* 527 */
/***/ function(module, exports, __webpack_require__) {

	module.exports = __webpack_require__.p + "guia-para-importar-clientes-en-Nexo-0a55d24a9d685d23ea6c49b32ffbc66f.xlsx";

/***/ },
/* 528 */
/***/ function(module, exports, __webpack_require__) {

	module.exports = __webpack_require__.p + "municipios-para-importar-clientes-en-Nexo-0a55d24a9d685d23ea6c49b32ffbc66f.xlsx";

/***/ },
/* 529 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 530 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _angularUiRouter = __webpack_require__(400);
	
	var _angularUiRouter2 = _interopRequireDefault(_angularUiRouter);
	
	var _productos = __webpack_require__(531);
	
	var _productos2 = _interopRequireDefault(_productos);
	
	var _index = __webpack_require__(535);
	
	var _index2 = _interopRequireDefault(_index);
	
	var _index3 = __webpack_require__(555);
	
	var _index4 = _interopRequireDefault(_index3);
	
	var _index5 = __webpack_require__(560);
	
	var _index6 = _interopRequireDefault(_index5);
	
	var _index7 = __webpack_require__(565);
	
	var _index8 = _interopRequireDefault(_index7);
	
	var _ver = __webpack_require__(570);
	
	var _ver2 = _interopRequireDefault(_ver);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var productosPageModule = _angular2.default.module('productos.page', [_angularUiRouter2.default, _index2.default.name, _index4.default.name, _index6.default.name, _index8.default.name, _ver2.default.name]).config(["$stateProvider", function ($stateProvider) {
	    "ngInject";
	
	    $stateProvider.state({
	        name: 'productos',
	        url: '/productos',
	        component: 'productosPage',
	        ncyBreadcrumb: {
	            parent: 'dashboard',
	            label: 'PAGES.PRODUCTOS.TITLE'
	        }
	    });
	}]).component('productosPage', _productos2.default);
	
	exports.default = productosPageModule;

/***/ },
/* 531 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _productosPage = __webpack_require__(532);
	
	var _productosPage2 = _interopRequireDefault(_productosPage);
	
	var _productosPage3 = __webpack_require__(533);
	
	var _productosPage4 = _interopRequireDefault(_productosPage3);
	
	__webpack_require__(534);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var productosPage = {
	    restrict: 'E',
	    bindings: {},
	    template: _productosPage2.default,
	    controller: _productosPage4.default,
	    controllerAs: 'vm'
	};
	
	exports.default = productosPage;

/***/ },
/* 532 */
/***/ function(module, exports) {

	module.exports = "<nx-table options=\"vm.options\"></nx-table>";

/***/ },
/* 533 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _classCallCheck2 = __webpack_require__(365);
	
	var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var ProductosController = function ProductosController() {
	    "ngInject";
	
	    (0, _classCallCheck3.default)(this, ProductosController);
	    var vm = this;
	
	    vm.options = {
	        resource: 'product',
	        locale: {
	            page: 'PRODUCTOS'
	        },
	        columns: [{
	            name: 'NOMBRE',
	            orderBy: 'name'
	        }, {
	            name: 'CATEGORIA',
	            orderBy: 'category|category.name',
	            value: 'category.name'
	        }, {
	            name: 'CREADO',
	            orderBy: 'created_at',
	            value: 'created_at.date',
	            filter: 'amTimeAgo'
	        }, {
	            name: 'MODIFICADO',
	            orderBy: 'updated_at',
	            value: 'updated_at.date',
	            filter: 'amTimeAgo'
	        }],
	        actions: {
	            create: 'productos.crear',
	            edit: 'productos.editar',
	            show: 'productos.ver',
	            import: 'productos.importar',
	            header: [{
	                state: 'productos.categorias',
	                text: 'MENU.PRODUCTOS.CATEGORIAS'
	            }]
	        }
	    };
	};
	
	exports.default = ProductosController;

/***/ },
/* 534 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 535 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _angularUiRouter = __webpack_require__(400);
	
	var _angularUiRouter2 = _interopRequireDefault(_angularUiRouter);
	
	var _categorias = __webpack_require__(536);
	
	var _categorias2 = _interopRequireDefault(_categorias);
	
	var _index = __webpack_require__(540);
	
	var _index2 = _interopRequireDefault(_index);
	
	var _index3 = __webpack_require__(545);
	
	var _index4 = _interopRequireDefault(_index3);
	
	var _index5 = __webpack_require__(550);
	
	var _index6 = _interopRequireDefault(_index5);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('productos.categorias.page', [_angularUiRouter2.default, _index2.default.name, _index4.default.name, _index6.default.name]).config(["$stateProvider", function ($stateProvider) {
	    "ngInject";
	
	    $stateProvider.state({
	        name: 'productos.categorias',
	        url: '/categorias',
	        views: {
	            "@": {
	                component: 'productosCategoriasPage'
	            }
	        },
	        ncyBreadcrumb: {
	            parent: 'productos',
	            label: 'Categorías'
	        }
	    });
	}]).component('productosCategoriasPage', _categorias2.default);

/***/ },
/* 536 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _categoriasPage = __webpack_require__(537);
	
	var _categoriasPage2 = _interopRequireDefault(_categoriasPage);
	
	var _categoriasPage3 = __webpack_require__(538);
	
	var _categoriasPage4 = _interopRequireDefault(_categoriasPage3);
	
	__webpack_require__(539);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var categoriasPage = {
	    restrict: 'E',
	    bindings: {},
	    template: _categoriasPage2.default,
	    controller: _categoriasPage4.default,
	    controllerAs: 'vm'
	};
	
	exports.default = categoriasPage;

/***/ },
/* 537 */
/***/ function(module, exports) {

	module.exports = "<nx-table options=\"vm.options\" resource=\"productCategory\"></nx-table>";

/***/ },
/* 538 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _classCallCheck2 = __webpack_require__(365);
	
	var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var CategoriasController = function CategoriasController() {
	    "ngInject";
	
	    (0, _classCallCheck3.default)(this, CategoriasController);
	    var vm = this;
	
	    vm.options = {
	        resource: 'productCategory',
	        locale: {
	            page: 'CATEGORIAS'
	        },
	        columns: [{
	            name: 'ID',
	            value: 'id'
	        }, {
	            name: 'NOMBRE',
	            orderBy: 'name'
	        }, {
	            name: 'CREADO',
	            orderBy: 'created_at',
	            value: 'created_at.date',
	            filter: 'amTimeAgo'
	        }, {
	            name: 'MODIFICADO',
	            orderBy: 'updated_at',
	            value: 'updated_at.date',
	            filter: 'amTimeAgo'
	        }],
	        actions: {
	            create: 'productos.categorias.crear',
	            edit: 'productos.categorias.editar',
	            import: 'productos.categorias.importar'
	        }
	    };
	};
	
	exports.default = CategoriasController;

/***/ },
/* 539 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 540 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _angularUiRouter = __webpack_require__(400);
	
	var _angularUiRouter2 = _interopRequireDefault(_angularUiRouter);
	
	var _crear = __webpack_require__(541);
	
	var _crear2 = _interopRequireDefault(_crear);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('productos.categorias.crear.page', [_angularUiRouter2.default]).config(["$stateProvider", function ($stateProvider) {
	    "ngInject";
	
	    $stateProvider.state({
	        name: 'productos.categorias.crear',
	        url: '/crear',
	        views: {
	            "@": {
	                component: 'productosCategoriasCrearPage'
	            }
	        },
	        ncyBreadcrumb: {
	            label: 'Crear'
	        }
	    });
	}]).component('productosCategoriasCrearPage', _crear2.default);

/***/ },
/* 541 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _crearPage = __webpack_require__(542);
	
	var _crearPage2 = _interopRequireDefault(_crearPage);
	
	var _crearPage3 = __webpack_require__(543);
	
	var _crearPage4 = _interopRequireDefault(_crearPage3);
	
	__webpack_require__(544);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var crearPage = {
	    restrict: 'E',
	    bindings: {},
	    template: _crearPage2.default,
	    controller: _crearPage4.default,
	    controllerAs: 'vm'
	};
	
	exports.default = crearPage;

/***/ },
/* 542 */
/***/ function(module, exports) {

	module.exports = "<form name=\"vm.form\" autocomplete=\"off\" ng-submit=\"vm.onSubmit()\" novalidate autocomplete=\"off\">\n\n    <md-toolbar class=\"md-toolbar-grey\">\n        <div class=\"md-toolbar-tools\">\n            <span flex></span>\n\n            <md-button md-theme=\"nexo\" type=\"submit\" class=\"md-raised md-primary\">Guardar</md-button>\n            <md-button ui-sref=\"productos.categorias\" class=\"md-raised nd-default\">Cancelar</md-button>\n        </div>\n    </md-toolbar>\n\n\n    <md-content layout=\"row\" layout-padding>\n        <div flex=\"50\">\n            <h3 class=\"panel-title\">Información básica</h3>\n            <formly-form model=\"vm.model\" fields=\"vm.fields.basic\" form=\"vm.form\"></formly-form>\n        </div>\n    </md-content>\n</form>";

/***/ },
/* 543 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _classCallCheck2 = __webpack_require__(365);
	
	var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
	
	var _createClass2 = __webpack_require__(422);
	
	var _createClass3 = _interopRequireDefault(_createClass2);
	
	var _store = __webpack_require__(352);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var CrearController = function () {
	    CrearController.$inject = ["$state", "Store", "ProductCategoryForm"];
	    function CrearController($state, Store, ProductCategoryForm) {
	        "ngInject";
	
	        (0, _classCallCheck3.default)(this, CrearController);
	        var vm = this;
	
	        vm.$state = $state;
	        vm.Store = Store;
	        vm.fields = ProductCategoryForm;
	        vm.model = {};
	    }
	
	    (0, _createClass3.default)(CrearController, [{
	        key: 'onSubmit',
	        value: function onSubmit() {
	            var vm = this;
	
	            vm.Store.submit({
	                form: vm.form,
	                resource: 'productCategory',
	                data: vm.model,
	                redirectTo: 'productos.categorias'
	            });
	        }
	    }]);
	    return CrearController;
	}();
	
	exports.default = CrearController;

/***/ },
/* 544 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 545 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _angularUiRouter = __webpack_require__(400);
	
	var _angularUiRouter2 = _interopRequireDefault(_angularUiRouter);
	
	var _editar = __webpack_require__(546);
	
	var _editar2 = _interopRequireDefault(_editar);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('productos.categorias.editar.page', [_angularUiRouter2.default]).config(["$stateProvider", function ($stateProvider) {
	    "ngInject";
	
	    $stateProvider.state({
	        name: 'productos.categorias.editar',
	        url: '/editar/:id',
	        views: {
	            "@": {
	                component: 'productosCategoriasEditarPage'
	            }
	        },
	        ncyBreadcrumb: {
	            label: 'Editar {{$resolve.item.name}}'
	        },
	        resolve: {
	            item: /*@ngInject*/["Store", "$stateParams", function item(Store, $stateParams) {
	                console.log($stateParams.id);
	                return Store.find('productCategory', $stateParams.id).then(function (response) {
	                    return response;
	                });
	            }]
	        }
	    });
	}]).component('productosCategoriasEditarPage', _editar2.default);

/***/ },
/* 546 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _editarPage = __webpack_require__(547);
	
	var _editarPage2 = _interopRequireDefault(_editarPage);
	
	var _editarPage3 = __webpack_require__(548);
	
	var _editarPage4 = _interopRequireDefault(_editarPage3);
	
	__webpack_require__(549);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var EditarPage = {
	    restrict: 'E',
	    bindings: {},
	    template: _editarPage2.default,
	    controller: _editarPage4.default,
	    controllerAs: 'vm'
	};
	
	exports.default = EditarPage;

/***/ },
/* 547 */
/***/ function(module, exports) {

	module.exports = "<form name=\"vm.form\" autocomplete=\"off\" ng-submit=\"vm.onSubmit()\" novalidate autocomplete=\"off\">\n\n    <md-toolbar class=\"md-toolbar-grey\">\n        <div class=\"md-toolbar-tools\">\n            <span flex></span>\n\n            <md-button md-theme=\"nexo\" type=\"submit\" class=\"md-raised md-primary\">Guardar</md-button>\n            <md-button ui-sref=\"productos.categorias\" class=\"md-raised nd-default\">Cancelar</md-button>\n        </div>\n    </md-toolbar>\n\n\n    <md-content layout=\"row\" layout-padding>\n        <div flex=\"50\">\n            <h3 class=\"panel-title\">Información básica</h3>\n            <formly-form model=\"vm.model\" fields=\"vm.fields.basic\" form=\"vm.form\"></formly-form>\n        </div>\n    </md-content>\n</form>";

/***/ },
/* 548 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _classCallCheck2 = __webpack_require__(365);
	
	var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
	
	var _createClass2 = __webpack_require__(422);
	
	var _createClass3 = _interopRequireDefault(_createClass2);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var CrearController = function () {
	    CrearController.$inject = ["$scope", "$stateParams", "Store", "ProductCategoryForm"];
	    function CrearController($scope, $stateParams, Store, ProductCategoryForm) {
	        "ngInject";
	
	        (0, _classCallCheck3.default)(this, CrearController);
	        var vm = this;
	
	        vm.Store = Store;
	        vm.fields = ProductCategoryForm;
	        vm.resourceName = 'productCategory';
	        vm.model = Store.get(vm.resourceName, $stateParams.id);
	    }
	
	    (0, _createClass3.default)(CrearController, [{
	        key: 'onSubmit',
	        value: function onSubmit() {
	            var vm = this;
	
	            vm.Store.submit({
	                update: true,
	                form: vm.form,
	                resource: vm.resourceName,
	                data: vm.model,
	                redirectTo: 'productos.categorias'
	            });
	        }
	    }]);
	    return CrearController;
	}();
	
	exports.default = CrearController;

/***/ },
/* 549 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 550 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _angularUiRouter = __webpack_require__(400);
	
	var _angularUiRouter2 = _interopRequireDefault(_angularUiRouter);
	
	var _importar = __webpack_require__(551);
	
	var _importar2 = _interopRequireDefault(_importar);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('productos.categorias.importar.page', [_angularUiRouter2.default]).config(["$stateProvider", function ($stateProvider) {
	    "ngInject";
	
	    $stateProvider.state({
	        name: 'productos.categorias.importar',
	        url: '/importar',
	        views: {
	            "@": {
	                component: 'productosCategoriasImportarPage'
	            }
	        },
	        ncyBreadcrumb: {
	            label: 'Importar categorías de productos'
	        }
	    });
	}]).component('productosCategoriasImportarPage', _importar2.default);

/***/ },
/* 551 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _importarPage = __webpack_require__(552);
	
	var _importarPage2 = _interopRequireDefault(_importarPage);
	
	var _importarPage3 = __webpack_require__(553);
	
	var _importarPage4 = _interopRequireDefault(_importarPage3);
	
	__webpack_require__(554);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var importarPage = {
	    restrict: 'E',
	    bindings: {},
	    template: _importarPage2.default,
	    controller: _importarPage4.default,
	    controllerAs: 'vm'
	};
	
	exports.default = importarPage;

/***/ },
/* 552 */
/***/ function(module, exports) {

	module.exports = "<nx-import resource=\"vm.resource\" redirect-to=\"vm.redirectTo\">\n\n    <nx-import-header class=\"md-toolbar-tools\">\n        <h4>\n            <span>Importación de categorías de productos</span>\n        </h4>\n        <span flex></span>\n\n        <md-button ui-sref=\"productos.categorias\" class=\"md-raised nd-default\">Cancelar</md-button>\n    </nx-import-header>\n\n    <nx-import-instructions>\n        <div class=\"md-body-1\" layout=\"row\" layout-sm=\"column\" layout-wrap layout-fill layout-padding layout-align=\"center center\" flex>\n            <div flex>\n                <p>Descargue el archivo guía para realizar la importación de manera correcta. Recomendamos no alterar el nombre o la posición de las columnas.</p>\n            </div>\n\n            <div flex>\n                <md-button ng-href=\"{{ vm.files.guide }}\" class=\"md-raised\" target=\"_blank\">\n                    <i class=\"fa fa-arrow-down\"></i>\n                    Descargar archivo guia\n                </md-button>\n            </div>\n        </div>\n    </nx-import-instructions>\n</nx-import>\n";

/***/ },
/* 553 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _classCallCheck2 = __webpack_require__(365);
	
	var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var ImportarController = function ImportarController(NEXO) {
	    "ngInject";
	
	    (0, _classCallCheck3.default)(this, ImportarController);
	    var vm = this;
	
	    vm.files = {
	        guide: NEXO.export_guides_url + '/products-categories'
	    };
	    vm.resource = 'productCategory';
	    vm.redirectTo = 'productos.categorias';
	};
	ImportarController.$inject = ["NEXO"];
	
	exports.default = ImportarController;

/***/ },
/* 554 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 555 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _angularUiRouter = __webpack_require__(400);
	
	var _angularUiRouter2 = _interopRequireDefault(_angularUiRouter);
	
	var _crear = __webpack_require__(556);
	
	var _crear2 = _interopRequireDefault(_crear);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('productos.crear.page', [_angularUiRouter2.default]).config(["$stateProvider", function ($stateProvider) {
	    "ngInject";
	
	    $stateProvider.state({
	        name: 'productos.crear',
	        url: '/crear',
	        views: {
	            "@": {
	                component: 'productosCrearPage'
	            }
	        },
	        resolve: {
	            categories: /*@ngInject*/["Store", function categories(Store) {
	                return Store.findAll('productCategory').then(function (response) {
	                    return response.data;
	                });
	            }]
	        },
	        ncyBreadcrumb: {
	            label: 'Crear producto'
	        }
	    });
	}]).component('productosCrearPage', _crear2.default);

/***/ },
/* 556 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _crearPage = __webpack_require__(557);
	
	var _crearPage2 = _interopRequireDefault(_crearPage);
	
	var _crearPage3 = __webpack_require__(558);
	
	var _crearPage4 = _interopRequireDefault(_crearPage3);
	
	__webpack_require__(559);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var crearPage = {
	    restrict: 'E',
	    bindings: {},
	    template: _crearPage2.default,
	    controller: _crearPage4.default,
	    controllerAs: 'vm'
	};
	
	exports.default = crearPage;

/***/ },
/* 557 */
/***/ function(module, exports) {

	module.exports = "<form name=\"vm.form\" autocomplete=\"off\" ng-submit=\"vm.onSubmit()\" novalidate autocomplete=\"off\">\n\n    <md-toolbar class=\"md-toolbar-grey\">\n        <div class=\"md-toolbar-tools\">\n            <span flex></span>\n\n            <md-button md-theme=\"nexo\" type=\"submit\" class=\"md-raised md-primary\">{{ 'GLOBAL.GUARDAR' | translate }}</md-button>\n            <md-button ui-sref=\"productos\" class=\"md-raised nd-default\">{{ 'GLOBAL.CANCELAR' | translate }}</md-button>\n        </div>\n    </md-toolbar>\n\n\n    <md-content layout=\"row\" layout-margin layout-wrap layout-fill>\n        <div flex layout=\"column\">\n            <md-whiteframe class=\"md-nx-panel md-whiteframe-1dp\" flex>\n                <md-toolbar>\n                    <div class=\"md-toolbar-tools\">\n                        <h5 translate=\"FORMS.PRODUCT.INFORMACION_BASICA\"></h5>\n                    </div>\n                </md-toolbar>\n                <md-content layout=\"column\" layout-padding>\n                    <formly-form model=\"vm.model\" fields=\"vm.fields.basic\" form=\"vm.form\" options=\"vm.options\"></formly-form>\n                </md-content>\n            </md-whiteframe>\n        </div>\n\n        <div flex layout=\"column\">\n            <md-whiteframe class=\"md-nx-panel md-whiteframe-1dp\" flex>\n                <md-toolbar>\n                    <div class=\"md-toolbar-tools\">\n                        <h5 translate=\"FORMS.PRODUCT.CARACTERISTICAS\"></h5>\n                    </div>\n                </md-toolbar>\n                <md-content layout=\"column\" layout-padding>\n                    <formly-form model=\"vm.model\" fields=\"vm.fields.features\" form=\"vm.form\" options=\"vm.options\"></formly-form>\n                </md-content>\n            </md-whiteframe>\n        </div>\n    </md-content>\n</form>\n";

/***/ },
/* 558 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _classCallCheck2 = __webpack_require__(365);
	
	var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
	
	var _createClass2 = __webpack_require__(422);
	
	var _createClass3 = _interopRequireDefault(_createClass2);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var CrearController = function () {
	    CrearController.$inject = ["$translate", "Store", "ProductForm"];
	    function CrearController($translate, Store, ProductForm) {
	        "ngInject";
	
	        (0, _classCallCheck3.default)(this, CrearController);
	        var vm = this;
	
	        vm.Store = Store;
	        vm.fields = ProductForm;
	        vm.model = {};
	
	        vm.loading = true;
	    }
	
	    (0, _createClass3.default)(CrearController, [{
	        key: 'onSubmit',
	        value: function onSubmit() {
	            var vm = this;
	
	            vm.Store.submit({
	                form: vm.form,
	                resource: 'product',
	                data: vm.model,
	                redirectTo: 'productos'
	            });
	        }
	    }]);
	    return CrearController;
	}();
	
	exports.default = CrearController;

/***/ },
/* 559 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 560 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _angularUiRouter = __webpack_require__(400);
	
	var _angularUiRouter2 = _interopRequireDefault(_angularUiRouter);
	
	var _editar = __webpack_require__(561);
	
	var _editar2 = _interopRequireDefault(_editar);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('productos.editar.page', [_angularUiRouter2.default]).config(["$stateProvider", function ($stateProvider) {
	    "ngInject";
	
	    $stateProvider.state({
	        name: 'productos.editar',
	        url: '/:id/editar',
	        views: {
	            "@": {
	                component: 'productosEditarPage'
	            }
	        },
	        ncyBreadcrumb: {
	            label: 'Editar {{$resolve.item.name}}'
	        },
	        resolve: {
	            item: /*@ngInject*/["Store", "$stateParams", function item(Store, $stateParams) {
	                return Store.find('product', $stateParams.id).then(function (response) {
	                    return response;
	                });
	            }],
	            categories: /*@ngInject*/["Store", function categories(Store) {
	                return Store.findAll('productCategory').then(function (response) {
	                    return response.data;
	                });
	            }]
	        }
	    });
	}]).component('productosEditarPage', _editar2.default);

/***/ },
/* 561 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _editarPage = __webpack_require__(562);
	
	var _editarPage2 = _interopRequireDefault(_editarPage);
	
	var _editarPage3 = __webpack_require__(563);
	
	var _editarPage4 = _interopRequireDefault(_editarPage3);
	
	__webpack_require__(564);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var EditarPage = {
	    restrict: 'E',
	    bindings: {
	        item: '<'
	    },
	    template: _editarPage2.default,
	    controller: _editarPage4.default,
	    controllerAs: 'vm'
	};
	
	exports.default = EditarPage;

/***/ },
/* 562 */
/***/ function(module, exports) {

	module.exports = "<form name=\"vm.form\" autocomplete=\"off\" ng-submit=\"vm.onSubmit()\" novalidate autocomplete=\"off\">\n\n    <md-toolbar class=\"md-toolbar-grey\">\n        <div class=\"md-toolbar-tools\">\n            <span flex></span>\n\n            <md-button md-theme=\"nexo\" type=\"submit\" class=\"md-raised md-primary\">{{ 'GLOBAL.GUARDAR' | translate }}</md-button>\n            <md-button ui-sref=\"productos\" class=\"md-raised nd-default\">{{ 'GLOBAL.CANCELAR' | translate }}</md-button>\n        </div>\n    </md-toolbar>\n\n\n    <md-content layout=\"row\" layout-margin layout-wrap layout-fill>\n        <div flex layout=\"column\">\n            <md-whiteframe class=\"md-nx-panel md-whiteframe-1dp\" flex>\n                <md-toolbar>\n                    <div class=\"md-toolbar-tools\">\n                        <h5 translate=\"FORMS.PRODUCT.INFORMACION_BASICA\"></h5>\n                    </div>\n                </md-toolbar>\n                <md-content layout=\"column\" layout-padding>\n                    <formly-form model=\"vm.model\" fields=\"vm.fields.basic\" form=\"vm.form\" options=\"vm.options\"></formly-form>\n                </md-content>\n            </md-whiteframe>\n        </div>\n\n        <div flex layout=\"column\">\n            <md-whiteframe class=\"md-nx-panel md-whiteframe-1dp\" flex>\n                <md-toolbar>\n                    <div class=\"md-toolbar-tools\">\n                        <h5 translate=\"FORMS.PRODUCT.CARACTERISTICAS\"></h5>\n                    </div>\n                </md-toolbar>\n                <md-content layout=\"column\" layout-padding>\n                    <formly-form model=\"vm.model\" fields=\"vm.fields.features\" form=\"vm.form\" options=\"vm.options\"></formly-form>\n                </md-content>\n            </md-whiteframe>\n        </div>\n    </md-content>\n</form>\n";

/***/ },
/* 563 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _classCallCheck2 = __webpack_require__(365);
	
	var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
	
	var _createClass2 = __webpack_require__(422);
	
	var _createClass3 = _interopRequireDefault(_createClass2);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var CrearController = function () {
	    CrearController.$inject = ["Store", "ProductForm"];
	    function CrearController(Store, ProductForm) {
	        "ngInject";
	
	        (0, _classCallCheck3.default)(this, CrearController);
	        var vm = this;
	
	        vm.Store = Store;
	        vm.fields = ProductForm;
	        vm.resourceName = 'product';
	        vm.model = angular.copy(vm.item);
	    }
	
	    (0, _createClass3.default)(CrearController, [{
	        key: 'onSubmit',
	        value: function onSubmit() {
	            var vm = this;
	
	            vm.Store.submit({
	                update: true,
	                form: vm.form,
	                resource: vm.resourceName,
	                data: vm.model,
	                redirectTo: 'productos'
	            });
	        }
	    }]);
	    return CrearController;
	}();
	
	exports.default = CrearController;

/***/ },
/* 564 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 565 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _angularUiRouter = __webpack_require__(400);
	
	var _angularUiRouter2 = _interopRequireDefault(_angularUiRouter);
	
	var _importar = __webpack_require__(566);
	
	var _importar2 = _interopRequireDefault(_importar);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('productos.importar.page', [_angularUiRouter2.default]).config(["$stateProvider", function ($stateProvider) {
	    "ngInject";
	
	    $stateProvider.state({
	        name: 'productos.importar',
	        url: '/importar',
	        views: {
	            "@": {
	                component: 'productosImportarPage'
	            }
	        },
	        ncyBreadcrumb: {
	            label: 'Importar productos'
	        }
	    });
	}]).component('productosImportarPage', _importar2.default);

/***/ },
/* 566 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _importarPage = __webpack_require__(567);
	
	var _importarPage2 = _interopRequireDefault(_importarPage);
	
	var _importarPage3 = __webpack_require__(568);
	
	var _importarPage4 = _interopRequireDefault(_importarPage3);
	
	__webpack_require__(569);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var importarPage = {
	    restrict: 'E',
	    bindings: {},
	    template: _importarPage2.default,
	    controller: _importarPage4.default,
	    controllerAs: 'vm'
	};
	
	exports.default = importarPage;

/***/ },
/* 567 */
/***/ function(module, exports) {

	module.exports = "<nx-import resource=\"vm.resource\" redirect-to=\"vm.redirectTo\">\n\n    <nx-import-header class=\"md-toolbar-tools\">\n        <h4>\n            <span>Importación de productos</span>\n        </h4>\n        <span flex></span>\n\n        <md-button ui-sref=\"productos\" class=\"md-raised nd-default\">Cancelar</md-button>\n    </nx-import-header>\n\n    <nx-import-instructions>\n        <div class=\"md-body-1\" layout=\"row\" layout-sm=\"column\" layout-wrap layout-fill layout-padding layout-align=\"center center\" flex>\n            <div flex>\n                <p>Descargue el archivo guía para realizar la importación de manera correcta. Recomendamos no alterar el nombre o la posición de las columnas.</p>\n            </div>\n\n            <div flex>\n                <md-button ng-href=\"{{ vm.files.guide }}\" class=\"md-raised\" target=\"_blank\">\n                    <i class=\"fa fa-arrow-down\"></i>\n                    Descargar archivo guia\n                </md-button>\n            </div>\n        </div>\n\n        <div class=\"md-body-1\" layout=\"row\" layout-sm=\"column\" layout-wrap layout-fill layout-padding layout-align=\"center center\" flex>\n            <div flex>\n                <p>Descargue el archivo de las categorias con sus respectivo id's para realizar la importación de manera correcta. Este archivo es solo informativo.</p>\n            </div>\n\n            <div flex>\n                <md-button ng-href=\"{{ vm.files.categoryExport }}\" class=\"md-raised\" target=\"_blank\">\n                    <i class=\"fa fa-arrow-down\"></i>\n                    Descargar archivo de categorias\n                </md-button>\n            </div>\n        </div>\n    </nx-import-instructions>\n</nx-import>\n";

/***/ },
/* 568 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _classCallCheck2 = __webpack_require__(365);
	
	var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var ImportarController = function ImportarController(NEXO) {
	    "ngInject";
	
	    (0, _classCallCheck3.default)(this, ImportarController);
	    var vm = this;
	
	    vm.files = {
	        guide: NEXO.export_guides_url + '/products',
	        categoryExport: NEXO.export_guides_url + '/products-categories-export'
	    };
	    vm.resource = 'product';
	    vm.redirectTo = 'productos';
	};
	ImportarController.$inject = ["NEXO"];
	
	exports.default = ImportarController;

/***/ },
/* 569 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 570 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _angularUiRouter = __webpack_require__(400);
	
	var _angularUiRouter2 = _interopRequireDefault(_angularUiRouter);
	
	var _ver = __webpack_require__(571);
	
	var _ver2 = _interopRequireDefault(_ver);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('productos.ver.page', [_angularUiRouter2.default]).config(["$stateProvider", function ($stateProvider) {
	    "ngInject";
	
	    $stateProvider.state({
	        name: 'productos.ver',
	        url: '/:id',
	        views: {
	            "@": {
	                component: 'productosVerPage'
	            }
	        },
	        resolve: {
	            item: /*@ngInject*/["Store", "$stateParams", function item(Store, $stateParams) {
	                return Store.find('product', $stateParams.id).then(function (response) {
	                    return response;
	                });
	            }]
	        },
	        ncyBreadcrumb: {
	            label: '{{ $resolve.item.name }}'
	        }
	    });
	}]).component('productosVerPage', _ver2.default);

/***/ },
/* 571 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _verPage = __webpack_require__(572);
	
	var _verPage2 = _interopRequireDefault(_verPage);
	
	var _verPage3 = __webpack_require__(573);
	
	var _verPage4 = _interopRequireDefault(_verPage3);
	
	__webpack_require__(574);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var page = {
	    restrict: 'E',
	    bindings: {
	        item: '<'
	    },
	    template: _verPage2.default,
	    controller: _verPage4.default,
	    controllerAs: 'vm'
	};
	
	exports.default = page;

/***/ },
/* 572 */
/***/ function(module, exports) {

	module.exports = "<md-toolbar class=\"md-toolbar-grey\">\n    <div class=\"md-toolbar-tools\">\n        <h3>\n            <span>Producto {{ vm.item.SKU }} - {{ vm.item.name }}</span>\n        </h3>\n        <span flex></span>\n\n        <!-- <md-button md-theme=\"nexo\" type=\"submit\" class=\"md-raised md-primary\">Guardar</md-button> -->\n        <!-- <md-button ui-sref=\"clientes\" class=\"md-raised nd-default\">Cancelar</md-button> -->\n    </div>\n</md-toolbar>\n\n\n\n<md-content layout=\"row\" layout-margin layout-fill>\n    <div flex-xs=\"100\" flex=\"50\" layout=\"column\">\n        <div class=\"md-nx-panel mb\" md-whiteframe=\"1\">\n            <md-toolbar>\n                <div class=\"md-toolbar-tools\">\n                    <h5>Información general</h5>\n                </div>\n            </md-toolbar>\n            <ul class=\"nx-detail-list\">\n                <li>\n                    <strong>Categoría del producto</strong>\n                    <span class=\"fl-r\">{{vm.item.category.name }}</span>\n                </li>\n\n                <li>\n                    <strong>Nombre</strong>\n                    <span class=\"fl-r\">{{vm.item.name }}</span>\n                </li>\n\n                <li>\n                    <strong>Descripción</strong>\n                    <span class=\"fl-r\">{{vm.item.description }}</span>\n                </li>\n\n                <li>\n                    <strong>Código</strong>\n                    <span class=\"fl-r\">{{vm.item.SKU }}</span>\n                </li>\n            </ul>\n        </div>\n    </div>\n\n\n\n    <div flex-xs=\"100\" flex=\"50\" layout=\"column\">\n\n        <div class=\"md-nx-panel mb\" md-whiteframe=\"1\">\n            <md-toolbar>\n                <div class=\"md-toolbar-tools\">\n                    <h5>Características</h5>\n                </div>\n            </md-toolbar>\n            <ul class=\"nx-detail-list\">\n                <li>\n                    <strong>Peso</strong>\n                    <span class=\"fl-r\">{{vm.item.weight }} {{vm.item.weight_unit }}</span>\n                </li>\n\n                <li>\n                    <strong>Altura</strong>\n                    <span class=\"fl-r\">{{vm.item.height }} {{vm.item.height_unit }}</span>\n                </li>\n\n                <li>\n                    <strong>Ancho</strong>\n                    <span class=\"fl-r\">{{vm.item.width }} {{vm.item.width_unit }}</span>\n                </li>\n\n                <li>\n                    <strong>Profundidad</strong>\n                    <span class=\"fl-r\">{{vm.item.depth }} {{vm.item.depth_unit }}</span>\n                </li>\n            </ul>\n        </div>\n\n\n    </div>\n</md-content>\n";

/***/ },
/* 573 */
/***/ function(module, exports, __webpack_require__) {

	"use strict";
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _classCallCheck2 = __webpack_require__(365);
	
	var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var Controller = function Controller(Store, $stateParams) {
	    "ngInject";
	
	    (0, _classCallCheck3.default)(this, Controller);
	    var vm = this;
	
	    vm.item = Store.get('product', $stateParams.id);
	};
	Controller.$inject = ["Store", "$stateParams"];
	
	exports.default = Controller;

/***/ },
/* 574 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 575 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _angularUiRouter = __webpack_require__(400);
	
	var _angularUiRouter2 = _interopRequireDefault(_angularUiRouter);
	
	var _estadisticas = __webpack_require__(576);
	
	var _estadisticas2 = _interopRequireDefault(_estadisticas);
	
	var _index = __webpack_require__(580);
	
	var _index2 = _interopRequireDefault(_index);
	
	var _index3 = __webpack_require__(585);
	
	var _index4 = _interopRequireDefault(_index3);
	
	var _index5 = __webpack_require__(590);
	
	var _index6 = _interopRequireDefault(_index5);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('estadisticas.page', [_angularUiRouter2.default, _index2.default.name, _index4.default.name, _index6.default.name]).config(["$stateProvider", function ($stateProvider) {
	    "ngInject";
	
	    $stateProvider.state({
	        name: 'estadisticas',
	        url: '/estadisticas',
	        component: 'estadisticasPage',
	        ncyBreadcrumb: {
	            parent: 'dashboard',
	            label: 'Estadísticas'
	        }
	    });
	}]).component('estadisticasPage', _estadisticas2.default);

/***/ },
/* 576 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _estadisticasPage = __webpack_require__(577);
	
	var _estadisticasPage2 = _interopRequireDefault(_estadisticasPage);
	
	var _estadisticasPage3 = __webpack_require__(578);
	
	var _estadisticasPage4 = _interopRequireDefault(_estadisticasPage3);
	
	__webpack_require__(579);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var estadisticasPage = {
	    restrict: 'E',
	    bindings: {},
	    template: _estadisticasPage2.default,
	    controller: _estadisticasPage4.default,
	    controllerAs: 'vm'
	};
	
	exports.default = estadisticasPage;

/***/ },
/* 577 */
/***/ function(module, exports) {

	module.exports = "<div>{{ vm.name }}</div>";

/***/ },
/* 578 */
/***/ function(module, exports, __webpack_require__) {

	"use strict";
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _classCallCheck2 = __webpack_require__(365);
	
	var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var EstadisticasController = function EstadisticasController() {
	    "ngInject";
	
	    (0, _classCallCheck3.default)(this, EstadisticasController);
	    var vm = this;
	
	    vm.name = 'estadisticas';
	};
	
	exports.default = EstadisticasController;

/***/ },
/* 579 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 580 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _angularUiRouter = __webpack_require__(400);
	
	var _angularUiRouter2 = _interopRequireDefault(_angularUiRouter);
	
	var _servicios = __webpack_require__(581);
	
	var _servicios2 = _interopRequireDefault(_servicios);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('estadisticas.servicios.page', [_angularUiRouter2.default]).config(["$stateProvider", function ($stateProvider) {
	    "ngInject";
	
	    $stateProvider.state({
	        name: 'estadisticas.servicios',
	        url: '/asignaciones-por-estado',
	        views: {
	            "@": {
	                component: 'estadisticasServiciosPage'
	            }
	        },
	        ncyBreadcrumb: {
	            parent: 'dashboard',
	            label: 'Estadísticas'
	        }
	    });
	}]).component('estadisticasServiciosPage', _servicios2.default);

/***/ },
/* 581 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _serviciosPage = __webpack_require__(582);
	
	var _serviciosPage2 = _interopRequireDefault(_serviciosPage);
	
	var _serviciosPage3 = __webpack_require__(583);
	
	var _serviciosPage4 = _interopRequireDefault(_serviciosPage3);
	
	__webpack_require__(584);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var serviciosPage = {
	    restrict: 'E',
	    bindings: {},
	    template: _serviciosPage2.default,
	    controller: _serviciosPage4.default,
	    controllerAs: 'vm'
	};
	
	exports.default = serviciosPage;

/***/ },
/* 582 */
/***/ function(module, exports) {

	module.exports = "<md-toolbar class=\"md-toolbar-grey\">\n    <div class=\"md-toolbar-tools\">\n        <h3>\n            <span>{{ \"PAGES.ESTADISTICAS.SERVICIOS.TITLE\" | translate }}</span>\n        </h3>\n    </div>\n</md-toolbar>\n\n<md-content layout-padding layout=\"column\">\n\n    <div flex layout=\"row\" layout-wrap layout-align=\"space-between center\">\n        <md-menu>\n            <md-button aria-label=\"Menú para exportar\" class=\"md-raised\" ng-click=\"$mdOpenMenu($event)\">\n                <span md-menu-origin>{{ \"PAGES.ESTADISTICAS.SERVICIOS.EXPORTAR\" | translate }}</span>\n            </md-button>\n            <md-menu-content width=\"4\">\n                <md-menu-item>\n                    <md-button ng-click=\"vm.exportChart('image')\">\n                        <md-icon md-svg-icon=\"file-image\" md-menu-align-target></md-icon>\n                        {{ \"PAGES.ESTADISTICAS.SERVICIOS.GRAFICO_A_IMAGEN\" | translate }}\n                    </md-button>\n                </md-menu-item>\n                <md-menu-item>\n                    <md-button ng-click=\"vm.exportChart('pdf')\">\n                        <md-icon md-svg-icon=\"file-pdf\" md-menu-align-target></md-icon>\n                        {{ \"PAGES.ESTADISTICAS.SERVICIOS.GRAFICO_A_PDF\" | translate }}\n                    </md-button>\n                </md-menu-item>\n                <md-menu-item>\n                    <md-button ng-click=\"vm.exportTable('excel')\">\n                        <md-icon md-svg-icon=\"file-excel\" md-menu-align-target></md-icon>\n                        {{ \"PAGES.ESTADISTICAS.SERVICIOS.TABLA_A_EXCEL\" | translate }}\n                    </md-button>\n                </md-menu-item>\n                <md-menu-item>\n                    <md-button ng-click=\"vm.exportTable('pdf')\">\n                        <md-icon md-svg-icon=\"file-pdf\" md-menu-align-target></md-icon>\n                        {{ \"PAGES.ESTADISTICAS.SERVICIOS.TABLA_A_PDF\" | translate }}\n                    </md-button>\n                </md-menu-item>\n\n            </md-menu-content>\n        </md-menu>\n\n        <form  name=\"vm.form\" novalidate flex  ng-submit=\"vm.submit()\" layout=\"row\" layout-align=\"end center\">\n            <div>\n                <formly-form model=\"vm.model\" fields=\"vm.fields\" form=\"vm.form\"></formly-form>\n            </div>\n            <div>\n                <md-button type=\"submit\" class=\"md-raised nd-default\" ng-disabled=\"vm.loading\">{{ \"PAGES.ESTADISTICAS.SERVICIOS.FILTRAR\" | translate }}</md-button>\n            </div>\n        </form>\n    </div>\n\n\n\n    <div class=\"mt\">\n        <div id=\"chart\"></div>\n        <div class=\"mt-l\" id=\"grid\"></div>\n    </div>\n</md-content>\n";

/***/ },
/* 583 */
/***/ function(module, exports, __webpack_require__) {

	"use strict";
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _classCallCheck2 = __webpack_require__(365);
	
	var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
	
	var _createClass2 = __webpack_require__(422);
	
	var _createClass3 = _interopRequireDefault(_createClass2);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var ServiciosController = function () {
	    ServiciosController.$inject = ["StatsForm", "$http", "$timeout", "NEXO", "$translate"];
	    function ServiciosController(StatsForm, $http, $timeout, NEXO, $translate) {
	        "ngInject";
	
	        (0, _classCallCheck3.default)(this, ServiciosController);
	        var vm = this;
	
	        vm.NEXO = NEXO;
	        vm.$http = $http;
	        vm.fields = StatsForm;
	        vm.refresh = refresh;
	
	        $timeout(refresh);
	
	        function refresh() {
	
	            vm.loading = true;
	
	            $http({
	                url: NEXO.api_url + "stats/services-by-status",
	                method: 'POST',
	                data: vm.model
	            }).then(function (response) {
	                var table = response.data.table,
	                    series = response.data.series,
	                    $grid = $("#grid"),
	                    $chart = $('#chart'),
	                    rotation = -90;
	
	                $grid.empty();
	                $chart.empty();
	                console.log(series.data);
	
	                if (!_.isEmpty(series.data)) {
	                    // Preprando la tabla a mostrar
	                    $grid.kendoGrid({
	                        dataSource: {
	                            data: table.data
	                        },
	                        excel: {
	                            author: "Nexo Logística",
	                            fileName: "tabla-asignaciones-por-estado.xlsx"
	                        },
	                        pdf: {
	                            author: "Nexo Logística",
	                            creator: "Nexo Logística",
	                            fileName: "tabla-asignaciones-por-estado.pdf"
	                        },
	                        groupable: false,
	                        sortable: true,
	                        resizable: true,
	                        columns: table.columns
	                    });
	
	                    switch (vm.model.group) {
	                        case 'week':
	                            rotation = -45;
	                            break;
	                        case 'month':
	                            rotation = 0;
	                            break;
	                    }
	
	                    $chart.kendoChart({
	                        legend: {
	                            position: 'bottom'
	                        },
	                        seriesDefaults: {
	                            type: "area",
	                            area: {
	                                line: {
	                                    style: "smooth"
	                                }
	                            },
	                            labels: {
	                                visible: true,
	                                background: "transparent"
	                            }
	                        },
	                        series: series.data,
	                        valueAxis: {
	                            line: {
	                                visible: false
	                            }
	                        },
	
	                        categoryAxis: {
	                            categories: series.categories,
	                            majorGridLines: {
	                                visible: false
	                            },
	                            labels: {
	                                rotation: rotation
	                            }
	                        },
	                        tooltip: {
	                            visible: true,
	                            template: "#= value # asignaciones"
	                        }
	                    });
	                } else {
	                    $chart.html('<div style="text-align: center">No existen registros para las fechas indicadas</div>');
	                }
	            }).finally(function () {
	                vm.loading = false;
	            });
	        }
	    }
	
	    (0, _createClass3.default)(ServiciosController, [{
	        key: "exportChart",
	        value: function exportChart() {
	            var type = arguments.length <= 0 || arguments[0] === undefined ? 'image' : arguments[0];
	
	            var chart = $("#chart").getKendoChart();
	
	            chart.options.title.text = 'Asignaciones por estado';
	
	            var chartExport = type == 'image' ? chart.exportImage() : chart.exportPDF();
	
	            chartExport.done(function (data) {
	                kendo.saveAs({
	                    dataURI: data,
	                    fileName: "grafico-asignaciones-por-estado." + (type == 'image' ? 'png' : 'pdf')
	                });
	
	                chart.options.title.text = '';
	            });
	        }
	    }, {
	        key: "exportTable",
	        value: function exportTable() {
	            var type = arguments.length <= 0 || arguments[0] === undefined ? 'excel' : arguments[0];
	
	            var grid = $('#grid').getKendoGrid();
	
	            type == 'excel' ? grid.saveAsExcel() : grid.saveAsPDF();
	        }
	    }, {
	        key: "submit",
	        value: function submit() {
	            this.refresh();
	        }
	    }]);
	    return ServiciosController;
	}();
	
	exports.default = ServiciosController;

/***/ },
/* 584 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 585 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _angularUiRouter = __webpack_require__(400);
	
	var _angularUiRouter2 = _interopRequireDefault(_angularUiRouter);
	
	var _ruteros = __webpack_require__(586);
	
	var _ruteros2 = _interopRequireDefault(_ruteros);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('estadisticas.ruteros.page', [_angularUiRouter2.default]).config(["$stateProvider", function ($stateProvider) {
	    "ngInject";
	
	    $stateProvider.state({
	        name: 'estadisticas.ruteros',
	        url: '/asignaciones-por-ruteros',
	        views: {
	            "@": {
	                component: 'estadisticasRuterosPage'
	            }
	        },
	        ncyBreadcrumb: {
	            parent: 'dashboard',
	            label: 'Estadísticas'
	        }
	    });
	}]).component('estadisticasRuterosPage', _ruteros2.default);

/***/ },
/* 586 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _ruterosPage = __webpack_require__(587);
	
	var _ruterosPage2 = _interopRequireDefault(_ruterosPage);
	
	var _ruterosPage3 = __webpack_require__(588);
	
	var _ruterosPage4 = _interopRequireDefault(_ruterosPage3);
	
	__webpack_require__(589);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var ruterosPage = {
	    restrict: 'E',
	    bindings: {},
	    template: _ruterosPage2.default,
	    controller: _ruterosPage4.default,
	    controllerAs: 'vm'
	};
	
	exports.default = ruterosPage;

/***/ },
/* 587 */
/***/ function(module, exports) {

	module.exports = "<md-toolbar class=\"md-toolbar-grey\">\n    <div class=\"md-toolbar-tools\">\n        <h3>\n            <span>{{ \"PAGES.ESTADISTICAS.RUTEROS.TITLE\" | translate }}</span>\n        </h3>\n    </div>\n</md-toolbar>\n\n\n<md-content layout-padding layout=\"column\">\n\n    <div flex layout=\"row\" layout-wrap layout-align=\"space-between center\">\n        <md-menu>\n            <md-button aria-label=\"Menú para exportar\" class=\"md-raised\" ng-click=\"$mdOpenMenu($event)\">\n                <span md-menu-origin>{{ \"PAGES.ESTADISTICAS.RUTEROS.EXPORTAR\" | translate }}</span>\n            </md-button>\n            <md-menu-content width=\"4\">\n                <md-menu-item>\n                    <md-button ng-click=\"vm.exportChart('image')\">\n                        <md-icon md-svg-icon=\"file-image\" md-menu-align-target></md-icon>\n                        {{ \"PAGES.ESTADISTICAS.RUTEROS.GRAFICO_A_IMAGEN\" | translate }}\n                    </md-button>\n                </md-menu-item>\n                <md-menu-item>\n                    <md-button ng-click=\"vm.exportChart('pdf')\">\n                        <md-icon md-svg-icon=\"file-pdf\" md-menu-align-target></md-icon>\n                        {{ \"PAGES.ESTADISTICAS.RUTEROS.GRAFICO_A_PDF\" | translate }}\n                    </md-button>\n                </md-menu-item>\n                <md-menu-item>\n                    <md-button ng-click=\"vm.exportTable('excel')\">\n                        <md-icon md-svg-icon=\"file-excel\" md-menu-align-target></md-icon>\n                        {{ \"PAGES.ESTADISTICAS.RUTEROS.TABLA_A_EXCEL\" | translate }}\n                    </md-button>\n                </md-menu-item>\n                <md-menu-item>\n                    <md-button ng-click=\"vm.exportTable('pdf')\">\n                        <md-icon md-svg-icon=\"file-pdf\" md-menu-align-target></md-icon>\n                        {{ \"PAGES.ESTADISTICAS.RUTEROS.TABLA_A_PDF\" | translate }}\n                    </md-button>\n                </md-menu-item>\n\n            </md-menu-content>\n        </md-menu>\n\n        <form  name=\"vm.form\" novalidate flex  ng-submit=\"vm.submit()\" layout=\"row\" layout-align=\"end center\">\n            <div>\n                <formly-form model=\"vm.model\" fields=\"vm.fields\" form=\"vm.form\"></formly-form>\n            </div>\n            <div>\n                <md-button type=\"submit\" class=\"md-raised nd-default\" ng-disabled=\"vm.loading\">{{ \"PAGES.ESTADISTICAS.RUTEROS.FILTRAR\" | translate }}</md-button>\n            </div>\n        </form>\n    </div>\n\n\n\n    <div class=\"mt\">\n        <div id=\"chart\"></div>\n        <div class=\"mt-l\" id=\"grid\"></div>\n    </div>\n</md-content>\n";

/***/ },
/* 588 */
/***/ function(module, exports, __webpack_require__) {

	"use strict";
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _classCallCheck2 = __webpack_require__(365);
	
	var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
	
	var _createClass2 = __webpack_require__(422);
	
	var _createClass3 = _interopRequireDefault(_createClass2);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var Controller = function () {
	    Controller.$inject = ["StatsForm", "$http", "$timeout", "NEXO"];
	    function Controller(StatsForm, $http, $timeout, NEXO) {
	        "ngInject";
	
	        (0, _classCallCheck3.default)(this, Controller);
	        var vm = this;
	
	        vm.NEXO = NEXO;
	        vm.$http = $http;
	        vm.fields = StatsForm;
	        vm.refresh = refresh;
	
	        $timeout(refresh);
	
	        function refresh() {
	
	            vm.loading = true;
	
	            $http({
	                url: NEXO.api_url + "stats/services-by-users",
	                method: 'POST',
	                data: vm.model
	            }).then(function (response) {
	
	                var table = response.data.table,
	                    series = response.data.series,
	                    $grid = $("#grid"),
	                    $chart = $('#chart'),
	                    rotation = -90;
	
	                $grid.empty();
	                $chart.empty();
	
	                if (!_.isEmpty(series.data)) {
	
	                    // Preprando la tabla a mostrar
	                    $grid.kendoGrid({
	                        dataSource: {
	                            data: table.data
	                        },
	                        excel: {
	                            author: "Nexo Logística",
	                            fileName: "tabla-asignaciones-por-rutero.xlsx"
	                        },
	                        pdf: {
	                            author: "Nexo Logística",
	                            creator: "Nexo Logística",
	                            fileName: "tabla-asignaciones-por-rutero.pdf"
	                        },
	                        groupable: false,
	                        sortable: true,
	                        resizable: true,
	                        columns: table.columns
	                    });
	
	                    switch (vm.model.group) {
	                        case 'week':
	                            rotation = -45;
	                            break;
	                        case 'month':
	                            rotation = 0;
	                            break;
	                    }
	
	                    $chart.kendoChart({
	                        legend: {
	                            position: 'bottom'
	                        },
	                        seriesDefaults: {
	                            type: "area",
	                            area: {
	                                line: {
	                                    style: "smooth"
	                                }
	                            },
	                            labels: {
	                                visible: true,
	                                background: "transparent"
	                            }
	                        },
	                        series: series.data,
	                        valueAxis: {
	                            line: {
	                                visible: false
	                            }
	                        },
	
	                        categoryAxis: {
	                            categories: series.categories,
	                            majorGridLines: {
	                                visible: false
	                            },
	                            labels: {
	                                rotation: rotation
	                            }
	                        },
	                        tooltip: {
	                            visible: true,
	                            template: "#= value # asignaciones"
	                        }
	                    });
	                } else {
	                    $chart.html('<div style="text-align: center">No existen registros para las fechas indicadas</div>');
	                }
	            }).finally(function () {
	                vm.loading = false;
	            });
	        }
	    }
	
	    (0, _createClass3.default)(Controller, [{
	        key: "exportChart",
	        value: function exportChart() {
	            var type = arguments.length <= 0 || arguments[0] === undefined ? 'image' : arguments[0];
	
	            var chart = $("#chart").getKendoChart();
	
	            chart.options.title.text = 'Asignaciones por rutero';
	
	            var chartExport = type == 'image' ? chart.exportImage() : chart.exportPDF();
	
	            chartExport.done(function (data) {
	                kendo.saveAs({
	                    dataURI: data,
	                    fileName: "grafico-asignaciones-por-rutero." + (type == 'image' ? 'png' : 'pdf')
	                });
	
	                chart.options.title.text = '';
	            });
	        }
	    }, {
	        key: "exportTable",
	        value: function exportTable() {
	            var type = arguments.length <= 0 || arguments[0] === undefined ? 'excel' : arguments[0];
	
	            var grid = $('#grid').getKendoGrid();
	
	            type == 'excel' ? grid.saveAsExcel() : grid.saveAsPDF();
	        }
	    }, {
	        key: "submit",
	        value: function submit() {
	            this.refresh();
	        }
	    }]);
	    return Controller;
	}();
	
	exports.default = Controller;

/***/ },
/* 589 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 590 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _angularUiRouter = __webpack_require__(400);
	
	var _angularUiRouter2 = _interopRequireDefault(_angularUiRouter);
	
	var _encuestas = __webpack_require__(591);
	
	var _encuestas2 = _interopRequireDefault(_encuestas);
	
	var _ver = __webpack_require__(595);
	
	var _ver2 = _interopRequireDefault(_ver);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('estadisticas.encuestas.page', [_angularUiRouter2.default, _ver2.default.name]).config(["$stateProvider", function ($stateProvider) {
	    "ngInject";
	
	    $stateProvider.state({
	        name: 'estadisticas.encuestas',
	        url: '/encuestas',
	        views: {
	            "@": {
	                component: 'estadisticasEncuestasPage'
	            }
	        },
	        ncyBreadcrumb: {
	            parent: 'estadisticas',
	            label: 'Resultados de encuestas'
	        }
	    });
	}]).component('estadisticasEncuestasPage', _encuestas2.default);

/***/ },
/* 591 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _encuestasPage = __webpack_require__(592);
	
	var _encuestasPage2 = _interopRequireDefault(_encuestasPage);
	
	var _encuestasPage3 = __webpack_require__(593);
	
	var _encuestasPage4 = _interopRequireDefault(_encuestasPage3);
	
	__webpack_require__(594);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var encuestasPage = {
	    restrict: 'E',
	    bindings: {},
	    template: _encuestasPage2.default,
	    controller: _encuestasPage4.default,
	    controllerAs: 'vm'
	};
	
	exports.default = encuestasPage;

/***/ },
/* 592 */
/***/ function(module, exports) {

	module.exports = "<nx-table options=\"vm.options\" resource=\"poll\"></nx-table>\n";

/***/ },
/* 593 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _classCallCheck2 = __webpack_require__(365);
	
	var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var EncuestasController = function EncuestasController() {
	    "ngInject";
	
	    (0, _classCallCheck3.default)(this, EncuestasController);
	    var vm = this;
	
	    vm.options = {
	        resource: 'pollAnswer',
	        include: 'poll,options.option.question,customer',
	        locale: {
	            page: 'ESTADISTICAS.ENCUESTAS'
	        },
	        columns: [{
	            name: 'ID',
	            orderBy: 'id'
	        }, {
	            name: 'NOMBRE',
	            value: 'poll.name',
	            orderBy: 'name'
	        }, {
	            name: 'CLIENTE',
	            value: 'customer.name',
	            orderBy: 'customer'
	        }, {
	            name: 'RESPONDIDO',
	            orderBy: 'created_at',
	            value: 'created_at.date',
	            filter: 'amTimeAgo'
	        }, {
	            name: 'RATING',
	            value: 'rating'
	        }],
	        actions: {
	            show: 'estadisticas.encuestas.ver',
	            hideDelete: true
	        }
	    };
	};
	
	exports.default = EncuestasController;

/***/ },
/* 594 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 595 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _angularUiRouter = __webpack_require__(400);
	
	var _angularUiRouter2 = _interopRequireDefault(_angularUiRouter);
	
	var _ver = __webpack_require__(596);
	
	var _ver2 = _interopRequireDefault(_ver);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var itemParams = {
	    params: {
	        include: 'options.option.question,customer'
	    }
	};
	
	exports.default = _angular2.default.module('estadisticas.encuestas.ver.page', [_angularUiRouter2.default]).config(["$stateProvider", function ($stateProvider) {
	    "ngInject";
	
	    $stateProvider.state({
	        name: 'estadisticas.encuestas.ver',
	        url: '/:id',
	        views: {
	            "@": {
	                component: 'estadisticasEncuestasVerPage'
	            }
	        },
	        resolve: {
	            item: /*@ngInject*/["Store", "$stateParams", function item(Store, $stateParams) {
	                return Store.find('pollAnswer', $stateParams.id, itemParams).then(function (response) {
	                    return response;
	                });
	            }]
	        },
	        ncyBreadcrumb: {
	            label: 'Ver respuesta'
	        }
	    });
	}]).component('estadisticasEncuestasVerPage', _ver2.default);

/***/ },
/* 596 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _verPage = __webpack_require__(597);
	
	var _verPage2 = _interopRequireDefault(_verPage);
	
	var _verPage3 = __webpack_require__(598);
	
	var _verPage4 = _interopRequireDefault(_verPage3);
	
	__webpack_require__(599);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var page = {
	    restrict: 'E',
	    bindings: {
	        item: '<'
	    },
	    template: _verPage2.default,
	    controller: _verPage4.default,
	    controllerAs: 'vm'
	};
	
	exports.default = page;

/***/ },
/* 597 */
/***/ function(module, exports) {

	module.exports = "<md-toolbar class=\"md-toolbar-grey\">\n    <div class=\"md-toolbar-tools\">\n        <h3>\n            <span>{{ \"PAGES.ESTADISTICAS.ENCUESTAS.RESPUESTA\" | translate }} #{{ vm.item.id }}</span>\n        </h3>\n        <span flex></span>\n\n        <!-- <md-button md-theme=\"nexo\" type=\"submit\" class=\"md-raised md-primary\">Guardar</md-button> -->\n        <!-- <md-button ui-sref=\"clientes\" class=\"md-raised nd-default\">Cancelar</md-button> -->\n    </div>\n</md-toolbar>\n\n\n\n<md-content layout=\"row\" layout-margin layout-fill>\n    <div flex-xs=\"100\" flex=\"50\" layout=\"column\">\n        <div class=\"md-nx-panel mb\" md-whiteframe=\"1\">\n            <md-toolbar>\n                <div class=\"md-toolbar-tools\">\n                    <h5>{{ \"PAGES.ESTADISTICAS.ENCUESTAS.CLIENTE\" | translate }}</h5>\n                </div>\n            </md-toolbar>\n\n            <ul class=\"nx-detail-list\">\n                <li>\n                    <strong>{{ \"PAGES.ESTADISTICAS.ENCUESTAS.CLIENTE\" | translate }}</strong>\n                    <span class=\"fl-r\">{{vm.item.customer.name }}</span>\n                </li>\n                <li>\n                    <strong>{{ \"PAGES.ESTADISTICAS.ENCUESTAS.CORREO\" | translate }}</strong>\n                    <span class=\"fl-r\">{{vm.item.customer.email }}</span>\n                </li>\n            </ul>\n        </div>\n\n        <div class=\"md-nx-panel mb\" md-whiteframe=\"1\">\n            <md-toolbar>\n                <div class=\"md-toolbar-tools\">\n                    <h5>{{ \"PAGES.ESTADISTICAS.ENCUESTAS.PREGUNTA_Y_RESPUESTA\" | translate }}</h5>\n                </div>\n            </md-toolbar>\n              <ul class=\"nx-detail-list\" ng-repeat=\"option in vm.item.options.data\">\n                <li>\n                    <strong>{{ \"PAGES.ESTADISTICAS.ENCUESTAS.PREGUNTA\" | translate }}</strong>\n                    <span class=\"fl-r\">{{option.option.question.question}}</span>\n                </li>\n                <li ng-if=\"option.answer.length\">\n                    <strong>{{ \"PAGES.ESTADISTICAS.ENCUESTAS.RESPUESTA\" | translate }}</strong>\n                    <span class=\"fl-r\">{{option.answer}}</span>\n                </li>\n                <li ng-if=\"option.option.option.length\">\n                    <strong>{{ \"PAGES.ESTADISTICAS.ENCUESTAS.OPCION\" | translate }}</strong>\n                    <span class=\"fl-r\">{{option.option.option}}</span>\n                </li>\n            </ul>\n        </div>\n\n    </div>\n</md-content>\n";

/***/ },
/* 598 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _classCallCheck2 = __webpack_require__(365);
	
	var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var Controller = function Controller(Store, $stateParams) {
	    "ngInject";
	
	    (0, _classCallCheck3.default)(this, Controller);
	    var vm = this;
	    var itemParams = {
	        params: {
	            include: 'options.option.question,customer'
	        }
	    };
	
	    vm.item = Store.get('pollAnswer', $stateParams.id, itemParams);
	};
	Controller.$inject = ["Store", "$stateParams"];
	
	exports.default = Controller;

/***/ },
/* 599 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 600 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _angularUiRouter = __webpack_require__(400);
	
	var _angularUiRouter2 = _interopRequireDefault(_angularUiRouter);
	
	var _usuarios = __webpack_require__(601);
	
	var _usuarios2 = _interopRequireDefault(_usuarios);
	
	var _index = __webpack_require__(605);
	
	var _index2 = _interopRequireDefault(_index);
	
	var _index3 = __webpack_require__(610);
	
	var _index4 = _interopRequireDefault(_index3);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('usuarios.page', [_angularUiRouter2.default, _index2.default.name, _index4.default.name]).config(["$stateProvider", function ($stateProvider) {
	    "ngInject";
	
	    $stateProvider.state({
	        name: 'usuarios',
	        url: '/usuarios',
	        component: 'usuariosPage',
	        ncyBreadcrumb: {
	            parent: 'dashboard',
	            label: 'PAGES.USUARIOS.TITLE'
	        }
	    });
	}]).component('usuariosPage', _usuarios2.default);

/***/ },
/* 601 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _usuariosPage = __webpack_require__(602);
	
	var _usuariosPage2 = _interopRequireDefault(_usuariosPage);
	
	var _usuariosPage3 = __webpack_require__(603);
	
	var _usuariosPage4 = _interopRequireDefault(_usuariosPage3);
	
	__webpack_require__(604);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var usuariosPage = {
	    restrict: 'E',
	    bindings: {},
	    template: _usuariosPage2.default,
	    controller: _usuariosPage4.default,
	    controllerAs: 'vm'
	};
	
	exports.default = usuariosPage;

/***/ },
/* 602 */
/***/ function(module, exports) {

	module.exports = "<nx-table options=\"vm.options\"></nx-table>";

/***/ },
/* 603 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _classCallCheck2 = __webpack_require__(365);
	
	var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var Controller = function Controller() {
	    "ngInject";
	
	    (0, _classCallCheck3.default)(this, Controller);
	    var vm = this;
	
	    vm.options = {
	        resource: 'user',
	        locale: {
	            page: 'USUARIOS'
	        },
	        columns: [{
	            name: 'IMAGEN',
	            orderBy: false,
	            isImage: true,
	            value: 'avatar.xs'
	        }, {
	            name: 'Nombres',
	            orderBy: 'first_name'
	        }, {
	            name: 'APELLIDOS',
	            orderBy: 'last_name'
	        }, {
	            name: 'EMAIL',
	            orderBy: 'email'
	        }, {
	            name: 'Grupo',
	            value: 'role'
	        }, //orderBy: 'role_id'
	        {
	            name: 'Modificado',
	            orderBy: 'updated_at',
	            value: 'updated_at.date',
	            filter: 'amTimeAgo'
	        }],
	        actions: {
	            import: 'usuarios.importar',
	            create: 'usuarios.crear',
	            edit: 'usuarios.editar'
	        },
	        lang: {
	            single: 'USUARIO',
	            multiple: 'USUARIOS'
	        }
	    };
	};
	
	exports.default = Controller;

/***/ },
/* 604 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 605 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _angularUiRouter = __webpack_require__(400);
	
	var _angularUiRouter2 = _interopRequireDefault(_angularUiRouter);
	
	var _crear = __webpack_require__(606);
	
	var _crear2 = _interopRequireDefault(_crear);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('usuarios.crear.page', [_angularUiRouter2.default]).config(["$stateProvider", function ($stateProvider) {
	    "ngInject";
	
	    $stateProvider.state({
	        name: 'usuarios.crear',
	        url: '/crear',
	        views: {
	            "@": {
	                component: 'usuariosCrearPage'
	            }
	        },
	        ncyBreadcrumb: {
	            label: 'Crear'
	        },
	        resolve: {
	            roles: /*@ngInject*/["Store", function roles(Store) {
	                return Store.findAll('role');
	            }],
	            transports: /*@ngInject*/["Store", function transports(Store) {
	                return Store.findAll('transport');
	            }]
	        }
	    });
	}]).component('usuariosCrearPage', _crear2.default);

/***/ },
/* 606 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _crearPage = __webpack_require__(607);
	
	var _crearPage2 = _interopRequireDefault(_crearPage);
	
	var _crearPage3 = __webpack_require__(608);
	
	var _crearPage4 = _interopRequireDefault(_crearPage3);
	
	__webpack_require__(609);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var crearPage = {
	    restrict: 'E',
	    bindings: {},
	    template: _crearPage2.default,
	    controller: _crearPage4.default,
	    controllerAs: 'vm'
	};
	
	exports.default = crearPage;

/***/ },
/* 607 */
/***/ function(module, exports) {

	module.exports = "<form name=\"vm.form\" autocomplete=\"off\" ng-submit=\"vm.onSubmit()\" novalidate autocomplete=\"off\">\n\n    <md-toolbar class=\"md-toolbar-grey\">\n        <div class=\"md-toolbar-tools\">\n            <span flex></span>\n\n            <md-button ui-sref=\"usuarios\" class=\"md-raised nd-default\">Cancelar</md-button>\n            <md-button md-theme=\"nexo\" type=\"submit\" class=\"md-raised md-primary\" ng-disabled=\"vm.submitting\">Guardar</md-button>\n        </div>\n    </md-toolbar>\n\n\n    <md-content layout=\"row\" layout-margin layout-wrap>\n        <div flex layout=\"column\">\n            <div class=\"md-nx-panel mb\" flex md-whiteframe=\"1\">\n                <md-toolbar>\n                    <div class=\"md-toolbar-tools\">\n                        <h5>Información básica</h5>\n                    </div>\n                </md-toolbar>\n                <md-content layout=\"column\" layout-padding>\n                    <formly-form model=\"vm.model\" fields=\"vm.fields.basic\" form=\"vm.form\"></formly-form>\n                </md-content>\n            </div>\n        </div>\n\n        <div flex layout=\"column\">\n            <div class=\"md-nx-panel mb\" flex md-whiteframe=\"1\">\n                <md-toolbar>\n                    <div class=\"md-toolbar-tools\">\n                        <h5>Datos de contacto</h5>\n                    </div>\n                </md-toolbar>\n                <md-content layout=\"column\" layout-padding>\n                    <formly-form model=\"vm.model\" fields=\"vm.fields.contact\" form=\"vm.form\"></formly-form>\n                </md-content>\n            </div>\n\n            <div class=\"md-nx-panel\" flex ng-show=\"vm.model.showTransportForm\" md-whiteframe=\"1\">\n                <md-toolbar>\n                    <div class=\"md-toolbar-tools\">\n                        <h5>Medios de transporte</h5>\n                    </div>\n                </md-toolbar>\n                <md-content layout=\"column\" layout-padding>\n                    <formly-form model=\"vm.model\" fields=\"vm.fields.transport\" form=\"vm.form\"></formly-form>\n                </md-content>\n            </div>\n        </div>\n    </md-content>\n</form>\n\n";

/***/ },
/* 608 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _classCallCheck2 = __webpack_require__(365);
	
	var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
	
	var _createClass2 = __webpack_require__(422);
	
	var _createClass3 = _interopRequireDefault(_createClass2);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var Controller = function () {
	    Controller.$inject = ["Store", "UserForm"];
	    function Controller(Store, UserForm) {
	        "ngInject";
	
	        (0, _classCallCheck3.default)(this, Controller);
	        var vm = this;
	
	        vm.Store = Store;
	        vm.fields = UserForm;
	        vm.model = {};
	    }
	
	    (0, _createClass3.default)(Controller, [{
	        key: 'onSubmit',
	        value: function onSubmit() {
	            var vm = this;
	
	            vm.Store.submit({
	                form: vm.form,
	                resource: 'user',
	                data: vm.model,
	                redirectTo: 'usuarios',
	                submitting: vm.submitting
	            });
	        }
	    }]);
	    return Controller;
	}();
	
	exports.default = Controller;

/***/ },
/* 609 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 610 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _angularUiRouter = __webpack_require__(400);
	
	var _angularUiRouter2 = _interopRequireDefault(_angularUiRouter);
	
	var _editar = __webpack_require__(611);
	
	var _editar2 = _interopRequireDefault(_editar);
	
	var _store = __webpack_require__(352);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('usuarios.editar.page', [_angularUiRouter2.default]).config(["$stateProvider", function ($stateProvider) {
	    "ngInject";
	
	    $stateProvider.state({
	        name: 'usuarios.editar',
	        url: '/:id/editar',
	        views: {
	            "@": {
	                component: 'usuariosEditarPage'
	            }
	        },
	        ncyBreadcrumb: {
	            label: 'Editar {{$resolve.item.name}}'
	        },
	        resolve: {
	            modules: /*@ngInject*/["Store", function modules(Store) {
	                return Store.findAll('module');
	            }],
	            item: /*@ngInject*/["$stateParams", function item($stateParams) {
	                var opts = {
	                    params: {
	                        include: 'contact,transports'
	                    }
	                };
	                return _store.store.find('user', $stateParams.id, opts).then(function (response) {
	                    return response;
	                });
	            }],
	            roles: /*@ngInject*/["Store", function roles(Store) {
	                return Store.findAll('role');
	            }],
	            transports: /*@ngInject*/["Store", function transports(Store) {
	                return Store.findAll('transport');
	            }]
	        }
	    });
	}]).component('usuariosEditarPage', _editar2.default);

/***/ },
/* 611 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _editarPage = __webpack_require__(612);
	
	var _editarPage2 = _interopRequireDefault(_editarPage);
	
	var _editarPage3 = __webpack_require__(613);
	
	var _editarPage4 = _interopRequireDefault(_editarPage3);
	
	__webpack_require__(614);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var EditarPage = {
	    restrict: 'E',
	    bindings: {},
	    template: _editarPage2.default,
	    controller: _editarPage4.default,
	    controllerAs: 'vm'
	};
	
	exports.default = EditarPage;

/***/ },
/* 612 */
/***/ function(module, exports) {

	module.exports = "<form name=\"vm.form\" autocomplete=\"off\" ng-submit=\"vm.onSubmit()\" novalidate autocomplete=\"off\">\n\n    <md-toolbar class=\"md-toolbar-grey\">\n        <div class=\"md-toolbar-tools\">\n            <span flex></span>\n\n            <md-button ui-sref=\"usuarios\" class=\"md-raised nd-default\">Cancelar</md-button>\n            <md-button md-theme=\"nexo\" type=\"submit\" class=\"md-raised md-primary\" ng-disabled=\"vm.submitting\">Guardar</md-button>\n        </div>\n    </md-toolbar>\n\n\n    <md-content layout=\"row\" layout-margin>\n        <div flex=\"50\" layout=\"column\">\n            <div class=\"md-nx-panel mb\"  md-whiteframe=\"1\">\n                <md-toolbar>\n                    <div class=\"md-toolbar-tools\">\n                        <h5>Información básica</h5>\n                    </div>\n                </md-toolbar>\n                <md-content layout=\"column\" layout-padding>\n                    <formly-form model=\"vm.model\" fields=\"vm.fields.basic\" form=\"vm.form\"></formly-form>\n                </md-content>\n            </div>\n\n            <div class=\"md-nx-panel\"  md-whiteframe=\"1\">\n                <md-toolbar>\n                    <div class=\"md-toolbar-tools\">\n                        <h5>Contraseña</h5>\n                    </div>\n                </md-toolbar>\n                <md-content layout=\"column\" layout-padding>\n                    <formly-form model=\"vm.model\" fields=\"vm.fields.password\" form=\"vm.form\"></formly-form>\n                </md-content>\n            </div>\n        </div>\n\n        <div flex=\"50\" layout=\"column\">\n            <div class=\"md-nx-panel mb\"  md-whiteframe=\"1\">\n                <md-toolbar>\n                    <div class=\"md-toolbar-tools\">\n                        <h5>Datos de contacto</h5>\n                    </div>\n                </md-toolbar>\n                <md-content layout=\"column\" layout-padding>\n                    <formly-form model=\"vm.model\" fields=\"vm.fields.contact\" form=\"vm.form\"></formly-form>\n                </md-content>\n            </div>\n\n            <div class=\"md-nx-panel\"  ng-show=\"vm.model.showTransportForm\" md-whiteframe=\"1\">\n                <md-toolbar>\n                    <div class=\"md-toolbar-tools\">\n                        <h5>Medios de transporte</h5>\n                    </div>\n                </md-toolbar>\n                <md-content layout=\"column\" layout-padding>\n                    <formly-form model=\"vm.model\" fields=\"vm.fields.transport\" form=\"vm.form\"></formly-form>\n                </md-content>\n            </div>\n        </div>\n    </md-content>\n</form>\n";

/***/ },
/* 613 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _classCallCheck2 = __webpack_require__(365);
	
	var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
	
	var _createClass2 = __webpack_require__(422);
	
	var _createClass3 = _interopRequireDefault(_createClass2);
	
	var _lodash = __webpack_require__(263);
	
	var _lodash2 = _interopRequireDefault(_lodash);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var CrearController = function () {
	    CrearController.$inject = ["$stateParams", "Store", "UserForm"];
	    function CrearController($stateParams, Store, UserForm) {
	        "ngInject";
	
	        (0, _classCallCheck3.default)(this, CrearController);
	        var vm = this;
	
	        vm.Store = Store;
	        vm.fields = UserForm;
	        vm.resourceName = 'user';
	
	        var item = Store.get(vm.resourceName, $stateParams.id),
	            itemPick = angular.copy(item);
	
	        itemPick.contact = item.contact.data;
	        itemPick.transports = item.transports.data;
	        itemPick.avatar = item.avatar.large;
	
	        vm.model = itemPick;
	    }
	
	    (0, _createClass3.default)(CrearController, [{
	        key: 'onSubmit',
	        value: function onSubmit() {
	            var vm = this;
	            var model = _lodash2.default.omit(vm.model, ['avatar']);
	
	            vm.Store.submit({
	                update: true,
	                form: vm.form,
	                resource: vm.resourceName,
	                data: model,
	                redirectTo: 'usuarios'
	            });
	        }
	    }]);
	    return CrearController;
	}();
	
	exports.default = CrearController;

/***/ },
/* 614 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 615 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _angularUiRouter = __webpack_require__(400);
	
	var _angularUiRouter2 = _interopRequireDefault(_angularUiRouter);
	
	var _servicios = __webpack_require__(616);
	
	var _servicios2 = _interopRequireDefault(_servicios);
	
	var _index = __webpack_require__(620);
	
	var _index2 = _interopRequireDefault(_index);
	
	var _index3 = __webpack_require__(625);
	
	var _index4 = _interopRequireDefault(_index3);
	
	var _index5 = __webpack_require__(630);
	
	var _index6 = _interopRequireDefault(_index5);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('servicios.page', [_angularUiRouter2.default, _index2.default.name, _index4.default.name, _index6.default.name]).config(["$stateProvider", function ($stateProvider) {
	    "ngInject";
	
	    $stateProvider.state({
	        name: 'servicios',
	        url: '/servicios',
	        component: 'serviciosPage',
	        ncyBreadcrumb: {
	            parent: 'dashboard',
	            label: 'PAGES.SERVICIOS.TITLE'
	        }
	    });
	}]).component('serviciosPage', _servicios2.default);

/***/ },
/* 616 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _serviciosPage = __webpack_require__(617);
	
	var _serviciosPage2 = _interopRequireDefault(_serviciosPage);
	
	var _serviciosPage3 = __webpack_require__(618);
	
	var _serviciosPage4 = _interopRequireDefault(_serviciosPage3);
	
	__webpack_require__(619);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var serviciosPage = {
	    restrict: 'E',
	    bindings: {},
	    template: _serviciosPage2.default,
	    controller: _serviciosPage4.default,
	    controllerAs: 'vm'
	};
	
	exports.default = serviciosPage;

/***/ },
/* 617 */
/***/ function(module, exports) {

	module.exports = "<nx-table options=\"vm.options\" resource=\"productCategory\"></nx-table>";

/***/ },
/* 618 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _classCallCheck2 = __webpack_require__(365);
	
	var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var ServiciosController = function ServiciosController() {
	    "ngInject";
	
	    (0, _classCallCheck3.default)(this, ServiciosController);
	    var vm = this;
	
	    vm.options = {
	        resource: 'service',
	        locale: {
	            page: 'SERVICIOS'
	        },
	        columns: [{
	            name: 'NOMBRE',
	            orderBy: 'name'
	        }, {
	            name: 'TIEMPO_DE_RESPUESTA',
	            value: 'response_time',
	            orderBy: 'avg_response_time'
	        }, {
	            name: 'ASIGNACIONES',
	            value: 'services_count'
	        }, {
	            name: 'Modificado',
	            orderBy: 'updated_at',
	            value: 'updated_at.date',
	            filter: 'amTimeAgo'
	        }],
	        actions: {
	            create: 'servicios.crear',
	            edit: 'servicios.editar',
	            import: 'servicios.importar'
	        }
	    };
	};
	
	exports.default = ServiciosController;

/***/ },
/* 619 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 620 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _angularUiRouter = __webpack_require__(400);
	
	var _angularUiRouter2 = _interopRequireDefault(_angularUiRouter);
	
	var _importar = __webpack_require__(621);
	
	var _importar2 = _interopRequireDefault(_importar);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('importar.page', [_angularUiRouter2.default]).config(["$stateProvider", function ($stateProvider) {
	    "ngInject";
	
	    $stateProvider.state({
	        name: 'servicios.importar',
	        url: '/importar',
	        views: {
	            "@": {
	                component: 'serviciosImportarPage'
	            }
	        },
	        ncyBreadcrumb: {
	            label: 'Importar servicios'
	        }
	    });
	}]).component('serviciosImportarPage', _importar2.default);

/***/ },
/* 621 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _importarPage = __webpack_require__(622);
	
	var _importarPage2 = _interopRequireDefault(_importarPage);
	
	var _importarPage3 = __webpack_require__(623);
	
	var _importarPage4 = _interopRequireDefault(_importarPage3);
	
	__webpack_require__(624);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var importarPage = {
	    restrict: 'E',
	    bindings: {},
	    template: _importarPage2.default,
	    controller: _importarPage4.default,
	    controllerAs: 'vm'
	};
	
	exports.default = importarPage;

/***/ },
/* 622 */
/***/ function(module, exports) {

	module.exports = "<nx-import resource=\"vm.resource\" redirect-to=\"vm.redirectTo\">\n\n    <nx-import-header class=\"md-toolbar-tools\">\n        <h4>\n            <span>Importación de servicios</span>\n        </h4>\n        <span flex></span>\n\n        <md-button ui-sref=\"servicios\" class=\"md-raised nd-default\">Cancelar</md-button>\n    </nx-import-header>\n\n    <nx-import-instructions>\n        <div class=\"md-body-1\" layout=\"row\" layout-sm=\"column\" layout-wrap layout-fill layout-padding layout-align=\"center center\" flex>\n            <div flex>\n                <p>Descargue el archivo guía para realizar la importación de manera correcta. Recomendamos no alterar el nombre o la posición de las columnas.</p>\n            </div>\n\n            <div flex>\n                <md-button ng-href=\"{{ vm.files.guide }}\" class=\"md-raised\" target=\"_blank\">\n                    <i class=\"fa fa-arrow-down\"></i>\n                    Descargar archivo guia\n                </md-button>\n            </div>\n        </div>\n    </nx-import-instructions>\n</nx-import>\n";

/***/ },
/* 623 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _classCallCheck2 = __webpack_require__(365);
	
	var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var ImportarController = function ImportarController(NEXO) {
	    "ngInject";
	
	    (0, _classCallCheck3.default)(this, ImportarController);
	    var vm = this;
	
	    vm.files = {
	        guide: NEXO.export_guides_url + '/services'
	    };
	    vm.resource = 'service';
	    vm.redirectTo = 'servicios';
	};
	ImportarController.$inject = ["NEXO"];
	
	exports.default = ImportarController;

/***/ },
/* 624 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 625 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _angularUiRouter = __webpack_require__(400);
	
	var _angularUiRouter2 = _interopRequireDefault(_angularUiRouter);
	
	var _crear = __webpack_require__(626);
	
	var _crear2 = _interopRequireDefault(_crear);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('servicios.crear.page', [_angularUiRouter2.default]).config(["$stateProvider", function ($stateProvider) {
	    "ngInject";
	
	    $stateProvider.state({
	        name: 'servicios.crear',
	        url: '/crear',
	        views: {
	            "@": {
	                component: 'serviciosCrearPage'
	            }
	        },
	        ncyBreadcrumb: {
	            label: 'Crear'
	        }
	    });
	}]).component('serviciosCrearPage', _crear2.default);

/***/ },
/* 626 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _crearPage = __webpack_require__(627);
	
	var _crearPage2 = _interopRequireDefault(_crearPage);
	
	var _crearPage3 = __webpack_require__(628);
	
	var _crearPage4 = _interopRequireDefault(_crearPage3);
	
	__webpack_require__(629);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var crearPage = {
	    restrict: 'E',
	    bindings: {},
	    template: _crearPage2.default,
	    controller: _crearPage4.default,
	    controllerAs: 'vm'
	};
	
	exports.default = crearPage;

/***/ },
/* 627 */
/***/ function(module, exports) {

	module.exports = "<form name=\"vm.form\" autocomplete=\"off\" ng-submit=\"vm.onSubmit()\" novalidate autocomplete=\"off\">\n\n    <md-toolbar class=\"md-toolbar-grey\">\n        <div class=\"md-toolbar-tools\">\n            <span flex></span>\n\n            <md-button md-theme=\"nexo\" type=\"submit\" class=\"md-raised md-primary\">Guardar</md-button>\n            <md-button ui-sref=\"productos.categorias\" class=\"md-raised nd-default\">Cancelar</md-button>\n        </div>\n    </md-toolbar>\n\n\n    <md-content layout=\"row\" layout-padding>\n        <div flex=\"50\">\n            <h3 class=\"panel-title\">Información básica</h3>\n            <formly-form model=\"vm.model\" fields=\"vm.fields.basic\" form=\"vm.form\"></formly-form>\n        </div>\n    </md-content>\n</form>";

/***/ },
/* 628 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _classCallCheck2 = __webpack_require__(365);
	
	var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
	
	var _createClass2 = __webpack_require__(422);
	
	var _createClass3 = _interopRequireDefault(_createClass2);
	
	var _store = __webpack_require__(352);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var CrearController = function () {
	    CrearController.$inject = ["$state", "Store", "ServiceForm"];
	    function CrearController($state, Store, ServiceForm) {
	        "ngInject";
	
	        (0, _classCallCheck3.default)(this, CrearController);
	        var vm = this;
	
	        vm.$state = $state;
	        vm.Store = Store;
	        vm.fields = ServiceForm;
	        vm.model = {};
	    }
	
	    (0, _createClass3.default)(CrearController, [{
	        key: 'onSubmit',
	        value: function onSubmit() {
	            var vm = this;
	
	            vm.model.avg_response_time = vm.model.hours + ':' + vm.model.mins;
	
	            vm.Store.submit({
	                form: vm.form,
	                resource: 'service',
	                data: vm.model,
	                redirectTo: 'servicios'
	            });
	        }
	    }]);
	    return CrearController;
	}();
	
	exports.default = CrearController;

/***/ },
/* 629 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 630 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _angularUiRouter = __webpack_require__(400);
	
	var _angularUiRouter2 = _interopRequireDefault(_angularUiRouter);
	
	var _editar = __webpack_require__(631);
	
	var _editar2 = _interopRequireDefault(_editar);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('servicios.editar.page', [_angularUiRouter2.default]).config(["$stateProvider", function ($stateProvider) {
	    "ngInject";
	
	    $stateProvider.state({
	        name: 'servicios.editar',
	        url: '/editar/:id',
	        views: {
	            "@": {
	                component: 'serviciosEditarPage'
	            }
	        },
	        ncyBreadcrumb: {
	            label: 'Editar {{$resolve.item.name}}'
	        },
	        resolve: {
	            item: /*@ngInject*/["Store", "$stateParams", function item(Store, $stateParams) {
	                return Store.find('service', $stateParams.id).then(function (response) {
	                    return response;
	                });
	            }]
	        }
	    });
	}]).component('serviciosEditarPage', _editar2.default);

/***/ },
/* 631 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _editarPage = __webpack_require__(632);
	
	var _editarPage2 = _interopRequireDefault(_editarPage);
	
	var _editarPage3 = __webpack_require__(633);
	
	var _editarPage4 = _interopRequireDefault(_editarPage3);
	
	__webpack_require__(634);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var EditarPage = {
	    restrict: 'E',
	    bindings: {},
	    template: _editarPage2.default,
	    controller: _editarPage4.default,
	    controllerAs: 'vm'
	};
	
	exports.default = EditarPage;

/***/ },
/* 632 */
/***/ function(module, exports) {

	module.exports = "<form name=\"vm.form\" autocomplete=\"off\" ng-submit=\"vm.onSubmit()\" novalidate autocomplete=\"off\">\n\n    <md-toolbar class=\"md-toolbar-grey\">\n        <div class=\"md-toolbar-tools\">\n            <span flex></span>\n\n            <md-button md-theme=\"nexo\" type=\"submit\" class=\"md-raised md-primary\">Guardar</md-button>\n            <md-button ui-sref=\"productos.categorias\" class=\"md-raised nd-default\">Cancelar</md-button>\n        </div>\n    </md-toolbar>\n\n\n    <md-content layout=\"row\" layout-padding>\n        <div flex=\"50\">\n            <h3 class=\"panel-title\">Información básica</h3>\n            <formly-form model=\"vm.model\" fields=\"vm.fields.basic\" form=\"vm.form\"></formly-form>\n        </div>\n    </md-content>\n</form>\n";

/***/ },
/* 633 */
/***/ function(module, exports, __webpack_require__) {

	"use strict";
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _classCallCheck2 = __webpack_require__(365);
	
	var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
	
	var _createClass2 = __webpack_require__(422);
	
	var _createClass3 = _interopRequireDefault(_createClass2);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var CrearController = function () {
	    CrearController.$inject = ["$scope", "$stateParams", "Store", "ServiceForm"];
	    function CrearController($scope, $stateParams, Store, ServiceForm) {
	        "ngInject";
	
	        (0, _classCallCheck3.default)(this, CrearController);
	        var vm = this;
	
	        vm.Store = Store;
	        vm.fields = ServiceForm;
	        vm.resourceName = 'service';
	        vm.model = Store.get(vm.resourceName, $stateParams.id);
	
	        var time = void 0;
	        if (!_.isEmpty(vm.model) && vm.model.avg_response_time) {
	            time = vm.model.avg_response_time.split(":");
	            vm.model.hours = time[0];
	            vm.model.mins = time[1];
	        }
	    }
	
	    (0, _createClass3.default)(CrearController, [{
	        key: "onSubmit",
	        value: function onSubmit() {
	            var vm = this;
	
	            vm.model.avg_response_time = vm.model.hours + ':' + vm.model.mins;
	
	            vm.Store.submit({
	                update: true,
	                form: vm.form,
	                resource: vm.resourceName,
	                data: vm.model,
	                redirectTo: 'servicios'
	            });
	        }
	    }]);
	    return CrearController;
	}();
	
	exports.default = CrearController;

/***/ },
/* 634 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 635 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _angularUiRouter = __webpack_require__(400);
	
	var _angularUiRouter2 = _interopRequireDefault(_angularUiRouter);
	
	var _lenguajes = __webpack_require__(636);
	
	var _lenguajes2 = _interopRequireDefault(_lenguajes);
	
	__webpack_require__(640);
	
	__webpack_require__(641);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('lenguajes.page', [_angularUiRouter2.default, 'angular-json-editor']).config(["$stateProvider", function ($stateProvider) {
	    "ngInject";
	
	    $stateProvider.state({
	        name: 'lenguajes',
	        url: '/lenguajes',
	        views: {
	            "@": {
	                component: 'lenguajesPage'
	            }
	        },
	        ncyBreadcrumb: {
	            label: 'Lenguajes'
	        }
	    });
	}]).component('lenguajesPage', _lenguajes2.default);

/***/ },
/* 636 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _lenguajesPage = __webpack_require__(637);
	
	var _lenguajesPage2 = _interopRequireDefault(_lenguajesPage);
	
	var _lenguajesPage3 = __webpack_require__(638);
	
	var _lenguajesPage4 = _interopRequireDefault(_lenguajesPage3);
	
	__webpack_require__(639);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var lenguajesPage = {
	    restrict: 'E',
	    bindings: {},
	    template: _lenguajesPage2.default,
	    controller: _lenguajesPage4.default,
	    controllerAs: 'vm'
	};
	
	exports.default = lenguajesPage;

/***/ },
/* 637 */
/***/ function(module, exports) {

	module.exports = "<md-toolbar class=\"md-toolbar-grey md-table-toolbar\">\n    <div class=\"md-toolbar-tools\">\n\n\n        <h3><span>Configuración de lenguajes</span></h3>\n\n        <span flex></span>\n\n        <md-button md-theme=\"nexo\"  class=\"md-raised md-secondary\">\n            Guardar\n        </md-button>\n    </div>\n</md-toolbar>\n\n\n<md-content>\n    <json-editor schema=\"[{1:1}]\" on-change=\"onChange()\">\n</md-content>";

/***/ },
/* 638 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _classCallCheck2 = __webpack_require__(365);
	
	var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var LenguajesController = function LenguajesController(Store) {
	    "ngInject";
	
	    (0, _classCallCheck3.default)(this, LenguajesController);
	    var vm = this;
	
	    vm.name = 'lenguajes';
	
	    Store.findAll('langs', {}).then(function (response) {
	        vm.schema = response.data[0].content;
	    });
	
	    // php artisan make:entity Lang --fillable="name:string,code:string,content:longText" --rules="name=>required,code=>required,content=>required"
	};
	LenguajesController.$inject = ["Store"];
	
	exports.default = LenguajesController;

/***/ },
/* 639 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 640 */,
/* 641 */,
/* 642 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _angularUiRouter = __webpack_require__(400);
	
	var _angularUiRouter2 = _interopRequireDefault(_angularUiRouter);
	
	var _encuestas = __webpack_require__(643);
	
	var _encuestas2 = _interopRequireDefault(_encuestas);
	
	var _index = __webpack_require__(647);
	
	var _index2 = _interopRequireDefault(_index);
	
	var _index3 = __webpack_require__(652);
	
	var _index4 = _interopRequireDefault(_index3);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('encuestas.page', [_angularUiRouter2.default, _index2.default.name,
	/*importarPage.name,*/
	_index4.default.name]).config(["$stateProvider", function ($stateProvider) {
	    "ngInject";
	
	    $stateProvider.state({
	        name: 'encuestas',
	        url: '/encuestas',
	        component: 'encuestasPage',
	        ncyBreadcrumb: {
	            parent: 'dashboard',
	            label: 'Encuestas'
	        }
	    });
	}]).component('encuestasPage', _encuestas2.default);
	/*import importarPage from './importar/index';*/

/***/ },
/* 643 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _encuestasPage = __webpack_require__(644);
	
	var _encuestasPage2 = _interopRequireDefault(_encuestasPage);
	
	var _encuestasPage3 = __webpack_require__(645);
	
	var _encuestasPage4 = _interopRequireDefault(_encuestasPage3);
	
	__webpack_require__(646);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var encuestasPage = {
	    restrict: 'E',
	    bindings: {},
	    template: _encuestasPage2.default,
	    controller: _encuestasPage4.default,
	    controllerAs: 'vm'
	};
	
	exports.default = encuestasPage;

/***/ },
/* 644 */
/***/ function(module, exports) {

	module.exports = "<nx-table options=\"vm.options\" resource=\"poll\"></nx-table>\n";

/***/ },
/* 645 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _classCallCheck2 = __webpack_require__(365);
	
	var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var EncuestasController = function EncuestasController() {
	    "ngInject";
	
	    (0, _classCallCheck3.default)(this, EncuestasController);
	    var vm = this;
	
	    vm.options = {
	        resource: 'poll',
	        locale: {
	            page: 'ENCUESTAS'
	        },
	        columns: [{
	            name: 'NOMBRE',
	            orderBy: 'name'
	        }, {
	            name: 'Estado',
	            value: 'is_active_text',
	            orderBy: 'is_active'
	        }, {
	            name: 'Creado',
	            orderBy: 'created_at',
	            value: 'created_at.date',
	            filter: 'amTimeAgo'
	        }, {
	            name: 'Modificado',
	            orderBy: 'updated_at',
	            value: 'updated_at.date',
	            filter: 'amTimeAgo'
	        }],
	        actions: {
	            create: 'encuestas.crear',
	            edit: 'encuestas.editar',
	            import: 'encuestas.importar'
	        }
	    };
	};
	
	exports.default = EncuestasController;

/***/ },
/* 646 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 647 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _angularUiRouter = __webpack_require__(400);
	
	var _angularUiRouter2 = _interopRequireDefault(_angularUiRouter);
	
	var _crear = __webpack_require__(648);
	
	var _crear2 = _interopRequireDefault(_crear);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('encuestas.crear.page', [_angularUiRouter2.default]).config(["$stateProvider", function ($stateProvider) {
	    "ngInject";
	
	    $stateProvider.state({
	        name: 'encuestas.crear',
	        url: '/crear',
	        views: {
	            "@": {
	                component: 'encuestasCrearPage'
	            }
	        },
	        ncyBreadcrumb: {
	            label: 'Crear'
	        }
	    });
	}]).component('encuestasCrearPage', _crear2.default);

/***/ },
/* 648 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _crearPage = __webpack_require__(649);
	
	var _crearPage2 = _interopRequireDefault(_crearPage);
	
	var _crearPage3 = __webpack_require__(650);
	
	var _crearPage4 = _interopRequireDefault(_crearPage3);
	
	__webpack_require__(651);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var crearPage = {
	    restrict: 'E',
	    bindings: {},
	    template: _crearPage2.default,
	    controller: _crearPage4.default,
	    controllerAs: 'vm'
	};
	
	exports.default = crearPage;

/***/ },
/* 649 */
/***/ function(module, exports) {

	module.exports = "<form name=\"vm.form\" autocomplete=\"off\" ng-submit=\"vm.onSubmit()\" novalidate autocomplete=\"off\">\n\n    <md-toolbar class=\"md-toolbar-grey\">\n        <div class=\"md-toolbar-tools\">\n            <span flex></span>\n\n            <md-button md-theme=\"nexo\" type=\"submit\" class=\"md-raised md-primary\">Guardar</md-button>\n            <md-button ui-sref=\"productos.categorias\" class=\"md-raised nd-default\">Cancelar</md-button>\n        </div>\n    </md-toolbar>\n\n\n    <md-content layout=\"row\" layout-padding>\n        <div flex=\"50\">\n            <h3 class=\"panel-title\">Información básica</h3>\n            <formly-form model=\"vm.model\" fields=\"vm.fields.basic\" form=\"vm.form\"></formly-form>\n        </div>\n    </md-content>\n</form>";

/***/ },
/* 650 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _classCallCheck2 = __webpack_require__(365);
	
	var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
	
	var _createClass2 = __webpack_require__(422);
	
	var _createClass3 = _interopRequireDefault(_createClass2);
	
	var _store = __webpack_require__(352);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var CrearController = function () {
	    CrearController.$inject = ["$state", "Store", "PollForm"];
	    function CrearController($state, Store, PollForm) {
	        "ngInject";
	
	        (0, _classCallCheck3.default)(this, CrearController);
	        var vm = this;
	
	        vm.$state = $state;
	        vm.Store = Store;
	        vm.fields = PollForm;
	        vm.model = {};
	    }
	
	    (0, _createClass3.default)(CrearController, [{
	        key: 'onSubmit',
	        value: function onSubmit() {
	            var vm = this;
	
	            vm.Store.submit({
	                form: vm.form,
	                resource: 'poll',
	                data: vm.model,
	                redirectTo: 'encuestas'
	            });
	        }
	    }]);
	    return CrearController;
	}();
	
	exports.default = CrearController;

/***/ },
/* 651 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 652 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _angularUiRouter = __webpack_require__(400);
	
	var _angularUiRouter2 = _interopRequireDefault(_angularUiRouter);
	
	var _editar = __webpack_require__(653);
	
	var _editar2 = _interopRequireDefault(_editar);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('encuestas.editar.page', [_angularUiRouter2.default]).config(["$stateProvider", function ($stateProvider) {
	    "ngInject";
	
	    $stateProvider.state({
	        name: 'encuestas.editar',
	        url: '/editar/:id',
	        views: {
	            "@": {
	                component: 'encuestasEditarPage'
	            }
	        },
	        ncyBreadcrumb: {
	            label: 'Editar {{$resolve.item.name}}'
	        },
	        resolve: {
	            item: /*@ngInject*/["Store", "$stateParams", function item(Store, $stateParams) {
	                return Store.find('poll', $stateParams.id, { params: { include: 'questions' }, t: _.now() }).then(function (response) {
	                    return response;
	                });
	            }]
	        }
	    });
	}]).component('encuestasEditarPage', _editar2.default);

/***/ },
/* 653 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _editarPage = __webpack_require__(654);
	
	var _editarPage2 = _interopRequireDefault(_editarPage);
	
	var _editarPage3 = __webpack_require__(655);
	
	var _editarPage4 = _interopRequireDefault(_editarPage3);
	
	__webpack_require__(656);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var EditarPage = {
	    restrict: 'E',
	    bindings: {},
	    template: _editarPage2.default,
	    controller: _editarPage4.default,
	    controllerAs: 'vm'
	};
	
	exports.default = EditarPage;

/***/ },
/* 654 */
/***/ function(module, exports) {

	module.exports = "<form name=\"vm.form\" autocomplete=\"off\" ng-submit=\"vm.onSubmit()\" novalidate autocomplete=\"off\">\n\n    <md-toolbar class=\"md-toolbar-grey\">\n        <div class=\"md-toolbar-tools\">\n            <span flex></span>\n\n            <md-button md-theme=\"nexo\" type=\"submit\" class=\"md-raised md-primary\">Guardar</md-button>\n            <md-button ui-sref=\"productos.categorias\" class=\"md-raised nd-default\">Cancelar</md-button>\n        </div>\n    </md-toolbar>\n\n\n    <md-content layout=\"row\" layout-padding>\n        <div flex=\"50\">\n            <h3 class=\"panel-title\">Información básica</h3>\n            <formly-form model=\"vm.model\" fields=\"vm.fields.basic\" form=\"vm.form\"></formly-form>\n        </div>\n    </md-content>\n</form>\n";

/***/ },
/* 655 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _classCallCheck2 = __webpack_require__(365);
	
	var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
	
	var _createClass2 = __webpack_require__(422);
	
	var _createClass3 = _interopRequireDefault(_createClass2);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var CrearController = function () {
	    CrearController.$inject = ["$scope", "$stateParams", "Store", "PollForm"];
	    function CrearController($scope, $stateParams, Store, PollForm) {
	        "ngInject";
	
	        (0, _classCallCheck3.default)(this, CrearController);
	        var vm = this;
	
	        vm.Store = Store;
	        vm.fields = PollForm;
	        vm.resourceName = 'poll';
	        vm.model = Store.get(vm.resourceName, $stateParams.id);
	
	        if (vm.model.questions) {
	            vm.model.questions = vm.model.questions.data;
	            angular.forEach(vm.model.questions, function (value, key) {
	                if (value.options) {
	                    value.options = value.options.data;
	                }
	            });
	        }
	    }
	
	    (0, _createClass3.default)(CrearController, [{
	        key: 'onSubmit',
	        value: function onSubmit() {
	            var vm = this;
	
	            vm.Store.submit({
	                update: true,
	                form: vm.form,
	                resource: vm.resourceName,
	                data: vm.model,
	                redirectTo: 'encuestas'
	            });
	        }
	    }]);
	    return CrearController;
	}();
	
	exports.default = CrearController;

/***/ },
/* 656 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 657 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _noSpace = __webpack_require__(658);
	
	var _humanizeDoc = __webpack_require__(659);
	
	var _directiveBrackets = __webpack_require__(660);
	
	var _use = __webpack_require__(661);
	
	var _picker = __webpack_require__(662);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('app.filters', []).filter('nospace', _noSpace.NoSpaceFilter).filter('humanizeDoc', _humanizeDoc.HumanizeDocFilter).filter('directiveBrackets', _directiveBrackets.DirectiveBracketsFilter).filter('directiveBrackets', _directiveBrackets.DirectiveBracketsFilter).filter('useFilter', _use.UseFilter).filter('picker', _picker.PickerFilter);

/***/ },
/* 658 */
/***/ function(module, exports) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	exports.NoSpaceFilter = NoSpaceFilter;
	function NoSpaceFilter() {
	    return function (value) {
	        return !value ? '' : value.replace(/ /g, '');
	    };
	}

/***/ },
/* 659 */
/***/ function(module, exports) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	exports.HumanizeDocFilter = HumanizeDocFilter;
	function HumanizeDocFilter() {
	    return function (doc) {
	        if (!doc) return;
	        if (doc.type === 'directive') {
	            return doc.name.replace(/([A-Z])/g, function ($1) {
	                return '-' + $1.toLowerCase();
	            });
	        }
	        return doc.label || doc.name;
	    };
	}

/***/ },
/* 660 */
/***/ function(module, exports) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	exports.DirectiveBracketsFilter = DirectiveBracketsFilter;
	function DirectiveBracketsFilter() {
	    return function (str) {
	        if (str.indexOf('-') > -1) {
	            return '<' + str + '>';
	        }
	        return str;
	    };
	}

/***/ },
/* 661 */
/***/ function(module, exports) {

	"use strict";
	
	UseFilter.$inject = ["$filter"];
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	exports.UseFilter = UseFilter;
	function UseFilter($filter) {
	    "ngInject";
	
	    return function () {
	        var filterName = [].splice.call(arguments, 1, 1)[0];
	        return $filter(filterName).apply(null, arguments);
	    };
	}

/***/ },
/* 662 */
/***/ function(module, exports) {

	'use strict';
	
	PickerFilter.$inject = ["$interpolate"];
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	exports.PickerFilter = PickerFilter;
	function PickerFilter($interpolate) {
	    "ngInject";
	
	    return function (item, name) {
	        var result = $interpolate('{{value | ' + arguments[1] + '}}');
	        return result({ value: arguments[0] });
	    };
	}

/***/ },
/* 663 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _page = __webpack_require__(664);
	
	var _page2 = _interopRequireDefault(_page);
	
	var _dialogs = __webpack_require__(665);
	
	var _dialogs2 = _interopRequireDefault(_dialogs);
	
	var _toast = __webpack_require__(666);
	
	var _toast2 = _interopRequireDefault(_toast);
	
	var _store = __webpack_require__(667);
	
	var _store2 = _interopRequireDefault(_store);
	
	var _firebase = __webpack_require__(668);
	
	var _firebase2 = _interopRequireDefault(_firebase);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('app.services', [_page2.default.name, _toast2.default.name, _dialogs2.default.name, _store2.default.name, _firebase2.default.name]);

/***/ },
/* 664 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Page.$inject = ["$rootScope"];
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('app.services.page', []).factory('Page', Page);
	
	
	function Page($rootScope) {
	    "ngInject";
	
	    var title = void 0;
	
	    var service = {
	        title: getTitle,
	        setTitle: setTitle
	    };
	
	    return service;
	
	    function getTitle() {
	        return title;
	    }
	
	    function setTitle(newTitle) {
	        title = newTitle;
	        $rootScope.title = newTitle;
	    }
	}

/***/ },
/* 665 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Dialogs.$inject = ["$mdDialog"];
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('app.services.dialogs', []).factory('Dialogs', Dialogs);
	
	
	function Dialogs($mdDialog) {
	    "ngInject";
	
	    return { showAlert: showAlert };
	
	    function showAlert(options) {
	        var _options$title = options.title;
	        var title = _options$title === undefined ? 'Alerta' : _options$title;
	        var _options$content = options.content;
	        var content = _options$content === undefined ? 'Mensaje de alerta' : _options$content;
	        var _options$ok = options.ok;
	        var ok = _options$ok === undefined ? 'Entendido' : _options$ok;
	        var _options$theme = options.theme;
	        var theme = _options$theme === undefined ? 'nexo' : _options$theme;
	
	
	        var alert = $mdDialog.alert({
	            title: title,
	            textContent: content,
	            ok: ok,
	            theme: theme
	        });
	        $mdDialog.show(alert).finally(function () {
	            alert = undefined;
	        });
	    }
	}

/***/ },
/* 666 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Toasts.$inject = ["$mdToast"];
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('app.services.toasts', []).factory('Toasts', Toasts);
	
	
	function Toasts($mdToast) {
	    "ngInject";
	
	    return { showActionToast: showActionToast };
	
	    function showActionToast(options) {
	        var _options$content = options.content;
	        var content = _options$content === undefined ? '' : _options$content;
	        var _options$action = options.action;
	        var action = _options$action === undefined ? 'Ok' : _options$action;
	        var _options$highlight = options.highlight;
	        var highlight = _options$highlight === undefined ? false : _options$highlight;
	        var _options$position = options.position;
	        var position = _options$position === undefined ? 'top right' : _options$position;
	
	
	        var toast = $mdToast.simple().textContent(content).action(action).highlightAction(highlight).position(position);
	
	        $mdToast.show(toast).then(function () {
	            $mdToast.hide(toast);
	        });
	    }
	}

/***/ },
/* 667 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Store.$inject = ["$timeout", "$state", "Dialogs", "Toasts"];
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _store = __webpack_require__(352);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('app.services.store', []).factory('Store', Store);
	
	
	function Store($timeout, $state, Dialogs, Toasts) {
	    "ngInject";
	
	    return {
	        filter: filter,
	        get: get,
	        getAll: getAll,
	        find: find,
	        findAll: findAll,
	        onCreate: onCreate,
	        onUpdate: onUpdate,
	        submit: submit,
	        finishImport: finishImport,
	        destroy: destroy,
	        mapper: mapper
	    };
	
	    function filter(resourceName) {
	        var query = arguments.length <= 1 || arguments[1] === undefined ? {} : arguments[1];
	        var opts = arguments.length <= 2 || arguments[2] === undefined ? {} : arguments[2];
	
	        return _store.store.filter(resourceName, query, opts);
	    }
	
	    /**
	     * Obtener un recurso en memoria
	     *
	     * @param resourceName
	     * @param id
	     * @returns {*}
	     */
	    function get(resourceName, id) {
	        return _store.store.get(resourceName, id);
	    }
	
	    /**
	     * Obtener varios recursos en memoria
	     *
	     * @param resourceName
	     * @param keyList
	     * @returns {*}
	     */
	    function getAll(resourceName) {
	        var keyList = arguments.length <= 1 || arguments[1] === undefined ? {} : arguments[1];
	
	        return _store.store.getAll(resourceName, keyList);
	    }
	
	    /**
	     * Encontrar un item
	     *
	     * @param resourceName
	     * @param id
	     * @returns {*}
	     */
	    function find(resourceName, id) {
	        var opts = arguments.length <= 2 || arguments[2] === undefined ? {} : arguments[2];
	
	        return _store.store.find(resourceName, id, opts);
	    }
	
	    /**
	     * Obtener varios items
	     *
	     * @param resourceName
	     * @param params
	     * @returns {Mapper|*}
	     */
	    function findAll(resourceName) {
	        var params = arguments.length <= 1 || arguments[1] === undefined ? {} : arguments[1];
	
	        return _store.store.findAll(resourceName, params);
	    }
	
	    /**
	     * Crear recurso
	     *
	     * @param resourceName
	     * @param data
	     * @param resourceOptions
	     * @returns {*}
	     */
	    function onCreate(resourceName, data, resourceOptions) {
	        return _store.store.create(resourceName, data, resourceOptions);
	    }
	
	    /**
	     * Actualizar recurso
	     *
	     * @param resourceName
	     * @param id
	     * @param data
	     * @param resourceOptions
	     * @returns {*}
	     */
	    function onUpdate(resourceName, id, data, resourceOptions) {
	        return _store.store.update(resourceName, id, data, resourceOptions);
	    }
	
	    /**
	     * Subir un formulario de creación
	     *
	     * @param options
	     * @returns {*}
	     */
	    function submit(options) {
	        var _options$update = options.update;
	        var update = _options$update === undefined ? false : _options$update;
	        var _options$form = options.form;
	        var form = _options$form === undefined ? null : _options$form;
	        var _options$resource = options.resource;
	        var resource = _options$resource === undefined ? null : _options$resource;
	        var _options$data = options.data;
	        var data = _options$data === undefined ? {} : _options$data;
	        var _options$successMessa = options.successMessage;
	        var successMessage = _options$successMessa === undefined ? false : _options$successMessa;
	        var _options$redirectTo = options.redirectTo;
	        var redirectTo = _options$redirectTo === undefined ? 'dashboard' : _options$redirectTo;
	        var _options$redirectToPa = options.redirectToParams;
	        var redirectToParams = _options$redirectToPa === undefined ? {} : _options$redirectToPa;
	        var _options$redirectToOp = options.redirectToOptions;
	        var redirectToOptions = _options$redirectToOp === undefined ? {
	            reload: true
	        } : _options$redirectToOp;
	        var _options$submitting = options.submitting;
	        var submitting = _options$submitting === undefined ? false : _options$submitting;
	        var _options$resourceOpti = options.resourceOptions;
	        var resourceOptions = _options$resourceOpti === undefined ? {} : _options$resourceOpti;
	        var _options$onSuccess = options.onSuccess;
	        var onSuccess = _options$onSuccess === undefined ? function (response) {} : _options$onSuccess;
	        var _options$onError = options.onError;
	        var onError = _options$onError === undefined ? function (response) {} : _options$onError;
	
	
	        if (form.$valid) {
	
	            submitting = true;
	
	            var onSuccessSubmit = function onSuccessSubmit(response) {
	                var defaultMessage = 'El elemento "' + response.name + '" se ha creado.';
	
	                if (update) {
	                    defaultMessage = 'El elemento "' + response.name + '" se ha actualizado.';
	                }
	
	                Toasts.showActionToast({
	                    'content': !!successMessage ? successMessage : defaultMessage
	                });
	
	                $state.go(redirectTo, redirectToParams, redirectToOptions);
	
	                $timeout(function () {
	                    return submitting = false;
	                });
	
	                onSuccess(response);
	            };
	
	            var onErrorSubmit = function onErrorSubmit(response) {
	
	                var message = _.get(response, 'data.message', 'Hubo un error al intentar guardar');
	
	                Dialogs.showAlert({
	                    title: 'No se pudo guardar',
	                    content: message
	                });
	
	                $timeout(function () {
	                    return submitting = false;
	                });
	
	                onError(response);
	            };
	
	            if (update) {
	                return onUpdate(resource, data.id, data, resourceOptions).then(onSuccessSubmit, onErrorSubmit);
	            } else {
	                return onCreate(resource, data, resourceOptions).then(onSuccessSubmit, onErrorSubmit);
	            }
	        }
	
	        Dialogs.showAlert({
	            title: 'No se puede continuar',
	            content: 'Completa toda la información requerida para continuar con el proceso'
	        });
	    }
	
	    /**
	     * Eliminar recurso
	     *
	     * @param options
	     * @returns {*}
	     */
	    function destroy(options) {
	        var _options$resource2 = options.resource;
	        var resource = _options$resource2 === undefined ? null : _options$resource2;
	        var _options$data2 = options.data;
	        var data = _options$data2 === undefined ? {} : _options$data2;
	        var _options$successMessa2 = options.successMessage;
	        var successMessage = _options$successMessa2 === undefined ? 'Elemento eliminado correctamente' : _options$successMessa2;
	
	
	        var onSuccess = function onSuccess() {
	            Toasts.showActionToast({
	                content: successMessage
	            });
	        };
	
	        var onError = function onError(response) {
	            Dialogs.showAlert({
	                title: 'No se pudo eliminar',
	                content: 'Hubo un error al tratar de eliminar al elemento. Inténtelo de nuevo más tarde.'
	            });
	        };
	
	        return _store.store.destroy(resource, data.id).then(onSuccess, onError);
	    }
	
	    /**
	     * Finalizar importación
	     *
	     * @param mapper
	     * @param data
	     * @returns {*}
	     */
	    function finishImport(resourceName, data) {
	        return _store.store.getMapper(resourceName).finishImport(data);
	    }
	
	    /**
	     * Obtener mapper
	     *
	     * @param resourceName
	     * @returns {*|Mapper}
	     */
	    function mapper(resourceName) {
	        return _store.store.getMapper(resourceName);
	    }
	}

/***/ },
/* 668 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Firebase.$inject = ["$q", "$timeout"];
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _firebase = __webpack_require__(669);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('app.services.firebase', []).factory('Firebase', Firebase);
	
	
	function Firebase($q, $timeout) {
	    "ngInject";
	
	    return { team: team };
	
	    function team(id) {
	        var subPath = arguments.length <= 1 || arguments[1] === undefined ? "" : arguments[1];
	
	        return _firebase.database.ref('teams/' + id + '/' + subPath);
	    }
	}

/***/ },
/* 669 */
/***/ function(module, exports, __webpack_require__) {

	"use strict";
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	exports.database = undefined;
	
	__webpack_require__(670);
	
	// Initialize Firebase
	var config = {
	    apiKey: "AIzaSyC_rH9YkCqMr_oc8MzmIUKWQ0OW5tKasx8",
	    authDomain: "nexo-qa.firebaseapp.com",
	    databaseURL: "https://nexo-qa.firebaseio.com",
	    storageBucket: "nexo-qa.appspot.com"
	};
	
	firebase.initializeApp(config);
	
	firebase.auth().signInWithCustomToken(window.NEXO.firebaseToken).catch(function (error) {
	    // Handle Errors here.
	    var errorCode = error.code;
	    var errorMessage = error.message;
	});
	
	var database = exports.database = firebase.database();

/***/ },
/* 670 */,
/* 671 */,
/* 672 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	        value: true
	});
	
	var _angular = __webpack_require__(46);
	
	var _angular2 = _interopRequireDefault(_angular);
	
	var _angularFormly = __webpack_require__(264);
	
	var _angularFormly2 = _interopRequireDefault(_angularFormly);
	
	var _angularFormlyMaterial = __webpack_require__(266);
	
	var _angularFormlyMaterial2 = _interopRequireDefault(_angularFormlyMaterial);
	
	var _customer = __webpack_require__(673);
	
	var _customer2 = _interopRequireDefault(_customer);
	
	var _productCategory = __webpack_require__(674);
	
	var _productCategory2 = _interopRequireDefault(_productCategory);
	
	var _product = __webpack_require__(675);
	
	var _product2 = _interopRequireDefault(_product);
	
	var _team = __webpack_require__(676);
	
	var _team2 = _interopRequireDefault(_team);
	
	var _assign = __webpack_require__(677);
	
	var _assign2 = _interopRequireDefault(_assign);
	
	var _stats = __webpack_require__(678);
	
	var _stats2 = _interopRequireDefault(_stats);
	
	var _user = __webpack_require__(679);
	
	var _user2 = _interopRequireDefault(_user);
	
	var _service = __webpack_require__(680);
	
	var _service2 = _interopRequireDefault(_service);
	
	var _poll = __webpack_require__(681);
	
	var _poll2 = _interopRequireDefault(_poll);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = _angular2.default.module('app.forms', [_angularFormly2.default, _angularFormlyMaterial2.default]).factory('CustomerForm', _customer2.default).factory('ProductForm', _product2.default).factory('ProductCategoryForm', _productCategory2.default).factory('TeamForm', _team2.default).factory('AssignForm', _assign2.default).factory('UserForm', _user2.default).factory('StatsForm', _stats2.default).factory('PollForm', _poll2.default).factory('ServiceForm', _service2.default);

/***/ },
/* 673 */
/***/ function(module, exports) {

	'use strict';
	
	Form.$inject = ["NEXO", "$translate"];
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	exports.default = Form;
	function Form(NEXO, $translate) {
	    "ngInject";
	
	    var fields = {
	        basic: [{
	            key: 'first_name',
	            type: 'input',
	            templateOptions: {
	                label: $translate.instant('FORMS.CUSTOMER.NOMBRES'),
	                required: true
	            }
	        }, {
	            key: 'last_name',
	            type: 'input',
	            templateOptions: {
	                label: $translate.instant('FORMS.CUSTOMER.APELLIDOS'),
	                required: true
	            }
	        }, {
	            key: 'email',
	            type: 'input',
	            templateOptions: {
	                type: "text",
	                label: $translate.instant('FORMS.CUSTOMER.EMAIL'),
	                required: true
	            }
	        }, {
	            key: 'document_type',
	            type: 'select',
	            templateOptions: {
	                label: $translate.instant('FORMS.CUSTOMER.TIPO_DE_DOCUMENTO'),
	                required: true,
	                options: NEXO.documentTypes,
	                valueProp: 'slug'
	            }
	        }, {
	            key: 'document',
	            type: 'input',
	            templateOptions: {
	                label: $translate.instant('FORMS.CUSTOMER.DOCUMENTO'),
	                required: true
	            }
	        }],
	
	        addresses: [{
	            key: 'addresses',
	            type: 'repeatSection',
	            templateOptions: {
	                btnText: $translate.instant('FORMS.CUSTOMER.AGREGAR_OTRA_DIRECCION'),
	                label: $translate.instant('FORMS.CUSTOMER.DIRECCION'),
	                required: true,
	                fields: [{
	                    key: 'address',
	                    type: 'address',
	                    templateOptions: {
	                        label: $translate.instant('FORMS.CUSTOMER.DIRECCION'),
	                        required: true
	                    }
	                }, {
	                    key: 'observations',
	                    type: 'textarea',
	                    templateOptions: {
	                        label: 'Observaciones'
	                    }
	                }]
	            }
	        }],
	
	        phones: [{
	            key: 'phones',
	            type: 'repeatSection',
	            templateOptions: {
	                btnText: $translate.instant('FORMS.CUSTOMER.AGREGAR_OTRO_TELEFONO'),
	                label: $translate.instant('FORMS.CUSTOMER.TELEFONO'),
	                required: true,
	                fields: [{
	                    key: 'type',
	                    type: 'select',
	                    id: 'phone-type',
	                    templateOptions: {
	                        label: $translate.instant('FORMS.CUSTOMER.TIPO'),
	                        required: true,
	                        options: NEXO.phonesTypes,
	                        valueProp: 'slug'
	                    }
	                }, {
	                    key: 'phone',
	                    type: 'input',
	                    templateOptions: {
	                        label: $translate.instant('FORMS.CUSTOMER.TELEFONO'),
	                        required: true
	                    }
	                }]
	            }
	        }]
	    };
	
	    return fields;
	}

/***/ },
/* 674 */
/***/ function(module, exports) {

	'use strict';
	
	Form.$inject = ["$translate"];
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	exports.default = Form;
	function Form($translate) {
	    "ngInject";
	
	    return {
	        basic: [{
	            key: 'name',
	            type: 'input',
	            templateOptions: {
	                label: $translate.instant('FORMS.PRODUCT_CATEGORY.NOMBRE'),
	                required: true,
	                type: 'text'
	            }
	        }, {
	            key: 'description',
	            type: 'textarea',
	            templateOptions: {
	                label: $translate.instant('FORMS.PRODUCT_CATEGORY.DESCRIPCION')
	            }
	        }]
	    };
	}

/***/ },
/* 675 */
/***/ function(module, exports) {

	'use strict';
	
	Form.$inject = ["$translate"];
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	exports.default = Form;
	function Form($translate) {
	    "ngInject";
	
	    var metricts = [{
	        id: 'mm',
	        name: 'Milímetros'
	    }, {
	        id: 'cm',
	        name: 'Centímetros'
	    }, {
	        id: 'mt',
	        name: 'Metros'
	    }];
	
	    var fields = {
	        basic: [{
	            key: 'category_id',
	            type: 'select',
	            templateOptions: {
	                label: $translate.instant('FORMS.PRODUCT.CATEGORIA_DEL_PRODUCTO'),
	                valueProp: 'id',
	                labelProp: 'name',
	                options: [],
	                required: true
	            },
	            controller: /*@ngInject*/["$scope", "Store", function controller($scope, Store) {
	                $scope.to.options = Store.filter('productCategory');
	            }]
	        }, {
	            key: 'name',
	            type: 'input',
	            templateOptions: {
	                label: $translate.instant('FORMS.PRODUCT.NOMBRE'),
	                required: true,
	                type: 'text'
	            }
	        }, {
	            key: 'description',
	            type: 'textarea',
	            templateOptions: {
	                label: $translate.instant('FORMS.PRODUCT.DESCRIPCION')
	            }
	        }, {
	            key: 'SKU',
	            type: 'input',
	            templateOptions: {
	                label: $translate.instant('FORMS.PRODUCT.CODIGO')
	            }
	        }],
	        features: [{
	            elementAttributes: {
	                layout: 'row',
	                'layout-sm': 'column'
	            },
	            fieldGroup: [{
	                "className": "flex",
	                "type": "input",
	                "key": "weight",
	                "templateOptions": {
	                    label: $translate.instant('FORMS.PRODUCT.PESO'),
	                    required: true,
	                    type: 'number',
	                    min: 0.1
	                }
	            }, {
	                className: "flex",
	                type: 'select',
	                "key": "weight_unit",
	                "templateOptions": {
	                    label: $translate.instant('FORMS.PRODUCT.UNIDAD'),
	                    valueProp: 'id',
	                    labelProp: 'name',
	                    options: [{
	                        id: 'gr',
	                        name: 'Gramos'
	                    }, {
	                        id: 'lb',
	                        name: 'Libras'
	                    }, {
	                        id: 'kg',
	                        name: 'Kilos'
	                    }],
	                    required: true
	                }
	            }]
	        },
	        // Altura
	        {
	            elementAttributes: {
	                layout: 'row',
	                'layout-sm': 'column'
	            },
	            fieldGroup: [{
	                "className": "flex",
	                "type": "input",
	                "key": "height",
	                "templateOptions": {
	                    label: $translate.instant('FORMS.PRODUCT.ALTURA'),
	                    required: true,
	                    type: 'number',
	                    min: 0.1
	                }
	            }, {
	                className: "flex",
	                type: 'select',
	                "key": "height_unit",
	                "templateOptions": {
	                    label: $translate.instant('FORMS.PRODUCT.UNIDAD'),
	                    valueProp: 'id',
	                    labelProp: 'name',
	                    options: metricts,
	                    required: true
	                }
	            }]
	        },
	        // Ancho
	        {
	            elementAttributes: {
	                layout: 'row',
	                'layout-sm': 'column'
	            },
	            fieldGroup: [{
	                "className": "flex",
	                "type": "input",
	                "key": "width",
	                "templateOptions": {
	                    label: $translate.instant('FORMS.PRODUCT.ANCHO'),
	                    required: true,
	                    type: 'number',
	                    min: 0.1
	                }
	            }, {
	                className: "flex",
	                type: 'select',
	                "key": "width_unit",
	                "templateOptions": {
	                    label: $translate.instant('FORMS.PRODUCT.UNIDAD'),
	                    valueProp: 'id',
	                    labelProp: 'name',
	                    options: metricts,
	                    required: true
	                }
	            }]
	        },
	        // Profundidad
	        {
	            elementAttributes: {
	                layout: 'row',
	                'layout-sm': 'column'
	            },
	            fieldGroup: [{
	                "className": "flex",
	                "type": "input",
	                "key": "depth",
	                "templateOptions": {
	                    label: $translate.instant('FORMS.PRODUCT.PROFUNDIDAD'),
	                    required: true,
	                    type: 'number',
	                    min: 0.1
	                }
	            }, {
	                className: "flex",
	                type: 'select',
	                "key": "depth_unit",
	                "templateOptions": {
	                    label: $translate.instant('FORMS.PRODUCT.UNIDAD'),
	                    valueProp: 'id',
	                    labelProp: 'name',
	                    options: metricts,
	                    required: true
	                }
	            }]
	        }]
	    };
	
	    return fields;
	}

/***/ },
/* 676 */
/***/ function(module, exports) {

	'use strict';
	
	Form.$inject = ["$translate"];
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	exports.default = Form;
	function Form($translate) {
	    "ngInject";
	
	    var fields = {
	        basic: [{
	            key: 'logo',
	            type: 'image',
	            templateOptions: {
	                label: $translate.instant('FORMS.TEAM.LOGO'),
	                placeholder: $translate.instant('FORMS.TEAM.SELECCIONE_O_ARRASTRE_EL_LOGO')
	            }
	        }, {
	            key: 'status',
	            type: 'select',
	            templateOptions: {
	                label: $translate.instant('FORMS.TEAM.ESTADO'),
	                required: true,
	                valueProp: 'value',
	                labelProp: 'label',
	                options: [{
	                    value: 'inactive',
	                    label: $translate.instant('FORMS.TEAM.INACTIVA')
	                }, {
	                    value: 'active',
	                    label: $translate.instant('FORMS.TEAM.ACTIVA')
	                }]
	            },
	            defaultValue: 'active'
	        }, {
	            key: 'name',
	            type: 'input',
	            templateOptions: {
	                label: $translate.instant('FORMS.TEAM.NOMBRE'),
	                required: true
	            },
	            watcher: {
	                listener: function listener(f, newValue) {
	                    //console.log('W', newValue);
	                }
	            }
	        }, {
	            key: 'slug',
	            type: 'input',
	            templateOptions: {
	                label: $translate.instant('FORMS.TEAM.URL'),
	                required: true,
	                description: $translate.instant('FORMS.TEAM.NO_ESCRIBA_EL_DOMINIO'),
	                addonRight: {
	                    text: '.nexologistica.com'
	                }
	            }
	        }],
	
	        configuration: [{
	            key: 'modules',
	            type: 'checkboxes',
	            templateOptions: {
	                label: $translate.instant('FORMS.TEAM.MODULOS_ACTIVADOS'),
	                multiple: true,
	                labelProp: "name",
	                valueProp: "id",
	                options: []
	            },
	            controller: /*@ngInject*/["$scope", "Store", function controller($scope, Store) {
	                $scope.to.options = Store.getAll('module');
	            }]
	        }, {
	            template: '<div class="md-single-label">Límites por grupo</div>',
	            controller: /*@ngInject*/["$scope", "Store", function controller($scope, Store) {
	                var roles = Store.filter('role', {
	                    where: {
	                        for_team: true
	                    }
	                });
	
	                var unwatchModel = $scope.$watch('model.limits', function (limits) {
	                    if (_.isEmpty(limits)) {
	
	                        $scope.model.limits = [];
	
	                        roles.forEach(function (role) {
	                            $scope.model.limits.push({
	                                role_id: role.id,
	                                limit: 1
	                            });
	                        });
	                    }
	
	                    unwatchModel();
	                });
	
	                roles.forEach(function (role, index) {
	                    var key = 'limits[' + index + '].limit';
	
	                    if (!_.some(fields.configuration, { key: key })) {
	
	                        fields.configuration.push({
	                            key: key,
	                            type: 'input',
	                            templateOptions: {
	                                label: role.name,
	                                required: true,
	                                min: 1,
	                                type: 'number'
	                            },
	                            defaultValue: 1
	                        });
	                    }
	                });
	            }]
	        }],
	
	        rolesLimit: [{
	            key: 'roles_limits',
	            type: 'teamRolesLimit',
	            controller: '',
	            templateOptions: {
	                label: '',
	                fields: [{
	                    key: 'limit',
	                    type: 'input',
	                    templateOptions: {
	                        label: '',
	                        required: true
	                    }
	                }, {
	                    className: 'hide',
	                    key: 'role_id',
	                    type: 'input',
	                    templateOptions: {
	                        label: '',
	                        required: true
	                    }
	                }]
	
	            },
	            defaultValue: []
	        }]
	
	    };
	
	    return fields;
	}

/***/ },
/* 677 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Form.$inject = ["NEXO", "$translate"];
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	exports.default = Form;
	
	var _store = __webpack_require__(352);
	
	var _moment = __webpack_require__(156);
	
	var _moment2 = _interopRequireDefault(_moment);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var today = new Date();
	
	function Form(NEXO, $translate) {
	    "ngInject";
	
	    var showMap = false;
	
	    return {
	        step1: [{
	            key: 'customer_id',
	            type: 'autocomplete',
	            name: "customer",
	            templateOptions: {
	                label: 'FORMS.ASSIGN.BUSCAR_AL_CLIENTE',
	                required: true,
	                resourceName: 'customer',
	                resourceParams: {
	                    include: 'addresses'
	                },
	                resourceOptions: {
	                    with: ['addresses']
	                },
	                minLength: 0,
	                limit: 10,
	                labelProp: 'name',
	                valueProp: 'id'
	            },
	            controller: /*@ngInject*/["$scope", function controller($scope) {
	                $scope.$watch('model.customer_id', function (customerId) {
	                    $scope.model.customer = _store.store.get('customer', customerId);
	                });
	            }]
	        }, {
	            key: 'customer_address_id',
	            type: 'customerAddress',
	            templateOptions: {
	                label: '',
	                required: true
	            },
	            hideExpression: '!model.customer_id'
	        }],
	        // Step 2
	        step2: [{
	            key: 'with',
	            type: 'select',
	            templateOptions: {
	                label: 'FORMS.ASSIGN.TIPO_DE_ASIGNACION',
	                required: true,
	                valueProp: 'value',
	                labelProp: 'name',
	                options: NEXO.assignments_options.with
	            },
	            defaultValue: 'services'
	        },
	        // Cuando son servicios
	        {
	            hideExpression: 'model.with == "products"',
	            fieldGroup: [{
	                key: 'services',
	                type: 'multiselect',
	                templateOptions: {
	                    label: 'FORMS.ASSIGN.SERVICIOS',
	                    valueProp: 'id',
	                    labelProp: 'name_time',
	                    options: _store.store.filter('serviceType', {}),
	                    required: true
	                },
	                controller: /*@ngInject*/["$scope", "Store", "$timeout", function controller($scope, Store, $timeout) {
	                    $scope.$watch('model.services', function (servicesIds) {
	                        var services = Store.filter('serviceType', {
	                            where: {
	                                id: {
	                                    'in': servicesIds
	                                }
	                            }
	                        });
	
	                        // Settear services_data para resumen
	                        _.set($scope, 'model.services_data', services);
	
	                        // Si solo elige un servicio que la duración sea la del único servicio
	                        if (servicesIds.length <= 1) {
	                            if (!_.isEmpty(services)) {
	                                _.set($scope, 'model.duration', _.first(services).duration.minutes);
	                            }
	                        }
	                    }, true);
	                }],
	                defaultValue: []
	            }, {
	                key: 'duration',
	                type: 'select',
	                templateOptions: {
	                    label: 'Duración total',
	                    labelProp: "label",
	                    valueProp: "value",
	                    options: [],
	                    required: true,
	                    multiple: false
	                },
	                hideExpression: 'model.services.length <= 1',
	                controller: /*@ngInject*/["Store", "$scope", "$filter", function controller(Store, $scope, $filter) {
	                    //
	                    // Opciones para elegir si la duración es con el total o el máximo
	                    //
	                    $scope.$watch('model.services', function (servicesIds) {
	                        if (servicesIds) {
	                            var services = Store.filter('serviceType', {
	                                where: {
	                                    id: {
	                                        'in': servicesIds
	                                    }
	                                }
	                            });
	
	                            if (!_.isEmpty(services)) {
	
	                                var sumDuration = _.sumBy(services, 'duration.minutes'),
	                                    maxDuration = _.maxBy(services, 'duration.minutes').duration.minutes;
	
	                                $scope.to.options = [{
	                                    value: sumDuration,
	                                    label: $translate.instant('FORMS.ASSIGN.SERVICIOS_MISMO_TIEMPO', {
	                                        minutes: sumDuration
	                                    })
	                                    /*`Los servicios se ejecutarán uno a la vez (Duración ${sumDuration} minutos)`*/
	                                }, {
	                                    value: maxDuration,
	                                    label: $translate.instant('FORMS.ASSIGN.SERVICIOS_A_LA_VEZ', {
	                                        minutes: maxDuration
	                                    })
	                                    /*`Los servicios se ejecutarán todos a la vez (Duración ${maxDuration} minutos)`*/
	                                }];
	
	                                $scope.model[$scope.options.key] = sumDuration;
	                            }
	                        }
	                    });
	                }]
	            }]
	        },
	        // Cuando son productos
	        {
	            hideExpression: 'model.with == "services"',
	            fieldGroup: [{
	                key: 'duration',
	                type: 'input',
	                templateOptions: {
	                    label: 'Duración en minutos entregando los productos',
	                    required: true,
	                    type: 'number',
	                    min: 1
	                },
	                defaultValue: 15
	            }, {
	                key: 'products',
	                type: 'assign-products',
	                templateOptions: {
	                    label: ''
	                },
	                defaultValue: [],
	                controller: /*@ngInject*/["$scope", function controller($scope) {
	                    $scope.$watch('model.products', function (products) {
	                        var productsData = products.map(function (product) {
	                            return {
	                                quantity: product.quantity,
	                                product: _.get(product, 'product', product)
	                            };
	                        });
	
	                        _.set($scope, 'model.products_data', productsData);
	                    }, true);
	                }]
	            }]
	        }],
	        step3: [{
	            elementAttributes: {
	                layout: 'row',
	                'layout-sm': 'column'
	            },
	            fieldGroup: [{
	                key: 'date_type',
	                type: 'select',
	                elementAttributes: {
	                    flex: '50'
	                },
	                templateOptions: {
	                    label: 'FORMS.ASSIGN.TIPO_DE_PROGRAMACION',
	                    required: true,
	                    valueProp: 'value',
	                    labelProp: 'name',
	                    options: NEXO.assignments_options.dates
	                },
	                defaultValue: 'inmediate',
	                controller: /*@ngInject*/["Store", "$scope", function controller(Store, $scope) {
	                    $scope.$watchGroup(['model.date_type', 'model.duration'], function (nv) {
	                        var dateType = nv[0],
	                            duration = nv[1],
	                            now = (0, _moment2.default)(),
	                            unwatchRecurrence = void 0;
	
	                        if (dateType == 'recurrent') {
	                            if (_.isUndefined($scope.model.recurrence_start) && _.isUndefined($scope.model.recurrence_end)) {
	                                _.set($scope, 'model.recurrence_start', now.toDate());
	                                _.set($scope, 'model.recurrence_end', angular.copy(now).add(1, 'month').toDate());
	                            }
	
	                            // Observamos los modelos de recurrencia
	                            var recurrenceModelForWatch = ['model.recurrence_weekdays', 'model.recurrence_start', 'model.recurrence_end', 'model.recurrence_frequency', 'model.recurrence_monthday', 'model.recurrence_interval'];
	
	                            var _unwatchRecurrence = $scope.$watchGroup(recurrenceModelForWatch, function (nv) {
	
	                                // Setteando fechas para el inicio
	                                _.set($scope, 'model.start_at', $scope.model.recurrence_start);
	                                _.set($scope, 'model.end_at', (0, _moment2.default)($scope.model.recurrence_start).add($scope.model.duration, 'minutes').toDate());
	
	                                // Obteniendo las fechas recurrentes
	                                Store.mapper('assignment').calculateRecurrence($scope.model).then(function (response) {
	                                    $scope.$apply(function () {
	                                        $scope.model.recurrence_dates = response.data;
	                                    });
	                                });
	                            });
	                        } else {
	                            // Parar el watch de recurrencia para ahorrar memoria
	                            if (_.isFunction(unwatchRecurrence)) {
	                                unwatchRecurrence();
	                            }
	
	                            if (dateType == 'inmediate' && !!duration) {
	                                _.set($scope, 'model.start_at', now.toDate());
	                                _.set($scope, 'model.end_at', angular.copy(now).add($scope.model.duration, 'minutes').toDate());
	                            }
	                        }
	                    });
	                }]
	            }, {
	                key: 'assignment_type',
	                type: 'select',
	                elementAttributes: {
	                    flex: '50'
	                },
	                templateOptions: {
	                    label: 'FORMS.ASSIGN.TIPO_DE_ASIGNACION',
	                    required: true,
	                    valueProp: 'value',
	                    labelProp: 'name',
	                    options: NEXO.assignments_options.types
	                },
	                defaultValue: 'demand'
	            }]
	        },
	        // Date select
	        {
	            type: "datetime",
	            key: "start_at",
	            templateOptions: {
	                label: 'FORMS.ASSIGN.FECHA_Y_HORA_DE_EJECUCION',
	                required: true
	            },
	            hideExpression: 'model.date_type != "schedule"'
	        },
	        // Recurrent
	        {
	            hideExpression: 'model.date_type != "recurrent"',
	            fieldGroup: [{
	                elementAttributes: {
	                    layout: 'row',
	                    'layout-sm': 'column'
	                },
	                fieldGroup: [{
	                    className: 'flex',
	                    key: 'recurrence_frequency',
	                    type: 'select',
	                    templateOptions: {
	                        label: 'FORMS.ASSIGN.SE_REPITE',
	                        required: true,
	                        valueProp: 'value',
	                        labelProp: 'label',
	                        options: NEXO.assignments_options.frecuency
	                    },
	                    defaultValue: 'daily'
	                }, {
	                    className: 'flex',
	                    key: 'recurrence_interval',
	                    type: 'select',
	                    templateOptions: {
	                        label: 'FORMS.ASSIGN.REPETIR_CADA',
	                        required: true,
	                        valueProp: 'value',
	                        labelProp: 'label',
	                        options: []
	                    },
	                    controller: /*@ngInject*/["$scope", function controller($scope) {
	                        $scope.$watch('model.recurrence_frequency', function (frecuencyValue) {
	                            var frecuency = _.find(NEXO.assignments_options.frecuency, {
	                                value: frecuencyValue
	                            });
	                            $scope.to.options = _.range(1, 31).map(function (d) {
	                                return {
	                                    value: d,
	                                    label: d + ' ' + (d > 1 ? frecuency.multiple_label : frecuency.single_label)
	                                };
	                            });
	                        });
	                    }],
	                    defaultValue: 1,
	                    hideExpression: function hideExpression($viewValue, $modelValue, $scope) {
	                        var frecuency = _.find(NEXO.assignments_options.frecuency, {
	                            value: _.get($scope.model, 'recurrence_frequency')
	                        });
	                        return _.get(frecuency, 'hide_inverval', false);
	                    }
	                }]
	            }, {
	                key: 'recurrence_weekdays',
	                type: 'assign-days',
	                templateOptions: {
	                    label: '',
	                    required: true
	                },
	                defaultValue: [today.getDay()],
	                hideExpression: 'model.recurrence_frequency != "weekly"'
	            }, {
	
	                elementAttributes: {
	                    layout: 'row',
	                    'layout-sm': 'column'
	                },
	                fieldGroup: [{
	                    className: 'flex',
	                    key: 'recurrence_monthday',
	                    type: 'numeric',
	                    templateOptions: {
	                        label: 'FORMS.ASSIGN.REPETIR_CADA_DIA',
	                        required: true,
	                        min: 1,
	                        max: 31
	                    },
	                    defaultValue: today.getDay(),
	                    hideExpression: 'model.recurrence_frequency != "monthly"'
	                }, {
	                    type: "datetime",
	                    key: "recurrence_start",
	                    className: 'flex',
	                    templateOptions: {
	                        label: 'FORMS.ASSIGN.INICIAL_EL',
	                        required: true
	                    }
	                }, {
	                    type: "datetime",
	                    key: "recurrence_end",
	                    className: 'flex',
	                    templateOptions: {
	                        label: 'FORMS.ASSIGN.FINALIZA_EL',
	                        required: true,
	                        showTime: false
	                    }
	                }]
	            }]
	        },
	        // Users
	        {
	            key: 'users',
	            type: 'assign-users',
	            templateOptions: {
	                label: ''
	            },
	            defaultValue: []
	        }]
	    };
	}

/***/ },
/* 678 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Form.$inject = ["$translate"];
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	exports.default = Form;
	
	var _moment = __webpack_require__(156);
	
	var _moment2 = _interopRequireDefault(_moment);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var from = (0, _moment2.default)().subtract(3, 'months');
	var to = (0, _moment2.default)();
	
	function Form($translate) {
	    "ngInject";
	
	    return [{
	        elementAttributes: {
	            layout: 'row'
	        },
	        fieldGroup: [{
	            className: 'flex',
	            key: 'from',
	            type: 'datetime-picker',
	            templateOptions: {
	                label: $translate.instant('FORMS.STATS.FILTRAR_DESDE'),
	                required: true,
	                showTime: false,
	                format: 'YYYY-MM-DD'
	            },
	            defaultValue: from.toDate()
	        }, {
	            className: 'flex',
	            key: 'to',
	            type: 'datetime-picker',
	            templateOptions: {
	                label: $translate.instant('FORMS.STATS.FILTRAR_HASTA'),
	                required: true,
	                showTime: false,
	                format: 'YYYY-MM-DD',
	                minDate: from.toDate()
	            },
	            defaultValue: to.toDate(),
	            controller: /*@ngInject*/["$scope", function controller($scope) {
	                $scope.$watch('model.from', function (nv) {
	                    if (nv) {
	                        var nvDate = (0, _moment2.default)(nv);
	                        _.set($scope, 'to.minDate', nvDate.toDate());
	                    }
	                });
	            }]
	        }, {
	            className: 'flex',
	            key: 'group',
	            type: 'select',
	            templateOptions: {
	                label: $translate.instant('FORMS.STATS.AGRUPAR_POR'),
	                required: true,
	                valueProp: 'value',
	                labelProp: 'label',
	                options: [{
	                    value: 'day',
	                    label: $translate.instant('FORMS.STATS.DIAS')
	                }, {
	                    value: 'week',
	                    label: $translate.instant('FORMS.STATS.SEMANAS')
	                }, {
	                    value: 'month',
	                    label: $translate.instant('FORMS.STATS.MESES')
	                }]
	            },
	            defaultValue: 'week'
	        }]
	    }];
	}

/***/ },
/* 679 */
/***/ function(module, exports) {

	'use strict';
	
	Form.$inject = ["IS_TEAM", "$translate"];
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	exports.default = Form;
	function Form(IS_TEAM, $translate) {
	    "ngInject";
	
	    RoleFieldController.$inject = ["$scope", "Store"];
	    var confirmPasswordValidator = {
	        expression: function expression($viewValue, $modelValue, scope) {
	            var value;
	            value = $viewValue || $modelValue;
	            if (_.isEmpty(scope.model.password)) {
	                return true;
	            }
	            return _.isEqual(value, scope.model.password);
	        },
	        message: '"' + $translate.instant('FORMS.USER.LAS_CONTRASENAS_NO_COINCIDEN') + '"'
	    };
	
	    var fields = {
	        basic: [{
	            key: 'avatar',
	            type: 'image',
	            templateOptions: {
	                label: $translate.instant('FORMS.USER.IMAGEN'),
	                placeholder: $translate.instant('FORMS.USER.SELECCIONE_O_ARRASTRE_LA_IMAGEN')
	            }
	        }, {
	            key: 'role_id',
	            type: 'select',
	            templateOptions: {
	                label: $translate.instant('FORMS.USER.GRUPO'),
	                options: [],
	                valueProp: 'id',
	                labelProp: 'name',
	                required: true
	            },
	            controller: RoleFieldController
	        }, {
	            key: 'first_name',
	            type: 'input',
	            templateOptions: {
	                label: $translate.instant('FORMS.USER.NOMBRES'),
	                required: true
	            }
	        }, {
	            key: 'last_name',
	            type: 'input',
	            templateOptions: {
	                label: $translate.instant('FORMS.USER.APELLIDOS'),
	                required: true
	            }
	        }, {
	            key: 'email',
	            type: 'input',
	            templateOptions: {
	                label: $translate.instant('FORMS.USER.EMAIL'),
	                required: true,
	                type: 'email'
	            }
	        }, {
	            key: 'password',
	            type: 'input',
	            templateOptions: {
	                label: $translate.instant('FORMS.USER.CONTRASENA'),
	                required: true,
	                type: 'password'
	            },
	            expressionProperties: {
	                'templateOptions.required': '!model.id'
	            },
	            hideExpression: '!!model.id'
	        }, {
	            key: 'password_confirm',
	            type: 'input',
	            templateOptions: {
	                label: $translate.instant('FORMS.USER.CONFIRME_CONTRASENA'),
	                required: true,
	                type: 'password'
	            },
	            validators: {
	                confirm: confirmPasswordValidator
	            },
	            expressionProperties: {
	                'templateOptions.required': '!model.id'
	            },
	            hideExpression: '!!model.id'
	        }],
	        password: [{
	            key: 'password',
	            type: 'input',
	            templateOptions: {
	                label: $translate.instant('FORMS.USER.CONTRASENA'),
	                type: 'password'
	            }
	        }, {
	            key: 'password_confirm',
	            type: 'input',
	            templateOptions: {
	                label: $translate.instant('FORMS.USER.CONFIRME_CONTRASENA'),
	                type: 'password'
	            },
	            validators: {
	                confirm: confirmPasswordValidator
	            }
	        }],
	        contact: [{
	            key: 'contact',
	            type: 'repeatSection',
	            templateOptions: {
	                btnText: 'Agregar otro dato de contacto',
	                label: $translate.instant('FORMS.USER.DATO_DE_CONTACTO'),
	                required: true,
	                fields: [{
	                    key: 'type',
	                    type: 'select',
	                    id: 'contact-type',
	                    templateOptions: {
	                        label: $translate.instant('FORMS.USER.TIPO'),
	                        valueProp: 'value',
	                        labelProp: 'name',
	                        options: [{
	                            name: $translate.instant('FORMS.USER.DIRECCION'),
	                            value: 'direccion',
	                            icon: 'fa fa-building'
	                        }, {
	                            name: $translate.instant('FORMS.USER.TELEFONO_FIJO'),
	                            value: 'telefono-fijo',
	                            icon: 'fa fa-phone'
	                        }, {
	                            name: $translate.instant('FORMS.USER.TELEFONO_MOVIL'),
	                            value: 'telefono-movil',
	                            icon: 'fa fa-mobile'
	                        }]
	                    }
	                }, {
	                    key: 'value',
	                    type: 'input',
	                    templateOptions: {
	                        label: $translate.instant('FORMS.USER.DATO_DE_CONTACTO'),
	                        required: true
	                    }
	                }]
	            }
	        }],
	        transport: [{
	            key: 'transports',
	            type: 'repeatSection',
	            hideExpression: '!model.showTransportForm',
	            templateOptions: {
	                btnText: $translate.instant('FORMS.USER.AGREGAR_OTRO_TRANSPORTE'),
	                label: $translate.instant('FORMS.USER.MEDIO_DE_TRANSPORTE'),
	                fields: [{
	                    key: 'transport_id',
	                    type: 'select',
	                    id: 'transport-id',
	                    templateOptions: {
	                        label: $translate.instant('FORMS.USER.TIPO_DE_TRANSPORTE'),
	                        required: true,
	                        valueProp: 'id',
	                        labelProp: 'name',
	                        options: []
	                    },
	                    controller: /*@ngInject*/["$scope", "Store", function controller($scope, Store) {
	                        return $scope.to.options = Store.filter('transport');
	                    }]
	                }, {
	                    key: 'is_own',
	                    type: 'select',
	                    id: 'isOwn',
	                    templateOptions: {
	                        label: $translate.instant('FORMS.USER.ES_PROPIO'),
	                        required: true,
	                        valueProp: 'value',
	                        labelProp: 'label',
	                        options: [{
	                            value: 0,
	                            label: $translate.instant('FORMS.USER.NO')
	                        }, {
	                            value: 1,
	                            label: $translate.instant('FORMS.USER.SI')
	                        }]
	                    },
	                    defaultValue: 0
	                }, {
	                    key: 'name',
	                    type: 'input',
	                    templateOptions: {
	                        label: $translate.instant('FORMS.USER.NOMBRE'),
	                        type: 'text'
	                    }
	                }, {
	                    key: 'max_capacity',
	                    type: 'input',
	                    templateOptions: {
	                        label: $translate.instant('FORMS.USER.CAPACIDAD_MAXIMA'),
	                        placeholder: $translate.instant('FORMS.USER.CAPACIDAD_MAXIMA_PLACEHOLDER')
	                    }
	                }, {
	                    key: 'max_passangers',
	                    type: 'input',
	                    templateOptions: {
	                        label: $translate.instant('FORMS.USER.CAPACIDAD_DE_PASAJEROS')
	                    }
	                }, {
	                    key: 'max_speed',
	                    type: 'input',
	                    templateOptions: {
	                        label: $translate.instant('FORMS.USER.VELOCIDAD_MAXIMA')
	                    }
	                }, {
	                    key: 'license_plate',
	                    type: 'input',
	                    templateOptions: {
	                        label: $translate.instant('FORMS.USER.MATRICULA')
	                    }
	                }, {
	                    key: 'city',
	                    type: 'input',
	                    templateOptions: {
	                        label: $translate.instant('FORMS.USER.CIUDAD_DE_LA_MATRICULA')
	                    }
	                }, {
	                    key: 'observations',
	                    type: 'textarea',
	                    templateOptions: {
	                        label: $translate.instant('FORMS.USER.OBSERVACIONES')
	                    }
	                }]
	            }
	        }]
	    };
	
	    return fields;
	
	    function RoleFieldController($scope, Store) {
	        "ngInject";
	
	        $scope.to.options = Store.filter('role', {
	            where: { for_team: IS_TEAM }
	        });
	
	        $scope.$watch('model.' + $scope.options.key, function (nv) {
	            if (nv) {
	                var role = Store.get('role', nv);
	                $scope.model.showTransportForm = role.need_transport;
	            }
	        });
	    }
	}

/***/ },
/* 680 */
/***/ function(module, exports) {

	'use strict';
	
	Form.$inject = ["$translate"];
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	exports.default = Form;
	function Form($translate) {
	    "ngInject";
	
	    var hours = [];
	    var mins = [];
	
	    for (var i = 0; i <= 24; i++) {
	        hours.push({ name: i, value: pad(i, 2) });
	    }
	
	    for (var i = 0; i <= 60; i++) {
	        mins.push({ name: i, value: pad(i, 2) });
	    }
	
	    return {
	        basic: [{
	            key: 'name',
	            type: 'input',
	            templateOptions: {
	                label: $translate.instant('FORMS.SERVICE.NOMBRE'),
	                required: true,
	                type: 'text'
	            }
	        }, {
	            elementAttributes: {
	                layout: 'row',
	                'layout-sm': 'column'
	            },
	            fieldGroup: [{
	                key: 'hours',
	                type: 'select',
	                templateOptions: {
	                    label: $translate.instant('FORMS.SERVICE.HORAS'),
	                    options: hours,
	                    required: true
	                }
	            }, {
	                key: 'mins',
	                type: 'select',
	                templateOptions: {
	                    label: $translate.instant('FORMS.SERVICE.MINUTOS'),
	                    options: mins,
	                    required: true
	                }
	            }]
	        }, {
	            key: 'description',
	            type: 'textarea',
	            templateOptions: {
	                label: $translate.instant('FORMS.SERVICE.DESCRIPCION')
	            }
	        }]
	    };
	}
	
	function pad(num, size) {
	    var s = num + "";
	    while (s.length < size) {
	        s = "0" + s;
	    }return s;
	}

/***/ },
/* 681 */
/***/ function(module, exports) {

	'use strict';
	
	Form.$inject = ["$translate"];
	Object.defineProperty(exports, "__esModule", {
	  value: true
	});
	exports.default = Form;
	function Form($translate) {
	  "ngInject";
	
	  var fields = {
	    basic: [{
	      key: 'name',
	      type: 'input',
	      templateOptions: {
	        label: 'Nombre',
	        required: true
	      }
	    }, {
	      key: 'description',
	      type: 'textarea',
	      templateOptions: {
	        label: 'Descripción'
	      }
	    }, {
	      key: 'questions',
	      type: 'repeatSection',
	      templateOptions: {
	        btnText: 'Agregar otra pregunta',
	        label: 'Pregunta',
	        required: true,
	        fields: [{
	          key: 'question',
	          type: 'textarea',
	          templateOptions: {
	            label: 'Contenido de la pregunta',
	            required: true
	          }
	        }, {
	          id: 'type',
	          key: 'type',
	          type: 'select',
	          templateOptions: {
	            label: 'Tipo de pregunta',
	            required: true,
	            labelProp: 'label',
	            valueProp: 'value',
	            options: [{
	              label: 'Abierta',
	              value: 'open'
	            }, {
	              label: 'Selección múltiple',
	              value: 'multiple'
	            }],
	            defaultValue: 'open'
	          }
	        }, {
	          key: 'options',
	          type: 'repeatSection',
	          templateOptions: {
	            btnText: 'Agregar otra opción',
	            label: 'Opción',
	            required: true,
	            fields: [{
	              key: 'option',
	              type: 'input',
	              templateOptions: {
	                label: 'Contenido de la opción',
	                required: true
	              }
	            }]
	          },
	          hideExpression: "model.type != 'multiple'"
	        }]
	      }
	    }]
	  };
	
	  return fields;
	}

/***/ },
/* 682 */,
/* 683 */,
/* 684 */,
/* 685 */,
/* 686 */,
/* 687 */,
/* 688 */,
/* 689 */,
/* 690 */,
/* 691 */,
/* 692 */,
/* 693 */,
/* 694 */,
/* 695 */,
/* 696 */,
/* 697 */,
/* 698 */,
/* 699 */,
/* 700 */,
/* 701 */,
/* 702 */,
/* 703 */,
/* 704 */,
/* 705 */,
/* 706 */,
/* 707 */,
/* 708 */,
/* 709 */,
/* 710 */,
/* 711 */,
/* 712 */,
/* 713 */,
/* 714 */,
/* 715 */,
/* 716 */,
/* 717 */,
/* 718 */,
/* 719 */,
/* 720 */,
/* 721 */,
/* 722 */,
/* 723 */,
/* 724 */,
/* 725 */,
/* 726 */,
/* 727 */,
/* 728 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Controller.$inject = ["NEXO"];
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _app = __webpack_require__(729);
	
	var _app2 = _interopRequireDefault(_app);
	
	var _lodash = __webpack_require__(263);
	
	var _lodash2 = _interopRequireDefault(_lodash);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	//import template from './app.jade';
	
	
	var appComponent = {
	    template: _app2.default,
	    restrict: 'E',
	    controller: Controller,
	    controllerAs: 'vm'
	};
	
	exports.default = appComponent;
	
	
	function Controller(NEXO) {
	    "ngInject";
	
	    var teamId = _lodash2.default.get(NEXO, 'team.id', false);
	
	    this.isTeam = !!teamId;
	}

/***/ },
/* 729 */
/***/ function(module, exports) {

	module.exports = "<div class=\"nexo-app\" layout=\"row\">\n    <nx-sidenav is-team=\"vm.isTeam\"></nx-sidenav>\n\n    <div layout=\"column\" flex role=\"main\" tabindex=\"-1\">\n        <nx-header title=\"asdas\"></nx-header>\n\n        <md-content flex layout=\"column\" md-scroll-y>\n            <div ui-view flex=\"noshrink\"></div>\n            <!--<div ui-view=\"content\"  flex=\"noshrink\"></div>-->\n        </md-content>\n    </div>\n</div>\n\n\n";

/***/ }
]);
//# sourceMappingURL=app.089422b97fc1a1646a95.js.map