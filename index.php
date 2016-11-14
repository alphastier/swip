<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>	Enjoy Switzerland </title>
	<meta name="description" content="swip" >
	<meta name="author" content="Jewel Theme">

	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

	<!-- Bootstrap  -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">

	<!-- icon fonts font Awesome -->
	<link href="assets/css/font-awesome.min.css" rel="stylesheet">

	<!-- Custom Styles -->
	<link href="assets/css/style.css" rel="stylesheet">

	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<![endif]-->
    
    <!-- WhatsNearby jQuery Plugin -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="http://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
<script src="assets/js/WhatsNearby.js" type="text/javascript" ></script>
<script src="assets/es5-shim.min.js" type="text/javascript"></script>
<script src="assets/es5-sham.min.js" type="text/javascript"></script>
<script type="text/javascript">
			$(document).ready(function(){
				$("#wn1").whatsnearby({ 
					zoom:15,
					width:"100%",
					address: "32 Saint-Charles Ouest, Longueuil, Qc, Canada"
				});
				$("#wn1-1").whatsnearby({ 
					zoom:15,
					width:"100%"
				});

				$("#wn2").whatsnearby({ 
					zoom:15,
					width:"100%",
					address: "Montreal",
					placesRadius: 500,
					placesTypes: [ 'restaurant', 'cafe', 'gym' ]
				});

				$("#wn3").whatsnearby({ 
					zoom:15,
					width:"100%",
					address: "Montreal",
					placesRadius: 500,
					placesTypes: [ 'restaurant', 'cafe', 'gym' ],
					excludePlacesTypes: ['bar']
				});

				$("#wn4").whatsnearby({ 
					zoom:15,
					width:"100%",
					address: "Montreal",
					placesRadius: 500,
					placesTypes: [ 'restaurant', 'cafe', 'gym' ],
					excludeByKeywords: ['Lounge']
				});
			});
		</script>

