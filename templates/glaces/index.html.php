<?php foreach ($glaces as $glace) { ?>

    <div class="mt-3 mb-3 p-3 card">
        <h2><?= $glace->getDescription() ?></h2>
        <img src="<?= $glace->getImage() ?>" alt="">
        <a class="btn btn-info w-25" href="?type=glace&action=show&id=<?= $glace->getId() ?>">Voir la glace</a>
    </div>

<?php } ?>