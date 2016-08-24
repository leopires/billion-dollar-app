<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>1 Billion Dollar App: New Model</title>
        <link rel="stylesheet" type="text/css" href="style/style.css">
    </head>
    <body>
        <div id="wrapper">
            <h3>New Model</h3>
            <form id="form-new-model" action="model-actions.php" method="post">
                <div class="form">
                    <div class="form-row">
                        <label>Brand:</label>
                        <select name="selBrands">
                            <option value="0">Brands</option>
                            <?php
                            try {
                                $database = new PDO("sqlite:db/db-billion-dollar-app.sqlite");
                                $result = $database->query("SELECT BRAND_ID, BRAND FROM CAR_BRANDS ORDER BY BRAND ASC");
                                if ($result) {
                                    foreach ($result as $row) {
                                        echo "<option value='{$row[0]}'> {$row[1]} </option>\n";
                                    }
                                }
                            } catch (Exception $ex) {
                                var_dump($ex->getMessage());
                            } finally {
                                $database = NULL;
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-row">
                        <label>Model:</label>
                        <input type="text" name="txtModel"/>
                    </div>
                    <div class="form-row">
                        <label>Year:</label>
                        <input type="text" name="txtYear" class="small"/>
                    </div>
                    <div class="form-actions">
                        <input type="submit" name="btnSave" value="Save"/>
                    </div>
                </div>
            </form>
            <ul id="bottom-menu">
                <li><a href="models.php">Back</a></li>
            </ul>
        </div>
    </body>
</html>

