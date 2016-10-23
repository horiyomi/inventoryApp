<?php include '_partials/head.view.php'; ?>

    <?php include '_partials/nav.view.php'; ?>

    <div class="container">

        <div class="pt-40"></div>
        <div class="row">
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Congrats!</strong>
                You've Just bought <?= $result["quantity"] ?>
                <?= $result["name"] ?>(s)!!!
            </div>
            <div class="col-xs-6 col-md-4">
                <a href="#" class="thumbnail">
                    <img src="<?= $result["image"] ?>" alt="<?= $result["name"] ?>">
                </a>
            </div>
            <div class="col-md-8">
                <ul class="list-group">
                    <li class="list-group-item">
                        <h3>
                            Product Name
                            <span class="val float-right"><?= $result["name"] ?></span>
                        </h3>
                    </li>
                    <li class="list-group-item">
                        <h3>
                            Quantity
                            <span class="val float-right"><?= $result["quantity"] ?></span>
                        </h3>
                    </li>
                    <li class="list-group-item">
                        <h3>
                            Total Cost
                            <span class="val float-right"><?= inDollars($result["total"]) ?></span>
                        </h3>
                    </li>
                    <li class="list-group-item">
                        <h3>
                            Order Made
                            <span class="val float-right"><?= formatDate($result["created_at"]) ?></span>
                        </h3>
                    </li>
                </ul>
            </div>


        </div>

    </div>

<?php include '_partials/footer.view.php'; ?>


