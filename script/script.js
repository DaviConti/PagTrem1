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
document.addEventListener('DOMContentLoaded', () => {
  
    const backButton = document.getElementById('back-button');
    const homeButton = document.getElementById('home-button');


    if (backButton) {
        backButton.addEventListener('click', () => {
            alert('Você clicou no botão Voltar!');
         
        });
    }

    if (homeButton) {
        homeButton.addEventListener('click', () => {
            alert('Você clicou no botão Home!');
          
        });
    }

    
});