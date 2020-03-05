<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <form action="process.php" method="post">

      <p>
        <label for="">Titel</label>
        <input type="text" value="" name="titel">
      </p>

      <p>
        <label for="">Artiest</label>
        <input type="text" value="" name="artiest">
      </p>

      <p>
        <label for="">Album</label>
        <input type="text" value="" name="album">
      </p>

      <p>
        <label for="">Duur</label>
        <input type="text" value="" name="duur">
      </p>

      <p>
        <label for="">Afbeelding</label>
        <input type="url" value="" name="afbeelding">
      </p>


       <input type="submit" /></p>
    </form>
    <input type='button'value='Terug naar de tracks' class="btn" onclick="document.location.href='index.php';"/>

  </body>
</html>
