<?php
include('./connection.php');

if (isset($_POST['addbtn'])) {
    $departmentName = $_POST['department'];
    $description = $_POST['description'];

    // Check if departmentName and description are not empty
    if (!empty($departmentName) && !empty($description)) {
        try {
            $locationquery = "INSERT INTO tbl_location (department_name, description) VALUES (?, ?)";
            $locationStatement = $conn->prepare($locationquery);
            $locationStatement->execute([
                $departmentName,
                $description,
            ]);

            echo '<script>
                      setTimeout(function() {
                          alert("Data added successfully!");
                          window.location.href = "../location.php";
                      }, 1000);
                  </script>';
        } catch (PDOException $e) {
            error_log("Error inserting location data: " . $e->getMessage());
            echo "An error occurred while inserting data. Please try again later.";
        }
    } else {
        echo "Some fields are missing!";
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["deletedepartment"])) {
    // Get the department id to be deleted
    $departmentId = $_POST["deletedepartment"];

    // Prepare and execute the SQL query to delete the department
    $deleteQuery = "DELETE FROM tbl_location WHERE id = :departmentId"; // Update the table name accordingly
    $statement = $conn->prepare($deleteQuery);
    $statement->bindParam(":departmentId", $departmentId, PDO::PARAM_INT);

    if ($statement->execute()) {
        // Department deleted successfully
        header("Location: ../location.php"); // Redirect to the previous page after deletion
        exit();
    } else {
        // Handle the case where deletion fails (you can show an error message)
        echo "Error deleting department.";
    }
} elseif (isset($_POST["updatebtn"])) {
    // Update code
    $locationId = $_POST["location_id"];
    $departmentName = $_POST['department_name'];
    $description = $_POST['description'];

    if (!empty($locationId) && !empty($departmentName) && !empty($description)) {
        try {
            // SQL update query
            $updateQuery = "UPDATE tbl_location SET department_name = ?, description = ? WHERE id = ?";
            $updateStatement = $conn->prepare($updateQuery);
            $updateStatement->execute([
                $departmentName,
                $description,
                $locationId
            ]);

            echo '<script>
                  setTimeout(function() {
                      alert("Data updated successfully!");
                      window.location.href = "../location.php";
                  }, 1000);
              </script>';
        } catch (PDOException $e) {
            error_log("Error updating location data: " . $e->getMessage());
            echo "An error occurred while updating data. Please try again later.";
        }
    } else {
        echo "Some fields are missing!";
    }
} else {
    // Handle invalid request (e.g., direct access to this file without POST data)
    echo "Invalid request.";
}
?>
