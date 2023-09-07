<card class=" w-full md:h-full h-[350px] bg-white border md:overflow-y-scroll md:overflow-x-hidden overflow-scroll">
    <div class="w-full  border-b md:p-3 p-2">
        <p class="md:text-base text-xs">Informaci&#243;n de Permisos</p>
    </div>

    <div class="relative md:p-4 p-2 pt-0">
        <table id="tablaPermisos" class="display  border md:text-base text-xs">

            <thead>
                <tr>
                    <th>#</th>
                    <th class="border">Email/Usuario</th>
                    <th class="border">Permiso</th>
                    <th class="border">Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // $id_info = $_SESSION["id_info"];
                $resultInfoAll = $mysqli->query("SELECT * FROM info");
                // $resultClasses = $mysqli->query("SELECT * FROM classes WHERE id_class = $numClass");

                $i = 1;
                while ($datosInfoAll = $resultInfoAll->fetch_assoc()) {
                    $id_infoAll = $datosInfoAll["id_info"];
                    $emailAll = $datosInfoAll["email"];
                    $permisoAll = $datosInfoAll["id_rol"];
                    $estadoAll = $datosInfoAll["state"];

                    // $resultClasses = $mysqli->query("SELECT * FROM classes WHERE id_class = $numClass");
                    // $datosClass = $resultClasses->fetch_assoc();
                    // $nameClass = $datosClass['name_class'];
                    echo "
                        <tr class='border'>
                        <td>$i</td>
                        <td>$emailAll</td>
                        <td>";

                    if ($permisoAll == 1) {
                        echo "<p class=' bg-yellow-300 py-1 px-2 w-fit h-fit rounded-xl text-black font-semibold'> Administrador </p>";
                    } elseif ($permisoAll == 2) {
                        echo "<p class=' bg-sky-500 py-1 px-2 w-fit h-fit rounded-xl text-white font-semibold'> Maestro </p>";
                    } elseif ($permisoAll == 3) {
                        echo "<p class=' bg-slate-400 py-1 px-2 w-fit h-fit rounded-xl text-white font-semibold'> Alumno </p>";
                    }

                    echo "</td>
                        <td>";
                    if ($estadoAll == 1) {
                        echo "<p class=' bg-green-500 py-1 px-2 w-fit h-fit rounded-xl text-white font-semibold'> Activo </p>";
                    } elseif ($estadoAll == 0) {
                        echo "<p class=' bg-red-700 py-1 px-2 w-fit h-fit rounded-xl text-white font-semibold'> Inactivo </p>";
                    }
                    echo '</td>
                        <td>'; ?>

                    <form class="h-fit" method="post" action="./hallPermisos.php">
                        <!-- <input class="hidden" name="iValue" value="$i" /> -->
                        <button data-modal-target="<?php print_r($emailAll); ?>" data-modal-toggle="<?php print_r($emailAll); ?>" type="button" class=" rounded-sm shadow hover:shadow-md hover:bg-green-100">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>

                        </button>

                        <div id="<?php print_r($emailAll); ?>" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-2xl max-h-full">
                                <div class=" bg-white rounded-md shadow flex flex-col">
                                    <div class="flex items-start justify-between p-4 border-b rounded-t ">
                                        <h3 class="text-3xl font-semibold text-gray-900 dark:text-white">
                                            Editar Permiso
                                        </h3>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="<?php print_r($emailAll); ?>">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <div class="p-6 space-y-6 flex flex-col">
                                        <b class="text-base  text-black">
                                            Email de Usuario
                                        </b>
                                        <input class="hidden rounded-lg" type="text" name="inputIdS" value="<?php print_r($id_infoAll); ?>" />
                                        <input class=" rounded-lg" type="email" name="inputEmailS" value="<?php print_r($emailAll); ?>" required />
                                        <b class="text-base  text-black">
                                            Rol de Usuario
                                        </b>
                                        <select class=" rounded-lg" name="permisoSelect">
                                            <option value="1" <?php if ($permisoAll == 1) {
                                                                    print_r("selected");
                                                                } ?>>admin</option>
                                            <option value="2" <?php if ($permisoAll == 2) {
                                                                    print_r("selected");
                                                                } ?>>maestro</option>
                                            <option value="3" <?php if ($permisoAll == 3) {
                                                                    print_r("selected");
                                                                } ?>>alumno</option>
                                        </select>
                                        <div>
                                            <label class="relative inline-flex items-center mb-4 cursor-pointer">
                                                <input name="permisoCheckbox" type="checkbox" value="1" class="sr-only peer" <?php
                                                                                                                                if ($estadoAll == 1) {
                                                                                                                                    print_r("checked");
                                                                                                                                } ?>>
                                                <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600">
                                                </div>
                                                <b class="ml-3 text-sm font-medium text-black ">Usuario Activo</b>
                                            </label>
                                        <?php
                                        echo '</div>
                        </div>
                                </div>
                            </div>
                        </div>
                </form>
                </td>
                </tr>';
                                        $i++;
                                    };
                                        ?>
            </tbody>

        </table>
    </div>

</card>