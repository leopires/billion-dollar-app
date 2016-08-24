<?php

if (!$_POST)
    header("Location: index.html");

$brand = $_POST['selBrands'];
$model = $_POST['txtModel'];
$year = $_POST['txtYear'];

if (($brand) && ($model) && ($year)) {
 
    $errorMessage = NULL;
    $db = NULL;
    
    try {

        $db = new PDO("sqlite:db/db-billion-dollar-app.sqlite");
        $query = $db->prepare("INSERT INTO CAR_MODELS (MODEL, YEAR, BRAND_ID) VALUES (?, ?, ?)");
        if (!$query->execute(array("{$model}", $year, $brand))) {
            $errorMessage = $query->errorInfo()[2];
        }
    } catch (PDOException $ex) {
        $errorMessage = $ex->getMessage();
    } finally {
        $db = NULL;
    }

    if ($errorMessage) {
        header("Location: models.php?error=" . $errorMessage);
    } else {
        header("Location: models.php");
    }
    
}
?>