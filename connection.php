<?php
$connection = mysqli_connect('localhost', 'root', '', 'canteendb');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
echo "";
?>