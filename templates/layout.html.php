<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le template - <?= $pageTitle ?></title>
    <link rel="stylesheet" href="https://bootswatch.com/5/lux/bootstrap.min.css">
    <link rel="stylesheet" href="templates/style.css">
</head>

<body>

    <nav class="navbar nav-expand-lg navbar-light bg-dark mb-5">
        <a href="/bar" class="navbar-brand ms-5" id="logo">le template</a>
        <a href="create.php" class="me-5 btn btn-success">Créer un cocktail</a>
    </nav>


    <div class="container">
        <?= $pageContent ?>
    </div>




    <footer class="text-center bg-dark mb-0 mt-5 p-3">
        <p class="m-0">Le Template - Bar Lounge</p>
    </footer>

</body>

</html>