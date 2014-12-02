<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php 

    $fp = fopen('import.csv', 'r');

    echo '<pre>';

    $i = 0;
    while ($csv = fgetcsv($fp)) {
        $i++;
        
        $date = $csv[0];
        array_shift($csv);
        $obj = array(
            "_id" => $i . time(),
            "movies" => array_filter($csv),
        );

        $m   = new MongoClient();
        $db  = $m->selectDB('washido');
        $col = new MongoCollection($db, 'users');

        $res = $col->insert($obj);
        print_r($res);
    }
?>
</body>
</html>