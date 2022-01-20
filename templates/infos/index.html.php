<?php foreach ($infos as $info) { ?>

    <div class="mt-3 mb-3 p-3 card">
        <h2><?= $info['description'] ?></h2>
        <form action="deleteInfo.php" method="post">
            <button type="submit" name="id" value="<?= $info['id'] ?>" class="btn btn-danger">Supprimer</button>
        </form>
    </div>

<?php } ?>

<form class="" action="createInfo.php" method="post">

    <div class="form-group mb-2">
        <textarea type="text" name="content" id="" placeholder="Description"></textarea>
    </div>
    <div class="form-group mb-2">
        <button type="submit" name="id" value="<?= $info['id'] ?>" class="btn btn-success">Poster</button>
    </div>
</form>