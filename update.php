<?php 
ob_start();
include 'inc/header.php';
include 'database.php';
include 'config.php';
?>
<?php 
$db=new database();
$id= $_GET['id'];

$query="select * from tbl_user WHERE id=$id";
$getdata=$db->select($query)->fetch_assoc();

if (isset($_POST['submit'])) {
	$name=mysqli_real_escape_string($db->link,$_POST['name']);
	$email=mysqli_real_escape_string($db->link,$_POST['email']);
$skill=mysqli_real_escape_string($db->link,$_POST['skill']);
if ($name ==''|| $email =='' || $skill =='') {
	$error="Field not be empty";
	}
	else{
		$query="UPDATE tbl_user 
		SET 
		name='$name',
		email='$email',
		skill='$skill'
		WHERE id='$id'";
		$update=$db->update($query);
	}
}
?>
<?php 
if(isset($_POST['delete'])) {
	$query="DELETE FROM tbl_user WHERE id=$id";
	$deletedata=$db->delete($query);
}
?>
<?php 
if (isset($error)) {
	echo "<span style='color:red'>".$error."</span>";
}
  ?>
<form action="update.php?id=<?php echo $id ?>" method="post">
<table class="tblone">
 	<tr>
		<td>Name</td>
		<td>
		<input type="text" name="name"
		 value="<?php echo $getdata['name'] ?>"/>
		</td>
 	</tr>
 	<tr>
		<td>Email</td>
		<td>
		<input type="text" name="email" value="<?php echo $getdata['email']?>" />
		</td>
 	</tr>
 	<tr>
		<td>Skill</td>
		<td><input type="text" name="skill"
		value="<?php echo $getdata['skill'] ?>"/>
		</td>
 	</tr>
 	<tr>
		<td></td>
		<td>
		<input type="submit" name="submit" value="SAVE">
		<input type="submit" name="delete" value="DELETE">
		<td>
 	</tr>

 </table>
 </form>
 <a href="index.php">Back to Home</a>
<?php include 'inc/footer.php'; ?>