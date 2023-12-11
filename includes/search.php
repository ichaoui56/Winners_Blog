<?php

include("./db.inc.php");
include("utils/fetchData.php");

// Select the created or existing database
mysqli_select_db($conn, 'blog');


if (isset($_POST['input'])) {
    $input = $_POST['input'];

    // Using prepared statements for security
    $query = "SELECT * FROM Article WHERE title LIKE ? ";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $inputPattern);

    $inputPattern = $input . '%';

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);


    if (mysqli_num_rows($result) > 0) {
        echo "<section id='container' class='bg-white mb-32 mx-10 rounded-2xl text-gray-600 body-font'>";
        echo "<div class='container px-5 py-24 mx-auto'>";
        echo "<div class='flex flex-wrap -m-4 js-container'>";

        while ($row = mysqli_fetch_assoc($result)) {
            $categoryID = $row["category_id"];
            $categoryInfo = getCategory($categoryID, $conn);

            if ($categoryInfo) {
                $categoryName = $categoryInfo[0]["category"];

                echo "<div class='p-4 md:w-1/3'>";
                echo "<div class='draggable h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden' draggable='true'>";
                echo "<img src='data:image/png;base64," . base64_encode($row["article_picture"]) . "' alt='blog' style='filter: invert(0);' class='lg:h-48 md:h-36 w-full object-cover object-center'/>";
                echo "<div class='p-6'>";
                echo "<h2 class='tracking-widest text-xs title-font font-medium text-gray-400 mb-1'>" . $categoryName . "</h2>";
                echo "<h1 class='title-font text-lg font-medium text-gray-900 mb-3'>" . $row["title"] . "</h1>";
                echo "<p class='leading-relaxed mb-3'>" . $row["description"] . "</p>";
                echo "<div class='flex items-center flex-wrap '>";
                echo "<a href='pages/article.php?id=" . $row['id_article'] . "' class='text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0'>Learn More</a>";
                echo "<svg class='w-4 h-4 ml-2' viewBox='0 0 24 24' stroke='currentColor' stroke-width='2' fill='none' stroke-linecap='round' stroke-linejoin='round'>";
                echo "<path d='M5 12h14'></path><path d='M12 5l7 7-7 7'></path></svg></a>";
                echo "<span class='text-gray-400 mr-3 inline-flex items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm pr-3 py-1 border-r-2 border-gray-200'>";
                echo "<svg class='w-4 h-4 mr-1' stroke='currentColor' stroke-width='2' fill='none' stroke-linecap='round' stroke-linejoin='round' viewBox='0 0 24 24'>";
                echo "<path d='M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z'></path><circle cx='12' cy='12' r='3'></circle></svg>1.2K</span>";
                echo "<span class='text-gray-400 inline-flex items-center leading-none text-sm'>";
                echo "<svg class='w-4 h-4 mr-1' stroke='currentColor' stroke-width='2' fill='none' stroke-linecap='round' stroke-linejoin='round' viewBox='0 0 24 24'>";
                echo "<path d='M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z'>";
                echo "</path></svg>6</span></div></div></div></div>";
            }
        }

        echo "</div></div></div></section>";
    } else {
        echo "<section id='container' class='bg-white mb-32 mx-10 rounded-2xl text-gray-600 body-font'>";
        echo "<div class='container px-5 py-24 mx-auto'>";
        echo "<p>No data found</p>";
    }
} else {
    echo "Error in preparing the statement: " . mysqli_error($conn);
}
