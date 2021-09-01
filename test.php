<?php
error_reporting(E_ALL);

// DB Details
$dbhost = '<DB_HOST>';
$dbuser = 'root';
$dbpass = 'dbrootpass';
$dbname = 'AjaxSamples';
$dbtable = "customers";

$con = mysqli_connect($dbhost, $dbuser, $dbpass);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS " . $dbname;
if ($con->query($sql) === TRUE) {
    echo "Database created successfully" . "<br />\n";
    mysqli_select_db($con, $dbname);

    // Create table
    $sql = "CREATE TABLE IF NOT EXISTS " . $dbtable . " (id int AUTO_INCREMENT PRIMARY KEY, data varchar(255))";
    if ($con->query($sql) === TRUE) {
      echo "DB Table OK" . "<br />\n";

      // Insert record
      $sql = 'INSERT INTO counter SET data = "dummy"';
      if ($con->query($sql) === TRUE) {
        echo "Record inserted successfully: " . $con->insert_id . "<br />\n";

      } else {
        echo "Error inserting record: " . $con->error . "<br />\n";

      }

    } else {
      echo "Error creating table: " . $con->error . "<br />\n";

    }

} else {
    echo "Error creating database: " . $con->error . "<br />\n";

}
mysqli_close($con);


