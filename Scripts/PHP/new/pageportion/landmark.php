<div class="different_filters_divbox">                                            
	<ul class="different_filters color-filter">
		<?php		
		$landmarkarray = $db->getdistinctResults('flatdetails','Landmark');		
		foreach($landmarkarray as $landmark) {
			$landmarkk = $landmark['Landmark'];		
		?>		
		<li>
			<input type="checkbox" id="landmark-<?=strtolower($landmarkk);?>" name="landmarkcheck" class="landmarkcheck" value="<?=$landmark['Landmark']?>"/>
			<label for="landmark-<?=strtolower($landmarkk);?>"><?=$landmarkk?></label>
		</li>
		
		<?php
		}
		?>
	</ul>
</div>