<?php
use \koolreport\widgets\koolphp\Table;
?>
<html>
    <head>
    <title>School Student Report</title>
    </head>
    <body>
        <h1>It works</h1>
        <?php
        Table::create([
            "dataSource"=>$this->dataStore("students")
        ]);
        ?>
    </body>
</html>
