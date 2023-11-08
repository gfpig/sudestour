var elementoListaDestaques = document.getElementById('listaDestaques');
//var elementoListaPontos = document.getElementById('listaPontos');

var listaDeDestaques = ["../images/masp.jpg",
                      '../images/bondinho-rj.webp',
                      '../images/espirito-santo.jpg',
                      '../images/ouro-preto-mg.jpg',
                      '../images/masp.jpg',
                      "../images/masp.jpg",
                      '../images/bondinho-rj.webp',
                      '../images/espirito-santo.jpg',
                      '../images/ouro-preto-mg.jpg'];

var listaDeNomesDestaques = ["MASP",
                            'Bondinho',
                            'Praia ES',
                            'Ouro Preto',
                            'MASP 2',
                            "MASP",
                            'Bondinho',
                            'Praia ES',
                            'Ouro Preto'
                            ];  
                            
var listaEnderecosDestaques = ["Av. Paulista",
                               "Av. Pedro Álvares Cabral - SP",
                               "R. da Cantareira - SP",
                               "Pico de Montanha - Rj",
                               "Av. Paulista",
                               "Av. Paulista",
                               "Av. Pedro Álvares Cabral - SP",
                               "R. da Cantareira - SP",
                               "Pico de Montanha - Rj",
                            ];

//adicionando os pontos do vetor na tela
for (var i = 0; i < listaDeDestaques.length; ++i) {
    elementoListaDestaques.innerHTML += `
    <figure style="margin-top: 2%;">
      <img class=img_ponto src = ${listaDeDestaques[i]} title = ${listaDeNomesDestaques[i]}></img>
      <p class = legenda><b>${listaDeNomesDestaques[i]}</b></p>
      <p class = legenda>${listaEnderecosDestaques[i]}</p>
    </figure>`
}

//ADICIONANDO OS PONTOS NORMAIS POR FUNÇÃO
//function addNormais(nome, endereco, img) {
  let mySrc;
  const reader = new FileReader();
  reader.readAsDataURL(blob); 
  reader.onloadend = function() {
    // result includes identifier 'data:image/png;base64,' plus the base64 data
    mySrc = reader.result;     
  }

  /*var elementoListaPontos = document.getElementById('listaPontos');
  var nome = json_encode($NomeLocal, JSON_UNESCAPED_UNICODE);
  var endereco= json_encode($Logradouro, JSON_UNESCAPED_UNICODE);
  var imagem = json_encode($Imagem, JSON_UNESCAPED_UNICODE);*/

 /* $.ajax({
    url: 'saopaulo.php',
    type: 'get',
    result: {
        'yearFilter': yearFilter
    },
    dataType: 'json',
    success: function(data){
        $("#dummy").html(data.dummyvariable)
    }
});*/

  /*elementoListaPontos.innerHTML += `
    <figure style="margin-top: 2%;">
      <img src = ${mySrc} title = ${nome}></img>
      <p class = legenda>${nome}</p>
      <p class = legenda>${endereco}</p>
    </figure>`
//}

//adicionando os pontos normais do vetor na tela (mesmos vetores só pra testar)
/*for (var i = 0; i < listaDeDestaques.length; ++i) {
    elementoListaPontos.innerHTML += `
    <figure style="margin-top: 2%;">
      <img src = ${listaDeDestaques[i]} title = ${listaDeNomesDestaques[i]}></img>
      <p class = legenda>${listaDeNomesDestaques[i]}</p>
      <p class = legenda>${listaEnderecosDestaques[i]}</p>
    </figure>`
}*/

//<script type="text/javascript">
/*
       $(document).on('change','#cidades',function(){
             var val = $(this).val();
             $.ajax({
                   url: 'saopaulo.php',
                   data: {cidades:val},
                   type: 'GET',
                   dataType: 'html',
                   success: function(result){
                        $('#localidade').html();  
                        $('#localidade').html(result); 
                   }
              });
       });*/
  //</script>
//let selecionarCidade = document.getElementById("cidades");


/*selecionarCidade.onchange = () => {
  let selecionarBairro = document.getElementById("bairros");
  selecionarBairro.innerHTML = 
}*/