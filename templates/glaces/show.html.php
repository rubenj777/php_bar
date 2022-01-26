<div class="mt-3 mb-5 p-3 card">

    <img src="<?= $glace['image'] ?>" style="max-width:100px" alt="">
    <h3><strong>Ingrédients :</strong></h3>
    <p><?= $glace['description'] ?></p>

    <div class="d-flex">
        <a class="btn btn-info w-25 me-2" href="createGlace.php?id=<?= $glace['id'] ?>">Modifier la glace</a>
        <form action="deleteGlace.php" method="post">
            <button type="submit" name="id" value="<?= $glace['id'] ?>" class="btn btn-danger">Supprimer la glace</button>
        </form>
    </div>
</div>