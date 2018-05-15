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

