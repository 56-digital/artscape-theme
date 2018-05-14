const getRand = (min = 0, max) => {
  return Math.floor(Math.random() * (max - min) + min)
}

module.exports = {
  getRand
}

