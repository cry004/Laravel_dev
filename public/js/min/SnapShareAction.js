!function e(t,n,r){function i(o,s){if(!n[o]){if(!t[o]){var u="function"==typeof require&&require;if(!s&&u)return u(o,!0);if(a)return a(o,!0);var c=new Error("Cannot find module '"+o+"'");throw c.code="MODULE_NOT_FOUND",c}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return i(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}for(var a="function"==typeof require&&require,o=0;o<r.length;o++)i(r[o]);return i}({1:[function(e,t,n){"use strict";function r(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}Object.defineProperty(n,"__esModule",{value:!0});var i=function(){function e(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}return function(t,n,r){return n&&e(t.prototype,n),r&&e(t,r),t}}(),a=function(){function e(t){r(this,e),this.trigger=t,this.defaultClassName=t.className,this.displayTarget=t.querySelector(".js-ShareList"),this.closer=this.hide.bind(this)}return i(e,null,[{key:"init",value:function(t){var n=new e(t);n.action()}}]),i(e,[{key:"action",value:function(){this.trigger.addEventListener("click",this),this.displayTarget.addEventListener("click",function(e){return e.stopPropagation()})}},{key:"handleEvent",value:function(e){e.stopPropagation(),(" "+this.trigger.className+" ").indexOf(" Snap-Share--open ")===-1?this.show():this.hide()}},{key:"show",value:function(){this.trigger.className=this.defaultClassName+" Snap-Share--open",document.addEventListener("click",this.closer)}},{key:"hide",value:function(){this.trigger.className=this.defaultClassName;try{document.removeEventListener("click",this.closer)}catch(e){}}}]),e}();n.default=a},{}]},{},[1]);