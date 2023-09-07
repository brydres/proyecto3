<card class="md:w-[59%] w-full  md:h-full h-[174px] bg-white border md:overflow-y-scroll md:overflow-x-hidden overflow-scroll">
    <div class="w-full  border-b md:p-3 p-2">
        <p class="md:text-base text-xs">Tus materias inscritas</p>
    </div>
    <div class="md:p-4 p-2">
        <table id="tablaClasesInscritas" class="display border md:text-base text-xs">
            <thead>
                <tr>
                    <th>#</th>
                    <th class="border">Materia</th>
                    <th class="border">Darse de baja</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $id_info = $_SESSION["id_info"];
                $resultInfoClass = $mysqli->query("SELECT * FROM info_classes WHERE id_info_fk = '$id_info'");
                // $resultClasses = $mysqli->query("SELECT * FROM classes WHERE id_class = $numClass");

                $i = 1;
                while ($datosInfoClass = $resultInfoClass->fetch_assoc()) {
                    $_SESSION['numIdInfo' . $i] = $datosInfoClass["id_info_fk"];
                    $_SESSION['numClass' . $i] = $datosInfoClass["id_class_fk"];
                    $numClass = $datosInfoClass["id_class_fk"];
                    $resultClasses = $mysqli->query("SELECT * FROM classes WHERE id_class = $numClass");
                    $datosClass = $resultClasses->fetch_assoc();
                    $nameClass = $datosClass['name_class'];

                    echo "
                        <tr class='border'>
                            
                                <td>$i</td>
                                <td>$nameClass</td>
                                <td class='text-center'>
                                    <form class=' h-fit' method='post' action='./darDeBaja.php'>
                                        <input class='hidden' name='iValue' value='$i'/>
                                        <button type='submit' class=' rounded-full shadow hover:shadow-md hover:bg-red-100'>
                                            <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='red' class='w-6 h-6'>
                                            <path stroke-linecap='round' stroke-linejoin='round' d='M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z' />
                                            </svg>
                                        </button>
                                    </form>
                                </td> 
                            
                        </tr>";
                    $i++;
                };
                ?>
            </tbody>
        </table>
    </div>

</card>
<card class="md:w-[39%] w-full  md:h-full h-[174px] bg-white border md:overflow-y-scroll md:overflow-x-hidden overflow-scroll">
    <div class="w-full  border-b md:p-3 p-2">
        <p class="md:text-base text-xs">Materias para inscribir</p>
    </div>
    <?php
    $id_info = $_SESSION["id_info"];
    $veryficactionIC = $mysqli->query("SELECT * FROM info_classes RIGHT JOIN classes ON classes.id_class = info_classes.id_class_fk WHERE id_info_fk = $id_info;");
    $veryficationRows = $veryficactionIC->num_rows;
    $tableClasses = $mysqli->query("SELECT * FROM classes");
    $classesRows = $tableClasses->num_rows;
    // var_dump($id_info);
    // var_dump($veryficationRows);
    if ($veryficationRows == $classesRows) {
        echo "<p class='p-4 text-center text-xl'>Ya estas inscrito a todas las clases.</p>";
    } else {
    ?>
        <form class="flex flex-col w-full p-3 md:text-base text-xs" method='post' action='./hallInscribir.php'>
            <?php
            $resultClasses = $mysqli->query("SELECT id_class,name_class FROM classes WHERE id_class NOT IN ( SELECT id_class_fk FROM info_classes WHERE id_info_fk = $id_info);");

            $i = 1;
            while ($datosClasses = $resultClasses->fetch_assoc()) {
                $id_class = $datosClasses["id_class"];
                $name_class = $datosClasses["name_class"];

                echo '<label class="cursor-pointer hover:bg-slate-100 w-full md:py-2 py-1 flex justify-start items-center">
                <input class="" type="checkbox" id="' . $id_class . '" name="' . $id_class . '"  />
                <label class="pl-2" for="' . $id_class . '">' .
                    $name_class .
                    '</label>
            </label>';
                $i++;
            };
            ?>
            <button class="md:mt-4 mt-2 w-fit dark:bg-gray-500 dark:hover:bg-gray-700 bg-[#007aff] hover:bg-[#1d3e8f] text-white  py-2 px-4 rounded-lg" type='submit'>Inscribirse</button>
        </form>
    <?php
    }
    ?>
</card>