var algo = localStorage.getItem("ex2cont");
if (algo == null || algo == "NaN"){
    localStorage.setItem("ex2cont","0");
}else{
    let valor = parseInt(algo);
    valor+=1;   
    localStorage.setItem("ex2cont",valor.toString());
    
}
algo = localStorage.getItem("ex2cont");
document.querySelector("#ex2").innerHTML = algo;

colpag = localStorage.getItem("color");
document.querySelector("#body").style.backgroundColor = colpag;