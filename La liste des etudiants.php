<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles/style-tableau.css">
    <link rel="stylesheet" href="Styles/boostrap-5.2.3-dist/boostrap-5.2.3-dist/css/bootstrap.min.css">
    <title>La liste des etudiants</title>
</head>
<body>
<?php
// Informations de connexion à la base de données
$serveur = 'localhost';
$utilisateur = 'root';
$motDePasse = '';
$nomBaseDeDonnees = 'bdd_formulaire';

try {
    // Connexion à la base de données avec PDO
    $bdd = new PDO("mysql:host=$serveur;dbname=$nomBaseDeDonnees", $utilisateur, $motDePasse);

    // Configuration des erreurs PDO pour afficher les exceptions
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupération des données de la table
    $requete = $bdd->query("SELECT * FROM formulaire");
    $donnees = $requete->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // En cas d'erreur de connexion ou d'exécution de requête
    echo 'Erreur : ' . $e->getMessage();
}
?>
<div id="viewport">
  <!-- Sidebar -->
  <div id="sidebar">
    <header>
      <a href="enregistrement.php"><img src="Images/image1.png" alt="" class="img"></a>
    </header>
    <ul class="nav">
      <li>
        <a href="#">
          <i class="zmdi zmdi-view-dashboard"></i> Dashboard
        </a>
      </li>
      <li>
        <a href="#">
          <i class="zmdi zmdi-link"></i> Shortcuts
        </a>
      </li>
      <li>
        <a href="#">
          <i class="zmdi zmdi-widgets"></i> Overview
        </a>
      </li>
      <li>
        <a href="#">
          <i class="zmdi zmdi-calendar"></i> Events
        </a>
      </li>
      <li>
        <a href="#">
          <i class="zmdi zmdi-info-outline"></i> About
        </a>
      </li>
      <li>
        <a href="#">
          <i class="zmdi zmdi-settings"></i> Services
        </a>
      </li>
      <li>
        <a href="#">
          <i class="zmdi zmdi-comment-more"></i> Contact
        </a>
      </li>
    </ul>
  </div>
  <!-- Content -->
  <div id="content">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <img src="Images/image1.png" alt="" class="img">
      </div>
    </nav>
    <div class="container-fluid">
    <table>
  <thead>
    <tr>
      <th>Nom</th>
      <th>Prénom</th>
      <th>Genre</th>
      <th>Date de naissance</th>
      <th>Date d'admission</th>
      <th>ID</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($donnees as $row) : ?>
    <tr>            
        <td><?php echo $row['nom']; ?></td>
        <td><?php echo $row['prenom']; ?></td>
        <td><?php echo $row['genre']; ?></td>
        <td><?php echo $row['date_naissance']; ?></td>
        <td><?php echo $row['date_admission']; ?></td>
        <td><?php echo $row['id']; ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
    </div>
  </div>
</div>

</body>
</html>