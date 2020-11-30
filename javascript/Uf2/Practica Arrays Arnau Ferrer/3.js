var num = 0;
var lista1 = [];
var lista2 = [];
var lista3 = [];
let text = document.getElementById("text");

for (var x = 0; x < 10; x++) {
    num = Math.round(Math.random()*10);
    lista1.push(num);
    num = Math.round(Math.random()*10);
    lista2.push(num);
}

lista1.sort((a, b) => a -b);
lista2.sort((a, b) => a -b);

for (var x = 0; x < lista1.length; x++) {
    for (var y = 0; y < lista2.length; y++) {
        if (lista1[x] == lista2[y]){
            lista3.push(lista1[x]);
        }
    }
}

text.innerHTML = "Primer vector: "+lista1;
text.innerHTML += "<br>Segon vector: "+lista2;

text.innerHTML += "<br>Tercer vector amb foreach: ";
lista3.forEach((valor, pos) => {
	text.innerHTML += valor;
	if (pos == (lista3.length-1)) {
		text.innerHTML += ".";
	} else {
		text.innerHTML += ",";
	}
});