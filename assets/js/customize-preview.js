!function(t){var n={};function e(o){if(n[o])return n[o].exports;var r=n[o]={i:o,l:!1,exports:{}};return t[o].call(r.exports,r,r.exports,e),r.l=!0,r.exports}e.m=t,e.c=n,e.d=function(t,n,o){e.o(t,n)||Object.defineProperty(t,n,{enumerable:!0,get:o})},e.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},e.t=function(t,n){if(1&n&&(t=e(t)),8&n)return t;if(4&n&&"object"==typeof t&&t&&t.__esModule)return t;var o=Object.create(null);if(e.r(o),Object.defineProperty(o,"default",{enumerable:!0,value:t}),2&n&&"string"!=typeof t)for(var r in t)e.d(o,r,function(n){return t[n]}.bind(null,r));return o},e.n=function(t){var n=t&&t.__esModule?function(){return t.default}:function(){return t};return e.d(n,"a",n),n},e.o=function(t,n){return Object.prototype.hasOwnProperty.call(t,n)},e.p="",e(e.s=7)}({0:function(t,n){t.exports=jQuery},7:function(t,n,e){t.exports=e(9)},9:function(t,n,e){"use strict";e.r(n);var o=e(0),r=e.n(o),i=function(t,n){n=(((n||"")+"").toLowerCase().match(/<[a-z][a-z0-9]*>/g)||[]).join("");return t.replace(/<!--[\s\S]*?-->|<\?(?:php)?[\s\S]*?\?>/gi,"").replace(/<\/?([a-z][a-z0-9]*)\b[^>]*>/gi,(function(t,e){return n.indexOf("<"+e.toLowerCase()+">")>-1?t:""}))};wp.customize("blogname",(function(t){t.bind((function(t){r()(".c-header__blogname").html(t)}))})),wp.customize("onlinekhabar_display_author_info",(function(t){t.bind((function(t){t?r()(".c-post-author").show():r()(".c-post-author").hide()}))})),wp.customize("onlinekhabar_accent_color",(function(t){t.bind((function(t){var n="",e=onlinekhabar["inline-css"];for(var o in e){for(var i in n+="".concat(o," {"),e[o]){e[o][i];n+="".concat(i,": ").concat(t)}n+="}"}r()("#onlinekhabar-stylesheet-inline-css").html(n)}))})),wp.customize("onlinekhabar_copyright_info",(function(t){t.bind((function(t){r()(".c-site-info__text").html(i(t,"<a>"))}))})),wp.customize("onlinekhabar_header_show_cart",(function(t){t.bind((function(n){t?r()("#top-cart").show():r()("#top-cart").hide()}))})),wp.customize("onlinekhabar_header_show_search",(function(t){t.bind((function(t){t?r()("#top-search").show():r()("#top-search").hide()}))}))}});