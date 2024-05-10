<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
}
$uri = "mysql://avnadmin:AVNS_xbVrhrJSx5H_CJBHpNR@mysql-331c3b88-laitienduc37-403a.f.aivencloud.com:11046/defaultdb?ssl-mode=REQUIRED";

$fields = parse_url($uri);

// build the DSN including SSL settings
$conn = "mysql:";
$conn .= "host=" . $fields["host"];
$conn .= ";port=" . $fields["port"];;
$conn .= ";dbname=QuanLySach";
$conn .= ";sslmode=verify-ca;sslrootcert='pri/ca.pem'";

try {
    $db = new PDO($conn, $fields["user"], $fields["pass"]);
        $sql = "SELECT * FROM Sach LIMIT 5";
        $stmt = $db->query($sql);
        $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
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
            foreach ($books as $book){
                echo "<tr>";
                echo "<td>" . $book['MaSach'] . "</td>";
                echo "<td>" . $book['TenSach'] . "</td>";
                echo "<td>" . $book['SoLuong'] . "</td>";
                echo "</tr>";
            }
        ?>
    </table>
    <br>
    <a href="../Controller/logout.php">Đăng xuất</a>
</body>
</html>