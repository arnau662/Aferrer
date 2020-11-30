var num = 0;
var lista = [];
let text = document.getElementById("text");

while (lista.length < 10){ 
    num = Math.round(Math.random()*10);
    lista.push(num);
}

text.innerHTML = "Numeros: "+lista.join(",") + "<br>";
lista = lista.map( (i) => i+Math.round(Math.random()*10));
text.innerHTML += "Numeros sumats: "+lista.join(",") + "<br>";

lista = lista.map(function(i){
    if((i%2) == 0) {
        return i/2;
    } else {
        return i;
    }
})

text.innerHTML += "Numeros dividits: " +lista.join(",");