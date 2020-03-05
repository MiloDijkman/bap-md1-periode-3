<?php

$id = (int)$_POST['id'];
$titel = $_POST['titel'];
$artiest = $_POST['artiest'];
$album = $_POST['album'];
$duur = $_POST['duur'];
$afbeelding = $_POST['afbeelding'];

$hostname='localhost';
$username='root';
$password='';
$database='muziek';

try {
    $connection = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $sql = 'UPDATE `afspeellijst` SET
            `titel` = :titel,
            `artiest` = :artiest,
            `album` = :album,
            `duur` = :duur,
            `afbeelding` =  :afbeelding

            WHERE `id` = :id';

    $statement = $connection->prepare($sql);

    $data = [
      'id' => $id,
      'titel' => $titel,
      'artiest' => $artiest,
      'album' => $album,
      'duur' => $duur,
      'afbeelding' => $afbeelding,
    ];


    $statement->execute($data);

    header('Location: index.php');
    // echo "Verbinding is gemaakt!";
} catch(PDOException $e) {
    // echo 'Fout bij database verbinding: ' . $e->getMessage() . ' op regel ' . $e->getLine() . ' in ' . $e->getFile();
    echo 'Fout bij SQL query:<br>' . $e->getMessage() . ' op regel ' . $e->getLine() . ' in ' . $e->getFile();
}

?>
