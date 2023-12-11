<?php

include("../includes/db.inc.php");



function getArticleUser($articleId, $conn)
{
    $output = array();
    $sql = "SELECT
                article.*,
                user.id_user,
                user.user_name,
                user.user_phone,
                user.user_email,
                user.user_picture,
                user.city,
                user.password,
                user.soft_delete AS user_soft_delete
            FROM
                article
            JOIN
                user ON article.creator_id = user.id_user
            WHERE
                article.id_article=?";

    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "i", $articleId);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    while ($row = mysqli_fetch_assoc($res)) {
        $output[] = $row;
    }

    return $output;
}



// Retrieve the article ID from the URL
$articleId = isset($_GET['id']) ? $_GET['id'] : null;




// Check if the ID is valid
if ($articleId) {
    // Fetch the article based on the ID
    $user = getArticleUser($articleId, $conn);

    //var_dump($user);

    // Check if the article exists
    if (!empty($user)) { ?>



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
                                <?php foreach ($user as $singleUser) : ?>

                                    <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                                        <?= '<a href="./User-Profile.php"><img src="data:image/png;base64,' . base64_encode($singleUser["user_picture"]) . '" alt="profile_pic" class="mr-4 w-16 h-16 rounded-full" ></a>'; ?>

                                        <div>
                                            <a href="./User-Profile.php" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">
                                                <?= $singleUser["user_name"]; ?>
                                            </a>
                                            <p class="text-base text-gray-500 dark:text-gray-400">
                                                <?= $singleUser["article_date"]; ?>
                                            </p>
                                        </div>
                                    </div>
                            </address>


                            <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                                <?= $singleUser['title'] ?></h1>

                        </header>
                        <?= '<img src="data:image/png;base64,' . base64_encode($singleUser["article_picture"]) . '" alt="blog" style="filter: invert(0);">'; ?>
                        <p class="lead text-[#9CA3A2]">
                            <?php echo $singleUser["description"]; ?>
                        </p>
                    <?php endforeach; ?>

                    <form method="post" id="commentForm" class="py-2 mt-8 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                        <label for="comment" class="sr-only">Your comment</label>
                        <input id="text_cmt" name="text_cmt" rows="6" class="px-0 w-full text-sm text-gray-900 border-0 outline-none focus:ring-0 " placeholder="Write a comment..." required />
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
<?php
    } else {
        // Handle the case where the article does not exist
        echo "Article not found";
    }
} else {
    // Handle the case where the ID is not provided
    echo "Invalid article ID";
}
