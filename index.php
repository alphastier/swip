<?php
  session_start();
	if(isset($_SESSION['id'])) unset($_SESSION['id']);
	session_destroy();

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
  // Kontrolle, ob die Seite direkt aufgerufen wurde oder vom Login-Formular
  if(isset($_POST['login-submit'])){
    // Kontrolle mit isset, ob email und password ausgefüllt wurde
    if(!empty($_POST['username']) && !empty($_POST['password'])){

      // Werte aus POST-Array auf SQL-Injections prüfen und in Variablen schreiben
      $username = filter_data($_POST['username']);
      $password = filter_data($_POST['password']);

      // Liefert alle Infos zu User mit diesen Logindaten
      $result = login($username,$password);

      // Anzahl der gefundenen Ergebnisse in $row_count
  		$row_count = mysqli_num_rows($result);
      if( $row_count == 1){
        session_start();
        $user = mysqli_fetch_assoc($result);
        $_SESSION['userid'] = $user['user_id'];
        header("Location:home.php");
      }else{
        // Fehlermeldungen werden erst später angezeigt
        $error = true;
        $error_msg .= "Leider konnte wir Ihre E-Mailadresse oder Ihr Passwort nicht finden.</br>";
      }
    }else{
      $error = true;
      $error_msg .= "Bitte füllen Sie beide Felder aus.</br>";
    }
  }


  if(isset($_POST['register-submit'])){
    // Kontrolle mit isset, ob email und password ausgefüllt wurde
    if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['confirm-password']) && !empty($_POST['firstname'])&& !empty($_POST['lastname'])){

      // Werte aus POST-Array auf SQL-Injections prüfen und in Variablen schreiben
      $username = filter_data($_POST['username']);
      $password = filter_data($_POST['password']);
      $confirm_password = filter_data($_POST['confirm-password']);
	    $firstname = filter_data($_POST['firstname']);
      $lastname = filter_data($_POST['lastname']);
      if($password == $confirm_password){
        // register liefert bei erfolgreichem Eintrag in die DB den Wert TRUE zurück, andernfalls FALSE
        $result = register($firstname, $lastname, $username, $password);
        if($result){
          $success = true;
          $success_msg = "Sie haben erfolgreich registriert.</br>
          Bitte loggen Sie sich jetzt ein.</br>";
        }else{
          $error = true;
          $error_msg .= "Es gibt ein Problem mit der Datenbankverbindung.</br>";
        }
      }else{
        $error = true;
        $error_msg .= "Die Passwörter stimmen nicht überein.</br>";
      }
    }else{
      $error = true;
      $error_msg .= "Bitte füllen Sie alle Felder aus.</br>";
    }
  }
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
				<li class="active"><a href="#page-top">Login</a></li>
				<li><a href="index.php">Events</a></li>
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
					</span>
				</h3><!-- /.section-name -->
				<h2 >
				</h2><!-- /.Section-title  -->

				<div class="row">
	  				<div class="col-xs-6">
	  					<h3 class="section-name"><a href="#" class="active" id="login-form-link">Login</a></h3>
	  				</div>
	  				<div class="col-xs-6">
	  					<h3 class="section-name"><a href="#" id="register-form-link">Registrieren</a></h3>
	  				</div>
	  		</div>
					<hr>
<?php echo $error_msg; ?>
<?php echo $success_msg; ?>
		<div  class="col-lg-12">
				<!-- Login-Formular -->
				<form id="login-form" action="index.php" method="post" role="form" style="display: block;">
					<div class="form-group">
						<input type="text" name="username" id="email" tabindex="1" class="form-control" placeholder="User-Name" value="">
					</div>
					<div class="form-group">
						<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Passwort">
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6 col-sm-offset-3">
								<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="einloggen">
							</div>
						</div>
					</div>
				</form>
				<!-- Login-Formular -->

				<!-- Registrations-Formular -->
				<form id="register-form" action="index.php" method="post" role="form" style="display: none;">
			<div class="form-group">
				<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="User-Name" value="">
			</div>
            <div class="form-group">
				<input type="text" name="firstname" id="firstname" tabindex="1" class="form-control" placeholder="Firstname" value="">
			</div>
            <div class="form-group">
				<input type="text" name="lastname" id="lastname" tabindex="1" class="form-control" placeholder="Lastname" value="">
			</div>
			<div class="form-group">
				<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Passwort">
			</div>
			<div class="form-group">
				<input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Passwort bestätigen">
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-sm-6 col-sm-offset-3">
						<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="jetzt registrieren">
					</div>
				</div>
			</div>
		</form>
	</div>
				<!-- Registrations-Formular -->

