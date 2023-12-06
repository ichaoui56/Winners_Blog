<?php 
    include '../db.inc.php';
    $result = $conn->query("SELECT * FROM `user`;");
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <title>Document</title>
</head>
<body>
<table id="myTable" class="display">
    <thead>
        <tr>
            <th>username</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>
    </thead>

    
    <tbody>
        <?php 
            while( $col = $result->fetch_assoc()):?>
           
            <tr>
               <td> <?= $col["user_name"] ?></td>
               <td> <?= $col["user_email"] ?></td>
               <td> <?= $col["user_phone"] ?></td>
            </tr>
            <?php endwhile;?>
    </tbody>
</table>

</body>
<script>

   let table = new DataTable('#myTable', {
   });
</script>
</html>