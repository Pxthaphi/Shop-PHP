<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $menu = "add_stock";
    ?>
    <title>Stock</title>
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <?php include("head_style.php"); ?>
</head>

<body>
    <div id="app">
        <!-- side bars -->
        <?php include("sidebar.php"); ?>

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>ตัดสต็อกสินค้า</h3>
                            <p class="text-subtitle text-muted">ตัดสต็อกสินค้าที่ขายไปแล้ว</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="table_stock.php">ตารางข้อมูลสินค้า</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">ตัดสต็อกสินค้า</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- Basic Horizontal form layout section start -->
                <section class="">
                    <div class="container">
                        <div class="row">
                            <!-- content -->
                            <div class="col-lg-7">
                                <header class="d-sm-flex align-items-center border-bottom mb-4 pb-3">
                                    <?php
                                    require_once "connection.php";

                                    $sql = "SELECT COUNT(Product_ID) FROM product";
                                    $query = mysqli_query($conn, $sql);

                                    if ($query) {
                                        $recordCount = mysqli_fetch_array($query)[0]; // Fetch the count value
                                    } else {
                                        // Handle any errors that occur during the query
                                        echo "Error: " . mysqli_error($conn);
                                    }
                                    // Close the database connection when you're done
                                    ?>

                                    <strong class="d-block py-2">จำนวน <?php echo $recordCount; ?> สินค้าที่เจอ </strong>
                                </header>
                                <div class="input-group rounded">
                                    <input type="search" id="form1" class="form-control rounded" onkeyup="searchProducts()" placeholder="ค้นหาสินค้า" aria-label="ค้นหาสินค้า" aria-describedby="search-addon" />
                                    <button type="button" class="btn btn-primary">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex flex-wrap">
                                            <?php
                                            // Include the connection to your database
                                            require_once 'connection.php';

                                            // Define the number of products to display per page
                                            $productsPerPage = 12;

                                            // Retrieve the total number of products from the database
                                            $totalProductsQuery = mysqli_query($conn, "SELECT COUNT(*) FROM product");
                                            $totalProducts = mysqli_fetch_row($totalProductsQuery)[0];

                                            // Calculate the total number of pages
                                            $totalPages = ceil($totalProducts / $productsPerPage);

                                            // Get the current page number from the URL or use the default page (1)
                                            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

                                            // Calculate the SQL LIMIT clause to fetch products for the current page
                                            $offset = ($currentPage - 1) * $productsPerPage;
                                            $sql = "SELECT * FROM product LIMIT $offset, $productsPerPage";
                                            $query = mysqli_query($conn, $sql);

                                            while ($result = mysqli_fetch_array($query)) {
                                                $productID = $result["Product_ID"];
                                            ?>

                                                <div class="card mx-2 my-2 text-center" style="width: 200px;">
                                                    <img class="card-img-top" src='assets/img/<?= $result["Product_Name"]; ?>.jpg' width="286" height="180" />
                                                    <div class="card-body">
                                                        <h5 class="card-title"><?= $result["Product_Name"]; ?></h5>
                                                        <p class="card-text" style="color:
                                                        <?php
                                                        if ($result["Product_Qty"] > 5) {
                                                            echo '#198754'; // สีเขียว
                                                        } elseif ($result["Product_Qty"] > 0) {
                                                            echo '#ffa100'; // สีเหลือง
                                                        } else {
                                                            echo '#EA0505'; // สีแดง
                                                        }
                                                        ?>
                                                    ;">
                                                            จำนวน <?= $result["Product_Qty"]; ?> ชิ้น
                                                        </p>
                                                    </div>
                                                    <div class="card-footer">
                                                        <a href="#" class="btn btn-success" onclick="addToStockAddBox('<?= $result["Product_Name"]; ?>', <?= $result["Product_Qty"]; ?>, <?= $result["Product_ID"]; ?>)">เพิ่มสต็อกสินค้า</a>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <hr />

                                <!-- Pagination -->
                                <nav aria-label="Page navigation example" class="d-flex justify-content-center mt-3">
                                    <ul class="pagination">
                                        <?php for ($page = 1; $page <= $totalPages; $page++) { ?>
                                            <li class="page-item <?php echo ($page == $currentPage) ? 'active' : ''; ?>">
                                                <a class="page-link" href="add_stock.php?page=<?php echo $page; ?>"><?php echo $page; ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </nav>
                                <!-- Pagination -->
                            </div>
                            <!-- add stock box -->
                            <div class="col-lg-5 pt-5">
                                <div class="row gy-3 mb-4">
                                    <form method="POST" onsubmit="return validateForm();">
                                        <div id="stock-add-box">
                                            <!-- Selected products for stock addting will be displayed here -->
                                        </div>

                                        <button type="submit" class="btn btn-success w-100 shadow-0 mb-2" id="addStockButton" name="add_stock">เพิ่มสต็อกสินค้า</button>
                                        <a href="table_stock.php" class="btn btn-light w-100 border mt-2">ย้อนกลับ</a>
                                        <input type="hidden" id="selected_products" name="selected_products" value="" />
                                    </form>
                                </div>
                            </div>
                            <!-- add stock box -->
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script>
        function addToStockAddBox(productName, currentQuantity, productID) {
            const stockAddBox = document.getElementById("stock-add-box");

            // Check if the product is already in the stock add box
            const existingProduct = stockAddBox.querySelector(`[data-product="${productName}"]`);

            if (!existingProduct) {
                // Create a container for the selected product
                const productContainer = document.createElement("div");
                productContainer.className = "selected-product";
                productContainer.setAttribute("data-product", productName);

                // Create an image element for the product
                const productImage = document.createElement("img");
                productImage.src = `assets/img/${productName}.jpg`;
                productImage.width = 100; // Adjust the width as needed

                // Create a span for the product name
                const productNameSpan = document.createElement("span");
                productNameSpan.textContent = productName;

                // Create an input element for the product quantity
                const productQuantityInput = document.createElement("input");
                productQuantityInput.type = "number";
                productQuantityInput.value = 1; // Default quantity is 1
                productQuantityInput.min = 1; // Minimum quantity is 1
                productQuantityInput.addEventListener("input", function() {
                    updateSelectedProductsInput(); // Update the hidden input field when the user changes the quantity
                });

                // Create a hidden input element for the product ID
                const productIDInput = document.createElement("input");
                productIDInput.type = "hidden";
                productIDInput.name = `product_id_${productName}`;
                productIDInput.value = productID;

                // Create a delete button for the product
                const deleteButton = document.createElement("button");
                const deleteIcon = document.createElement("i");
                deleteIcon.classList.add("bi", "bi-x-lg");
                deleteButton.appendChild(deleteIcon);
                deleteButton.onclick = function() {
                    // Remove the selected product when the delete button is clicked
                    stockAddBox.removeChild(productContainer);
                };

                // Append all elements to the product container
                productContainer.appendChild(productImage);
                productContainer.appendChild(productNameSpan);
                productContainer.appendChild(productQuantityInput);
                productContainer.appendChild(productIDInput);
                productContainer.appendChild(deleteButton);

                // Append the product container to the stock add box
                stockAddBox.appendChild(productContainer);
            }
            // After adding a product, update the hidden input field with selected products and quantities
            updateSelectedProductsInput();
        }

        function updateSelectedProductsInput() {
            const stockAddBox = document.getElementById("stock-add-box");
            const selectedProducts = stockAddBox.querySelectorAll(".selected-product");

            const selectedProductsData = {};
            selectedProducts.forEach(productContainer => {
                const productName = productContainer.getAttribute("data-product");
                const productQuantityInput = productContainer.querySelector("input[type='number']").value;
                const productIDInput = productContainer.querySelector("input[type='hidden']").value;
                selectedProductsData[productName] = {
                    quantity: productQuantityInput,
                    product_id: productIDInput
                };
            });

            // Convert the selected products data to a JSON string and set it as the input value
            const selectedProductsInput = document.getElementById("selected_products");
            selectedProductsInput.value = JSON.stringify(selectedProductsData);
        }

        function searchProducts() {
            const searchInput = document.getElementById("form1").value.toLowerCase();
            const productContainer = document.getElementById("productContainer");
            const productCards = document.querySelectorAll(".card");

            productCards.forEach(card => {
                const productName = card.querySelector(".card-title").textContent.toLowerCase();

                if (productName.includes(searchInput)) {
                    card.style.display = "block";
                } else {
                    card.style.display = "none";
                }
            });
        }
    </script>
    <!-- script -->
    <?php include("script.php"); ?>
    <script>
        function validateForm() {
            const selectedProductsCount = document.querySelectorAll(".selected-product").length;
            if (selectedProductsCount === 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'เตือน <i style="color: orange;">!!</i>',
                    text: 'กรุณาเลือกสินค้าก่อนเพิ่มสต๊อก!!',
                    confirmButtonColor: "#435ebe",
                    confirmButtonText: "ตกลง",
                });
                return false; // Prevent form submission
            }
            return true; // Allow form submission
        }
    </script>

    <!-- auto-check-login -->
    <?php include("auto.php"); ?>
