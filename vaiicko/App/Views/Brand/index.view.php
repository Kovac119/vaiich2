<?php
use App\Models\Brand;
/** @var Brand[] $data */
/** @var \App\s $brand */
/** @var \App\Core\LinkGenerator $link */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>CDealer Brands</title>
    <link rel="icon" type="image/png" href="./Images/placeholder_logo2-removebg-preview.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <div class="container rc1 goob">
        <h2>Brands at <img class="logonav" src="public/images/logo.png" alt="Small Logo">ealer</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus dapibus ipsum vel mollis porttitor. Aliquam vel libero vitae mi laoreet porttitor. Cras nec risus a massa faucibus pretium. Integer ut velit in leo interdum fermentum. Nulla convallis odio ipsum, euismod tincidunt neque mattis sollicitudin. Suspendisse placerat tempor augue a ultrices. Pellentesque tincidunt consectetur est a finibus. Mauris quis lorem a nisi venenatis tristique. Proin dictum mauris tellus. Vestibulum fermentum lacinia egestas. Pellentesque et est non nulla maximus interdum id non velit. Phasellus mauris odio, ultricies sed elit in, scelerisque auctor leo. Donec nec efficitur ante. Sed aliquet dolor sit amet.</p>
        <p>That's right, we got all of them</p>
        <div style="margin-right: 30vw; margin-left: 30vw;">
            <a class="nav-link btn btn-primary btn-sm" href="<?= $link->url("brand.add") ?>">Pridať príspevok</a>
        </div>
    </div>

</header>
<div class="album py-5">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach ($data as $brand): ?>
                <div class="goob rc1 m-1 col">
                    <div>
                        <img src="<?php echo $brand->getPicture()?>" class="cardsize">
                    </div>
                    <div class="m-1">
                        <a href="<?= $link->url('brand.edit', ['id' => $brand->getId()]) ?>" class="btn btn-primary">Upraviť</a>
                        <a href="<?= $link->url('brand.remove', ['id' => $brand->getId()]) ?>"  class="btn btn-danger">Zmazať</a>
                    </div>
                </div>
                <?php endforeach; ?>
        </div>
    </div>
</div>
<div class="container">
    <footer class="py-3 my-4 footColor">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="./index.html" class="nav-link px-2 footColor">Home</a></li>
            <li class="nav-item"><a href="./market.html" class="nav-link px-2 footColor">Brands</a></li>
            <li class="nav-item"><a href="./about.html" class="nav-link px-2 footColor">About</a></li>
        </ul >
        <p class="text-center">CDealer© 2023 Company, Inc</p>
    </footer>
</div>
</body>
</html>