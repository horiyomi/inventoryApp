<?php include '_partials/head.view.php'; ?>

    <?php include '_partials/nav.view.php'; ?>

    <div class="container">
        <div class="row">
            <h1 class="text-center"><?= getValue($title, "Homepage") ?></h1>

            <?php if($result) : ?>
                <div class="col-md-offset-3 col-md-6">
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Success!</strong>
                        New Product Added!!!
                    </div>
                </div>
            <?php endif; ?>

            <div class="col-md-offset-3 col-md-6">
                <form action="/index.php" method="POST">
                <div>
                    <label for="product_name">Product Name:</label>
                    <input placeholder="Enter Product Name..." class="form-control" type="text" step="1" name="product_name">
                </div>

                <br>
                <div>
                    <label for="no_of_items">No Of Items:</label>
                    <input placeholder="Enter No Of Items..." class="form-control" type="number" min="1" value="1" name="no_of_items">
                </div>
                <br>
                <div>
                    <label for="product_cost">Product Cost:</label>
                    <div class="input-group">
                        <span class="input-group-addon">$</span>

                        <input placeholder="Enter Product Cost..." class="form-control"  type="number" step="0.01" name="product_cost">
                    </div>
                </div>


                <br>
                <div>
                    <label for="product_price">Product Price:</label>
                    <div class="input-group">
                        <span class="input-group-addon">$</span>
                        <input placeholder="Enter Product Price..." class="form-control"  type="number" step="0.01" name="product_price">
                    </div>
                </div>

                <br>
                <div>
                    <label for="product_desc">Product Description:</label>
                    <textarea placeholder="Enter Description..." class="form-control" name="product_desc" rows="3"></textarea>
                </div>
                <br>
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>

            </div>
        </div>


    </div>

<?php include '_partials/footer.view.php'; ?>