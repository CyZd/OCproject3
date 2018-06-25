<p>Par <em><?= $news['auteur'] ?></em>, le <?= $news['dateAjout']->format('d/m/Y à H\hi') ?></p>
<h2><?= $news['titre'] ?></h2>
<h4>Chapitre <?= $news['chapitre'] ?></h4>


<?php if ($news['imgPath']!= null) { ?>
      <?php echo '<img src="'.htmlentities($news['imgPath']).'" />'; ?>
    <?php } ?>

<?php if ($user->isAuthenticated() && ($news['imgPath']!= null)) { ?> 
      <a href="admin/image-delete-<?= $news['id'] ?>.html">Supprimer l'image</a> 
    <?php } ?>

<p><?= nl2br($news['contenu']) ?></p>

<?php if ($news['dateAjout'] != $news['dateModif']) { ?>
  <p style="text-align: right;"><small><em>Modifiée le <?= $news['dateModif']->format('d/m/Y à H\hi') ?></em></small></p>
<?php } ?>


<p><a href="commenter-<?= $news['id'] ?>.html">Ajouter un commentaire</a></p>

<?php
if (empty($comments))
{
?>
<p>Aucun commentaire n'a encore été posté. Soyez le premier à en laisser un !</p>
<?php
}

foreach ($comments as $comment)
{
?>
<fieldset>
  <legend>
    Posté par <strong><?= htmlspecialchars($comment['auteur']) ?></strong> le <?= $comment['date']->format('d/m/Y à H\hi') ?>
    <?php if ($user->isAuthenticated()) { ?> -
      <a href="admin/comment-update-<?= $comment['id'] ?>.html">Modifier</a> |
      <a href="admin/comment-delete-<?= $comment['id'] ?>.html">Supprimer</a>
    <?php } ?>
  </legend>
  <p><?= nl2br(($comment['contenu'])) ?></p>
  <legend>
  <?php if ($comment['report'] == 0) { ?>
      <a href="signaler-<?= $comment['id'] ?>.html">Signaler ce commentaire</a>
    <?php } 
        else if ($comment['report'] == 1) {?>
      <p>Ce commentaire est en cours de modération.</p>
    <?php } 
       else if ($comment['report'] == 2) {?>
        <p>Ce commentaire a été vérifié par l'administrateur.</p>
    <?php }?> 
  </legend>
</fieldset>
<?php
}
?>

<p><a href="commenter-<?= $news['id'] ?>.html">Ajouter un commentaire</a></p>
