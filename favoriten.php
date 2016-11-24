<?php
  session_start();
	if(!isset($_SESSION['user_id'])){
		header("Location:index.php");
	}else{
  	$user_id = $_SESSION['user_id'];
	}
	// echo user_id;
	// externe Dateien Laden
	// data.php beinhaltet alle DB-Anweisungen wie SELECT, INSERT, UPDATE, etc.
	// Funktionen in data.php liefern das Ergebnis der Anweisungen zurück
	// security.php enthält sicherheitsrelevante Funktionen
	require_once("system/data.php");
	require_once("system/security.php");

  // für Spätere Verwendung initialisieren wir die Variablen $error, $error_msg, $success, $success_msg
  $error = false;
  $error_msg = "";
  $success = false;
  $success_msg = "";
  
  // Favorit löschen
    if(isset($_POST['eventid_submit'])){
      $delete_fav = $_POST['favorite_delete'];
      delete_favorite($delete_fav);
    }
  
  $favorites = get_favorites_by_user($user_id);
?>


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
				<li class="inactive"><a href="home.php">Events</a></li>
        		<li class="active"><a href="favoriten.php">Favoriten</a></li>
				<li class="inactive"><a href="account.php">Account</a></li>
        		<li class="inactive"><a href="index.php">Abmelden</a></li>
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
						Favoriten
					</span>
				</h3><!-- /.section-name -->

				<?php while($event = mysqli_fetch_assoc($favorites)) { ?>

				<!-- Event List -->
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" name="name"><?php echo $event['name']; ?></a>
        <input type="hidden" name="eventid_submit" value="<?php echo $event['event_id']; ?>">
        <button type="submit" class="btn-default .btn-m" name="favorite_delete"><span>X</span></button>
        <a class="event-date" name="date"><?php echo $event['date']; ?></a>
        <a class="event-price" name="price"><?php echo $event['price']; ?> CHF</a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse in">
      <div class="panel-body">
      	<p class="event-starttime" name="starttime"><?php echo $event['starttime']; ?></p>
        <p class="event-duration" name="duration"><?php echo $event['duration']; ?>h</p>
      	<p class="event-place" name="place"><b><?php echo $event['place']; ?></b></p>
        <p class="event-font" name="text"><?php echo $event['text']; ?></p><br>
      </div>
    </div>
  </div>
</div>
<?php } ?>
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
