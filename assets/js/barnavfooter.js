document.addEventListener("DOMContentLoaded", function() {
    const accordion = document.querySelector(".accordion");
    const panel = document.querySelector(".panel");

    accordion.addEventListener("click", function() {
        panel.style.display = panel.style.display === "block" ? "none" : "block";
    });
});