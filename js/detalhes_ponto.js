function favoritar() {
    var img = document.getElementById("img_fav");
}

function mostrarTabela() {
    var tb = document.getElementById("tabela_horas");
    if(tb.style.display == "none") {
        tb.style.display = "block";
    } else{
        tb.style.display = "none";
    }
}

function trocaAba(evt, cityName) {
    // Declare all variables
    var i, tabcontent, opcoes;
  
    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
  
    // Get all elements with class="tablinks" and remove the class "active"
    opcoes = document.getElementsByClassName("opcoes");
    for (i = 0; i < opcoes.length; i++) {
        opcoes[i].className = opcoes[i].className.replace(" active", "");
    }
  
    // Show the current tab, and add an "active" class to the button that opened the tab
    
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
} 