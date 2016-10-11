/*============================================================================	
	CSS Browser Selector v0.4.0 (Nov 02, 2010) - Rafael Lima (http://rafael.adm.br)
	http://rafael.adm.br/css_browser_selector
=========================================================================== */
(function( $ ){
	function css_browser_selector(u){var ua=u.toLowerCase(),is=function(t){return ua.indexOf(t)>-1},g='gecko',w='webkit',s='safari',o='opera',m='mobile',h=document.documentElement,b=[(!(/opera|webtv/i.test(ua))&&/msie\s(\d)/.test(ua))?('ie ie'+RegExp.$1):is('firefox/2')?g+' ff2':is('firefox/3.5')?g+' ff3 ff3_5':is('firefox/3.6')?g+' ff3 ff3_6':is('firefox/3')?g+' ff3':is('gecko/')?g:is('opera')?o+(/version\/(\d+)/.test(ua)?' '+o+RegExp.$1:(/opera(\s|\/)(\d+)/.test(ua)?' '+o+RegExp.$2:'')):is('konqueror')?'konqueror':is('blackberry')?m+' blackberry':is('android')?m+' android':is('chrome')?w+' chrome':is('iron')?w+' iron':is('applewebkit/')?w+' '+s+(/version\/(\d+)/.test(ua)?' '+s+RegExp.$1:''):is('mozilla/')?g:'',is('j2me')?m+' j2me':is('iphone')?m+' iphone':is('ipod')?m+' ipod':is('ipad')?m+' ipad':is('mac')?'mac':is('darwin')?'mac':is('webtv')?'webtv':is('win')?'win'+(is('windows nt 6.0')?' vista':''):is('freebsd')?'freebsd':(is('x11')||is('linux'))?'linux':'','js']; c = b.join(' '); h.className += ' '+c; return c;}; css_browser_selector(navigator.userAgent);
})( jQuery );


/*============================================================================	
* FitText.js 1.2
*
* Copyright 2011, Dave Rupert http://daverupert.com
* Released under the WTFPL license
* http://sam.zoy.org/wtfpl/
*
* Date: Thu May 05 14:23:00 2011 -0600
=========================================================================== */

/*(function( $ ){
	$.fn.fitText=function(e,t){var n=e||1,r=$.extend({minFontSize:Number.NEGATIVE_INFINITY,maxFontSize:Number.POSITIVE_INFINITY},t);return this.each(function(){var e=$(this);var t=function(){e.css("font-size",Math.max(Math.min(e.width()/(n*10),parseFloat(r.maxFontSize)),parseFloat(r.minFontSize)))};t();$(window).on("resize.fittext orientationchange.fittext",t)})}
})( jQuery );*/

/*============================================================================	
* @author       Rob W <gwnRob@gmail.com>
* @website      http://stackoverflow.com/a/7513356/938089
* @version      20131010
* @description  Executes function on a framed YouTube video (see website link)
*               For a full list of possible functions, see:
*               https://developers.google.com/youtube/js_api_reference
* @param String frame_id The id of (the div containing) the frame
* @param String func     Desired function to call, eg. "playVideo"
*        (Function)      Function to call when the player is ready.
* @param Array  args     (optional) List of arguments to pass to function func
=========================================================================== */

