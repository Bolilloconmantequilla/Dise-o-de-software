// Carrete de imágenes
const items = document.querySelectorAll('.carousel-item');
let currentIndex = 0;

function showNextItem() {
    items[currentIndex].classList.remove('active');
    currentIndex = (currentIndex + 1) % items.length;
    items[currentIndex].classList.add('active');
}

function showPrevItem() {
    items[currentIndex].classList.remove('active');
    currentIndex = (currentIndex - 1 + items.length) % items.length;
    items[currentIndex].classList.add('active');
}

document.querySelector('.next').addEventListener('click', showNextItem);
document.querySelector('.prev').addEventListener('click', showPrevItem);

// Cambia la imagen cada 3 segundos (3000 milisegundos)
setInterval(showNextItem, 3000);

// Menú desplegable con vistas previas
const menuItems = document.querySelectorAll('.menu-item');

menuItems.forEach((item) => {
    const preview = item.querySelector('.preview');

    item.addEventListener('mouseenter', () => {
        preview.style.display = 'block'; // Muestra la vista previa
    });

    item.addEventListener('mouseleave', () => {
        preview.style.display = 'none'; // Oculta la vista previa
    });
});

// Barra de búsqueda funcional
const searchForm = document.querySelector('.search-form');
searchForm.addEventListener('submit', (event) => {
    event.preventDefault(); // Evita el envío por defecto del formulario

    const query = searchForm.querySelector('input[name="query"]').value.toLowerCase();

    // Simula una búsqueda básica
    const pages = {
        "inicio": "index.php",
        "mapa del plantel": "mapa.html",
        "preguntas frecuentes": "faq.html",
        "servicios": "servicios.html",
        "trámites escolares": "tramites-escolares.html",
        "trámites egresados": "tramites-egresados.html"
    };

    const page = Object.keys(pages).find(key => key.includes(query));

    if (page) {
        window.location.href = pages[page]; // Redirige a la página correspondiente
    } else {
        alert('No se encontró la página solicitada. Intenta con otra búsqueda.');
    }
});
