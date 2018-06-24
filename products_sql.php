<?php

function getAllProduct() {
global $servername, $username, $password, $dbname;
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) die("Connection failed: " . mysqli_connect_error());

$sql = "SELECT * FROM shop";

$result = mysqli_query($conn, $sql);
$arary;
if (mysqli_num_rows($result) > 0) {
    while($data = mysqli_fetch_assoc($result)) {
        // echo "id: " . $data["id"]. " -  Name: " . $data["name"]. "<br>";
        $arary[] = $data;
    }
}
mysqli_close($conn);
return ($arary);
}

function getAllProductByName() {
global $servername, $username, $password, $dbname;
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) die("Connection failed: " . mysqli_connect_error());

$sql = "SELECT * FROM shop ORDER BY name";

$result = mysqli_query($conn, $sql);
$arary;
if (mysqli_num_rows($result) > 0) {
    while($data = mysqli_fetch_assoc($result)) {
        echo "id: " . $data["id"]. " -  Name: " . $data["name"]. "<br>";
        $arary[] = $data;
    }
} else {
    echo "0 results";
}
mysqli_close($conn);
return ($arary);
}

function getAllProductByPriceAsc() {
global $servername, $username, $password, $dbname;
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) die("Connection failed: " . mysqli_connect_error());

$sql = "SELECT * FROM shop ORDER BY price ASC";

$result = mysqli_query($conn, $sql);
$arary;
if (mysqli_num_rows($result) > 0) {
    while($data = mysqli_fetch_assoc($result)) {
        echo "id: " . $data["id"]. " -  Name: " . $data["name"]. "<br>";
        $arary[] = $data;
    }
} else {
    echo "0 results";
}
mysqli_close($conn);
return ($arary);
}

function getAllProductByPriceDesc() {
global $servername, $username, $password, $dbname;
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) die("Connection failed: " . mysqli_connect_error());

$sql = "SELECT * FROM shop ORDER BY price DESC";

$result = mysqli_query($conn, $sql);
$arary;
if (mysqli_num_rows($result) > 0) {
    while($data = mysqli_fetch_assoc($result)) {
        echo "id: " . $data["id"]. " -  Name: " . $data["name"]. "<br>";
        $arary[] = $data;
    }
} else {
    echo "0 results";
}
mysqli_close($conn);
return ($arary);
}

function putProduct ($name, $description, $price, $img, $category) {
global $servername, $username, $password, $dbname;
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) die("Connection failed: " . mysqli_connect_error());

$sql = "INSERT INTO shop (name, description, price, img, category)
VALUES ('$name', '$description', $price, '$img', $category)";
$res = false;
if (mysqli_query($conn, $sql)) {
    $res = true;
}
mysqli_close($conn);
return ($res);
}


function deleteProduct ($id) {
global $servername, $username, $password, $dbname;
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) die("Connection failed: " . mysqli_connect_error());

$sql = "DELETE FROM shop WHERE id='$id'";
$res = false;
if (mysqli_query($conn, $sql)) {
    $res = true;
}
mysqli_close($conn);
return ($res);
}


function updateProduct ($id, $name, $description, $price, $img, $category) {
global $servername, $username, $password, $dbname;
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) die("Connection failed: " . mysqli_connect_error());

$sql = "UPDATE shop SET name='$name', description='$description', price=$price, img = '$img', category = $category WHERE id='$id'";
$res = false;
if (mysqli_query($conn, $sql)) {
    $res = true;
}
mysqli_close($conn);
return ($res);
}


?>