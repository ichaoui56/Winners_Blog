<?php
include("../includes/db.inc.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" href="../pictures/avito.png" />
    <link rel="stylesheet" href="../css/style.css">
    <title>Avito</title>
</head>

<style>

.btn-conteiner {
    display: flex;
    justify-content: center;
    --color-text: #ffffff;
    --color-background: #000000;
    --color-outline: #6a606380;
    --color-shadow: #00000080;
}

.btn-content {
    display: flex;
    align-items: center;
    padding: 5px 20px;
    text-decoration: none;
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    font-size: 25px;
    color: var(--color-text);
    background: var(--color-background);
    transition: 1s;
    border-radius: 100px;
    box-shadow: 0 0 0.2em 0 var(--color-background);
}

.btn-content:hover,
.btn-content:focus {
    transition: 0.5s;
    -webkit-animation: btn-content 1s;
    animation: btn-content 1s;
    outline: 0.1em solid transparent;
    outline-offset: 0.2em;
    box-shadow: 0 0 0.4em 0 var(--color-background);
}

.btn-content .icon-arrow {
    transition: 0.5s;
    margin-right: 0px;
    transform: scale(0.6);
}

.btn-content:hover .icon-arrow {
    transition: 0.5s;
    margin-right: 25px;
}

.icon-arrow {
    width: 10px;
    margin-left: 15px;
    position: relative;
    top: 6%;
}

/* SVG */
#arrow-icon-one {
    transition: 0.4s;
    transform: translateX(-60%);
}

#arrow-icon-two {
    transition: 0.5s;
    transform: translateX(-30%);
}

.btn-content:hover #arrow-icon-three {
    animation: color_anim 1s infinite 0.2s;
}

.btn-content:hover #arrow-icon-one {
    transform: translateX(0%);
    animation: color_anim 1s infinite 0.6s;
}

.btn-content:hover #arrow-icon-two {
    transform: translateX(0%);
    animation: color_anim 1s infinite 0.4s;
}

/* SVG animations */
@keyframes color_anim {
    0% {
        fill: white;
    }

    50% {
        fill: var(--color-background);
    }

    100% {
        fill: white;
    }
}

/* Button animations */
@-webkit-keyframes btn-content {
    0% {
        outline: 0.2em solid var(--color-background);
        outline-offset: 0;
    }
}

@keyframes btn-content {
    0% {
        outline: 0.2em solid var(--color-background);
        outline-offset: 0;
    }
}
</style>

