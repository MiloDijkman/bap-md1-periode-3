<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <form action="update.php" method="post">
      <input type="hidden" name="id" value="<?php echo $track ['id']?>" />

      <p>
        <label for="">Titel</label>
        <input type="text" value="<?php echo $track ['titel']?>" name="titel">
      </p>

      <p>
        <label for="">Artiest</label>
        <input type="text" value="<?php echo $track ['artist']?>" name="artist">
      </p>

      <p>
        <label for="">Album</label>
        <input type="text" value="<?php echo $track ['album']?>" name="album">
      </p>

      <p>
        <label for="">Duur</label>
        <input type="text" value="<?php echo $track ['duur']?>" name="duur">
      </p>

      <p>
        <label for="">Afbeelding</label>
        <input type="text" value="<?php echo $track ['Afbeelding']?>" name="Afbeelding">
      </p>


       <input type="submit" /></p>
    </form>

  </body>
</html>
