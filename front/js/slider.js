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
    //wlaczyc widocznosc na kolejnej fiszce
    if(slidesArray.length>focusedSlide+1) {
        slidesArray[focusedSlide + 1].style.opacity = "1";

        //przesunac fiszki
        offset -= 32.235; //todo jednak nie robic tego vw
        slides[0].style.transform = "translate(" + offset + "vw)";
        slidesArray[focusedSlide].children[0].classList.remove('clicked');

        //zmienic aktualna fiszke
        focusedSlide++;
    }
}

function prevSlide() {
    if(focusedSlide>=1) {
        slidesArray[focusedSlide-1].style.opacity = "1";

        offset += 32.235;
        slides[0].style.transform = "translate(" + offset + "vw)";
        slidesArray[focusedSlide].children[0].classList.remove('clicked');
        // slidesArray[focusedSlide].style.opacity = "0";

        focusedSlide--;
    }
}

document.onLoad = sliderInit();