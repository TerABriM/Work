let menuIcon = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');

menuIcon.onclick = () => {
    menuIcon.classList.toggle('bx-x');
    navbar.classList.toggle('active');
}

// scroll sections
let sections = document.querySelectorAll('section');
let navLinks = document.querySelectorAll('header nav a');

window.onscroll = () => {
  sections.forEach(sec => {
      let top = window.scrollY;
      let offset = sec.offsetTop - 100;
      let height = sec.offsetHeight;
      let id = sec.getAttribute('id');

      if(top >= offset && top < offset + height) {
          // active navbar Links
          navLinks.forEach(links => {
              links.classList.remove('active');
              document.querySelector('header nav a[href*=' + id + ']').classList.add('active');
          });
          // active sections for animation on scroll
          sec.classList.add('show-animate');
      }
      // if want to use animation that repeats on scroll use this
      else {
          sec.classList.remove('show-animate');
      }
  });

  // sticky header
  let header = document.querySelector('header');
  
  header.classList.toggle('sticky', window.scrollY > 100);

  // remove toggle icon and navbar when click navbar Links (scroll)
  menuIcon.classList.remove('bx-x' ) ;
  navbar.classList.remove('active');

  // animation footer on scroll
  let footer = document.querySelector('footer');

  footer.classList.toggle('show-animate', this.innerHeight + this.scrollY >= document.scrollingElement.
  scrollHeight);
}



let point = document.querySelectorAll('.point')
let imageSlider = document.querySelectorAll('.imageSlider')
let leftBtn = document.getElementById('leftBtn')
let rightBtn = document.getElementById('rightBtn')

point[0].classList.add('activeImage')
imageSlider[0].classList.add('activeImage')

let counter = 0;

for(let i=0; i<point.length; i++){
    point[i].addEventListener('click',()=>{
        for(let k = 0; k<imageSlider.length; k++){
            point[k].classList.remove('activeImage')
            imageSlider[k].classList.remove('activeImage')
        }
        counter = i;
        imageSlider[counter].classList.add('activeImage');
        point[counter].classList.add('activeImage');
    })
}

leftBtn.addEventListener('click',()=>{
    for(let k = 0; k<imageSlider.length; k++){
        point[k].classList.remove('activeImage')
        imageSlider[k].classList.remove('activeImage')
    }
    counter--
    if (counter <0){
        counter = imageSlider.length-1
    }
    imageSlider[counter].classList.add('activeImage');
    point[counter].classList.add('activeImage');
})

rightBtn.addEventListener('click',()=>{
    for(let k = 0; k<imageSlider.length; k++){
        point[k].classList.remove('activeImage')
        imageSlider[k].classList.remove('activeImage')
    }
    counter++
    if (counter >= imageSlider.length){
        counter = 0
    }
    imageSlider[counter].classList.add('activeImage');
    point[counter].classList.add('activeImage');
})


function slowSlider () {
    for(let k = 0; k<imageSlider.length; k++){
        point[k].classList.remove('activeImage')
        imageSlider[k].classList.remove('activeImage')
    }
    counter++
    if (counter >= imageSlider.length){
        counter = 0
    }
    imageSlider[counter].classList.add('activeImage');
    point[counter].classList.add('activeImage');
}

let second = 1000*2
let TimerImage = setInterval(()=>slowSlider(), second)

let blockSlider = document.getElementById('blockSlider')
blockSlider.addEventListener('mouseover',()=>{
    clearInterval(TimerImage)
})

blockSlider.addEventListener('mouseleave',()=>{
    TimerImage = setInterval(()=>slowSlider(), second)
})