</body>

</html>

<?php

// Include the connection to your database
require_once 'connection.php';

if (isset($_POST["add_stock"])) {
    session_start();
    $username = $_SESSION['username'];
    $sql_user = "SELECT * FROM product, user WHERE user.Username = '$username'";
    $query = mysqli_query($conn, $sql_user);

    while ($result = mysqli_fetch_array($query)) {
        $productID = $result["Product_ID"];
        $username = $result['username'];
    }

    // Retrieve the selected products for stock addition from the POST data
    $selectedProductsJSON = $_POST["selected_products"];
    $selectedProducts = json_decode($selectedProductsJSON, true);

    // Initialize a flag to track whether all updates were successful
    $allUpdatesSuccessful = true;

    foreach ($selectedProducts as $productName => $productData) {
        // Validate and sanitize the input (you should implement proper input validation)
        $productName = mysqli_real_escape_string($conn, $productName);
        $quantityToAdd = intval($productData['quantity']);
        $productID = intval($productData['product_id']);

        // Update the stock in the database
        $sql = "UPDATE product SET Product_Qty = Product_Qty + $quantityToAdd WHERE Product_ID = $productID";
        $result = mysqli_query($conn, $sql);

        // Check if the update was successful for each product
        if (!$result) {
            $allUpdatesSuccessful = false;
            break; // Exit the loop on the first failure
        }
    }

    if ($allUpdatesSuccessful) {
        // Insert data into 'history' table
        $date = date("Y-m-d H:i:s"); // Current date and time
        $actionType = 'เพิ่มสต๊อก'; // Example value, replace with your actual data

        $sqlHistory = "INSERT INTO history (Date, Action_Type) 
                        VALUES ('$date', '$actionType')";
        $queryHistory = mysqli_query($conn, $sqlHistory);

        if ($queryHistory) {
            // Insert data into 'history_product' table using the generated History_ID
            $historyID = mysqli_insert_id($conn);

            foreach ($selectedProducts as $productName => $productData) {
                $productName = mysqli_real_escape_string($conn, $productName);
                $quantityToAdd = intval($productData['quantity']);
                $productID = intval($productData['product_id']);

                $sqlHistoryProduct = "INSERT INTO history_product (History_ID, Pro_ID, Username, Product_Qty) 
                                        VALUES ('$historyID', '$productID', '$username', '$quantityToAdd')";
                $queryHistoryProduct = mysqli_query($conn, $sqlHistoryProduct);

                if (!$queryHistoryProduct) {
                    $allUpdatesSuccessful_SS = false;
                    break;
                }
                $allUpdatesSuccessful_SS = true;
            }

            if ($allUpdatesSuccessful_SS) {
?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'เพิ่มสต๊อกสำเร็จ!',
                        text: 'กรุณารอสักครู่....',
                        timer: 2000, // Display for 2 seconds
                        showConfirmButton: false
                    }).then(() => {
                        window.location.href = 'table_stock.php'; // Redirect to the stock table page
                    });
                </script>
            <?php
            } else {
            ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'ข้อผิดพลาด!',
                        text: 'เกิดข้อผิดพลาดในการเพิ่มสต็อกสินค้า!!',
                    });
                </script>
        <?php
            }
        } else {
            echo "Error inserting data into history table: " . mysqli_error($conn);
        }
    } else {
        ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'ข้อผิดพลาด!',
                text: 'เกิดข้อผิดพลาดในการเพิ่มสต็อกสินค้า!!',
            });
        </script>
<?php
    }
}
?>