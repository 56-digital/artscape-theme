var mobNavBtn = document.querySelectorAll('.mob-nav-btn')
var nav = document.querySelector('.nav')

mobNavBtn.forEach(function (el) {
  el.addEventListener('click', function () {
    nav.classList.toggle('open') 
  })
})
