var algo = getCookie("ex1cont");
if (algo == ""){
    setCookie("ex1cont",0, 365);
}else{
    let valor = parseInt(algo);
    valor+=1;   
    setCookie("ex1cont",valor,365);
}
algo = getCookie("ex1cont");
document.querySelector("#ex1").innerHTML = algo;

colpag = getCookie("color")
document.querySelector("#body").style.backgroundColor = colpag;


function getCookie(nom) {
    var name = nom + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length,c.length);
        }
    }           
    return "";
}

function setCookie(camp, valor, dies) {
    var d = new Date();
    d.setTime(d.getTime() + (dies*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = camp + "=" + valor + ";" + expires; }


