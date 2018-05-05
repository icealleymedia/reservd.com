<?php
$DB_driver = "mysql";
$DB_host = "localhost";
$DB_user = "icealley_reservd";
$DB_pass = "Nattie92$";
$DB_name = "icealley_cdn";

try
{
     $DB_con = new PDO("{$DB_driver}:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
     $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
     echo $e->getMessage();
}

?>
