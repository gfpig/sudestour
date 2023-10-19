var elementoListaDestaques = document.getElementById('listaDestaques');
var elementoListaPontos = document.getElementById('listaPontos');

var listaDeDestaques = ["../images/masp.jpg",
                      '../images/bondinho-rj.webp',
                      '../images/espirito-santo.jpg',
                      '../images/ouro-preto-mg.jpg',
                      '../images/masp.jpg'];

var listaDeNomesDestaques = ["MASP",
                            'Bondinho',
                            'Praia ES',
                            'Ouro Preto',
                            'MASP 2'
                            ];  
                            
var listaEnderecosDestaques = ["Av. Paulista",
                               "Av. Pedro Álvares Cabral - SP",
                               "R. da Cantareira - SP",
                               "Pico de Montanha - Rj",
                               "Av. Paulista"
                            ];

//adicionando os pontos do vetor na tela
for (var i = 0; i < listaDeDestaques.length; ++i) {
    elementoListaDestaques.innerHTML += `
    <figure style="margin-top: 2%;">
      <img src = ${listaDeDestaques[i]} title = ${listaDeNomesDestaques[i]}></img>
      <p class = legenda>${listaDeNomesDestaques[i]}</p>
      <p class = legenda>${listaEnderecosDestaques[i]}</p>
    </figure>`
}

//adicionando os pontos normais do vetor na tela (mesmos vetores só pra testar)
for (var i = 0; i < listaDeDestaques.length; ++i) {
    elementoListaPontos.innerHTML += `
    <figure style="margin-top: 2%;">
      <img src = ${listaDeDestaques[i]} title = ${listaDeNomesDestaques[i]}></img>
      <p class = legenda>${listaDeNomesDestaques[i]}</p>
      <p class = legenda>${listaEnderecosDestaques[i]}</p>
    </figure>`
}