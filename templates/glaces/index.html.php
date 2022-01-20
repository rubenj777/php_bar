<?php foreach ($glaces as $glace) { ?>

    <div class="mt-3 mb-3 p-3 card">
        <h2><?= $glace['description'] ?></h2>
        <img src="<?= $glace['image'] ?>" alt="">
        <form action="deleteGlace.php" method="post">
            <button type="submit" name="id" value="<?= $glace['id'] ?>" class="btn btn-danger">Supprimer</button>
        </form>
    </div>

<?php } ?>