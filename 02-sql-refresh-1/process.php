<?php
require '../functions.php';

$connection = dbConnect();

// Deze verbinding kun je weer gebruiken voor queries
try {
    $statement = $connection->query('SELECT * FROM afspeellijst');
}catch (PDOException $e){
    echo $e->getMessage();
    exit();
}

?>
<?php
$titel = $_POST['titel'];
$artiest = $_POST['artiest'];
$album = $_POST['album'];
$duur = $_POST['duur'];
$afbeelding = $_POST['afbeelding'];

$parameters = [
  'titel' => $titel,
  'artiest' => $artiest,
  'album' => $album,
  'duur' => $duur,
  'afbeelding' => $afbeelding
];

$hostname='localhost';
$username='root';
$password='';
$database='muziek';


$sql = 'INSERT INTO afspeellijst (titel, artiest, album, duur, afbeelding)
        VALUES (:titel, :artiest, :album, :duur, :afbeelding)';
      $statement = $connection->prepare($sql);

      $statement->execute($parameters);

      header('location: index.php');



?>
