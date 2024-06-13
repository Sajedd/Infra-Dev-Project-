<?php session_start() ?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>À Propos - Prestige</title>
  <link href="../CSS/about.css" rel="stylesheet" />
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
  <div class="container">
    <?php include("../navbar.php") ?>
    <script>
      const logo = document.getElementById("logo")
      logo.src = "../assets/img/Golden-Silver-Prestige.png"
    </script>

    <main>
      <h1>À Propos de Notre Équipe</h1>
      <div class="team">
        <div class="person">
          <div class="sajed">
            <h2>Sajed (Dev)</h2>
            <p>
              Sajed s'est occupé du design des différentes pages telles que l'authentification, le profil, le panier, etc. Il a également géré le routage et la gestion de l'authentification de l'utilisateur. De plus, il a travaillé sur le front du dashboard. Sajed a aussi développé les API CRUD pour la gestion des produits et des utilisateurs, intégrant ainsi l'ensemble des fonctionnalités de développement nécessaires au projet.
            </p>
            <div class="social-links">
              <a href="https://www.linkedin.com/in/sajed-benyoussef" target="_blank">LinkedIn</a>
              <a href="https://github.com/Sajedd" target="_blank">GitHub</a>
              <a href="../about/CV/Ben Youssef Sajed (2).pdf" target="_blank">CV</a>
            </div>
          </div>
        </div>
        <div class="person">
          <h2>Abdoulaye (Back-End Infra)</h2>
          <p>
            Abdoulaye a été responsable de la mise en place de l'infrastructure système et réseaux, y compris les serveurs BD, web, mail, et DNS. Il a également configuré le pare-feu, automatisé des tâches, et géré la sécurité des accès, assurant ainsi une infrastructure robuste et sécurisée pour le projet.
          </p>
          <div class="social-links">
            <a href="https://www.linkedin.com/in/abdoulaye-camara-88067b296/" target="_blank">LinkedIn</a>
            <a href="https://github.com/abdouc95" target="_blank">GitHub</a>
            <a href="../about/CV/abdoulaye_camara__1.pdf" target="_blank">CV</a>
          </div>
        </div>
    </main>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>