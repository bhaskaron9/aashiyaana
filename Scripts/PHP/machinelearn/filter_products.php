<?php
include('includes/dbfunctions.php');
$db = new DB_FUNCTIONS();

$areacheck = $_REQUEST['areacheck'];
$landmarkcheck = $_REQUEST['landmarkcheck'];
$typecheck = $_REQUEST['typecheck'];
$price_range = $_REQUEST['price_range'];

$WHERE = array(); $inner = $w = '';

if(!empty($price_range)) {
	$data3 = explode('-',$price_range);
	$WHERE[] = "(t1.Price between $data3[0] and $data3[1])";
}

if(!empty($areacheck)) {		
	if(strstr($areacheck,',')) {
		$data1 = explode(',',$areacheck);
		$barray = array();
		foreach($data1 as $c) {
			$barray[] = "t1.Area = $c";
		}
		$WHERE[] = '('.implode(' OR ',$barray).')';
	} else {
		$WHERE[] = '(t1.Area = '.$areacheck.')';
	}
}

if(!empty($typecheck)) {
	if(strstr($typecheck,',')) {
		$data2 = explode(',',$typecheck);
		$carray = array();
		foreach($data2 as $c) {
			$carray[] = "t1.Type = '$c'";
		}
		$WHERE[] = '('.implode(' OR ',$carray).')';
	} else {
		$WHERE[] = '(t1.Type = '.'"'.$typecheck.'"'.')';
	}
}

if(!empty($landmarkcheck)) {
	if(strstr($landmarkcheck,',')) {
		$data5 = explode(',',$landmarkcheck);
		$sarray = array();
		foreach($data5 as $c) {
			$sarray[] = "t1.Landmark = '$c'";
		}
		$WHERE[] = '('.implode(' OR ',$sarray).')';
	} else {
		$WHERE[] = '(t1.Landmark = '.'"'.$landmarkcheck.'"'.')';
	}
	
	//$inner = 'INNER JOIN tbl_productsizes AS t2 ON t1.ProductID = t2.ProductID';
}
	$w = implode(' AND ',$WHERE);
	if(!empty($w)) $w = 'WHERE '.$w;
	
	
	
	//echo "SELECT DISTINCT  t1 . * FROM  `tbl_products` AS t1 $inner $w";
	$query = mysql_query("SELECT  t1 . * FROM  `flatdetails` AS t1 $w ");//group by views

	if(mysql_num_rows($query)>0) {
		while($pro = mysql_fetch_assoc($query)) {
			//$productPhoto = $db->getproductPhoto($pro['ProductID']);
		?>
		
		<!------------------------------------------------------------------------------------------------------------------------------------------------->	
			<div class="divbox" onclick="tb_show('<?=$pro['FlatTitle']?>','product-details.php?id=<?=$pro['ID']?>&keepThis=true&TB_iframe=true&height=500&width=900','thickbox');">
			
				<div style="width: 202px;height: 186px;background:url(../uploads/<?php echo $pro['ID'].'.jpg';?>);background-size: 202px 186px; no-repeat;" alt="<?=$pro['FlatTitle']?>">
					<div class="image-hover"></div>
				</div>
	
				
				<div class="product_name" align="center">
					<a href="#"><span class="productname"><?=$pro['FlatTitle']?></span></a>
					<div class="price">
						<span class="product_price"><a href="#">Rs. <?=$pro['Price']?></a></span>                            
					</div>
					
				</div>
			</div>
		
		<!------------------------------------------------------------------------------------------------------------------------------------------------->
		
			
		<?php
		}
	} else {
		?>
        <div align="center"><h2 style="font-family:'Arial Black', Gadget, sans-serif;font-size:30px;color:#0099FF;">No Results with this filter</h2></div>
        <?php	
	}
?>