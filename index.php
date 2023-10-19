<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kiwi Computer Accessories Store</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <?php require("includes/connection.php") ?>
  <header>
    <?php include('includes/navbar.php'); ?>
  </header>

  <section class="hero-section">
    <div class="hero-content">
      <h1>Welcome to Kiwi Accessories</h1>
      <p>
        Memudahkan Cara Anda Bekerja, Berkomunikasi Dan Berinteraksi Dengan
        Komputer Anda
      </p>
    </div>
  </section>

  <section class="product-showcase">
    <h2>Featured Products</h2>
    <div class="product-slider-container">

      <div class="product-slider">
        <?php

        $result = mysqli_query($conn, "SELECT * FROM accessories");

        while ($row = mysqli_fetch_assoc($result)) { ?>
          <div class="product-card-container">
            <div class="product-card">
              <img src="<?= $row['image'] ?>" alt="" />
              <h3>
                <?= $row['name'] ?>
              </h3>
              <p class="product-description">
                <?= $row['description'] ?>
              </p>
              <p class="product-price">Rp
                <?= $row['price'] ?>
              </p>
              <a href="#" class="cta-button">Beli</a>
            </div>
          </div>
        <?php } ?>
      </div>


    </div>
  </section>
  <?php include('includes/footer.php'); ?>
  <script src="script.js" ;></script>
</body>

</html>