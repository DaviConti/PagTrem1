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
