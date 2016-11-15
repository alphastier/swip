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
    // echo $sql ."<br>";
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

	function register($username , $password){
    $sql = "INSERT INTO user (username, password) VALUES ('$username', '$password');";
		return get_result($sql);
	}


	/* *********************************************************
	/* Home
	/* ****************************************************** */

	function write_post($posttext, $owner, $image){
    $sql = "INSERT INTO posts (text, owner, post_img) VALUES ('$posttext', '$owner', '$image');";
		return get_result($sql);
	}

	function get_posts($user_id){
    $sql = "SELECT * FROM posts p, user u WHERE p.owner = $user_id AND u.`user_id` = $user_id ;";
		return get_result($sql);
	}

	function get_friends_and_my_posts($user_id){
    $sql = "SELECT * FROM posts p, user u WHERE p.owner IN
              (SELECT friend FROM userrelations WHERE user = $user_id)
              AND u.`user_id` = p.owner
              OR p.owner = $user_id AND u.`user_id` = $user_id
              ORDER BY p.posttime ;";
		return get_result($sql);
	}

	function delete_post($post_id){
    $sql = "DELETE FROM posts WHERE post_id = $post_id ;";
		return get_result($sql);
	}


	/* *********************************************************
	/* Profil
	/* ****************************************************** */

	function get_user($user_id){
    $sql = "SELECT * FROM user WHERE user_id = $user_id;";
		return get_result($sql);
	}

	function get_user_image($user_id){
    $sql = "SELECT img_src FROM user WHERE user_id = $user_id;";
		return get_result($sql);
	}

  function update_user($user_id, $email, $password, $confirm_password, $gender, $firstname, $lastname, $image_name){
  	$sql_ok = false;
  	$sql = "UPDATE user SET ";
  	if($email != ""){
  		$sql .= "email = '$email', ";
  		$sql_ok = true;
    }
    if($password != "" && $password == $confirm_password) {
      $sql .= "password = '$password', ";
  		$sql_ok = true;
    }
    if($gender != ""){
      $sql .= "gender = '$gender', ";
  		$sql_ok = true;
    }
    if($firstname != ""){
      $sql .= "firstname = '$firstname', ";
  		$sql_ok = true;
    }
    if($lastname != ""){
      $sql .= "lastname = '$lastname', ";
  		$sql_ok = true;
    }
    if($image_name != ""){
      $sql .= "img_src = '$image_name', ";
  		$sql_ok = true;
    }
    // Das Komma an der vorletzten Position des $sql-Strings durch ein Leerzeichen ersetzen
    $sql = substr_replace($sql, ' ', -2, 1);

    // $sql-String vervollständigen
    $sql .= " WHERE user_id = $user_id ;";

  	if($sql_ok){
  	  return get_result($sql);
  	}else{
  		return false;
  	}
  }


	/* *********************************************************
	/* Friends
	/* ****************************************************** */

	function get_user_list(){
    $sql = "SELECT * FROM user;";
		return get_result($sql);
	}

	function get_no_friend_list($user_id){
    $sql = "SELECT * FROM user WHERE user_id NOT in
              (SELECT friend FROM userrelations WHERE user = $user_id)
              AND  NOT user_id = $user_id;";
		return get_result($sql);
	}

	function get_friend_list($user_id){
    $sql = "SELECT * FROM user WHERE user_id in
              (SELECT friend FROM userrelations WHERE user = $user_id)
              AND  NOT user_id = $user_id;";
		return get_result($sql);
	}

  function add_friends($user_id, $friend_list){
		foreach($friend_list as $friend_id){
			$sql = "INSERT INTO userrelations (`user`, `friend`) VALUES ($user_id, $friend_id);";
			get_result($sql);
		}
	}
	/*
  function add_friends($user_id, $friend_list){
    $sql = "INSERT INTO userrelations (`user`, `friend`) VALUES ";
		foreach($friend_list as $friend_id){
			$sql .= "($user_id, $friend_id),";
		}
		$sql = substr_replace($sql, ';', -1, 1);
		get_result($sql);
	}
	*/

  function remove_friends($user_id, $friend_list){
		foreach($friend_list as $friend_id){
			$sql = "DELETE FROM userrelations WHERE user = $user_id AND friend = $friend_id;";
			get_result($sql);
		}
	}

?>
