<?php
/**
 * Verbinding maken met de database
 *
 * @return bool|PDO
 */
function dbConnect() {

	// Lees het config bestand in en sla de array uit config op in een variabele
	$config = require( __DIR__ . '/config.php' );

	try {
		// Verbinding maken met gebruik van de database instellingen die in de variabelen zijn opgeslagen
		$connection = new PDO( 'mysql:host=' . $config['hostname'] . ';dbname=' . $config['database'], $config['username'], $config['password'] );
		$connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$connection->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC );

		return $connection;

	} catch ( PDOException $e ) {
		echo "Fout bij verbinding met de database: " . $e->getMessage();
		exit;
	}

	return false;

}

function getTracksPage()

/**
 * Geeft het totaal aantal rijen terug
 *
 * @param $connection
 *
 * @return int
 */
function getTotalCountries( $connection ) {
	$sql       = ''; //TODO: Hier de juiste query zetten om het totaal aantal countries te tellen
	$statement = $connection->query( $sql );

	return (int) $statement->fetchColumn();
}

/**
 * Haalt alle landen op voor het opgegeven paginanummer
 *
 * @param \PDO $connection The database connection
 * @param int $page Pagenumber
 * @param int $pagesize Number of results per page
 *
 * @return array
 */
function getCountries( $connection, $page = 1, $pagesize = 5 ) {

	// De parameter $page naar een getal omzetten met (int)
	$page      = (int) $page;

	// Beginnen met de SQL query om ALLES op te halen
	$sql = 'SELECT * FROM `country`';

	// Alle gegevens ophalen die nodig zijn om pagina nummers te berekenen
	$total     = //TODO: Het totaal aantal landen ophalen (check de functie in dit bestand!)
	$num_pages = (int) round( //TODO: welke berekening moet hier komen? Gebruik de variabelen );


	// Als pagina nummer te groot is dan naar laatste pagina zetten
	$offset = //TODO: Hoe bereken je waar je moet beginnen (welke variabelen kun je hiervoor gebruiken?)

	// Nu plakken we de juiste LIMIT en OFFSET achter de SQl die we al hadden
	$sql    .= ' LIMIT ' . /** TODO Vul hier het aantal wat je wilt in (gebruik de juiste variabele)  */. ' OFFSET '.  $offset;


	$statement = $connection->query( $sql );

	// Deze array met informatie geeft de functie terug
	return [
		'statement' => $statement,
		'total'     => /** TODO: Vul de juiste variabele hier in */,
		'pages'     => /** TODO: Vul de juiste variabele hier in */,
		'page'      => /** TODO: Vul de juiste variabele hier in */
	];

}
