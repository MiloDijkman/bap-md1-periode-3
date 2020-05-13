<?php
require 'includes/functions.php';
$connection = dbConnect();

// Standaard pagina = 1
$page = 1;

if ( isset( $_GET['page'] ) ) {
	// Tenzij in de url een page paramater staat, dan die waarde gebruiken
	$page = (int) $_GET['page'];
}

$pagesize = //TODO: Hoeveel resultaten per pagina wil je?
$result = getCountries( $connection, $page, $pagesize );
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Countries</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<section class="countries">
	<?php foreach ( $result['statement'] as $country ): ?>
        <div class="country">
            <h2><?php echo $country['name'] ?></h2>
			<?php
			//TODO: Laat hier andere gegevens van een land zien uit de "country" table
			?>
        </div>
	<?php endforeach ?>
</section>
<div class="pagination">
	<?php for ( $i = 1; $i <= $result['pages']; $i ++ ): ?>
        <a href="index.php?page=<?php //TODO Juiste paginanummer hier zetten?>" class="pagination__number"><?php //TODO: Juiste pagina nummer hier zetten ?></a>
	<?php endfor; ?>
</div>
</body>
</html>
