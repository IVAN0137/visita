<?php
include 'config.php';

$sql = "SELECT * FROM guias";
$result = $conn->query($sql);

$guides = array();
while ($row = $result->fetch_assoc()) {
    $guides[] = $row;
}

echo json_encode($guides);

$conn->close();
?>
