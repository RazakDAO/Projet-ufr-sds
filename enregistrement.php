<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Formulaire de connexion en HTML & CSS - Frenchcoder</title>
  <link rel="stylesheet" href="Styles/style-enregistrement.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
      <link rel="stylesheet" href="Styles/boostrap-5.2.3-dist/boostrap-5.2.3-dist/css/bootstrap.min.css">
</head>

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

    // Vérification si le formulaire a été soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupération des données du formulaire
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $Genre =  $_POST['Genre'];
        $date_naissance = $_POST['date_naissance'];
        $date_admission = $_POST['date_admission'];
        // Requête d'insertion des données dans la base de données
        $requete = $bdd->prepare("INSERT INTO formulaire (nom, prenom, Genre, date_naissance, date_admission) VALUES (?, ?, ?, ?, ?)");
        $requete->execute([$nom, $prenom, $Genre, $date_naissance, $date_admission]);

        // Confirmation de l'inscription
        echo '';
    }
} catch (PDOException $e) {
    // En cas d'erreur de connexion ou d'exécution de requête
    echo 'Erreur : ' . $e->getMessage();
}
?>


<body>

<form method="post" action="">
    <h1>Ajout d'etudiant</h1>
    <div class="social-media">
    <img src="Images/image1.png" alt="">
</div>
    <p class="choose-email">Formulaire d'ajout :</p>
    
    <div class="inputs">
      <input type="text" placeholder="Nom" name="nom" id="nom"/>
      <input type="text" placeholder="Prénom"name="prenom" id="prenom"/>
      <select name="Genre" id="Genre" class="select">
        <option value="Homme">Homme</option>
        <option value="Femme">Femme</option>
      </select>
      <label for="date_naissance">Date de naissance :</label>
      <input type="date" placeholder="Date de naissance" name="date_naissance" id="date_naissance"/>
      <label for="date_admission">Date d'admission</label>
      <input type="date"placeholder="Date d'admission" name="date_admission" id="date_admission"/>
    </div>
    
    <p class="inscription">Voir <a href="La liste des etudiants.php"><span>la liste des etudiants</span>.</p></a>
    <div align="center">
      <button type="submit">Se connecter</button>
    </div>
  </form>


</body>
</html>