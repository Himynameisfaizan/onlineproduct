<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Document</title>
    <style>
        .container {
            display: flex;
            justify-content: space-between;
            /* background-color: red; */
            height: 70vh;
            margin-top: 50px;
        }
        
        
        
        .con img {
            /* border: 1px black solid; */
            width: 250px;
            height: 300px;
            object-fit: cover;
        }
    </style>
</head>

<body><br><br>
    <div class="container">

        <?php

        $alias = $_GET["product_alias"];

        $conn = mysqli_connect("localhost", "root", "", "livi2");

        $sql = "SELECT products31.product_name, category31.cat_name, products31.alias, products31.description, products31.product_image FROM products31 INNER JOIN category31 ON products31.cat_id=category31.id WHERE products31.alias='".$alias."'";

        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($result)) {

        ?>
                
            <div class="col-md-4 con">
                <img src="<?php echo $row["product_image"] ?>" alt="">
            </div>
            <div class="col-md-6 ">
                <h1><?php echo $row["product_name"] ?></h1>
                <h4><?php echo $row["cat_name"] ?></h4>
                <p><?php echo $row["description"] ?></p>
            </div>

        <?php } ?>
    </div>
</body>

</html>