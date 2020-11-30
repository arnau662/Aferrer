var texto = document.getElementById("text");
var boto = document.getElementById("boton");

boto.addEventListener("click", () => {
    var string = document.getElementById("textarea").value;
	if (string != "") {
	    var paraules = string.split(" ");
	    var paraulesinv = [];
		texto.innerHTML = "Nombre de paraules: " + paraules.length + "<br>";
		texto.innerHTML += "Primera paraula:" + paraules[0] + "<br>";
		texto.innerHTML += "Darrera paraula: " + paraules[paraules.length-1] + "<br>";
		for (var n = paraules.length-1; n >= 0; n--) {
			paraulesinv.push(paraules[n]);
		}
		texto.innerHTML += "A la inversa: " + paraulesinv.join(", ") + "<br>";
		paraules.sort();
		texto.innerHTML += "Ordenades de la A a la Z: " + paraules.join(", ") + "<br>";
		paraules.sort( (a, b) => a - b );
		texto.innerHTML += "Ordenades de la Z a la A: " + paraules.join(", ") + "<br>";
	} else {
		texto.innerHTML = "";
    }
})
