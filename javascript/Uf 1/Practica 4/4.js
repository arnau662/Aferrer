var coincidencias = 0

function start(){
    var llista=["PlantsVsZombies/planta1.jpg","PlantsVsZombies/planta2.jpg","PlantsVsZombies/planta3.jpg","PlantsVsZombies/zombie1.jpg","PlantsVsZombies/zombie2.jpg","PlantsVsZombies/zombie3.jpg"]
    var imagen = document.querySelectorAll("img");
    var llista2=[];
    for (i=0; i<imagen.length; i++){
        var num=Math.floor(Math.random() * 6);
        imagen[i].src=llista[num];
        llista2.push(num);
    }   
    for(i = 0;i<llista.length;i++){
        let repe = 0;
        for(v = 0;v<llista2.length;v++){
            if(i == llista2[v]){
                repe++;
            }
        }
        if(repe > 1){
            coincidencias += repe-1;
        }
    }
        

    
    document.querySelector("#resultat").innerHTML="Hi ha: "+coincidencias+"coincidencias";
}