<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$cheltuieliinput = $_POST["cheltuieliinput"];
$economiiinput = $_POST["economiiinput"];
$alimenteinput = $_POST["alimenteinput"];
$intretinereinput = $_POST["intretinereinput"];
$educatieinput = $_POST["educatieinput"];
$distractieinput = $_POST["distractieinput"];
$alteleinput = $_POST["alteleinput"];
$user_id = $_SESSION["user_id"];
$conn = new mysqli("localhost", "root", "", "aplicatiecheltdate");
if ($conn->connect_error) {
    die("Connection Failed  :  " . $conn->connect_error);
} else {
    $stmt = $conn->prepare(
        "insert into registration(cheltuieli, economii, alimente, intretinere, educatie, distractie, altele,user_id) values(?, ?, ?, ?, ?, ?, ?,?)"
    );

    $stmt->bind_param(
        "iiiiiiii",
        $cheltuieliinput,
        $economiiinput,
        $alimenteinput,
        $intretinereinput,
        $educatieinput,
        $distractieinput,
        $alteleinput,
        $user_id
    );
    $stmt->execute();
    echo "Datele dumneavosatra au fost inregistrate cu succes!";
    $stmt->close();
    $conn->close();
}

?>
