/*
 swiped-events.js - v1.1.0
 Pure JavaScript swipe events
 https://github.com/john-doherty/swiped-events
 @inspiration https://stackoverflow.com/questions/16348031/disable-scrolling-when-touch-moving-certain-element
 @author John Doherty <www.johndoherty.info>
 @license MIT
*/
!function(e,c){"function"!=typeof e.CustomEvent&&(e.CustomEvent=function(a,b){b=b||{bubbles:!1,cancelable:!1,detail:void 0};var d=c.createEvent("CustomEvent");return d.initCustomEvent(a,b.bubbles,b.cancelable,b.detail),d},e.CustomEvent.prototype=e.Event.prototype);c.addEventListener("touchstart",function(a){"true"!==a.target.getAttribute("data-swipe-ignore")&&(d=a.target,l=Date.now(),h=a.touches[0].clientX,k=a.touches[0].clientY,f=g=0)},!1);c.addEventListener("touchmove",function(a){if(h&&k){var b=
a.touches[0].clientY;g=h-a.touches[0].clientX;f=k-b}},!1);c.addEventListener("touchend",function(a){if(d===a.target){a=parseInt(d.getAttribute("data-swipe-threshold")||"20",10);var b=parseInt(d.getAttribute("data-swipe-timeout")||"500",10),e=Date.now()-l,c="";Math.abs(g)>Math.abs(f)?Math.abs(g)>a&&e<b&&(c=0<g?"swiped-left":"swiped-right"):Math.abs(f)>a&&e<b&&(c=0<f?"swiped-up":"swiped-down");""!==c&&d.dispatchEvent(new CustomEvent(c,{bubbles:!0,cancelable:!0}));l=k=h=null}},!1);var h=null,k=null,
g=null,f=null,l=null,d=null}(window,document);