<?php
include('./connection.php');

if (isset($_POST['submitupdate'])) {
    $updatevisitorid = $_POST['updatevisitorid'];
    $updatefullname = $_POST['updatefullname'];
    $updatedestination = $_POST['updatedestination'];
    $updatepurpose = $_POST['updatepurpose'];
    $updatepassnumber = $_POST['updatepassnum'];
    $updateplatenumber = $_POST['updateplatenum'];
    $updateremarks = $_POST['updateremarks'];

    if (!empty($updatevisitorid) && !empty($updatefullname) && !empty($updatedestination)) {
        try {
            $vistorupdatequery = "UPDATE tbl_visitors SET fullname = :updatefullname, destination = :updatedestination , purpose = :updatepurpose, passnumber =:updatepassnum , platenumber = :updateplatenum, remarks =:updateremarks  WHERE id = :updatevisitorid";
            $updatestatement = $conn->prepare($vistorupdatequery);
            $updatestatement->execute([
                "updatevisitorid" => $updatevisitorid,
                "updatefullname" => $updatefullname,
                "updatedestination" => $updatedestination,
                "updatepurpose" => $updatepurpose,
                "updatepassnum" => $updatepassnumber,
                "updateplatenum" => $updateplatenumber,
                "updateremarks" => $updateremarks,
        
              
            ]);

            header('location: ../dashboard.php');
            exit(); // Add an exit to stop execution after the header redirect.

        } catch (PDOException $e) {
            error_log("Error updating subject: " . $e->getMessage());
            echo "An error occurred while updating the subject. Please try again later.";
        }
    } else {
        echo "Some fields are missing!";
    }
}
else if (isset($_POST['deletevisitortrigger'])) {
    $deletevisitorid = $_POST['deletevisitorid'];
    
    try {
        $deletesql = "DELETE FROM tbl_visitors WHERE id = :visitoriddelete";
        $deletestatement = $conn->prepare($deletesql);
        $deletestatement->execute([
            "visitoriddelete" => $deletevisitorid
        ]);

        header('location:../dashboard.php');

    } catch (PDOException $e) {
        error_log("Error deleting subject: " . $e->getMessage());
        echo "An error occurred while deleting the subject. Please try again later.";
    }
} else {
    echo "Form not submitted.";
}

if (isset($_POST['archivisitor'])) {
    date_default_timezone_set('Asia/Manila');
    $archivevisitorid = $_POST['archivevisitorid']; // Assuming you have a variable for the visitor ID to be archived
    $outtimestamp = date("Y-m-d H:i:s");
    try {
        // Step 1: Insert the visitor into the archive table
        $archiveSqlQuery = "INSERT INTO tbl_archive_visitors (id, fullname, destination, timein, visitortimeout, purpose, passnumber, platenumber, remarks, imagename) 
                            SELECT id, fullname, destination, Timein, :visitorout, purpose, passnumber, platenumber, remarks, imagename
                            FROM tbl_visitors
                            WHERE id = :visitoridarchive";
        $archiveStatement = $conn->prepare($archiveSqlQuery);
        $archiveStatement->execute([
            "visitoridarchive" => $archivevisitorid,
            "visitorout" => $outtimestamp 
        ]);

        // Step 2: Delete the visitor from the existing table
        $deleteSqlQuery = "DELETE FROM tbl_visitors WHERE id = :visitoriddelete";
        $deleteStatement = $conn->prepare($deleteSqlQuery);
        $deleteStatement->execute([
            "visitoriddelete" => $archivevisitorid
        ]);

        header('location: ../dashboard.php');
        exit(); // Add this line to prevent further script execution

    } catch (PDOException $e) {
        error_log("Error archiving and deleting visitor: " . $e->getMessage());
        echo "An error occurred while archiving and deleting the visitor. Please try again later.";
    }
} else {
    echo "Form not submitted.";
}





?>

