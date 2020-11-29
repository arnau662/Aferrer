tdcolor = document.querySelectorAll("td");
llista = ["red", "yellow", "gold", "green", "blue", "orange", "violet", "brown", "grey", "pink",];

for (i=0; i< tdcolor.length; i++)
{ 
    tdcolor[i].addEventListener("mouseover", (event) => { 
      event.target.style.background = llista[Math.floor(Math.random() * 10)];
    });

    tdcolor[i].addEventListener("mouseout", (event) => { 
        event.target.style.background = "white";
    });
}
