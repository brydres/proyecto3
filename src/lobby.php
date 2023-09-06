<?php
session_start();
if ($_SESSION) {
    require("connection.php");
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lobby</title>
        <link href="../dist/output.css" rel="stylesheet">
        <script src="./js/main.js" defer></script>
        <script src="./js/tables.js" defer></script>
        <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
        <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript">
        </script>
        <script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
    </head>

    <body>
        <div class="bg-[#f1f3f5] h-screen w-screen flex">
            <section id="toggleMenu" class="h-full w-1/6 bg-[#30363b]">
                <a id="toggleMenuU" class="h-16 w-full border-b flex md:justify-start justify-center md:pl-4 items-center" href="./lobby.php">
                    <div class=" h-12 w-12 rounded-full overflow-hidden">
                        <img class="h-12 w-12" src="../assets/logoQ.jpg" alt="LogoUni.jpg" />
                    </div>
                    <p id="Uni" class="md:flex hidden text-white pl-3 text-xl">Universidad</p>
                </a>
                <div id="CARGO" class="md:flex hidden h-28 w-full border-b flex-col justify-around items-start text-white p-4">
                    <p class=" text-xl"><?php print_r($_SESSION["cargo"]); ?></p>
                    <p class="truncate w-full"><?php print_r($_SESSION["nombre"] . " " . $_SESSION["apellido"]); ?></p>
                </div>
                <div class="w-full flex flex-col justify-center items-center text-white">
                    <p id="MENU_AD" class="p-4 md:flex hidden">MENU <?php print_r($_SESSION["menuCargo"]); ?></p>
                    <button id="btnPermisos" class="<?php print_r($_SESSION['pemision2']);
                                                    print_r($_SESSION['pemision3']); ?> w-full flex md:justify-start justify-center items-center p-4 hover:bg-[#3d4449]">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" />
                        </svg>

                        <p id="pPermisos" class="md:flex hidden pl-2">Permisos</p>
                    </button>
                    <button id="btnMaestros" class="<?php print_r($_SESSION['pemision2']);
                                                    print_r($_SESSION['pemision3']); ?> w-full flex md:justify-start justify-center items-center p-4 hover:bg-[#3d4449]">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                        </svg>

                        <p id="pMaestros" class="md:flex hidden pl-2">Maestros</p>
                    </button>
                    <button id="btnAlumnos" class="<?php print_r($_SESSION['pemision2']);
                                                    print_r($_SESSION['pemision3']); ?> w-full flex md:justify-start justify-center items-center p-4 hover:bg-[#3d4449]">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path d="M11.7 2.805a.75.75 0 01.6 0A60.65 60.65 0 0122.83 8.72a.75.75 0 01-.231 1.337 49.949 49.949 0 00-9.902 3.912l-.003.002-.34.18a.75.75 0 01-.707 0A50.009 50.009 0 007.5 12.174v-.224c0-.131.067-.248.172-.311a54.614 54.614 0 014.653-2.52.75.75 0 00-.65-1.352 56.129 56.129 0 00-4.78 2.589 1.858 1.858 0 00-.859 1.228 49.803 49.803 0 00-4.634-1.527.75.75 0 01-.231-1.337A60.653 60.653 0 0111.7 2.805z" />
                            <path d="M13.06 15.473a48.45 48.45 0 017.666-3.282c.134 1.414.22 2.843.255 4.285a.75.75 0 01-.46.71 47.878 47.878 0 00-8.105 4.342.75.75 0 01-.832 0 47.877 47.877 0 00-8.104-4.342.75.75 0 01-.461-.71c.035-1.442.121-2.87.255-4.286A48.4 48.4 0 016 13.18v1.27a1.5 1.5 0 00-.14 2.508c-.09.38-.222.753-.397 1.11.452.213.901.434 1.346.661a6.729 6.729 0 00.551-1.608 1.5 1.5 0 00.14-2.67v-.645a48.549 48.549 0 013.44 1.668 2.25 2.25 0 002.12 0z" />
                            <path d="M4.462 19.462c.42-.419.753-.89 1-1.394.453.213.902.434 1.347.661a6.743 6.743 0 01-1.286 1.794.75.75 0 11-1.06-1.06z" />
                        </svg>


                        <p id="pAlumnos" class="md:flex hidden pl-2">Alumnos</p>
                    </button>
                    <button id="btnClases" class="<?php print_r($_SESSION['pemision2']);
                                                    print_r($_SESSION['pemision3']); ?> w-full flex md:justify-start justify-center items-center p-4 hover:bg-[#3d4449]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6" />
                        </svg>

                        <p id="pClases" class="md:flex hidden pl-2">Clases</p>
                    </button>

                    <button id="btnCalificaciones" class="<?php print_r($_SESSION["pemision1"]);
                                                            print_r($_SESSION["pemision2"]); ?> w-full flex md:justify-start justify-center items-center p-4 hover:bg-[#3d4449]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 019 9v.375M10.125 2.25A3.375 3.375 0 0113.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 013.375 3.375M9 15l2.25 2.25L15 12" />
                        </svg>


                        <p id="pCalificaciones" class="md:flex hidden pl-2">Ver Calificaciones</p>
                    </button>
                    <button id="btnAdminis" class="<?php print_r($_SESSION["pemision1"]);
                                                    print_r($_SESSION["pemision2"]); ?> w-full flex md:justify-start justify-center items-center p-4 hover:bg-[#3d4449]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5m.75-9l3-3 2.148 2.148A12.061 12.061 0 0116.5 7.605" />
                        </svg>


                        <p id="pAdminis" class="md:flex hidden pl-2">Administra tus Clases</p>
                    </button>
                    <button id="btnAlumnos002" class="<?php print_r($_SESSION['pemision3']);
                                                        print_r($_SESSION['pemision1']); ?> w-full flex md:justify-start justify-center items-center p-4 hover:bg-[#3d4449]">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path d="M11.7 2.805a.75.75 0 01.6 0A60.65 60.65 0 0122.83 8.72a.75.75 0 01-.231 1.337 49.949 49.949 0 00-9.902 3.912l-.003.002-.34.18a.75.75 0 01-.707 0A50.009 50.009 0 007.5 12.174v-.224c0-.131.067-.248.172-.311a54.614 54.614 0 014.653-2.52.75.75 0 00-.65-1.352 56.129 56.129 0 00-4.78 2.589 1.858 1.858 0 00-.859 1.228 49.803 49.803 0 00-4.634-1.527.75.75 0 01-.231-1.337A60.653 60.653 0 0111.7 2.805z" />
                            <path d="M13.06 15.473a48.45 48.45 0 017.666-3.282c.134 1.414.22 2.843.255 4.285a.75.75 0 01-.46.71 47.878 47.878 0 00-8.105 4.342.75.75 0 01-.832 0 47.877 47.877 0 00-8.104-4.342.75.75 0 01-.461-.71c.035-1.442.121-2.87.255-4.286A48.4 48.4 0 016 13.18v1.27a1.5 1.5 0 00-.14 2.508c-.09.38-.222.753-.397 1.11.452.213.901.434 1.346.661a6.729 6.729 0 00.551-1.608 1.5 1.5 0 00.14-2.67v-.645a48.549 48.549 0 013.44 1.668 2.25 2.25 0 002.12 0z" />
                            <path d="M4.462 19.462c.42-.419.753-.89 1-1.394.453.213.902.434 1.347.661a6.743 6.743 0 01-1.286 1.794.75.75 0 11-1.06-1.06z" />
                        </svg>

                        <p id="pAlumnos002" class="md:flex hidden pl-2">Alumnos</p>
                    </button>
                </div>
            </section>
            <div id="section01" class="flex flex-col h-full w-5/6 justify-between items-center">
                <section class=" flex flex-col w-full h-[90%] justify-start items-center">
                    <nav class="h-16 w-full bg-white flex md:justify-between justify-end items-center border">
                        <div class="hidden md:flex h-full justify-start items-center">
                            <div id="btnOpen" class="h-full w-16 flex justify-center items-center hover:bg-[#f2f2f2]">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                </svg>
                            </div>

                            <p class="pl-4">Home</p>
                        </div>
                        <div id="open" class="flex h-full md:w-48 w-40 justify-end items-center px-4 hover:bg-[#f2f2f2]">
                            <p class="pr-2 truncate"><?php print_r($_SESSION["nombre"] . " " . $_SESSION["apellido"]); ?>
                            </p>
                            <svg id="spin" style="transition-duration: 500ms;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>

                        </div>
                        <ul id="toggle" class="flex flex-col justify-center items-center py-4  md:w-48 w-40 border rounded-b-xl bg-white absolute right-0 md:top-16 top-[63px] collapse z-10">

                            <div class=" w-11/12 border-b border-gray">
                                <button id="btnProfile" class="hover:bg-gray-200 w-full flex justify-start items-center rounded-2xl px-4">
                                    <svg class="md:w-6 md:h-6 w-4 h-4 text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="gray" viewBox="0 0 20 20">
                                        <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                                    </svg>
                                    <li class="text-gray-500 flex justify-center items-center p-3 md:text-base text-sm">My
                                        Profile</li>
                                </button>
                            </div>

                            <div class="w-11/12">
                                <a href="logout.php" class="hover:bg-gray-200 text-red-600 flex justify-start items-center rounded-2xl px-4">
                                    <svg class="md:w-6 md:h-6 w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                                        <path stroke="red" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
                                    </svg>
                                    <li class="flex justify-center items-center p-3 md:text-base text-sm">
                                        Log out
                                    </li>
                                </a>
                            </div>

                        </ul>
                    </nav>
                    <div class="h-16 w-11/12  flex justify-between items-center">
                        <p id="title01" class="truncate  text-xl md:text-2xl font-medium pr-4">Dashboard</p>
                        <p class="text-xs md:text-base"><a href="./lobby.php" class=" text-sky-500">Home</a> / <span id="title02">Dashboard</span></p>
                    </div>
                    <section id="sectionBienvenida" class="flex w-11/12  justify-start items-start">
                        <card class=" w-[540px] p-4 bg-white border">
                            <p>Bienvenido</p>
                            <p>Seleciona la acción que quieres realizar en la pestaña de menu de la izquierda</p>
                        </card>
                    </section>
                    <section id="sectionPermisos" class="hidden flex border md:h-[77%] h-[70%] w-11/12  justify-start items-start">
                        <?php include("./permisos.php"); ?>
                    </section>
                    <section id="sectionMaestros" class="hidden flex border md:h-[77%] h-[70%] w-11/12  justify-start items-start">
                        <?php include("./listaMaestros.php"); ?>
                    </section>
                    <section id="sectionAlumnos" class="hidden flex border md:h-[77%] h-[70%] w-11/12  justify-start items-start">
                        <?php include("./listaAlumnos.php"); ?>
                    </section>
                    <section id="sectionClases" class="hidden flex border md:h-[77%] h-[70%] w-11/12  justify-start items-start">
                        <?php include("./listaClasses.php"); ?>
                    </section>

                    <section id="sectionCalificaciones" class="hidden flex border md:h-[77%] h-[70%]  w-11/12  justify-start items-start">
                        <?php include("./calificMensajes.php"); ?>
                    </section>
                    <section id="sectionAdminis" class="hidden flex  md:flex-row flex-col md:h-[77%] h-[70%] w-11/12  justify-between items-start">
                        <?php include("./adminisClases.php"); ?>
                    </section>

                    <section id="sectionEditar" class="hidden flex md:h-[77%] h-[70%] w-11/12 justify-start items-start">
                        <?php include("./editarDatos.php"); ?>
                    </section>

                    <section id="sectionAlumnosDelProfe" class="hidden flex md:h-[77%] h-[70%] w-11/12 justify-start items-start">
                        <?php include("./alumnosDelProfe.php"); ?>
                    </section>
                </section>
            </div>
        </div>
    </body>

    </html>
<?php
} else {
    header("Location:index.php");
}
?>