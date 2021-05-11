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
    <main id="mainProducts">
        <section class="allProducts">

            <!-- <div class="col"> -->
            <?php
            // $query = "SELECT id,category,name,price,description,thumbnail FROM products";
            $query = "SELECT id,category,name,price,description,thumbnail FROM products WHERE category='hardware'";
            // $query = "SELECT * FROM products where `category` = `Accessory`";
            $sql = mysqli_query($connection, $query);

            if ($sql) {
                while ($row = mysqli_fetch_array($sql)) {
                    // print_r($row); // this prints the entire array
                    $id = $row['id'];
                    $category = $row['category'];
                    $name = $row['name'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $thumbnail = $row['thumbnail'];
                    echo "
            <div class='singleProduct'>
                <p>$name</p>
                <figure class='productPageImg'>
                    <img class='imgProduct' src='images/$thumbnail' alt='$description'>
                </figure>
                <div class='productInfo'>
                    <form action='product-description.php?product-description=$id' method='post'>
                        <button class='info-btn'>More Info</button>
                    </form>
                    <button class='price-btn'>$$price</button>

                </div>
            </div>
            </div>";
                }
            } else {
                echo mysqli_error($connection);
            }
            ?>


        </section>
    </main>


</body>

</html>