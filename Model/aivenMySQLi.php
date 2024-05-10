<?php
echo "hello";
phpinfo();

$host="mysql-331c3b88-laitienduc37-403a.f.aivencloud.com";

$user="avnadmin";
$port="11046";
$password="AVNS_xbVrhrJSx5H_CJBHpNR";

$con=mysqli_connect($host,$user,$password);

mysqli_select_db($con,"defaultdb"); 
//To select the database

session_start(); //To start the session

$query=mysqli_query($con,"select * from sach"); 

//$row = mysqli_fetch_array($query);

$rowcount=mysqli_num_rows($query);
//made query after establishing connection with database.

//echo "my result <a href='data/" . htmlentities($row['classtype'], ENT_QUOTES, 'UTF-8') . ".php'>sinh vien</a>";

printf($rowcount);
?>