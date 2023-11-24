<?php
session_start();

include_once "dbase.inc.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the new date from the POST data
    $newDate = $_POST["date"];

    // Get the email of the logged-in user
    $email = $_SESSION['user_info']['email'];

    // Update the last row for the specific user based on the timestamp
    $query = "UPDATE utilizadores SET select_date = ? WHERE email = ? ORDER BY timestamp_column DESC LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $newDate, $email);

    if ($stmt->execute()) {
        // Date updated successfully
        $response = ["success" => true, "message" => "Date updated successfully"];
    } else {
        // Error updating the date
        $response = ["success" => false, "message" => "Error updating date"];
    }
    $stmt->close();
    $conn->close();

    // Send the response as JSON
    header("Content-Type: application/json");
    echo json_encode($response);
} else {
    // Handle invalid or unsupported requests
    http_response_code(400); // Bad Request
}
?>
