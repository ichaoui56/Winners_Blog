<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="../pictures/avito.png" />
    <link rel="stylesheet" href="../css/style.css">
    <title>Avito</title>
</head>

<body class="bg-gray-300 " style="background-color: #d5deef;">

    <!------------------------------------------start navbar---------------------------------------------- -->


    <div id="navbar-container"></div>
    <script src="../js/navbar.js"></script>
    <script src="../js/script.js"></script>


    <!------------------------------------------end navbar---------------------------------------------- -->





    <!------------------------------------------start container---------------------------------------------- -->






    <!-- component -->
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet"
        href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">

    <section class="pt- mx-10 mb-20 bg-transparent">
        <div class="w-full flex justify-center px-4 mx-auto">
            <div class="lwa3er w-[1000px] z-10 flex flex-col break-words bg-white opacity-90  mb-6 shadow-xl rounded-lg mt-16" class="absolute flex flex-col min-w-0 break-words w-full bg-white opacity-90  mb-6 shadow-xl rounded-lg mt-16"
                style="margin-top: 100px;">
                <div class="px-6">
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full px-4 flex justify-center">
                            <div class="relative">
                                <img alt="..."
                                    src="https://demos.creative-tim.com/notus-js/assets/img/team-2-800x800.jpg"
                                    class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px">
                            </div>
                        </div>
                        <div class="w-full px-4 text-center ml-8 mt-20">
                            <div class="flex justify-center py-4 lg:pt-4 pt-8">
                                <div class="mr-4 p-3 text-center">
                                    <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">
                                        10
                                    </span>
                                    <span class="text-sm text-blueGray-400">Annonces</span>
                                </div>
                                <div class="lg:mr-4 p-3 text-center">
                                    <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">
                                        89
                                    </span>
                                    <span class="text-sm text-blueGray-400">Comments</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-12">
                        <h3 class="text-xl py-4 font-bold leading-normal mb-2 text-blueGray-700 mb-2">
                            Jenna Stones
                        </h3>
                        <div class="text-sm py-2 leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
                            <i class="fas fa-phone mr-2 text-lg text-blueGray-400"></i>
                            Phone number
                        </div>
                        <div class="mb-2 text-blueGray-600 mt-10">
                            <i class="fas fa-mail-bulk mr-2 text-lg text-blueGray-400"></i>
                            Email
                        </div>
                        <div class="mb-2 py-10 text-blueGray-600">
                            <i class="fas fa-city mr-2 text-lg text-blueGray-400"></i>
                            City
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img src="../pictures/profile-bg.jpg" alt="" width="100%" class="tswera" class="rounded-3xl hidden lg:block">

    </section>


    <div class="flex items-end justify-end fixed bottom-0 right-0 mb-4 mr-4 z-10">
        <div>
            <a title="Buy me a beer" href="https://www.avito.ma/" target="_blank"
                class="block w-16 h-16 rounded-full transition-all shadow hover:shadow-lg transform hover:scale-110 hover:rotate-12">
                <img class="object-cover object-center w-full h-full rounded-full" src="../pictures/login_pic.png" />
            </a>
        </div>
    </div>


    <!------------------------------------------end container---------------------------------------------- -->






    <!----------------------------------------- strat footer --------------------------------------------------->

    <div id="Footer-container"></div>
    <script src="../js/footer.js"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="https://daniellaharel.com/raindrops/js/raindrops.js"></script>

    <script>
        jQuery('#waterdrop').raindrops({
            color: '#ffffff',
            canvasHeight: 150,
            density: 0.1,
            frequency: 20
        });
    </script>

    <!----------------------------- end footer ------------------------------------->


</body>

</html>