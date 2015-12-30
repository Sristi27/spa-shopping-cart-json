<?php
session_start();
require_once 'config.php';
?>

<!DOCTYPE html>
<html>
<head lang="en">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">

	<title><?php SITE_TITLE ?></title>

	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet">	
	<link href="assets/css/bootstrap.css" rel="stylesheet">
	<link href="assets/css/checkout.css" rel="stylesheet">
	<link href="assets/css/skin-1.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.7/angular.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/handlebars.js/2.0.0/handlebars.min.js"></script>
	<script src="assets/js/checkout.js"></script>
	<script src="assets/js/jquery.bootstrap-touchspin.js"></script>
	<script src="assets/js/helpers.js"></script>
	
</head>


</body>

<div class="container main-container headerOffset">
<hr/>
        <h1><?php echo SITE_TITLE ?></h1>
        <hr/>
<div class="row">
<div class="breadcrumbDiv col-lg-12">
<ul class="breadcrumb">
<li><a href="<?php echo HOME_PAGE?>">Home</a></li>
<li class="active">Cart</li>
</ul>
</div>
</div>
 
<div class="row">
<div class="col-lg-9 col-md-9 col-sm-7 col-xs-6 col-xxs-12 text-center-xs">
<h1 class="section-title-inner"><span><i class="fa fa-shopping-cart cart-icon"></i> Shopping cart </span></h1>
</div>
<div class="col-lg-3 col-md-3 col-sm-5 rightSidebar col-xs-6 col-xxs-12 text-center-xs">
<h4 class="caps"><a href="category.html"><i class="fa fa-chevron-left"></i> Back to shopping </a></h4>
</div>
</div>
 
<button type="button" style="display:none" class="btn btn-primary btn-lg btn-block" data-action='showdetails' data-toggle="collapse" data-target="#cartdetails">Order Details...</button>

