<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>this is delete page</h3>


    <?php

        $alias=$_GET["product_alias"];
       
       $conn=mysqli_connect("localhost","root","","livi2");

       $sql="DELETE FROM products31 WHERE alias='".$alias."'";

       mysqli_query($conn, $sql);

       header("location: table.php");
    
    ?>
</body>
</html>