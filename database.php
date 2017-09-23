<?php
ob_start();
class database
{
	public $host   =DB_HOST;
	public $user   =DB_USER;
	public $pass   =DB_PASS;
	public $dbname =DB_NAME;
	public $error;
	public $link;
	public function __construct(){
		$this->connectdb();
	}
	public function connectdb()
	{

	$this->link=new mysqli($this->host,$this->user,$this->pass,$this->dbname);
	if (!$this->link) {
		$this->error="could not be connected".$this->link->connect_error;
		return false;
		
	}
}
/*select or read data*/ 
	public function select($query){
	$result=$this->link->query($query) or die($this->link->error.__LINE__);
	if ($result->num_rows >0) {
		return $result;
	}
	else{
		return false;
	}

	}
	/*Insert or read data*/ 
	public function insert($query){
		$insert_row=$this->link->query($query) or die($this->link->error.__LINE__);
		if ($insert_row) {
			header('Location: index.php?msg='.urlencode('Data inserted Succesfully'));
			exit;
		}
		else{
				die("Error:(".$this->link->errno.")".$this->link->error);
			}

	}
	/*Update data*/ 
	public function update($query){
		$update_row=$this->link->query($query) or die($this->link->error.__LINE__);
		if ($update_row) {
			header("Location: index.php?msg=".urlencode('Data Updated Succesfully'));
			exit;
		}
		else{
				die("Error:(".$this->link->errno.")".$this->link->error);
			}

	}
	/*Delete data*/ 
	public function delete($query){
		$delete_row=$this->link->query($query) or die($this->link->error.__LINE__);
		if ($delete_row) {
			header('Location: index.php?msg='.urlencode('Data Deleted Succesfully'));
			exit;
			
		}
		else{
				die("Error:(".$this->link->errno.")".$this->link->error);
			}

	}



	
}
/*end class*/ 
?>