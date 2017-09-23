<?php 
ob_start();
include 'inc/header.php';
include 'database.php';
include 'config.php';
?>
<?php 
$db=new database();
$query="select * from tbl_user";
$read=$db->select($query);
 ?>
 <?php 
if (isset($_GET['msg'])) {
	echo "<span style='color:green'>".$_GET['msg']."</span>";
}
?>
<table class="tblone">
 	<tr>
 		<th width="10%">Serial.</th>
 		<th width="15%">Name</th>
 		<th width="25%">Email</th>
 		<th width="25%">Skill</th>
 		<th width="15%">Action</th>
 	</tr>
<?php if($read){?>
<?php 
$i=1;
while ($row=$read->fetch_assoc()){?>
<tr>
<td><?php echo $i++; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['skill']; ?></td>
<td>
<a href="update.php?id=<?php echo urlencode($row['id']);?>">
Update
</a>
</td>
 </tr>
 <?php } ?>
 <?php } else{ ?>
<p>Data is Not Available</p>
 	<?php } ?>
 </table>
 <a href="create.php">Insert Date</a>
<?php include 'inc/footer.php'; ?>