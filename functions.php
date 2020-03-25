<?php

function dbConnect()
{

    // Lees het config bestand in en sla de array uit config op in een variabele
    $config = require(__DIR__ . '/config.php');

    try {
        // Verbinding maken met gebruik van de database instellingen die in de variabelen zijn opgeslagen
        $connection = new PDO('mysql:host=' . $config['hostname'] . ';dbname=' . $config['database'], $config['username'], $config['password']);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $connection;

    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    return false;

}

function deleteTrack($id, $connection)
{
  $sql = 'DELETE FROM afspeellijst WHERE id = :id';
  $statement = $connection->prepare($sql);

  $parameters = [
    'id' => $id
  ];

  $statement->execute($parameters);

  return track;
}


 ?>
