const icon = document.getElementById('icon');
window.glob = 0;



icon.addEventListener("click", () => {
    document.body.classList.toggle("dark-mode");
})