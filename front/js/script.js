function navbarDropdown() {
    document.getElementById("dropdown").classList.toggle("show");
}

window.addEventListener('load', function () {
    new Glider(document.querySelector('.glider'), {
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: {
            prev: '.glider-prev',
            next: '.glider-next'
        }
    })
});