(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
"use strict";

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

/**
 * article and pr remix process controller
 *
 * @class Remix
 * @author Barble Lee
 * @created 2016/10/19
 */

var Remix = function () {
	_createClass(Remix, null, [{
		key: "init",
		value: function init(scene) {
			scene && new Remix(scene);
		}
	}]);

	function Remix(scene) {
		_classCallCheck(this, Remix);

		this.article = scene.querySelectorAll(".Article[data-type=article]");
		this.pr = scene.querySelectorAll(".Article[data-type=pr]");
		this.parent = scene;
		this.frequency = 1; // n: 記事*n + PR*1
		this.copy = {
			"article": [],
			"pr": []
		};
		this.remixArray = [];
		this.totalLength = this.article.length + this.pr.length;

		//this.copy["article"] = Array.prototype.slice.call(this.article);
		this.article.forEach(function (value) {
			this.copy["article"].push(value);
		}.bind(this));

		//this.copy["pr"] = Array.prototype.slice.call(this.pr);
		this.pr.forEach(function (value) {
			this.copy["pr"].push(value);
		}.bind(this));
		this.doRemix();
	}

	_createClass(Remix, [{
		key: "doRemix",
		value: function doRemix() {
			var k = 0;
			for (var i = 0; i < this.pr.length; i++) {
				for (var j = 0; j < this.frequency; j++) {
					this.remixArray[k] = this.copy["article"][0];
					k++;
					if (j != -1) this.copy["article"].splice(0, 1);
				}
				this.remixArray[k] = this.copy["pr"][i];
				k++;
			}
			if (this.copy["article"].length) {
				this.remixArray = this.remixArray.concat(this.copy["article"]);
			}
			this.insertBack();
		}
	}, {
		key: "insertBack",
		value: function insertBack() {
			while (this.parent.firstChild) {
				this.parent.removeChild(this.parent.firstChild);
			}
			this.remixArray.forEach(function (value) {
				if (value) {
					this.parent.appendChild(value);
				}
			}.bind(this));
		}
	}]);

	return Remix;
}();

(function () {
	Remix.init(document.querySelector(".ArticleList"));
})();

},{}]},{},[1]);
