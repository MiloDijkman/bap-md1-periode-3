<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $hostname='localhost';
  $username='root';
  $password='';
  $database='wall';

  try {
    $connection = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'INSERT INTO `gebruikers` (`voornaam`, `achternaam`, `email`, `wachtwoord`) VALUES
    (:voornaam, :achternaam, :email, :wachtwoord)';

    $safe_password = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT);


    $data = [
      'voornaam' => $_POST['voornaam'],
      'achternaam' => $_POST['achternaam'],
      'email' => $_POST['email'],
      'wachtwoord' => $safe_password
    ];

    $statement = $connection->prepare($sql);
    $statement->execute( $data );

  } catch (PDOException $e) {
    echo 'Fout bij database verbinding:<br>' . $e->getMessage() . ' op regel ' . $e->getLine() . ' in ' . $e->getFile();
    exit;
  }

}

?>
