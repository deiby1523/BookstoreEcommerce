document.addEventListener("DOMContentLoaded", function() {


    setTimeout(function() {
        const load = document.getElementById("load");
        const spin = document.getElementById("spin");
        const html =document.getElementById("html");
        spin.classList.add("loading");
        load.classList.remove("loading");
        document.body.classList.remove("loading");
        html.classList.remove("loading");
        load.classList.add("load");
    }, 3000);
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
