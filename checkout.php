<?php

session_start();

$server = "localhost";
$username = "";
$password = "";
$db = "";

$connection = mysqli_connect($server, $username, $password, $db);

if (!$connection) {
    die("Connection Failed: " . mysqli_connect_error());
}
if (isset($_POST['add']) && isset($_GET['id'])) {
    $id = $_GET['id'];


    if (!isset($_SESSION['shoppingcart'])) {
        $_SESSION['shoppingcart'] = [];
    }



    $quantity = $_POST['quantity'];

    $item = [
        "id"       => $id,
        "quantity" => $quantity
    ];

    array_push($_SESSION['shoppingcart'], $item);

    header("Location: checkout.php");
}

if (isset($_GET['reset'])) {
    session_start();
    unset($_SESSION['shoppingcart']);
    unset($_SESSION['items']);
    session_destroy();
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
</head>

<body>
    <?php
    include('includes/nav.php');
    ?>
    <main class="checkout-main">

        <section class="checkout-products">
            <table>
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>ID</th>
                        <th>Cost</th>
                        <th>Quantity</th>
                        <th class="no-padding">Category</th>
                    </tr>
                </thead>


                <tbody>
                    <?php

                    if (isset($_SESSION['shoppingcart']) && count($_SESSION['shoppingcart']) != 0) {
                        $list = $_SESSION['shoppingcart'];




                        foreach ($list as $item) {
                            $id = $item['id'];
                            $quantity = $item['quantity'];

                            //   $subarray =[];
                            //   $count = 0;
                            $query  = "SELECT id,category,name,price,description,thumbnail FROM products WHERE id='$id'";
                            $result = mysqli_query($connection, $query);


                            $row = mysqli_fetch_array($result);

                            $id = $row['id'];
                            $category = $row['category'];
                            $name = $row['name'];
                            $price = $row['price'];
                            $thumbnail = $row['thumbnail'];
                            //   $arraytest = [];
                            $_SESSION['names'] = $array = [];
                            array_push($_SESSION['names'], $price);

                            foreach ($_SESSION['names'] as $key => $value) {

                                $sum += $value;
                            }

                    ?>
                    <?php
                            echo "
 
                    <tr>
                        <td>$name</td>
                        <td>$id</td>
                        <td>$$price</td>
                        <td>$quantity</td>
                        <td class='no-padding'>$category</td>
                    </tr>
                    ";
                        }
                    } else {
                        print("<tr>
        <td>Your shopping cart is empty</td>
        </tr>");
                    }
                    ?>

                    <tr>


                        </td>
                    </tr>
                </tbody>
            </table>
            <table>
                <thead>
                    <tr>
                        <td>Subtotal:</td>
                        <td>GST:</td>
                        <td>Total:</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $tax = $sum * 0.05;
                        $tax = number_format($tax, 2);
                        $total = $tax + $sum;
                        echo "
                    <td>$$sum</td>
                    <td>$$tax</td>
                    <td>$$total</td>
                    " ?>
                    </tr>
                </tbody>
            </table>
        </section>
        <section class="checkout-info">
            <form class="form" action="checkoutFinal.php" method="post" enctype="multipart/form-data">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Name...">

                <label for="email">Email:</label>
                <input type="text" id="email" name="email" placeholder="Email...">

                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="hidden" name="total" value="<?php echo $total ?>">

                <!-- <label for="card">Card Number:</label>
                <input type="text" id="card" name="card" value="Card Number..."> -->

                <input type="submit" id="submit" name="submit-checkout" value="Complete Purchase">
            </form>





            <form action="#" method="GET">
                <label for="reset"></label>
                <input type="submit" value="Remove Items From Cart" name="reset" id="reset">
            </form>
        </section>
    </main>
    <?php
    include('includes/footer.php');
    ?>

</body>

</html>