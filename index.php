<?php

try {
  $bdd = new PDO('mysql:host=localhost; dbname=moovy; charset=utf8', 'root', "");
} catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}

$result = $bdd->query("SELECT * FROM description");
// $description = $result->fetch(PDO::FETCH_OBJ);

// echo $description->titre;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>moovy</title>
  <link rel="stylesheet" href="./css/style.css" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!--Favicon-->
  <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
  <!--Police d'écriture-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Robotodisplay=swap" rel="stylesheet">
</head>

<body>
  <header>
    <nav>
      <div class="element-left">
        <img src="./images/logo.png" alt="logo moovy" />
        <ul>
          <a href="#">Accueil</a>
          <a href="#">Films</a>
          <a href="#">Séries</a>
          <a href="#" id="genre">Genres</a>
          <div class="genre-nav">
            <p>Action</p>
            <p>Comédie</p>
            <p>Animation</p>
            <p>Horreur</p>
            <p>Dramatique</p>
          </div>
        </ul>
      </div>
      <div class="element-right">
        <input type="search" name="" id="search" placeholder="Votre recherche" />
        <div class="profil">
          <i class="fa-solid fa-circle-user"></i>
        </div>
      </div>
    </nav>
    <section id="annonce">
      <div class="description-cover">
        <img src="./images/cover-breaking-bad.jpg" alt="cover film" id="cover-banner" class="active-banner">
        <p class="cover-text">Walter White, un professeur de chimie désillusionné qui se lance dans la fabrication de méthamphétamine après avoir été diagnostiqué d'un cancer en phase terminale. Déterminé à laisser un héritage financier à sa famille, Walter s'associe avec un ancien élève, Jesse Pinkman, pour produire et vendre de la drogue.

          Au fur et à mesure que Walter plonge plus profondément dans le monde du trafic de drogue, il devient un redoutable criminel sous le nom de "Heisenberg". Sa transformation en un homme impitoyable et sans scrupules est au cœur de la série, tout comme les conséquences désastreuses de ses actions sur sa famille et ses proches.

          Au cours des cinq saisons de la série, Walter et Jesse affrontent divers obstacles, y compris des cartels de la drogue, des criminels rivaux et des agents de la DEA. Leurs choix moraux sont souvent mis à l'épreuve alors qu'ils naviguent dans un monde de violence et de trahison.</p>

      </div>
      <div class="breaking-bad">
        <img src="./images/breaking-bad-wallpaper.jpg" alt="Breaking Bad" id="banner-wall" />
        <div class="bloc-infos">
          <p class="titre-movie">Breaking Bad</p>
          <div class="propriete-movie">
            <span class="note">99%</span>
            <span class="duree">45 min</span>
            <span class="genre">Action, Dramatique</span>
            <div class="btn-watch">
              <i class="fa-solid fa-play"></i>
              <p>Regarder</p>
            </div>



          </div>
        </div>
      </div>
      </div>
    </section>
  </header>
  <main>
    <section id="movies">
      <!-- ----------- -->
      <div class="list-movies">
        <?php while ($description = $result->fetch(PDO::FETCH_OBJ)) { ?>
          <?php //var_dump($description); 
          ?>
          <div class="cover-movie">
            <i class="fa-solid fa-play" class="play"></i>
            <div class="date"><?= $description->date ?></div>
            <div class="note-movie"><?= $description->note ?>%</div>
            <img src="<?= $description->images ?>" alt="<?= $description->titre ?>" />
            <p class="titre-movie-2"><?= $description->titre ?></p>
            <p class="genre-movie"><?= $description->genre ?></p>
          </div>
        <?php } ?>
      </div>



    </section>
  </main>
  <footer>
    <div class="footer-bloc">
      <a href="https://www.linkedin.com/in/mohamed-el-bermil-b957861bb/" target="_blank" id="footer-name">Mohamed EL BERMIL</a>
      <a href="https://soblim.com/" target="_blank" id="soblim">Agence SOBLIM</a>

    </div>
  </footer>
</body>
<script src="./js/script.js"></script>


<script>
  let noteMovie = document.querySelector('.note-movie');
  let noteValeur = parseFloat(noteMovie.textContent);

  if (noteValeur > 50) {
    noteMovie.classList.add('note-movie-good')
  }
</script>

</html>