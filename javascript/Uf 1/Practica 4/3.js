var i=0
function mas(){
  if (i==9){
    i=0
  }else{
    i++
  }
  var lista = ["Images3/0.png", "Images3/1.png", "Images3/2.png", "Images3/3.png", "Images3/4.png", "Images3/5.png", "Images3/6.png", "Images3/7.png", "Images3/8.png", "Images3/9.png"];
  document.querySelector("#imatg").src=lista[i]

  }
  function menos(){
  if (i==0){
    i=9
  }else{
    i--
  }
  var lista = ["Images3/0.png", "Images3/1.png", "Images3/2.png", "Images3/3.png", "Images3/4.png", "Images3/5.png", "Images3/6.png", "Images3/7.png", "Images3/8.png", "Images3/9.png"];
  document.querySelector("#imatg").src=lista[i]
  }