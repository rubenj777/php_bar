<div class="mt-3 mb-5 p-3 card">

    <h2><?= $glace->description ?></h2>
    <img src="<?= $glace->image ?>" alt="">

    <div class="d-flex">
        <a class="btn btn-info w-25 me-2" href="?type=glace&action=new&id=<?= $glace->id ?>">Modifier la glace</a>
        <form action="?type=glace&action=delete" method="post">
            <button type="submit" name="id" value="<?= $glace->id ?>" class="btn btn-danger">Supprimer la glace</button>
        </form>
    </div>
</div>