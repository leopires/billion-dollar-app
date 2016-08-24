<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>1 Billion Dollar App: Brands</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
<div id="wrapper">
    <h3>Brands List</h3>
    <ul id="main-menu">
        <li><a href="brand-new.php">New Brand</a></li>
    </ul>
    <table id="grid-brands" class="grid" cellpadding="0" cellspacing="5px">
        <tr id="grid-header">
            <td>ID</td>
            <td>Brand</td>
        </tr>
        <?php

        try {
            $database = new PDO("sqlite:db/db-billion-dollar-app.sqlite");
            $result = $database->query("SELECT * FROM CAR_BRANDS ORDER BY BRAND ASC");

            if($result) {
                foreach ($result as $row) {
                    $tableRow = "<tr class='grid-row-data'>\n";
                    $tableRow .= "<td>" . $row[0] . "</td>\n";
                    $tableRow .= "<td>" . $row[1] . "</td>\n";
                    $tableRow .= "</tr>";
                    echo $tableRow;
                }
            }
        } catch (Exception $ex) {
            echo "<tr><td colspan='2'>" . $ex->getMessage() . "</td></tr>";
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