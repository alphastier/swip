<?php
	/* *******************************************************************************************************
	/* data.php regelt die DB-Verbindung und fast den gesammten Datenverkehr der Site.
	/* So ist die gesammte Datenorganisation an einem Ort, was den Verwaltungsaufwand erheblich verringert.
	/*
	/* *******************************************************************************************************/

	/* *******************************************************************************************************
	/* get_db_connection()
	/*
	/* liefert als Rückgabewert die Datenbankverbindung
	/* hier werden für die gesammte Site die DB-Verbindungsparameter angegeben.
	/* 	"SET NAMES 'utf8'"  :	Sorgt dafür, dass alle Zeichen als UTF8 übertragen und gespeichert werden.
	/*							http://www.lightseeker.de/wunderwaffe-set-names-set-character-set/
	/* *******************************************************************************************************/
	function get_db_connection()
	{
    $db = mysqli_connect('localhost', '292859_4_1', 'Mlb83Q@DkphJ', '292859_4_1')
      or die('Fehler beim Verbinden mit dem Datenbank-Server.');
  		mysqli_query($db, "SET NAMES 'utf8'");
		return $db;
	}

	/* *******************************************************************************************************
	/* get_result($sql)
	/*
	/* Führt die SQL-Anweisung $sql aus, liefert das Ergebnis zurück und schliesst die DB-Verbindung
	/* Alle Weiteren Funktionen rufen get_result() direkt oder indirekt auf.
	/* *******************************************************************************************************/
	function get_result($sql)
	{
		$db = get_db_connection();
     //echo $sql ."<br>";
		$result = mysqli_query($db, $sql);
		mysqli_close($db);
		return $result;
	}


	/* *********************************************************
	/* Login
	/* ****************************************************** */

	function login($username , $password){
		$sql = "SELECT * FROM user WHERE username = '".$username."' AND password = '".$password."';";
		return get_result($sql);
	}

	function register($firstname, $lastname, $username , $password){
    $sql = "INSERT INTO user (firstname, lastname, username, password) VALUES ('$firstname', '$lastname','$username', '$password') ;";
		return get_result($sql);
	}


	/* *********************************************************
	/* Event create
	/* ****************************************************** */

	function event_create($user_id, $name, $text, $place , $starttime, $date, $price, $duration){
	    $sql = "INSERT INTO events (user_id, name, text, place, starttime, date, price, duration) VALUES ('$user_id', '$name', '$text','$place', '$starttime', '$date', '$price', '$duration');";
		return get_result($sql);
	}

	/* *********************************************************
	/* Favorite create
	/* ****************************************************** */


	function favorite_create($user_id, $event_id){
	    $sql = "INSERT INTO fue-relation (user_id, event_id) VALUES ('$user_id', '$event_id');";
		return get_result($sql);
	}


	/* *********************************************************
	/* Favoriten anzeigen
	/* ****************************************************** */
	function get_favorites_by_user($fav_id){
	$sql = "SELECT * FROM events WHERE user_id = $user_id;";
	return get_result($sql);
	}


	/* *********************************************************
	/* Event-bearbeiten
	/* ****************************************************** */
	function get_events_by_user($user_id){
	$sql = "SELECT * FROM events WHERE user_id = $user_id;";
	return get_result($sql);
	}

	function get_event($event_id){
	$sql = "SELECT * FROM events WHERE event_id = $event_id;";
	return get_result($sql);
	}

function update_event($user_id, $event_id, $name, $text, $place, $starttime, $date, $price, $duration){
  	$sql_ok = false;
		echo "Hier der Name: $name<br>";
  	$sql = "UPDATE events SET ";
  	if($name != ""){
  		$sql .= "name = '$name', ";
  		$sql_ok = true;
    }
		if($text != ""){
			$sql .= "text = '$text', ";
			$sql_ok = true;
		}
		if($place != ""){
			$sql .= "place = '$place', ";
			$sql_ok = true;
		}
		if($starttime != ""){
			$sql .= "starttime = '$starttime', ";
			$sql_ok = true;
		}
		if($date != ""){
			$sql .= "date = '$date', ";
			$sql_ok = true;
		}
		if($price != ""){
			$sql .= "price = '$price', ";
			$sql_ok = true;
		}
		if($duration != ""){
			$sql .= "duration = '$duration', ";
			$sql_ok = true;
		}


    // Das Komma an der vorletzten Position des $sql-Strings durch ein Leerzeichen ersetzen
    $sql = substr_replace($sql, ' ', -2, 1);

    // $sql-String vervollständigen
    $sql .= " WHERE event_id = $event_id;";

  	if($sql_ok){
  	  return get_result($sql);
  	}else{
  		return false;
  	}
  }

	/* *********************************************************
	/* Event löschen
	/* ****************************************************** */
	function delete_event($event_id){
	$sql = "DELETE FROM events WHERE event_id = $event_id ;";
	return get_result($sql);
}

	/* *********************************************************
	/* Alle Events anzeigen
	/* ****************************************************** */

	function get_all_events(){
		$sql = "SELECT * FROM events ORDER BY Date ASC, Starttime Asc;";
		return get_result($sql);
	}


	/* *********************************************************
	/* Profil
	/* ****************************************************** */

	function get_user($user_id){
    $sql = "SELECT * FROM user WHERE user_id = $user_id;";
		return get_result($sql);
	}
