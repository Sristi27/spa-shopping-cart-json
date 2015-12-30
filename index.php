<?php
session_start();
include_once 'Dbconnect.php';
require_once 'config.php';

?>
<!DOCTYPE html>
<html>

<head lang="en">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">

	<title><?php SITE_TITLE ?></title>

	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet">
	<link href="assets/css/styles.css" rel="stylesheet">
	<link href="assets/css/cart.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
	<link href="https://ecommerce.shopify.com/assets/application-0a13ca455045117aaf86d874d80b32ce.css" rel="stylesheet">
	
	<link href="https://ecommerce.shopify.com/assets/m_a_shim-df1141cbfe8f18f5250f0c67d5427ac5.css" rel="stylesheet">
	
	
</head>

<body>

<div class="shb-nav-top">
  <div class="page-width">
  <a href="index.php" class="shb-nav-item hide--mobile"><?php SITE_TITLE ?></a>
  
  <div class="shb-user shb-logged-out">
  
  <?php if(isset($_SESSION['user'])!="") : ?>
  
			<a class="shb-user account">My Account</a>
			<div class="submenu">
				<ul class="root">
				<li ><a class="submenu_item" href="#Orders">Orders</a></li>
				<li ><a href="#Profile">Profile</a></li>
				<li ><a href="#feedback">Send Feedback</a></li>
				</ul>
			</div>
	<?php else: ?>
	
        <a href="login.php">Login</a>
        <a href="/accounts/new" class="shb-button shb-nav-last-child">Register</a>
	<?php endif; ?>
		
      </div>

  </div>
</div>

<div id="SiteNavContainer" role="banner">
  <div class="marketing-nav-wrapper is-moved-by-drawer" role="navigation" aria-label="Main Navigation">
    <nav class="marketing-nav marketing-nav__primary" id="ShopifyMainNav">
      <a href="#Main" class="in-page-link skip-to-main visuallyhidden focusable" data-ga-action="Skip to content" data-ga-event="Main Nav">Skip to Content</a>

      <div class="page-width">
          <button type="button" class="marketing-nav__hamburger js-drawer-open-left" aria-controls="NavDrawer" aria-expanded="false">
            <span class="visuallyhidden">Mobile Navigation</span>
          </button>

        <div class="marketing-nav__logo">
            <a href="/" class="icon marketing-nav__logo--full-color">
              <span class="visuallyhidden">Home</span>
</a>        </div>

        <ul class="marketing-nav__items display--desktop">
              
<li>

      <a href="https://www.shopify.com/guides" class="marketing-nav__item ">Guides</a>

</li>

    
<li>

      <a href="https://www.shopify.com/blog" class="marketing-nav__item ">Blog</a>

</li>

    
<li>

      <a href="/forums" class="marketing-nav__item ">Forums</a>

</li>

    
<li>

      <a href="https://www.shopify.com/success-stories" class="marketing-nav__item ">Stories</a>

</li>

<li class="nav__item navbar-right">
	<a href="#" id="cart"><i class="fa fa-shopping-cart"></i> Cart  
	<span class="cartcount"></span></a>
</li>

</ul>

        <ul class="marketing-nav__items marketing-nav__user">
          
        </ul>
      </div>
    </nav>

  </div>

    <div id="NavDrawer" class="drawer drawer--left">
  <div class="drawer__inner">
    <div class="drawer__close js-drawer-close">
      <button class="icon icon-close"><span class="visuallyhidden">Close Menu</span></button>
    </div>

    <nav role="navigation" aria-label="Main Site Navigation">
      <ul class="drawer__items drawer__items--primary">
          
<li class="nav__item">
    <a href="https://www.shopify.com/guides">Guides</a>
</li>

  
<li class="nav__item">
    <a href="https://www.shopify.com/blog">Blog</a>
</li>

  
<li class="nav__item">
    <a href="/forums">Forums</a>
</li>

  
<li class="nav__item">
    <a href="https://www.shopify.com/success-stories">Stories</a>
</li>

<li class="nav__item">
	<a href="#" id="cart"><i class="fa fa-shopping-cart"></i> Cart  
	<span class="badge"></span></a>
</li>

 </ul>
	  
	  
    </nav>
  </div>
</div>

</div>

	<div id="PageContainer">
	
	<section class="top-banner">
		
	</section>
	
	<div class="wrapper clearfix">
		<div class="page-width">
		<div id="main-content" class="grid-container" role="main">
			<div id="spinner" style="display:none; overflow:hidden">
			</div>
			
			<div class="all-products page">

				<div class="filters">
					<form>

						<div class="filter-criteria">
							<span>Size</span>
							<label><input type="checkbox" name="manufacturer" value="small">S</label>
							<label><input type="checkbox" name="manufacturer" value="medium">M</label>
							<label><input type="checkbox" name="manufacturer" value="large">L</label>
							<label><input type="checkbox" name="manufacturer" value="xl">XL</label>
							<label><input type="checkbox" name="manufacturer" value="2xl">2XL</label>
						
						</div>

						<div class="filter-criteria">
							<span>Dress Trends</span>
							<label><input type="checkbox" value="16" name="storage">16 GB</label>
							<label><input type="checkbox" value="32" name="storage">32 GB</label>
						</div>

						<div class="filter-criteria">
							<span>OS</span>
							<label><input type="checkbox" value="android" name="os">Android</label>
							<label><input type="checkbox" value="ios" name="os">iOS</label>
							<label><input type="checkbox" value="windows" name="os">Windows</label>
						</div>

						<div class="filter-criteria">
							<span>Camera</span>
							<label><input type="checkbox" value="5" name="camera">5 Mpx</label>
							<label><input type="checkbox" value="8" name="camera">8 Mpx</label>
							<label><input type="checkbox" value="12" name="camera">12 Mpx</label>
							<label><input type="checkbox" value="15" name="camera">15 Mpx</label>
						</div>

						<button>Clear filters</button>

					</form>

				</div>
	<div class="inside_products_list">
				<ul class="products-list">
					<script id="products-template" type="x-handlebars-template">​
					
						{{#each this}}
						
							<li data-index="{{id}}">
								<div class='clickable'>
									<!--<a href="#" class="product-photo"><img src="{{image_link}}" height="130" alt="{{image_alt}}"/></a>-->
									<h5><a href="{{product_link}}">{{description}}</a></h5>
									<p class="product-price">USD ${{price}} </p>
									<ul class="product-description">
									</ul>
								</div>
								<button id="btnCart" data-product_id="{{id}}">Add to Cart!</button>
							</li>
							
						{{/each}}
					</script>
				</ul>
			</div>
			
			</div>


			<div class="single-product page">

				<div class="overlay"></div>

				<div class="preview-large">
					<img src=""/>
					<span class="close">×</span>
					<p class="product-description"></p>
					<p class="product-price"></p>
					<button id="btnCart">Add to Cart!</button>
				</div>

			</div>

			<div class="error page">
				<h3>Sorry, something went wrong :(</h3>
			</div>

		</div>
		
	</div>
	</div>
</div><!-- end PageContainer-->

	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/handlebars.js/2.0.0/handlebars.min.js"></script>
	<script src="assets/js/script.js"></script>
	<script src="assets/js/init_login_view.js"></script>
	<script src="assets/js/helpers.js"></script>


</body>
</html>
