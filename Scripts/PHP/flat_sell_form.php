<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
    
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
        <title></title>
        <meta name="description" content="JavaScript validator, javascript, free, download, html, form, client side, netscape, explorer, IE, opera, form, fill, validation, format, date, time, submit, check, pattern, match">
        <meta name="keywords" content="JavaScript validator, javascript, free, download, html, form, client side, netscape, explorer, IE, opera, form, fill, validation, format, date, time, submit, check, pattern, match">
        <meta name="robots" content="index,follow">
        <link rel="shortcut icon" href="./res/1.png">
        <link rel="stylesheet" type="text/css" href="./res/screen.css" media="all">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="../../bootstrap-3.3.2/dist/css/bootstrap.min.css">
        <script src="../../bootstrap-3.3.2/dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="./res/country.js"></script>
        <script src="http://maps.googleapis.com/maps/api/js">
            
        </script>
        <script src="overlay.js"></script>
        <style>
            .ctrl {
                font-family: Tahoma, Verdana, sans-serif;
                font-size: 12px;
                width: 100%;
            }
            .btnform {
                border: 0px;
                font-family: tahoma, verdana;
                font-size: 12px;
                background-color: #DBEAF5;
                width: 100%;
                height:18px;
                text-align: center;
                cursor: hand;
            }
            .btn {
                background-color: #DBEAF5;
                padding: 0px;
            }
            textarea, select, input {
                font: 9px Verdana, arial, helvetica, sans-serif;
                background-color: #DBEAF5;
            }
            /* classes for validator */
            .tfvHighlight {
                font-weight: bold;
                color: red;
            }
            .tfvNormal {
                font-weight: normal;
                color: black;
            }
        </style>
        <script type="text/javascript" src="./res/jquery-1.9.1.js"></script>
        <link rel="stylesheet" type="text/css" href="/css/result-light.css">
        <style type='text/css'>
</style>
        <link rel="stylesheet" type="text/css" href="./res/result-light.css">
        <style type="text/css">
</style>
        <script type="text/javascript" src="./res/countries.js"></script>
        <script language="Javascript">
            <!--
            function isNumberKey(evt) {
                var charCode = (evt.which) ? evt.which : evt.keyCode;
                if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)) return false;

                return true;
            }
            //-->
        </script>
        <script language="javascript">
            function ValidatePAN(Obj) {
                if (Obj.value != "") {
                    ObjVal = Obj.value;
                    var panPat = /^([a-zA-Z]{5})(\d{4})([a-zA-Z]{1})$/;
                    if (ObjVal.search(panPat) == -1) {
                        alert("Invalid Pan No");
                        Obj.focus();
                        return false;
                    }
                }
            }
        </script>
    </head>
    
<body>
<?php
include 'loginchk.php';
?>

<!-- header -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">    
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
      <div id="googlemaps" style="height:500px; width:500px;"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="change_url()">Save changes</button>
      </div>
    </div>
  </div>
</div>


<div>
<a href="logout.php">Logout</a>
<!-- Form -->
<form method="POST" name="frm" style="margin-top:20px;" action="saveflat.php" id="form1" enctype="multipart/form-data">
<table cellpadding="0" cellspacing="0" border="0" width="925" align="center">
<tbody>
	<tr><td bgcolor="#80bfff" width="10"><img src="./res/pixel.gif" width="10" height="2" border="0"></td>
	<th bgcolor="#80bfff" nowrap="" style="color:white;font-size:12px;">Flat Selling Form<img src="./res/pixel.gif" width="10" height="1" border="0"></th>
	<td><img src="./res/formtab_r.gif" width="10" height="21" border="0"></td>
	<td background="./res/line_t.gif" width="100%">&nbsp;</td>
	<td background="./res/line_t.gif"><img src="./res/pixel.gif" width="10" height="1" border="0"></td>
