document.addEventListener("DOMContentLoaded", () => {
    const toggle = document.getElementById("menu-toggle");
    const nav = document.querySelector("nav > ul");

    if (toggle && nav) {
        toggle.addEventListener("click", () => {
            nav.classList.toggle("visible");
            toggle.classList.toggle("active");
        });
    }
});