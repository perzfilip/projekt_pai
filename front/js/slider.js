let slidesArray;
let slides;
let focusedSlide;
let offset = 0.0;

function sliderInit() {
    slidesArray = document.getElementsByClassName('slide');
    slides = document.getElementsByClassName('slides');
    console.log(slides);
    focusedSlide = 0;
    console.log(focusedSlide);
    console.log(slidesArray);
}

function nextSlide() {
    if(slidesArray.length>focusedSlide+1) {
        let temp = focusedSlide;
        let current = slidesArray[temp];
        let next = slidesArray[temp+1];
        if(slidesArray.length>temp+2)
            slidesArray[temp + 2].style.display = "block";

        current.children[0].classList.remove('clicked');
        current.style.transform = "translateY(200px)";
        current.style.opacity = 0;
        current.style.zIndex = 0;
        next.style.visibility = "visible";

        current.style.visibility = "hidden";
        next.style.opacity = 1;
        next.style.zIndex = 1;

        focusedSlide++;
    }
}

function prevSlide() {
    if(focusedSlide>=1) {
        let temp = focusedSlide;
        let current = slidesArray[temp];
        let next = slidesArray[temp-1];

        current.children[0].classList.remove('clicked');
        current.style.opacity = 0;
        current.style.zIndex = 0;
        current.style.visibility = "hidden";

        next.style.visibility = "visible";
        next.style.transform = "translate(-50%, -50%)";
        next.style.opacity = 1;
        next.style.zIndex = 1;

        focusedSlide--;
    }
}

document.onLoad = sliderInit();
