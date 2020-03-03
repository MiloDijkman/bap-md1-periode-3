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



try {
    $connection = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'INSERT INTO afspeellijst (titel, artiest, album, duur, afbeelding)
        VALUES (:titel, :artiest, :album, :duur, :afbeelding)';
      $statement = $connection->prepare($sql);

      $statement->execute($parameters);

      header('location: index.php');
}

catch (PDOExeption $e) {
  echo 'fout bij database verbinding:<br>' . $e->getMassage() . 'op regel' . $e->getline() . 'in' . $e->getFile();
  exit;
}

?>
