<html>
<head><title>ShoutBox</title></head>
<body>
<form action="send.php" method="post">
Message: <textarea name="shout" maxlength="300"></textarea>
<input type="submit" value="Shout!">
</form>

<?php
require_once("connection.php");
$result = mysqli_query($link,"SELECT * FROM shouts ORDER BY shout_date DESC") or die(mysqli_error($link));
while ($data = mysqli_fetch_assoc($result)){
    print $data['shout_text'] . "<br>";
}
?>
</body>
</html>
