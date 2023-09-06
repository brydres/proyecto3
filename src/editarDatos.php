<card class="w-full h-full pb-4 bg-white border">
    <div class="border-b  p-4">
        <p>Información de Ususario</p>
    </div>
    <?php
    $id_info = $_SESSION["id_info"];
    $resultInfo = $mysqli->query("SELECT * FROM info WHERE id_info = '$id_info'");
    $datosInfo = $resultInfo->fetch_assoc();
    $DNI = $datosInfo["DNI"];
    $email = $datosInfo["email"];

    $name = $datosInfo["name"];
    $lastname = $datosInfo["lastname"];
    $address = $datosInfo["address"];
    $birthday = $datosInfo["birthday"];
    ?>
    <form class="flex flex-col h-[80%] p-4 overflow-y-scroll" name="formularioEditar" method="post" action="./hallEditar.php">
        <b class="mb-2">Matricula</b>
        <input class="border rounded-md p-2 mb-2" type="text" value="<?php print_r($DNI); ?>" disabled />

        <b class="mb-2">Correo Electronico</b>
        <input name="editEmail" class="border rounded-md p-2 mb-2" type="email" value="<?php print_r($email); ?>" required />

        <b class="mb-2">Contrase&#241;a, ingresa para cambiar la contrase&#241;a</b>
        <input name="editPassword" class="border rounded-md p-2 mb-2" type="text" />

        <b class="mb-2">Nombre(s)</b>
        <input name="editName" class="border rounded-md p-2 mb-2" type="text" value="<?php print_r($name); ?>" required />

        <b class="mb-2">Apellido(s)</b>
        <input name="editLastname" class="border rounded-md p-2 mb-2" type="text" value="<?php print_r($lastname); ?>" />

        <b class="mb-2">Direción</b>
        <input name="editAddress" class="border rounded-md p-2 mb-2" type="text" value="<?php print_r($address); ?>" />

        <b class="mb-2">Fecha de Nacimiento</b>
        <input name="editBirthday" class="border rounded-md p-2 py-6 mb-6" type="date" value="<?php print_r($birthday); ?>" />

        <button id="submitEdit" class="w-fit dark:bg-gray-500 dark:hover:bg-gray-700 bg-[#007aff] hover:bg-[#1d3e8f] text-white  py-2 px-4 rounded-lg" type="submit">Guardar cambios</button>
    </form>
</card>