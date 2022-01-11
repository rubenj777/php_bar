<?php foreach ($cocktails as $cocktail) { ?>

    <div class="mt-3 mb-3 p-3 card">

        <h2><?= $cocktail['name'] ?></h2>
        <img src="<?= $cocktail['image'] ?>" style="max-width:100px" alt="">
        <h3><strong>Ingrédients :</strong></h3>
        <p><?= $cocktail['ingredients'] ?></p>


        <a class="btn btn-info w-25" href="cocktail.php?id=<?= $cocktail['id'] ?>">Voir le cocktail</a>


    </div>

<?php } ?>