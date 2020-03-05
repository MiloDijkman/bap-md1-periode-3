<?php

$hostname='localhost';
$username='root';
$password='';
$database='muziek';



try {
    $connection = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "SELECT * FROM afspeellijst";
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
    <input type='button'value='Klik om een nieuwe track toe te voegen ' class="button" onclick="document.location.href='form.php';"/>
    <div class="grid">

      <?php
      foreach ($statement as $row){ ?>
        <div class="samen">
          <div class="titel"><?php  echo $row['titel'] ?> </div>
          <div class="artiest"><?php  echo $row['artiest'] ?> </div>
          <div class="album"><?php  echo $row['album'] ?> </div>
          <div class="duur"><?php  echo $row['duur'] ?> </div><br>
          <div><img class="foto" src="<?php echo $row['afbeelding'] ?>" ></div>
          <div><a href="edit.php?id=<?php echo $row['id'] ?>" class="button">Bewerk deze track</div></a>
          <div><a href="delete.php?id=<?php echo $row['id'] ?>" class="button">Verwijder deze track</div></a>
        </div>
      <?php } ?>
    </div>
  </body>
</html>
