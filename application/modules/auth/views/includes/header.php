<!DOCTYPE html>
<html lang="en" ng-app>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> rbgroup | Admin </title>
<link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url()?>assets/css/londinium-theme.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url()?>assets/css/styles.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url()?>assets/css/icons.min.css" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
<link rel="icon" href="<?php echo base_url()?>resources/favicon.png" type="image/x-icon"/>
<link rel="shortcut icon" href="<?php echo base_url()?>resources/favicon.png" type="image/x-icon"/>
<script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<script>var base_url= "<?php echo base_url()?>";</script>
</head>
<body class="sidebar-wide">
<!-- Navbar -->
<div class="navbar navbar-inverse" role="navigation">
<div class="navbar-header"><a class="navbar-brand" href="<?php echo site_url().admin?>home">
  <img src="<?php echo base_url(IMAGES)?>/logo.png" height="28" alt="Londinium"></a><a class="sidebar-toggle"><i class="icon-paragraph-justify2"></i></a>
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-icons"><span class="sr-only">Toggle navbar</span><i class="icon-grid3"></i></button>
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar"><span class="sr-only">Toggle navigation</span><i class="icon-paragraph-justify2"></i></button>
</div>
<ul class="nav navbar-nav navbar-right collapse" id="navbar-icons">    

<li class="user dropdown"><a class="dropdown-toggle" data-toggle="dropdown">
<!-- <img src="<?php echo base_url()?>assets/images/demo/users/face1.png" alt=""> -->
<span>Settings</span> <i class="caret"> </i></a>
<ul class="dropdown-menu dropdown-menu-right icons-right"><!-- 
<li><a href="#"><i class="icon-user"></i> Profile</a></li> -->
<li><a href="<?php echo site_url()?>auth/change_password"><i class="icon-cog"></i> Password Change</a></li>
<li><a href="<?php echo site_url()?>auth/logout"><i class="icon-exit"></i> Logout</a></li>
</ul>
</li>
</ul>
</div>
<!-- /navbar -->
<!-- Page container -->
<div class="page-container">
<!-- Sidebar -->
<div class="sidebar collapse">
<div class="sidebar-content">
<!-- Main navigation -->
<ul class="navigation">
<li id="dashboard"><a href="<?php echo site_url().admin?>home"><span>Dashboard</span> <i class="icon-screen2"></i></a></li>
<li id="master_cms"><a href="#" class="expand"><span>CMS</span><i class="icon-cog3"></i></a>
  <ul>  
    <li><a href="<?php echo site_url().admin?>index/sliders"><span>Sliders</span></a></li>         
    <li><a href="<?php echo site_url().admin?>index/about_us"><span>About Us</span></a></li>
    <li><a href="<?php echo site_url().admin?>index/goal"><span>Goal</span></a></li>
    <li><a href="<?php echo site_url().admin?>index/vision"><span>Vision</span></a></li>
    <li><a href="<?php echo site_url().admin?>index/mission"><span>Mission</span></a></li>
    <li><a href="<?php echo site_url().admin?>index/terms"><span>Terms and Conditions</span></a></li>
    <li><a href="<?php echo site_url().admin?>index/wear_and_care"><span>Wear & Care</span></a></li>
    <li><a href="<?php echo site_url().admin?>index/faq_queries"><span>FAQ's</span></a></li>
    <li><a href="<?php echo site_url().admin?>index/returns_and_refunds"><span>Returns & Refunds</span></a></li>
    <li><a href="<?php echo site_url().admin?>index/warranty_policy"><span>Warranty Policy</span></a></li>
    <li><a href="<?php echo site_url().admin?>index/app_and_dashboard"><span>App & Dashboard</span></a></li>
  </ul>
</li>

<li id="categories"><a href="<?php echo site_url().admin?>categories"><span>Categories</span> <i class="icon-home"></i></a></li> 

<li id="specification"><a href="<?php echo site_url().admin?>specifications"><span>Specification</span> <i class="icon-home"></i></a></li>

<li id="products"><a href="#" class="expand"><span>Products</span><i  class="icon-yin-yang"></i></a>
<ul>

<li><a href="<?php echo site_url().admin?>products/home_page/1"><span>Top Products</span></a></li>    
<?php
foreach ($productmenu as $smkey => $smvalue) {
$mainmenu = explode("@", $smkey);
$subcatcount = count($smvalue);
    foreach ($smvalue as $key1 => $value1) {
      $sm_subpart = explode("@", $key1);
      $subcatli_style = ($subcatcount === 3)?"col-sm-4 megamenu-content":"col-sm-3 megamenu-content";
      $urltype = ($sm_subpart[3]=="support")?"sub":"main";
      ?>
      <li><a href="<?php echo site_url().admin?>products/index/<?php echo $sm_subpart[2]; ?>"><span><?php echo $mainmenu[1]." - ".$sm_subpart[1]; ?></span></a></li>
      
      <?php
    }
}
?>       
</ul>
</li>


<li id="order_report"><a href="#" class="expand"><span>Orders Details</span><i  class="icon-arrow-down10"></i></a><ul>
  <li id="order_report"><a href="<?php echo site_url().admin?>order_details/index/1"><span>Recent orders</span> <i></i></a></li> 
  <li id="order_report"><a href="<?php echo site_url().admin?>order_details/index/3"><span>Shipping orders</span> <i></i></a></li>
  <li id="order_report"><a href="<?php echo site_url().admin?>order_details/index/5"><span>Delivered</span> <i></i></a></li>
  <li id="order_report"><a href="<?php echo site_url().admin?>order_details/index/6"><span>Cancelled</span> <i></i></a></li>          
  <li id="order_report"><a href="<?php echo site_url().admin?>order_details/index/7"><span>Return order</span> <i></i></a></li>          
  <li id="order_report"><a href="<?php echo site_url().admin?>order_details/index/0"><span>Payment failed </span> <i></i></a></li>          
</ul>
</li>


<li id="regusers_m"><a href="<?php echo site_url().admin?>regusers"><span>Registered Users</span> <i class="icon-user3"></i></a></li>

<li id="zipcode"><a href="<?php echo site_url().admin?>zipcode/city"><span>Zipcode</span> <i  class="icon-file-zip"></i></a></li>
<li id="contactus"><a href="<?php echo site_url().admin?>contact"><span>Contact Us</span> <i  class="icon-coin"></i></a></li>

</ul>
<!-- /main navigation -->
</div>
</div>
<!-- /sidebar -->
<!-- Page content -->
<div class="page-content">
