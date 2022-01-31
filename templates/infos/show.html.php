<div class="mt-3 mb-5 p-3 card">

    <h2><?= $info->getDescription() ?></h2>

    <div class="d-flex">
        <a class="btn btn-info w-25 me-2" href="?type=info&action=new&id=<?= $info->getId() ?>">Modifier l'info</a>
        <form action="?type=info&action=delete" method="post">
            <button type="submit" name="id" value="<?= $info->getId() ?>" class="btn btn-danger">Supprimer l'info</button>
        </form>
    </div>
</div>

<?php if (!$reactions) { ?>
    <p>Soyez le premier à réagir !!</p>
<?php } ?>

<form class="" action="?type=reaction&action=new" method="post">
    <div class="form-group mb-2">
        <input type="text" name="author" id="" placeholder="Votre nom">
    </div>
    <div class="form-group mb-2">
        <textarea type="text" name="content" id="" placeholder="Votre commentaire"></textarea>
    </div>
    <div class="form-group mb-2">
        <button type="submit" name="id" value="<?= $info->getId() ?>" class="btn btn-success">Poster</button>
    </div>
</form>

<?php foreach ($reactions as $reaction) { ?>
    <div class="row p-2 mt-2 mb-2 card">
        <h5><?= $reaction->getAuthor() ?></h5>
        <p><?= $reaction->getContent() ?></p>
        <form action="?type=reaction&action=delete" method="post">
            <button type="submit" name="id" value="<?= $reaction->getId() ?>" class="btn btn-warning">Supprimer la réaction</button>
        </form>
    </div>
<?php } ?>