</tr>
<tr>
	<td background="./res/line_l.gif"><img src="./res/pixel.gif" border="0"></td>
	<td colspan="5">
	<img src="./res/pixel.gif" width="1" height="10" border="0"><br>
	<table cellpadding="0" cellspacing="0" border="0" width="100%"><tbody><tr><td bgcolor="#DBEAF5">
		<table cellspacing="1" cellpadding="2" border="0" width="100%">
		<tbody>
		<tr bgcolor="#ffffff">
			<td colspan="2" id="t_company">&nbsp;Flat Title:</td>
			<td colspan="4" valign="top"><input type="text" name="flat_title" size="30" placeholder="Title"></td>
		</tr>
		<tr bgcolor="#ffffff">
			<td colspan="2" id="t_company">&nbsp;Price:</td>
			<td colspan="4" valign="top"><input type="text" name="price" size="30" placeholder="Price"></td>
		</tr>
		<tr bgcolor="#ffffff">
			<td colspan="2" id="t_company">&nbsp;Area in sq.fts:</td>
			<td colspan="4" valign="top"><input type="text" name="area" size="30" placeholder="Area in Sq. Feets"></td>
		</tr>
		<tr bgcolor="#ffffff">
			<td colspan="2" id="t_company">&nbsp;Type:</td>
			<td colspan="4" valign="top"><input type="text" name="type" size="30" placeholder="Type"></td>
		</tr>
		
		<tr>
		</tr></tbody></table><table cellpadding="0" cellspacing="0" border="0" width="925" align="center">
<tbody>
	<tr><td bgcolor="#80bfff" width="10"><img src="./res/pixel.gif" width="10" height="2" border="0"></td>
	<th bgcolor="#80bfff" nowrap="" style="color:white;font-size:12px;">Correspondence<img src="./res/pixel.gif" width="10" height="1" border="0"></th>
	<td bgcolor="white"><img src="./res/formtab_r.gif" width="10" height="21" border="0"></td>
	<td background="./res/line_t.gif"></td>
	<td background="./res/line_t.gif"><img src="./res/pixel.gif" width="10" height="1" border="0"></td>
	<td background="./res/line_t.gif"><img src="./res/pixel.gif" width="10" height="1" border="0"></td>
	</tr><tr>
	
	<td background="./res/line_l.gif"><img src="./res/pixel.gif" border="0"></td>
	<td colspan="5">
	<table cellpadding="0" cellspacing="0" border="0" width="100%"><tbody><tr><td bgcolor="#DBEAF5">
		<table cellspacing="1" cellpadding="2" border="0" width="100%">
		<tbody>
