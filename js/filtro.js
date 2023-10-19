var elementoListaDestaques = document.getElementById('listaDestaques');

var listaDeDestaques = ["../images/masp.jpg",
                      '../images/bondinho-rj.webp',
                      '../images/espirito-santo.jpg',
                      '../images/ouro-preto-mg.jpg',
                      '../images/masp.jpg'];

var listaDeNomesDestaques = ["MASP",
                            'Bondinho',
                            'Praia ES',
                            'Ouro Preto'
                            ];                   
//adicionando os pontos do vetor na tela
for (var i = 0; i < listaDeDestaques.length; ++i) {
    elementoListaDestaques.innerHTML += `
    <figure style="margin-top: 5%;">
      <img src = ${listaDeDestaques[i]} title = ${listaDeNomesDestaques[i]}></img>
      <p class = legenda>${listaDeNomesDestaques[i]}</p>
    </figure>`
}