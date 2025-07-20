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
    }, 1000);
});