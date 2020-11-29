let algo = "";

document.querySelector("#ex3red").addEventListener("click" ,function() {algo="red";});   

document.querySelector("#ex3blue").addEventListener("click" ,function() {algo="blue";});    

document.querySelector("#ex3green").addEventListener("click" ,function() {algo="green";});  

document.querySelector("#ex3yellow").addEventListener("click" ,function() {algo="yellow";});   

document.querySelector("#ex3save").addEventListener("click" ,function() {setCookie("color",algo,365);location.href="./1.html";});  



function setCookie(camp, valor, dies) {
    var d = new Date();
    d.setTime(d.getTime() + (dies*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = camp + "=" + valor + ";" + expires; }