<card class=" w-full md:h-full h-[350px] bg-white border md:overflow-y-scroll md:overflow-x-hidden overflow-scroll">
    <div class="w-full h-fit border-b md:p-3 p-2 flex items-center justify-between">
        <p class="md:text-base text-xs">Informaci&#243;n de Maestros</p>
        <form class="h-fit" method="post" action="./hallNewMaestro.php">
            <button data-modal-target="defaultModalMaestro" data-modal-toggle="defaultModalMaestro"
                class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Agregar Maestro
            </button>

            <!-- Main modal -->
            <div id="defaultModalMaestro" tabindex="-1" aria-hidden="true"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class=" bg-white rounded-md shadow flex flex-col">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-4 border-b rounded-t ">
                            <h3 class="text-3xl font-semibold text-gray-900 dark:text-white">
                                Agregar Maestro
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="defaultModalMaestro">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 space-y-6 flex flex-col">
                            <b class="text-base  text-black">
                                Correo Electronico
                            </b>
                            <input class="rounded-lg" type="email" name="newMaestroEmail" placeholder="Ingresar email"
                                required />
                            <b class="text-base  text-black">
                                Nombre(s)
                            </b>
                            <input class="rounded-lg" type="text" name="newMaestroNombre"
                                placeholder="Ingresar nombre(s)" required />
                            <b class="text-base  text-black">
                                Apellido(s)
                            </b>
                            <input class="rounded-lg" type="text" name="newMaestroApellido"
                                placeholder="Ingresar apellido(s)" required />
                            <b class="text-base  text-black">
                                Direcci&#243;n
                            </b>
                            <input class="rounded-lg" type="text" name="newMaestroDirec"
                                placeholder="Ingresar la direcci&#243;n" />
                            <b class="text-base  text-black">
                                Fecha de Nacimiento
                            </b>
                            <input class="rounded-lg" type="date" name="newMaestroFecha" />
                            <div>
                                <b class="text-base  text-black">
                                    Clase Asignada
                                </b>
                                <select class=" rounded-lg" name="claseAsign">
                                    <option value="" selected hidden>-- Selecciona Clase --</option>
                                    <?php
                                    // $id_info = $_SESSION["id_info"];
                                    // SELECT id_class,name_class FROM classes WHERE id_class NOT IN ( SELECT teacher_class FROM info );
                                    $resultClasses4M = $mysqli->query("SELECT classes.id_class,classes.name_class,info.teacher_class  FROM classes LEFT JOIN info ON id_class = teacher_class WHERE teacher_class IS NULL");
                                    while ($rowsClasses4M = $resultClasses4M->fetch_assoc()) {
                                        echo '<option value="' . $rowsClasses4M["id_class"] . '">' . $rowsClasses4M["name_class"] . '</option>';
                                    }

                                    ?>
                                </select>
                            </div>


                            <!-- Modal footer -->
                            <div
                                class="  flex w-full items-center justify-end pt-4 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button data-modal-hide="defaultModalMaestro" type="button" class="text-white bg-gray-700 hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-blue-300
                                        rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5
                                        hover:text-white focus:z-10 dark:bg-gray-700 dark:text-gray-300
                                        dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600
                                        dark:focus:ring-gray-600">Close</button>
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-400 focus:ring-4 focus:outline-none
                                        focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center
                                        dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Crear
                                </button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="relative md:p-4 p-2 pt-0">
        <table id="tablaMaestros" class="display  border md:text-base text-xs">

            <thead>
                <tr>
                    <th>#</th>
                    <th class="border">Nombre</th>
                    <th class="border">Email</th>
                    <th class="border">Direcci&#243;n</th>
                    <th class="border">Fec. de Nacimiento</th>
                    <th class="border">Clase Asignada</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // $id_info = $_SESSION["id_info"];
                $resultInfoMaestros = $mysqli->query("SELECT * FROM info wHERE id_rol = 2;");
                // $resultClasses = $mysqli->query("SELECT * FROM classes WHERE id_class = $numClass");

                $i = 1;
                while ($datosInfoMaestros = $resultInfoMaestros->fetch_assoc()) {
                    $idMaestro = $datosInfoMaestros["id_info"];
                    $nameMaestro = $datosInfoMaestros["name"];
                    $lastnameMaestro = $datosInfoMaestros["lastname"];
                    $emailMaestro = $datosInfoMaestros["email"];
                    $addressMaestro = $datosInfoMaestros["address"];
                    $birthdayMaestro = $datosInfoMaestros["birthday"];
                    $teacher_classMaestro = $datosInfoMaestros["teacher_class"];
                    if ($teacher_classMaestro != NULL) {
                        $whatClass = $mysqli->query("SELECT * FROM classes WHERE id_class = $teacher_classMaestro");
                        $datosWClass = $whatClass->fetch_assoc();
                        $nameWClass = $datosWClass['name_class'];
                    } else {
                        $nameWClass = "VACIO";
                    }


                    echo "
                    <tr class='border'>
                        <td>$i</td>
                        <td>" . $nameMaestro . " " . $lastnameMaestro . "</td>
                        <td>$emailMaestro</td>
                        <td class='truncate'>$addressMaestro</td>
                        <td>$birthdayMaestro</td>
                        <td>";
                    if ($nameWClass == "VACIO") {
                        echo "<b class=' bg-yellow-300 text-black px-2 py-1 rounded-md'>Sin Asignacion</b>";
                    } else {
                        echo "$nameWClass";
                    }
                    echo "</td>
                        <td class='flex justify-around'>"; ?>
                <!-- Modal toggle -->
                <form class="h-fit" method="post" action="./hallEditMaestros.php">
                    <!-- <input class="hidden" name="iValue" value="$i" /> -->
                    <button data-modal-target="<?php print_r($i . "Modal"); ?>"
                        data-modal-toggle="<?php print_r($i . "Modal"); ?>" type="button"
                        class=" rounded-sm shadow hover:shadow-md hover:bg-green-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="green" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>

                    </button>

                    <!-- Main modal -->
                    <div id="<?php print_r($i . "Modal"); ?>" tabindex="-1" aria-hidden="true"
                        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-2xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div
                                    class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-3xl font-semibold text-gray-900 dark:text-white">
                                        Editar Maestro
                                    </h3>
                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="<?php print_r($i . "Modal"); ?>">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-6 space-y-6 flex flex-col">
                                    <input class="rounded-lg hidden" type="text" name="idDelMaestro"
                                        value="<?php print_r($idMaestro); ?>" />
                                    <b class="text-base  text-black">
                                        Correo Electronico
                                    </b>
                                    <input class="rounded-lg" type="email" name="editMaestroEmail"
                                        placeholder="Ingresar email" value="<?php print_r($emailMaestro); ?>"
                                        required />
                                    <b class="text-base  text-black">
                                        Nombre(s)
                                    </b>
                                    <input class="rounded-lg" type="text" name="editMaestroNombre"
                                        placeholder="Ingresar nombre(s)" value="<?php print_r($nameMaestro); ?>"
                                        required />
                                    <b class="text-base  text-black">
                                        Apellido(s)
                                    </b>
                                    <input class="rounded-lg" type="text" name="editMaestroApellido"
                                        placeholder="Ingresar apellido(s)" value="<?php print_r($lastnameMaestro); ?>"
                                        required />
                                    <b class="text-base  text-black">
                                        Direcci&#243;n
                                    </b>
                                    <input class="rounded-lg" type="text" name="editMaestroDirec"
                                        placeholder="Ingresar la direcci&#243;n"
                                        value="<?php print_r($addressMaestro); ?>" />
                                    <b class="text-base  text-black">
                                        Fecha de Nacimiento
                                    </b>
                                    <input class="rounded-lg" type="date" name="editMaestroFecha"
                                        value="<?php print_r($birthdayMaestro); ?>" />
                                    <div>
                                        <b class="text-base  text-black">
                                            Clase Asignada
                                        </b>
                                        <select class=" rounded-lg" name="editClaseAsign">
                                            <option value="<?php print_r($teacher_classMaestro) ?>">
                                                <?php print_r($nameWClass) ?>
                                            </option>
                                            <?php
                                                // $id_info = $_SESSION["id_info"];
                                                $resultClasses4M = $mysqli->query("SELECT classes.id_class,classes.name_class,info.teacher_class  FROM classes LEFT JOIN info ON id_class = teacher_class WHERE teacher_class IS NULL");
                                                while ($rowsClasses4M = $resultClasses4M->fetch_assoc()) {
                                                    echo '<option value="' . $rowsClasses4M["id_class"] . '">' . $rowsClasses4M["name_class"] . '</option>';
                                                }

                                                ?>
                                        </select>
                                    </div>
                                    <!-- Modal footer -->

                                    <div
                                        class="  flex w-full items-center justify-end pt-4 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                        <button data-modal-hide="<?php print_r($i . "Modal"); ?>" type="button" class="text-white bg-gray-700 hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-blue-300
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
                <form class="h-fit" method="post" action="./hallDeleteMaestro.php">
                    <input class="rounded-lg hidden" type="text" name="idDelMaestroDelete"
                        value="<?php print_r($idMaestro); ?>" />
                    <button type="submit" class=" rounded-sm shadow hover:shadow-md hover:bg-red-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="red" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>


                    </button>
                </form>
                </td>
                </tr>
                <?php
                    $i++;
                };
                ?>
            </tbody>

        </table>
    </div>

</card>