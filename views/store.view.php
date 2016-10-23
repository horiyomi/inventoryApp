<?php include '_partials/head.view.php'; ?>

    <?php include '_partials/nav.view.php'; ?>

    <div class="container">
        <div class="row">
            <h1 class="pt-40 text-center"><?= getValue($title, "Sell Page") ?></h1>
        </div>
        <div class="pt-40"></div>

        <?php $chunkedProducts = array_chunk($products, 4) ?>
        <?php foreach ($chunkedProducts as $products) : ?>
            <div class="row">
            <?php foreach ($products as $product) : ?>

                <div class="col-sm-3 col-md-3">
                    <div class="thumbnail">
                        <img class="img-responsive" src="<?= (empty($product["image"]))? 'http://placehold.it/300/300/?text=No+Image' :  $product["image"] ?>" alt="<?= $product["name"]?>">
                        <div class="caption">
                            <h3><?= $product["name"] ?></h3>
                            <p><?= inDollars($product['price']) ?></p>
                            <p class="description"><?= $product["description"] ?></p>
                            <p>
                                <form action="/store.php" method="POST" >
                                    <input type="hidden" name="id" value="<?= $product["id"] ?>">
                                    <div class="input-group input-group-xs">
                                        <span class="input-group-addon" id=""><?= $product["no_of_items"] ?></span>
                                        <input placeholder="Qty" required class="form-control" min="1" max="<?= $product["no_of_items"] ?>" type="number" name="qty">
                                        <div class="input-group-btn">
                                            <button type="submit" href="#" class="btn btn-primary" role="button">Buy</button>
                                        </div>
                                    </div>

                                </form>
                            </p>

                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>

<?php include '_partials/footer.view.php'; ?>