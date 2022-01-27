<div class="mt-3 mb-5 p-3 card">

    <h2><?= $sandwich->description ?></h2>
    <h3><?= $sandwich->prix ?>€</h3>

    <div class="d-flex">
        <a class="btn btn-info w-25 me-2" href="?type=sandwich&action=new&id=<?= $sandwich->id ?>">Modifier le sandwich</a>
        <form action="?type=sandwich&action=delete" method="post">
            <button type="submit" name="id" value="<?= $sandwich->id ?>" class="btn btn-danger">Supprimer</button>
        </form>
    </div>


</div>

<a href="?type=sandwich&action=index" class="btn btn-info">Retour</a>