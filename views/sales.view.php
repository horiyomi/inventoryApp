<?php include '_partials/head.view.php'; ?>

    <?php include '_partials/nav.view.php'; ?>

    <div class="container">
        <h1 class="text-center pt-40"><?= getValue($title, "Sales Page") ?></h1>
        <div class="row pt-40">
            <div class="col-md-7">
                <div class="table-responsive">

                    <table class="table table-bordered">
                        <thead>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total Made</th>
                            <th>Sold At</th>
                        </thead>
                        <tbody>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td> <?= $product["name"] ?></td>
                                <td> <?= inDollars($product["price"]) ?></td>
                                <td> <?= $product["quantity"] ?></td>
                                <td>
                                    <?= inDollars($product["quantity"] * $product['price']) ?>
                                </td>
                                <td> <?= formatDate($product["sold_at"]) ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-5">
                <?php include '_partials/saleschart.view.php'; ?>

                <div class="pt-40">
                    <h4>
                        Total Made from Sales
                        <span class="val"><?= inDollars($totalMade) ?></span>
                    </h4>
                    <h4>
                        Total Cost of Sold Items
                        <span class="val"><?= inDollars($totalCost) ?></span>
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