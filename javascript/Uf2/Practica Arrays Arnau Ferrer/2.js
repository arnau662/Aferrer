var num = 0;
var lista = [];
let text = document.getElementById("text");

document.getElementById("addend").addEventListener("click", () => {
   num = Math.round(Math.random()*10);
   lista.push(num);
   text.innerHTML = lista.join("-");

});

document.getElementById("remend").addEventListener("click", () => {
    lista.pop();
    if (lista.length == 0) {
        text.innerHTML = "No hi ha res";
    } else {
        text.innerHTML = lista.join("-")
    }
});

document.getElementById("addstart").addEventListener("click", () => {
    num = Math.round(Math.random()*10);
    lista.unshift(num);
    text.innerHTML = lista.join("-");
 
});

document.getElementById("remstart").addEventListener("click", () => {
    lista.shift();
    if (lista.length == 0) {
        text.innerHTML = "No hi ha res";
    } else {
        text.innerHTML = lista.join("-")
    }
});