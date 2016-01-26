<div class="different_filters_divbox">                                            
	<ul class="different_filters">
		<?php		
		$typearray = $db->getdistinctResults('flatdetails','Type');		
		foreach($typearray as $type) {
			$typee = $type['Type'];		
		?>		
		<li>
			<input type="checkbox" id="type-<?=strtolower($typee);?>" name="typecheck" class="typecheck" value="<?=$type['Type']?>"/>
			<label for="type-<?=strtolower($typee);?>"><?=$typee?></label>
		</li>
		
		<?php
		}
		?>
	</ul>
</div>