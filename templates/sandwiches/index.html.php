<?php foreach ($sandwiches as $sandwich) { ?>

    <div class="mt-3 mb-3 p-3 card">
        <h2><?= $sandwich['description'] ?></h2>
        <h3><?= $sandwich['prix'] ?>€</h3>
        <div class="d-flex">

            <a class="btn btn-info w-25" href="sandwich.php?id=<?= $sandwich['id'] ?>">Voir le sandwich</a>
        </div>

    </div>

<?php } ?>