</head>
<body>


	<!-- Preloader -->
	<div id="preloader">
		<div id="loader">
			<div class="dot"></div>
			<div class="dot"></div>
			<div class="dot"></div>
			<div class="dot"></div>
			<div class="dot"></div>
			<div class="dot"></div>
			<div class="dot"></div>
			<div class="dot"></div>
			<div class="lading"></div>
		</div>
	</div><!-- /#preloader -->
	<!-- Preloader End-->


	<!-- Main Menu -->
	<div id="main-menu" class="navbar navbar-default navbar-fixed-top" role="navigation">

		<div class="navbar-header">
			<!-- responsive navigation -->
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<i class="fa fa-bars"></i>
			</button> <!-- /.navbar-toggle -->

		</div> <!-- /.navbar-header -->

		<nav class="collapse navbar-collapse">
			<!-- Main navigation -->
			<ul id="headernavigation" class="nav navbar-nav">
				<li class="active"><a href="#page-top">Home</a></li>
				<li><a href="#about">Login</a></li>
				<li><a href="#subscribe">FAQ</a></li>
				<li><a href="#contact"></a></li>
			</ul> <!-- /.nav .navbar-nav -->
		</nav> <!-- /.navbar-collapse  -->
	</div><!-- /#main-menu -->
	<!-- Main Menu End -->


	<!-- Page Top Section -->
	<section id="page-top" class="section-style" data-background-image="images/background/image1.jpg">
		<div class="pattern height-resize">
			<div class="container">
				<h1 class="site-title">
					swip
				</h1><!-- /.site-title -->
				<h3 class="section-name">
					<span>
						We Are
					</span>
				</h3><!-- /.section-name -->
				<h2 class="section-title">
					quite awesome
				</h2><!-- /.Section-title  -->
				<div id="time_countdown" class="time-count-container">
					<div class="next-section">
					<a class="go-to-about"><span></span></a>
					</div><!-- /.next-section -->
                </div>
         	</div>
       	</div>
	</section>



	<!-- About Us Section -->
	<section id="about" class="section-style" data-background-image="images/background/about-us.jpg">
		<div class="pattern height-resize">
			<div class="container">
				<h3 class="section-name">
					<span>
						About Us
					</span>
				</h3><!-- /.section-name -->
				<h2 class="section-title">
					We Are dedicated
				</h2><!-- /.Section-title  -->
				<p class="section-description">
					Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.
				</p><!-- /.section-description -->

				<div class="team-container">
                

	<div id="wrapper">
		<div class="well">
			<div id="wn1"></div>
		</div>
	</div>
                
                
                
                </div><!-- /.container -->
		</div><!-- /.pattern -->


	</section><!-- /#about -->
	<!-- About Us Section End -->



	<!-- Subscribe Section -->
	<section id="subscribe" class="section-style" data-background-image="images/background/newsletter.jpg">
		<div class="pattern height-resize">
			<div class="container">
				<h3 class="section-name">
					<span>
						Subscribe
					</span>
				</h3><!-- /.section-name -->
				<h2 class="section-title">
					Our Newsletter
				</h2><!-- /.Section-title  -->
				<p class="section-description">
					Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.
				</p><!-- /.section-description -->

				<form class="news-letter" method="post">
					<p class="alert-success"></p>
					<p class="alert-warning"></p>

					<div class="subscribe-hide">
						<input class="form-control" type="email" id="subscribe-email" name="subscribe-email" placeholder="Email Address"  required>
						<button  type="submit" id="subscribe-submit" class="btn"><i class="fa fa-envelope"></i></button>
						<span id="subscribe-loading" class="btn"> <i class="fa fa-refresh fa-spin"></i> </span>
						<div class="subscribe-error"></div>
					</div><!-- /.subscribe-hide -->
					<div class="subscribe-message"></div>
				</form><!-- /.news-letter -->

				<div class="social-btn-container">
					<span class="social-btn-box">
						<a href="#" class="facebook-btn">
							<i class="fa fa-facebook"></i></a>
						</span><!-- /.social-btn-box -->

						<span class="social-btn-box">
							<a href="#" class="twitter-btn"><i class="fa fa-twitter"></i></a>
						</span><!-- /.social-btn-box -->

						<span class="social-btn-box">
							<a href="#" class="linkedin-btn"><i class="fa fa-linkedin"></i></a>
						</span><!-- /.social-btn-box -->

						<span class="social-btn-box">
							<a href="#" class="google-plus-btn"><i class="fa fa-google-plus"></i></a>
						</span><!-- /.social-btn-box -->


						<span class="social-btn-box">
							<a href="#" class="youtube-btn"><i class="fa fa-youtube"></i></a>
						</span><!-- /.social-btn-box -->



					</div><!-- /.social-btn-container -->

					<div class="next-section">
						<a class="go-to-contact"><span></span></a>
					</div><!-- /.next-section -->

				</div><!-- /.container -->
			</div><!-- /.pattern -->

		</section><!-- /#subscribe -->
		<!-- Subscribe Section End -->

		<!-- Footer Section -->
		<footer id="footer-section">
			<p class="copyright">
			By Miriam, Nora and Remo
			</p>
		</footer>
		<!-- Footer Section End -->
        
        <!-- WhatsNear Map -->
        
        


		<!-- jQuery Library -->
		<script type="text/javascript" src="assets/js/jquery-2.1.0.min.js"></script>
		<!-- Modernizr js -->
		<script type="text/javascript" src="assets/js/modernizr-2.8.0.min.js"></script>
		<!-- Plugins -->
		<script type="text/javascript" src="assets/js/plugins.js"></script>
		<!-- Custom JavaScript Functions -->
		<script type="text/javascript" src="assets/js/functions.js"></script>
		<!-- Custom JavaScript Functions -->
		<script type="text/javascript" src="assets/js/jquery.ajaxchimp.min.js"></script>

	</body>
	</html>
