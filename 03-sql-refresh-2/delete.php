<?php

$id = (int) $_GET['id'];

if (empty($id)){
  echo 'Geen id!';
  exit;
}

$hostname='localhost';
$username='root';
$password='';
$database='muziek';

try {
    $connection = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $sql = 'DELETE FROM `afspeellijst` WHERE `id` = :id';
    $statement = $connection->prepare($sql);

    $parameters = [
      'id' => $id,
    ];

    $statement->execute($parameters);

    header('Location: index.php');

    // echo "Verbinding is gemaakt!";
} catch(PDOException $e) {
    echo 'Fout bij SQL query:<br>' . $e->getMessage() . ' op regel ' . $e->getLine() . ' in ' . $e->getFile();
    exit;
}

?>
