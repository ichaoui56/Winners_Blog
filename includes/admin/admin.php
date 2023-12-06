<?php 
    include '../db.inc.php';
    $result = $conn->query("SELECT * FROM `user`;");
    $col = $result->fetch_assoc(); 
    echo $col["user_name"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>