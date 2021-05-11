<?php
$server = "localhost";
$username = "";
$password = "";
$db = "";

$connection = mysqli_connect($server, $username, $password, $db);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
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

    <?php
    $productDescription = $_GET['product-description'];
    $query = "SELECT id,category,name,price,description,thumbnail FROM products WHERE id=$productDescription";
    $sql = mysqli_query($connection, $query);

    $row = mysqli_fetch_array($sql);
    $id = $row['id'];
    $category = $row['category'];
    $name = $row['name'];
    $price = $row['price'];
    $description = $row['description'];
    $thumbnail = $row['thumbnail'];

    ?>

    <main>
        <section class="productDescription">
            <div class="imageFlexProduct">
                <img src="images/<?= $thumbnail ?>" alt="">
            </div>
            <div class="textFlexProduct">
                <?php echo "
                <h1>$name</h1>
                <h2>$category</h2>
                <p>$description</p>
                <div class='btn-styling-product-page'>
                    <button class='price-btn productPage-btn'>$$price</button>
                   
                <form id='submit-form'class='qtyForm' action='checkout.php?id=$id' method='post'>
                <label for='quantity'>Quantity:</label>
                <input type='number' name='quantity' id='quantity' min='1' max='10' value='1' required>
                <input type='submit' class='info-btn' name='add' id='addToCart' value='Add to Cart'>
                </form>
                "; ?>
            </div>
            </div>
        </section>
    </main>

    <?php
    include('includes/footer.php');
    ?>
</body>

</html>