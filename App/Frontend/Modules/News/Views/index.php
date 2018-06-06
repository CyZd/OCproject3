<?php
foreach ($listeNews as $news)
{
?>
  <h2><a href="news-<?= $news['id'] ?>.html"><?= $news['titre'] ?></a></h2>
  <h4>Chapitre<?= $news['chapitre'] ?></h4>
  <p><?= nl2br($news['contenu']) ?></p>
<?php
}