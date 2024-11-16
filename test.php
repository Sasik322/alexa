<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>massil</title>
</head>
<body>

<?php 

$dataFile = 'users.json';
$cars = json_decode(file_get_contents($dataFile), true);

if ($cars === null) {
    echo "Error loading or decoding JSON data.";
    exit();
}

$max = 0;
$maxvalues = [];

foreach ($cars as $car) {
    if ($car['Score'] > $max) {
        $max = $car['Score'];
    }
}

foreach ($cars as $car) {
    if ($car['Score'] == $max) {
        $maxvalues[] = $car['Nom'] . " " . $car['Prenom'];
    }
}

if (count($maxvalues) > 0) {
    echo $maxvalues[rand(0, count($maxvalues) - 1)];
} else {
    echo "No values found.";
}

?>

</body>
</html>
