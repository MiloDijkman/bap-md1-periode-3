<?php
require '../config/functions.php';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email              = $_POST['email'];
  $wachtwoord         = $_POST['wachtwoord'];
  $wachtwoord_confirm = $_POST['wachtwoord_confirm'];

  if (empty($email)){
    $errors['email'] = 'E-mail adres niet ingevuld';
  }

  if (empty($wachtwoord)){
    $errors['wachtwoord'] = 'Wachtwoord niet ingevuld';
  }

  if (empty($wachtwoord_confirm)){
    $errors['wachtwoord_confirm'] = 'Wachtwoord bevestiging niet ingevuld';
  }


  if (count($errors) === 0) {

    if($wachtwoord !== $wachtwoord_confirm) {
      $errors['wachtwoord_zelfde'] = 'De wachtwoorden zijn niet gelijk';
    }

  }

  if (count($errors) === 0) {
    $connection = dbConnect();

    $sql = 'SELECT * FROM `gebruikers` WHERE `email` = :email';
    $statement = $connection->prepare($sql);

    $params = [
      'email' => $email
    ];

    $statement->execute($params);

     if($statement->rowCount() === 1){
       $gebruiker = $statement->fetch();

       // WACHTWOORD CHECKEN
       if(password_verify($wachtwoord, $gebruiker['wachtwoord'])){
         // Gebruiker inloggen

         $_SESSION['user_id'] = $gebruiker['id'];
         $_SESSION['voornaam'] = $gebruiker['voornaam'];

         // Pagina waar gebruiker heen moet na inloggen
         header('Location: register.php');
         exit();



       } else {
         // Foutmelding
         $errors['wachtwoord_check'] = 'Wachtwoord is niet correct!';
       }

     }

  }

}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
  </head>
  <body>

  <h2>Inloggen</h2>

  <?php foreach ($errors as $error):?>
  <?php echo $error?> <br/>
  <?php endforeach;?>

  <form action="login.php" method="POST" class="login-form">

    <p>
      <label for="">E-mail</label>
      <input type="text" name="email">
    </p>

    <p>
      <label for="">Wachtwoord</label>
      <input type="password" name="wachtwoord">
    </p>

    <p>
      <label for="">Wachtwoord Check</label>
      <input type="password" name="wachtwoord_confirm">
    </p>


      <button type="submit" class="login-button">Inloggen</button>

  </form>

  </body>

</html>
