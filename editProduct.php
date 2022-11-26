<?php
require 'functions.php';
$id = $_GET["id"];
$result = retrieveData("SELECT * from products LEFT JOIN suppliers ON products.SupplierID = suppliers.SupplierID
LEFT JOIN categories ON products.CategoryID = categories.CategoryID WHERE ProductID = $id");
$categories = retrieveData("SELECT * FROM categories ORDER BY CategoryName ASC");
$suppliers = retrieveData("SELECT * FROM suppliers ORDER BY SupplierName ASC");


if (isset($_POST['submit'])) {
    if (editProduct($_POST, $id) > 0) {
        echo "
        <script>
            alert('Data Berhasil Diubah');
            document.location.href='index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data Berhasil Diubah');
            document.location.href='index.php';
        </script>
        ";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h3 class="text-center p-3 mt-2">EDIT PRODUCT</h3>
        <form class="p-3" action="" method="POST">
            <?php foreach ($result as $user) { ?>
                <div class="mb-3">
                    <label for="productName" class="form-label">Produc Name</label>
                    <input type="text" value="<?= $user['ProductName']; ?>" name="productName" class="form-control" id="productName" required>
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select" name="category" id="category">
                        <option value="<?= $category['CategoryID']; ?>"><?= $user['CategoryName']; ?></option>
                        <?php foreach ($categories as $category) { ?>
                            <option value="<?= $category['CategoryID']; ?>"><?= $category['CategoryName']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="supplier" class="form-label">Supplier</label>
                    <select class="form-select" name="supplier" id="supplier">
                        <option value="<?= $supplier['SupplierID']; ?>"><?= $user['SupplierName']; ?></option>
                        <?php foreach ($suppliers as $supplier) { ?>
                            <option value="<?= $supplier['SupplierID']; ?>"><?= $supplier['SupplierName']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">price</label>
                    <input type="number" step="0.01" value="<?= $user['Price']; ?>" name="price" class="form-control" id="price" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    <?php } ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>