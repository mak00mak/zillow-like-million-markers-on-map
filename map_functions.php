<?php
class database
{
	var $Hostname="localhost";
	var $dbusername='root';//"evltd_property";
	var $dbpassword='';//"y8kfRu*zpOS[vCv3m3";
	var $dbname="evltd_property";
	var $con = null;
	function connection()
	{
		$this->con = new mysqli($this->Hostname,$this->dbusername,$this->dbpassword, $this->dbname);
		if ($this->con->connect_error) {
		    die("Connection failed: " . $this->con->connect_error);
		}
		return true;
	}
	function execute($query)
	{
		if ($this->con->query($query) === TRUE) {
		    return true;
		} else {
		    echo "Error: " . $query . "<br>" . $this->con->error;
		}

		$this->con->close();
	}
	function FetchRecord($query)
	{
		$result = $this->con->query($query);
		$data = array();
		if ($result->num_rows > 0) {
		    $data = $result->fetch_assoc();
		}
		$conn->close();
		return $data;
	}
} // closed class	
$db = new database();
$db->connection();

//Function for pageing...... Do not edit below two function only pass your argument in main files**************
//Only for fetching query in perticular way
function SetPager($QRY, $LIm)
{

	global $COUNT;
	global $LIM;
	$LIM=$LIm;
	$start=$_GET['start'];
		if(strlen($start) > 0 and !is_numeric($start)){
		echo "Data Error";
		exit;}
		$FSTRT = ($start - 0); 
	 
	 $result = $this->con->query($QRY);
	$COUNT = $result->num_rows;
	if($COUNT<$LIm)
	{
	$turn=$QRY;
	}
	else
	{
	$turn=$QRY." LIMIT ".$FSTRT." , ".$LIm;
	//echo "I am running please do not disturp";
	}
	return $turn;
}

function ViewPageing()
{       

		global $COUNT;
		global $LIM;
		$page_name=$_SERVER['PHP_SELF'];
		$List="";
		$start=$_GET['start'];
		if(strlen($start) > 0 and !is_numeric($start)){
		echo "Data Error";
		exit;}
	$FSTRT = ($start - 0);
	$this1 = $FSTRT + $LIM; 
	$back = $FSTRT - $LIM; 
	$next = $FSTRT + $LIM;	
			if($COUNT > $LIM ){
			$List="<ul class='pagination'>";
			if($back >=0) { 
			$List.="<li class='disabled'><a href='$page_name?start=$back'><span class='fa fa-angle-left'></span></a></li>"; 
			} 
			$i=0;
			$l=1;
			for($i=0;$i < $COUNT;$i=$i+$LIM){
			if($i <> $FSTRT){
			$List.="<li><a href='$_SERVER[REQUEST_URI]?&start=$i'>$l</a></li>";
			}
			else { $List.="<font face='Verdana' size='4' color=red style='margin:2px;padding: 2px 5px 2px 5px;border: 1px solid #999;font-weight: bold;background-color: #999;
		color: #FFF;'>$l</font>";}        /// Current page is not displayed as link and given font color red
			$l=$l+1;
			}
			if($this1 < $COUNT) { 
			$List.="<li><a href='$page_name?start=$next'><span class='fa fa-angle-right'></span></a></li>";} 
			$List.="</ul>";
		}
			//echo $List;
 return $List;
}
//End Pageing Function

?>