<!-- Next-Button auskommentiert
					<div id="time_countdown" class="time-count-container">
						<div class="next-section">
						<a class="go-to-event"><span></span></a>
						</div>
-->
        </div>
         	</div><!-- /.container -->
       	</div><!-- /.pattern -->
	</section>



	<!-- Event Section -->
	<section id="event" class="section-style" data-background-image="images/background/about-us.jpg">
		<div class="pattern height-resize">
			<div class="container">
				<h3 class="section-name">
					<span>
						Events
					</span>
				</h3><!-- /.section-name -->
					<h2>	</h2>


<!-- Next-Button auskommentiert
				<div id="time_countdown" class="time-count-container">
						<div class="next-section">
						<a class="go-to-faq"><span></span></a>
						</div>
				</div>
-->
			</div><!-- /.container -->
		</div><!-- /.pattern -->


	</section><!-- /#about -->
	<!-- Event Section End -->



<!-- Newsletter-File-auskommentiert

		<section id="faq" class="section-style" data-background-image="images/background/newsletter.jpg">
			<div class="pattern height-resize">
				<div class="container">
					<h3 class="section-name">
						<span>
							FAQ
						</span>
					</h3>
					<h2 class="section-title">
						Our Newsletter
					</h2>
					<p class="section-description">
						Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.
					</p>

					<form class="news-letter" method="post">
						<p class="alert-success"></p>
						<p class="alert-warning"></p>

						<div class="subscribe-hide">
							<input class="form-control" type="email" id="subscribe-email" name="subscribe-email" placeholder="Email Address"  required>
							<button  type="submit" id="subscribe-submit" class="btn"><i class="fa fa-envelope"></i></button>
							<span id="subscribe-loading" class="btn"> <i class="fa fa-refresh fa-spin"></i> </span>
							<div class="subscribe-error"></div>
						</div>
						<div class="subscribe-message"></div>
					</form>
-->

<!-- Social Media Buttons auskommentiert
				<div class="social-btn-container">
					<span class="social-btn-box">
						<a href="#" class="facebook-btn">
						<i class="fa fa-facebook"></i></a>
					</span>

					<span class="social-btn-box">
						<a href="#" class="twitter-btn"><i class="fa fa-twitter"></i></a>
					</span>

					<span class="social-btn-box">
						<a href="#" class="linkedin-btn"><i class="fa fa-linkedin"></i></a>
					</span>

					<span class="social-btn-box">
						<a href="#" class="google-plus-btn"><i class="fa fa-google-plus"></i></a>
					</span>

					<span class="social-btn-box">
						<a href="#" class="youtube-btn"><i class="fa fa-youtube"></i></a>
					</span>
				</div>
-->

<!-- Next-Button auskommentiert
					<div class="next-section">
						<a class="go-to-contact"><span></span></a>
					</div>
-->

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

		<script>
		$(function() {
			$('#register-form-link').click(function(e) {
				$("#register-form").delay(100).fadeIn(100);
				$("#login-form").fadeOut(100);
				$('#login-form-link').removeClass('active');
				$(this).addClass('active');
				e.preventDefault();
			});
			$('#login-form-link').click(function(e) {
				$("#login-form").delay(100).fadeIn(100);
				$("#register-form").fadeOut(100);
				$('#register-form-link').removeClass('active');
				$(this).addClass('active');
				e.preventDefault();
			});



		});
	</script>

	</body>
	</html>
