function clicked(elem) {
   if(elem.classList.contains('clicked'))
        elem.classList.remove('clicked');
   else
       elem.classList.add('clicked');
}

function login_animate() {
    let welcome = document.querySelector("section#welcome");
    let login = document.querySelector("section.login_form");

    welcome.style.opacity = "0";
    login.style.opacity = "1";
}

function login_deanimate() {
    let welcome = document.querySelector("section#welcome");
    let login = document.querySelector("section.login_form");

    welcome.style.opacity = "1";
    login.style.opacity = "0";
}