<body class="bg-gray-300 " style="background-color: #d5deef;">


    <!------------------------------------------start navbar---------------------------------------------- -->


    <div id="navbar-container">
        <?php include("../js/navbar.php"); ?>
    </div>
    <?php
    // Fetch categories
    $categories = [];
    $query = "SELECT * FROM category";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $categories[] = $row;
    } ?>
    <script src="../js/script.js"></script>


    <!------------------------------------------end navbar---------------------------------------------- -->


    <form class="space-y-6 pt- mx-10 flex justify-center items-center  mb-20 bg-transparent"
        method="POST" action="../includes/add_article_traitement.php" enctype="multipart/form-data">
        <div class="lwa3er" class="flex absolute">
            <div class="m-auto  w-[400px] sm:w-[450px] md:w-[600px] sm:w-[550px] ">
                <div>
                    <button type="button"
                        class="relative w-full flex justify-center items-center px-5 py-2.5 font-medium tracking-wide text-white capitalize   bg-black rounded-md hover:bg-gray-900  focus:outline-none   transition duration-300 transform active:scale-95 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px"
                            viewBox="0 0 24 24" width="24px" fill="#FFFFFF">
                            <g>
                                <rect fill="none" height="24" width="24"></rect>
                            </g>
                            <g>
                                <g>
                                    <path d="M19,13h-6v6h-2v-6H5v-2h6V5h2v6h6V13z"></path>
                                </g>
                            </g>
                        </svg>
                        <input type="file" id="article_picture" name="article_picture" accept="image/*"
                            class="border-4 bg-black absolute w-96 mx-12 opacity-0">
                        <span class="pl-2 mx-1">Add new picture</span>

                    </button>
                    <div class="mt-5 bg-white rounded-lg shadow">
                        <div class="flex">
                            <div class="flex-1 py-5 pl-5 overflow-hidden">
                                <svg class="inline align-text-top" height="24px" viewBox="0 0 24 24" width="24px"
                                    xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                    <g>
                                        <path d="m4.88889,2.07407l14.22222,0l0,20l-14.22222,0l0,-20z" fill="none"
                                            id="svg_1" stroke="null"></path>
                                        <path
                                            d="m7.07935,0.05664c-3.87,0 -7,3.13 -7,7c0,5.25 7,13 7,13s7,-7.75 7,-13c0,-3.87 -3.13,-7 -7,-7zm-5,7c0,-2.76 2.24,-5 5,-5s5,2.24 5,5c0,2.88 -2.88,7.19 -5,9.88c-2.08,-2.67 -5,-7.03 -5,-9.88z"
                                            id="svg_2"></path>
                                        <circle cx="7.04807" cy="6.97256" r="2.5" id="svg_3"></circle>
                                    </g>
                                </svg>
                                <h1 class="inline text-2xl font-semibold leading-none">Article Information</h1>
                            </div>
                        </div>
                        <div class="px-5 pb-5">

                            <div class="flex">
                                <div class="flex-grow"><input placeholder="Article title" name="article_title"
                                        id="article_title" autocomplete="street-address"
                                        class=" text-black placeholder-gray-600 w-[180px] sm:w-72 px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400">
                                </div>
                                <select id="article_category" name="article_category"
                                    class="text-black ml-2 placeholder-gray-600 w-[180px] sm:w-52 md:w-72 px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400">
                                    <?php foreach ($categories as $category) : ?>
                                    <option value="<?php echo htmlspecialchars($category['id_category']); ?>">
                                        <?php echo htmlspecialchars($category['category']); ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>

                            </div>
                            <input placeholder="Paragraph" type="text" name="article_description"
                                id="article_description"
                                class=" text-black placeholder-gray-600 w-full h-[150px] px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400">

                        </div>

                        <hr class="mt-4">
                        <div class="flex flex-row-reverse p-3">
                            <div class="flex-initial pl-3">
                                <div class="btn-conteiner">
                                    <button type="submit" name="submit">
                                        <a class="btn-content" href="#">
                                            <span class="btn-title">SAVE</span>
                                            <span class="icon-arrow">
                                                <svg width="66px" height="43px" viewBox="0 0 66 43" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <g id="arrow" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <path id="arrow-icon-one"
                                                            d="M40.1543933,3.89485454 L43.9763149,0.139296592 C44.1708311,-0.0518420739 44.4826329,-0.0518571125 44.6771675,0.139262789 L65.6916134,20.7848311 C66.0855801,21.1718824 66.0911863,21.8050225 65.704135,22.1989893 C65.7000188,22.2031791 65.6958657,22.2073326 65.6916762,22.2114492 L44.677098,42.8607841 C44.4825957,43.0519059 44.1708242,43.0519358 43.9762853,42.8608513 L40.1545186,39.1069479 C39.9575152,38.9134427 39.9546793,38.5968729 40.1481845,38.3998695 C40.1502893,38.3977268 40.1524132,38.395603 40.1545562,38.3934985 L56.9937789,21.8567812 C57.1908028,21.6632968 57.193672,21.3467273 57.0001876,21.1497035 C56.9980647,21.1475418 56.9959223,21.1453995 56.9937605,21.1432767 L40.1545208,4.60825197 C39.9574869,4.41477773 39.9546013,4.09820839 40.1480756,3.90117456 C40.1501626,3.89904911 40.1522686,3.89694235 40.1543933,3.89485454 Z"
                                                            fill="#FFFFFF"></path>
                                                        <path id="arrow-icon-two"
                                                            d="M20.1543933,3.89485454 L23.9763149,0.139296592 C24.1708311,-0.0518420739 24.4826329,-0.0518571125 24.6771675,0.139262789 L45.6916134,20.7848311 C46.0855801,21.1718824 46.0911863,21.8050225 45.704135,22.1989893 C45.7000188,22.2031791 45.6958657,22.2073326 45.6916762,22.2114492 L24.677098,42.8607841 C24.4825957,43.0519059 24.1708242,43.0519358 23.9762853,42.8608513 L20.1545186,39.1069479 C19.9575152,38.9134427 19.9546793,38.5968729 20.1481845,38.3998695 C20.1502893,38.3977268 20.1524132,38.395603 20.1545562,38.3934985 L36.9937789,21.8567812 C37.1908028,21.6632968 37.193672,21.3467273 37.0001876,21.1497035 C36.9980647,21.1475418 36.9959223,21.1453995 36.9937605,21.1432767 L20.1545208,4.60825197 C19.9574869,4.41477773 19.9546013,4.09820839 20.1480756,3.90117456 C20.1501626,3.89904911 20.1522686,3.89694235 20.1543933,3.89485454 Z"
                                                            fill="#FFFFFF"></path>
                                                        <path id="arrow-icon-three"
                                                            d="M0.154393339,3.89485454 L3.97631488,0.139296592 C4.17083111,-0.0518420739 4.48263286,-0.0518571125 4.67716753,0.139262789 L25.6916134,20.7848311 C26.0855801,21.1718824 26.0911863,21.8050225 25.704135,22.1989893 C25.7000188,22.2031791 25.6958657,22.2073326 25.6916762,22.2114492 L4.67709797,42.8607841 C4.48259567,43.0519059 4.17082418,43.0519358 3.97628526,42.8608513 L0.154518591,39.1069479 C-0.0424848215,38.9134427 -0.0453206733,38.5968729 0.148184538,38.3998695 C0.150289256,38.3977268 0.152413239,38.395603 0.154556228,38.3934985 L16.9937789,21.8567812 C17.1908028,21.6632968 17.193672,21.3467273 17.0001876,21.1497035 C16.9980647,21.1475418 16.9959223,21.1453995 16.9937605,21.1432767 L0.15452076,4.60825197 C-0.0425130651,4.41477773 -0.0453986756,4.09820839 0.148075568,3.90117456 C0.150162624,3.89904911 0.152268631,3.89694235 0.154393339,3.89485454 Z"
                                                            fill="#FFFFFF"></path>
                                                    </g>
                                                </svg>
                                            </span>
                                        </a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img src="../pictures/profile-bg.jpg" alt="" width="100%" class="tswera" class="rounded-3xl hidden lg:block">

    </form>


    <!----------------------------- strat footer ------------------------------------->

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