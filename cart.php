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
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.7/angular.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/handlebars.js/2.0.0/handlebars.min.js"></script>
	<script src="assets/js/checkout.js"></script>
	<script src="assets/js/jquery.bootstrap-touchspin.js"></script>
	<script src="assets/js/helpers.js"></script>
	
</head>


</body>

<div class="container main-container headerOffset">
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
 
<div class="row">
<div class="col-lg-9 col-md-9 col-sm-7">
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
<div class="pull-left"><a href="<?php echo HOME_PAGE?>" class="btn btn-default"> <i class="fa fa-arrow-left"></i> &nbsp; Continue shopping </a></div>
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
<div class="table-block" id="order-detail-content"><a class="btn btn-primary btn-lg btn-block " title="checkout" href="checkout-0.html" style="margin-bottom:20px"> Proceed to
checkout &nbsp; <i class="fa fa-arrow-right"></i> </a>
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

</body>

</html>