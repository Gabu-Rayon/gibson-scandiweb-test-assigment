<nav class="navbar">
    <div class="container-fluid">
        <h1 class="navbar-brand">Product List</h1>
        <span class="d-flex">
            <a href="/addproduct" class="btn btn-primary m-2" type="submit">ADD</a>
            <form action="/delete-product" method="post" id="delete-form">
                <button class="btn btn-danger m-2" id="delete-product-btn" type="submit">MASS DELETE</button>
            </form>
        </span>
    </div>
</nav>
<hr class="mx-4 py-3">

<div class="container p-5">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
        <?php foreach ($products as $product) : ?>
        <div class="col mt-2">
            <div class="card border-dark">
                <div class="card-input">
                    <input form="delete-form" type="checkbox" class="delete-checkbox form-check-input bg-danger m-2"
                        name="<?= $product['sku'] ?>">
                </div>
                <div class="card-body">
                    <p class="card-text text-center">
                        <strong>SKU:</strong> <span><?php echo $product['sku']; ?></span>
                    </p>

                    <p class="card-text text-center">
                        <strong>Name:</strong> <span><?php echo $product['name']; ?></span>
                    </p>
                    <p class="card-text text-center">
                        <strong>Price: </strong> <i> $ </i><span><?php echo $product['price']; ?></span>
                    </p>
                    <p class="card-text text-center">
                        <strong><span><?php echo $product['value']; ?></span></strong>
                    </p>

                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>