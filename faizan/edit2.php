<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>this is edit2 page</h3>

    <?php

    $pr_name = $_POST["pr_name"];
    $pr_alias = $_POST["pr_alias"];
    $pr_desc = $_POST["pr_desc"];
    $pr_image = $_POST["pr_image"];

    $conn = mysqli_connect("localhost", "root", "", "livi2");

    $sql = "UPDATE `products31` SET `product_name`='".$pr_name."', `description`='".$pr_desc."',`product_image`='".$pr_image."' WHERE alias='".$pr_alias."'
";

    mysqli_query($conn, $sql);

    header("location: table.php");

    ?>
</body>

</html>