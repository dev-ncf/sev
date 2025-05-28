const btn = document.getElementById('dot');
const container = document.getElementById('container');

// Verifica se os elementos existem antes de acessar suas propriedades
if (btn && container) {
    btn.addEventListener("click", () => {
        container.style.display = 'none';
    });
    setTimeout(() => {
        container.style.display = 'none';
    }, 10000);
}



