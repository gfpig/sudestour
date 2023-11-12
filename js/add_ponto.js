//function alteraImg() {
  if (window.FileList && window.File && window.FileReader) {
      const output = document.getElementById('img_ponto');
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
//}

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

//CONTADOR DE CARACTERES DA DESCRIÇÃO
/*let char = document.getElementById('char'); 

descricao.addEventListener('input', function () { 
  // count characters  
  let content = this.value; 
  char.textContent = content.length; 

  // remove empty spaces from start and end  
  content.trim(); 
  console.log(content); 
}); */

/*const msgInput = document.querySelector('.texto_descricao');
const msgCounter = document.querySelector('.counter');
const max = 100;

const ensureContentLength = (content, max) => {
  if (content.lenth > max) {
      return false;
  } else {
      return true;
  }
}

msgInput.onkeyup = function() {
  counter.innerHTML = max - this.value.length;
  if(!getCurrentContentLength(this.value, (max - 1))) {
    msgInput.disabled = true;
  }
}*/

//msgCounter.innerHTML = max -this.value.length;

/*const getCurrentContentLength = (content, max) => {
  const input = document.getElementsByClassName('texto_descricao');
  const maxLength = max;
  if (content.length > maxLength) {
    return false;
  } else {
    return true;
  }
}
const msgInput = document.querySelector(input);
const counter = document.querySelector('.counter');
const max = 100;
// Nope
// msgInput.addEventListener('keyup', (e) => {
//   console.log(e);
// });
msgInput.onkeyup = function() {
  counter.innerHTML = max - this.value.length;
  if(!getCurrentContentLength(this.value, (max - 1))) {
    msgInput.disabled = true;
  }
}*/