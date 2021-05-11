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

        <form action="#" class="sortForm">
            <label for="sortOrder">Sort by:</label>
            <select id="sortOrder">
                <option value="">-- please choose one --</option>
                <option value="expensive">Most Expensive</option>
                <option value="cheap">Least Expensive</option>
                <option value="category">Category</option>
                <option value="title">Alphabetical, A-Z</option>
            </select>
        </form>
        <section class="allProducts" id="allProducts">
            <!-- <div class="col"> -->
            <?php
            // $query = "SELECT id,category,name,price,description FROM ecommerce";
            $query = "SELECT id,category,name,price,description,thumbnail FROM products";
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
            <div class='singleProduct' data-title='$name' data-price = '$price' data-category ='$category'>
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
    <script>
        sortOrder.addEventListener("change", function() {
            sortItems(sortOrder.value);
        })

        function sortItems(sortTerm) {
            // console.log(sortTerm);
            let itemsArray = Array.prototype.slice.call(allProducts.querySelectorAll(".singleProduct"), 0);
            console.log(itemsArray);
            if (sortTerm == "title") {
                itemsArray.sort((a, b) => a.dataset.title.localeCompare(b.dataset.title));
                // console.log(sortTerm);
            }
            if (sortTerm == "category") {
                itemsArray.sort((a, b) => a.dataset.category.localeCompare(b.dataset.category));
                // console.log(sortTerm);
            }
            if (sortTerm == "cheap") {
                itemsArray.sort((a, b) => a.dataset.price - b.dataset.price);
            }
            if (sortTerm == "expensive") {
                itemsArray.sort((b, a) => a.dataset.price - b.dataset.price);
            }
            itemsArray.forEach((painting) => {
                allProducts.appendChild(painting);
            })
        }
    </script>

</body>

</html>