<nav class="navbar navbar-default navbar-static-top">

    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Luxury Store</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li <?= setActiveWhen('/index.php') ?>>
                    <a href="/index.php">Add Product</a>
                </li>
                <li <?= setActiveWhen('/all.php')  ?>>
                    <a href="/all.php">Get Inventory</a>
                </li>
                <li <?= setActiveWhen('/sales.php') ?>>
                    <a href="/sales.php">Track Sales</a>
                </li>
                <li <?= setActiveWhen('/store.php') ?>>
                    <a href="/store.php">Store</a>
                </li>
            </ul>
        </div>

    </div>
</nav>