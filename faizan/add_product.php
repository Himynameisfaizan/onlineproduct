<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Document</title>
</head>
<script>
    function abc() {
        var a = document.getElementById("num1").value;

        var b = "";

        for (i = 0; i < a.length; i++) {
            var c = a.charAt(i);

            if (c == " ") {
                d = "_";
            } else {
                d = c;
            }
            b = b + d;

        }

        document.getElementById("num2").value = b;
    }
</script>

<body>

    <?php

    $conn = mysqli_connect("localhost", "root", "", "livi2");

    $sql = "SELECT * FROM category31;";

    $result = mysqli_query($conn, $sql);

    ?>


    <div class="container">
        <!-- <h3>this add product page</h3> --><br><br>

        <form action="add2_product.php" method="post">

            <label for="">Product name</label>
            <input onkeyup="abc()" class=" form-control" id="num1" type="text" name="pr_name" placeholder="Enter product name"> <br>

            <label for="">Product alias</label>
            <input class="form-control" id="num2" readonly="" type="text" name="pr_alias"> <br>

            <label for="">Description</label>
            <textarea class="form-control" type="text" name="pr_desc" cols="5" rows="3" placeholder="Enter about the product"></textarea> <br>

            <label for="">Categories</label>
            <select name="cat_id" class="form-control">
                <?php
                    while($row=mysqli_fetch_array($result)){

                        ?>
                        <option value="<?php echo $row["id"]?>">
                            <?php echo $row["cat_name"]?>
                        </option>
                    <?php }?>
            </select> <br>
            <label for="">Product image</label>
            <input class="form-control" type="file" name="pr_image" placeholder="Drop the picture here"> <br>


            <input class="btn btn-primary" type="submit" value="update">
        </form>
    </div>
</body>