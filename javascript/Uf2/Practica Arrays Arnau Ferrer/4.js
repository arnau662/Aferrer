var pals = ["O", "E", "C", "B"];
var cartes1 = [];
var cartes2 = [];
var carta = "";
var num = 0;
let text = document.getElementById("text");

for (var x = 0; x < 4; x++){
    for (var num2 = 1; num2 <= 12; num2++){
        carta = num2 + pals[x];
        cartes1.push(carta)
    }
}

cartes1.sort(function(a, b){return 0.5 - Math.random()});

for (var x = 0; x < 5; x++) {
    num = Math.round(Math.random()* cartes1.length);
    cartes2.push(cartes1.pop(num));
}

cartes2.forEach(card => {
    text.innerHTML += "<br>" + card ;
    console.log(card);
})