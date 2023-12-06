<?php 
include "adminHead.php";
include '../db.inc.php';
if(isset($_POST["delete"])){
    $sql = "DELETE FROM user WHERE user_name='$_POST[username]'";
    $conn->query($sql);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body class="">
    <div class="flex justify-center">
      <form method="post" class="w-[50%]">
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
              userrname
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" name="username" placeholder="username">
          </div>
          <button class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="delete" value="delete">
          delete
      </button>
      </form>
    </div>

</body>
</html>