(function( $ ){
	function callPlayer(frame_id, func, args) {
	    if (window.jQuery && frame_id instanceof jQuery) frame_id = frame_id.get(0).id;
	    var iframe = document.getElementById(frame_id);
	    if (iframe && iframe.tagName.toUpperCase() != 'IFRAME') {
	        iframe = iframe.getElementsByTagName('iframe')[0];
	    }

	    // When the player is not ready yet, add the event to a queue
	    // Each frame_id is associated with an own queue.
	    // Each queue has three possible states:
	    //  undefined = uninitialised / array = queue / 0 = ready
	    if (!callPlayer.queue) callPlayer.queue = {};
	    var queue = callPlayer.queue[frame_id],
	        domReady = document.readyState == 'complete';

	    if (domReady && !iframe) {
	        // DOM is ready and iframe does not exist. Log a message
	        window.console && console.log('callPlayer: Frame not found; id=' + frame_id);
	        if (queue) clearInterval(queue.poller);
	    } else if (func === 'listening') {
	        // Sending the "listener" message to the frame, to request status updates
	        if (iframe && iframe.contentWindow) {
	            func = '{"event":"listening","id":' + JSON.stringify(''+frame_id) + '}';
	            iframe.contentWindow.postMessage(func, '*');
	        }
	    } else if (!domReady ||
	               iframe && (!iframe.contentWindow || queue && !queue.ready) ||
	               (!queue || !queue.ready) && typeof func === 'function') {
	        if (!queue) queue = callPlayer.queue[frame_id] = [];
	        queue.push([func, args]);
	        if (!('poller' in queue)) {
	            // keep polling until the document and frame is ready
	            queue.poller = setInterval(function() {
	                callPlayer(frame_id, 'listening');
	            }, 250);
	            // Add a global "message" event listener, to catch status updates:
	            messageEvent(1, function runOnceReady(e) {
	                if (!iframe) {
	                    iframe = document.getElementById(frame_id);
	                    if (!iframe) return;
	                    if (iframe.tagName.toUpperCase() != 'IFRAME') {
	                        iframe = iframe.getElementsByTagName('iframe')[0];
	                        if (!iframe) return;
	                    }
	                }
	                if (e.source === iframe.contentWindow) {
	                    // Assume that the player is ready if we receive a
	                    // message from the iframe
	                    clearInterval(queue.poller);
	                    queue.ready = true;
	                    messageEvent(0, runOnceReady);
	                    // .. and release the queue:
	                    while (tmp = queue.shift()) {
	                        callPlayer(frame_id, tmp[0], tmp[1]);
	                    }
	                }
	            }, false);
	        }
	    } else if (iframe && iframe.contentWindow) {
	        // When a function is supplied, just call it (like "onYouTubePlayerReady")
	        if (func.call) return func();
	        // Frame exists, send message
	        iframe.contentWindow.postMessage(JSON.stringify({
	            "event": "command",
	            "func": func,
	            "args": args || [],
	            "id": frame_id
	        }), "*");
	    }
	    /* IE8 does not support addEventListener... */
	    function messageEvent(add, listener) {
	        var w3 = add ? window.addEventListener : window.removeEventListener;
	        w3 ?
	            w3('message', listener, !1)
	        :
	            (add ? window.attachEvent : window.detachEvent)('onmessage', listener);
	    }
	}
})( jQuery );

/**
 * VERSION: beta 1.30
 * DATE: 2012-07-25
 * JavaScript
 * UPDATES AND DOCS AT: http://www.greensock.com
 *
 * Copyright (c) 2008-2012, GreenSock. All rights reserved. 
 * This work is subject to the terms in http://www.greensock.com/terms_of_use.html or for 
 * corporate Club GreenSock members, the software agreement that was issued with the corporate 
 * membership.
 * 
 * @author: Jack Doyle, jack@greensock.com
 **/
(function( $ ){
	(window._gsQueue || (window._gsQueue = [])).push( function() {

		_gsDefine("plugins.ScrollToPlugin", ["plugins.TweenPlugin"], function(TweenPlugin) {
			
			var ScrollToPlugin = function(props, priority) {
					TweenPlugin.call(this, "scrollTo");
					this._overwriteProps.pop();
				},
				p = ScrollToPlugin.prototype = new TweenPlugin("scrollTo"),
				_getX = function() {
					return (window.pageXOffset != null) ? window.pageXOffset : (document.documentElement.scrollLeft != null) ? document.documentElement.scrollLeft : document.body.scrollLeft;
				}, 
				_getY = function() {
					return (window.pageYOffset != null) ? window.pageYOffset : (document.documentElement.scrollTop != null) ? document.documentElement.scrollTop : document.body.scrollTop;
				},
				_setRatio = TweenPlugin.prototype.setRatio; //speed optimization (quicker lookup)
			
			p.constructor = ScrollToPlugin;
			ScrollToPlugin.API = 2;
			
			p._onInitTween = function(target, value, tween) {
				this._wdw = (target == window);
				this._target = target;
				if (typeof(value) !== "object") {
					value = {y:Number(value)}; //if we don't receive an object as the parameter, assume the user intends "y".
				}
				this.x = this._wdw ? _getX() : target.scrollLeft;
				this.y = this._wdw ? _getY() : target.scrollTop;
				if (value.x != null) {
					this._addTween(this, "x", this.x, value.x, "scrollTo_x", true);
				} else {
					this.skipX = true;
				}
				if (value.y != null) {
					this._addTween(this, "y", this.y, value.y, "scrollTo_y", true);
				} else {
					this.skipY = true;
				}
				return true;
			};
			
			p._kill = function(lookup) {
				if (lookup.scrollTo_x) {
					this.skipX = true;
				}
				if (lookup.scrollTo_x) {
					this.skipY = true;
				}
				return TweenPlugin.prototype._kill.call(this, lookup);
			}
			
			p.setRatio = function(v) {
				_setRatio.call(this, v);
				if (this._wdw) {
					window.scrollTo((!this.skipX) ? this.x : _getX(), (!this.skipY) ? this.y : _getY());
				} else {
					if (!this.skipY) {
						this._target.scrollTop = this.y;
					}
					if (!this.skipX) {
						this._target.scrollLeft = this.x;
					}
				}
			};
			
			TweenPlugin.activate([ScrollToPlugin]);
			
			return ScrollToPlugin;
			
		}, true);

	}); if (window._gsDefine) { _gsQueue.pop()(); }
})( jQuery );


