<?php 
ob_start();
include 'inc/header.php';
include 'database.php';
include 'config.php';
 ?>
<?php 
$db=new database();
if (isset($_POST['submit'])) {
	$name=mysqli_real_escape_string($db->link,$_POST['name']);
	$email=mysqli_real_escape_string($db->link,$_POST['email']);
$skill=mysqli_real_escape_string($db->link,$_POST['skill']);
if ($name ==''|| $email =='' || $skill =='') {
	$error="Field not be empty";
	}
	else{
		$query="INSERT INTO tbl_user(name,email,skill)values('$name','$email','$skill')";
		$create=$db->insert($query);
	}
}
 ?>
 <?php 
if (isset($error)) {
	echo "<span style='color:red'>".$error."</span>";
}
  ?>
 <form action="create.php" method="post">
<table class="tblone">
 	<tr>
		<td>Name</td>
		<td><input type="text" name="name"></td>
 	</tr>
 	<tr>
		<td>Email</td>
		<td><input type="text" name="email"></td>
 	</tr>
 	<tr>
		<td>Skill</td>
		<td><input type="text" name="skill"></td>
 	</tr>
 	<tr>
		<td></td>
		<td>
		<input type="submit" name="submit" value="submit">
		<input type="reset" value="Cancel">
		<td>
 	</tr>

 </table>
 </form>
 <a href="index.php">Back to Home</a>
<?php include 'inc/footer.php'; ?>