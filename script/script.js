// CADASTRO1 - Valida nome e nascimento, vai para cadastro2
function proximaEtapa() {
  const nome = document.getElementById("nome").value.trim();
  const nascimento = document.getElementById("nascimento").value.trim();
  const erro1 = document.getElementById("erro1");

  if (!nome || !nascimento) {
    erro1.textContent = "Preencha todos os campos.";
  } else {
    window.location.href = "cadastro2.html";
  }
}

// CADASTRO2 - Valida novamente e vai para cadastro3
function validarFormulario() {
  const nome = document.getElementById("nome").value.trim();
  const nascimento = document.getElementById("nascimento").value.trim();
  const erro = document.getElementById("mensagemErro");

  if (!nome || !nascimento) {
    erro.textContent = "Preencha todos os campos corretamente.";
    return false;
  } else {
    window.location.href = "cadastro3.html";
    return false; // para impedir envio real do formulário
  }
}

// CADASTRO3 - Clique em qualquer lugar vai para cadastro4
function irParaCadastro4() {
  window.location.href = "cadastro4.html";
}

// CADASTRO4 - Clique em qualquer lugar vai para email.html
function irParaEmail() {
  window.location.href = "email.html";
}

// EMAIL ENCONTRADO - Vai para dashboard depois de 2s
function redirecionarParaDashboard() {
  setTimeout(() => {
    window.location.href = "dashboard.html";
  }, 2000);
}

// E-MAIL NÃO ENCONTRADO - ícones navegam
document.addEventListener("DOMContentLoaded", () => {
  const homeBtn = document.getElementById("nav-home");
  const backBtn = document.getElementById("nav-back");
  const forwardBtn = document.getElementById("nav-forward");

  if (homeBtn) homeBtn.onclick = () => window.location.href = "cadastro1.html";
  if (backBtn) backBtn.onclick = () => history.back();
  if (forwardBtn) forwardBtn.onclick = () => history.forward();
});
function irParaTela2() {
  const nome = document.getElementById('nome').value.trim();
  const nascimento = document.getElementById('nascimento').value;

  if (nome === "" || nascimento === "") {
    alert("Por favor, preencha todos os campos.");
    return;
  }

  document.getElementById('tela1').classList.add('hidden');
  document.getElementById('tela2').classList.remove('hidden');
}

function enviarCadastro() {
  const email = document.getElementById('email').value.trim();
  const senha = document.getElementById('senha').value;

  if (email === "" || senha === "") {
    alert("Por favor, preencha todos os campos.");
    return;
  }

 
  alert("Cadastro concluído com sucesso!");
}
function validarLogin() {
  const usuario = document.getElementById("usuario").value.trim();
  const senha = document.getElementById("senha").value.trim();
  const mensagemErro = document.getElementById("mensagemErro");

  mensagemErro.textContent = "";


  if (usuario === "admin" && senha === "1234") {
    window.location.href = "menu.html"; 
  } else {
    mensagemErro.textContent = "Usuário ou senha inválidos.";
  }
}
