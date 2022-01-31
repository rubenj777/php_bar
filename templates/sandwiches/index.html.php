<?php foreach ($sandwiches as $sandwich) { ?>

    <div class="mt-3 mb-3 p-3 card">
        <h2><?= $sandwich->getDescription() ?></h2>
        <h3><?= $sandwich->getPrix() ?>€</h3>
        <div class="d-flex">

            <a class="btn btn-info w-25" href="?type=sandwich&action=show&id=<?= $sandwich->getId() ?>">Voir le sandwich</a>
        </div>

    </div>

<?php } ?>