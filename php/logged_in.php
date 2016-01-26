
<!DOCTYPE html>
<html>
	<head>
		<title>Flat Finder</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--including files from CDN for the formatting to work-->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<script 
			src="http://maps.googleapis.com/maps/api/js">
		</script>
        <script src="logged_in.js"></script>
		<style>
		#googlemaps{
			position:absolute;
			right:20px;
			top:20px;
		}
		</style>
		
</head>
<body style="background-image:url(../images/2.jpg);">
		<div class="container">
		<div id="googlemaps" style="height:700px; width:800px" >
		</div>
		<div class="container">
        	<h2 style="color:white;">Welcome!</h2>
			<div class="row">
				<div class="col-sm-8">
					<div class="form-group">
						<h3 style="color:white;">Search or Mark your place and add your flat!</h3>
					<label for="search">Find your place</label>
					<input type="text" class="form-control" id="search" placeholder="Search" onKeydown="if(event.keyCode==13) doit();" style="width:50%">
                    </div>
                    <div class="form-group">
                    <label for="country">Country</label>
					<input type="text" class="form-control details" id="country" placeholder="Country" style="width:50%">
                    </div>
                    <div class="form-group">
                    <label for="state">State</label>
					<input type="text" class="form-control details" id="state" placeholder="State" style="width:50%">
					</div>
                	<div class="form-group">
                    <label for="city">City</label>
					<input type="text" class="form-control details" id="city" placeholder="City" style="width:50%">
                    </div>
                    <div class="form-group">
                    <label for="neighborhood">Neighborhood</label>
					<input type="text" class="form-control details" id="neighborhood" placeholder="Neighborhood" style="width:50%">
                    </div>
                    <div class="form-group">
                    <label for="postal_code">Postal Code</label>
					<input type="text" class="form-control details" id="postal_code" placeholder="Postal Code" style="width:50%">
                    </div>
				<button type="submit" class="btn btn-default" onclick="savedata()";>Add Property</button>
			</div>
		</div>
	</div>
    </div>
</body>
</html>