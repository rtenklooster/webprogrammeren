<?php
session_start();
// Controleer of een gebruikers is ingelogd - of niet.
// Login requests worden door de formhandler afgevangen.
require_once("database.php");
extract($_POST);

function verify_logon($username, $password){
  // Deze functie controleert of een gebruiker kan worden geautenticeert.
  // In ons project gebruiken wij het emailadres als username.
  // We vragen het password op aan de hand van een ingevulde emailadres

  // Mysql real escape strings zijn niet nodig omdat er gebruik wordt gemaakt van prepaired statements.

  // Haal de user op uit de database.
  $user = getUser($username);

  if(count($user)){
    // Er is een user gevonden met dit email adres
    $hashed_password = $user[0]["password"];

    // Controleer het ingevoerde wachtwoord met het gehashte wachtwoord uit de database.
    if (password_verify($password, $hashed_password)) {
      // Wachtwoorden komen overeen, start sessie
      $_SESSION['logged_in'] = 1;
      $_SESSION['user_id'] =    $user[0]["id"];
      $_SESSION['user_name'] =  $user[0]["naam"];
      echo "success";
    }
    else {
      // Wachtwoorden komen niet overeen, maak user sessie voor zekerheid leeg.
      unset($_SESSION['logged_in']);
      unset($_SESSION['user_id']);
      unset($_SESSION['user_name']);
      echo "failed";
    }
  }else{
    // Er is geen user gevonden met dit email adres, maak voor de zekerheid de user sessie leeg.
    unset($_SESSION['logged_in']);
    unset($_SESSION['user_id']);
    unset($_SESSION['user_name']);
    echo "failed";
  }
}

//print_R(verify_logon("a@a.a", "standaardwachtwoord"));
// Test ingegeven credentials.
if(isset($email) && isset($password) && $action == "login"){
  verify_logon($email, $password);
}

function getUser($email) {
// import database
    global $db;
    // Maak SQL
    $sql = '
      SELECT id, naam, password
      FROM user
      WHERE emailadres = :email';

      // Prepaire statements
      $stmt = $db->prepare($sql);
      $stmt->bindParam(':email', $email, PDO::PARAM_INT);
      // Uitvoeren
      $stmt->execute();
      // Ophhalen data
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      // Return het resultaat
      return($result);
      print_r($result);
}
 ?>
