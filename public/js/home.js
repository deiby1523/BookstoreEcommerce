document.addEventListener("DOMContentLoaded", function () {


    setTimeout(function () {
        const load = document.getElementById("load");
        const spin = document.getElementById("spin");
        const html = document.getElementById("html");
        spin.classList.add("loading");
        load.classList.remove("loading");
        document.body.classList.remove("loading");
        html.classList.remove("loading");
        load.classList.add("load");
    }, 2000);
});

if (screen.width < 900) {
    // Small screen

    // Ocultar objetos con la clase desktopBanner en pantallas pequeñas
    const desktopBanners = document.querySelectorAll('.desktopBanner');
    for (let i = 0; i < desktopBanners.length; i++) {
        desktopBanners[i].classList.add('d-none');
    }
} else {
    // Big screen

    // Ocultar objetos con la clase phoneBanner en pantallas grandes
    const phoneBanners = document.querySelectorAll('.phoneBanner');
    for (let j = 0; j < phoneBanners.length; j++) {
        phoneBanners[j].classList.add('d-none');
    }
}

// Carousel of categories, automatic slide change
document.addEventListener('DOMContentLoaded', function () {
    // Obtén la referencia al carousel
    var carousel = new bootstrap.Carousel(document.getElementById('carousel-categories'));

    // Establece el intervalo para cambiar al siguiente elemento cada 10 segundos
    var intervalo = setInterval(function () {
        carousel.next();
    }, 10000);

    // Detén el intervalo al pasar el ratón sobre el carousel
    document.getElementById('carousel-categories').addEventListener('mouseover', function () {
        clearInterval(intervalo);
    });

    // Reanuda el intervalo al quitar el ratón del carousel
    document.getElementById('carousel-categories').addEventListener('mouseout', function () {
        intervalo = setInterval(function () {
            carousel.next();
        }, 10000);
    });
});
