<?php foreach ($glaces as $glace) { ?>

    <div class="mt-3 mb-3 p-3 card">
        <h2><?= $glace->description ?></h2>
        <img src="<?= $glace->image ?>" alt="">
        <a class="btn btn-info w-25" href="?type=glace&action=show&id=<?= $glace->id ?>">Voir la glace</a>
    </div>

<?php } ?>