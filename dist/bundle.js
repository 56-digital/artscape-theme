(function(){function r(e,n,t){function o(i,f){if(!n[i]){if(!e[i]){var c="function"==typeof require&&require;if(!f&&c)return c(i,!0);if(u)return u(i,!0);var a=new Error("Cannot find module '"+i+"'");throw a.code="MODULE_NOT_FOUND",a}var p=n[i]={exports:{}};e[i][0].call(p.exports,function(r){var n=e[i][1][r];return o(n||r)},p,p.exports,r,e,n,t)}return n[i].exports}for(var u="function"==typeof require&&require,i=0;i<t.length;i++)o(t[i]);return o}return r})()({1:[function(require,module,exports){
!function(t,e){"object"==typeof exports?module.exports=e():"function"==typeof define&&define.amd?define([],e):t.Draggable=e()}(this,function(){"use strict";var t={grid:0,filterTarget:null,limit:{x:null,y:null},threshold:0,setCursor:!1,setPosition:!0,smoothDrag:!0,useGPU:!0,onDrag:u,onDragStart:u,onDragEnd:u},e={transform:function(){for(var t=" -o- -ms- -moz- -webkit-".split(" "),e=document.body.style,n=t.length;n--;){var o=t[n]+"transform";if(o in e)return o}}()},n={assign:function(){for(var t=arguments[0],e=arguments.length,n=1;n<e;n++){var o=arguments[n];for(var i in o)t[i]=o[i]}return t},bind:function(t,e){return function(){t.apply(e,arguments)}},on:function(t,e,o){if(e&&o)n.addEvent(t,e,o);else if(e)for(var i in e)n.addEvent(t,i,e[i])},off:function(t,e,o){if(e&&o)n.removeEvent(t,e,o);else if(e)for(var i in e)n.removeEvent(t,i,e[i])},limit:function(t,e){return e instanceof Array?t<(e=[+e[0],+e[1]])[0]?t=e[0]:t>e[1]&&(t=e[1]):t=+e,t},addEvent:"attachEvent"in Element.prototype?function(t,e,n){t.attachEvent("on"+e,n)}:function(t,e,n){t.addEventListener(e,n,!1)},removeEvent:"attachEvent"in Element.prototype?function(t,e,n){t.detachEvent("on"+e,n)}:function(t,e,n){t.removeEventListener(e,n)}};function o(e,o){var i=this,r=n.bind(i.start,i),s=n.bind(i.drag,i),u=n.bind(i.stop,i);if(!a(e))throw new TypeError("Draggable expects argument 0 to be an Element");o=n.assign({},t,o),n.assign(i,{element:e,handle:o.handle&&a(o.handle)?o.handle:e,handlers:{start:{mousedown:r,touchstart:r},move:{mousemove:s,mouseup:u,touchmove:s,touchend:u}},options:o}),i.initialize()}function i(t){return parseInt(t,10)}function r(t){return"currentStyle"in t?t.currentStyle:getComputedStyle(t)}function s(t){return null!=t}function a(t){return t instanceof Element||"undefined"!=typeof HTMLDocument&&t instanceof HTMLDocument}function u(){}return n.assign(o.prototype,{setOption:function(t,e){var n=this;return n.options[t]=e,n.initialize(),n},get:function(){var t=this.dragEvent;return{x:t.x,y:t.y}},set:function(t,e){var n=this.dragEvent;return n.original={x:n.x,y:n.y},this.move(t,e),this},dragEvent:{started:!1,x:0,y:0},initialize:function(){var t,o=this,i=o.element,s=(o.handle,i.style),a=r(i),u=o.options,f=e.transform,l=o._dimensions={height:i.offsetHeight,left:i.offsetLeft,top:i.offsetTop,width:i.offsetWidth};u.useGPU&&f&&("none"===(t=a[f])&&(t=""),s[f]=t+" translate3d(0,0,0)"),u.setPosition&&(s.display="block",s.left=l.left+"px",s.top=l.top+"px",s.width=l.width+"px",s.height=l.height+"px",s.bottom=s.right="auto",s.margin=0,s.position="absolute"),u.setCursor&&(s.cursor="move"),o.setLimit(u.limit),n.assign(o.dragEvent,{x:l.left,y:l.top}),n.on(o.handle,o.handlers.start)},start:function(t){var e=this,o=e.getCursor(t),i=e.element;e.useTarget(t.target||t.srcElement)&&(t.preventDefault&&!t.target.getAttribute("contenteditable")?t.preventDefault():t.target.getAttribute("contenteditable")||(t.returnValue=!1),e.dragEvent.oldZindex=i.style.zIndex,i.style.zIndex=1e4,e.setCursor(o),e.setPosition(),e.setZoom(),n.on(document,e.handlers.move))},drag:function(t){var e=this,n=e.dragEvent,o=e.element,i=e._cursor,r=e._dimensions,s=e.options,a=r.zoom,u=e.getCursor(t),f=s.threshold,l=(u.x-i.x)/a+r.left,d=(u.y-i.y)/a+r.top;!n.started&&f&&Math.abs(i.x-u.x)<f&&Math.abs(i.y-u.y)<f||(n.original||(n.original={x:l,y:d}),n.started||(s.onDragStart(o,l,d,t),n.started=!0),e.move(l,d)&&s.onDrag(o,n.x,n.y,t))},move:function(t,e){var n=this,o=n.dragEvent,i=n.options,r=i.grid,s=n.element.style,a=n.limit(t,e,o.original.x,o.original.y);return!i.smoothDrag&&r&&(a=n.round(a,r)),(a.x!==o.x||a.y!==o.y)&&(o.x=a.x,o.y=a.y,s.left=a.x+"px",s.top=a.y+"px",!0)},stop:function(t){var e,o=this,i=o.dragEvent,r=o.element,s=o.options,a=s.grid;n.off(document,o.handlers.move),r.style.zIndex=i.oldZindex,s.smoothDrag&&a&&(e=o.round({x:i.x,y:i.y},a),o.move(e.x,e.y),n.assign(o.dragEvent,e)),o.dragEvent.started&&s.onDragEnd(r,i.x,i.y,t),o.reset()},reset:function(){this.dragEvent.started=!1},round:function(t){var e=this.options.grid;return{x:e*Math.round(t.x/e),y:e*Math.round(t.y/e)}},getCursor:function(t){return{x:(t.targetTouches?t.targetTouches[0]:t).clientX,y:(t.targetTouches?t.targetTouches[0]:t).clientY}},setCursor:function(t){this._cursor=t},setLimit:function(t){var e=this,o=function(t,e){return{x:t,y:e}};if(t instanceof Function)e.limit=t;else if(a(t)){var i=e._dimensions,r=t.scrollHeight-i.height,u=t.scrollWidth-i.width;e.limit=function(t,e){return{x:n.limit(t,[0,u]),y:n.limit(e,[0,r])}}}else if(t){var f=s(t.x),l=s(t.y);e.limit=f||l?function(e,o){return{x:f?n.limit(e,t.x):e,y:l?n.limit(o,t.y):o}}:o}else e.limit=o},setPosition:function(){var t=this.element,e=t.style;n.assign(this._dimensions,{left:i(e.left)||t.offsetLeft,top:i(e.top)||t.offsetTop})},setZoom:function(){for(var t=this.element,e=1;t=t.offsetParent;){var n=r(t).zoom;if(n&&"normal"!==n){e=n;break}}this._dimensions.zoom=e},useTarget:function(t){var e=this.options.filterTarget;return!(e instanceof Function)||e(t)},destroy:function(){n.off(this.handle,this.handlers.start),n.off(document,this.handlers.move)}}),o});
},{}],2:[function(require,module,exports){
var support = require('dom-support')
var getDocument = require('get-document')
var withinElement = require('within-element')

/**
 * Get offset of a DOM Element or Range within the document.
 *
 * @param {DOMElement|Range} el - the DOM element or Range instance to measure
 * @return {Object} An object with `top` and `left` Number values
 * @public
 */

module.exports = function offset(el) {
  var doc = getDocument(el)
  if (!doc) return

  // Make sure it's not a disconnected DOM node
  if (!withinElement(el, doc)) return

  var body = doc.body
  if (body === el) {
    return bodyOffset(el)
  }

  var box = { top: 0, left: 0 }
  if ( typeof el.getBoundingClientRect !== "undefined" ) {
    // If we don't have gBCR, just use 0,0 rather than error
    // BlackBerry 5, iOS 3 (original iPhone)
    box = el.getBoundingClientRect()

    if (el.collapsed && box.left === 0 && box.top === 0) {
      // collapsed Range instances sometimes report 0, 0
      // see: http://stackoverflow.com/a/6847328/376773
      var span = doc.createElement("span");

      // Ensure span has dimensions and position by
      // adding a zero-width space character
      span.appendChild(doc.createTextNode("\u200b"));
      el.insertNode(span);
      box = span.getBoundingClientRect();

      // Remove temp SPAN and glue any broken text nodes back together
      var spanParent = span.parentNode;
      spanParent.removeChild(span);
      spanParent.normalize();
    }
  }

  var docEl = doc.documentElement
  var clientTop  = docEl.clientTop  || body.clientTop  || 0
  var clientLeft = docEl.clientLeft || body.clientLeft || 0
  var scrollTop  = window.pageYOffset || docEl.scrollTop
  var scrollLeft = window.pageXOffset || docEl.scrollLeft

  return {
    top: box.top  + scrollTop  - clientTop,
    left: box.left + scrollLeft - clientLeft
  }
}

function bodyOffset(body) {
  var top = body.offsetTop
  var left = body.offsetLeft

  if (support.doesNotIncludeMarginInBodyOffset) {
    top  += parseFloat(body.style.marginTop || 0)
    left += parseFloat(body.style.marginLeft || 0)
  }

  return {
    top: top,
    left: left
  }
}

},{"dom-support":3,"get-document":5,"within-element":7}],3:[function(require,module,exports){
var domready = require('domready')

module.exports = (function() {

	var support,
		all,
		a,
		select,
		opt,
		input,
		fragment,
		eventName,
		i,
		isSupported,
		clickFn,
		div = document.createElement("div");

	// Setup
	div.setAttribute( "className", "t" );
	div.innerHTML = "  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>";

	// Support tests won't run in some limited or non-browser environments
	all = div.getElementsByTagName("*");
	a = div.getElementsByTagName("a")[ 0 ];
	if ( !all || !a || !all.length ) {
		return {};
	}

	// First batch of tests
	select = document.createElement("select");
	opt = select.appendChild( document.createElement("option") );
	input = div.getElementsByTagName("input")[ 0 ];

	a.style.cssText = "top:1px;float:left;opacity:.5";
	support = {
		// IE strips leading whitespace when .innerHTML is used
		leadingWhitespace: ( div.firstChild.nodeType === 3 ),

		// Make sure that tbody elements aren't automatically inserted
		// IE will insert them into empty tables
		tbody: !div.getElementsByTagName("tbody").length,

		// Make sure that link elements get serialized correctly by innerHTML
		// This requires a wrapper element in IE
		htmlSerialize: !!div.getElementsByTagName("link").length,

		// Get the style information from getAttribute
		// (IE uses .cssText instead)
		style: /top/.test( a.getAttribute("style") ),

		// Make sure that URLs aren't manipulated
		// (IE normalizes it by default)
		hrefNormalized: ( a.getAttribute("href") === "/a" ),

		// Make sure that element opacity exists
		// (IE uses filter instead)
		// Use a regex to work around a WebKit issue. See #5145
		opacity: /^0.5/.test( a.style.opacity ),

		// Verify style float existence
		// (IE uses styleFloat instead of cssFloat)
		cssFloat: !!a.style.cssFloat,

		// Make sure that if no value is specified for a checkbox
		// that it defaults to "on".
		// (WebKit defaults to "" instead)
		checkOn: ( input.value === "on" ),

		// Make sure that a selected-by-default option has a working selected property.
		// (WebKit defaults to false instead of true, IE too, if it's in an optgroup)
		optSelected: opt.selected,

		// Test setAttribute on camelCase class. If it works, we need attrFixes when doing get/setAttribute (ie6/7)
		getSetAttribute: div.className !== "t",

		// Tests for enctype support on a form (#6743)
		enctype: !!document.createElement("form").enctype,

		// Makes sure cloning an html5 element does not cause problems
		// Where outerHTML is undefined, this still works
		html5Clone: document.createElement("nav").cloneNode( true ).outerHTML !== "<:nav></:nav>",

		// jQuery.support.boxModel DEPRECATED in 1.8 since we don't support Quirks Mode
		boxModel: ( document.compatMode === "CSS1Compat" ),

		// Will be defined later
		submitBubbles: true,
		changeBubbles: true,
		focusinBubbles: false,
		deleteExpando: true,
		noCloneEvent: true,
		inlineBlockNeedsLayout: false,
		shrinkWrapBlocks: false,
		reliableMarginRight: true,
		boxSizingReliable: true,
		pixelPosition: false
	};

	// Make sure checked status is properly cloned
	input.checked = true;
	support.noCloneChecked = input.cloneNode( true ).checked;

	// Make sure that the options inside disabled selects aren't marked as disabled
	// (WebKit marks them as disabled)
	select.disabled = true;
	support.optDisabled = !opt.disabled;

	// Test to see if it's possible to delete an expando from an element
	// Fails in Internet Explorer
	try {
		delete div.test;
	} catch( e ) {
		support.deleteExpando = false;
	}

	if ( !div.addEventListener && div.attachEvent && div.fireEvent ) {
		div.attachEvent( "onclick", clickFn = function() {
			// Cloning a node shouldn't copy over any
			// bound event handlers (IE does this)
			support.noCloneEvent = false;
		});
		div.cloneNode( true ).fireEvent("onclick");
		div.detachEvent( "onclick", clickFn );
	}

	// Check if a radio maintains its value
	// after being appended to the DOM
	input = document.createElement("input");
	input.value = "t";
	input.setAttribute( "type", "radio" );
	support.radioValue = input.value === "t";

	input.setAttribute( "checked", "checked" );

	// #11217 - WebKit loses check when the name is after the checked attribute
	input.setAttribute( "name", "t" );

	div.appendChild( input );
	fragment = document.createDocumentFragment();
	fragment.appendChild( div.lastChild );

	// WebKit doesn't clone checked state correctly in fragments
	support.checkClone = fragment.cloneNode( true ).cloneNode( true ).lastChild.checked;

	// Check if a disconnected checkbox will retain its checked
	// value of true after appended to the DOM (IE6/7)
	support.appendChecked = input.checked;

	fragment.removeChild( input );
	fragment.appendChild( div );

	// Technique from Juriy Zaytsev
	// http://perfectionkills.com/detecting-event-support-without-browser-sniffing/
	// We only care about the case where non-standard event systems
	// are used, namely in IE. Short-circuiting here helps us to
	// avoid an eval call (in setAttribute) which can cause CSP
	// to go haywire. See: https://developer.mozilla.org/en/Security/CSP
	if ( !div.addEventListener ) {
		for ( i in {
			submit: true,
			change: true,
			focusin: true
		}) {
			eventName = "on" + i;
			isSupported = ( eventName in div );
			if ( !isSupported ) {
				div.setAttribute( eventName, "return;" );
				isSupported = ( typeof div[ eventName ] === "function" );
			}
			support[ i + "Bubbles" ] = isSupported;
		}
	}

	// Run tests that need a body at doc ready
	domready(function() {
		var container, div, tds, marginDiv,
			divReset = "padding:0;margin:0;border:0;display:block;overflow:hidden;box-sizing:content-box;-moz-box-sizing:content-box;-webkit-box-sizing:content-box;",
			body = document.getElementsByTagName("body")[0];

		if ( !body ) {
			// Return for frameset docs that don't have a body
			return;
		}

		container = document.createElement("div");
		container.style.cssText = "visibility:hidden;border:0;width:0;height:0;position:static;top:0;margin-top:1px";
		body.insertBefore( container, body.firstChild );

		// Construct the test element
		div = document.createElement("div");
		container.appendChild( div );

    //Check if table cells still have offsetWidth/Height when they are set
    //to display:none and there are still other visible table cells in a
    //table row; if so, offsetWidth/Height are not reliable for use when
    //determining if an element has been hidden directly using
    //display:none (it is still safe to use offsets if a parent element is
    //hidden; don safety goggles and see bug #4512 for more information).
    //(only IE 8 fails this test)
		div.innerHTML = "<table><tr><td></td><td>t</td></tr></table>";
		tds = div.getElementsByTagName("td");
		tds[ 0 ].style.cssText = "padding:0;margin:0;border:0;display:none";
		isSupported = ( tds[ 0 ].offsetHeight === 0 );

		tds[ 0 ].style.display = "";
		tds[ 1 ].style.display = "none";

		// Check if empty table cells still have offsetWidth/Height
		// (IE <= 8 fail this test)
		support.reliableHiddenOffsets = isSupported && ( tds[ 0 ].offsetHeight === 0 );

		// Check box-sizing and margin behavior
		div.innerHTML = "";
		div.style.cssText = "box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;padding:1px;border:1px;display:block;width:4px;margin-top:1%;position:absolute;top:1%;";
		support.boxSizing = ( div.offsetWidth === 4 );
		support.doesNotIncludeMarginInBodyOffset = ( body.offsetTop !== 1 );

		// NOTE: To any future maintainer, we've window.getComputedStyle
		// because jsdom on node.js will break without it.
		if ( window.getComputedStyle ) {
			support.pixelPosition = ( window.getComputedStyle( div, null ) || {} ).top !== "1%";
			support.boxSizingReliable = ( window.getComputedStyle( div, null ) || { width: "4px" } ).width === "4px";

			// Check if div with explicit width and no margin-right incorrectly
			// gets computed margin-right based on width of container. For more
			// info see bug #3333
			// Fails in WebKit before Feb 2011 nightlies
			// WebKit Bug 13343 - getComputedStyle returns wrong value for margin-right
			marginDiv = document.createElement("div");
			marginDiv.style.cssText = div.style.cssText = divReset;
			marginDiv.style.marginRight = marginDiv.style.width = "0";
			div.style.width = "1px";
			div.appendChild( marginDiv );
			support.reliableMarginRight =
				!parseFloat( ( window.getComputedStyle( marginDiv, null ) || {} ).marginRight );
		}

		if ( typeof div.style.zoom !== "undefined" ) {
			// Check if natively block-level elements act like inline-block
			// elements when setting their display to 'inline' and giving
			// them layout
			// (IE < 8 does this)
			div.innerHTML = "";
			div.style.cssText = divReset + "width:1px;padding:1px;display:inline;zoom:1";
			support.inlineBlockNeedsLayout = ( div.offsetWidth === 3 );

			// Check if elements with layout shrink-wrap their children
			// (IE 6 does this)
			div.style.display = "block";
			div.style.overflow = "visible";
			div.innerHTML = "<div></div>";
			div.firstChild.style.width = "5px";
			support.shrinkWrapBlocks = ( div.offsetWidth !== 3 );

			container.style.zoom = 1;
		}

		// Null elements to avoid leaks in IE
		body.removeChild( container );
		container = div = tds = marginDiv = null;
	});

	// Null elements to avoid leaks in IE
	fragment.removeChild( div );
	all = a = select = opt = input = fragment = div = null;

	return support;
})();

},{"domready":4}],4:[function(require,module,exports){
/*!
  * domready (c) Dustin Diaz 2014 - License MIT
  */
!function (name, definition) {

  if (typeof module != 'undefined') module.exports = definition()
  else if (typeof define == 'function' && typeof define.amd == 'object') define(definition)
  else this[name] = definition()

}('domready', function () {

  var fns = [], listener
    , doc = document
    , hack = doc.documentElement.doScroll
    , domContentLoaded = 'DOMContentLoaded'
    , loaded = (hack ? /^loaded|^c/ : /^loaded|^i|^c/).test(doc.readyState)


  if (!loaded)
  doc.addEventListener(domContentLoaded, listener = function () {
    doc.removeEventListener(domContentLoaded, listener)
    loaded = 1
    while (listener = fns.shift()) listener()
  })

  return function (fn) {
    loaded ? setTimeout(fn, 0) : fns.push(fn)
  }

});

},{}],5:[function(require,module,exports){

/**
 * Module exports.
 */

module.exports = getDocument;

// defined by w3c
var DOCUMENT_NODE = 9;

/**
 * Returns `true` if `w` is a Document object, or `false` otherwise.
 *
 * @param {?} d - Document object, maybe
 * @return {Boolean}
 * @private
 */

function isDocument (d) {
  return d && d.nodeType === DOCUMENT_NODE;
}

/**
 * Returns the `document` object associated with the given `node`, which may be
 * a DOM element, the Window object, a Selection, a Range. Basically any DOM
 * object that references the Document in some way, this function will find it.
 *
 * @param {Mixed} node - DOM node, selection, or range in which to find the `document` object
 * @return {Document} the `document` object associated with `node`
 * @public
 */

function getDocument(node) {
  if (isDocument(node)) {
    return node;

  } else if (isDocument(node.ownerDocument)) {
    return node.ownerDocument;

  } else if (isDocument(node.document)) {
    return node.document;

  } else if (node.parentNode) {
    return getDocument(node.parentNode);

  // Range support
  } else if (node.commonAncestorContainer) {
    return getDocument(node.commonAncestorContainer);

  } else if (node.startContainer) {
    return getDocument(node.startContainer);

  // Selection support
  } else if (node.anchorNode) {
    return getDocument(node.anchorNode);
  }
}

},{}],6:[function(require,module,exports){
/**
 * MARQUEE 3000 MARQUEE 3000 MARQUEE 3000 MARQUEE 3000 MARQUEE 3000
 * http://github.com/ezekielaquino/marquee3000
 * Marquees for the new millenium v1.0
 * MIT License
 */

;(function(root, factory) {
  if (typeof define === 'function' && define.amd) {
    define([], factory);
  } else if (typeof exports === 'object') {
    module.exports = factory();
  } else {
    root.Marquee3k = factory();
  }
}(this, function() {
  'use strict';

  class Marquee3k {
    constructor(element, options) {
      this.element = element;
      this.selector = options.selector;
      this.speed = element.dataset.speed || 0.25;
      this.pausable = element.dataset.pausable;
      this.reverse = element.dataset.reverse;
      this.paused = false;
      this.parent = element.parentElement;
      this.parentProps = this.parent.getBoundingClientRect();
      this.content = element.children[0];
      this.innerContent = this.content.innerHTML;
      this.wrapStyles = '';
      this.offset = 0;

      this._setupWrapper();
      this._setupContent();
      this._setupEvents();

      this.wrapper.appendChild(this.content);
      this.element.appendChild(this.wrapper);
    }

    _setupWrapper() {
      this.wrapper = document.createElement('div');
      this.wrapper.classList.add('marquee3k__wrapper');
      this.wrapper.style.whiteSpace = 'nowrap';
    }

    _setupContent() {
      this.content.classList.add(`${this.selector}__copy`);
      this.content.style.display = 'inline-block';
      this.contentWidth = this.content.offsetWidth;

      this.requiredReps = this.contentWidth > this.parentProps.width ? 2 : Math.ceil((this.parentProps.width - this.contentWidth) / this.contentWidth) + 1;

      for (let i = 0; i < this.requiredReps; i++) {
        this._createClone();
      }

      if (this.reverse) {
        this.offset = this.contentWidth * -1;
      }

      this.element.classList.add('is-init');
    }

    _setupEvents() {
      this.element.addEventListener('mouseenter', () => {
        if (this.pausable) this.paused = true;
      });

      this.element.addEventListener('mouseleave', () => {
        if (this.pausable) this.paused = false;
      });
    }

    _createClone() {
      const clone = this.content.cloneNode(true);
      clone.style.display = 'inline-block';
      clone.classList.add(`${this.selector}__copy`);
      this.wrapper.appendChild(clone);
    }

    animate() {
      if (!this.paused) {
        const isScrolled = this.reverse ? this.offset < 0 : this.offset > this.contentWidth * -1;
        const direction = this.reverse ? -1 : 1;
        const reset = this.reverse ? this.contentWidth * -1 : 0;

        if (isScrolled) this.offset -= this.speed * direction;
        else this.offset = reset;

        this.wrapper.style.whiteSpace = 'nowrap';
        this.wrapper.style.transform = `translate(${this.offset}px, 0) translateZ(0)`;
      }
    }

    _refresh() {
      this.contentWidth = this.content.offsetWidth;
    }

    repopulate(difference, isLarger) {
      this.contentWidth = this.content.offsetWidth;

      if (isLarger) {
        const amount = Math.ceil(difference / this.contentWidth) + 1;

        for (let i = 0; i < amount; i++) {
          this._createClone();
        }
      }
    }

    static refresh(index) {
      MARQUEES[index]._refresh();
    }

    static refreshAll() {
      for (let i = 0; i < MARQUEES.length; i++) {
        MARQUEES[i]._refresh();
      }
    }

    static init(options = { selector: 'marquee3k' }) {
      window.MARQUEES = [];
      const marquees = Array.from(document.querySelectorAll(`.${options.selector}`));
      let previousWidth = window.innerWidth;
      let timer;

      for (let i = 0; i < marquees.length; i++) {
        const marquee = marquees[i];
        const instance = new Marquee3k(marquee, options);
        MARQUEES.push(instance);
      }

      animate();

      function animate() {
        for (let i = 0; i < MARQUEES.length; i++) {
          MARQUEES[i].animate();
        }
        window.requestAnimationFrame(animate);
      }

      window.addEventListener('resize', () => {
        clearTimeout(timer);

        timer = setTimeout(() => {
          const isLarger = previousWidth < window.innerWidth;
          const difference = window.innerWidth - previousWidth;

          for (let i = 0; i < MARQUEES.length; i++) {
            MARQUEES[i].repopulate(difference, isLarger);
          }

          previousWidth = this.innerWidth;
        });
      }, 250);
    }
  }

  return Marquee3k;

}));
},{}],7:[function(require,module,exports){

/**
 * Check if the DOM element `child` is within the given `parent` DOM element.
 *
 * @param {DOMElement|Range} child - the DOM element or Range to check if it's within `parent`
 * @param {DOMElement} parent  - the parent node that `child` could be inside of
 * @return {Boolean} True if `child` is within `parent`. False otherwise.
 * @public
 */

module.exports = function within (child, parent) {
  // don't throw if `child` is null
  if (!child) return false;

  // Range support
  if (child.commonAncestorContainer) child = child.commonAncestorContainer;
  else if (child.endContainer) child = child.endContainer;

  // traverse up the `parentNode` properties until `parent` is found
  var node = child;
  while (node = node.parentNode) {
    if (node == parent) return true;
  }

  return false;
};

},{}],8:[function(require,module,exports){
const Draggable = require('Draggable')
const space = document.querySelector('.space-container img')
const spaceEl = document.querySelector('.space-parent')
const spaceHighest = document.getElementById('space')


space.onload = () => {
  space.classList.add('loaded')
  console.log(space.offsetHeight, 'space')
  console.log(spaceEl.offsetHeight, 'space el')

  const options = {
    limit: {
      x: 0,
      y: [-(space.offsetHeight) + spaceHighest.offsetHeight, 0]
    }
  }

  let d = new Draggable(space, options)
  
  window.addEventListener('resize', () => {
    d.destroy()
  })
}


},{"Draggable":1}],9:[function(require,module,exports){
const offset = require('document-offset')

const util = require('./util')
const marquee = require('./marquee')

const marqueeEl = document.querySelector('.marquee')

const websitePrefix = 'launchpad'

const headerImg = document.querySelector('.header-img')

const mobNavBtn = document.querySelectorAll('.mob-nav-btn')
const nav = document.querySelector('.nav')

const dataSrcEls = document.querySelectorAll('[data-src]')
const dataSrcsetEls = document.querySelectorAll('[data-srcset]')

const videos = document.querySelectorAll('.video')

const search = document.getElementById('search')
const searchInput = search.querySelector('input')
const searchOpen = document.querySelector('.search-open')
const searchClose = document.querySelector('.search-close')

const space = document.querySelector('.space-container')

const careerPosts = document.querySelectorAll('.career-post')

const mapEl = document.querySelector('.map')
let map

const sections = document.querySelectorAll('article section')


const handleScrolling = () => {
  checkScrollPos()

  window.addEventListener('scroll', () => {
    checkScrollPos()
  })
}

const checkScrollPos = () => {
  sections.forEach(el => {
    const off = offset(el)
    let win = window.scrollY + (window.innerHeight - window.innerHeight / 5)
    if (win >= off.top) {
      if (!el.classList.contains('in')) el.classList.add('in')
    } else {
      if (el.classList.contains('in')) el.classList.remove('in')
    }
  }) 
}

const handleCareers = () => {
  careerPosts.forEach(el => {
    el.addEventListener('click', () => {
      el.classList.toggle('open')
    })
  }) 
}

const handleSearchEvents = () => {
  
  document.addEventListener('keydown', e => {
    if (e.keyCode === 27 && search.classList.contains('open')) closeSearch()
    if (e.keyCode === 83 && e.ctrlKey === true && !search.classList.contains('open')) openSearch() 
  })

  searchOpen.addEventListener('click', openSearch)
  searchClose.addEventListener('click', closeSearch)
  
  searchInput.addEventListener('keyup', e => {
    // if enter
    if (e.keyCode === 13) {
      const val = e.target.value
      const noSpaceVal = val.replace(/ /g,'+') 
      const encodedVal = encodeURI(noSpaceVal)
      window.location.href = `/${websitePrefix}/search/${encodedVal}`
    }
  })
}

const closeSearch = () => {
  search.classList.remove('open')
  searchInput.classList.remove('open')
  searchClose.classList.remove('open')
  searchInput.blur()
}

const openSearch = () => {
  search.classList.add('open')
  setTimeout(() => { 
    searchInput.focus()
    searchInput.classList.add('open')
  }, 500)

  setTimeout(() => { 
    searchClose.classList.add('open')
  }, 400)
}

const handleVideos = () => {
  if (videos.length > 0) {
    videos.forEach(video => {
      const vid = video.querySelector('video')
      video.addEventListener('click', () => {
        video.classList.toggle('playing')
        vid.playing ? vid.pause() : vid.play() 
        console.log(vid)
      }) 
    })
  }
}

const loadData = (el, attr) => {
  const realAttr = el.getAttribute(`data-${attr}`)
  el.setAttribute(attr, realAttr)

}

const loadDataEls = () => {
  dataSrcEls.forEach(el => {
    loadData(el, 'src')
    el.onload = () => {
      el.classList.add('loaded')
      el.classList.remove('op0')
    }
  })

  dataSrcsetEls.forEach(el => {
    loadData(el, 'srcset')
    el.onload = () => {
      el.classList.add('loaded')
      el.classList.remove('op0')
    }
  })
}

const setupNav = () => {
  mobNavBtn.forEach(el => {
    el.addEventListener('click', () => {
      nav.classList.toggle('open') 
    })
  })
}

const setupHeader = () => {
  const data = JSON.parse(headerImg.getAttribute('data-imgs'))
  const img = headerImg.querySelector('img')
  const caption = headerImg.querySelector('.header-caption')

  const item = data[util.getRand(0, data.length)]
  if (item.caption.length > 0) caption.innerHTML = item.caption
  img.setAttribute('src', item.image.url)
  
  img.onload = () => {
    img.classList.remove('op0')
  }
  console.log(item)
}

const init = () => {
  loadDataEls()
  setupHeader()
  setupNav()
  handleVideos()
  handleSearchEvents()
  handleScrolling()
  
  if (marqueeEl) {
    console.log('yo')
    marquee()
  }

  if (space) require('./drag') 
  if (careerPosts) handleCareers()
}

document.addEventListener('DOMContentLoaded', init)


},{"./drag":8,"./marquee":10,"./util":11,"document-offset":2}],10:[function(require,module,exports){
const Marquee3k = require('marquee3000')

module.exports = () => {
  Marquee3k.init()
}


},{"marquee3000":6}],11:[function(require,module,exports){
const getRand = (min = 0, max) => {
  return Math.floor(Math.random() * (max - min) + min)
}

module.exports = {
  getRand
}


},{}]},{},[9]);
