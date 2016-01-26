<?php
include('includes/dbfunctions.php');
include("includes/resize-class.php");
$db = new DB_FUNCTIONS();


if(isset($_POST['submit'])) {
	
	$Title = $_POST['name'];
	$Description = $_POST['Description'];
	$Brand = $_POST['brand'];
	
	$Color = $_POST['color'];
	$Price = $_POST['price'];
	
	$sql = "INSERT INTO tbl_products SET Title = '".$Title."',Description = '".$Description."',Brand = '".$Brand."',Color = '".$Color."',Price = '".$Price."'";
	$result3=mysql_query($sql);
	$last_ID = mysql_insert_id();
	
	
	for($i=0;$i<count($_POST['sizes']);$i++) {
		mysql_query("INSERT INTO tbl_productsizes SET ProductID = '".$last_ID."' , sizeID = '".$_POST['sizes'][$i]."'");
	}
	
	
	
	for($i=1;$i<=count($_FILES['photos']['name']);$i++) {
		$sepext = explode('.', $_FILES['photos']['name'][$i-1]);
		$type = end($sepext);
		//$uniqueID = md5(uniqid());
		$newFileName = $sepext[0].'.'.$type;
		$RnewFileName = $sepext[0].'_R.'.$type;
		if(move_uploaded_file($_FILES['photos']['tmp_name'][$i-1],"images/products/big/".$newFileName)) {
		
			$resizeObj = new resize("images/products/big/".$newFileName);	
			$resizeObj -> resizeImage(66, 91, 'crop');	
			$resizeObj -> saveImage("images/products/thumbs/".$RnewFileName, 100);		
			
			$resizeObj -> resizeImage(202, 186, 'crop');	
			$resizeObj -> saveImage("images/products/medium/".$newFileName, 100);		
			
			mysql_query("INSERT INTO tbl_productphotos SET ProductID = '".$last_ID."' , photo = '".$RnewFileName."'");
			
		}
	}
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form name="frm" method="post" enctype="multipart/form-data">
<table width="500" border="0">
  <tr>
    <td>Name</td>
    <td><input type="text" name="name"  /></td>
  </tr>
  <tr>
    <td>Description</td>
    <td><textarea name="Description" rows="5" cols="30"></textarea></td>
  </tr>
  <tr>
    <td>Brand</td>
    <td>
    <select name="brand">
    <?php		
		$brandarray = $db->getResults('tbl_brands');		
		foreach($brandarray as $brand) {
			$brandname = $brand['brand'];		
		?>	
        <option value="<?=$brand['id']?>"><?=$brandname?></option>	
				
		<?php
		}
		?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Size</td>
    <td>
    <?php		
		$sizearray = $db->getResults('tbl_sizes');		
		foreach($sizearray as $size) {
			$psize = $size['size'];		
		?>		
		
			<input type="checkbox" id="size-<?=strtolower($psize);?>" name="sizes[]" value="<?=$size['id']?>"/>
			<label for="size-<?=strtolower($psize);?>"><?=$psize?></label>
		
		
		<?php
		}
		?>
    
    </td>
  </tr>
  <tr>
    <td>Color</td>
    <td>
    <select name="color">
    <?php		
		$colorarray = $db->getResults('tbl_colors');		
		foreach($colorarray as $color) {
			$pcolor = $color['color'];		
		?>		
		<option value="<?=$color['id']?>"><?=$pcolor?></option>	
		
		<?php
		}
		?>
    </td>
  </tr>
  <tr>
    <td>Price</td>
    <td><input type="text" name="price"  /></td>
  </tr>
  <tr>
    <td>Photos</td>
    <td>
    <input type="file" name="photos[]" multiple="multiple"  />
    </td>
  </tr>
  <tr>
    <td></td>
    <td>
    <input type="submit" name="submit" value="submit" />
    </td>
  </tr>
</table>


</form>
</body>
</html>