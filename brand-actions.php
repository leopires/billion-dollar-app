<?php

if (!$_POST)
    header("Location: index.html");

$brandName = $_POST['txtBrand'];

if ($brandName) {

    $errorMessage = NULL;
    $db = NULL;
    
    try {

        $db = new PDO("sqlite:db/db-billion-dollar-app.sqlite");
        $query = $db->prepare("INSERT INTO CAR_BRANDS (BRAND) VALUES (?)");
        if (!$query->execute(array("{$brandName}"))) {
            $errorMessage = $query->errorInfo()[2];
        }
    } catch (PDOException $ex) {
        $errorMessage = $ex->getMessage();
    } finally {
        $db = NULL;
    }

    if ($errorMessage) {
        header("Location: brands.php?error=" . $errorMessage);
    } else {
        header("Location: brands.php");
    }
}
?>