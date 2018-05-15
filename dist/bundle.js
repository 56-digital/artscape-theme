(function(){function r(e,n,t){function o(i,f){if(!n[i]){if(!e[i]){var c="function"==typeof require&&require;if(!f&&c)return c(i,!0);if(u)return u(i,!0);var a=new Error("Cannot find module '"+i+"'");throw a.code="MODULE_NOT_FOUND",a}var p=n[i]={exports:{}};e[i][0].call(p.exports,function(r){var n=e[i][1][r];return o(n||r)},p,p.exports,r,e,n,t)}return n[i].exports}for(var u="function"==typeof require&&require,i=0;i<t.length;i++)o(t[i]);return o}return r})()({1:[function(require,module,exports){
!function(t,e){"object"==typeof exports?module.exports=e():"function"==typeof define&&define.amd?define([],e):t.Draggable=e()}(this,function(){"use strict";var t={grid:0,filterTarget:null,limit:{x:null,y:null},threshold:0,setCursor:!1,setPosition:!0,smoothDrag:!0,useGPU:!0,onDrag:u,onDragStart:u,onDragEnd:u},e={transform:function(){for(var t=" -o- -ms- -moz- -webkit-".split(" "),e=document.body.style,n=t.length;n--;){var o=t[n]+"transform";if(o in e)return o}}()},n={assign:function(){for(var t=arguments[0],e=arguments.length,n=1;n<e;n++){var o=arguments[n];for(var i in o)t[i]=o[i]}return t},bind:function(t,e){return function(){t.apply(e,arguments)}},on:function(t,e,o){if(e&&o)n.addEvent(t,e,o);else if(e)for(var i in e)n.addEvent(t,i,e[i])},off:function(t,e,o){if(e&&o)n.removeEvent(t,e,o);else if(e)for(var i in e)n.removeEvent(t,i,e[i])},limit:function(t,e){return e instanceof Array?t<(e=[+e[0],+e[1]])[0]?t=e[0]:t>e[1]&&(t=e[1]):t=+e,t},addEvent:"attachEvent"in Element.prototype?function(t,e,n){t.attachEvent("on"+e,n)}:function(t,e,n){t.addEventListener(e,n,!1)},removeEvent:"attachEvent"in Element.prototype?function(t,e,n){t.detachEvent("on"+e,n)}:function(t,e,n){t.removeEventListener(e,n)}};function o(e,o){var i=this,r=n.bind(i.start,i),s=n.bind(i.drag,i),u=n.bind(i.stop,i);if(!a(e))throw new TypeError("Draggable expects argument 0 to be an Element");o=n.assign({},t,o),n.assign(i,{element:e,handle:o.handle&&a(o.handle)?o.handle:e,handlers:{start:{mousedown:r,touchstart:r},move:{mousemove:s,mouseup:u,touchmove:s,touchend:u}},options:o}),i.initialize()}function i(t){return parseInt(t,10)}function r(t){return"currentStyle"in t?t.currentStyle:getComputedStyle(t)}function s(t){return null!=t}function a(t){return t instanceof Element||"undefined"!=typeof HTMLDocument&&t instanceof HTMLDocument}function u(){}return n.assign(o.prototype,{setOption:function(t,e){var n=this;return n.options[t]=e,n.initialize(),n},get:function(){var t=this.dragEvent;return{x:t.x,y:t.y}},set:function(t,e){var n=this.dragEvent;return n.original={x:n.x,y:n.y},this.move(t,e),this},dragEvent:{started:!1,x:0,y:0},initialize:function(){var t,o=this,i=o.element,s=(o.handle,i.style),a=r(i),u=o.options,f=e.transform,l=o._dimensions={height:i.offsetHeight,left:i.offsetLeft,top:i.offsetTop,width:i.offsetWidth};u.useGPU&&f&&("none"===(t=a[f])&&(t=""),s[f]=t+" translate3d(0,0,0)"),u.setPosition&&(s.display="block",s.left=l.left+"px",s.top=l.top+"px",s.width=l.width+"px",s.height=l.height+"px",s.bottom=s.right="auto",s.margin=0,s.position="absolute"),u.setCursor&&(s.cursor="move"),o.setLimit(u.limit),n.assign(o.dragEvent,{x:l.left,y:l.top}),n.on(o.handle,o.handlers.start)},start:function(t){var e=this,o=e.getCursor(t),i=e.element;e.useTarget(t.target||t.srcElement)&&(t.preventDefault&&!t.target.getAttribute("contenteditable")?t.preventDefault():t.target.getAttribute("contenteditable")||(t.returnValue=!1),e.dragEvent.oldZindex=i.style.zIndex,i.style.zIndex=1e4,e.setCursor(o),e.setPosition(),e.setZoom(),n.on(document,e.handlers.move))},drag:function(t){var e=this,n=e.dragEvent,o=e.element,i=e._cursor,r=e._dimensions,s=e.options,a=r.zoom,u=e.getCursor(t),f=s.threshold,l=(u.x-i.x)/a+r.left,d=(u.y-i.y)/a+r.top;!n.started&&f&&Math.abs(i.x-u.x)<f&&Math.abs(i.y-u.y)<f||(n.original||(n.original={x:l,y:d}),n.started||(s.onDragStart(o,l,d,t),n.started=!0),e.move(l,d)&&s.onDrag(o,n.x,n.y,t))},move:function(t,e){var n=this,o=n.dragEvent,i=n.options,r=i.grid,s=n.element.style,a=n.limit(t,e,o.original.x,o.original.y);return!i.smoothDrag&&r&&(a=n.round(a,r)),(a.x!==o.x||a.y!==o.y)&&(o.x=a.x,o.y=a.y,s.left=a.x+"px",s.top=a.y+"px",!0)},stop:function(t){var e,o=this,i=o.dragEvent,r=o.element,s=o.options,a=s.grid;n.off(document,o.handlers.move),r.style.zIndex=i.oldZindex,s.smoothDrag&&a&&(e=o.round({x:i.x,y:i.y},a),o.move(e.x,e.y),n.assign(o.dragEvent,e)),o.dragEvent.started&&s.onDragEnd(r,i.x,i.y,t),o.reset()},reset:function(){this.dragEvent.started=!1},round:function(t){var e=this.options.grid;return{x:e*Math.round(t.x/e),y:e*Math.round(t.y/e)}},getCursor:function(t){return{x:(t.targetTouches?t.targetTouches[0]:t).clientX,y:(t.targetTouches?t.targetTouches[0]:t).clientY}},setCursor:function(t){this._cursor=t},setLimit:function(t){var e=this,o=function(t,e){return{x:t,y:e}};if(t instanceof Function)e.limit=t;else if(a(t)){var i=e._dimensions,r=t.scrollHeight-i.height,u=t.scrollWidth-i.width;e.limit=function(t,e){return{x:n.limit(t,[0,u]),y:n.limit(e,[0,r])}}}else if(t){var f=s(t.x),l=s(t.y);e.limit=f||l?function(e,o){return{x:f?n.limit(e,t.x):e,y:l?n.limit(o,t.y):o}}:o}else e.limit=o},setPosition:function(){var t=this.element,e=t.style;n.assign(this._dimensions,{left:i(e.left)||t.offsetLeft,top:i(e.top)||t.offsetTop})},setZoom:function(){for(var t=this.element,e=1;t=t.offsetParent;){var n=r(t).zoom;if(n&&"normal"!==n){e=n;break}}this._dimensions.zoom=e},useTarget:function(t){var e=this.options.filterTarget;return!(e instanceof Function)||e(t)},destroy:function(){n.off(this.handle,this.handlers.start),n.off(document,this.handlers.move)}}),o});
},{}],2:[function(require,module,exports){
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
},{}],3:[function(require,module,exports){
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


},{"Draggable":1}],4:[function(require,module,exports){
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
  searchInput.blur()
}

const openSearch = () => {
  search.classList.add('open')
  setTimeout(() => { searchInput.focus()}, 200)
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
  
  if (marqueeEl) {
    console.log('yo')
    marquee()
  }

  if (space) require('./drag') 
  if (careerPosts) handleCareers()
}

document.addEventListener('DOMContentLoaded', init)


},{"./drag":3,"./marquee":5,"./util":6}],5:[function(require,module,exports){
const Marquee3k = require('marquee3000')

module.exports = () => {
  Marquee3k.init()
}


},{"marquee3000":2}],6:[function(require,module,exports){
const getRand = (min = 0, max) => {
  return Math.floor(Math.random() * (max - min) + min)
}

module.exports = {
  getRand
}


},{}]},{},[4]);
