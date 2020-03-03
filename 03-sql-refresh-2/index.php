<?php

$hostname='localhost';
$username='root';
$password='';
$database='muziek';


try {
    $connection = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "SELECT titel, id, artiest, album, duur, afbeelding FROM afspeellijst"; // hier verander je de select naar wat je wilt selecten
    $statement = $connection->query($query);
    // echo "Verbinding is gemaakt!";
} catch(PDOException $e) {
    // echo 'Fout bij database verbinding: ' . $e->getMessage() . ' op regel ' . $e->getLine() . ' in ' . $e->getFile();
    echo 'Fout bij SQL query:<br>' . $e->getMessage() . ' op regel ' . $e->getLine() . ' in ' . $e->getFile();
}
?>
<!DOCTYPE html>
<html lang="nl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
  </head>


  <body>
      <div class="call">
      <?php
      foreach ($statement as $row){ ?>
        <div class="all">
            <div class="id"><?php  echo $row['id'] ?> </div>
            <div class="titel"><?php  echo $row['titel'] ?> </div>
            <br>
            <div class="artiest"><?php  echo $row['artiest'] ?> </div>
            <div class="album"><?php  echo $row['album'] ?> </div>
            <div class="duur"><?php  echo $row['duur'] ?> </div>
            <div><img class="image" src= "<?php echo $row['afbeelding'] ?>" ></div>
             
        </div>
      <?php } ?>
    </div>
  </body>
</html>
