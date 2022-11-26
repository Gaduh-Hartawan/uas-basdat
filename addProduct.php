<?php
require 'functions.php';

$categories = retrieveData("SELECT * FROM categories ORDER BY CategoryName ASC");
$suppliers = retrieveData("SELECT * FROM suppliers ORDER BY SupplierName ASC");

if (isset($_POST['submit'])) {
    // var_dump($_POST);
    if (addProduct($_POST) > 0) {
        echo "
        <script>
            alert('Data Berhasil Ditambahkan');
            document.location.href='index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data Gagal Ditambahkan');
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
    <title>Add Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h3 class="text-center p-3 mt-2">ADD PRODUCT</h3>
        <form class="p-3" action="" method="POST">
            <div class="mb-3">
                <label for="productname" class="form-label">Product Name</label>
                <input type="text" name="productname" class="form-control" id="productname" required>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <!-- <input type="text" name="city" class="form-control" id="city" required> -->
                <select class="form-select" name="category" id="category">
                    <option value=""></option>
                    <?php foreach ($categories as $category) { ?>
                        <option value="<?= $category['CategoryID']; ?>"><?= $category['CategoryName']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="supplier" class="form-label">Suppliers</label>
                <select class="form-select" name="supplier" id="supplier">
                    <option value=""></option>
                    <?php foreach ($suppliers as $supplier) { ?>
                        <option value="<?= $supplier['SupplierID']; ?>"><?= $supplier['SupplierName']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" name="price" class="form-control" id="price" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>