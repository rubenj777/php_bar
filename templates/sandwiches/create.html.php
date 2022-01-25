<form class="" action="createSandwich.php" method="post">

    <div class="form-group mb-2">
        <textarea type="text" name="description" id="" placeholder="Description"></textarea>
    </div>
    <div class="form-group mb-2">
        <input type="number" name="prix" placeholder="prix">
    </div>
    <div class="form-group mb-2">
        <button type="submit" name="id" value="<?= $sandwich['id'] ?>" class="btn btn-success">Poster</button>
    </div>
</form>