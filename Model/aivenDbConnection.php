<?php

$uri = "mysql://avnadmin:AVNS_xbVrhrJSx5H_CJBHpNR@mysql-331c3b88-laitienduc37-403a.f.aivencloud.com:11046/defaultdb?ssl-mode=REQUIRED";

$fields = parse_url($uri);

// build the DSN including SSL settings
$conn = "mysql:";
$conn .= "host=" . $fields["host"];
$conn .= ";port=" . $fields["port"];;
$conn .= ";dbname=defaultdb";
$conn .= ";sslmode=verify-ca;sslrootcert='pri/ca.pem'";

try {
    $db = new PDO($conn, $fields["user"], $fields["pass"]);

    $stmt = $db->query("SELECT version()");

    print($stmt->fetch()[0]);
    $row = $db->query("select * from todos");

    /*printf($row->rowCount());
    if($row->rowCount()>0){
        while ($r = $row->fetch()[2]){
            echo $r;

        }
    }*/
    if($row->rowCount()>0){
        while ($r = $row->fetchObject()){
            echo $r->date;
            echo $r->description;

        }
    }
   
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>