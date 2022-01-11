<div class="mt-3 mb-3 p-3 card">

    <h2><?= $cocktail['name'] ?></h2>
    <img src="<?= $cocktail['image'] ?>" style="max-width:100px" alt="">
    <h3><strong>Ingrédients :</strong></h3>
    <p><?= $cocktail['ingredients'] ?></p>
    <div class="d-flex">
        <a class="btn btn-info w-25 me-2" href="edit.php?id=<?= $cocktail['id'] ?>">Modifier le cocktail</a>
        <form action="delete.php" method="post">
            <button type="submit" name="delete" value="<?= $cocktail['id'] ?>" class="btn btn-danger">Supprimer le cocktail</button>
        </form>
    </div>



</div>