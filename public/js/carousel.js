(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
"use strict";

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }


var Carousel = function () {
    _createClass(Carousel, null, [{
        key: "init",
        value: function init(scene) {
            scene && new Carousel(scene);
        }
    }]);

    function Carousel(scene) {
        var _this = this;

        _classCallCheck(this, Carousel);

        this.box = scene.querySelector(".js-CarouselBox");
        this.content = scene.querySelector(".js-CarouselContent");
        this.next = scene.querySelector(".js-CarouselNext");
        this.prev = scene.querySelector(".js-CarouselPrev");

        this.indexNow = -3;
        this.imageWidth = 0;
        this.val = 0;
        this.isAnimate = false;
        this.imageLength = this.box.children.length;
        //this.imageNow    = -this.imageLength;
        this.timer = null;

        var repeat = 2;
        var totalNodes = this.box.children;
        for (var i = 0; i < repeat; i++) {
            for (var j = 0; j < this.imageLength; j++) {
                this.box.appendChild(totalNodes[j].cloneNode(true));
            }
        }

        this.setTransition(this.box, this.indexNow * this.content.offsetWidth);

        /* Listen for a transition! */
        var transition = this.whichTransitionEvent();
        transition && this.box.addEventListener(transition, function () {
            return _this.check();
        });
        /* The "whichTransitionEvent" can be swapped for "animation" instead of "transition" texts, as can the usage :) */

        this.next.addEventListener("click", function () {
            return _this.changeImage(-1);
        });
        this.prev.addEventListener("click", function () {
            return _this.changeImage(1);
        });

        window.addEventListener("resize", function () {
            _this.imageWidth = _this.content.offsetWidth;
            _this.setTranslate(_this.box, _this.indexNow * _this.imageWidth);
        });

        this.autoSlide();
    }

    _createClass(Carousel, [{
        key: "autoSlide",
        value: function autoSlide() {
            var _this2 = this;

            this.timer = setTimeout(function () {
                _this2.changeImage(-1);
            }, 6000);
        }
    }, {
        key: "changeImage",
        value: function changeImage(val) {
            if (this.isAnimate === true) {
                return;
            }

            try {
                clearTimeout(this.timer);
            } catch (e) {}

            this.val = val;
            this.imageWidth = this.content.offsetWidth;
            this.indexNow += val;
            this.isAnimate = true;

            this.setTransition(this.box, "");
            this.setTranslate(this.box, this.indexNow * this.imageWidth);
            this.autoSlide();
        }
    }, {
        key: "check",
        value: function check() {
            if (this.val > 0) {
                // pre
                if (this.indexNow > -3) {
                    this.indexNow = this.imageLength * -1 - 2;
                    this.box.style.transition = "";
                    this.setTransition(this.box, "inherit");
                    this.setTranslate(this.box, this.indexNow * this.imageWidth);
                }
            } else {
                // next
                if (this.indexNow < this.imageLength * -2) {
                    this.indexNow = this.imageLength * -1 - 1;
                    this.setTransition(this.box, "inherit");
                    this.setTranslate(this.box, this.indexNow * this.imageWidth);
                }
            }
            this.isAnimate = false;
        }
    }, {
        key: "setTransition",
        value: function setTransition(element, value) {
            element.style.transition = value;
            element.style.WebkitTransition = value;
            element.style.MozTransition = value;
            element.style.MsTransition = value;
            element.style.OTransition = value;
        }
    }, {
        key: "setTranslate",
        value: function setTranslate(element, value) {
            var translate = "translateX(" + value + "px)";

            element.style.transform = translate;
            element.style.WebkitTransform = translate;
            element.style.MozTransform = translate;
            element.style.MsTransform = translate;
            element.style.OTransform = translate;
        }
    }, {
        key: "whichTransitionEvent",
        value: function whichTransitionEvent() {
            var _this3 = this;

            var transitions = {
                "transition": "transitionend",
                "OTransition": "oTransitionEnd",
                "MozTranstion": "transitionend",
                "WebkitTransition": "webkitTransitionEnd"
            };

            var transition = "";
            Object.keys(transitions).forEach(function (t) {
                if (_this3.box.style[t] !== void 0) {
                    transition = transitions[t];
                }
            });

            return transition;
        }
    }]);

    return Carousel;
}();

(function () {
    Carousel.init(document.querySelector(".js-Carousel"));
})();

},{}]},{},[1]);
