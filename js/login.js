function esqueciSenha () {
    /*var email = window.prompt("Digite seu e-mail cadastrado", "");
    document.getElementById('email_esqueci_senha').value = email;
    var nova_senha = window.prompt("Digite sua nova senha", "");
    document.getElementById('nova_senha').value = nova_senha;*/
    var login = document.getElementById('form_login');
    var troca_senha = document.getElementById('troca_senha');

    login.style.display = "none";
    troca_senha.style.display = "block";
}

function voltarLogin() {
    var login = document.getElementById('form_login');
    var troca_senha = document.getElementById('troca_senha');

    login.style.display = "block";
    troca_senha.style.display = "none";
}