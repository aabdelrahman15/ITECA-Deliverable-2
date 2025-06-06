<?php 
include 'includes/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products | SA C2C Marketplace</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Reuse header from index.php -->
    <header class="header">
        <!-- ... same as index.php ... -->
    </header>

    <section class="products-section">
        <div class="container">
            <h2>Available Products</h2>
            <div class="filters">
                <div class="search-box">
                    <input type="text" placeholder="Search products...">
                    <button><i class="fas fa-search"></i></button>
                </div>
                <div class="sorting">
                    <label for="sort">Sort by:</label>
                    <select id="sort">
                        <option>Price: Low to High</option>
                        <option>Price: High to Low</option>
                        <option>Newest First</option>
                    </select>
                </div>
            </div>
            
            <div class="product-grid">
                <?php
                $sql = "SELECT * FROM products";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '
                        <div class="product-card">
                            <div class="product-image">
                                <img src="assets/product-placeholder.jpg" alt="'.$row["name"].'">
                            </div>
                            <div class="product-details">
                                <h3>'.$row["name"].'</h3>
                                <p class="price">R '.number_format($row["price"], 2).'</p>
                                <p class="description">'.$row["description"].'</p>
                                <div class="product-meta">
                                    <span><i class="fas fa-user"></i> Seller '.$row["seller_id"].'</span>
                                    <span><i class="fas fa-map-marker-alt"></i> Johannesburg</span>
                                </div>
                                <button class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                            </div>
                        </div>';
                    }
                } else {
                    echo '<p>No products available at the moment.</p>';
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Reuse footer from index.php -->
    <footer class="footer">
        <!-- ... same as index.php ... -->
    </footer>

    <script src="script.js"></script>
</body>
</html>