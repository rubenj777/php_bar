<form action="edit.php" method="post" class="d-flex flex-column w-25">

    <input type="text" name="name" value="<?= $cocktail['name'] ?>" class="mb-2">
    <input type="text" name="image" value="<?= $cocktail['image'] ?>" class="mb-2">
    <textarea name="ingredients" id="" cols="30" rows="10" placeholder="les ingrédients" class="mb-2"><?= $cocktail['ingredients'] ?></textarea>

    <button type="submit" class="btn btn-success" name="id" value="<?= $cocktail['id'] ?>">Enregistrer</button>

</form>