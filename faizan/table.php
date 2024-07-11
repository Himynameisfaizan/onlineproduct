<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>


    <br>
    <div class="container">
    <?php
    session_start();
    $f = 0;
    if ($_SESSION["login"] == "true") {
        echo "<h3 style='text-align:right;';>Hello, " . $_SESSION['name'] . " </h3>";
        echo "<h5 style='text-align:right';><a href='logout.php'>Logout account</a></h5>";
        $f = 1;
    }
    else{
        echo "<h5 style'color:red'><a href='index.php'>*Please signup first</a> </h5>";
    }
    ?>
        <a href="add_product.php">Add more product</a>
        <a href="search.php">| Search product</a><br><br>
        <table class="table table-bordered">
            <tr>
                <th>Product name </th>
                <th>category name </th>
                <th>Alias </th>
                <th>Description </th>
                <th>Product image </th>
                <?php
                if ($f == 1) {
                ?>
                    <th>Read</th>
                    <th>Edit</th>
                    <th>Delete</th>
                <?php } ?>
            </tr>

            <?php
        
            $conn = mysqli_connect("localhost", "root", "", "livi2");

            $sql = "SELECT products31.product_name, category31.cat_name, products31.alias, products31.description,products31.product_image FROM products31 INNER JOIN category31 ON products31.cat_id=category31.id";

            $result = mysqli_query($conn, $sql);

            $count = 0;
            while ($row = mysqli_fetch_array($result)) {
                $count++;
            ?>
                <tr>
                    <td><?php echo $row["product_name"] ?></td>
                    <td><?php echo $row["cat_name"] ?></td>
                    <td><?php echo $row["alias"] ?></td>
                    <td><?php echo $row["description"] ?></td>
                    <td style="width: 250px;"><img style="width: 100%;" src="<?php echo $row["product_image"] ?>"></td>
                    <?php if ($f == 1) { ?>
                        <td><a href="read.php?product_alias=<?php echo $row["alias"] ?>">Read</a></td>
                        <td><a href="edit.php?product_alias=<?php echo $row["alias"] ?>">Edit</a></td>
                        <td><a href="delete.php?product_alias=<?php echo $row["alias"] ?>">Delete</a></td>
                    <?php } ?>
                </tr>
            <?php } ?>


        </table>
        <h3><?php echo "<h2>the count is: $count</h2>" ?></h3>
    </div>
</body>

</html>