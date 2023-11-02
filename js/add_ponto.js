const output = document.getElementById('img_ponto');
if (window.FileList && window.File && window.FileReader) {
    document.getElementById('input').addEventListener('change', event => {
        output.src = '';
        const file = event.target.files[0];
        if (!file.type) {
        return;
        }
        if (!file.type.match('image.*')) {
        return;
        }
        const reader = new FileReader();
        reader.addEventListener('load', event => {
        output.src = event.target.result;
        });
        reader.readAsDataURL(file);
    }); 
}

function getSrc() {
  var img = document.getElementById('img_ponto'); 
  img.getAttribute("src");
  return img;
}

//API ViaCEP
function limpa_formulário_cep() {
  //Limpa valores do formulário de cep.
  document.getElementById('rua').value=("");
  document.getElementById('bairro').value=("");
  document.getElementById('cidade').value=("");
  document.getElementById('uf').value=("");
}

function meu_callback(conteudo) {
if (!("erro" in conteudo)) {
  //Atualiza os campos com os valores.
  document.getElementById('rua').value=(conteudo.logradouro);
  document.getElementById('bairro').value=(conteudo.bairro);
  document.getElementById('cidade').value=(conteudo.localidade);
  document.getElementById('uf').value=(conteudo.uf);
} //end if.
else {
  //CEP não Encontrado.
  limpa_formulário_cep();
  alert("CEP não encontrado.");
}
}

function pesquisacep(valor) {

//Nova variável "cep" somente com dígitos.
var cep = valor.replace(/\D/g, '');

//Verifica se campo cep possui valor informado.
if (cep != "") {

  //Expressão regular para validar o CEP.
  var validacep = /^[0-9]{8}$/;

  //Valida o formato do CEP.
  if(validacep.test(cep)) {

      //Preenche os campos com "..." enquanto consulta webservice.
      document.getElementById('rua').value="...";
      document.getElementById('bairro').value="...";
      document.getElementById('cidade').value="...";
      document.getElementById('uf').value="...";

      //Cria um elemento javascript.
      var script = document.createElement('script');

      //Sincroniza com o callback.
      script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

      //Insere script no documento e carrega o conteúdo.
      document.body.appendChild(script);

  } //end if.
  else {
      //cep é inválido.
      limpa_formulário_cep();
      alert("Formato de CEP inválido.");
  }
} //end if.
else {
  //cep sem valor, limpa formulário.
  limpa_formulário_cep();
}
};

/*document.getElementById('input').onchange = function (e) {
    readImage(e)
};*/

//const status = document.getElementById('status');
   /* const output = document.getElementById('output');
      if (window.FileList && window.File && window.FileReader) {
        document.getElementById('input').addEventListener('change', event => {
          output.src = '';
          //status.textContent = '';
          const file = event.target.files[0];
          if (!file.type) {
            //status.textContent = 'Error: The File.type property does not appear to be supported on this browser.';
            return;
          }
          if (!file.type.match('image.*')) {
           // status.textContent = 'Error: The selected file does not appear to be an image.'
            return;
          }
          const reader = new FileReader();
          reader.addEventListener('load', event => {
            output.src = event.target.result;
          });
          reader.readAsDataURL(file);
        }); 
    }*/

/*function readImage(file) {
    // Check if the file is an image.
    if (file.type && !file.type.startsWith('image/')) {
      console.log('File is not an image.', file.type, file);
      return;
    }
  
    const reader = new FileReader();
    reader.addEventListener('load', (event) => {
      img.src = event.target.result;
    });
    reader.readAsDataURL(file);
}
  

/*var elementoImg = document.getElementById('img_ponto');
var elementoInput = document.getElementById('input');

elementoInput.onchange = function (e) {
    var novaImg = elementoInput.get
}*/