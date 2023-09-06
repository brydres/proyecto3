const toggleBar = document.getElementById("toggle");
const toggleSpin = document.getElementById("spin");
const btnOpen = document.getElementById("open");

let spin = false;

btnOpen.addEventListener("click", () => {
    toggleBar.classList.toggle("collapse");
    spin = (!spin);
    // console.log(spin);
    if (spin == true) {
        toggleSpin.style.transform = "rotate(180deg)";
    } else if (spin == false) {
        toggleSpin.style.transform = "rotate(0deg)";
    }
});

const toggleMenu = document.getElementById("toggleMenu");
const toggleMenuU = document.getElementById("toggleMenuU");
const CARGO = document.getElementById("CARGO");
const Uni = document.getElementById("Uni");
const MENU_AD = document.getElementById("MENU_AD");
const pPermisos = document.getElementById("pPermisos");
const pMaestros = document.getElementById("pMaestros");
const pAlumnos = document.getElementById("pAlumnos");
const pClases = document.getElementById("pClases");
const pCalificaciones = document.getElementById("pCalificaciones");
const pAdminis = document.getElementById("pAdminis");
const pAlumnos002 = document.getElementById("pAlumnos002");
const section01 = document.getElementById("section01");

const btnTree = document.getElementById("btnOpen");

btnTree.addEventListener("click", () => {
    section01.classList.toggle("w-5/6");
    section01.classList.toggle("w-full");
    toggleMenu.classList.toggle("w-1/6");
    toggleMenu.classList.toggle("w-[250px]");
    toggleMenuU.classList.toggle("md:justify-start");
    toggleMenuU.classList.toggle("md:pl-4");
    toggleMenuU.classList.toggle("justify-center");
    CARGO.classList.toggle("md:flex");
    Uni.classList.toggle("md:flex");
    MENU_AD.classList.toggle("md:flex");
    pPermisos.classList.toggle("md:flex");
    pMaestros.classList.toggle("md:flex");
    pAlumnos.classList.toggle("md:flex");
    pClases.classList.toggle("md:flex");
    pCalificaciones.classList.toggle("md:flex");
    pAdminis.classList.toggle("md:flex");
    pAlumnos002.classList.toggle("md:flex");
});

// document.getElementById("btnSubmit").addEventListener("click", function () {
//     setTimeout(function () {
//         document.getElementById("messageError").classList.add("hidden");
//     }, 2000);
// });

//Botones del menu izquierdo
const btnPermisos = document.getElementById("btnPermisos");
const btnMaestros = document.getElementById("btnMaestros");
const btnAlumnos = document.getElementById("btnAlumnos");
const btnClases = document.getElementById("btnClases");

const btnCalific = document.getElementById("btnCalificaciones");
const btnAdminis = document.getElementById("btnAdminis");

const btnAlumnos002 = document.getElementById("btnAlumnos002");

const secBienvenida = document.getElementById("sectionBienvenida");
const secPermisos = document.getElementById("sectionPermisos");
const secMaestros = document.getElementById("sectionMaestros");
const secAlumnos = document.getElementById("sectionAlumnos");
const secClases = document.getElementById("sectionClases");

const secCalific = document.getElementById("sectionCalificaciones");
const secAdminis = document.getElementById("sectionAdminis");

const sectionEdit = document.getElementById("sectionEditar");
const sectionAlumnosDelProfe = document.getElementById("sectionAlumnosDelProfe");

btnPermisos.addEventListener("click", () => {
    secPermisos.classList.remove("hidden");
    // secPermisos.classList.add("flex");
    secBienvenida.classList.add("hidden");
    secMaestros.classList.add("hidden");
    secAlumnos.classList.add("hidden");
    secClases.classList.add("hidden");
    sectionEdit.classList.add("hidden");
    document.getElementById("title01").innerHTML = "Permisos";
    document.getElementById("title02").innerHTML = "Permisos";

    toggleBar.classList.add("collapse");
    if (spin == true) {
        toggleSpin.style.transform = "rotate(180deg)";
    } else if (spin == false) {
        toggleSpin.style.transform = "rotate(0deg)";
    }
});

