<?php
require('db.php');
include("auth.php");

$id = $_REQUEST['id'];
$query = "SELECT * FROM new_record WHERE id='$id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$status = "";

if (isset($_POST['new']) && $_POST['new'] == 1) {
    $trn_date = date("Y-m-d H:i:s");
    $name = $_REQUEST['name'];
    $age = $_REQUEST['age'];
    $submittedby = $_SESSION["username"];

    $update = "UPDATE new_record SET
                trn_date='$trn_date',
                name='$name',
                age='$age',
                submittedby='$submittedby'
                WHERE id='$id'";
    mysqli_query($con, $update) or die(mysqli_error($con));
    $status = "Record Updated Successfully.<br><a href='view.php'>View Updated Record</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Edit Record</title>
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
  <p><a href="dashboard.php">Dashboard</a> | <a href="view.php">View Records</a> | <a href="logout.php">Logout</a></p>
  <h1>Update Record</h1>
  <?php if ($status) {
    echo "<p style='color:#FF0000;'>$status</p>";
  } else { ?>
  <form method="post" action="">
    <input type="hidden" name="new" value="1" />
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
    <p><input type="text" name="name" value="<?php echo $row['name']; ?>" required /></p>
    <p><input type="text" name="age" value="<?php echo $row['age']; ?>" required /></p>
    <p><input type="submit" value="Update" /></p>
  </form>
  <?php } ?>
</div>
</body>
</html>