<tr bgcolor="#ffffff">
			<td colspan="2" id="t_company">&nbsp;Flat's Complete Address:</td>
			<td colspan="6" valign="top"><input type="text" name="add1" placeholder="Address Line 1" id="add1" required="required">
	<br>
	<input type="text" name="add2" placeholder="Address Line 2">
	<br>
	<input type="text" name="city" placeholder="City">
	<br>
	<input type="text" size="6" maxlength="6" name="pin" placeholder="Pin" onkeypress="return isNumberKey(event)">
	<br>
	<select id="country" name="country" onblur="chgAction(this);"><option value="-1">Select Country</option><option value="Afghanistan">Afghanistan</option><option value="Albania">Albania</option><option value="Algeria">Algeria</option><option value="American Samoa">American Samoa</option><option value="Angola">Angola</option><option value="Anguilla">Anguilla</option><option value="Antartica">Antartica</option><option value="Antigua and Barbuda">Antigua and Barbuda</option><option value="Argentina">Argentina</option><option value="Armenia">Armenia</option><option value="Aruba">Aruba</option><option value="Ashmore and Cartier Island">Ashmore and Cartier Island</option><option value="Australia">Australia</option><option value="Austria">Austria</option><option value="Azerbaijan">Azerbaijan</option><option value="Bahamas">Bahamas</option><option value="Bahrain">Bahrain</option><option value="Bangladesh">Bangladesh</option><option value="Barbados">Barbados</option><option value="Belarus">Belarus</option><option value="Belgium">Belgium</option><option value="Belize">Belize</option><option value="Benin">Benin</option><option value="Bermuda">Bermuda</option><option value="Bhutan">Bhutan</option><option value="Bolivia">Bolivia</option><option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option><option value="Botswana">Botswana</option><option value="Brazil">Brazil</option><option value="British Virgin Islands">British Virgin Islands</option><option value="Brunei">Brunei</option><option value="Bulgaria">Bulgaria</option><option value="Burkina Faso">Burkina Faso</option><option value="Burma">Burma</option><option value="Burundi">Burundi</option><option value="Cambodia">Cambodia</option><option value="Cameroon">Cameroon</option><option value="Canada">Canada</option><option value="Cape Verde">Cape Verde</option><option value="Cayman Islands">Cayman Islands</option><option value="Central African Republic">Central African Republic</option><option value="Chad">Chad</option><option value="Chile">Chile</option><option value="China">China</option><option value="Christmas Island">Christmas Island</option><option value="Clipperton Island">Clipperton Island</option><option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option><option value="Colombia">Colombia</option><option value="Comoros">Comoros</option><option value="Congo, Democratic Republic of the">Congo, Democratic Republic of the</option><option value="Congo, Republic of the">Congo, Republic of the</option><option value="Cook Islands">Cook Islands</option><option value="Costa Rica">Costa Rica</option><option value="Cote d&#39;Ivoire">Cote d'Ivoire</option><option value="Croatia">Croatia</option><option value="Cuba">Cuba</option><option value="Cyprus">Cyprus</option><option value="Czeck Republic">Czeck Republic</option><option value="Denmark">Denmark</option><option value="Djibouti">Djibouti</option><option value="Dominica">Dominica</option><option value="Dominican Republic">Dominican Republic</option><option value="Ecuador">Ecuador</option><option value="Egypt">Egypt</option><option value="El Salvador">El Salvador</option><option value="Equatorial Guinea">Equatorial Guinea</option><option value="Eritrea">Eritrea</option><option value="Estonia">Estonia</option><option value="Ethiopia">Ethiopia</option><option value="Europa Island">Europa Island</option><option value="Falkland Islands (Islas Malvinas)">Falkland Islands (Islas Malvinas)</option><option value="Faroe Islands">Faroe Islands</option><option value="Fiji">Fiji</option><option value="Finland">Finland</option><option value="France">France</option><option value="French Guiana">French Guiana</option><option value="French Polynesia">French Polynesia</option><option value="French Southern and Antarctic Lands">French Southern and Antarctic Lands</option><option value="Gabon">Gabon</option><option value="Gambia, The">Gambia, The</option><option value="Gaza Strip">Gaza Strip</option><option value="Georgia">Georgia</option><option value="Germany">Germany</option><option value="Ghana">Ghana</option><option value="Gibraltar">Gibraltar</option><option value="Glorioso Islands">Glorioso Islands</option><option value="Greece">Greece</option><option value="Greenland">Greenland</option><option value="Grenada">Grenada</option><option value="Guadeloupe">Guadeloupe</option><option value="Guam">Guam</option><option value="Guatemala">Guatemala</option><option value="Guernsey">Guernsey</option><option value="Guinea">Guinea</option><option value="Guinea-Bissau">Guinea-Bissau</option><option value="Guyana">Guyana</option><option value="Haiti">Haiti</option><option value="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option><option value="Holy See (Vatican City)">Holy See (Vatican City)</option><option value="Honduras">Honduras</option><option value="Hong Kong">Hong Kong</option><option value="Howland Island">Howland Island</option><option value="Hungary">Hungary</option><option value="Iceland">Iceland</option><option value="India">India</option><option value="Indonesia">Indonesia</option><option value="Iran">Iran</option><option value="Iraq">Iraq</option><option value="Ireland">Ireland</option><option value="Ireland, Northern">Ireland, Northern</option><option value="Israel">Israel</option><option value="Italy">Italy</option><option value="Jamaica">Jamaica</option><option value="Jan Mayen">Jan Mayen</option><option value="Japan">Japan</option><option value="Jarvis Island">Jarvis Island</option><option value="Jersey">Jersey</option><option value="Johnston Atoll">Johnston Atoll</option><option value="Jordan">Jordan</option><option value="Juan de Nova Island">Juan de Nova Island</option><option value="Kazakhstan">Kazakhstan</option><option value="Kenya">Kenya</option><option value="Kiribati">Kiribati</option><option value="Korea, North">Korea, North</option><option value="Korea, South">Korea, South</option><option value="Kuwait">Kuwait</option><option value="Kyrgyzstan">Kyrgyzstan</option><option value="Laos">Laos</option><option value="Latvia">Latvia</option><option value="Lebanon">Lebanon</option><option value="Lesotho">Lesotho</option><option value="Liberia">Liberia</option><option value="Libya">Libya</option><option value="Liechtenstein">Liechtenstein</option><option value="Lithuania">Lithuania</option><option value="Luxembourg">Luxembourg</option><option value="Macau">Macau</option><option value="Macedonia, Former Yugoslav Republic of">Macedonia, Former Yugoslav Republic of</option><option value="Madagascar">Madagascar</option><option value="Malawi">Malawi</option><option value="Malaysia">Malaysia</option><option value="Maldives">Maldives</option><option value="Mali">Mali</option><option value="Malta">Malta</option><option value="Man, Isle of">Man, Isle of</option><option value="Marshall Islands">Marshall Islands</option><option value="Martinique">Martinique</option><option value="Mauritania">Mauritania</option><option value="Mauritius">Mauritius</option><option value="Mayotte">Mayotte</option><option value="Mexico">Mexico</option><option value="Micronesia, Federated States of">Micronesia, Federated States of</option><option value="Midway Islands">Midway Islands</option><option value="Moldova">Moldova</option><option value="Monaco">Monaco</option><option value="Mongolia">Mongolia</option><option value="Montserrat">Montserrat</option><option value="Morocco">Morocco</option><option value="Mozambique">Mozambique</option><option value="Namibia">Namibia</option><option value="Nauru">Nauru</option><option value="Nepal">Nepal</option><option value="Netherlands">Netherlands</option><option value="Netherlands Antilles">Netherlands Antilles</option><option value="New Caledonia">New Caledonia</option><option value="New Zealand">New Zealand</option><option value="Nicaragua">Nicaragua</option><option value="Niger">Niger</option><option value="Nigeria">Nigeria</option><option value="Niue">Niue</option><option value="Norfolk Island">Norfolk Island</option><option value="Northern Mariana Islands">Northern Mariana Islands</option><option value="Norway">Norway</option><option value="Oman">Oman</option><option value="Pakistan">Pakistan</option><option value="Palau">Palau</option><option value="Panama">Panama</option><option value="Papua New Guinea">Papua New Guinea</option><option value="Paraguay">Paraguay</option><option value="Peru">Peru</option><option value="Philippines">Philippines</option><option value="Pitcaim Islands">Pitcaim Islands</option><option value="Poland">Poland</option><option value="Portugal">Portugal</option><option value="Puerto Rico">Puerto Rico</option><option value="Qatar">Qatar</option><option value="Reunion">Reunion</option><option value="Romainia">Romainia</option><option value="Russia">Russia</option><option value="Rwanda">Rwanda</option><option value="Saint Helena">Saint Helena</option><option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option><option value="Saint Lucia">Saint Lucia</option><option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option><option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option><option value="Samoa">Samoa</option><option value="San Marino">San Marino</option><option value="Sao Tome and Principe">Sao Tome and Principe</option><option value="Saudi Arabia">Saudi Arabia</option><option value="Scotland">Scotland</option><option value="Senegal">Senegal</option><option value="Seychelles">Seychelles</option><option value="Sierra Leone">Sierra Leone</option><option value="Singapore">Singapore</option><option value="Slovakia">Slovakia</option><option value="Slovenia">Slovenia</option><option value="Solomon Islands">Solomon Islands</option><option value="Somalia">Somalia</option><option value="South Africa">South Africa</option><option value="South Georgia and South Sandwich Islands">South Georgia and South Sandwich Islands</option><option value="Spain">Spain</option><option value="Spratly Islands">Spratly Islands</option><option value="Sri Lanka">Sri Lanka</option><option value="Sudan">Sudan</option><option value="Suriname">Suriname</option><option value="Svalbard">Svalbard</option><option value="Swaziland">Swaziland</option><option value="Sweden">Sweden</option><option value="Switzerland">Switzerland</option><option value="Syria">Syria</option><option value="Taiwan">Taiwan</option><option value="Tajikistan">Tajikistan</option><option value="Tanzania">Tanzania</option><option value="Thailand">Thailand</option><option value="Tobago">Tobago</option><option value="Toga">Toga</option><option value="Tokelau">Tokelau</option><option value="Tonga">Tonga</option><option value="Trinidad">Trinidad</option><option value="Tunisia">Tunisia</option><option value="Turkey">Turkey</option><option value="Turkmenistan">Turkmenistan</option><option value="Tuvalu">Tuvalu</option><option value="Uganda">Uganda</option><option value="Ukraine">Ukraine</option><option value="United Arab Emirates">United Arab Emirates</option><option value="United Kingdom">United Kingdom</option><option value="Uruguay">Uruguay</option><option value="USA">USA</option><option value="Uzbekistan">Uzbekistan</option><option value="Vanuatu">Vanuatu</option><option value="Venezuela">Venezuela</option><option value="Vietnam">Vietnam</option><option value="Virgin Islands">Virgin Islands</option><option value="Wales">Wales</option><option value="Wallis and Futuna">Wallis and Futuna</option><option value="West Bank">West Bank</option><option value="Western Sahara">Western Sahara</option><option value="Yemen">Yemen</option><option value="Yugoslavia">Yugoslavia</option><option value="Zambia">Zambia</option><option value="Zimbabwe">Zimbabwe</option></select>
	<br>
	<select name="state" id="state"><option disabled="">Select the State</option></select>
	<br>
	 <script language="javascript">
	populateCountries("country", "state");
	 </script>
	</td>
			
		</tr>
		<tr bgcolor="#ffffff">
			<td colspan="2" id="t_company">&nbsp;Landmark.:</td>
			<td colspan="4" valign="top"><input type="text" name="landmark" size="30" placeholder="Landmark if any">&nbsp;&nbsp;&nbsp;&nbsp;
	</td>
		<tr bgcolor="#ffffff">
			<td colspan="2" id="t_company">&nbsp;Telephone no.:</td>
			<td colspan="2" valign="top"><input type="text" name="tno1" size="30" placeholder="Telephone 1">&nbsp;&nbsp;&nbsp;&nbsp;
	</td>
			<td colspan="2"><input type="text" name="tno2" size="30" placeholder="Telephone 2"></td>
		</tr>
		<tr bgcolor="#ffffff">
			<td colspan="2" id="t_company">&nbsp;Contact Person:</td>
			<td colspan="2" valign="top"><input type="text" name="contactname" size="30" placeholder="Name" >&nbsp;&nbsp;&nbsp;&nbsp;
	</td>
			<td colspan="2"><input type="text" name="cnameno" size="30" placeholder="Mobile"></td>
		</tr>
		<tr bgcolor="#ffffff">
			<td colspan="2" id="t_company">&nbsp;Others.:</td>
			<td valign="top"><input type="text" name="fax" size="25" placeholder="FAX no.">&nbsp;&nbsp;&nbsp;&nbsp;
	</td>
			<td colspan="2"><input type="text" name="email" size="25" placeholder="E-mail id"></td>
			<td colspan="2"><input type="text" name="url" size="25" placeholder="Web-site URL"></td>
		</tr>
		</tbody></table></td></tr></tbody></table>	
		</td></tr>
		<tr>
		</tr></tbody></table>
		<table cellpadding="0" cellspacing="0" border="0" width="925" align="center">
