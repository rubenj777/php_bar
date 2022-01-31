<form action="?type=glace&action=new" method="post" class="d-flex flex-column w-25">
    <input type="text" name="description" placeholder="description de la glace" <?php if ($edit) { ?> value="<?= $glace->getDescription() ?>" <?php } ?> class="mb-2">
    <input type="text" name="image" placeholder="url de l'image" <?php if ($edit) { ?> value="<?= $glace->getImage() ?>" <?php } ?> class="mb-2">
    <button type="submit" name="id" class="btn btn-success" value="<?php if ($edit) {
                                                                        $glace->getId();
                                                                    } ?>">Enregistrer <?php if ($edit) {
                                                                                                                            echo "les modifications";
                                                                                                                        } ?></button>
</form>