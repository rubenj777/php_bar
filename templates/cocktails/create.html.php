<form action="createCocktail.php" method="post" class="d-flex flex-column w-25">
    <input type="text" name="name" placeholder="intitulé du cocktail" class="mb-2" value="">
    <input type="text" name="image" placeholder="url de l'image" class="mb-2" value="">
    <textarea name="ingredients" id="" cols="30" rows="10" value="" placeholder="les ingrédients" class=" mb-2"></textarea>
    <button type="submit" class="btn btn-success" value="<?= $cocktail['id'] ?>">Enregistrer></button>
</form>