<tbody>
	<tr><td bgcolor="#80bfff" width="10"><img src="./res/pixel.gif" width="10" height="2" border="0"></td>
	<th bgcolor="#80bfff" nowrap="" style="color:white;font-size:12px;">Payment<img src="./res/pixel.gif" width="10" height="1" border="0"></th>
	<td bgcolor="white"><img src="./res/formtab_r.gif" width="10" height="21" border="0"></td>
	
	<td background="./res/line_t.gif"></td>
	
	<td background="./res/line_t.gif"><img src="./res/pixel.gif" width="10" height="1" border="0"></td>
	<td background="./res/line_t.gif"><img src="./res/pixel.gif" width="10" height="1" border="0"></td>

		
	</tr><tr>
	<td background="./res/line_l.gif"><img src="./res/pixel.gif" border="0"></td>
	<td colspan="5">
	<table cellpadding="0" cellspacing="0" border="0" width="100%"><tbody><tr><td bgcolor="#DBEAF5">
		<table cellspacing="1" cellpadding="2" border="0" width="100%">
		<tbody>

		<tr bgcolor="#ffffff">
			<td colspan="2" id="t_company">&nbsp;Payment Term:</td>
			<td colspan="2" valign="top"><input type="text" name="payterm" size="30" placeholder="Payment Term">&nbsp;&nbsp;&nbsp;&nbsp;
			</td><td colspan="2"></td>
	
		</tr>
		<tr bgcolor="#ffffff">
			<td colspan="2" id="t_company">&nbsp;Payment Method Code:</td>
			<td colspan="2" valign="top"><input type="radio" name="paymethod" value="RTGS" checked="checked">RTGS

	</td>
			<td colspan="2"><input type="radio" name="paymethod" value="Cheque">Cheque</td>
		</tr>
		
		</tbody></table></td></tr></tbody></table>	
		</td></tr>

		<tr>
		</tr></tbody></table>
		<table cellpadding="0" cellspacing="0" border="0" width="925" align="center">
