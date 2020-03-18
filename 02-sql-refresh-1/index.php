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
