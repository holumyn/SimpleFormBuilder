<?php

$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=survey", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    $user_id = rand(1,9999);
    $form_name = "My Survey Form - {$user_id}";

    $result = $conn->quote($_POST['result']);
    $sql = "INSERT INTO forms (i_user_id, s_form_name, s_form)
    VALUES ($user_id, '{$form_name}', $result)";
    // use exec() because no results are returned
    $res = $conn->exec($sql);
    if($res){
      return True;
	}else{
		return False;
	}
    //echo "New record created successfully";
     //  return $result;

    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }



?>