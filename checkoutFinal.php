<?php

$server = "localhost";
$username = "";
$password = "";
$db = "";

$connection = mysqli_connect($server, $username, $password, $db);
if (!$connection) {
    die("Connection Failed: " . mysqli_connect_error());
}

session_start();
unset($_SESSION['shoppingcart']);
unset($_SESSION['items']);
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include('includes/css.php') ?>
</head>

<body>
    <?php include('includes/nav.php') ?>
    <main>
        <?php
        $total = $_POST['total'];
        $id = $_POST['id'];

        // $id = $_SESSION['shoppingcart'];
        // $total = $_SESSION['names'];

        $name = mysqli_real_escape_string($connection, $_POST['name']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $queryTwo = "INSERT INTO orders (name,email,productID,cost) VALUES ('$name','$email','$id','$total')";
        $sql = mysqli_query($connection, $queryTwo);

        if ($sql) {
            echo "<h1>Order has been placed!</h1>";
        } else {
            echo mysqli_error($connection);
        }

        // if(isset($_POST['submit-checkout'])){
        //     $id = $_SESSION['shoppingcart'];
        //     $total = $_SESSION['names'];

        //     $name = mysqli_real_escape_string($connection, $post['name']);
        //     $email = mysqli_real_escape_string($connection, $post['email']);

        //     $query = "INSERT INTO orders (name,email,productID,cost) VALUES ('$name','$email','$id','$total')";
        //     $sql = mysqli_query($connection, $query);
        // }
        // if($sql){
        //     echo "<h1> Added to database</h1>";
        // }else{
        //     echo mysqli_error($connection);
        // }
        ?>

    </main>
</body>
<?php include('includes/footer.php') ?>

</html>