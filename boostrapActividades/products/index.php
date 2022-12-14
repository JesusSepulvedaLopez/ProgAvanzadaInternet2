<?php
include "../app/ProductsController.php";
include "../app/BrandController.php";
$productController = new ProductsController();
$products = $productController->getProducts();

$bransController = new BrandController();
$brands = $bransController->getBrands();
/* $products = $productController-> store(); */

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../layouts/head.template.php"; ?>
</head>

<body>

    <?php include "../layouts/nav.template.php"; ?>

    <div class="container-fluid">

        <?php include "../layouts/sidebar.template.php"; ?>

        <div class="col-md-10 col-lg-10 col-sm-12">
            <section>
                <div class="row bg-light m-2">
                    <div class="col">
                        <label>
                            /Productos
                        </label>
                    </div>
                    <div class="col">
                        <button data-bs-toggle="modal" data-bs-target="#addProductModal" class=" float-end btn btn-primary">
                            Añadir producto
                        </button>
                    </div>
                </div>
            </section>

            <section>

                <div class="row">
                    <?php if (isset($products) && count($products)) : ?>
                        <?php foreach ($products as $product) : ?>


                            <div class="col-md-4 col-sm-12">

                                <div class="card mb-2">
                                    <img src="<?= $product->cover ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title"> <?= $product->name ?> </h5>
                                        <h6 class="card-subtitle mb-2 text-muted"><?= $product->brand->description ?></h6>
                                        <p class="card-text"><?= $product->description ?></p>

                                        <div class="row">
                                            <a data-bs-toggle="modal" data-bs-target="#addProductModal" href="#" class="btn btn-warning mb-1 col-6">
                                                Editar
                                            </a>
                                            <a onclick="eliminar(this)" href="#" class="btn btn-danger mb-1 col-6">
                                                Eliminar
                                            </a>

                                            <a href="./detalles.php?" class="btn btn-info col-12">
                                                Detalles
                                            </a>

                                        </div>

                                    </div>
                                </div>

                            </div>
                        <?php endforeach ?>
                    <?php endif ?>

                </div>

            </section>
        </div>


    </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="POST" action="../app/ProductsController.php" enctype="multipart/form-data">

                    <div class="modal-body">

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input name="name" required type="text" class="form-control" placeholder="Name" aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input name="slug" required type="text" class="form-control" placeholder="Slug" aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input name="description" required type="text" class="form-control" placeholder="Description" aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input name="features" required type="text" class="form-control" placeholder="Features" aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>

                            <select name="brand_id" required id="" class="form-control" >
                                <?php foreach ($brands as $brand) : ?>

                                    <option value="<?= $brand->id ?>">
                                        <?= $brand->name ?>

                                    </option>
                                <?php endforeach ?>
                            </select>

                            <!--  <input name="brand_id" required type="text" class="form-control" placeholder="Brand_id" aria-label="Username" aria-describedby="basic-addon1"> -->
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Close
                        </button>

                        <button type="submit" class="btn btn-primary">
                            Save changes
                        </button>
                        <input type="hidden" name="action" value="create">
                    </div>

                </form>

            </div>
        </div>
    </div>

    <?php include "../layouts/scripts.template.php"; ?>
</body>

</html>