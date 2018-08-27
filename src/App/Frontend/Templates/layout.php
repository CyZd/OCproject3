<!DOCTYPE html>
<html>
  <head>
    <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
    <!-- <script src='/../lib/vendors/TinyMCE/tinymce/js/tinymce/tinymce.min.js'></script>
    <script type="text/javascript"></script> -->
    <title>
      <?= isset($title) ? $title : 'Bienvenue sur le site' ?>
    </title>
    <link rel='icon' href='/images/icon.png' type='image/png' />
    
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <meta name="description" content="" />
	  <meta name="keywords" content="" />
	  <meta name="author" content="" />
    
    <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />
	
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="/css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="/css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="/css/flexslider.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="/css/owl.carousel.min.css">
	<link rel="stylesheet" href="/css/owl.theme.default.min.css">
	
	<!-- Flaticons  -->
	<link rel="stylesheet" href="/fonts/flaticon/font/flaticon.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="/css/style.css">

	<!-- Modernizr JS -->
	<script src="/js/modernizr-2.6.2.min.js"></script>
	

  </head>
  
  <body>
    <div id="page">
      <header>
        <script>
        tinymce.init({
          selector: 'textarea',
          // inline: true,
          branding:false,
          elementpath:true,
          menubar: true,
          resize: 'both',
          //plugins:'image', 'paste',
          toolbar:'undo redo | formatselect | fontselect fontsizeselect | bold italic underline | alignleft aligncenter alignright alignjustify | indent outdent',
          paste_data_images: false,
          
        })
        </script>
        <div class="col-xs-2">
        
        </div>
      </header>
      <nav class="colorlib-nav" role="navigation">
        <h1 id="colorlib-logo"><a href="/">Jean Forteroche, écrivain</a></h1>
        <div class="top-menu">
          <div class="container">
          
            <div class="row">
              <div class="col-xs-10 text-right menu-1">
              <ul>
                <li><a href="/">Accueil</a></li>
                <?php if (!$user->isAuthenticated()) { ?>
                <li><a href="/admin/">Connexion</a></li>
                <?php } ?>
                <?php if ($user->isAuthenticated()) { ?>
                <li><a href="/admin/">Admin</a></li>
                <li><a href="/admin/news-insert.html">Ajouter une news</a></li>
                <li><a href="/admin/comment-list.html">Modérer les commentaires</a></li>
                <li><a href="/admin/change-pass.html">Changer de mot de passe</a></li>
                <li><a href="/admin/disconnect.html">Déconnexion</a></li>
                <?php } ?>
              </ul>
              </div>
            </div>
          </div>
        </div>
      </nav>
      
      <div id="colorlib-container">

        <section>
          <?php if ($user->hasFlash()) echo '<p style="text-align: center;">', $user->getFlash(), '</p>'; ?>
          
          <?= $content ?>
        </section>
      </div>

      	<!-- jQuery -->
	<script src="/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="/js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="/js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="/js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="/js/jquery.magnific-popup.min.js"></script>
	<script src="/js/magnific-popup-options.js"></script>
	<!-- Main -->
	<script src="/js/main.js"></script>

    
      <footer>
        <div id="colorlib-footer">
          Touts droits réservés J. Forteroche - 2018
          <a href="mailto:jforeteroche@scribmail.fr">Contact</a>
        </div>

      </footer>
    </div>
  </body>
</html>