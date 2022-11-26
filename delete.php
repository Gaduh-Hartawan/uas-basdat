<?php
require 'functions.php';



if ($_GET['productid']) {
    $productID = $_GET["productid"];
    if (deleteProduct($productID) > 0) {
        echo "
            <script>
                alert('Produk Berhasil Dihapus');
                document.location.href='index.php';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('Produk Gagal Dihapus');
                document.location.href='index.php';
            </script>
            ";
    }
} else {
    $id = $_GET["id"];
    if (deleteCustomer($id) > 0) {
        echo "
            <script>
                alert('Data Berhasil Dihapus');
                document.location.href='index.php';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('Data Gagal Dihapus');
                document.location.href='index.php';
            </script>
            ";
    }
}
