<?php include("../includes/db.inc.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="icon" type="image/png" href="../pictures/avito.png" />
  <title>My Articles</title>
</head>

<body class="bg-gray-300" style="background-color: #d5deef;">

  <!-- Navbar -->
  <div id="navbar-container">
    <?php include("../js/navbar.php"); ?>
  </div>
  <?php
  if (isset($_SESSION["user_id"])) {
    $userId = $_SESSION["user_id"];
    $articles = getArticleSpecific($userId, $conn);
  } else {
    exit;
  }
  ?>
  <script src="../js/script.js"></script>
  <!-- End Navbar -->

  <!-- Main Content -->
  <!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/aspect-ratio'),
    ],
  }
  ```
-->


  <section id="container" class="bg-white mb-32 mx-10 rounded-2xl text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
      <div class="flex flex-wrap -m-4 js-container">
        <?php
        foreach ($articles as $key => $value) {
          $commentCount = getCommentCount($conn, $value["id_article"]);
          if (!$value["soft_delete"]) {
        ?>
        <div class="p-4 md:w-1/3 draggable" draggable="true">

          <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
            <?php echo '<img src="data:image/png;base64,' . base64_encode($value["article_picture"]) . '" alt="blog" style="filter: invert(0);" class="sba3 lg:h-48 md:h-36 w-full object-contain object-center"/>';
              ?>
            <div class="lg:h-20 md:h-14 flex justify-center " style="backdrop-filter: blur(10px);">
              <button>
                  <a href="./modify_article.php?articleId=<?php echo $value["id_article"]; ?>"
                    class="relative rounded  px-5 py-2.5 overflow-hidden group bg-green-500 hover:bg-gradient-to-r hover:from-green-500 hover:to-green-400 text-white hover:ring-2 hover:ring-offset-2 hover:ring-green-400 transition-all ease-out duration-300">
                    <span
                      class="absolute right-0 w-8 h-32 -mt-12 transition-all duration-1000 transform translate-x-12 bg-white opacity-10 rotate-12 group-hover:-translate-x-40 ease"></span>
                    <span class="relative">Edit</span>
                  </a>

              </button>
              <button>
                <a href="../includes/deleteArticle.php?articleId=<?php echo $value["id_article"]; ?>"
                  class="relative rounded px-5 ml-5 py-2.5 overflow-hidden group bg-red-500 hover:bg-gradient-to-r hover:from-red-500 hover:to-red-400 text-white hover:ring-2 hover:ring-offset-2 hover:ring-red-400 transition-all ease-out duration-300">
                  <span
                    class="absolute right-0 w-8 h-32 -mt-12 transition-all duration-1000 transform translate-x-12 bg-white opacity-10 rotate-12 group-hover:-translate-x-40 ease"></span>
                  <span class="relative">Delete</span>
                </a>
              </button>
            </div>

            <div class="p-6">
              <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">
                <?php echo $value["category"]; ?>
              </h2>
              <h1 class="title-font text-lg font-medium text-gray-900 mb-3">
                <?php echo $value["title"]; ?>
              </h1>
              <p class="leading-relaxed mb-3">
                <?php echo $value["description"]; ?>
              </p>
              <div class="flex items-center flex-wrap ">
                <a class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">Learn More
                  <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14"></path>
                    <path d="M12 5l7 7-7 7"></path>
                  </svg>
                </a>
                <span
                  class="text-gray-400 mr-3 inline-flex items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
                  <?php echo $value["article_date"]
                    ?>
                </span>
                <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                  <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round"
                    stroke-linejoin="round" viewBox="0 0 24 24">
                    <path
                      d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z">
                    </path>
                  </svg><?php echo $commentCount; ?>
                </span>

              </div>
            </div>
          </div>
        </div>
        <?php }} ?>
      </div>
    </div>
  </section>



  <!------------------------------------------end Countainer---------------------------------------------- -->
  <!-----------------------------  Search Results Display  ------------------------------------------------->
  <div id="searchresult"></div>


  <!-- End Main Content -->

  <!-- Footer -->
  <div id="Footer-container"></div>
  <script src="../js/footer.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script src="https://daniellaharel.com/raindrops/js/raindrops.js"></script>

  <!-- Footer -->
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
  <!-- End Footer -->

  <!--------------------------------  Search script Start  --------------------------------->


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script type="text/javascript">
      //ws = new WebSocket('ws://127.0.0.1:5500/');

      // Wait for the document to be fully loaded
      $(document).ready(function () {
          // When the user types in the input field with ID "live_search"
          $("#live_search").on("input", function () {
              // Get the value of the input
              var input = $(this).val();
              console.log("Input: " + input);  // Check if the input is captured

              // Check if the input is not empty
              if (input != "") {
                  // Make an AJAX request to "search.php"
                  $.ajax({
                      url: "../includes/search_my_article.php",
                      method: "POST",
                      data: { input: input }, // Send the input data to the server
                      success: function (data) {
                          // When the request is successful, update the content of the element with ID "searchresult"
                          $("#searchresult").html(data);
                          // Hide elements with class "js-container"
                          $("#container").css("display", "none");
                      }
                  });
              } else {

                  $("#searchresult").css("display", "block");
                  $("#container").css("display", "block"); // Show all articles
              }
          });
      });
  </script>

  <!--------------------------------  Search script End  --------------------------------->

  <script src="../js/drag_drop.js"></script>
</body>

</html>