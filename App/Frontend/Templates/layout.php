<!DOCTYPE html>
<html>
  <head>
    <title>
      <?= isset($title) ? $title : 'Bienvenue sur le site' ?>
    </title>
    
    <meta charset="utf-8" />
    
    <link rel="stylesheet" href="/css/Envision.css" type="text/css" />
  </head>
  
  <body>
    <div id="wrap">
      <header>
        <h1><a href="/">Blog TP_appli, bienvenue</a></h1>
        <p>Catégories:</p>
      </header>
      
      <nav>
        <ul>
          <li><a href="/">Accueil</a></li>
          <li><a href="/jobs/">Job board</a></li>
          <?php if (!$user->isAuthenticated()) { ?>
          <li><a href="/admin/">Connexion</a></li>
          <?php } ?>
          <?php if ($user->isAuthenticated()) { ?>
          <li><a href="/admin/">Admin</a></li>
          <li><a href="/admin/news-insert.html">Ajouter une news</a></li>
          <li><a href="/admin/jobs-insert.html">Ajouter une offre d'emploi</a></li>
          <?php } ?>
        </ul>
      </nav>
      
      <div id="content-wrap">
        <section id="main">
          <?php if ($user->hasFlash()) echo '<p style="text-align: center;">', $user->getFlash(), '</p>'; ?>
          
          <?= $content ?>
        </section>
      </div>
    
      <footer></footer>
    </div>
  </body>
</html>