<?php
$apiKey       = 'v2V9ZL5H';
$zoekopdracht = 'NachtWacht';

// Eerst uitproberen in je browser? GEBRUIK WEL JOUW API KEY!
// https://www.rijksmuseum.nl/api/nl/collection?key=JOUW_API_KEY&q=Feest;

$url  = 'https://www.rijksmuseum.nl/api/nl/collection?key=' . $apiKey . '&q=' . urlencode( $zoekopdracht );
$json = file_get_contents( $url );

// Haal comments tag hieronder weg, om te zien of de JSON goed terugkomt
// echo $json;

$data = json_decode( $json, true );
// Haal comments tag hieronder weg, om te zien hoe de structuur van de gegevens er uit ziet (zet ze de comment weer aan als je klaar bent)
//echo '<pre>' . print_r($data, true) . '</pre>';

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rijksmuseum</title>
	<style type="text/css">
		.artworks {
			display: grid;
			grid-template-columns: repeat(5, 20%);
			grid-gap: 20px;
		}


        	.artworks img {
         	   	max-height: 300px;
       	     		max-width: 100%;
       	 	}
	</style>
</head>
<body>
<h3>Kunstwerken met: <?php echo $zoekopdracht ?></h3>
<div class="artworks">
	<?php foreach ( $data['artObjects'] as $artwork ): ?>
    <div class="artwork">
      <a href="<?php echo $artwork['links']['web'] ?>"><img src="<?php echo $artwork['webImage']['url'] ?>"/></a>

      <h4><?php echo $artwork['title'] ?></h4>

    </div>



	<?php endforeach; ?>
</div>
</body>
</html>
