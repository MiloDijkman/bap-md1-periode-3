<?php
require '../functions.php';

$id = (int) $_GET['id'];
$connection = dbConnect();
$track = deleteTrack($id, $connection);

if (empty($id)){
  echo 'Geen id!';
  exit;
}

    header('Location: index.php');



?>