/**
 * BezierEasing - use bezier curve for transition easing function
 * is based on Firefox's nsSMILKeySpline.cpp
 * Usage:
 * var spline = BezierEasing(0.25, 0.1, 0.25, 1.0)
 * spline(x) => returns the easing value | x must be in [0, 1] range
 *
 * bezier-easing 0.4.0
 * BSD License
 * Gaëtan Renaudeau
 * https://github.com/gre/bezier-easing
 */
(function( $ ){
  (function (definition) {
    if (typeof exports === "object") {
      module.exports = definition();
    }
    else if (typeof window.define === 'function' && window.define.amd) {
      window.define([], definition);
    } else {
      window.BezierEasing = definition();
    }
  }(function () {

    // These values are established by empiricism with tests (tradeoff: performance VS precision)
    var NEWTON_ITERATIONS = 4;
    var NEWTON_MIN_SLOPE = 0.001;
    var SUBDIVISION_PRECISION = 0.0000001;
    var SUBDIVISION_MAX_ITERATIONS = 10;

    var kSplineTableSize = 11;
    var kSampleStepSize = 1.0 / (kSplineTableSize - 1.0);

    var float32ArraySupported = typeof Float32Array === "function";

    function BezierEasing (mX1, mY1, mX2, mY2) {
      // Validate arguments
      if (arguments.length !== 4) {
        throw new Error("BezierEasing requires 4 arguments.");
      }
      for (var i=0; i<4; ++i) {
        if (typeof arguments[i] !== "number" || isNaN(arguments[i]) || !isFinite(arguments[i])) {
          throw new Error("BezierEasing arguments should be integers.");
        } 
      }
      if (mX1 < 0 || mX1 > 1 || mX2 < 0 || mX2 > 1) {
        throw new Error("BezierEasing x values must be in [0, 1] range.");
      }

      var mSampleValues = float32ArraySupported ? new Float32Array(kSplineTableSize) : new Array(kSplineTableSize);
     
      function A (aA1, aA2) { return 1.0 - 3.0 * aA2 + 3.0 * aA1; }
      function B (aA1, aA2) { return 3.0 * aA2 - 6.0 * aA1; }
      function C (aA1)      { return 3.0 * aA1; }
     
      // Returns x(t) given t, x1, and x2, or y(t) given t, y1, and y2.
      function calcBezier (aT, aA1, aA2) {
        return ((A(aA1, aA2)*aT + B(aA1, aA2))*aT + C(aA1))*aT;
      }
     
      // Returns dx/dt given t, x1, and x2, or dy/dt given t, y1, and y2.
      function getSlope (aT, aA1, aA2) {
        return 3.0 * A(aA1, aA2)*aT*aT + 2.0 * B(aA1, aA2) * aT + C(aA1);
      }

      function newtonRaphsonIterate (aX, aGuessT) {
        for (var i = 0; i < NEWTON_ITERATIONS; ++i) {
          var currentSlope = getSlope(aGuessT, mX1, mX2);
          if (currentSlope === 0.0) return aGuessT;
          var currentX = calcBezier(aGuessT, mX1, mX2) - aX;
          aGuessT -= currentX / currentSlope;
        }
        return aGuessT;
      }

      function calcSampleValues () {
        for (var i = 0; i < kSplineTableSize; ++i) {
          mSampleValues[i] = calcBezier(i * kSampleStepSize, mX1, mX2);
        }
      }

      function binarySubdivide (aX, aA, aB) {
        var currentX, currentT, i = 0;
        do {
          currentT = aA + (aB - aA) / 2.0;
          currentX = calcBezier(currentT, mX1, mX2) - aX;
          if (currentX > 0.0) {
            aB = currentT;
          } else {
            aA = currentT;
          }
        } while (Math.abs(currentX) > SUBDIVISION_PRECISION && ++i < SUBDIVISION_MAX_ITERATIONS);
        return currentT;
      }

      function getTForX (aX) {
        var intervalStart = 0.0;
        var currentSample = 1;
        var lastSample = kSplineTableSize - 1;

        for (; currentSample != lastSample && mSampleValues[currentSample] <= aX; ++currentSample) {
          intervalStart += kSampleStepSize;
        }
        --currentSample;

        // Interpolate to provide an initial guess for t
        var dist = (aX - mSampleValues[currentSample]) / (mSampleValues[currentSample+1] - mSampleValues[currentSample]);
        var guessForT = intervalStart + dist * kSampleStepSize;

        var initialSlope = getSlope(guessForT, mX1, mX2);
        if (initialSlope >= NEWTON_MIN_SLOPE) {
          return newtonRaphsonIterate(aX, guessForT);
        } else if (initialSlope == 0.0) {
          return guessForT;
        } else {
          return binarySubdivide(aX, intervalStart, intervalStart + kSampleStepSize);
        }
      }

      if (mX1 != mY1 || mX2 != mY2)
        calcSampleValues();

      var f = function (aX) {
        if (mX1 === mY1 && mX2 === mY2) return aX; // linear
        // Because JavaScript number are imprecise, we should guarantee the extremes are right.
        if (aX === 0) return 0;
        if (aX === 1) return 1;
        return calcBezier(getTForX(aX), mY1, mY2);
      };
      var str = "BezierEasing("+[mX1, mY1, mX2, mY2]+")";
      f.toString = function () { return str; };

      return f;
    }

    // CSS mapping
    BezierEasing.css = {
      "ease":        BezierEasing(0.25, 0.1, 0.25, 1.0),
      "linear":      BezierEasing(0.00, 0.0, 1.00, 1.0),
      "ease-in":     BezierEasing(0.42, 0.0, 1.00, 1.0),
      "ease-out":    BezierEasing(0.00, 0.0, 0.58, 1.0),
      "ease-in-out": BezierEasing(0.42, 0.0, 0.58, 1.0),
      "loader":	     BezierEasing(0,.9,1,.1)
    };

    return BezierEasing;

  }));
})( jQuery );

