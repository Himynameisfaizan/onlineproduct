<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>

    <script src="jquery.js" type="text/javascript"></script>
    <script src="jquery-ui.js" type="text/javascript"></script>
    <link href="jquery-ui.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        var myarray = [];

        <?php
        $conn = mysqli_connect("localhost", "root", "", "livi2");
        $sql = "select * from products31";
        $result = mysqli_query($conn, $sql);
        $count = 0;
        while ($row = mysqli_fetch_array($result)) {
            $count = $count + 1;
        ?>
            myarray[<?php echo $count ?>] = "<?php echo $row["product_name"] ?>";

        <?php } ?>

        $(document).ready(function() {

            $("#num1").autocomplete({
                source: myarray
            });

        });
    </script>

</head>

<body>

    <BR><Br>
    <div class="container" style="margin:auto;">
        <p style="text-align: right;"><a style=" text-decoration: none;" href="table.php">Go to home page</a></p>
        <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">

            <input id="num1" name="search" type="text" class="form-control" placeholder="Search...." /> <br>
        </form>

    </div>
    <br><br>
    <div class="container">
        <table class="table table-bordered">
            <tr>
                <th>Product name</th>
                <th>Product alias</th>
                <th>Category name </th>
                <th>Description</th>
                <th>Product image</th>
            </tr>
            <?php

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $search = $_POST["search"];
                $conn = mysqli_connect("localhost", "root", "", "livi2");
                $sql = "SELECT products31.product_name, category31.cat_name,products31.alias,products31.description,products31.product_image FROM products31 INNER JOIN category31 ON products31.cat_id=category31.id where products31.product_name like '%" . $search . "%'";

                $result = mysqli_query($conn, $sql);
                
                while ($row = mysqli_fetch_array($result)) {
                
            ?>
                    <tr>
                        <td><?php echo $row["product_name"] ?></td>
                        <td><?php echo $row["alias"] ?></td>
                        <td><?php echo $row["cat_name"] ?></td>
                        <td><?php echo $row["description"] ?></td>
                        <td><img style="width: 200px;" src="<?php echo $row["product_image"] ?>" alt=""></td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </table>
    </div>
</body>

</html>