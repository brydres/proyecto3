<?php session_start(); ?>
<!DOCTYPE html>
<html class=''>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="./dist/output.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

</head>

<body style="background: linear-gradient(90deg, rgba(39,70,154,1) 0%, rgba(17,144,205,1) 100%);" class=" dark:bg-gray-900 h-screen w-screen  flex flex-col justify-center items-center">

    <div class="  flex flex-col justify-center items-center h-full md:h-[480px] w-screen  md:w-96 ">

        <form class="bg-[#fff5d2] flex flex-col justify-center md:justify-between h-full md:h-fit w-full md:w-96 p-10 md:p-10 border-0 md:border border-gray-400 md:rounded-3xl" name="formularioLogin" method="post" action="./src/hallLogin.php">
            <img src="./assets/logo.jpg" alt="logo.jpg" />
            <p style="font-family: 'Noto Sans', sans-serif;" class="dark:text-white text-gray-600 mb-4 font-semibold text-lg">Bienvenido ingresa con tu cuenta</p>
            <div class="relative block mb-3">
                <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                    <svg class="h-5 w-5 fill-slate-300" viewBox="0 0 20 20">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="gray" class="w-5 h-5">
                            <path d="M1.5 8.67v8.58a3 3 0 003 3h15a3 3 0 003-3V8.67l-8.928 5.493a3 3 0 01-3.144 0L1.5 8.67z" />
                            <path d="M22.5 6.908V6.75a3 3 0 00-3-3h-15a3 3 0 00-3 3v.158l9.714 5.978a1.5 1.5 0 001.572 0L22.5 6.908z" />
                        </svg>
                    </svg>
                </span>
                <input class="block dark:bg-slate-600 bg-white w-full dark:text-white text-blue-800 font-semibold border border-slate-300 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm" type="email" name="emailLg" placeholder="Email" required />
            </div>

            <div class="relative block">
                <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                    <svg class="h-5 w-5 fill-slate-300" viewBox="0 0 20 20">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="gray" class="w-6 h-6">
                            <path fill-rule="evenodd" d="M12 1.5a5.25 5.25 0 00-5.25 5.25v3a3 3 0 00-3 3v6.75a3 3 0 003 3h10.5a3 3 0 003-3v-6.75a3 3 0 00-3-3v-3c0-2.9-2.35-5.25-5.25-5.25zm3.75 8.25v-3a3.75 3.75 0 10-7.5 0v3h7.5z" clip-rule="evenodd" />
                        </svg>
                    </svg>
                </span>
                <input class="block dark:bg-slate-600 dark:text-white text-blue-800 font-semibold bg-white w-full border border-slate-300 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm" type="password" name="passLg" placeholder="Password" required />
            </div>

            <div id='messageError' class='my-1'>
                <p class='text-center  text-red-700'>
                    <?php
                    if (isset($_SESSION["message_error"])) {
                        print_r($_SESSION["message_error"]);
                        unset($_SESSION["message_error"]);
                    } else {
                        print_r("&#160;");
                    }
                    ?>
                </p>
            </div>

            <button id="btnSubmit" class="w-full dark:bg-gray-500 dark:hover:bg-gray-700 bg-[#1d3e8f] hover:bg-[#7d8fab] text-white  py-2 px-4 rounded-lg" type="submit" name="start">Login</button>
        </form>
    </div>

</body>

</html>