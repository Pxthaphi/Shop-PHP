<?php
// เรียกไฟล์เชื่อมต่อฐานข้อมูล
require_once 'connection.php';

$sql = "SELECT hr.History_ID, h.Action_Type, p.Product_Name
        FROM history_product_relation hr
        JOIN history h ON hr.History_ID = h.History_ID
        JOIN product p ON hr.Pro_ID = p.Product_ID";

$query = mysqli_query($conn, $sql);

if (!$query) {
    // หากคิวรีมีข้อผิดพลาด
    echo "ข้อผิดพลาดในการคิวรี: " . mysqli_error($conn);
} else {
    // สร้างตาราง HTML เพื่อแสดงผล
    echo "<table border='1'>
            <tr>
                <th>History ID</th>
                <th>Action Type</th>
                <th>Product Name</th>
            </tr>";
    
    while ($result = mysqli_fetch_assoc($query)) {
        echo "<tr>";
        echo "<td>" . $result["History_ID"] . "</td>";
        echo "<td>" . $result["Action_Type"] . "</td>";
        echo "<td>" . $result["Product_Name"] . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
}

// ปิดการเชื่อมต่อฐานข้อมูล
mysqli_close($conn);
?>
