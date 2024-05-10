<?php
session_start();

require_once '/workspaces/thi-gk-web/Controller/checkLogin.php';

if (isset($_POST['submit'])) {
    $username = $_POST['userName'];
    $password = $_POST['passWord'];

    $sql = "SELECT * FROM User WHERE TenUser = $username AND MatKhau = $password";
    $stmt = $db->prepare($sql);
    $stmt->execute(['username' => $username, 'password' => $password]);
    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['loggedin'] = true;
        echo "Đăng nhập thành công!";
        exit;
    } else {
        echo "Đăng nhập thất bại!";
        exit;
    }
} else {
    header('Location: index.php');
    exit;
}
?>
