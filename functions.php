<?php
// Koneksi ke Database
$conn = mysqli_connect("localhost", "root", "", "w3schools");

// Ambil Data Customer
function retrieveData($query)
{
    global $conn;
    // $sql = "SELECT customerID,customerName, PostalCode, City, Country from customers";
    $result_table = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result_table)) {
        $rows[] = $row;
    };
    return $rows;
};

// Function Top 10 Sales Product
function top10Day()
{
    global $conn;
    $sql = "SELECT customers.CustomerName, orderDate, products.ProductID, products.ProductName, Quantity, products.Price FROM orders 
    LEFT JOIN customers ON orders.CustomerID = customers.CustomerID
    LEFT JOIN order_details ON orders.OrderID = order_details.OrderID
    LEFT JOIN products ON order_details.ProductID = products.ProductID
    -- WHERE orderDate = '1996-07-08'
    WHERE orderDate = '2022-06-10'
    GROUP BY products.ProductID
    ORDER BY quantity DESC
    LIMIT 10";
    $result_order = $conn->query($sql);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result_order)) {
        $rows[] = $row;
    };
    return $rows;
};

// Function Top 10 Sales Month
function top10Month()
{
    global $conn;
    $sql = "SELECT month(orderDate), year(orderDate), products.ProductID, products.ProductName, sum(Quantity), products.Price FROM orders
    LEFT JOIN order_details
    ON orders.OrderID = order_details.OrderID
    LEFT JOIN products
    ON order_details.ProductID = products.ProductID
    WHERE month(orderDate) = 06 AND year(orderDate) = 2022
    GROUP BY products.ProductID
    ORDER BY sum(Quantity) DESC
    LIMIT 10";
    $result_orderBln = $conn->query($sql);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result_orderBln)) {
        $rows[] = $row;
    };
    return $rows;
};

// Yearly Sales Report
function yearlySales()
{
    global $conn;
    $sql = "SELECT month(orderDate) as month_v, sum(Quantity*Price) as total_perbulan
    from orders a
    inner join order_details b on a.OrderID = b.OrderID
    inner join products c on c.ProductID = b.ProductID
    where year(orderDate) = 1996
    group by month(orderDate)";
    $result_area = $conn->query($sql);
    if ($result_area->num_rows > 0) {
        $data_area = "";
        while ($row = $result_area->fetch_assoc()) {
            if ($row['total_perbulan'] == 0) {
                $data_area .= 1 . ",";
            } else if ($row['total_perbulan'] > 0) {
                $data_area .= $row['total_perbulan'] . ",";
            }
        }
    } else {
        echo "0";
    }
    $data_area = rtrim($data_area, ",");
    return $data_area;
};

function yearlySales2()
{
    global $conn;
    $sql = "SELECT orderDate, COUNT(orderID) AS total_perbulan FROM orders
    WHERE year(orderDate) = 1996
    GROUP BY CAST(YEAR(orderDate) AS VARCHAR(4)) + '-' + right('00' + CAST(MONTH(orderDate) AS VARCHAR(2)), 2);";
    $result_area = $conn->query($sql);
    if ($result_area->num_rows > 0) {
        $data_area = "";
        while ($row = $result_area->fetch_assoc()) {
            if ($row['total_perbulan'] == 0) {
                $data_area .= 1 . ",";
            } else if ($row['total_perbulan'] > 0) {
                $data_area .= $row['total_perbulan'] . ",";
            }
        }
    } else {
        echo "0";
    }
    $data_area = rtrim($data_area, ",");
    return $data_area;
};

// Monthly Sales Report
function monthySales()
{
    global $conn;
    $sql = "SELECT week(orderDate) as month_v, sum(Quantity*Price) as total_perminggu
    from orders a
    inner join order_details b on a.OrderID = b.OrderID
    inner join products c on c.ProductID = b.ProductID
    where month(orderDate) = 07 and year(orderDate) = 1996
    group by week(orderDate)";
    $result_area = $conn->query($sql);
    if ($result_area->num_rows > 0) {
        $data_area = "";
        while ($row = $result_area->fetch_assoc()) {
            $data_area .= $row['total_perminggu'] . ",";
        }
    } else {
        echo "0";
    }
    $data_area = rtrim($data_area, ",");
    return $data_area;
};

function weeklySales2()
{
    global $conn;
    $sql = "SELECT CONCAT(MONTH(orderDate), '/', WEEK(orderDate)), COUNT(orderID) as totalOrder
    FROM orders
    where month(orderDate) = 07 and year(orderDate) = 1996
    GROUP BY CONCAT(MONTH(orderDate), '/', WEEK(orderDate))";
    $result_area2 = $conn->query($sql);
    if ($result_area2->num_rows > 0) {
        $data_area2 = "";
        while ($row = $result_area2->fetch_assoc()) {
            $data_area2 .= $row['totalOrder'] . ",";
        }
    } else {
        echo "0";
    }
    $data_area2 = rtrim($data_area2, ",");
    return $data_area2;
};

// Tambah Customer
function addCustomer($data)
{
    global $conn;
    $name = htmlspecialchars($data["username"]);
    $city = htmlspecialchars($data["city"]);
    $postCode = htmlspecialchars($data["postCode"]);
    $country = htmlspecialchars($data["country"]);

    $sql = "INSERT INTO customers (customerName, City, PostalCode, Country)
        VALUES ('$name', '$city', '$postCode', '$country')
        ";

    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
}

// Hapus Customer
function deleteCustomer($id)
{
    global $conn;
    $sql = "DELETE FROM customers WHERE customerID = $id";
    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
}

// Edit Customer
function editCustomer($data, $id)
{
    global $conn;
    $name = htmlspecialchars($data["username"]);
    $city = htmlspecialchars($data["city"]);
    $postCode = htmlspecialchars($data["postCode"]);
    $country = htmlspecialchars($data["country"]);

    $sql = "UPDATE customers 
    SET customerName = '$name', City = '$city', PostalCode = '$postCode', Country = '$country' 
    WHERE customerID = $id";
    mysqli_query($conn, $sql);
}

// Add Product
function addProduct($data)
{
    global $conn;
    $name = htmlspecialchars($data["productname"]);
    $category = htmlspecialchars($data["category"]);
    $supplier = htmlspecialchars($data["supplier"]);
    $price = htmlspecialchars($data["price"]);

    $sql = "INSERT INTO products (ProductName, CategoryID, SupplierID, Price)
        VALUES ('$name', '$category', '$supplier', '$price')
        ";

    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
}

// Delete Product
function deleteProduct($id)
{
    global $conn;
    $sql = "DELETE FROM products WHERE ProductID = $id";
    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
}

// Edit Customer
function editProduct($data, $id)
{
    global $conn;
    $name = htmlspecialchars($data["productName"]);
    $category = htmlspecialchars($data["category"]);
    $supplier = htmlspecialchars($data["supplier"]);
    $price = htmlspecialchars($data["price"]);

    $sql = "UPDATE products 
    SET ProductName = '$name', CategoryID = '$category', SupplierID = '$supplier', Price = '$price' 
    WHERE ProductID = $id";
    mysqli_query($conn, $sql);
}
