<?php
include 'config.php';

$search = $_GET['query'] ?? '';

$sql = "SELECT * FROM guias WHERE nombre LIKE ? OR colonia LIKE ? OR municipio LIKE ?";
$stmt = $conn->prepare($sql);
$searchParam = "%" . $search . "%";
$stmt->bind_param("sss", $searchParam, $searchParam, $searchParam);
$stmt->execute();
$result = $stmt->get_result();

$guides = array();
while ($row = $result->fetch_assoc()) {
    $guides[] = $row;
}

echo json_encode($guides);

$conn->close();
?>
