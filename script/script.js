const dots = document.querySelectorAll('.dot');

dots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
        dots.forEach(d => d.classList.remove('active'));
        dot.classList.add('active');
    });
});

const navButtons = document.querySelectorAll('.nav-btn');

navButtons.forEach(btn => {
    btn.addEventListener('click', () => {
        alert(`Você clicou em: ${btn.textContent}`);
    });
});
function validarFormulario() {
  const email = document.getElementById("email").value.trim();
  const senha = document.getElementById("senha").value.trim();
  const mensagemErro = document.getElementById("mensagemErro");
  mensagemErro.innerText = "";

  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if (!emailRegex.test(email)) {
    mensagemErro.innerText = "Por favor, insira um e-mail válido.";
    return false;
  }

  if (senha.length < 6) {
    mensagemErro.innerText = "A senha deve conter pelo menos 6 caracteres.";
    return false;
  }

  alert("Cadastro realizado com sucesso!");
  return true;
}
function validarFormulario() {
  const email = document.getElementById("email").value.trim();
  const senha = document.getElementById("senha").value.trim();
  const mensagemErro = document.getElementById("mensagemErro");
  mensagemErro.innerText = "";

  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  const senhaRegex = /^(?=.*[a-zA-Z])(?=.*\d).{8,}$/;

  if (!emailRegex.test(email)) {
    mensagemErro.innerText = "Por favor, insira um e-mail válido.";
    return false;
  }

  if (!senhaRegex.test(senha)) {
    mensagemErro.innerText =
      "A senha deve ter pelo menos 8 caracteres, incluindo letras e números.";
    return false;
  }

  alert("Cadastro realizado com sucesso!");
  return true;
}
function validarFormulario() {
  const nome = document.getElementById("nome").value.trim();
  const nascimento = document.getElementById("nascimento").value.trim();
  const mensagemErro = document.getElementById("mensagemErro");

  mensagemErro.innerText = "";

  
  if (nome.length < 3) {
    mensagemErro.innerText = "O nome deve ter pelo menos 3 caracteres.";
    return false;
  }

  
  const regexData = /^(\d{2})\/(\d{2})\/(\d{4})$/;
  const match = nascimento.match(regexData);
  if (!match) {
    mensagemErro.innerText = "A data deve estar no formato dd/mm/aaaa.";
    return false;
  }

  const dia = parseInt(match[1]);
  const mes = parseInt(match[2]) - 1; 
  const ano = parseInt(match[3]);

  const dataNasc = new Date(ano, mes, dia);
  const hoje = new Date();
  const idade = hoje.getFullYear() - dataNasc.getFullYear();
  const mesDif = hoje.getMonth() - mes;

  if (
    idade < 13 ||
    (idade === 13 && mesDif < 0) ||
    (idade === 13 && mesDif === 0 && hoje.getDate() < dia)
  ) {
    mensagemErro.innerText = "Você precisa ter pelo menos 13 anos.";
    return false;
  }

  alert("Cadastro válido!");
  return true;
}
function proximaEtapa() {
  const nome = document.getElementById("nome").value.trim();
  const nascimento = document.getElementById("nascimento").value.trim();
  const erro1 = document.getElementById("erro1");
  erro1.innerText = "";

  if (nome.length < 3) {
    erro1.innerText = "Nome deve ter pelo menos 3 caracteres.";
    return;
  }

  const dataRegex = /^(\d{2})\/(\d{2})\/(\d{4})$/;
  const match = nascimento.match(dataRegex);

  if (!match) {
    erro1.innerText = "Formato de data inválido. Use dd/mm/aaaa.";
    return;
  }

  const dia = parseInt(match[1]);
  const mes = parseInt(match[2]) - 1;
  const ano = parseInt(match[3]);

  const dataNasc = new Date(ano, mes, dia);
  const hoje = new Date();
  const idade = hoje.getFullYear() - dataNasc.getFullYear();
  const m = hoje.getMonth() - mes;
  if (idade < 13 || (idade === 13 && (m < 0 || (m === 0 && hoje.getDate() < dia)))) {
    erro1.innerText = "Você precisa ter pelo menos 13 anos.";
    return;
  }

  document.getElementById("formEtapa1").classList.add("form-oculto");
  document.getElementById("formEtapa1").classList.remove("form-ativo");
  document.getElementById("formEtapa2").classList.remove("form-oculto");
  document.getElementById("formEtapa2").classList.add("form-ativo");
}

document.getElementById("formEtapa2").addEventListener("submit", function (e) {
  e.preventDefault();

  const email = document.getElementById("email").value.trim();
  const cpf = document.getElementById("cpf").value.trim();
  const erro2 = document.getElementById("erro2");
  erro2.innerText = "";

  const emailValido = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  const cpfValido = /^\d{11}$/;

  if (!emailValido.test(email)) {
    erro2.innerText = "E-mail inválido.";
    return;
  }

  if (!cpfValido.test(cpf)) {
    erro2.innerText = "CPF deve conter 11 dígitos numéricos.";
    return;
  }

  alert("Cadastro concluído com sucesso!");
  
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
