<?php


function getAllUser() {
global $servername, $username, $password, $dbname;
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) die("Connection failed: " . mysqli_connect_error());

$sql = "SELECT * FROM user";

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

function chechIfUserExist ($login) {
global $servername, $username, $password, $dbname;
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) die("Connection failed: " . mysqli_connect_error());

$sql = "SELECT login FROM user WHERE login='$login'";

$result = mysqli_query($conn, $sql);
$ifExist = false;

if (mysqli_num_rows($result) > 0) {
    $ifExist = true;
}
mysqli_close($conn);
return ($ifExist);
}

function putUser ($login, $pass) {
global $servername, $username, $password, $dbname;
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) die("Connection failed: " . mysqli_connect_error());

$sql = "INSERT INTO user (login, pass)
VALUES ('$login', '$pass')";
$res = false;
if (mysqli_query($conn, $sql)) {
    $res = true;
}
mysqli_close($conn);
return ($res);
}

function logIn ($login, $pass) {
global $servername, $username, $password, $dbname;
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) die("Connection failed: " . mysqli_connect_error());

$sql = "SELECT * FROM user WHERE login='$login' AND pass='$pass'";

$result = mysqli_query($conn, $sql);
$ifExist = false;

if (mysqli_num_rows($result) > 0) {
    $ifExist = true;
} 
mysqli_close($conn);
return ($ifExist);
}

function deleteUser ($login) {
global $servername, $username, $password, $dbname;
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) die("Connection failed: " . mysqli_connect_error());
$res = false;

$sql = "DELETE FROM user WHERE login='$login'";

if (mysqli_query($conn, $sql)) {
    $res = true;
}
mysqli_close($conn);
return ($res);
}

function updateUserData ($login, $pass, $id) {
global $servername, $username, $password, $dbname;
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) die("Connection failed: " . mysqli_connect_error());

$sql = "UPDATE user SET login='$login', pass='$pass' WHERE id='$id'";
$res = false;
if (mysqli_query($conn, $sql)) {
    $res = true;
} 
mysqli_close($conn);
return ($res);
}

?>