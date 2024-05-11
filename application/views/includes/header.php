<!DOCTYPE html>
<html lang="en">

<head>
    <style>
#custom-search-input{
        padding: 10px !important;
        border: 1px solid #955b5b;
    border-radius: 15px !important;
    background-color:white;
   
}
.sticky {
  position: fixed;
  top: 0;
  width: 100%;
}

.sticky + .content {
  padding-top: 102px;
}
@media only screen and (max-width: 767px) {
    .main-header .header-lower .logo {
        position: relative;
        max-width: 70%;
    
    }
}
@media only screen and (max-width: 480px) {
    .navigation ul li{
    padding:0px !important;
}
.navigation ul li a{
    padding:0px !important;
}
}

</style>
	<meta charset="utf-8">
	<title><?php echo isset($page_title)?$page_title:'77 Acres - Real Estate'; ?></title>
	<!-- Stylesheets -->
	<link href="<?php echo base_url(CSS); ?>/bootstrap.css" rel="stylesheet">
	<link href="<?php echo base_url(CSS); ?>/bootstrap-select.min.css" rel="stylesheet">
	<link href="<?php echo base_url(CSS); ?>/bootstrap-multiselect.css" rel="stylesheet">
	<link href="<?php echo base_url(PLUGINS); ?>/revolution/css/settings.css" rel="stylesheet" type="text/css"><!-- REVOLUTION SETTINGS STYLES -->
	<link href="<?php echo base_url(PLUGINS); ?>/revolution/css/layers.css" rel="stylesheet" type="text/css"><!-- REVOLUTION LAYERS STYLES -->
	<link href="<?php echo base_url(PLUGINS); ?>/revolution/css/navigation.css" rel="stylesheet" type="text/css"><!-- REVOLUTION NAVIGATION STYLES -->
	<link href="<?php echo base_url(CSS); ?>/jquery.steps.css" rel="stylesheet">
	<link href="<?php echo base_url(CSS); ?>/dashboard-style.css" rel="stylesheet">
	<link href="<?php echo base_url(CSS); ?>/style.css" rel="stylesheet">
	<link href="<?php echo base_url(CSS); ?>/stylev.css" rel="stylesheet">
	<link href="<?php echo base_url(CSS); ?>/responsive.css" rel="stylesheet">
	<link href="<?php echo base_url(CSS); ?>/slick.min.css" rel="stylesheet">
	<link href="<?php echo base_url(CSS); ?>/otherproperty.css" rel="stylesheet">    
	<link rel="shortcut icon" href="<?php echo base_url(IMAGES); ?>/favicon.png" type="image/x-icon">
	<link rel="icon" href="<?php echo base_url(IMAGES); ?>/favicon.png" type="image/x-icon">
	<!-- Responsive -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
	<!--[if lt IE 9]><script src="<?php echo base_url(JS); ?>/respond.js"></script><![endif]-->

	<script src="<?php echo base_url(JS); ?>/jquery.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

	<script>
	window.onload = function() {
	     
	           document.getElementById('otpmodel').style.display = 'none';
    setTimeout(function() {
        document.getElementById('sucess').style.display = 'none';
    }, 500);
		function closeloginmodal() {
			$('#loginModal').modal('hide');
			//pop the window to select items
		}

		function closesignupmodal() {
			$('#signupModal').modal('hide');
			//pop the window to select items
		}

		function closeforgotmodal() {
			$('#forgotModal').modal('hide');
			//pop the window to select items
		}
		/***********to open sidebar filter*************/
	
	}
</script>
<script>
	function openNav() {
		    
			document.getElementById("mySidenav").style.width = "100%";
		}

		function closeNav() {
			document.getElementById("mySidenav").style.width = "0";
		}
$( document ).ready(function() {
    $("#otpmodel").css("display","none");
    $("#subb").css("display","none");
});
</script>
</head>

