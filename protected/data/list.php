<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Listagem</title>
</head>
<body>
<pre>
<?php 
    $m   = new MongoClient();
    $db  = $m->selectDB('washido');
    $col = new MongoCollection($db, 'users');

    $res = $col->find(array());
    $movies = array();
    foreach ($res as $doc) {
        
        foreach ($doc['movies'] as $m) {
            $m = strtoupper($m);

            if(!in_array($m, $movies)){
                $movies[] = $m;
            }

        }

    }

    // echo "<table>";
    // foreach ($movies as $i => $m) {
    //     foreach ($movies as $j => $n) {
    //         if ($i !== $j) {
    //             similar_text($m, $n, $percent);
    //             if($percent > 50){
    //                 echo "<tr>";
    //                 echo "<td>{$m}</td>";
    //                 echo "<td>{$n}</td>";
    //                 echo "<td>" . $percent . "</td>";
    //                 echo "</tr>";
    //             }
    //         }
    //     }
    // }
    // echo "</table>";

    echo '<h1>'.count($movies).'</h1>';
    print_r($movies);

?>
</pre>
</body>
</html>