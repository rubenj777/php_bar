<form action="?type=info&action=new" method="post" class="d-flex flex-column w-25">
    <textarea name="description" id="" cols="30" rows="10" value="" placeholder="contenu" class=" mb-2"><?php if ($edit) {
                                                                                                            echo $info->getDescription();
                                                                                                        } ?></textarea>
    <button type="submit" name="id" class="btn btn-success" value="<?php if ($edit) {
                                                                        $info->getId();
                                                                    } ?>">Enregistrer <?php if ($edit) {
                                                                                            echo "les modifications";
                                                                                        } ?></button>
</form>