<form class="" action="?type=sandwich&action=new" method="post">

    <div class="form-group mb-2">
        <textarea type="text" name="description" id="" placeholder="Description"><?php if ($edit) {
                                                                                        echo $sandwich->getDescription();
                                                                                    } ?></textarea>
    </div>
    <div class="form-group mb-2">
        <input type="number" name="prix" <?php if ($edit) { ?> value="<?= $sandwich->getPrix() ?>" <?php } ?> placeholder="prix">
    </div>
    <div class="form-group mb-2">
        <button type="submit" name="id" value="<?php if ($edit) {
                                                    $sandwich->getId();
                                                } ?>" class="btn btn-success">Enregistrer <?php if ($edit) {
                                                                                                echo "les modifications";
                                                                                            } ?></button>
    </div>
</form>