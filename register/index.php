<?php
// Import de la connection à la database sous la forme de la variable "$db"
require_once("../utils/connect.php");

// Regex du mot de passe, il doit contenir :
// - 1 caractère spécial
// - 1 lettre majuscule
// - 1 lettre minuscule
// - 1 chiffre
// - 8 caractère minimum

$PASSWORD_REGEXP = "^(?=.*[A-Z])(?=.*[!@#$&*])(?=.*[0-9])(?=.*[a-z]).{8}$^";

// Envoi du formulaire de création d'un utilisateur
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Vérification du remplissage des champs coté serveur
    if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirmPWD']) && !empty($_POST['firstname']) && !empty($_POST['lastname'])) {
        $lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];
        $email = $_POST['email'];


        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $confirm_password = password_verify($_POST['confirmPWD'], $password);

        // Vérification de la correspondance entre le mot de passe et sa confirmation
        if (!$confirm_password) {
            die("Les mot de passe ne corresspondent pas");
        } else {

            // Requête d'insert de l'utilisateur à la base de données
            $postQuery = $db->prepare("INSERT INTO `users` (`Lastname`, `Firstname`, `Email`, `Passwd`) VALUES (?,?,?,?);");
            $postQuery->bind_param("ssss", $lastname, $firstname, $email, $password);
            try {
                $postQuery->execute();
                echo "user inscris !";
            } catch (Exception $e) {
                throw $e;
            }
            // attribution de la photo de profil par défaut
            try {
                $tmpFile = tempnam('./', 'TMP');
                $err = copy('./Default_pfp.jpg', $tmpFile);

                $image = file_get_contents($tmpFile);

                $actualUser = $db->query("SELECT * from users WHERE Email='$email'")->fetch_assoc();

                $addPhoto = $db->prepare("INSERT INTO `users_photo` (`UserId`, `Image`) VALUES (?,?);");
                $addPhoto->bind_param("ss", $actualUser["UserId"], $image);
                echo $actualUser["UserId"];
                $addPhoto->execute();
                echo "Photo ajouté avec succès !";
                unlink($tmpFile);
            } catch (\Throwable $th) {
                throw $th;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        <?php include("../CSS/register.css") ?>
    </style>
    <title>register</title>
</head>

<body>
    <div class="container">
        <?php include("../navbar.php") ?>
        <script>
            const logo = document.getElementById("logo")
            logo.src = "../assets/img/Blue-Prestige.png"
        </script>
        <form method="post" action="./">
            <label for="lastname">Nom :</label><br>
            <input type="text" id="lastname" name="lastname"><br><br>
            <label for="firstname">Prénom :</label><br>
            <input type="text" id="firstname" name="firstname"><br>
            <label for="email">Email:</label><br>
            <input type="text" id="email" name="email"><br><br>
            <label for="password">Mot de passe :</label><br>
            <input type="password" id="password" name="password"><br><br>
            <label for="confirmPWD">Confirmer le mot de passe :</label><br>
            <input type="password" id="confirmPWD" name="confirmPWD"><br><br>
            <input type="submit" value="Envoyer">
        </form>
</body>

</html>