<card class=" w-full md:h-full h-[350px] bg-white border md:overflow-y-scroll md:overflow-x-hidden overflow-scroll">
    <div class="w-full h-fit border-b md:p-3 p-2 flex items-center justify-between">
        <p class="md:text-base text-xs">Alumnos de su Clase</p>

    </div>

    <div class="relative md:p-4 p-2 pt-0">
        <table id="tablaAlumnos4Profe" class="display  border md:text-base text-xs">

            <thead>
                <tr>
                    <th>#</th>
                    <th class="border">Nombre de Alumno</th>
                    <th class="border">Calificación</th>
                    <th class="border">Mensajes</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $id_info = $_SESSION["id_info"];
                $resultAlumnos4Profe = $mysqli->query("SELECT * FROM info WHERE id_info = '$id_info'");
                $rowsAlumnos4Profe = $resultAlumnos4Profe->fetch_assoc();

                $idTeacherClass = $rowsAlumnos4Profe["teacher_class"];

                if (empty($idTeacherClass)) {
                    echo "No hay alumnos inscritos a esta clase";
                } else {
                    $resultInfoClassAlumn4Profe = $mysqli->query("SELECT * FROM info_classes WHERE id_class_fk = '$idTeacherClass'");
                    $l = 1;
                    while ($datosInfoClassAlumn4Prof = $resultInfoClassAlumn4Profe->fetch_assoc()) {
                        $id_info_fk4P = $datosInfoClassAlumn4Prof["id_info_fk"];
                        $grade4P = $datosInfoClassAlumn4Prof["grade"];
                        $messages4P = $datosInfoClassAlumn4Prof["messages"];

                        $llamarNombres = $mysqli->query("SELECT * FROM info WHERE id_info = '$id_info_fk4P'");
                        $rowsLlamarNombres = $llamarNombres->fetch_assoc();
                        $rowsNombreCom = $rowsLlamarNombres["name"] . " " . $rowsLlamarNombres["lastname"];
                        echo "
                        <tr class='border'>
                            <td>$l</td>
                            <td>$rowsNombreCom</td>
                            <td>$grade4P</td>
                            <td>";
                        if ($messages4P == "") {
                            echo "<b class='px-2 py-1 text-white bg-[#229faf] rounded-md'>No hay mensajes</b>";
                        } else {
                            echo "$messages4P";
                        }
                        echo "</td>
                            <td class='flex justify-around'>"; ?>

                        <!-- Modal toggle -->
                        <form class="h-fit" method="post" action="./hallAnhadirCali.php">
                            <!-- <input class="hidden" name="iValue" value="$i" /> -->
                            <button data-modal-target="<?php print_r($l . "Modaless"); ?>" data-modal-toggle="<?php print_r($l . "Modaless"); ?>" type="button" class=" rounded-sm shadow hover:shadow-md hover:bg-blue-100">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#007bfe" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                </svg>


                            </button>

                            <!-- Main modal -->
                            <div id="<?php print_r($l . "Modaless"); ?>" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-xl max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <!-- Modal header -->
                                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-3xl font-semibold text-gray-900 dark:text-white">
                                                Añadir Calificación
                                            </h3>
                                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="<?php print_r($l . "Modaless"); ?>">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="p-6 space-y-6 flex flex-col">
                                            <input class="rounded-lg hidden" type="text" name="idnombreCali" value="<?php print_r($id_info_fk4P); ?>" />
                                            <input class="rounded-lg hidden" type="text" name="idnombreClassCali" value="<?php print_r($idTeacherClass); ?>" />
                                            <b class="text-base  text-black">
                                                Ingrese la Calificacion del 0 a 100
                                            </b>
                                            <input class="rounded-lg" type="number" min="0" max="100" name="editCalificacion" value="<?php print_r($grade4P); ?>" required />

                                            <!-- Modal footer -->

                                            <div class="  flex w-full items-center justify-end pt-4 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                <button data-modal-hide="<?php print_r($l . "Modaless"); ?>" type="button" class="text-white bg-gray-700 hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-blue-300
                                        rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5
                                        hover:text-white focus:z-10 dark:bg-gray-700 dark:text-gray-300
                                        dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600
                                        dark:focus:ring-gray-600">Close</button>
                                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-400 focus:ring-4 focus:outline-none
                                        focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center
                                        dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar
                                                    Cambios
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <form class="h-fit" method="post" action="./hallAnhadirMensa.php">
                            <!-- <input class="hidden" name="iValue" value="$i" /> -->
                            <button data-modal-target="<?php print_r($l . "Modalessx"); ?>" data-modal-toggle="<?php print_r($l . "Modalessx"); ?>" type="button" class=" rounded-sm shadow hover:shadow-md hover:bg-blue-200">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#007bff" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z" />
                                </svg>

                            </button>

                            <!-- Main modal -->
                            <div id="<?php print_r($l . "Modalessx"); ?>" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-xl max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <!-- Modal header -->
                                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-3xl font-semibold text-gray-900 dark:text-white">
                                                Añadir Mensaje
                                            </h3>
                                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="<?php print_r($l . "Modalessx"); ?>">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="p-6 space-y-6 flex flex-col">
                                            <input class="rounded-lg hidden" type="text" name="idnombreMensa" value="<?php print_r($id_info_fk4P); ?>" />
                                            <input class="rounded-lg hidden" type="text" name="idnombreClassMensa" value="<?php print_r($idTeacherClass); ?>" />
                                            <b class="text-base  text-black">
                                                Ingrese un mesaje:
                                            </b>
                                            <input class="rounded-lg" type="text" name="editMensaje" value="<?php print_r($messages4P); ?>" required />

                                            <!-- Modal footer -->

                                            <div class="  flex w-full items-center justify-end pt-4 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                <button data-modal-hide="<?php print_r($l . "Modalessx"); ?>" type="button" class="text-white bg-gray-700 hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-blue-300
                                        rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5
                                        hover:text-white focus:z-10 dark:bg-gray-700 dark:text-gray-300
                                        dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600
                                        dark:focus:ring-gray-600">Close</button>
                                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-400 focus:ring-4 focus:outline-none
                                        focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center
                                        dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar
                                                    Cambios
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>


                        </td>
                        </tr>
                <?php
                        $l++;
                    }
                };
                ?>
            </tbody>

        </table>
    </div>

</card>