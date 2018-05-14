(function(){function r(e,n,t){function o(i,f){if(!n[i]){if(!e[i]){var c="function"==typeof require&&require;if(!f&&c)return c(i,!0);if(u)return u(i,!0);var a=new Error("Cannot find module '"+i+"'");throw a.code="MODULE_NOT_FOUND",a}var p=n[i]={exports:{}};e[i][0].call(p.exports,function(r){var n=e[i][1][r];return o(n||r)},p,p.exports,r,e,n,t)}return n[i].exports}for(var u="function"==typeof require&&require,i=0;i<t.length;i++)o(t[i]);return o}return r})()({1:[function(require,module,exports){
const util = require('./util')

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
}

document.addEventListener('DOMContentLoaded', init)


},{"./util":2}],2:[function(require,module,exports){
const getRand = (min = 0, max) => {
  return Math.floor(Math.random() * (max - min) + min)
}

module.exports = {
  getRand
}


},{}]},{},[1]);
