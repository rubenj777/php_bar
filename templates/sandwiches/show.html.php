<a href="sandwiches.php" class="btn btn-info">Retour</a>


<div class="mt-3 mb-5 p-3 card">

    <h2><?= $sandwich['description'] ?></h2>
    <h3><?= $sandwich['prix'] ?>€</h3>

    <form action="deleteSandwich.php" method="post">
        <button type="submit" name="id" value="<?= $sandwich['id'] ?>" class="btn btn-danger">Supprimer</button>
    </form>

</div>