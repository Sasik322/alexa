<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Accueil</title>
    <h1> ACCUEIL </h1>
</head>
<body>
    <?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $answer1 = $_POST['question-1'];
        $answer2 = $_POST['question-2'];
        $answer3 = $_POST['question-3'];
        $answer4 = $_POST['question-4'];
        $answer5 = $_POST['question-5'];

        $totalCorrect = 0;

        if ($answer1 == "A") { $totalCorrect++; }
        if ($answer2 == "A") { $totalCorrect++; }
        if ($answer3 == "A") { $totalCorrect++; }
        if ($answer4 == "A") { $totalCorrect++; }
        if ($answer5 == "A") { $totalCorrect++; }
        

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mdp = $_POST['mdp'];

        $clown = [
            "Nom" => $nom,
            "Prenom" => $prenom,
            "Mdp" => $mdp,
            "Score" => $totalCorrect
        ];

        $filePath = 'users.json';

        if (file_exists($filePath)) {
            $jsonData = file_get_contents($filePath);
            $data = json_decode($jsonData, true);
            if (!is_array($data)) {
                $data = [];
            }
        } else {
            $data = [];
        }

        $daun = false;
        for ($i = 0; $i < count($data); $i++) {
            $vremenniychel = $data[$i];

            if (strtoupper($clown["Nom"]) == strtoupper($vremenniychel["Nom"]) && 
                strtoupper($clown["Prenom"]) == strtoupper($vremenniychel["Prenom"])) {
                $daun = true;
            }
        }

        if ($daun == false) {
            $data[] = $clown;
            $jsonData = json_encode($data, JSON_PRETTY_PRINT);

            if (file_put_contents($filePath, $jsonData)) {
                echo "Data successfully saved to $filePath";
            } else {
                echo "Error saving data to file.";
            }
        } else {
            echo "Un utilisateur avec ce prénom et ce nom est déjà enregistré, contactez l'administrateur pour supprimer votre ancien compte";
        }
    }
    ?>

</body>
</html>
