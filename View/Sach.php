<?php
session_start();
require_once '/workspaces/thi-gk-web/Controller/checkLogin.php';

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

// Lấy dữ liệu sách từ cơ sở dữ liệu
$sql = "SELECT * FROM sach LIMIT 5";
$result = $db->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Danh sách Sách</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Danh sách Sách</h2>
    <table>
        <tr>
            <th>Mã Sách</th>
            <th>Tên Sách</th>
            <th>Số Lượng</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["masach"] . "</td>";
                echo "<td>" . $row["ten_sach"] . "</td>";
                echo "<td>" . $row["so_luong"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Không có dữ liệu</td></tr>";
        }
        ?>
    </table>
    <br>
    <a href="Logout.php">Đăng xuất</a>
</body>
</html>