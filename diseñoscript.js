// Desplazamiento suave al hacer clic en los enlaces del menú
document.querySelectorAll('a.nav-link').forEach(enlace => {
    enlace.addEventListener('click', function (evento) {
        evento.preventDefault();
        const id = this.getAttribute('href');
        document.querySelector(id).scrollIntoView({ behavior: 'smooth' });
    });
});
