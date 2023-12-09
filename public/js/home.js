// Function for load spinner
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

    // Hiding objects with the desktopBanner class on small screens
    const desktopBanners = document.querySelectorAll('.desktopBanner');
    for (let i = 0; i < desktopBanners.length; i++) {
        desktopBanners[i].classList.add('d-none');
    }
} else {
    // Big screen

    // Hiding objects with the phoneBanner class on large screens
    const phoneBanners = document.querySelectorAll('.phoneBanner');
    for (let j = 0; j < phoneBanners.length; j++) {
        phoneBanners[j].classList.add('d-none');
    }
}

// Carousel of categories, automatic slide change
document.addEventListener('DOMContentLoaded', function () {
    // Get the carousel reference
    var carousel = new bootstrap.Carousel(document.getElementById('carousel-categories'));

    // Sets the interval to change to the next item every 10 seconds
    var intervalo = setInterval(function () {
        carousel.next();
    }, 10000);

    // Stop the interval by hovering the mouse over the carousel
    document.getElementById('carousel-categories').addEventListener('mouseover', function () {
        clearInterval(intervalo);
    });

    // Resumes the interval when removing the mouse from the carousel
    document.getElementById('carousel-categories').addEventListener('mouseout', function () {
        intervalo = setInterval(function () {
            carousel.next();
        }, 10000);
    });
});
