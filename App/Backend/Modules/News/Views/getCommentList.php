<p style="text-align: center">Voici les commentaires à modérer :</p>

<table>
  <tr><th>Auteur</th><th>Contenu</th>
<?php
foreach ($commentList as $comment)
{
  echo '<tr><td>', $comment['auteur'], '</td><td>', $comment['contenu'], '</td><td><a href="comment-update-', $comment['id'], '.html"><img src="/images/update.png" alt="Modifier" /></a> <a href="comment-delete-', $comment['id'], '.html"><img src="/images/delete.png" alt="Supprimer" /></a></td></tr>', "\n";
}
?>
</table>