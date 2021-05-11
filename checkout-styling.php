<?php

session_start();

$server = "localhost";
$username = "";
$password = "";
$db = "";

$connection = mysqli_connect($server, $username, $password, $db);

if (isset($_GET['reset'])) {
    session_start();
    unset($_SESSION['shoppingcart']);
    session_destroy();
}
if (isset($_POST['add']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    // $price = $_GET['price'];

    // Check if there is a session for the cart set already, if not then set one.
    if (!isset($_SESSION['shoppingcart'])) {
        $_SESSION['shoppingcart'] = [];
    }

    $quantity = $_POST['quantity'];

    $item = [
        "id"       => $id,
        "quantity" => $quantity,
        //   "price" => $price
    ];

    // Now add new item to the cart
    array_push($_SESSION['shoppingcart'], $item);

    // Once added let's take the user to the cart page
    // header("Location: checkout.php");
} else {
    // If the add to cart button was not clicked then go back to the products page.
    // header("Location: products.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    include('includes/css.php')
    ?>
</head>

<body>
    <?php
    include('includes/nav.php')
    ?>
    <main class="checkout-main">
        <section class="checkout-info">
            <form class="form" action="added.php" method="post">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="Name...">

                <label for="email">Email:</label>
                <input type="text" id="email" name="email" value="Email...">

                <label for="card">Card Number:</label>
                <input type="text" id="card" name="card" value="Card Number...">

                <label for="card">Confirm Total Amount</label>
                <input type="text" id="price" name="cost" value="Confirm Cost...">

                <input type="submit" id="submit" name="submit" value="Complete Purchase">


            </form>
        </section>
        <section class="checkout-products">
            <table>
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>ID</th>
                        <th>Cost</th>
                        <th class="no-padding">Category</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>$name</td>
                        <td>$id</td>
                        <td>$cost</td>
                        <td class="no-padding">$category</td>
                    </tr>
                </tbody>
            </table>
            <!-- <p>$name || $category</p>
            <p>$price || $id</p> -->
        </section>


    </main>
    <?php
    include('includes/footer.php');
    ?>
</body>

</html>


<!-- <section class="checkout-info">
            <div>
                
            </div>
        </section> -->