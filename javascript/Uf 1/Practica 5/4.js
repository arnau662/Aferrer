let algo = "";

document.querySelector("#ex3red").addEventListener("click" ,function() {algo="red";});   

document.querySelector("#ex3blue").addEventListener("click" ,function() {algo="blue";});    

document.querySelector("#ex3green").addEventListener("click" ,function() {algo="green";});  

document.querySelector("#ex3yellow").addEventListener("click" ,function() {algo="yellow";});   

document.querySelector("#ex3save").addEventListener("click" ,function() {localStorage.setItem("color",algo,365);location.href="./2.html";}); 