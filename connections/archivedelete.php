<?php
include('./connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["deletevisitorid"])) {
    $visitorId = $_POST["deletevisitorid"];
    
    $deleteQuery = "DELETE FROM tbl_archive_visitors WHERE id = :visitorId";
    $statement = $conn->prepare($deleteQuery);
    $statement->bindParam(":visitorId", $visitorId, PDO::PARAM_INT);
    
    if ($statement->execute()) {
        // Deletion successful
        header("Location: ../archive.php");
        exit(); // Important: Stop script execution after the JavaScript redirect
    } else {
        // Error handling for SQL error
        echo "Error deleting visitor: " . $statement->errorInfo()[2];
    }
} else {
    echo "Invalid request.";
}
?>