<body>
	<?php 
	
    // Retrieve the 'user_data' cookie
    $userDataCookie = $this->input->cookie('user_data');
	
	?>
	<input type="hidden" name="userloginstatus" id="userloginstatus" value="<?php echo ($this ->session -> userdata('user'))?"YES":"NO"; ?>">
	<div class="page-wrapper">
		<!-- cart display design ends here 
	 if($this->session->flashdata('success_message')){ ?>
		<article class="col-sm-4 center-block alert-message">
		 alert message 
			<div class="alert alert-success" role="alert" id="sucess">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>

				<p> echo $this->session->flashdata('success_message');?></p>

			</div>
		</article>
		 } -->


		<!-- Main Header-->
		<header class="main-header header-style-one">

			<!--Header Top-->
			<div class="header-top">
				<div class="auto-container">
					<div class="inner-container clearfix">
						<div class="top-left">
							<ul class="contact-list clearfix">
								<li><i class="la la-envelope-o"></i><a href="#"><?php echo $contactus->emailid; ?></a></li>
								<li><i class="la la-phone"></i><a href="#">8884755555</a></li>
								
							</ul>
						</div>
						<div class="top-right">
							<?php if($this -> session -> userdata('user')){ 
							$userType = is_object($rguser_details)?$rguser_details->type:'';
							$usernamedata = is_object($rguser_details)?$rguser_details->name:'';
							if($usernamedata) {
								$namedata = is_object($rguser_details)?$rguser_details->name:'';
							} else {
								$namedata = is_object($rguser_details)?$rguser_details->email:'';
							}
							?>
							<div class="dropdown option-box btn-box d-inline header-drop">
								<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <i class="la la-user"></i> <?php echo ucfirst($namedata); ?> </a>
								<div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 70px, 0px); top: 0px; left: 0px; will-change: transform;">
									
									
									<a class="dropdown-item" href="<?php echo base_url('users/myshortlisted'); ?>">My Wishlist</a>
									<a class="dropdown-item" href="<?php echo base_url('users/profile'); ?>">My profile</a>
									<?php if($userType !=5){ ?>
									<a class="dropdown-item" href="<?php echo base_url('property'); ?>">Submit Property</a><a class="dropdown-item" href="<?php echo base_url('users/myproperties'); ?>">My Properties</a>
									<a class="dropdown-item" href="<?php echo base_url('users/myenquires'); ?>">My Enquiries</a>
									<?php } ?>
									<a class="dropdown-item" href="<?php echo base_url('users/logout'); ?>">Log out</a>
								</div>
							</div>
							<?php } else { ?>
							<div class="btn-box color-white d-inline"><a data-toggle="modal" data-target="#newloginmodal" data-backdrop="false" class="">Login / Register</a></div>
							<?php } ?>
							<div class="btn-box color-white d-inline header-drop">
							<!-- if($this ->session -> userdata('citysession')) 
							{ ?>
								<a href="javascript:void(0);" data-toggle="modal" data-target="#cityModal" data-backdrop="false" class=""> <i class="la la-map-marker"></i> <span id="majorlocblock">< echo $this ->session -> userdata('citysession'); ?></span></a>
							 } else { ?>
	                        	<a href="javascript:void(0);" data-toggle="modal" data-target="#cityModal" data-backdrop="false" class=""> <i class="la la-map-marker"></i> <span id="majorlocblock">Major Locations</span></a>
						 } ?> -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Header Top -->

			<!-- Header Lower -->
			<div class="header-lower">
				<div class="main-box">
					<div class="auto-container">
						<div class="inner-container clearfix">
							<div class="logo-box">
								<div class="logo"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(IMAGES); ?>/logo.png" alt="logo" title="77 acres"></a></div>
							</div>

							<div class="nav-outer">
								<!-- Main Menu -->
								<nav class="main-menu navbar-expand-md navbar-left">
									<div class="navbar-header">
										<!-- Toggle Button -->
										<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
											<span class="icon flaticon-menu"></span>
										</button>
									</div>

									<div class="collapse navbar-collapse clearfix" id="navbarSupportedContent">
										<ul class="navigation clearfix">
											<li class="current"><a href="<?php echo base_url(); ?>">Home</a></li>
											<li class=""><a href="<?php echo base_url('aboutus'); ?>">About</a></li>
													<li><a href="<?php echo base_url('contactus'); ?>">Contact</a></li>
											<li class="dropdown btn-box hidden-xs"><a href="#">Properties</a>
												<ul>
													<li><a href="<?php echo base_url('property/type/buy'); ?>">Buy</a></li>
													<li><a href="<?php echo base_url('property/type/rent'); ?>">Rent</a></li>
													<li><a href="<?php echo base_url('property/type/lease'); ?>">Lease</a></li>
													<li><a href="<?php echo base_url('property/type/project'); ?>">Projects</a></li>
												</ul>
											</li>
											<!--	<li class=""><a href=" echo base_url('agents'); ?>">Consultants</a></li> -->
									
											<?php if($this -> session -> userdata('user')){ ?>
											<?php if($userType !=5){ ?>
											<li class="btn-box d-inline"><a href="<?php echo base_url('property'); ?>" class="theme-btn btn-style-four nav-btn">Submit Property <span class="btn-badge">Free</span></a></li>
											<?php } } else { ?>
											<li class="btn-box d-inline"><a data-toggle="modal" data-target="#newloginmodal" data-backdrop="false" href="javascript:void(0)" class="theme-btn btn-style-four nav-btn">Submit Property <span class="btn-badge">Free</span></a></li>
											<?php } ?>
										</ul>
									</div>
								</nav><!-- Main Menu End-->


							</div>
						</div>
					</div>
				</div>
			</div>
			<!--End Header Lower-->

			<!-- Sticky Header  -->
			<div class="sticky-header">
				<div class="auto-container clearfix">
					<!--Logo-->
					<div class="logo pull-left">
						<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(IMAGES); ?>/77acres.png" alt="logo" title="RB Group"></a>
					</div>
					<!--Right Col-->
					<div class="pull-right">
						<!-- Main Menu -->
						<nav class="main-menu">
							<div class="navbar-collapse show collapse clearfix">
								<ul class="navigation clearfix">
									<li class="current"><a href="<?php echo base_url(); ?>">Home</a>
									</li>
									<li class=""><a href="<?php echo base_url('aboutus'); ?>">About</a>
									</li>
									<li class="dropdown hidden-xs"><a href="#">Properties</a>
