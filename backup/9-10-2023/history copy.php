<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $menu = "history";
    ?>
    <title>Stock</title>
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
                            <h3>รายการตัดสต๊อกและเพิ่มสต๊อกสินค้า</h3>
                            <p class="text-subtitle text-muted">เช็ครายการตัดและเพิ่มสต๊อกของสินค้า</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">หน้าหลัก</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">รายการตัดสต๊อกและเพิ่มสต๊อกสินค้า</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>รหัสรายการสินค้า</th>
                                        <th>รหัสสินค้า</th>
                                        <th>รูปสินค้า</th>
                                        <th>ชื่อสินค้า</th>
                                        <th>จำนวนสินค้าที่ขายได้</th>
                                        <th>วันที่ทำรายการ</th>
                                        <th>ทำรายการโดย</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Previous History_ID variable to track changes
                                    $previousHistoryID = null;

                                    //เรียกไฟล์เชื่อมต่อฐานข้อมูล
                                    require_once 'connection.php';

                                    //คิวรี่ข้อมูลมาแสดงในตาราง
                                    $sql = "SELECT history_product.History_ID, history.Action_Type, product.Product_Name, history.Product_Qty 
                                            FROM history_product JOIN history ON history_product.History_ID = history.History_ID 
                                            JOIN product ON history_product.Pro_ID = product.Product_ID 
                                            ORDER BY history_product.History_ID;";

                                    $query = mysqli_query($conn, $sql);
                                    while ($result = mysqli_fetch_array($query)) {
                                    ?>
                                        <tr>
                                            <td align="center"><?= $result["History_ID"]; ?></td>
                                            <td align="left"><?= $result["Product_ID"]; ?></td>
                                            <td align="center"><img src='assets/img/<?= $result["Product_Name"]; ?>.jpg' width="80" height="auto"></td>
                                            <td align="left"><?= $result["Product_Name"]; ?></td>
                                            <td align="center"><?= $result["Product_Qty"]; ?></td>
                                            <td align="center"><?= date("Y-m-d H:i:s", strtotime($result["Date"])); ?></td>
                                            <td align="center"><?= $result["Username"]; ?></td>
                                            <td align="center">
                                                <?php
                                                if ($result['Action_Type'] == "เพิ่มสต๊อก") {
                                                    $status = "เพิ่มสต๊อก";
                                                    $statusClass = "badge bg-success";
                                                } else if ($result['Action_Type'] == "ตัดสต๊อก") {
                                                    $status = "ตัดสต๊อก";
                                                    $statusClass = "badge bg-danger";
                                                } else {
                                                    $status = "ผิดพลาด";
                                                    $statusClass = "badge bg-warning";
                                                }
                                                ?>
                                                <span class="<?= $statusClass; ?>"><?= $status; ?></span>
                                            </td>
                                        </tr>
                                    <?php
                                        // Check if History_ID has changed, if so, close the previous row
                                        if ($result["History_ID"] !== $previousHistoryID) {
                                            $previousHistoryID = $result["History_ID"];
                                        } else {
                                            echo '</tr>'; // Close the previous row
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
            <!-- footer -->
            <?php include("footer.php"); ?>

        </div>
    </div>

    <!-- script -->
    <?php include("script.php"); ?>

    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
</body>

</html>