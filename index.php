<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="glide.core.css">
    <link rel="stylesheet" href="glide.theme.css">
    <?php
    include('includes/css.php')
   ?>

</head>

<body>

    <?php
    include('includes/nav.php')
        ?>
    <main>

        <div class="carousel">
            <div class="glide">
                <div class="glide__track" data-glide-el="track">

                    <ul class="glide__slides">
                        <li class="glide__slide">
                            <a href="product-description.php?product-description=12">
                                <img class="image" src="images/24.5_monitor_thumbnail.jpg" alt="">
                            </a>
                        </li>
                        <li class="glide__slide">
                            <a href="product-description.php?product-description=20">
                                <img class="image" src="images/bluetooth_remote_thumbnail.jpg" alt="">
                            </a>
                        </li>

                        <li class="glide__slide">
                            <a href="product-description.php?product-description=19">
                                <img class="image" src="images/charging_block_thumbnail.jpg" alt="">
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="glide__arrows" data-glide-el="controls">
                    <button class="glide__arrow glide__arrow--left" data-glide-dir="<">Next</button>
                    <button class="glide__arrow glide__arrow--right" data-glide-dir=">">Previous</button>
                </div>
            </div>
        </div>


        <section class="centerAlignFlex">
            <div class="dealText">
                <h2>24 Hour Daily Deal</h2>
                <h2>Sale Price $price</h2>
            </div>
            <figure>
                <img src="images/headphone_thumbnail.jpg" alt="test">
            </figure>
            <div class="dealTextRight">
                <h2>GET THE LATEST NEW COMPUTERS DEALS HERE</h2>
                <h3><a href="all-products.php">Click here to view more</a></h3>
            </div>
        </section>
    </main>
    <?php
    include('includes/footer.php');
  ?>
    <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
    <script src="app.js"></script>
</body>

</html>