<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>this is add2 page</h3>

    <?php
    $pr_name=$_POST["pr_name"];
    $pr_alias=$_POST["pr_alias"];
    $pr_desc=$_POST["pr_desc"];
    $cat_id=$_POST["cat_id"];
    $pr_image=$_POST["pr_image"];

    $conn=mysqli_connect("localhost","root","","livi2");

    $sql="INSERT INTO `products31`(`cat_id`, `product_name`, `alias`, `description`, `product_image`, `is_delete`) VALUES ('".$cat_id."','".$pr_name."','".$pr_alias."','".$pr_desc."','".$pr_image."', 0)";

    mysqli_query($conn, $sql);

    header("location: table.php");
    ?>
</body>
</html>