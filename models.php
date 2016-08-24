<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>1 Billion Dollar App: Brands</title>
        <link rel="stylesheet" type="text/css" href="style/style.css">
    </head>
    <body>
        <div id="wrapper">
            <h3>Models List</h3>
            <ul id="main-menu">
                <li><a href="model-new.php">New Model</a></li>
            </ul>
            <table id="grid-models" class="grid" cellpadding="0" cellspacing="5px">
                <tr id="grid-header">
                    <td>Model ID</td>
                    <td>Brand</td>
                    <td>Model</td>
                    <td>Year</td>
                </tr>
                <?php
                try {
                    $querySQL = "SELECT "
                            . "CM.MODEL_ID, "
                            . "CB.BRAND, "
                            . "CM.MODEL, "
                            . "CM.YEAR "
                            . "FROM "
                            . "CAR_MODELS CM, CAR_BRANDS CB "
                            . "WHERE CM.BRAND_ID = CB.BRAND_ID "
                            . "ORDER BY CB.BRAND ASC, CM.YEAR ASC, CM.MODEL ASC";

                    $database = new PDO("sqlite:db/db-billion-dollar-app.sqlite");
                    $result = $database->query($querySQL);

                    if ($result) {
                        foreach ($result as $row) {
                            $tableRow = "<tr class='grid-row-data'>\n";
                            $tableRow .= "<td class='small'>" . $row[0] . "</td>\n";
                            $tableRow .= "<td class='medium'>" . $row[1] . "</td>\n";
                            $tableRow .= "<td class='medium'>" . $row[2] . "</td>\n";
                            $tableRow .= "<td class='small'>" . $row[3] . "</td>\n";
                            $tableRow .= "</tr>";
                            echo $tableRow;
                        }
                    } else {
                        echo "<tr><td colspan='4'> No data! </td></tr>";
                    }
                } catch (Exception $ex) {
                    echo "<tr><td colspan='4'>" . $ex->getMessage() . "</td></tr>";
                } finally {
                    $database = NULL;
                }
                ?>
            </table>
            <ul id="bottom-menu">
                <li><a href="index.html">Voltar</a></li>
            </ul>
        </div>
    </body>
</html>