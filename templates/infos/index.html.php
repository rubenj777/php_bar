<?php foreach ($infos as $info) { ?>

    <div class="mt-3 mb-3 p-3 card">
        <h2><?= $info->getDescription() ?></h2>

        <a class="btn btn-info w-25" href="?type=info&action=show&id=<?= $info->getId() ?>">Voir l'info</a>
    </div>

<?php } ?>