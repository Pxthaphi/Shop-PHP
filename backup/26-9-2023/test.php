<?php
include "connection.php";
session_start();

// Add product to cart
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['Product_ID'];
    $product_name = $_POST['Product_Name'];
    $product_price = $_POST['Product_Price'];
    $quantity = $_POST['Product_Qty'];
    
    // Create a unique identifier for the product in the cart
    $cart_item_id = md5($product_id);
    
    // Check if the product is already in the cart
    if (isset($_SESSION['cart'][$cart_item_id])) {
        // Update the quantity of the existing product in the cart
        $_SESSION['cart'][$cart_item_id]['Product_Qty'] += $quantity;
    } else {
        // Add the product to the cart
        $_SESSION['cart'][$cart_item_id] = [
            'Product_ID' => $product_id,
            'Product_Name' => $product_name,
            'Product_Price' => $product_price,
            'Product_Qty' => $quantity
        ];
    }
}

// Remove product from cart
if (isset($_GET['remove_item'])) {
    $cart_item_id = $_GET['remove_item'];
    
    // Remove the product from the cart
    unset($_SESSION['cart'][$cart_item_id]);
}

// Clear the cart
if (isset($_GET['clear_cart'])) {
    // Clear all items from the cart
    $_SESSION['cart'] = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h2>Product List</h2>
    <ul>
        <li>
            <form method="post" action="">
                <h3>Product 1</h3>
                <input type="hidden" name="Product_ID" value="1">
                <input type="hidden" name="Product_Name" value="Product 1">
                <input type="hidden" name="Product_Price" value="10.00">
                Quantity: <input type="number" name="Product_Qty" value="1" min="1">
                <input type="submit" name="add_to_cart" value="Add to Cart">
            </form>
        </li>
        <li>
            <form method="post" action="">
                <h3>Product 2</h3>
                <input type="hidden" name="Product_ID" value="2">
                <input type="hidden" name="Product_Name" value="Product 2">
                <input type="hidden" name="Product_Price" value="15.00">
                Quantity: <input type="number" name="Product_Qty" value="1" min="1">
                <input type="submit" name="add_to_cart" value="Add to Cart">
            </form>
        </li>
    </ul>
    
    <h2>Shopping Cart</h2>
    <?php if (!empty($_SESSION['cart'])): ?>
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['cart'] as $cart_item_id => $item): ?>
                    <tr>
                        <td><?php echo $item['Product_Name']; ?></td>
                        <td><?php echo $item['Product_Price']; ?></td>
                        <td><?php echo $item['Product_Qty']; ?></td>
                        <td><?php echo $item['Product_Price'] * $item['Product_Qty']; ?></td>
                        <td>
                            <a href="?remove_item=<?php echo $cart_item_id; ?>">Remove</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3"><strong>Total:</strong></td>
                    <td colspan="2"><strong><?php echo calculateCartTotal(); ?></strong></td>
                </tr>
            </tbody>
        </table>
        <a href="?clear_cart=1">Clear Cart</a>
    <?php else: ?>
        <p>Your cart is empty.</p>
    <?php endif; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Function to calculate the total price of the cart
function calculateCartTotal() {
    $total = 0;
    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            $total += $item['Product_Price'] * $item['Product_Qty'];
        }
    }
    return $total;
}
?>
