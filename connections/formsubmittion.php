<?php
include('./connection.php');

date_default_timezone_set('Asia/Manila');

if (isset($_POST['formsbmt'])) {
    // Check if form fields are set and not empty
    if (
        isset($_POST['fullname']) && !empty($_POST['fullname']) &&
        isset($_POST['selectedOptions']) && is_array($_POST['selectedOptions']) &&
        isset($_POST['purpose']) && !empty($_POST['purpose']) &&
        isset($_POST['visitorPass']) && !empty($_POST['visitorPass']) &&
        isset($_POST['image']) && !empty($_POST['image'])
    ) {
        $fullname = $_POST['fullname'];
        $selectedOptions = implode(',', $_POST['selectedOptions']);
        $purpose = $_POST['purpose'];
        $visitorpass = $_POST['visitorPass'];
        $platenum = $_POST['plateNumber'];
        $remarks = $_POST['remarks'];
        $imagename = $_POST['image'];
        $timestamp = date("Y-m-d H:i:s");

        try {
            $visitorsubmitquery = "INSERT INTO tbl_visitors (fullname, destination, timein, purpose, passnumber, platenumber, remarks, imagename) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $visitorsubmitStatement = $conn->prepare($visitorsubmitquery);
            $visitorsubmitStatement->execute([
                $fullname,
                $selectedOptions,
                $timestamp,
                $purpose,
                $visitorpass,
                $platenum,
                $remarks,
                $imagename
            ]);

            echo '<script>
           
            window.location.href = "../dashboard.php";
        </script>';
        
        } catch (PDOException $e) {
            error_log("Error inserting visitor data: " . $e->getMessage());
            echo "An error occurred while inserting the data. Please try again later.";
        }
    } else {
        echo '<script>
                  alert("Some fields are missing or empty. Please fill out all required fields.");
                  window.location.href = "../dashboard.php"; // Redirect back to the form page
              </script>';
    }
}
?>
