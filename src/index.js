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