BezierCurve = {
  ease:      new Ease(BezierEasing.css["ease"]),
  easeNone:  new Ease(BezierEasing.css["linear"]),
  easeIn:    new Ease(BezierEasing.css["ease-in"]),
  easeOut:   new Ease(BezierEasing.css["ease-out"]),
  easeInOut: new Ease(BezierEasing.css["ease-in-out"]),
  loader:    new Ease(BezierEasing.css["loader"])
};





/*============================================================================
	System variables
=========================================================================== */

is_ie8 = $('html').hasClass('ie8')? true : false;
is_safari = navigator.userAgent.indexOf('Safari') != -1 && navigator.userAgent.indexOf('Chrome') == -1;
is_firefox = navigator.userAgent.toLowerCase().indexOf('firefox') > -1;

/**** detect IE version *****/
IE = (function(){var rv = -1; if (navigator.appName == 'Microsoft Internet Explorer') {var ua = navigator.userAgent; var re  = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})"); if (re.exec(ua) != null) rv = parseFloat( RegExp.$1 ); } else if (navigator.appName == 'Netscape') {var ua = navigator.userAgent; var re  = new RegExp("Trident/.*rv:([0-9]{1,}[\.0-9]{0,})"); if (re.exec(ua) != null) rv = parseFloat( RegExp.$1 ); } return rv; }());

/**** CSS3 3D support *****/
NO_3D =	$('html.no-csstransforms3d').length ? 1 : 0;

/**** CSS3 Transition support *****/
NO_TRANS = $('html.no-csstransitions').length ? 1 : 0;

/**** Touch support *****/
TOUCH =	$('html.touch').length ? 1 : 0;