<?php 

// include("../includes/db.inc.php") ;
// if(isset($_POST["submitComment"])){
//     $text_cmt = $_POST['text_cmt'];
//     $date_cmt = date('Y-m-d H:i:s');
//     $query = "INSERT INTO comment (text_cmt, date_cmt) VALUES ('$text_cmt', '$date_cmt')";
//     if ($conn->query($query) === TRUE) {
//         echo "<script>alert('Comment inserted successfully')</script>";
//     } else {
//         echo "<script>alert('?????????????????')</script>";

//     }
// }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/png" href="../pictures/avito.png" />
    <title>Avito</title>
</head>

<body class="bg-gray-300 " style="background-color: #d5deef;">

    <!------------------------------------------start navbar---------------------------------------------- -->


    <div id="navbar-container"><?php include("../js/navbar.php"); ?></div>
    <script src="../js/script.js"></script>


    <!------------------------------------------end navbar---------------------------------------------- -->





    <!------------------------------------------start container---------------------------------------------- -->


    <main class="pt-8 mx-10 rounded-2xl pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <address class="flex items-center mb-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="mr-4 w-16 h-16 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Jese Leos">
                            <div>
                                <a href="#" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">Jese
                                    Leos</a>
                                <p class="text-base text-gray-500 dark:text-gray-400">Graphic Designer, educator & CEO
                                    Flowbite</p>
                                <p class="text-base text-gray-500 dark:text-gray-400"><time pubdate datetime="2022-02-08" title="February 8th, 2022">Feb. 8, 2022</time></p>
                            </div>
                        </div>
                    </address>
                    <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                        Best practices for successful prototypes</h1>
                </header>
                <img src="https://flowbite.s3.amazonaws.com/typography-plugin/typography-image-1.png" alt="">
                <p class="lead text-[#9CA3A2]">
                    Flowbite is an open-source library of UI components built with the utility-first
                    classes from Tailwind CSS. It also includes interactive elements such as dropdowns, modals,
                    datepickersFlowbite is an open-source library of UI components built with the utility-first
                    classes from Tailwind CSS. It also includes interactive elements such as dropdowns, modals,
                    datepickersFlowbite is an open-source library of UI components built with the utility-first
                    classes from Tailwind CSS. It also includes interactive elements such as dropdowns, modals,
                    datepickersFlowbite is an open-source library of UI components built with the utility-first
                    classes from Tailwind CSS. It also includes interactive elements such as dropdowns, modals,
                    datepickersFlowbite is an open-source library of UI components built with the utility-first
                    classes from Tailwind CSS. It also includes interactive elements such as dropdowns, modals,
                    datepickers.
                </p>

                <form method="post" id="commentForm" class="py-2 mt-8 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                    <label for="comment" class="sr-only">Your comment</label>
                    <input id="text_cmt" name="text_cmt" rows="6" class="px-0 w-full text-sm text-gray-900 border-0 outline-none focus:ring-0 " placeholder="Write a comment..." required/>
                    <button type="submit" name="submitComment" onclick="submitForm()" id="submitComment" class="inline-flex items-center py-2.5 px-4 text-xs font-md text-center text-white bg-gray-700 rounded-lg focus:ring-4 focus:blue-200 dark:focus:blue-700 hover:bg-primary-800">
                        Post comment
                    </button>
                </form>

                <div class="flex items-center">
                    <p class="inline-flex items-center mr-3 font-semibold text-sm text-gray-900 dark:text-white"><img class="mr-2 w-6 h-6 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Michael Gough">Michael Gough</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08" title="February 8th, 2022">Feb. 8, 2022</time></p>
                </div>
                <p class="text-white text-sm px-4 py-2 text-gray-700" id="commentDisplay"> </p>
            </article>
        </div>
    </main>


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

    <script>
        function submitForm() {
    var formData = $("#commentForm").serialize();

    $.ajax({
        type: "POST",
        url: "articleInsert.php",
        data: formData,
        success: function(response) {
            $("#result").html(response);
        }
    });

    $("#commentForm").submit(function(e) {
        e.preventDefault();
    });
}
    </script>
    <!------------------------------------------ end footer --------------------------------------------------------->
</body>

</html> 