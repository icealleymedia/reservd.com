<?php
$DB_driver = "mysql";
$DB_host = "localhost";
$DB_user = "icalley_reservd";
$DB_pass = "Nattie92";
$DB_name = "icealley_cdn";

try
{
     $DB_conn = new PDO("{$DB_driver}:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
     $DB_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
     echo $e->getMessage();
}

?>