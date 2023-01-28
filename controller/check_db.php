<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "restome_db";

$koneksi = mysqli_connect($db_host, $db_user, $db_password);

try {
    $q = mysqli_query($koneksi, "USE restome_db");
} catch (\Throwable $th) {

    $conn1 = new mysqli('localhost', 'root', '');
    try {
        mysqli_query($conn1, "CREATE DATABASE $db_name");
    } catch (\Throwable $th) {
        //throw $th;
    }
    $conn = new mysqli("localhost", "root", "", $db_name);

    $query = '';
    $sqlScript = file('controller/db.sql');
    foreach ($sqlScript as $line) {

        $startWith = substr(trim($line), 0, 2);
        $endWith = substr(trim($line), -1, 1);

        if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') {
            continue;
        }

        $query = $query . $line;
        if ($endWith == ';') {
            mysqli_query($conn, $query) or die('<div class="error-response sql-import-response">Problem in executing the SQL query <b>' . $query . '</b></div>');
            $query = '';
        }
    }
    echo '<div class="success-response sql-import-response">Database imported successfully</div>';
}
