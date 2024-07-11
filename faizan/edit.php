<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>

    <?php

    $alias = $_GET["product_alias"];

    $conn = mysqli_connect("localhost", "root", "", "livi2");

    $sql = "SELECT * FROM `products31` WHERE products31.alias='" . $alias . "';";

    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result)) {

    ?>


        <div class="container">
            <h3>this is edit page</h3>
            <br><br>
            <form action="edit2.php" method="post">

                <label for="">Product name</label>

                <input class=" form-control" type="text" name="pr_name" value="<?php echo $row["product_name"] ?>"> <br><br>

                <label for="">Product alias</label>

                <input class="form-control" readonly="" type="text" name="pr_alias" value="<?php echo $row["alias"] ?>"> <br><br>
                
                <label for="">Description</label>

                <textarea class="form-control" type="text" name="pr_desc" cols="5" rows="3"><?php echo $row["description"] ?> </textarea> <br><br>

                <label for="">Product image</label>

                <input class="form-control" type="file" name="pr_image" value="<?php echo $row["product_image"] ?>"> <br><br>

                <input class="btn btn-primary" type="submit" value="update">
            </form>

        </div>
    <?php } ?>
</body>

</html>