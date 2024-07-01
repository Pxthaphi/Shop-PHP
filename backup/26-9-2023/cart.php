<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
</head>
<body>
    <h1>Shopping Cart</h1>
    
    <!-- Product list -->
    <h2>Product List</h2>
    <table border="1">
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        <tr>
            <td>Product 1</td>
            <td>$10.00</td>
            <td><a href="?add=product1">Add to Cart</a></td>
        </tr>
        <tr>
            <td>Product 2</td>
            <td>$15.00</td>
            <td><a href="?add=product2">Add to Cart</a></td>
        </tr>
        <tr>
            <td>Product 3</td>
            <td>$20.00</td>
            <td><a href="?add=product3">Add to Cart</a></td>
        </tr>
        <!-- Add more rows for additional products -->
    </table>
    
    <!-- Cart section -->
    <h2>Your Cart</h2>
    <table border="1">
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>
        <?php
        session_start();
        
        // Check if the cart is empty
        if (!empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $productCode => $product) {
                echo "<tr>";
                echo "<td>{$product['name']}</td>";
                echo "<td>\${$product['price']}</td>";
                echo "<td>{$product['quantity']}</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Your cart is empty.</td></tr>";
        }
        ?>
    </table>
    
    <!-- Reset Cart button -->
    <form method="post">
        <input type="submit" name="reset" value="Reset Cart">
    </form>
    
    <?php
    // Handle adding products to the cart
    if (isset($_GET['add']) && !empty($_GET['add'])) {
        $productToAdd = $_GET['add'];
        
        // Sample product data (you can replace this with your product data from a database)
        $products = array(
            "product1" => array("name" => "Product 1", "price" => 10.00),
            "product2" => array("name" => "Product 2", "price" => 15.00),
            "product3" => array("name" => "Product 3", "price" => 20.00)
        );
        
        // Check if the product is already in the cart
        if (array_key_exists($productToAdd, $products)) {
            $productCode = $productToAdd;
            
            if (isset($_SESSION['cart'][$productCode])) {
                // If the product is in the cart, increment the quantity
                $_SESSION['cart'][$productCode]['quantity']++;
            } else {
                // If the product is not in the cart, add it to the cart with quantity 1
                $product = $products[$productCode];
                $product['quantity'] = 1;
                $_SESSION['cart'][$productCode] = $product;
            }
        }
    }
    
    // Handle resetting the cart
    if (isset($_POST['reset'])) {
        $_SESSION['cart'] = array(); // Clear the cart
    }
    ?>
</body>
</html>
