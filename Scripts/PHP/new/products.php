<div id="loaderID" style="position:absolute; top:60%; left:53%; z-index:2; opacity:0"><img src="images/ajax-loader.gif" /></div>
<div id="productContainer">
<?php
$products = $db->topProducts();
if(count($products)>0) {
	foreach($products as $pro) {
		//$productPhoto = $db->getproductPhoto($pro['ID']);
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
}
?>
</div>