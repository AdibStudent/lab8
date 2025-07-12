<?php
require('db.php');
include("auth.php");

$id = $_REQUEST['id'];
$query = "DELETE FROM new_record WHERE id=$id";
mysqli_query($con, $query) or die(mysqli_error($con));
header("Location: view.php");
?>
