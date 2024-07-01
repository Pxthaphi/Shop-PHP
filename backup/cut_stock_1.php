<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        $menu = "cut_stock";
    ?>
    <title>Stock</title>
    <!-- MDB -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css"
        rel="stylesheet"
    />
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        rel="stylesheet"
    />
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

                                        while ($result = mysqli_fetch_array($query)) { ?>
                                            <div class="card mx-2 my-2 text-center" style="width: 200px;">
                                                <img class="card-img-top" src='assets/img/<?= $result["Product_Name"]; ?>.jpg' width="286" height="180"/>
                                                <div class="card-body">
                                                    <h5 class="card-title"><?= $result["Product_Name"]; ?></h5>
                                                    <p class="card-text" style="color:
                                                        <?php
                                                        if ($result["Product_Qty"] > 5) {
                                                            echo '#38E30A'; // สีเขียว
                                                        } elseif ($result["Product_Qty"] > 0) {
                                                            echo '#FFD500'; // สีเหลือง
                                                        } else {
                                                            echo '#EA0505'; // สีแดง
                                                        }
                                                        ?>
                                                    ;">
                                                        จำนวน <?= $result["Product_Qty"]; ?> ชิ้น
                                                    </p>

                                                    <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
                                                </div>
                                                <div class="card-footer">
                                                    <a href="#" class="btn btn-danger" onclick="addToStockCutBox('<?= $result["Product_Name"]; ?>', <?= $result["Product_Qty"]; ?>)">ตัดสต็อกสินค้า</a>
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
                                            <a class="page-link" href="cut_stock.php?page=<?php echo $page; ?>"><?php echo $page; ?></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </nav>
                            <!-- Pagination -->
                        </div>
                        <!-- cut stock box -->
                        <div class="col-lg-5 pt-5">
                            <div class="row gy-3 mb-4">
                                <form method="POST">
                                    <div id="stock-cut-box">
                                        <!-- Selected products for stock cutting will be displayed here -->
                                    </div>

                                    <button type="submit" class="btn btn-success w-100 shadow-0 mb-2" name="cut_stock">ตัดสต็อกสินค้า</button>
                                    <button class="btn btn-light w-100 border mt-2">ย้อนกลับ</button>
                                    <input type="hidden" id="selected_products" name="selected_products" value="" />
                                </form>
                            </div>
                        </div>
                        <!-- cut stock box -->


                        </div>
                        </div>            
                    </section>
                </div>
              </div>
          </div>
            <script>
                function addToStockCutBox(productName, currentQuantity) {
                const stockCutBox = document.getElementById("stock-cut-box");

                // Check if the product is already in the stock cut box
                const existingProduct = stockCutBox.querySelector(`[data-product="${productName}"]`);

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
                    productQuantityInput.max = currentQuantity; // Maximum quantity is the current available quantity
                    productQuantityInput.addEventListener("input", function () {
                        updateSelectedProductsInput(); // Update the hidden input field when the user changes the quantity
                    });

                    // Create a delete button for the product
                    const deleteButton = document.createElement("button");
                    deleteButton.textContent = "ลบ";
                    deleteButton.onclick = function () {
                        // Remove the selected product when the delete button is clicked
                        stockCutBox.removeChild(productContainer);
                    };

                    // Append all elements to the product container
                    productContainer.appendChild(productImage);
                    productContainer.appendChild(productNameSpan);
                    productContainer.appendChild(productQuantityInput);
                    productContainer.appendChild(deleteButton);

                    // Append the product container to the stock cut box
                    stockCutBox.appendChild(productContainer);
                }
                // After adding a product, update the hidden input field with selected products and quantities
                updateSelectedProductsInput();
            }


                function updateSelectedProductsInput() {
                    const stockCutBox = document.getElementById("stock-cut-box");
                    const selectedProducts = stockCutBox.querySelectorAll(".selected-product");

                    const selectedProductsData = {};
                    selectedProducts.forEach(productContainer => {
                        const productName = productContainer.getAttribute("data-product");
                        const productQuantityInput = productContainer.querySelector("input[type='number']").value;
                        selectedProductsData[productName] = productQuantityInput;
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
</body>
</html>

<?php
// Include the connection to your database
require_once 'connection.php';

if (isset($_POST["cut_stock"])) {
    // Retrieve the selected products for stock addition from the POST data
    $selectedProductsJSON = $_POST["selected_products"];
    $selectedProducts = json_decode($selectedProductsJSON, true);

    // Initialize a flag to track whether all updates were successful
    $allUpdatesSuccessful = true;

    // Check if there are selected products
    if (!empty($selectedProducts)) {
        // Display a confirmation dialog using SweetAlert
        ?>
        <script>
            Swal.fire({
                title: 'ยืนยันการตัดสต๊อก?',
                text: 'คุณต้องการที่จะตัดสต๊อกสินค้าที่เลือก?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'ใช่, ตัดสต๊อก',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    // User confirmed, proceed with stock cutting
                    cutStock();
                }
            });

            function cutStock() {
                // Iterate through selected products and update the database
                <?php
                foreach ($selectedProducts as $productName => $quantityToCut) {
                    // Validate and sanitize the input (you should implement proper input validation)
                    $productName = mysqli_real_escape_string($conn, $productName);
                    $quantityToCut = intval($quantityToCut);

                    // Update the stock in the database
                    $sql = "UPDATE product SET Product_Qty = Product_Qty - $quantityToCut WHERE Product_Name = '$productName'";
                    $result = mysqli_query($conn, $sql);

                    // Check if the update was successful for each product
                    if (!$result) {
                        $allUpdatesSuccessful = false;
                        break; // Exit the loop on the first failure
                    }
                }
                ?>

                // Display SweetAlert based on the success status
                <?php
                if ($allUpdatesSuccessful) {
                    ?>
                    Swal.fire({
                        icon: 'success',
                        title: 'ตัดสต๊อกสำเร็จ!',
                        text: 'กรุณารอสักครู่....',
                        timer: 2000, // Display for 2 seconds
                        showConfirmButton: false
                    }).then(() => {
                        window.location.href = 'table_stock.php'; // Redirect to the stock table page
                    });
                    <?php
                } else {
                    ?>
                    Swal.fire({
                        icon: 'error',
                        title: 'ข้อผิดพลาด!',
                        text: 'เกิดข้อผิดพลาดในการตัดสต็อกสินค้า!!',
                    });
                    <?php
                }
                ?>
            }
        </script>
        <?php
    } else {
        // No products were selected
        ?>
        <script>
            Swal.fire({
                icon: 'info',
                title: 'ไม่มีสินค้าที่เลือก',
                text: 'กรุณาเลือกสินค้าที่ต้องการตัดสต๊อกก่อน',
            });
        </script>
        <?php
    }
}
?>