<tbody>
	<tr><td bgcolor="#80bfff" width="10"><img src="./res/pixel.gif" width="10" height="2" border="0"></td>
	<th bgcolor="#80bfff" nowrap="" style="color:white;font-size:12px;">Image Upload<img src="./res/pixel.gif" width="10" height="1" border="0"></th>
	<td bgcolor="white"><img src="./res/formtab_r.gif" width="10" height="21" border="0"></td>
	
	<td background="./res/line_t.gif"></td>
	
	<td background="./res/line_t.gif"><img src="./res/pixel.gif" width="10" height="1" border="0"></td>
	<td background="./res/line_t.gif"><img src="./res/pixel.gif" width="10" height="1" border="0"></td>

		
	</tr><tr>
	<td background="./res/line_l.gif"><img src="./res/pixel.gif" border="0"></td>
	<td colspan="5">
	<table cellpadding="0" cellspacing="0" border="0" width="100%"><tbody><tr><td bgcolor="#DBEAF5">
		<table cellspacing="1" cellpadding="2" border="0" width="100%">
		<tbody>

		<tr bgcolor="#ffffff">
			<td colspan="2" id="t_company">&nbsp;Choose</td>
			<td colspan="2" valign="top"><input type="file" name="image">
			<img id="myImg" src="" alt="your image" height="20" width="150"/>
			<script>
			$(function () {
    $(":file").change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[0]);
        }
    });
});

