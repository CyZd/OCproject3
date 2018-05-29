<!DOCTYPE html>
<html>
<meta charset="utf-8"/>
<?php
foreach ($listeJobs as $job)
{
?>
  <h2><a href="job-<?= $job['id'] ?>.html"><?= $job['titre'] ?></a></h2>
  <p>Lieu: <?= nl2br($job['lieu']) ?></p>
  <p>Rémunération : <?= nl2br($job['renum'])?> euros. </p>
  <p><?= nl2br($job['contenu']) ?></p>
  <br/>
  <p>Expire le: <?= $job['dateExpire']->format('d/m/Y') ?></p>
<?php
}
?>
</html>