(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
"use strict";

/**
 * Snap-share action menu show/hide diplay manager
 *
 * @class SnapShareAction
 */

Object.defineProperty(exports, "__esModule", {
    value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var SnapShareAction = function () {
    _createClass(SnapShareAction, null, [{
        key: "init",


        /**
         * Instantiate statically
         *
         * @param Element element
         */
        value: function init(element) {
            var instance = new SnapShareAction(element);

            instance.action();
        }

        /**
         * Constructor
         *
         * @param Element element
         */

    }]);

    function SnapShareAction(element) {
        _classCallCheck(this, SnapShareAction);

        this.trigger = element;
        this.defaultClassName = element.className;
        this.displayTarget = element.querySelector(".js-ShareList");

        // create fixed scope handler ( for add / remove event easily )
        this.closer = this.hide.bind(this);
    }

    /**
     * Setup the actions
     *
     * @private
     */


    _createClass(SnapShareAction, [{
        key: "action",
        value: function action() {
            this.trigger.addEventListener("click", this);

            // cancel bubbling event on sharelist clicked
            this.displayTarget.addEventListener("click", function (evt) {
                return evt.stopPropagation();
            });
        }

        /**
         * Objective event handler
         *
         * @param MouseEvent evt
         * @return void
         */

    }, {
        key: "handleEvent",
        value: function handleEvent(evt) {
            evt.stopPropagation();

            // check trigger has displayed flag className.
            // Element.classList not supported on some browsers...
            if ((" " + this.trigger.className + " ").indexOf(" Snap-Share--open ") === -1) {
                // attach the class
                this.show();
            } else {
                this.hide();
            }
        }

        /**
         * Show the display target
         *
         * @public
         */

    }, {
        key: "show",
        value: function show() {
            // attach the class
            this.trigger.className = this.defaultClassName + " Snap-Share--open";

            // friendly UX, close sharelist on other document clicked.
            // Note that this event works one time only so UI performance, memory leak.
            document.addEventListener("click", this.closer);
        }

        /**
         * Hide the display target
         *
         * @public
         */

    }, {
        key: "hide",
        value: function hide() {
            // remove the class
            this.trigger.className = this.defaultClassName;

            // try to remove once event
            try {
                document.removeEventListener("click", this.closer);
            } catch (e) {}
        }
    }]);

    return SnapShareAction;
}();

exports.default = SnapShareAction;

},{}]},{},[1]);
