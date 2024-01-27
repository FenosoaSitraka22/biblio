 <!DOCTYPE html>
 <html>

 <head>
     <title></title>
     <link rel="stylesheet" href="<?= URL ?>public/css/main.css">
 </head>

 <body>
     <nav>
         <a href="index.php" class="nav__link">
             <img src="<?= URL ?>public/images/logo.png" alt="" class="logo">
         </a>
         <ul class="nav__links">
             <li class="nav__item">
                 <a href="<?= URL ?>accueil" class="nav__link">Accueil</a>
             </li>
             <li class="nav__item">
                 <a href="<?= URL ?>livres" class="nav__link">Livres</a>
             </li>
             <li class="nav__item">
                 <a href="" class="nav__link">Se connecter</a>
             </li>
         </ul>
     </nav>
     <div class="container">
         <h1><?= $titre ?></h1>
         <?= $content ?>
     </div>
 </body>

 </html>