btnMaestros.addEventListener("click", () => {
    secMaestros.classList.remove("hidden");

    secBienvenida.classList.add("hidden");
    secPermisos.classList.add("hidden");
    secAlumnos.classList.add("hidden");
    secClases.classList.add("hidden");
    sectionEdit.classList.add("hidden");
    document.getElementById("title01").innerHTML = "Maestros";
    document.getElementById("title02").innerHTML = "Maestros";

    toggleBar.classList.add("collapse");
    if (spin == true) {
        toggleSpin.style.transform = "rotate(180deg)";
    } else if (spin == false) {
        toggleSpin.style.transform = "rotate(0deg)";
    }
});

btnAlumnos.addEventListener("click", () => {
    secAlumnos.classList.remove("hidden");

    secBienvenida.classList.add("hidden");
    secPermisos.classList.add("hidden");
    secMaestros.classList.add("hidden");
    secClases.classList.add("hidden");
    sectionEdit.classList.add("hidden");
    document.getElementById("title01").innerHTML = "Alumnos";
    document.getElementById("title02").innerHTML = "Alumnos";

    toggleBar.classList.add("collapse");
    if (spin == true) {
        toggleSpin.style.transform = "rotate(180deg)";
    } else if (spin == false) {
        toggleSpin.style.transform = "rotate(0deg)";
    }
});

btnClases.addEventListener("click", () => {
    secClases.classList.remove("hidden");

    secBienvenida.classList.add("hidden");
    secPermisos.classList.add("hidden");
    secMaestros.classList.add("hidden");
    secAlumnos.classList.add("hidden");
    sectionEdit.classList.add("hidden");
    document.getElementById("title01").innerHTML = "Clases";
    document.getElementById("title02").innerHTML = "Clases";

    toggleBar.classList.add("collapse");
    if (spin == true) {
        toggleSpin.style.transform = "rotate(180deg)";
    } else if (spin == false) {
        toggleSpin.style.transform = "rotate(0deg)";
    }
});

btnCalific.addEventListener("click", () => {
    secBienvenida.classList.add("hidden");
    secCalific.classList.remove("hidden");
    secAdminis.classList.add("hidden");
    sectionEdit.classList.add("hidden");
    document.getElementById("title01").innerHTML = "Calificaciones y mensajes de tus clases";
    document.getElementById("title02").innerHTML = "Calificaciones";

    toggleBar.classList.add("collapse");
    if (spin == true) {
        toggleSpin.style.transform = "rotate(180deg)";
    } else if (spin == false) {
        toggleSpin.style.transform = "rotate(0deg)";
    }
});


btnAdminis.addEventListener("click", () => {
    secBienvenida.classList.add("hidden");
    secAdminis.classList.remove("hidden");
    secCalific.classList.add("hidden");
    sectionEdit.classList.add("hidden");
    document.getElementById("title01").innerHTML = "Esquema de Clases";
    document.getElementById("title02").innerHTML = "Clases";

    toggleBar.classList.add("collapse");
    if (spin == true) {
        toggleSpin.style.transform = "rotate(180deg)";
    } else if (spin == false) {
        toggleSpin.style.transform = "rotate(0deg)";
    }
});


//Button Profile 
const btnProfile = document.getElementById("btnProfile");
btnProfile.addEventListener("click", () => {
    sectionEdit.classList.remove("hidden");

    secBienvenida.classList.add("hidden");
    secMaestros.classList.add("hidden");
    secAlumnos.classList.add("hidden");
    secClases.classList.add("hidden");
    secPermisos.classList.add("hidden");
    secAdminis.classList.add("hidden");
    secCalific.classList.add("hidden");

    toggleBar.classList.toggle("collapse");
    spin = (!spin);
    if (spin == true) {
        toggleSpin.style.transform = "rotate(180deg)";
    } else if (spin == false) {
        toggleSpin.style.transform = "rotate(0deg)";
    }

    document.getElementById("title01").innerHTML = "Editar datos de perfil";
    document.getElementById("title02").innerHTML = "Editar datos";
});

btnAlumnos002.addEventListener("click", () => {
    secBienvenida.classList.add("hidden");

    sectionAlumnosDelProfe.classList.remove("hidden");
    document.getElementById("title01").innerHTML = "Alumnos de su Clase";
    document.getElementById("title02").innerHTML = "Alumnos";
});