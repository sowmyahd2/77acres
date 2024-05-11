<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <title>RB Group - Real Estate | Dashboard</title>
      <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
      <!-- bootstrap 3.0.2 -->
      <link href="<?php echo base_url(ACSS); ?>/
bootstrap.min.css" rel="stylesheet" type="text/css" />
      <!-- font Awesome -->
      <link href="<?php echo base_url(ACSS); ?>/
font-awesome.min.css" rel="stylesheet" type="text/css" />
      <!-- Ionicons -->
      <link href="<?php echo base_url(ACSS); ?>/
ionicons.min.css" rel="stylesheet" type="text/css" />
      <!-- Morris chart -->
      <link href="<?php echo base_url(ACSS); ?>/
morris/morris.css" rel="stylesheet" type="text/css" />
      <!-- jvectormap -->
      <link href="<?php echo base_url(ACSS); ?>/
jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
      <!-- fullCalendar -->
      <link href="<?php echo base_url(ACSS); ?>/
fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
      <!-- Daterange picker -->
      <link href="<?php echo base_url(ACSS); ?>/
daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
      <!-- bootstrap wysihtml5 - text editor -->
      <link href="<?php echo base_url(ACSS); ?>/
bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
      <!-- Theme style -->
      <link href="<?php echo base_url(ACSS); ?>/
AdminLTE.css" rel="stylesheet" type="text/css" />
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
      <![endif]-->
      <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
      <link rel="icon" href="<?php echo base_url(IMAGES); ?>/favicon.png">
      <style type="text/css">
         .error {
            color:red !important;
         }
      </style>
<!-- <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script> -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
      <!-- jQuery UI 1.10.3 -->
      <script src="<?php echo base_url(AJS); ?>/
jquery-ui-1.10.3.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
   </head>
   <body class="skin-black">
    <header class="header">
         <a href="<?php echo site_url().admin; ?>" class="logo">
            <!-- Add the class icon to your logo image or logo icon to add the margining -->
           RB Group - Real Estate
         </a>
         <!-- Header Navbar: style can be found in header.less -->
         <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </a>
            <div class="navbar-right">
               <ul class="nav navbar-nav">
                  <!-- User Account: style can be found in dropdown.less -->
                  <li class="dropdown user user-menu">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                     <i class="glyphicon glyphicon-user"></i>
                     <span>RB Group - Real Estate <i class="caret"></i></span>
                     </a>
                     <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header bg-navy">
                           <img src="<?php echo base_url(AIMAGES); ?>/
avatar.png" class="img-circle" alt="User Image" />
                           <p>
                           RB Group - Admin
                              <small>RB Group - Real Estate</small>
                           </p>
                        </li>
                        <!-- Menu Body -->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                           <div class="pull-left">
                              <a href="<?php echo site_url()?>auth/change_password" class="btn bg-navy margin btn-flat">Password Change</a>
                           </div>
                           <div class="pull-right">
                              <a href="<?php echo site_url()?>auth/logout" class="btn bg-navy margin btn-flat">Sign out</a>
                           </div>
                        </li>
                     </ul>
                  </li>
               </ul>
            </div>
         </nav>
      </header>
    <div class="wrapper row-offcanvas row-offcanvas-left">
    <aside class="left-side sidebar-offcanvas">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
               <!-- Sidebar user panel -->
               <div class="user-panel">
                  <div class="pull-left image">
                     <img src="<?php echo base_url(AIMAGES); ?>/
avatar.png" class="img-circle" alt="User Image" />
                  </div>
                  <div class="pull-left info">
                     <p>Hello, Admin</p>
                     <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                  </div>
               </div>
              
               <!-- sidebar menu: : style can be found in sidebar.less -->
               <ul class="sidebar-menu">
                  <li class="" id="dashboardtab">
                     <a href="<?php echo site_url().admin; ?>