<div id='cartdetails' class="row">
<div  class="col-lg-9 col-md-9 col-sm-7">
<div class="row userInfo">
<div class="col-xs-12 col-sm-12">
<div class="cartContent w100">
<div id="output"></div>
<script id="checkout-template" type="text/x-handlebars-template">​
	<table class="cartTable table-responsive" style="width:100%">
	<tbody>
	<tr class="CartProduct cartTableHeader">
	<td style="width:15%"> Product</td>
	<td style="width:40%">Details</td>
	<td style="width:10%" class="delete">&nbsp;</td>
	<td style="width:10%">QNT</td>
	<td style="width:10%">Discount</td>
	<td style="width:15%">Total</td>
	</tr>

	{{#each this}}
		<tr class="CartProduct" id="{{id}}">
			<td class="CartProductThumb">
			<div><a href="product-details.html"><img src="{{image_link}}" alt="img"></a>
			</div>
			</td>
			<td>
			<div class="CartDescription">
			<h4><a href="#">{{description}}</a></h4>
			<span class="size">{{size}}</span>
			<div class="price"><span>${{price}}</span></div>
			</div>
			</td>
			<td class="delete"><a title="Delete"> <i class="fa fa-trash"></i></a></td>
			<td><div class="input-group bootstrap-touchspin"><span class="input-group-btn"></span><span class="input-group-addon bootstrap-touchspin-prefix"></span><input class="quanitySniper form-control" type="text" value="{{qty}}" name="quanitySniper"><span class="input-group-addon bootstrap-touchspin-postfix"></span><span class="input-group-btn"></span></div></td>
			<td>0</td>
			<td class="price">${{total}}</td>
		</tr>
	{{/each}}


	</tbody>
	</table>
</script>
</div>
 
<div class="cartFooter w100">
<div class="box-footer">
<div class="pull-left"><a href="<?php echo HOME_PAGE?>" class="btn btn-default"> <i class="fa fa-arrow-left"></i> &nbsp; Continue shopping 
</a></div>
<div class="pull-right">
<button type="submit" class="btn btn-default"><i class="fa fa-undo"></i> &nbsp; Update
cart
</button>
</div>
</div>
</div>
 
</div>
</div>
 
</div>
<div class="col-lg-3 col-md-3 col-sm-5 rightSidebar">
<div class="contentBox">
<div class="w100 costDetails">
<div class="table-block" id="order-detail-content">
<button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="collapse" data-target="#cartdetails">Proceed to
checkout &nbsp; </button>
<!--<a class="btn btn-primary btn-lg btn-block" title="checkout" href="checkout.php" style="margin-bottom:20px"><i class="fa fa-arrow-right"></i></a>-->
<div class="w100 cartMiniTable">

<form ng-app ng-controller="OrderFormController">
	<table id="cart-summary" class="std table">
	<tbody>
	<tr>
	<td>Total products</td>
	<td class="price">{{carttotal() | currency}}</td>
	</tr>
	<tr style="">
	<td>Shipping</td>
	<td class="price"><span class="success">Free shipping!</span></td>
	</tr>
	<tr class="cart-total-price ">
	<td>Total (tax excl.)</td>
	<td class="price">{{carttotal() | currency}}</td>
	</tr>
	<tr>
	<td>Total tax</td>
	<td class="price" id="total-tax">$0.00</td>
	</tr>
	<tr>
	<td> Total</td>
	<td class=" site-color" id="total-price">{{carttotal() | currency}}</td>
	</tr>
	<tr>
	<td colspan="2">
	<div class="input-append couponForm">
	<input class="col-lg-8" id="appendedInputButton" type="text" placeholder="Coupon code">
	<button class="col-lg-4 btn btn-success" type="button">Apply!</button>
	</div>
	</td>
	</tr>
	</tbody>
	<tbody>
	</tbody>
	</table>
</form>
</div>
</div>
</div>
</div>
 
</div>
 
</div>
 
<div style="clear:both"></div>
</div>


<!---- CHECK OUT INFO ---------------->
<!-- ***********************************************************************************-->
<div id='checkout_info' class="container">
	<div class="row">

        <strong>Purchase Summary:</strong>
        <h2 class="bg-success">Today's Total: {{total}}</h2>
        
        <div class="form-group col-md-12 bg-primary">
            <label class="control-label" for="billinginformation">Shipping Information</label>
        </div>
        
        <div class="shipping-info">
            <div class="form-group col-md-6">
              <span class="required-lbl">* </span><label class="control-label" for="firstname">First Name</label>
              <div class="controls">
                <input id="firstname" name="firstname" type="text" placeholder="" class="form-control" required="">
              </div>
            </div>
            
            <div class="form-group col-md-6">
              <span class="required-lbl">* </span><label class="control-label" for="lastname">Last Name</label>
              <div class="controls">
                <input id="lastname" name="lastname" type="text" placeholder="" class="form-control" required="">
              </div>
            </div>
            
            <div class="form-group col-md-6">
              <span class="required-lbl">* </span><label class="control-label" for="shippingaddress1">Shipping Address 1</label>
              <div class="controls">
                <input id="shippingaddress1" name="shippingaddress1" type="text" placeholder="" class="form-control" required="">
              </div>
            </div>
            
            <div class="form-group col-md-6">
              <label class="control-label" for="shippingaddress2">Shipping Address 2</label>
              <div class="controls">
                <input id="shippingaddress2" name="shippingaddress2" type="text" placeholder="" class="form-control" required="">
              </div>
            </div>
            
            <div class="form-group col-md-6">
              <span class="required-lbl">* </span><label class="control-label" for="shippingcountry">Shipping Country</label>
              <div class="controls">
                 <div class="controls">
                   <select name="country" class="ui-textfield ui-textfield-system sa-country"><option selected="selected" value="">--Please Select--</option><option value="RU">Russian Federation</option><option value="US">United States</option><option value="BR">Brazil</option><option value="ID">Indonesia</option><option value="AU">Australia</option><option value="UK">United Kingdom</option><option value="ES">Spain</option><option value="FR">France</option><option value="CA">Canada</option><option value="PL">Poland</option><option value="TR">Turkey</option><option value="SE">Sweden</option><option value="IL">Israel</option><option value="IT">Italy</option><option value="NZ">New Zealand</option><option value="DE">Germany</option><option value="">-------- Country &amp; Territories (A-Z) --------</option><option value="AF">Afghanistan</option><option value="ALA">Aland Islands</option><option value="AL">Albania</option><option value="GBA">Alderney</option><option value="DZ">Algeria</option><option value="AS">American Samoa</option><option value="AD">Andorra</option><option value="AO">Angola</option><option value="AI">Anguilla</option><option value="AQ">Antarctica</option><option value="AG">Antigua and Barbuda</option><option value="AR">Argentina</option><option value="AM">Armenia</option><option value="AW">Aruba</option><option value="ASC">Ascension Island</option><option value="AU">Australia</option><option value="AT">Austria</option><option value="AZ">Azerbaijan</option><option value="BS">Bahamas</option><option value="BH">Bahrain</option><option value="BD">Bangladesh</option><option value="BB">Barbados</option><option value="BY">Belarus</option><option value="BE">Belgium</option><option value="BZ">Belize</option><option value="BJ">Benin</option><option value="BM">Bermuda</option><option value="BT">Bhutan</option><option value="BO">Bolivia</option><option value="BA">Bosnia and Herzegovina</option><option value="BW">Botswana</option><option value="BV">Bouvet Island</option><option value="BR">Brazil</option><option value="IO">British Indian Ocean Territory</option><option value="BN">Brunei Darussalam</option><option value="BG">Bulgaria</option><option value="BF">Burkina Faso</option><option value="BI">Burundi</option><option value="KH">Cambodia</option><option value="CM">Cameroon</option><option value="CA">Canada</option><option value="CV">Cape Verde</option><option value="KY">Cayman Islands</option><option value="CF">Central African Republic</option><option value="TD">Chad</option><option value="CL">Chile</option><option value="CN">China (Mainland)</option><option value="CX">Christmas Island</option><option value="CC">Cocos (Keeling) Islands</option><option value="CO">Colombia</option><option value="KM">Comoros</option><option value="ZR">Congo, The Democratic Republic Of The</option><option value="CG">Congo, The Republic of Congo</option><option value="CK">Cook Islands</option><option value="CR">Costa Rica</option><option value="CI">Cote D'Ivoire</option><option value="HR">Croatia (local name: Hrvatska)</option><option value="CU">Cuba</option><option value="CY">Cyprus</option><option value="CZ">Czech Republic</option><option value="DK">Denmark</option><option value="DJ">Djibouti</option><option value="DM">Dominica</option><option value="DO">Dominican Republic</option><option value="TP">East Timor</option><option value="EC">Ecuador</option><option value="EG">Egypt</option><option value="SV">El Salvador</option><option value="GQ">Equatorial Guinea</option><option value="ER">Eritrea</option><option value="EE">Estonia</option><option value="ET">Ethiopia</option><option value="FK">Falkland Islands (Malvinas)</option><option value="FO">Faroe Islands</option><option value="FJ">Fiji</option><option value="FI">Finland</option><option value="FR">France</option><option value="FX">France Metropolitan</option><option value="GF">French Guiana</option><option value="PF">French Polynesia</option><option value="TF">French Southern Territories</option><option value="GA">Gabon</option><option value="GM">Gambia</option><option value="GE">Georgia</option><option value="DE">Germany</option><option value="GH">Ghana</option><option value="GI">Gibraltar</option><option value="GR">Greece</option><option value="GL">Greenland</option><option value="GD">Grenada</option><option value="GP">Guadeloupe</option><option value="GU">Guam</option><option value="GT">Guatemala</option><option value="GGY">Guernsey</option><option value="GN">Guinea</option><option value="GW">Guinea-Bissau</option><option value="GY">Guyana</option><option value="HT">Haiti</option><option value="HM">Heard and Mc Donald Islands</option><option value="HN">Honduras</option><option value="HK">Hong Kong</option><option value="HU">Hungary</option><option value="IS">Iceland</option><option value="IN">India</option><option value="ID">Indonesia</option><option value="IR">Iran (Islamic Republic of)</option><option value="IQ">Iraq</option><option value="IE">Ireland</option><option value="IM">Isle of Man</option><option value="IL">Israel</option><option value="IT">Italy</option><option value="JM">Jamaica</option><option value="JP">Japan</option><option value="JEY">Jersey</option><option value="JO">Jordan</option><option value="KZ">Kazakhstan</option><option value="KE">Kenya</option><option value="KI">Kiribati</option><option value="KS">Kosovo</option><option value="KW">Kuwait</option><option value="KG">Kyrgyzstan</option><option value="LA">Lao People's Democratic Republic</option><option value="LV">Latvia</option><option value="LB">Lebanon</option><option value="LS">Lesotho</option><option value="LR">Liberia</option><option value="LY">Libya</option><option value="LI">Liechtenstein</option><option value="LT">Lithuania</option><option value="LU">Luxembourg</option><option value="MO">Macau</option><option value="MK">Macedonia</option><option value="MG">Madagascar</option><option value="MW">Malawi</option><option value="MY">Malaysia</option><option value="MV">Maldives</option><option value="ML">Mali</option><option value="MT">Malta</option><option value="MH">Marshall Islands</option><option value="MQ">Martinique</option><option value="MR">Mauritania</option><option value="MU">Mauritius</option><option value="YT">Mayotte</option><option value="MX">Mexico</option><option value="FM">Micronesia</option><option value="MD">Moldova</option><option value="MC">Monaco</option><option value="MN">Mongolia</option><option value="MNE">Montenegro</option><option value="MS">Montserrat</option><option value="MA">Morocco</option><option value="MZ">Mozambique</option><option value="MM">Myanmar</option><option value="NA">Namibia</option><option value="NR">Nauru</option><option value="NP">Nepal</option><option value="NL">Netherlands</option><option value="AN">Netherlands Antilles</option><option value="NC">New Caledonia</option><option value="NZ">New Zealand</option><option value="NI">Nicaragua</option><option value="NE">Niger</option><option value="NG">Nigeria</option><option value="NU">Niue</option><option value="NF">Norfolk Island</option><option value="KP">North Korea</option><option value="MP">Northern Mariana Islands</option><option value="NO">Norway</option><option value="OM">Oman</option><option value="OTHER">Other Country</option><option value="PK">Pakistan</option><option value="PW">Palau</option><option value="PS">Palestine</option><option value="PA">Panama</option><option value="PG">Papua New Guinea</option><option value="PY">Paraguay</option><option value="PE">Peru</option><option value="PH">Philippines</option><option value="PN">Pitcairn</option><option value="PL">Poland</option><option value="PT">Portugal</option><option value="PR">Puerto Rico</option><option value="QA">Qatar</option><option value="RE">Reunion</option><option value="RO">Romania</option><option value="RU">Russian Federation</option><option value="RW">Rwanda</option><option value="BLM">Saint Barthelemy</option><option value="KN">Saint Kitts and Nevis</option><option value="LC">Saint Lucia</option><option value="MAF">Saint Martin</option><option value="VC">Saint Vincent and the Grenadines</option><option value="WS">Samoa</option><option value="SM">San Marino</option><option value="ST">Sao Tome and Principe</option><option value="SA">Saudi Arabia</option><option value="SCT">Scotland</option><option value="SN">Senegal</option><option value="SRB">Serbia</option><option value="SC">Seychelles</option><option value="SL">Sierra Leone</option><option value="SG">Singapore</option><option value="SK">Slovakia (Slovak Republic)</option><option value="SI">Slovenia</option><option value="SB">Solomon Islands</option><option value="SO">Somalia</option><option value="ZA">South Africa</option><option value="SGS">South Georgia and the South Sandwich Islands</option><option value="KR">South Korea</option><option value="SS">South Sudan</option><option value="ES">Spain</option><option value="LK">Sri Lanka</option><option value="SH">St. Helena</option><option value="PM">St. Pierre and Miquelon</option><option value="SD">Sudan</option><option value="SR">Suriname</option><option value="SJ">Svalbard and Jan Mayen Islands</option><option value="SZ">Swaziland</option><option value="SE">Sweden</option><option value="CH">Switzerland</option><option value="SY">Syrian Arab Republic</option><option value="TW">Taiwan</option><option value="TJ">Tajikistan</option><option value="TZ">Tanzania</option><option value="TH">Thailand</option><option value="TLS">Timor-Leste</option><option value="TG">Togo</option><option value="TK">Tokelau</option><option value="TO">Tonga</option><option value="TT">Trinidad and Tobago</option><option value="TN">Tunisia</option><option value="TR">Turkey</option><option value="TM">Turkmenistan</option><option value="TC">Turks and Caicos Islands</option><option value="TV">Tuvalu</option><option value="UG">Uganda</option><option value="UA">Ukraine</option><option value="AE">United Arab Emirates</option><option value="UK">United Kingdom</option><option value="US">United States</option><option value="UM">United States Minor Outlying Islands</option><option value="UY">Uruguay</option><option value="UZ">Uzbekistan</option><option value="VU">Vanuatu</option><option value="VA">Vatican City State (Holy See)</option><option value="VE">Venezuela</option><option value="VN">Vietnam</option><option value="VG">Virgin Islands (British)</option><option value="VI">Virgin Islands (U.S.)</option><option value="WF">Wallis And Futuna Islands</option><option value="EH">Western Sahara</option><option value="YE">Yemen</option><option value="YU">Yugoslavia</option><option value="ZM">Zambia</option><option value="EAZ">Zanzibar</option><option value="ZW">Zimbabwe</option><option value="AF">Afghanistan</option><option value="ALA">Aland Islands</option><option value="AL">Albania</option><option value="GBA">Alderney</option><option value="DZ">Algeria</option><option value="AS">American Samoa</option><option value="AD">Andorra</option><option value="AO">Angola</option><option value="AI">Anguilla</option><option value="AQ">Antarctica</option><option value="AG">Antigua and Barbuda</option><option value="AR">Argentina</option><option value="AM">Armenia</option><option value="AW">Aruba</option><option value="ASC">Ascension Island</option><option value="AU">Australia</option><option value="AT">Austria</option><option value="AZ">Azerbaijan</option><option value="BS">Bahamas</option><option value="BH">Bahrain</option><option value="BD">Bangladesh</option><option value="BB">Barbados</option><option value="BY">Belarus</option><option value="BE">Belgium</option><option value="BZ">Belize</option><option value="BJ">Benin</option><option value="BM">Bermuda</option><option value="BT">Bhutan</option><option value="BO">Bolivia</option><option value="BA">Bosnia and Herzegovina</option><option value="BW">Botswana</option><option value="BV">Bouvet Island</option><option value="BR">Brazil</option><option value="IO">British Indian Ocean Territory</option><option value="BN">Brunei Darussalam</option><option value="BG">Bulgaria</option><option value="BF">Burkina Faso</option><option value="BI">Burundi</option><option value="KH">Cambodia</option><option value="CM">Cameroon</option><option value="CA">Canada</option><option value="CV">Cape Verde</option><option value="KY">Cayman Islands</option><option value="CF">Central African Republic</option><option value="TD">Chad</option><option value="CL">Chile</option><option value="CN">China (Mainland)</option><option value="CX">Christmas Island</option><option value="CC">Cocos (Keeling) Islands</option><option value="CO">Colombia</option><option value="KM">Comoros</option><option value="ZR">Congo, The Democratic Republic Of The</option><option value="CG">Congo, The Republic of Congo</option><option value="CK">Cook Islands</option><option value="CR">Costa Rica</option><option value="CI">Cote D'Ivoire</option><option value="HR">Croatia (local name: Hrvatska)</option><option value="CU">Cuba</option><option value="CY">Cyprus</option><option value="CZ">Czech Republic</option><option value="DK">Denmark</option><option value="DJ">Djibouti</option><option value="DM">Dominica</option><option value="DO">Dominican Republic</option><option value="TP">East Timor</option><option value="EC">Ecuador</option><option value="EG">Egypt</option><option value="SV">El Salvador</option><option value="GQ">Equatorial Guinea</option><option value="ER">Eritrea</option><option value="EE">Estonia</option><option value="ET">Ethiopia</option><option value="FK">Falkland Islands (Malvinas)</option><option value="FO">Faroe Islands</option><option value="FJ">Fiji</option><option value="FI">Finland</option><option value="FR">France</option><option value="FX">France Metropolitan</option><option value="GF">French Guiana</option><option value="PF">French Polynesia</option><option value="TF">French Southern Territories</option><option value="GA">Gabon</option><option value="GM">Gambia</option><option value="GE">Georgia</option><option value="DE">Germany</option><option value="GH">Ghana</option><option value="GI">Gibraltar</option><option value="GR">Greece</option><option value="GL">Greenland</option><option value="GD">Grenada</option><option value="GP">Guadeloupe</option><option value="GU">Guam</option><option value="GT">Guatemala</option><option value="GGY">Guernsey</option><option value="GN">Guinea</option><option value="GW">Guinea-Bissau</option><option value="GY">Guyana</option><option value="HT">Haiti</option><option value="HM">Heard and Mc Donald Islands</option><option value="HN">Honduras</option><option value="HK">Hong Kong</option><option value="HU">Hungary</option><option value="IS">Iceland</option><option value="IN">India</option><option value="ID">Indonesia</option><option value="IR">Iran (Islamic Republic of)</option><option value="IQ">Iraq</option><option value="IE">Ireland</option><option value="IM">Isle of Man</option><option value="IL">Israel</option><option value="IT">Italy</option><option value="JM">Jamaica</option><option value="JP">Japan</option><option value="JEY">Jersey</option><option value="JO">Jordan</option><option value="KZ">Kazakhstan</option><option value="KE">Kenya</option><option value="KI">Kiribati</option><option value="KS">Kosovo</option><option value="KW">Kuwait</option><option value="KG">Kyrgyzstan</option><option value="LA">Lao People's Democratic Republic</option><option value="LV">Latvia</option><option value="LB">Lebanon</option><option value="LS">Lesotho</option><option value="LR">Liberia</option><option value="LY">Libya</option><option value="LI">Liechtenstein</option><option value="LT">Lithuania</option><option value="LU">Luxembourg</option><option value="MO">Macau</option><option value="MK">Macedonia</option><option value="MG">Madagascar</option><option value="MW">Malawi</option><option value="MY">Malaysia</option><option value="MV">Maldives</option><option value="ML">Mali</option><option value="MT">Malta</option><option value="MH">Marshall Islands</option><option value="MQ">Martinique</option><option value="MR">Mauritania</option><option value="MU">Mauritius</option><option value="YT">Mayotte</option><option value="MX">Mexico</option><option value="FM">Micronesia</option><option value="MD">Moldova</option><option value="MC">Monaco</option><option value="MN">Mongolia</option><option value="MNE">Montenegro</option><option value="MS">Montserrat</option><option value="MA">Morocco</option><option value="MZ">Mozambique</option><option value="MM">Myanmar</option><option value="NA">Namibia</option><option value="NR">Nauru</option><option value="NP">Nepal</option><option value="NL">Netherlands</option><option value="AN">Netherlands Antilles</option><option value="NC">New Caledonia</option><option value="NZ">New Zealand</option><option value="NI">Nicaragua</option><option value="NE">Niger</option><option value="NG">Nigeria</option><option value="NU">Niue</option><option value="NF">Norfolk Island</option><option value="KP">North Korea</option><option value="MP">Northern Mariana Islands</option><option value="NO">Norway</option><option value="OM">Oman</option><option value="OTHER">Other Country</option><option value="PK">Pakistan</option><option value="PW">Palau</option><option value="PS">Palestine</option><option value="PA">Panama</option><option value="PG">Papua New Guinea</option><option value="PY">Paraguay</option><option value="PE">Peru</option><option value="PH">Philippines</option><option value="PN">Pitcairn</option><option value="PL">Poland</option><option value="PT">Portugal</option><option value="PR">Puerto Rico</option><option value="QA">Qatar</option><option value="RE">Reunion</option><option value="RO">Romania</option><option value="RU">Russian Federation</option><option value="RW">Rwanda</option><option value="BLM">Saint Barthelemy</option><option value="KN">Saint Kitts and Nevis</option><option value="LC">Saint Lucia</option><option value="MAF">Saint Martin</option><option value="VC">Saint Vincent and the Grenadines</option><option value="WS">Samoa</option><option value="SM">San Marino</option><option value="ST">Sao Tome and Principe</option><option value="SA">Saudi Arabia</option><option value="SCT">Scotland</option><option value="SN">Senegal</option><option value="SRB">Serbia</option><option value="SC">Seychelles</option><option value="SL">Sierra Leone</option><option value="SG">Singapore</option><option value="SK">Slovakia (Slovak Republic)</option><option value="SI">Slovenia</option><option value="SB">Solomon Islands</option><option value="SO">Somalia</option><option value="ZA">South Africa</option><option value="SGS">South Georgia and the South Sandwich Islands</option><option value="KR">South Korea</option><option value="SS">South Sudan</option><option value="ES">Spain</option><option value="LK">Sri Lanka</option><option value="SH">St. Helena</option><option value="PM">St. Pierre and Miquelon</option><option value="SD">Sudan</option><option value="SR">Suriname</option><option value="SJ">Svalbard and Jan Mayen Islands</option><option value="SZ">Swaziland</option><option value="SE">Sweden</option><option value="CH">Switzerland</option><option value="SY">Syrian Arab Republic</option><option value="TW">Taiwan</option><option value="TJ">Tajikistan</option><option value="TZ">Tanzania</option><option value="TH">Thailand</option><option value="TLS">Timor-Leste</option><option value="TG">Togo</option><option value="TK">Tokelau</option><option value="TO">Tonga</option><option value="TT">Trinidad and Tobago</option><option value="TN">Tunisia</option><option value="TR">Turkey</option><option value="TM">Turkmenistan</option><option value="TC">Turks and Caicos Islands</option><option value="TV">Tuvalu</option><option value="UG">Uganda</option><option value="UA">Ukraine</option><option value="AE">United Arab Emirates</option><option value="UK">United Kingdom</option><option value="US">United States</option><option value="UM">United States Minor Outlying Islands</option><option value="UY">Uruguay</option><option value="UZ">Uzbekistan</option><option value="VU">Vanuatu</option><option value="VA">Vatican City State (Holy See)</option><option value="VE">Venezuela</option><option value="VN">Vietnam</option><option value="VG">Virgin Islands (British)</option><option value="VI">Virgin Islands (U.S.)</option><option value="WF">Wallis And Futuna Islands</option><option value="EH">Western Sahara</option><option value="YE">Yemen</option><option value="YU">Yugoslavia</option><option value="ZM">Zambia</option><option value="EAZ">Zanzibar</option><option value="ZW">Zimbabwe</option></select>
                  </div>
              </div>
            </div>
            
             <div class="form-group col-md-6">
              <span class="required-lbl">* </span><label class="control-label" for="shippingstate">Shipping State</label>
              <div class="controls">
                <select id="shippingstate" name="shippingstate" class="input-xlarge">
                  <option>Please Select</option>
                  <option>Australian Capital Territory</option>
                  <option>New South Wales</option>
                  <option>Northern Territory</option>
                  <option>Queensland</option>
                  <option>South Australia</option>
                  <option>Tasmania</option>
                  <option>Victoria</option>
                  <option>Western Australia</option>
                  <option>Other</option>
                </select>
              </div>
            </div>
            
            <div class="form-group col-md-6">
              <span class="required-lbl">* </span><label class="control-label" for="shippingcity">Shipping City</label>
              <div class="controls">
                <input id="shippingcity" name="shippingcity" type="text" placeholder="" class="form-control" required="">
              </div>
            </div>
            
            <div class="form-group col-md-6">
              <span class="required-lbl">* </span><label class="control-label" for="postcode">Post Code</label>
              <div class="controls">
                <input id="postcode" name="postcode" type="text" placeholder="" class="form-control" required="">
              </div>
            </div>
            
            <hr/>
            
            <div class="form-group col-md-12 bg-primary">
             <div class="control-group">
                  
                  <div class="controls">
                  <label class="control-label" for="billinginformation">Billing Information</label>
                  <label class="checkbox" for="billinginformation">
                      <input type="checkbox" name="billinginformation" id="billinginformation" value="Use Shipping Address">
                      Use Shipping Address
                    </label>
                  </div>
                </div>
            </div>
            
            <div class="form-group col-md-6">
                <div class="control-group">
                    <span class="required-lbl">* </span><label class="control-label" for="firstnameonaccount">First Name on Account</label>
                    <div class="controls">
                        <input id="firstnameonaccount" name="firstnameonaccount" type="text" placeholder="" class="form-control" required="">
                    </div>
                </div>
            </div>
            
            <div class="form-group col-md-6">
                <div class="control-group">
                    <span class="required-lbl">* </span><label class="control-label" for="lastnameonaccount">Last Name on Account</label>
                    <div class="controls">
                        <input id="lastnameonaccount" name="lastnameonaccount" type="text" placeholder="" class="form-control" required="">
                    </div>
                </div>
            </div>
            
            <div class="form-group col-md-6">
                <div class="control-group">
                    <span class="required-lbl">* </span><label class="control-label" for="cardnumber">Card Number</label>
                    <div class="controls">
                        <input id="cardnumber" name="cardnumber" type="text" placeholder="" class="form-control" required="">
                    </div>
                </div>
            </div>
            
            <div class="form-group col-md-6" style="height: 60px;">
				<a href="http://www.credit-card-logos.com"><img alt="<br />
<b>Notice</b>:  Undefined variable: alt_tag in <b>/home/ccl606/public_html/index.html</b> on line <b>99</b><br />
" title="<br />
<b>Notice</b>:  Undefined variable: alt_tag in <b>/home/ccl606/public_html/index.html</b> on line <b>99</b><br />
" src="http://www.credit-card-logos.com/images/multiple_credit-card-logos-1/credit_card_logos_visa_mc_amex_discover_paypal_sm.gif" width="254" height="30" border="0" /></a>
            </div>
            
             <div class="form-group col-md-6 card-expiry">
                <div class="control-group col-md-4">
                    <span class="required-lbl">* </span><label class="control-label" for="cvv">CVV</label>
                    <div class="controls">
                        <input id="cvv" name="cvv" type="text" placeholder="" class="form-control" required="">
                    </div>
                </div>
                <div class="control-group col-md-4">
                   <div class="control-group">
                      <label class="control-label" for="month">Expiration Date</label>
                      <div class="controls">
                        <select id="month" name="month" class="input-xlarge">
                          <option>Select Month</option>
                          <option>01</option>
                          <option>02</option>
                          <option>03</option>
                          <option>04</option>
                          <option>05</option>
                          <option>06</option>
                          <option>07</option>
                          <option>08</option>
                          <option>09</option>
                          <option>10</option>
                          <option>11</option>
                          <option>12</option>
                        </select>
                      </div>
                    </div>
                </div>
                
                <div class="control-group col-md-4">
                    <div class="control-group">
                      <label class="control-label" for="selectyear"></label>
                      <div class="controls">
                        <select id="selectyear" name="selectyear" class="input-xlarge">
                          <option>Select Year</option>
                          <option>14</option>
                          <option>15</option>
                          <option>16</option>
                          <option>17</option>
                          <option>18</option>
                          <option>19</option>
                          <option>20</option>
                          <option>21</option>
                          <option>22</option>
                          <option>23</option>
                          <option>24</option>
                          <option>25</option>
                          <option>26</option>
                          <option>27</option>
                          <option>28</option>
                          <option>29</option>
                          <option>30</option>
                        </select>
                      </div>
                    </div>
                </div>
                
            </div>
            
            <div class="form-group col-md-6">
            </div>
            
        <hr/>
        
        <div class="form-group col-md-12 bg-primary">
            <label class="control-label" for="billinginformation">Billing Address</label>
        </div>
        
        <div class="form-group col-md-6">
              <span class="required-lbl">* </span><label class="control-label" for="billingaddress1">Address 1</label>
              <div class="controls">
                <input id="billingaddress1" name="billingaddress1" type="text" placeholder="" class="form-control" required="">
              </div>
            </div>
            
            <div class="form-group col-md-6">
              <label class="control-label" for="billingaddress2">Address 2</label>
              <div class="controls">
                <input id="billingaddress2" name="billingaddress2" type="text" placeholder="" class="form-control" required="">
              </div>
            </div>
            
            <div class="form-group col-md-6">
              <span class="required-lbl">* </span><label class="control-label" for="billingcountry">Billing Country</label>
              <div class="controls">
                 <div class="controls">
                    <select id="billingcountry" name="billingcountry" class="input-xlarge">
                      <option>Please Select</option>
                      <option>Australia</option>
                    </select>
                  </div>
              </div>
            </div>
            
             <div class="form-group col-md-6">
              <span class="required-lbl">* </span><label class="control-label" for="billingstate">Billing State</label>
              <div class="controls">
                <select id="billingstate" name="billingstate" class="input-xlarge">
                  <option>Please Select</option>
                  <option>Australian Capital Territory</option>
                  <option>New South Wales</option>
                  <option>Northern Territory</option>
                  <option>Queensland</option>
                  <option>South Australia</option>
                  <option>Tasmania</option>
                  <option>Victoria</option>
                  <option>Western Australia</option>
                  <option>Other</option>
                </select>
              </div>
            </div>
            
            <div class="form-group col-md-6">
              <span class="required-lbl">* </span><label class="control-label" for="billingcity">Billing City</label>
              <div class="controls">
                <input id="billingcity" name="billingcity" type="text" placeholder="" class="form-control" required="">
              </div>
            </div>
            
            <div class="form-group col-md-6">
              <span class="required-lbl">* </span><label class="control-label" for="billingpostcode">Post Code</label>
              <div class="controls">
                <input id="billingpostcode" name="billingpostcode" type="text" placeholder="" class="form-control" required="">
              </div>
            </div>
            
            <div class="form-group col-md-12 bg-primary">
                <label class="control-label" for="contactinformation">Contact Information:</label>
            </div>
            
            <div class="form-group col-md-6">
              <span class="required-lbl">* </span><label class="control-label" for="emailaddress">Email Address</label>
              <div class="controls">
                <input id="email" name="email" type="email" placeholder="" class="form-control" required="">
              </div>
            </div>
            
            <div class="form-group col-md-6">
              <label class="control-label" for="phone">Phone</label>
              <div class="controls">
                <input id="phone" name="phone" type="number" placeholder="" class="form-control" required="">
              </div>
            </div>
            
            <div class="form-group col-md-6">
              <label class="control-label" for="organization">Organization</label>
              <div class="controls">
                <input id="organization" name="organization" type="text" placeholder="" class="form-control" required="">
              </div>
            </div>
            
            <div class="form-group col-md-12 bg-primary">
                <label class="control-label" for="contactinformation">Additional Information:</label>
            </div>
            
            <label>* To avoid duplication, Type "YES" if you are a current subscriber wishing to extend your subscription OR "NO" if you don’t have an active subscription</label>
            
            <div class="form-group col-md-6">
              <div class="controls">
                <input id="additionalinfo" name="additionalinfo" type="text" placeholder="" class="form-control" required="">
              </div>
            </div>
            
            <div class="form-group col-md-12">
                <div class="control-group">
                  <label class="control-label" for="iaccept"></label>
                  <div class="controls">
                    <label class="checkbox" for="iaccept-0">
                      <input type="checkbox" name="iaccept" id="iaccept-0" value="I accept the Teams and conditions">
                      I accept the <a href="">Teams and conditions</a>
                    </label>
                  </div>
                </div>
            </div>
            
            <div class="form-group col-md-12">
                <div class="control-group confirm-btn">
                  <label class="control-label" for="placeorderbtn"></label>
                  <div class="controls">
                    <button id="placeorderbtn" name="placeorderbtn" class="btn btn-primary">Place My Order</button>
                  </div>
                </div>
            </div>
            
        </div>
	</div>
</div>
</body>

</html>