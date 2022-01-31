<?php foreach ($cocktails as $cocktail) { ?>

    <div class="mt-3 mb-3 p-3 card">
        <h2><?= $cocktail->getName() ?></h2>
        <img src="<?= $cocktail->getImage() ?>" style="max-width:100px" alt="">
        <h3><strong>Ingrédients :</strong></h3>
        <p><?= $cocktail->getIngredients() ?></p>
        <a class="btn btn-info w-25" href="?type=cocktail&action=show&id=<?= $cocktail->getId() ?>">Voir le cocktail</a>
    </div>

<?php } ?>