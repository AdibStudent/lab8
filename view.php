<?php
require('db.php');
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>View Records</title>
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
  <p><a href="index.php">Home</a> | <a href="insert.php">Insert New Record</a> | <a href="logout.php">Logout</a></p>
  <h2>View Records</h2>
  <table width="100%" border="1" style="border-collapse:collapse;">
    <thead>
      <tr>
        <th>S.No</th>
        <th>Name</th>
        <th>Age</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $count = 1;
      $sel_query = "SELECT * FROM new_record ORDER BY id DESC;";
      $result = mysqli_query($con, $sel_query);
      while ($row = mysqli_fetch_assoc($result)) {
      ?>
      <tr>
        <td><?php echo $count++; ?></td>
        <td><?php echo $row["name"]; ?></td>
        <td><?php echo $row["age"]; ?></td>
        <td><a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a></td>
        <td><a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
</body>
</html>
