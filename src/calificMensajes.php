<card class=" w-full md:h-full h-[350px] bg-white border md:overflow-y-scroll md:overflow-x-hidden overflow-scroll">
    <div class="w-full  border-b md:p-3 p-2">
        <p class="md:text-base text-xs">Calificaciones y mensajes de tus clases</p>
    </div>

    <div class="relative md:p-4 p-2 pt-0">
        <button class=" top-5 w-fit dark:bg-gray-500 dark:hover:bg-gray-700 bg-[#007aff] hover:bg-[#1d3e8f] text-white  md:py-2 md:px-4 p-2 rounded-lg absolute  md:text-base text-xs" type=''>Inscribirse</button>
        <table id="tablaCalificaciones" class="display  border md:text-base text-xs">

            <thead>
                <tr>
                    <th>#</th>
                    <th class="border">Nombre de clase</th>
                    <th class="border">Calificación</th>
                    <th>Mensajes</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $id_info = $_SESSION["id_info"];
                $resultInfoClass = $mysqli->query("SELECT * FROM info_classes WHERE id_info_fk = '$id_info'");
                // $resultClasses = $mysqli->query("SELECT * FROM classes WHERE id_class = $numClass");

                $i = 1;
                while ($datosInfoClass = $resultInfoClass->fetch_assoc()) {
                    $numClass = $datosInfoClass["id_class_fk"];
                    $grade = $datosInfoClass["grade"];
                    $messages = $datosInfoClass["messages"];

                    $resultClasses = $mysqli->query("SELECT * FROM classes WHERE id_class = $numClass");
                    $datosClass = $resultClasses->fetch_assoc();
                    $nameClass = $datosClass['name_class'];
                    echo "
                <tr class='border'>
                    <td>$i</td>
                    <td>$nameClass</td>
                    <td>$grade</td>
                    <td>$messages</td>
                </tr>";
                    $i++;
                };
                ?>
            </tbody>
        </table>
    </div>

</card>