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

},{}],2:[function(require,module,exports){
"use strict";

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _SnapShareAction = require("./SnapShareAction");

var _SnapShareAction2 = _interopRequireDefault(_SnapShareAction);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

/**
 * Common app process controller
 *
 * @class App
 * @created 2016/10/19
 */
var App = function () {

    /**
     * Constructor
     */
    function App() {
        _classCallCheck(this, App);

        var doc = document;

        // search module
        this.search = doc.querySelectorAll(".js-Search");

        // toggle keywords
        this.toggleKeyword = doc.querySelectorAll(".js-Toggle");

        // toggle navition close
        this.closeNav = doc.querySelector(".Page");

        // snap share toggle trigger
        this.snapShareTrigger = doc.querySelector(".js-ShareToggle");

        // fallback icons
        this.fallbackIcons = doc.querySelectorAll(".js-FallbackIcon");

        this.GotoApp = doc.querySelector(".GotoApp");

        this.OpenUser = doc.querySelector(".USermore");
        this.UserList = doc.querySelector(".LikeUserList");
    }

    /**
     * Initializer
     *
     * @public
     */


    _createClass(App, [{
        key: "init",
        value: function init() {
            var _this = this;

            // setup search trigger
            [].forEach.call(this.search, function (form) {
                var action = form.action;
                var query = form.querySelector("input[type=text]");

                form.addEventListener("submit", function (evt) {
                    evt.preventDefault();
                    location.href = action + "fw-" + encodeURIComponent(query.value) + "/";
                });
            });

            // setup toggle keyword ( for mobile device )
            [].forEach.call(this.toggleKeyword, function (node) {
                var label = void 0;
                if (node.tagName !== "LABEL") {
                    label = node.nextElementSibling.querySelector("label");
                } else {
                    label = node;
                }

                label.normalize();

                var text = label.firstChild;
                label.addEventListener("click", function () {
                    if (text.nodeValue === "閉じる") {
                        text.nodeValue = "すべて見る";
                    } else {
                        text.nodeValue = "閉じる";
                    }
                });
            });
            //いいね user open
            this.OpenUser.addEventListener("click", function () {
                _this.UserList.classList.remove("hidden");
                document.querySelector("body").style.height = "100vh";
                document.querySelector("body").style.overflow = "hidden";
            });
            //いいね user close
            this.UserList.querySelector('.closer').addEventListener("click", function () {
                _this.UserList.classList.add("hidden");
                document.querySelector("body").removeAttribute("style");
            });

            //setup click event to close navition ( for mobile device )
            this.closeNav.addEventListener("click", function () {
                var navTrigger = document.getElementById("navigation-trigger");
                navTrigger.checked = false;
            });

            // setup share toggle action
            if (this.snapShareTrigger) {
                _SnapShareAction2.default.init(this.snapShareTrigger);
            }

            // setup fallback icon image
            [].forEach.call(this.fallbackIcons, function (node) {
                // <img> tag only
                if (node.tagName !== "IMG") {
                    return;
                }

                node.addEventListener("error", function () {
                    // guard to recursive call
                    if (node.hasAttribute("data-handled")) {
                        return;
                    }
                    node.src = node.getAttribute("data-fallbackimage");
                    node.setAttribute("data-handled", 1);
                });
            });
            window.addEventListener("scroll", function () {
                var Applink_h = _this.GotoApp.offsetHeight || _this.closeNav.offsetHeight;
                if (window.pageYOffset >= Applink_h) {
                    _this.GotoApp.style.top = Applink_h * -1 + 'px';
                    document.getElementById("pt").className = "Pages";
                    _this.closeNav.style.marginTop = Applink_h + 50 + 'px'; //50 is $headerSmallHeight
                } else {
                    _this.GotoApp.style.top = '';
                    document.getElementById("pt").className = "Pages Appshow";
                    _this.closeNav.style.marginTop = '';
                }
            });
        }
    }]);

    return App;
}();

(function () {
    var c = new App();
    c.init();
})();

},{"./SnapShareAction":1}]},{},[2]);
