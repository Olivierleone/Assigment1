<?php
// Simulate counting page loads
$count = 100; // For example, you can use any mechanism to count page loads

// Return the count as JSON-encoded data
header('Content-Type: application/json');
echo json_encode(['count' => $count]);
?>
