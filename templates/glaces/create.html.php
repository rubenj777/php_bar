<form action="createGlace.php" method="post" class="d-flex flex-column w-25">
    <input type="text" name="description" placeholder="description de la glace" <?php if ($edit) { ?> value="<?= $glace['description'] ?>" <?php } ?> class="mb-2">
    <input type="text" name="image" placeholder="url de l'image" <?php if ($edit) { ?> value="<?= $glace['image'] ?>" <?php } ?> class="mb-2">
    <button type="submit" name="id" class="btn btn-success" value="<?= $glace['id'] ?>">Enregistrer <?php if ($edit) {
                                                                                                        echo "les modifications";
                                                                                                    } ?></button>
</form>