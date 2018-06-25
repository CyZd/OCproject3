<?php
foreach ($listeNews as $news)
{
?>
  <h2><a href="news-<?= $news['id'] ?>.html"><?= $news['titre'] ?></a></h2>
  <h4>Chapitre<?= $news['chapitre'] ?></h4>

  <?php if ($news['imgPath']!= null) { ?>
      <?php echo '<img src="'.htmlentities($news['imgPath']).'" />'; ?>
  <?php } ?>

  <p><?= nl2br($news['contenu']) ?></p>
<?php
}