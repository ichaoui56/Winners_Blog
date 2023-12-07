<?php
include "adminHead.php";
include '../db.inc.php';
if (isset($_POST['addUser'])) {
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $picture = $_POST['picture'];
    $password = $_POST['password'];
    $type = $_POST['type'];

    $query = "INSERT INTO user (
        `user_name`, `user_phone`, `user_email`, `user_picture`, `password`
        ) VALUES 
        ('$username', '$phone', '$email', '$picture' ,'$password')";

        if($conn->query($query)){
        echo("<script>alert('yes')</script>");
        } else {
        echo "ERROR : " . $query . $conn->error;
        }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>new user</title>
</head>
<body class="">
<div class="flex justify-center">
  <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-[50%]"   " method="post" name="newUser">
    
  <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
        username
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" name="username" placeholder="username">
    </div>

    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">
        phone number
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="phone" type="text" name="phone" placeholder="phone">
    </div>

    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
        email
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" name="email" placeholder="email">
    </div>

      <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="picture">
        picture
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="picture" type="file" name="picture" placeholder="picture">
    </div>

      <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
        password
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" name="password" placeholder="password">
    </div>

    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="type">
        type
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="type" type="type" name="type" placeholder="type">
    </div>

    <div class="flex items-center justify-between">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="addUser" value="addUser">
        create users
    </button>
    </div>
    
  </form>
</div>
</body>
</html>