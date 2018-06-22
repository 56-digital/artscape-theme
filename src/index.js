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

const steps = document.querySelectorAll('.steps')

const mapIcons = document.querySelectorAll('.map-icon')
const iconParent = document.getElementById('icon-parent')
const iconClose = document.querySelectorAll('.icon-close')

const spaceOpened = document.getElementById('space-opened')
const spaceOpen = document.querySelector('.space-open')
const spaceClose = document.querySelector('.space-close')

const toggleSpace = () => {
  spaceOpen.addEventListener('click', () => {
    spaceOpened.classList.add('open')
  })

  spaceOpened.addEventListener('click', () => {
    spaceOpened.classList.remove('open')
  })
}

const toggleIcons = () => {
  mapIcons.forEach(icon => {
    const attr = icon.getAttribute('data-open')
    console.log(icon)
    icon.addEventListener('click', () => {
      iconParent.classList.add('open')
      iconParent.classList.add(`img-${attr}`)
    })
  })
  
  iconClose.forEach(el => {
    el.addEventListener('click', () => {
      iconParent.classList.remove('open')
      iconParent.classList.remove('img-access')
      iconParent.classList.remove('img-parking')
    })
  })
  
}


const createStepDivs = () => {
  const nums = ['ONE', 'TWO', 'THREE', 'FOUR', 'FIVE', 'SIX', 'SEVEN', 'EIGHT']
  steps.forEach((stepParent, i) => {
    const lilSteps = stepParent.querySelectorAll('.step')

    lilSteps.forEach((step, i) => {
      const rounded = step.querySelector('.rounded')
      const line = document.createElement('div')
      const stepTitle = step.querySelector('.step-title')

      stepTitle.innerHTML = `STEP ${nums[i]}` 
       
      line.classList.add('line') 
      rounded.classList.add('rounded')
      rounded.appendChild(line)
      putLine(step, i)

      window.addEventListener('resize', () => {
        putLine(step, i)
      })
    })
  })


}

const putLine = (step, i) => {
  i = parseInt(i)
  
  const stepEl = step.querySelector('.rounded')
  const stepOffset = offset(stepEl)
  const line = step.querySelector('.line')

  let nextStep = step.parentElement.querySelectorAll('.step')[i + 1]

  if (nextStep) {
    const nextEl = nextStep.querySelector('.rounded')
    const nextOffset = offset(nextEl)

    if (i % 2 === 0) {
      const lineWidth =  nextOffset.left - (stepOffset.left + stepEl.offsetWidth) + 2
      line.style.width = lineWidth + 'px' 
      line.style.right = -lineWidth + 'px'
      line.classList.add('line-vert')
     } else {
  

      const parent = offset(nextEl.parentElement.parentElement)

      const x1 = nextOffset.left + nextEl.offsetWidth - 6
      const y1 = nextOffset.top - parent.top + 3
      const x2 = stepOffset.left + 6 
      const y2 = (stepOffset.top + stepEl.offsetHeight) - parent.top - 3

      const dist = Math.ceil(Math.sqrt((x1-x2)*(x1-x2)+(y1-y2)*(y1-y2)));
      const angle = Math.atan2(y2-y1, x2-x1)*180/Math.PI;
      const xshift = dist - Math.abs(x2-x1);
      const yshift = Math.abs(y1-y2)/2;
    
      line.style.width = dist + 'px'
      line.style.left = (x1 - xshift/2) + 'px'
      line.style.top =  (Math.min(y1,y2) + yshift) + 'px'
      line.style.transform = `rotate(${angle}deg)`
      line.classList.add('line-hor')
    } 
  }
}


const handleScrolling = () => {
  checkScrollPos()

  window.addEventListener('scroll', () => {
    checkScrollPos()
  })
}

const checkScrollPos = () => {
  sections.forEach(el => {
    const off = offset(el)
    let win = window.scrollY + (window.innerHeight - window.innerHeight / 10)
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
  handleScrolling()
  setupHeader()
  setupNav()
  loadDataEls()
  handleVideos()
  handleSearchEvents()
  
  if (marqueeEl) {
    console.log('yo')
    marquee()
  }

  if (steps) createStepDivs()
  if (mapIcons) toggleIcons() 

  if (spaceOpened) toggleSpace()

  if (space) require('./drag') 
  if (careerPosts) handleCareers()
}

document.addEventListener('DOMContentLoaded', init)

