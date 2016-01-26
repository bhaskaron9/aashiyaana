$(document).ready(function() {
    function showValues() {
		$("#productContainer").css("opacity",0.5);
		$("#loaderID").css("opacity",1);
		
		//e.css('visibility','visible');
		
				
		var mainarray = new Array();
		
		var areaarray = new Array();		
		$('input[name="areacheck"]:checked').each(function(){			
			areaarray.push($(this).val());		
			$('.spanbrandcls').css('visibility','visible');			
			//alert($(this).attr("checkboxname"));	
		});
		if(areaarray=='') $('.spanbrandcls').css('visibility','hidden');
		var brand_checklist = "&areacheck="+areaarray;
				
		var typearray = new Array();		
		$('input[name="typecheck"]:checked').each(function(){			
			typearray.push($(this).val());	
			$('.spansizecls').css('visibility','visible');	
		});
		if(typearray=='') $('.spansizecls').css('visibility','hidden');
		var size_checklist = "&typecheck="+typearray;
		
		
		var landmarkarray = new Array();		
		$('input[name="landmarkcheck"]:checked').each(function(){			
			landmarkarray.push($(this).val());
			$('.spancolorcls').css('visibility','visible');		
		});
		if(landmarkarray=='') $('.spancolorcls').css('visibility','hidden');
		var color_checklist = "&landmarkcheck="+landmarkarray;
		
		
		var pricearray = new Array();		
		$('input[name="price_range"]:checked').each(function(){			
			pricearray.push($(this).val());
			$('.spanpricecls').css('visibility','visible');		
		});
		if(pricearray=='') $('.spanpricecls').css('visibility','hidden');
		var price_checklist = "&price_range="+pricearray;
		
		var main_string = brand_checklist+size_checklist+color_checklist+price_checklist;
		main_string = main_string.substring(1, main_string.length)
		//alert(main_string);
		
		
		$.ajax({
			type: "POST",
			url: "filter_products.php",
			data: main_string, 
			cache: false,
			success: function(html){
				//alert(html);
				$("#productContainer").html(html);		
				$("#productContainer").css("opacity",1);
				$("#loaderID").css("opacity",0);
				
				
				
			}
			});
		
		
	}
	
	$("input[type='checkbox'], input[type='radio']").on( "click", showValues );
    $("select").on( "change", showValues );
	
	
	$(".spanbrandcls").click(function(){
		$('.areacheck').removeAttr('checked');				
		showValues();
		$('.spanbrandcls').css('visibility','hidden');
	});
	$(".spansizecls").click(function(){
		$('.typecheck').removeAttr('checked'); 
		showValues();
		$('.spansizecls').css('visibility','hidden');
	});
	$(".spancolorcls").click(function(){
		$('.landmarkcheck').removeAttr('checked'); showValues();
		$('.spancolorcls').css('visibility','hidden');
	});
	$(".spanpricecls").click(function(){
		$('.price_range').removeAttr('checked'); showValues();
		$('.spanpricecls').css('visibility','hidden');
	});
	$(".clear_filters").click(function(){
		$('#productCategoryLeftPanel').find('input[type=checkbox]:checked').removeAttr('checked');
		$('#productCategoryLeftPanel').find('input[type=radio]:checked').removeAttr('checked');
		showValues();
	});
	
});	