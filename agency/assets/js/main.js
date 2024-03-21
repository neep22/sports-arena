let  flag = 0;

function controller(x){
    flag = flag + x;
    slideshow(flag)

}

slideshow(flag)


function slideshow(num){
    let slides = document.getElementsByClassName('slide');

    if(num == slides.length){

        flag = 0;
        num = 0;

    }

    if(num < 0 ){
        flag = slides.length-1;
        num = slides.length-1;
    }

    for(let show of slides){

        show.style.display ="none";
    }

    slides[num].style.display = "block"
    
}

/* Banner Slide */

const images = document.querySelectorAll('.carousel-inner.carousel-item img');
const prev = document.querySelector('.carousel-control-prev');
const next = document.querySelector('.carousel-control-next');
let current = 0; 

prev.addEventListener('click', () => {
    images[current].classList.remove('active');
    current--;
    if (current < 0) {
        current = images.length - 1;
      }

    images[current].classList.add('active');
   
  });

  next.addEventListener('click', () => {
    images[current].classList.remove('active');
    current++;
    if (current === images.length) {
        current = 0;
      }

    images[current].classList.add('active');

  });
  setInterval(() => {
    images[current].classList.remove('active');
    current++;
    if (current === images.length) {
        current = 0;
      }

    images[current].classList.add('active');
  
  }, 1000);
  







