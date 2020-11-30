var lista = [];
var listRep = [];
var algo = {};
var cont = 0;
let text = document.getElementById("text");


while (lista.length < 10){ 

    var random = Math.round(Math.random()*10);
    
    lista.push(random);
}

lista.forEach(function (item){
    if(!algo[item])
        algo[item] = 0;
        algo[item] += 1;
    
})

for (var prop in algo) {
    if(algo[prop] >= 2) {
        listRep.push(prop);
        cont++;
    }
 }

console.log(lista);
console.log(listRep);

if (cont == 0){
    text.innerHTML = "No hi han numeros repetits";

}else{
    text.innerHTML = "Aquets son els numeros repetits:" +listRep;
}
