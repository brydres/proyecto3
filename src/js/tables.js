var tablaCalificaciones = document.querySelector("#tablaCalificaciones");

var dataTable01 = new DataTable(tablaCalificaciones, {
    perPageSelect: false,
});

var tablaClasesInscritas = document.querySelector("#tablaClasesInscritas");

var dataTable02 = new DataTable(tablaClasesInscritas, {
    perPageSelect: true,
});

var tablaPermisos = document.querySelector("#tablaPermisos");

var dataTable03 = new DataTable(tablaPermisos, {
    perPageSelect: false,
});

var tablaMaestros = document.querySelector("#tablaMaestros");

var dataTable04 = new DataTable(tablaMaestros, {
    perPageSelect: false,
});

var tablaMaestros = document.querySelector("#tablaAlumnos");

var dataTable05 = new DataTable(tablaAlumnos, {
    perPageSelect: false,
});

var tablaClasses = document.querySelector("#tablaClasses");

var dataTable06 = new DataTable(tablaClasses, {
    perPageSelect: false,
});

var tablaAlumnos4Profe = document.querySelector("#tablaAlumnos4Profe");

var dataTable07 = new DataTable(tablaAlumnos4Profe, {
    perPageSelect: false,
});