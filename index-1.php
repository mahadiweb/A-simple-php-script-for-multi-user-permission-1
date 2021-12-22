<?php
$conn = mysqli_connect("localhost","root","","");
//create a database and upload user.sql file


if (isset($_POST['setpermission'])) {
	//print_r($_POST);
	$setpermission = serialize($_POST['setpermission']);

	//$query = mysqli_query($conn, "INSERT INTO post(name,pass,status) VALUES('test','0','1')");
	$query = mysqli_query($conn, "UPDATE user SET permission='$setpermission' WHERE id=2");
}
	$query = mysqli_query($conn, "SELECT * FROM user WHERE id=2");
	$res = mysqli_fetch_assoc($query);
	$permission = $res['permission'];
	$per = unserialize($permission);
	//print_r($per);
?>


<!DOCTYPE html>
<html>
<head>
	<title>Permission</title>
</head>
<body>
	<form action="" method="post">
		<input type="checkbox" name="setpermission[]" <?php if (in_array("post", $per)){echo "checked";} ?> value="post">Post
		<input type="checkbox" name="setpermission[]" value="edit" <?php if (in_array("edit", $per)){echo "checked";} ?>>Edit
		<input type="checkbox" name="setpermission[]" value="delete" <?php if (in_array("delete", $per)){echo "checked";} ?>>Delete
		<input type="checkbox" name="setpermission[]" value="email" <?php if (in_array("email", $per)){echo "checked";} ?>>Email
		<input type="checkbox" name="setpermission[]" value="settings" <?php if (in_array("settings", $per)){echo "checked";} ?>>Settings
		<input type="submit">
	</form>

<?php
if (in_array("post", $per)) {
	echo '<a href="#">post</a><br>';
}
if (in_array("edit", $per)) {
	echo '<a href="#">edit</a><br>';
}
if (in_array("delete", $per)) {
	echo '<a href="#">delete</a><br>';
}
if (in_array("email", $per)) {
	echo '<a href="#">email</a><br>';
}
if (in_array("settings", $per)) {
	echo '<a href="#">settings</a>';
}
?>
</body>
</html>
