<?php

define("DBHOST","localhost");
define("DBUSER","root");
define("DBPWD","");
define("DB","flat_finder");

class DB_FUNCTIONS {
  	
	public function __construct() {
		$conn = mysql_connect(DBHOST,DBUSER,DBPWD);
		$db_select = mysql_select_db(DB,$conn);		
	}
	
	public function getResults($table) 
	{
	    $data = array();
		$query = mysql_query("SELECT * FROM $table") or die(mysql_error());
		$num_rows = mysql_num_rows($query);
		if($num_rows>0) {
        	while($row=mysql_fetch_assoc($query))
				$data[]=$row;
		}
	    return $data;		
    }
	public function getdistinctResults($table,$var) 
	{
	    $data = array();
		$query = mysql_query("SELECT DISTINCT $var FROM $table") or die(mysql_error());
		$num_rows = mysql_num_rows($query);
		if($num_rows>0) {
        	while($row=mysql_fetch_assoc($query))
				$data[]=$row;
		}
	    return $data;		
    }
	public function allProducts()
	{
		$query = mysql_query("SELECT * FROM flat_finder.flatdetails");	
		while($row=mysql_fetch_assoc($query))
		$data[]=$row;
		
		return $data;
	}
	public function myProducts($name)
	{
		$query = mysql_query("SELECT flatdetails.ID,flatdetails.Area,flatdetails.Landmark,flatdetails.FlatTitle,flatdetails.PayMethod,flatdetails.PayTerm,flatdetails.Price,flatdetails.State,flatdetails.Time,flatdetails.Price,flatdetails.State,flatdetails.Time,flatdetails.Type,flatdetails.Username,flatdetails.Views from flatdetails,machinelearningkindaa WHERE flatdetails.ID=machinelearningkindaa.SearchID AND machinelearningkindaa.Buyername='$name'");	
		$n=0;
		while($n!=11)
		{	$row=mysql_fetch_assoc($query);
			$data[]=$row;
			$n=$n+1;
		}
		
		return $data;
	}
	/*public function getproductPhoto($id)
	{
		$photo = mysql_result(mysql_query("SELECT photo FROM tbl_productphotos where ProductID = $id limit 0,1"),0);	
				
		return $photo;
	}
	
	public function _getAllProductPhotos($id)
	{
		$photo = mysql_query("SELECT photo FROM tbl_productphotos where ProductID = $id limit 0,5");	
		while($row=mysql_fetch_assoc($photo))
		$data[]=$row;	
		
		return $data;
	}
	*/
	public function getProductDetails($id)
	{
		$query = mysql_query("SELECT * FROM flatdetails where ID = $id");	
		while($row=mysql_fetch_assoc($query))
		$data=$row;
		
		return $data;
	
	}
	public function getProductmap($id)
	{
		$query = mysql_query("SELECT * FROM mapin where FlatCode = $id");	
		while($row=mysql_fetch_assoc($query))
		$data=$row;
		
		return $data;
	
	}
	
	public function getAvailableSize($id)
	{
		$query = mysql_query("SELECT * from flatdetails where FlatCode = $id");
		while($row=mysql_fetch_assoc($query))
		$data[]=$row;
		return $data;
	}
	
}
?>