function imageIsLoaded(e) {
    $('#myImg').attr('src', e.target.result);
	$('#myImg').attr('height', "200");
	$('#myImg').attr('width', "400");
};</script>
			</td><td colspan="2"></td>
	
		</tr>
		
		</tbody></table></td></tr></tbody></table>	
		</td></tr>

		<tr>
		</tr></tbody></table><table cellpadding="0" cellspacing="0" border="0" width="925" align="center">
<tbody>
	<tr><td bgcolor="#80bfff" width="10"><img src="./res/pixel.gif" width="10" height="2" border="0"></td>
	<th bgcolor="#80bfff" nowrap="" style="color:white;font-size:12px;">Pin to Map<img src="./res/pixel.gif" width="10" height="1" border="0"></th>
	<td bgcolor="white"><img src="./res/formtab_r.gif" width="10" height="21" border="0"></td>
	
	<td background="./res/line_t.gif"></td>
    <td>
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" onclick="my_initial()">
  Pin to map
</button>
</td>
	
	<td background="./res/line_t.gif"><img src="./res/pixel.gif" width="10" height="1" border="0"></td>
	<td background="./res/line_t.gif"><img src="./res/pixel.gif" width="10" height="1" border="0"></td>

		
	</tr><tr>
	<td background="./res/line_l.gif"><img src="./res/pixel.gif" border="0"></td>
	<td colspan="5">
	<table cellpadding="0" cellspacing="0" border="0" width="100%"><tbody><tr><td bgcolor="#DBEAF5">
		<table cellspacing="1" cellpadding="2" border="0" width="100%" >
		<tbody>

		<tr bgcolor="#ffffff">
			
			
			<script>
			$(function () {
    $(":file").change(function () {
        if (this.files && this.files[1]) {
            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[1]);
        }
    });
});

function imageIsLoaded(e) {
    $('#myImg').attr('src', e.target.result);
	$('#myImg').attr('height', "200");
	$('#myImg').attr('width', "400");
};</script>
			</td><td colspan="2"></td>
	
		</tr>
		
		</tbody></table></td></tr></tbody></table>	
		</td></tr>

		<tr>
		</tr></tbody></table>
		

<script>
function myFunction() {
    var lname = document.getElementById("lname").value;
    var pan = document.getElementById("pan").value;
    var x = lname.substr(0,1);
    var y = pan.substr(4,1);
    submitOK = "true";

    if (x!=y) {
        alert("Invalid PAN No.");
        submitOK = "false";
    } 

    if (submitOK == "false") {
        return false;
    }
}
</script>
<!-- Form end -->






</td></tr></tbody></table></td></tr></tbody><tbody><tr>
	<td width="10"><img src="./res/formtab_b.gif" width="10" height="20" border="0"></td>
	<td bgcolor="#80bfff" colspan="4" align="right">
	<table cellpadding="0" cellspacing="0" border="0">
	<tbody><tr>
		<td class="btn" width="100">
		<input type="hidden" name="bname"  id="bname" >
		
		<input type="submit" name="Submit" value="Submit" class="btnform"></td>
        
		<td width="1"><img src="./res/pixel.gif" width="1" height="18" border="0"></td>
	</tr>
	</tbody></table>
	</td>
</tr></tbody></table></tr>
<!--<div height="480px"><iframe id="myframe" src="maps.php" width="100%" height="1000" frameborder="0"></iframe></div>-->	</form></div>

</body></html>