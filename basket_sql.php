<?php

function getAllProductBasket($userId) {
global $servername, $username, $password, $dbname;
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) die("Connection failed: " . mysqli_connect_error());

$arary;

$sql = "SELECT * FROM basket WHERE user_id=$userId";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($data = mysqli_fetch_assoc($result)) {
        echo "id: " . $data["id"]. " -  Name: " . $data["count"]. "<br>";
        $arary[] = $data;
    }
}

mysqli_close($conn);
return ($arary);
}

function putProductToBasket ($user_id, $product_id, $count) {
global $servername, $username, $password, $dbname;
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) die("Connection failed: " . mysqli_connect_error());

$sql = "INSERT INTO basket (user_id, product_id, count)
VALUES ($user_id, $product_id, $count)";
$res = false;
if (mysqli_query($conn, $sql)) {
    $res = true;
}
mysqli_close($conn);
return ($res);
}


function deleteBasketProduct ($id) {
global $servername, $username, $password, $dbname;
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) die("Connection failed: " . mysqli_connect_error());

$sql = "DELETE FROM basket WHERE id='$id'";
$res = false;
if (mysqli_query($conn, $sql)) {
    $res = true;
}
mysqli_close($conn);
return ($res);
}


function updateBasketProduct ($id, $user_id, $product_id, $count) {
global $servername, $username, $password, $dbname;
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) die("Connection failed: " . mysqli_connect_error());

$sql = "UPDATE basket SET user_id=$user_id, product_id=$product_id, count=$count WHERE id='$id'";
$res = false;
if (mysqli_query($conn, $sql)) {
    $res = true;
}
mysqli_close($conn);
return ($res);
}


?>