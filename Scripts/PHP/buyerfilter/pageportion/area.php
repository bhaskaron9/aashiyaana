<div class="different_filters_divbox">                                           
	<ul class="different_filters">
		<?php		
		$areaarray = $db->getdistinctResults('flatdetails','Area');		
		foreach($areaarray as $area) {
			$areaname = $area['Area'];		
		?>		
		<li>
			<input type="checkbox" id="area-<?=strtolower($areaname);?>" name="areacheck" class="areacheck" value="<?=$area['Area']?>" checkboxname="<?=$areaname?>" />
			<label for="brand-<?=strtolower($areaname);?>"><?=$areaname?></label> &nbsp; sq. fts
		</li>
		
		<?php
		}
		?>
		
	</ul>
</div>