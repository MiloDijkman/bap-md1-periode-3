<?php
require 'includes/functions.php';

$connection = dbConnect();

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $firstname   = filter_var( $_POST['firstname'], FILTER_SANITIZE_STRING );
        $lastname    = filter_var( $_POST['lastname'], FILTER_SANITIZE_STRING );
        $city        = filter_var( $_POST['city'], FILTER_SANITIZE_STRING );
        $birthdate   = filter_var( $_POST['birthdate'], FILTER_SANITIZE_STRING );
        $description = filter_var( $_POST['description'], FILTER_SANITIZE_STRING );
        $company = filter_var($_POST["company"], FILTER_SANITIZE_STRING);

        $sql = "INSERT INTO people (firstname, lastname, city, birthdate, description, company) VALUES (:firstname, :lastname, :city, :birthdate, :description, :company);";

        $statement = $connection->prepare( $sql );
        $params    = [
            'firstname'   => $firstname,
            'lastname'    => $lastname,
            'city'        => $city,
            'birthdate'   => $birthdate,
            'description' => $description,
            "company" => $company
        ];
        $statement->execute( $params );
        header("Location: index.php");
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add person</title>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<form action="add_person.php" method="POST">
    <div class="form-row">
        <label for="firstname">Firstname</label>
        <input type="text" name="firstname" value="">
    </div>
    <div class="form-row">
        <label for="lastname">Lastname</label>
        <input type="text" name="lastname" value="">
    </div>
    <div class="form-row">
        <label for="city">City</label>
        <input type="text" name="city" value="">
    </div>
    <div class="form-row">
        <label for="birthdate">Birthdate</label>
        <input type="date" name="birthdate" required pattern="\d{4}-\d{2}-\d{2}">
    </div>
    <div class="form-row">
        <label for="company">Company</label>
        <input type="text" name="company" value="">
    </div>
    <div class="form-row">
        <label for="description">Description</label>
        <textarea name="description" id="" cols="30" rows="10">
        </textarea>
    </div>
    <button>Opslaan</button>
</form>
<hr>
<p>
    <a href="./index.php">Terug naar het overzicht</a>
</p>
</body>
</html>
