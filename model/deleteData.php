<?php include("connex.php");

$id = intval($_GET['q']);
$sql = "DELETE FROM liste WHERE id=$id";

if (isset($id) && !empty($id)) {
    $conn->exec($sql);
    $conn = null;
}
