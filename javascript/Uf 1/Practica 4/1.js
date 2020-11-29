//JAVA


let google = document.querySelector("#google");
let micro = document.querySelector("#micro");
let ubuntu = document.querySelector("#ubuntu");
let w3c = document.querySelector("#w3c");

function styleOn(item){item.style.background='red'; item.style.color='white'; item.style.textTransform="uppercase";}
function styleOff(item){item.style.background='white'; item.style.color='red';item.style.textTransform="capitalize"}

google.addEventListener("mouseover" ,function() {styleOn(google);});   
google.addEventListener("mouseout", function() {styleOff(google);});

micro.addEventListener("mouseover" ,function() {styleOn(micro);});   
micro.addEventListener("mouseout", function() {styleOff(micro);});

ubuntu.addEventListener("mouseover" ,function() {styleOn(ubuntu);});   
ubuntu.addEventListener("mouseout", function() {styleOff(ubuntu);});

w3c.addEventListener("mouseover" ,function() {styleOn(w3c);});   
w3c.addEventListener("mouseout", function() {styleOff(w3c);});
