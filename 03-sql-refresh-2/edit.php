<?php

$id = (int) $_GET['id'];

$hostname='localhost';
$username='root';
$password='';
$database='muziek';

try {
    $connection = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT * FROM `afspeellijst` WHERE `id` = :id';

    $statement = $connection->prepare($sql);

    $parameters = [
      'id' => $id,
    ];

    $statement->execute($parameters);
    $row = $statement->fetch();


    // echo "Verbinding is gemaakt!";
} catch(PDOException $e) {
    echo 'Fout bij SQL query:<br>' . $e->getMessage() . ' op regel ' . $e->getLine() . ' in ' . $e->getFile();
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tracks</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
    <link rel="stylesheet" href="style.css">
  </head>
<body>
  <h2>Track Veranderen</h2>
  <form action="update.php" method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']?>"/>
    <p>
      <label for="">Titel</label>
      <input type="text" value="<?php echo $row['titel']?>" name="titel">
    </p>
    <p>
      <label for="">Artiest</label>
      <input type="text" value="<?php echo $row['artiest']?>" name="artiest">
    </p>
    <p>
      <label for="">Album</label>
      <input type="text" value="<?php echo $row['album']?>" name="album">
    </p>
    <p>
      <label for="">Duur</label>
      <input type="number" value="<?php echo $row['duur']?>" name="duur">
    </p>
    <p>
      <label for="">Afbeeldings URL</label>
      <input type="url" value="<?php echo $row['afbeelding']?>" name="afbeelding">
    </p>
    <button type="submit">Opslaan</button>
  </form>
</body>
</html>
