<p>Par <em><?= $job['auteur'] ?></em>, le <?= $job['dateAjout']->format('d/m/Y') ?></p>
<h2><?= $job['titre'] ?></h2>
<p><?= nl2br($job['lieu']) ?></p>
<p><?= nl2br($job['renum']) ?> euros.</p>
<p><?= nl2br($job['contenu']) ?></p>
<p>Vous avez jusqu'au <?= $job['dateExpire']->format('d/m/Y') ?> pour postuler.</p>


<?php if ($job['dateAjout'] != $job['dateModif']) { ?>
  <p style="text-align: right;"><small><em>Modifié le <?= $job['dateModif']->format('d/m/Y à H\hi') ?></em></small></p>
<?php } ?>

<p><a href="postuler-<?= $job['id'] ?>.html">Postuler pour cette offre.</a></p>

