var button1 = document.getElementById("dodajPolaznika");
var forma1 = document.getElementById("formaPolaznik");
var forma2 = document.getElementById("formaPredavac");


button1.addEventListener("click", function() {
    if(forma1.style.display === 'block') {
        forma1.style.display = 'none';
        forma2.style.display = 'block';
   }else {
        forma2.style.display = 'none';
        forma1.style.display = 'block';
    }
});