"										<ul>
											<li><a href="<?php echo base_url('property/type/buy'); ?>">Buy</a></li>
											<li><a href="<?php echo base_url('property/type/rent'); ?>">Rent</a></li>
											<li><a href="<?php echo base_url('property/type/lease'); ?>">Lease</a></li>
											<li><a href="<?php echo base_url('property/type/projects'); ?>">Projects</a></li>
										</ul>
									</li>
									<li class=""><a href="<?php echo base_url('agents'); ?>">RB Team</a>
									</li>
									<li><a href="<?php echo base_url('contactus'); ?>">Contact</a></li>
									<?php if($this -> session -> userdata('user')){ ?>
									<li><a href="<?php echo base_url('property'); ?>" class="theme-btn btn-style-four nav-btn">Submit Property <span class="btn-badge">Free</span></a></li>
									<?php } else { ?>
									<li><a data-toggle="modal" data-target="#loginModal" data-backdrop="false" class="theme-btn btn-style-four nav-btn">Submit Property <span class="btn-badge">Free</span></a></li>
									<?php } ?>
								</ul>
							</div>
						</nav><!-- Main Menu End-->
					</div>
				</div>
			</div><!-- End Sticky Menu -->
			<div class="d-block d-sm-none">
			    
			    <div id="custom-search-input" >
                            <div class="input-group col-md-12">
                                <input type="text"  placeholder="Search" onclick="openNav()" />
                                 <i class="fa fa-search"  style="float:left;font-size:18px;margin-top:6px" onclick="openNav()"></i>
                            </div>
                        </div>
                
                </div>
              <div id="mySidenav" class="sidenav" >
               <!-- Categories -->
               <div class="sidebar-widget search-properties">
                  <div class="property-search-form style-three">
                     <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="la la-times"></i></a>
                     <?php include 'searchbox_xs.php';?>
                  </div>
                  <!-- End Form -->
               </div>
            </div>  
		</header>
		
		 <script src="https://kit.fontawesome.com/6ec9c7cfba.js"
        crossorigin="anonymous">
    </script>
    	<script>
    	
window.onscroll = function() {myFunction()};

var header = document.getElementById("custom-search-input");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
</script>
		<!--End Main Header -->
