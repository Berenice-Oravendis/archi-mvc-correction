<?php ob_start(); ?>
<h2>Modifier l’article</h2>

<form method="post">
    <label for="title">Titre</label><br>
    <input type="text" id="title" name="title" value="<?= htmlspecialchars($post->title) ?>"><br>

    <label for="content">Contenu</label><br>
    <textarea id="content" name="content" rows="8" cols="80"><?= htmlspecialchars($post->content) ?></textarea><br>

    <button type="submit">Enregistrer</button>
</form>
<?php $content = ob_get_clean(); ?>
<?php require('templates/layout.php'); ?>