">
                     <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                     </a>
                  </li>
                  <li class="treeview" id="homecontent">
                     <a href="#">
                     <i class="fa fa-bar-chart-o"></i>
                     <span>Home</span>
                     <i class="fa fa-angle-left pull-right"></i>
                     </a>
                     <ul class="treeview-menu">
                        <!-- <li><a href="<?php echo site_url().admin?>homecontent/index/sliders"><i class="fa fa-angle-double-right"></i>Sliders </a></li> -->         
                        <li><a href="<?php echo site_url().admin?>homecontent/index/about_us"><i class="fa fa-angle-double-right"></i>About Us </a></li>
                        <li><a href="<?php echo site_url().admin?>homecontent/index/why_choose_us"><i class="fa fa-angle-double-right"></i>Why Choose Us </a></li>
                        <li><a href="<?php echo site_url().admin?>homecontent/index/terms"><i class="fa fa-angle-double-right"></i>Terms and Conditions </a></li>
                        <li><a href="<?php echo site_url().admin?>homecontent/index/looking_for"><i class="fa fa-angle-double-right"></i>Are You Looking For? </a></li>
                        <!-- <li><a href="<?php echo site_url().admin?>homecontent/index/faq_queries"><i class="fa fa-angle-double-right"></i>FAQ's </a></li> -->
                       <!--  <li><a href="<?php echo site_url().admin?>homecontent/index/returns_and_refunds"><i class="fa fa-angle-double-right"></i>Returns & Refunds </a></li> -->
                        <li><a href="<?php echo site_url().admin?>homecontent/index/privacy_policy"><i class="fa fa-angle-double-right"></i>Privacy Policy </a></li>
                        <li><a href="<?php echo site_url().admin?>homecontent/index/showcase_your_property"><i class="fa fa-angle-double-right"></i>Showcase Your Property </a></li>
                        <li><a href="<?php echo site_url().admin?>homecontent/index/showcase_benifts"><i class="fa fa-angle-double-right"></i>Showcase Benfits </a></li>
                        <li><a href="<?php echo site_url().admin?>affordableplan"><i class="fa fa-angle-double-right"></i>Affordable Plan </a></li>
                        <li><a href="<?php echo site_url().admin?>affordableplandetails"><i class="fa fa-angle-double-right"></i>Affordable Plan Details</a></li>
                        <!-- <li><a href="<?php echo site_url().admin?>homecontent/index/customer_feedback"><i class="fa fa-angle-double-right"></i>Customer's Feedback </a></li> -->
                     </ul>
                  </li>
                  <li class="" id="memberstab">
                     <a href="<?php echo site_url().admin?>members">
                     <i class="fa fa-sign-in"></i> <span>Manage Members</span>
                     </a>
                  </li>
                  <li class="" id="specification">
                     <a href="<?php echo site_url().admin?>specifications">
                     <i class="fa fa-university"></i> <span>Listing Specification</span>
                     </a>
                  </li>
               <!--  <li class="" id="categories">
                     <a href="<?php echo site_url().admin?>categories">
                     <i class="fa fa-bars"></i> <span>Category</span>
                     </a>
                  </li> -->
                  <li class="treeview" id="categories">
                     <a href="<?php echo site_url().admin?>categories">
                     <i class="fa fa-bars"></i> <span>Category</span>
                     <i class="fa fa-angle-left pull-right"></i>
                     </a>
                     <ul class="treeview-menu">
                        
                      
                        <li><a href="<?php echo site_url().admin?>categories/index/1"><span>Buy</span></a></li>
                        <li><a href="<?php echo site_url().admin?>categories/index/2"><span>Rent</span></a></li>
                        <li><a href="<?php echo site_url().admin?>categories/index/3"><span>Lease</span></a></li>
                     
                        
                     </ul>
                  </li>
                  <li class="treeview" id="property_cms">
                     <a href="#">
                     <i class="fa fa-life-ring"></i>
                     <span>Property Add On's</span>
                     <i class="fa fa-angle-left pull-right"></i>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="<?php echo site_url().admin?>authority"><span>Real Estate Regulatory Authority</span></a></li>
                        <li><a href="<?php echo site_url().admin?>propertytype"><span>Property Type</span></a></li>
                        <li><a href="<?php echo site_url().admin?>propertyage"><span>Property Age</span></a></li>
                        <li><a href="<?php echo site_url().admin?>propertystatus"><span>Property Status</span></a></li>
                        <li><a href="<?php echo site_url().admin?>propertyownership"><span>Property Ownership</span></a></li>
                        <li><a href="<?php echo site_url().admin?>propertyareatype"><span>Property Area Type</span></a></li>
                     </ul>
                  </li>
                  <li class="treeview" id="products">
                     <a href="#">
                     <i class="fa fa-database"></i>
                     <span>Property (Add/View)</span>
                     <i class="fa fa-angle-left pull-right"></i>
                     </a>
                     <ul class="treeview-menu">
                         <li><a href="<?php echo site_url().admin?>products/index/all"><span>All</span></a></li>
                        <?php
                     
                        if(is_array($productmenu) && count($productmenu)){
                        foreach ($productmenu as $smkey => $smvalue) {
                        $mainmenu = explode("@", $smkey);
                        $subcatcount = count($smvalue);
                        if(is_array($smvalue) && count($smvalue)){
                            foreach ($smvalue as $key1 => $value1) {
                              $sm_subpart = explode("@", $key1);
                              ?>
                              <li><a href="<?php echo site_url().admin?>products/index/<?php echo $sm_subpart[2]; ?>"><span><?php echo Ucfirst($sm_subpart[2]); ?></span></a></li>
                              <?php
                            }
                        } else {
                          ?>
                              <li><a href="<?php echo site_url().admin?>products/index/<?php echo $mainmenu[2]; ?>"><span><?php echo $mainmenu[1]; ?></span></a></li>
                              <?php
                        }
                            
                        }
                        }
                        ?> 
                        <li><a href="<?php echo site_url().admin?>products/home_page/1"><span>Featured Property</span></a></li>
                        <li><a href="<?php echo site_url().admin?>products/home_page/2"><span>Premium Property</span></a></li>
                     </ul>
                  </li>
                  <li class="" id="propertyads">
                     <a href="<?php echo site_url().admin?>propertyads">
                     <i class="fa fa-barcode"></i> <span>Property Ads</span>
                     </a>
                  </li>
                  <li id="locationtab" class="treeview">
                     <a href="#">
                     <i class="fa fa-gift"></i> <span>Location</span>
                     <i class="fa fa-angle-left pull-right"></i>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="<?php echo site_url().admin?>states"><i class="fa fa-angle-double-right"></i> States</a></li>
                        <li><a href="<?php echo site_url().admin?>cities"><i class="fa fa-angle-double-right"></i> Cities</a></li>
                        <li><a href="<?php echo site_url().admin?>areas"><i class="fa fa-angle-double-right"></i> Area</a></li>
                        <li><a href="<?php echo site_url().admin?>majorcities"><i class="fa fa-angle-double-right"></i> Major Cities</a></li>
                     </ul>
                  </li>
                  <li class="" id="regusers">
                     <a href="<?php echo site_url(admin."regusers"); ?>
">
                     <i class="fa fa-users"></i> <span>Users</span>
                     </a>
                  </li>
                  
                  <li id="enquerytab" class="treeview">
                     <a href="#">
                     <i class="fa fa-headphones"></i> <span>Enquery</span>
                     <i class="fa fa-angle-left pull-right"></i>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="<?php echo site_url().admin?>enquery"><i class="fa fa-angle-double-right"></i> General Enquery</a></li>
                        <li><a href="<?php echo site_url().admin?>proenquiry"><i class="fa fa-angle-double-right"></i> Property Enquery</a></li>
                      
                     </ul>
                  </li>
                  <li class="" id="contactus">
                     <a href="<?php echo site_url(admin."contact"); ?>
">
                     <i class="fa fa-phone"></i> <span>Contact Us</span>
                     </a>
                  </li>                 
                
                  
               </ul>
            </section>
            <!-- /.sidebar -->
         </aside>