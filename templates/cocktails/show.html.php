<div class="mt-3 mb-5 p-3 card">

    <h2><?= $cocktail['name'] ?></h2>
    <img src="<?= $cocktail['image'] ?>" style="max-width:100px" alt="">
    <h3><strong>Ingrédients :</strong></h3>
    <p><?= $cocktail['ingredients'] ?></p>

    <div class="d-flex">
        <a class="btn btn-info w-25 me-2" href="edit.php?id=<?= $cocktail['id'] ?>">Modifier le cocktail</a>
        <form action="deleteCocktail.php" method="post">
            <button type="submit" name="id" value="<?= $cocktail['id'] ?>" class="btn btn-danger">Supprimer le cocktail</button>
        </form>
    </div>
</div>

<?php if (!$comments) { ?>
    <p>Soyez le premier à commenter le <?= $cocktail['name'] ?> !</p>
<?php } ?>

<form class="" action="createComment.php" method="post">
    <div class="form-group mb-2">
        <input type="text" name="author" id="" placeholder="Votre nom">
    </div>
    <div class="form-group mb-2">
        <textarea type="text" name="content" id="" placeholder="Votre commentaire"></textarea>
    </div>
    <div class="form-group mb-2">
        <button type="submit" name="id" value="<?= $cocktail['id'] ?>" class="btn btn-success">Poster</button>
    </div>
</form>

<?php foreach ($comments as $comment) { ?>
    <div class="row p-2 mt-2 mb-2 card">
        <h5><?= $comment['author'] ?></h5>
        <p><?= $comment['content'] ?></p>
        <form action="deleteComment.php" method="post">
            <button type="submit" name="id" value="<?= $comment['id'] ?>" class="btn btn-warning">Supprimer le commentaire</button>
        </form>
    </div>
<?php } ?>