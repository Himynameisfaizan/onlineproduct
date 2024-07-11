<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body><br><br>

    <?php
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $conn = mysqli_connect("localhost", "root", "", "livi2");
        $sql = "INSERT INTO `user`(`name`, `email`, `pwd`) VALUES ('" . $name . "','" . $email . "','" . $pass . "')";
        mysqli_query($conn, $sql);
        if (mysqli_query($conn, $sql)) {
            $_SESSION["login"] = "true";
            $_SESSION["name"]=$row["name"];
            header("location: table.php");
        } else {
            $_SESSION["login"] = "false";
            echo "<p style='color:red;'>*Fill form carefully</p>";
        }
    }
    ?>
    <div class="panel panel-primary">

        <div class="panel-heading text-center">
            <h2>Login your account</h2>
        </div><br><br>

        <div class="panel-body">
            <form style="margin-left: 200px;" action="<?php $_SERVER["PHP_SELF"] ?>" method="post">

                <label>Enter your name</label>
                <input style="width: 800px;" class="form-control" type="text" name="name" placeholder="Enter your name..."><br>

                <label>Enter email address</label>
                <input style="width: 800px;" class="form-control" type="text" name="email" placeholder="Enter email address..."><br>

                <label>Enter password</label>
                <input style="width: 800px;" class="form-control" type="password" name="pass" placeholder="Enter password..."><br>

                <input type="submit" value="Login" class="btn btn-primary"><br><br>

                <div class="panel-footer">
                    <a href="index.php">Have an account</a>
                </div>
            </form>
        </div>

    </div><br>
    <a style="margin-left: 200px;" href="table.php">Show table</a>
</body>

</html>