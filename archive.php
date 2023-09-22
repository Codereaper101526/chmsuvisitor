<?php 
 include('./connections/connection.php');
 $fetch = " SELECT * FROM tbl_archive_visitors ORDER BY id DESC";
    $statement = $conn->prepare($fetch);
   $statement->execute();

   $archivefetchresult = $statement->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor's Log System</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="./img/logochmsu.png">
     <!-- data tables -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
</head>
<body>
    <div class="mainWrapperContainer">
            <div class="navbarContainer">
                <div class="navbarLogo">
                    <img src="./img/chmsulogo.png" alt="CHMSU" id="logo">
                </div>
                <div class="navbarTitle">
                    <h2>CARLOS HILADO MEMORIAL STATE UNIVERSITY</h2>
                    <h6>VISITOR'S LOG SYSTEM</h6>
                </div>
                <?php
                include('./components/liveTimer.php')
                ?>
            </div>
            <!--        Main Content-->
            <div class="bodyContainer">
               <?php
               include('./components/sidebar.php');
               ?>
                <div class="archiveContainer">
                    <div class="archivetableContainer">
                       <table id="myTables" class="table table-responsive table-light table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">FULLNAME</th>
                                    <th scope="col">DESTINATION</th>
                                    <th scope="col">TIME IN</th>
                                    <th scope="col">TIME OUT</th>
                                    <th scope="col">PURPOSE</th>
                                    <th scope="col">VISITOR NUMBER</th>
                                    <th scope="col">PLATENUMBER</th>
                                    <th scope="col">IMAGE</th>
                                    <th scope="col">IMAGENAME</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">ACTION</th>
                                    <th scope="col" hidden>IMAGE NAME</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if ($archivefetchresult) {
                                        foreach ($archivefetchresult as $data){
                                            $timeInFormatted = date("Y-m-d h:i A", strtotime($data->timein));
                                            $timeoutFormatted = date("Y-m-d h:i A", strtotime($data->visitortimeout));
                                             echo " <tr>
                                              <td>{$data->id}</td>
                                              <td>{$data->fullname}</td>
                                              <td>{$data->destination}</td>
                                              <td>{$timeInFormatted}</td>
                                              <td>{$timeoutFormatted}</td>
                                              <td>{$data->purpose}</td>
                                              <td>{$data->passnumber}</td>
                                              <td>{$data->platenumber}</td>
                                              <td class='zoomable-image'>
                                              <img src='capturedphoto/{$data->imagename}' alt='' style='width:110px;height:110px;'>
                                              </td>
                                              <td>{$data->imagename} </td>
                                              <td><div style='border:1px solid red; border-radius:20px;background-color:red;color:white;text-align:center;'>Inactive</div> </td>

                                              <td>
                                                        <form action='./connections/archivedelete.php' method='post' onsubmit='return confirmDelete();'>
                                                        <input type='hidden' name='deletevisitorid' value='{$data->id}'>
                                                        <button type='submit' class='btn' name='deleteButton' style='border:1px solid red'>
                                                            <i class='bi bi-trash3'></i>
                                                        </button>
                                                    </form>
                                              </td>
                                              <td hidden>{$data->imagename}</td>
                                             </tr>
                                             
                                             
                                             ";
                                        }
                                    }
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>    
            <!-- footer content -->
            <div class="footerContainer">
                <span>Visitor Logging system v0.1</span>
                <span> ICT MIS CARLOS HILADO MEMORIAL STATE UNIVERSITY</span>
            </div>
        </div> 
        <!-- data tables -->
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/fixedcolumns/4.3.0/js/dataTables.fixedColumns.min.js"></script>
        <script src="./js/archivetable.js"></script>
        <!-- main bootstrap js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="./js/main.js"></script>

    </body>
</html>