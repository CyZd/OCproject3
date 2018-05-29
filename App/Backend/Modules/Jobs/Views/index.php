<p style="text-align: center">Il y a actuellement <?= $nombreJobs ?> offres d'emplois. En voici la liste :</p>

<table>
  <tr><th>Titre</th><th>Lieu</th><th>Date d'ajout</th><th>Dernière modification</th><th>Date d'expiration</th><th>Action</th></tr>
<?php
foreach ($listeJobs as $jobs)
{
  echo '<tr><td>', $jobs['titre'], '<tr><td>Situation:', $jobs['lieu'],'</td><td>le ', $jobs['dateAjout']->format('d/m/Y à H\hi'), '</td><td>', ($jobs['dateAjout'] == $jobs['dateModif'] ? '-' : 'le '.$jobs['dateModif']->format('d/m/Y à H\hi')), '</td><td>expire le ', $jobs['dateExpire']->format('d/m/Y à H\hi'),'</td><td><a href="jobs-update-', $jobs['id'], '.html"><img src="/images/update.png" alt="Modifier" /></a> <a href="jobs-delete-', $jobs['id'], '.html"><img src="/images/delete.png" alt="Supprimer" /></a></td></tr>', "\n";
}
?>
</table>