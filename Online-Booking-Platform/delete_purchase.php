<?php
session_start();

if (!isset($_SESSION['user_info'])) {
    header("Location: no_purchase.php");
    exit();
}

include_once "dbase.inc.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['purchase_id'])) {
    $purchaseId = $_GET['purchase_id'];
    
    // Delete the purchase with the given purchase_id
    $delete_query = "DELETE FROM utilizadores WHERE id = ?";
    $stmt_delete = $conn->prepare($delete_query);
    $stmt_delete->bind_param("i", $purchaseId);
    
    if ($stmt_delete->execute()) {
        // Successful deletion
        header("Location: delete_msg.php");
        exit;
    } else {
        // Deletion failed
        $error = "Error: " . $stmt_delete->error;
    }
    // Close the statement
    $stmt_delete->close();
}

// Close the database connection
$conn->close();
?>