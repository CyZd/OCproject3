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
          toolbar:'undo redo | formatselect | fontselect fontsizeselect | bold italic underline | alignleft aligncenter alignright alignjustify | indent outdent | insert',
          insert_button_items: 'image link',
          images_upload_url: '/../lib/vendors/Model/imageValidator.php',
          images_upload_base_path: '/Uploaded',
          images_upload_credentials: true
        })
        tinymce.activeEditor.uploadImages(function(success){
          document.forms[0].submit();
        })
        </script>
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