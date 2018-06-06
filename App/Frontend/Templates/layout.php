<!DOCTYPE html>
<html>
  <head>
    <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
    <!-- <script src='/../lib/vendors/TinyMCE/tinymce/js/tinymce/tinymce.min.js'></script>
    <script type="text/javascript"></script> -->
    <title>
      <?= isset($title) ? $title : 'Bienvenue sur le site' ?>
    </title>
    
    <meta charset="utf-8" />
    
    <link rel="stylesheet" href="/css/Envision.css" type="text/css" />
  </head>
  
  <body>
    <div id="wrap">
      <header>
        <script>
        tinymce.init({
          selector:'textarea',
          branding:false,
          elementpath:false,
          menubar:false,
          resize: 'both',
          plugins:'image',
          toolbar:'undo redo | formatselect | fontselect fontsizeselect | bold italic underline | alignleft aligncenter alignright alignjustify | indent outdent',
          
        })
        </script>
        <h1><a href="/">Bienvenue sur mon blog</a></h1>
      </header>
      
      <nav>
        <ul>
          <li><a href="/">Accueil</a></li>
          <!-- <li><a href="/jobs/">Job board</a></li> -->
          <?php if (!$user->isAuthenticated()) { ?>
          <li><a href="/admin/">Connexion</a></li>
          <?php } ?>
          <?php if ($user->isAuthenticated()) { ?>
          <li><a href="/admin/">Admin</a></li>
          <li><a href="/admin/news-insert.html">Ajouter une news</a></li>
          <li><a href="/admin/comment-list.html">Modérer les commentaires</a></li>
          
          <!-- <li><a href="/admin/jobs-insert.html">Ajouter une offre d'emploi</a></li> -->
          <li><a href="/admin/disconnect.html">Déconnexion</a></li>
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