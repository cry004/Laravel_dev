!function t(r,i,e){function n(c,a){if(!i[c]){if(!r[c]){var h="function"==typeof require&&require;if(!a&&h)return h(c,!0);if(o)return o(c,!0);var s=new Error("Cannot find module '"+c+"'");throw s.code="MODULE_NOT_FOUND",s}var u=i[c]={exports:{}};r[c][0].call(u.exports,function(t){var i=r[c][1][t];return n(i?i:t)},u,u.exports,t,r,i,e)}return i[c].exports}for(var o="function"==typeof require&&require,c=0;c<e.length;c++)n(e[c]);return n}({1:[function(t,r,i){"use strict";function e(t,r){if(!(t instanceof r))throw new TypeError("Cannot call a class as a function")}var n=function(){function t(t,r){for(var i=0;i<r.length;i++){var e=r[i];e.enumerable=e.enumerable||!1,e.configurable=!0,"value"in e&&(e.writable=!0),Object.defineProperty(t,e.key,e)}}return function(r,i,e){return i&&t(r.prototype,i),e&&t(r,e),r}}(),o=function(){function t(r){e(this,t),this.article=r.querySelectorAll(".Article[data-type=article]"),this.pr=r.querySelectorAll(".Article[data-type=pr]"),this.parent=r,this.frequency=1,this.copy={article:[],pr:[]},this.remixArray=[],this.totalLength=this.article.length+this.pr.length,this.article.forEach(function(t){this.copy.article.push(t)}.bind(this)),this.pr.forEach(function(t){this.copy.pr.push(t)}.bind(this)),this.doRemix()}return n(t,null,[{key:"init",value:function(r){r&&new t(r)}}]),n(t,[{key:"doRemix",value:function(){for(var t=0,r=0;r<this.pr.length;r++){for(var i=0;i<this.frequency;i++)this.remixArray[t]=this.copy.article[0],t++,i!=-1&&this.copy.article.splice(0,1);this.remixArray[t]=this.copy.pr[r],t++}this.copy.article.length&&(this.remixArray=this.remixArray.concat(this.copy.article)),this.insertBack()}},{key:"insertBack",value:function(){for(;this.parent.firstChild;)this.parent.removeChild(this.parent.firstChild);this.remixArray.forEach(function(t){t&&this.parent.appendChild(t)}.bind(this))}}]),t}();!function(){o.init(document.querySelector(".ArticleList"))}()},{}]},{},[1]);