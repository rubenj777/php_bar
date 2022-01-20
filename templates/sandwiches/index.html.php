<?php foreach ($sandwiches as $sandwich) { ?>

    <div class="mt-3 mb-3 p-3 card">
        <h2><?= $sandwich['description'] ?></h2>
        <h3><?= $sandwich['prix'] ?>€</h3>
        <div class="d-flex">

            <a class="btn btn-info w-25" href="sandwich.php?id=<?= $sandwich['id'] ?>">Voir le sandwich</a>
        </div>

    </div>

<?php } ?>

<form class="" action="createSandwich.php" method="post">

    <div class="form-group mb-2">
        <textarea type="text" name="content" id="" placeholder="Description"></textarea>
    </div>
    <div class="form-group mb-2">
        <input type="number" name="price" placeholder="prix">
    </div>
    <div class="form-group mb-2">
        <button type="submit" name="id" value="<?= $sandwich['id'] ?>" class="btn btn-success">Poster</button>
    </div>
</form>