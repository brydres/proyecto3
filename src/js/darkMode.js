const btnD = document.getElementById("btnDark");
const sun = document.getElementById("sun");
const moon = document.getElementById("moon");

btnD.addEventListener("click", () => {
    document.documentElement.classList.toggle("dark");
    sun.classList.toggle("hidden");
    moon.classList.toggle("hidden");
});