(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
"use strict";

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var SnapProfile = function () {
    _createClass(SnapProfile, null, [{
        key: "make",
        value: function make(baseNode) {
            if (!baseNode) {
                return;
            }
            var instance = new SnapProfile(baseNode);
            instance.init();
        }
    }]);

    function SnapProfile(baseNode) {
        _classCallCheck(this, SnapProfile);

        this.node = baseNode;
        this.background = baseNode.querySelector(".js-ProfileBackground");
        this.isNeedFixedHeight = window.innerWidth <= 640;
    }

    _createClass(SnapProfile, [{
        key: "init",
        value: function init() {
            // check window size on media query threshould
            if (this.isNeedFixedHeight) {
                this.fixHeight();
            }

            window.addEventListener("resize", this);
        }
    }, {
        key: "fixHeight",
        value: function fixHeight() {
            var height = 0;
            var props = ["margin-top", "margin-bottom", "padding-top", "padding-bottom"];

            [].forEach.call(this.node.querySelectorAll(".js-FixedHeight"), function (node) {
                var css = window.getComputedStyle(node, null);
                props.forEach(function (p) {
                    height += parseInt(css.getPropertyValue(p), 10);
                });
                height += node.offsetHeight;
            });

            this.background.style.height = height + "px";
        }
    }, {
        key: "handleEvent",
        value: function handleEvent(evt) {
            if (evt.type !== "resize") {
                return;
            }

            if (window.innerWidth <= 640) {
                this.isNeedFixedHeight = true;
                this.fixHeight();
                return;
            }

            this.isNeedFixedHeight = false;
            this.background.style.height = "100%";
        }
    }]);

    return SnapProfile;
}();

(function () {
    SnapProfile.make(document.querySelector(".js-ProfileContent"));
})();

},{}]},{},[1]);
