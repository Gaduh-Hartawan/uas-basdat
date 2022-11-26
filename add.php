<?php
require 'functions.php';

if (isset($_POST['submit'])) {
    if (addCustomer($_POST) > 0) {
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
        <h3 class="text-center p-3 mt-2">ADD CUSTOMERS</h3>
        <form class="p-3" action="" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Customer Name</label>
                <input type="text" name="username" class="form-control" id="username" required>
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" name="city" class="form-control" id="city" required>
            </div>
            <div class="mb-3">
                <label for="postCode" class="form-label">Postal Code</label>
                <input type="text" name="postCode" class="form-control" id="postCode" required>
            </div>
            <div class="mb-3">
                <label for="country" class="form-label">Country</label>
                <input type="text" name="country" class="form-control" id="country" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>