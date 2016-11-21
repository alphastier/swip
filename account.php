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

    <!-- jQuery -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="http://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>

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
				<li class="active"><a href="#page-top">Events</a></li>
                <li class="inactive"><a href="/favoriten.php">Favoriten</a></li>
				<li class="inactive"><a href="#subscribe">FAQ</a></li>
				<li class="inactive"><a href="#account">Account</a></li>
                <li class="inactive"><a href="/index.php">Abmelden</a></li>
			</ul> <!-- /.nav .navbar-nav -->
		</nav> <!-- /.navbar-collapse  -->
	</div><!-- /#main-menu -->
	<!-- Main Menu End -->


	<!-- Page Top Login Section -->
	<section id="page-top" class="section-style" data-background-image="images/background/image1.jpg">
		<div class="pattern height-resize">
			<div class="container">
				<h1 class="site-title">
					swip
				</h1><!-- /.site-title -->
				<h3 class="section-name">
					<span>
						Mein Konto
					</span>
				</h3><!-- /.section-name -->

				<!-- Event-Create-Formular -->
<div  class="col-lg-12">
	<h3>Mein Event planen</h3>
	<form id="event-form" action="account.php" method="post" role="form" style="display: block;">
		<div class="form-group">
			<input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="Name" value="">
		</div>
		<div class="form-group">
			<input type="text" name="text" id="text" tabindex="2" class="form-control" placeholder="Beschreibung">
		</div>
		<div class="form-group">
			<input type="text" name="place" id="place" tabindex="3" class="form-control" placeholder="Ort">
		</div>
		<div class="form-group">
			<input type="time" name="starttime" id="starttime" tabindex="4" class="form-control" placeholder="Startzeit">
		</div>
		<div class="form-group">
			<input type="date" name="date" id="date" tabindex="5" class="form-control" placeholder="Datum">
		</div>
		<div class="form-group">
			<input type="number" name="price" id="price" tabindex="6" class="form-control" placeholder="Preis in Franken">
		</div>
		<div class="form-group">
			<input type="number" name="duration" id="duration" tabindex="7" class="form-control" placeholder="Dauer in Stunden">
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3">
					<input type="submit" name="login-submit" id="login-submit" tabindex="8" class="form-control btn btn-login" value="Speichern">
				</div>
			</div>
		</div>
	</form>

</div>

<div class="panel-group" id="accordion">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Event 1</a>
				<button type="button" class="btn-default .btn-m"><span>Bearbeiten</span></button>
					<a class="event-date">23.12.16</a>
						<a class="event-price">50 CHF</a>
			</h4>
		</div>
		<div id="collapse1" class="panel-collapse collapse in">
			<div class="panel-body">
			<p class="event-starttime">Beginnt um 18:30 Uhr.</p>
			<p class="event-duration">Dauert 2 Stunden.</p>
			<p class="event-place"> Interlaken</p><p class="event-font">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
			sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
			minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
			commodo consequat.</p><br>
			</div>
		</div>
	</div>
</div>


  </section>

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
