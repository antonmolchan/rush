<?php

function getAllCategory() {
global $servername, $username, $password, $dbname;
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) die("Connection failed: " . mysqli_connect_error());

$sql = "SELECT * FROM category";

$result = mysqli_query($conn, $sql);
$arary;
if (mysqli_num_rows($result) > 0) {
    while($data = mysqli_fetch_assoc($result)) {
        // echo "id: " . $data["id"]. " -  name:   " . $data["name"]. "<br>";
        $arary[] = $data;
    }
}
mysqli_close($conn);
return ($arary);
}

function putCategory ($name) {
global $servername, $username, $password, $dbname;
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) die("Connection failed: " . mysqli_connect_error());

$sql = "INSERT INTO category (name) VALUES ('$name')";
$res = false;
if (mysqli_query($conn, $sql)) {
    $res = true;
}
mysqli_close($conn);
return ($res);
}


function deleteCategory ($id) {
global $servername, $username, $password, $dbname;
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) die("Connection failed: " . mysqli_connect_error());

$sql = "DELETE FROM category WHERE id='$id'";
$res = false;
if (mysqli_query($conn, $sql)) {
    $res = true;
}
mysqli_close($conn);
return ($res);
}


function updateCategory ($id, $name) {
global $servername, $username, $password, $dbname;
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) die("Connection failed: " . mysqli_connect_error());
	
$sql = "UPDATE category SET name='$name' WHERE id='$id'";
$res = false;
if (mysqli_query($conn, $sql)) {
    $res = true;
}
mysqli_close($conn);
return ($res);
}


?>