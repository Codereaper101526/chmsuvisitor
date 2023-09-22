<?php
// Directory where images will be stored
$targetDir = '../capturedphoto/';

// Check if a file was uploaded
if (isset($_FILES['image'])) {
    // Get the filename from the POST data
    $filename = $_FILES['image']['name'];

    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetDir . $filename)) {
        // Image was successfully stored on the server
        echo 'Image stored on the server as ' . $filename;
    } else {
        // Failed to move the uploaded file
        echo 'Failed to store the image on the server.';
    }
} else {
    // No file was uploaded
    echo 'No file uploaded.';
}
?>
