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

function wrap(elem) {
    elem.nextElementSibling.classList.toggle("unwrap");
}

function menageFlashcard(a) {
    let flashcards = document.querySelectorAll("div.one_flashcard");
    let parent = flashcards[0].parentNode;
    a = parseInt(a);
    if(a === -1) {
        let div = document.createElement("div");
        div.classList.add("one_flashcard");
        div.innerHTML =  '<div class="input"><div><input type="text" name="title" placeholder=" " autocomplete="off" required><span>Słówko</span></div></div><div class="input"><div><input type="text" name="title" placeholder=" " autocomplete="off" required><span>Definicja</span></div></div>';
        flashcards[0].parentNode.append(div);
    } else {
        //todo usuwanie do zaimplementowania
        parent.removeChild(flashcards[a]);
    }
}