var num = 0;
var lista = [];
var filter = [];
let text = document.getElementById("text");

while (lista.length < 30){ 
    num = Math.round(Math.random()*10);
    lista.push(num);
}

lista.sort((a, b) => a - b);
text.innerHTML = "Numeros: " +lista.join(",") + "<br>";

filter = lista.filter((num2) => {
    if ((num2 % 2) == 0){
        return true;
    }
})

text.innerHTML += "Numeros parells: "+filter.join(",") + "<br>";