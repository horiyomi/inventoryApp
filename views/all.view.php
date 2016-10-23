<?php include '_partials/head.view.php'; ?>

    <?php include '_partials/nav.view.php'; ?>

    <div class="container">
        <h1 class="text-center pt-40"><?= getValue($title, "Sell Page") ?></h1>
        <div class="row pt-40">
            <div class="col-md-7">
                <div class="table-responsive">

                    <table class="table table-bordered">
                        <thead>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Cost</th>
                        <th>Stock</th>
                        <th>Description</th>
                        </thead>
                        <tbody>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td> <?= $product["name"] ?></td>
                                <td> <?= inDollars($product["price"]) ?></td>
                                <td> <?= inDollars($product["cost"]) ?></td>
                                <td class="<?= $product["no_of_items"] == 0 ? 'danger' : 'success' ?>">
                                    <?= $product["no_of_items"] ?>
                                </td>
                                <td> <?= $product["description"] ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-5">
                <?php include '_partials/chart.view.php'; ?>

                <div class="pt-40">
                    <h4>
                        Total Cost of Stock
                        <span class="val"><?= inDollars($totalCost) ?></span>
                    </h4>
                    <h4>
                        Total Price of Stock After Sale
                        <span class="val"><?= inDollars($totalPrice) ?></span>
                    </h4>
                    <h4>
                        Percentage Profit Gained
                        <span class="val"><?= $percentageProfit . '%' ?></span>
                    </h4>
                </div>
            </div>
        </div>

    </div>



<?php include '_partials/footer.view.php'; ?>