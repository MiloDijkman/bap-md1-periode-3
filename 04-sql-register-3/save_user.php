<?php
$voornaam = $_POST['voornaam'];
$achternaam = $_POST['achternaam'];
$email = $_POST['email'];
$wachtwoord = $_POST['wachtwoord'];

$parameters = [
  'voornaam' => $voornaam,
  'achternaam' => $achternaam,
  'email' => $email,
  'wachtwoord' => $wachtwoord,
];

$hostname='localhost';
$username='root';
$password='';
$database='muziek';



try {
    $connection = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $safe_password = password_hash($wachtwoord, PASSWORD_DEFAULT);


    $parameters = [
      'voornaam' => $voornaam,
      'achternaam' => $achternaam,
      'email' => $email,
      'wachtwoord' => $safe_password,
    ];



$sql = 'INSERT INTO `gebruikers` (`voornaam`, `achternaam`, `email`, `wachtwoord`)
        VALUES (:voornaam, :achternaam, :email, :wachtwoord)';
      $statement = $connection->prepare($sql);

      $statement->execute($parameters);

      header('location: register.php');
}

catch (PDOExeption $e) {
  echo 'fout bij database verbinding:<br>' . $e->getMassage() . 'op regel' . $e->getline() . 'in' . $e->getFile();
  exit;
}



?>
