
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

let deleteButtons;

function initListeners() {
    deleteButtons = document.querySelectorAll("div.one_flashcard > .delete > button");

    for(let i=0; i<deleteButtons.length; i++) {
        if(!deleteButtons[i].classList.contains("y")) {
            deleteButtons[i].addEventListener("click", deleteFlashcard);
            deleteButtons[i].classList.add("y");
        }
    }
}

function addFlashcard() {
    let div = document.createElement("div");
    div.classList.add("one_flashcard");
    div.innerHTML = '<div class="input"><div><input type="text" name="title" placeholder=" " autocomplete="off" required><span>Słówko</span></div></div><div class="input"><div><input type="text" name="title" placeholder=" " autocomplete="off" required><span>Definicja</span></div></div><div class="delete"><button><i class="fas fa-trash-alt"></i></button></div>';
    let flashcards = document.querySelector("#flashcards_mod > div");
    console.dir(div);
    div.lastChild.addEventListener("click", deleteFlashcard);
    flashcards.appendChild(div);
}

function deleteFlashcard(e) {
    let x = e.target;
    x = x.parentNode.parentNode.parentNode;
    x.remove();
}

window.onload = initListeners();

document.querySelector("button.add_flashcard").addEventListener("click", addFlashcard);
document.querySelector(".add_buttons > div > button").addEventListener("click", () => {
   let amount = document.getElementById("flashcardNumber").value;
   for(let i = 0; i < amount; i++) {
       addFlashcard();
   }
});