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

<header class="topnav" id="myTopnav">
        <a href="enregistrement.php"><img class="logo" src="Images/image1.png" alt="Smiley face"></a>
        <div class="navlist" id="navlist">
            <a class="cursor0" href="#home">&nbsp</a>
            <a class="navoption active" href="#home">Accueil</a>
            <a class="navoption" href="enregistrement.php">Ajouter un étudiant</a>
            <a class="navoption" href="#contact">Modification</a>
            <a class="navoption" href="#about">Rechercher</a>
            <a class="navoption" href="#about">afficher la liste des étudiants</a>
            <a href="javascript:void(0);" class="icon" id="hamburger">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </header>
    
    <section>
    <h1>My ufr-sds-online</h1>
    <p>L'application web officiel de l'UFR-SDS de l'Universté Joseph Ky ZERBO</p>
    </section>


    <div class="table-responsive">
    <table class="table">
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

<footer class="footer-area footer--light">
  <div class="footer-big">

  <!-- end /.footer-big -->

  <div class="mini-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="copyright-text">
            <p>Copyright © 2023
              <a href="#">Simplon Burkina</a>. All rights reserved. Created by
              <a href="#">Razak DAO</a>
            </p>
          </div>

          <div class="go_top">
            <span class="icon-arrow-up"></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

<script>
    $( document ).ready(function() {

var opcionesnav = $('.navoption').length;
var clickhamb=0;

$("#hamburger").click(function(){
    clickhamb = 1;
    var header = $("#myTopnav");
    if (header[0].classList.length == 1) {
        header.addClass ("responsive");
        $("header").height((opcionesnav+1)*48);
        $(".navlist a:not(.icon)").css("display", "block");
        setTimeout(
            function()
            {
                $(".navlist a:not(.icon)").css("transform", "translateX(0px)");
            }, 50);

    } else {
        $(".navlist a:not(.icon)").css("transform", "translateX(600px)");
        header.height(48);
        setTimeout(
            function()
            {
                header.removeClass("responsive");
                header.height(48);
                $(".navlist a:not(.icon)").css("display", "none");
            }, 1600);
    }
});


$(window).on('resize', function(){
    console.log(clickhamb);
    if (($(window).width() > 600) && (clickhamb==1)){
        console.log(clickhamb + "     " + $(window).width());
        $("#myTopnav").height(48);
        $(".navlist a:not(.icon)").css("display", "block");
        setTimeout(
            function()
            {
                $(".navlist a:not(.icon)").css("transform", "translateX(0px)");
            }, 500);
    }
});

});
</script>


</body>
</html>