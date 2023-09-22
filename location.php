<?php
   include('./connections/connection.php');

   $fetchlocation = "SELECT * FROM tbl_location ORDER BY id DESC";

   $statement = $conn->prepare($fetchlocation);
   $statement->execute();
    $fetchlocationresult = $statement->fetchAll(PDO::FETCH_OBJ); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor's Log System</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="./img/logochmsu.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
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
                include('./components/liveTimer.php');
                ?>
            </div>
            <!--        Main Content-->
            <div class="bodyContainer">
                <div class="sidebarContainer">
                    <div class="sidebarIconContainer">
                            <button onclick="window.location.href='./dashboard.php'" class="btncontainer">
                                <div class="sidebarIcon"> <img src="./icon/id-card.png" alt="" class="iconmod"> </div>
                                <div class="iconLabel">Dashboard</div>
                            </button>
    
                             <button onclick="window.location.href='./archive.php'" class="btncontainer">
                                <div class="sidebarIcon"> <img src="./icon/file.png" alt="" class="iconmod"> </div>
                                <div class="iconLabel">Archive</div>
                            </button>

                             <button onclick="window.location.href='./location.php'" class="btncontainer">
                                <div class="sidebarIcon"> <img src="./icon/destination.png" alt="" class="iconmod"> </div>
                                <div class="iconLabel">Locations</div>
                            </button>
                    </div>
                    <div class="sidebarLogoutContainer">
                            <button onclick="window.location.href='./index.php'" class="btncontainer">
                                <div class="sidebarIcon"> <img src="./icon/logout.png" alt="" class="iconmod"> </div>
                                <div class="iconLabel"> <strong>LOGOUT </strong></div>
                            </button>
                    </div>
                </div>
                
                    <div class="mainContentContainer">
                         <div class="bodyInsertContent" style="display:flex;justify-content:center;align-items:center;">
                            <div class="mapcontainer"> </div>
                         </div>
                         <div class="bodyTableContent">
                            <div class="locationtableContainer" style="overflow: auto;">
                                <div class="addDestinationContainer">
                                    <div class="destinationiconContent">
                                        <button style="font-size: 13px;" type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#viewlocationmodal">Add Location</button>
                                    </div>
                                </div>
                                <div class="tablelocationContainer">
                                    <table id="myTable" class="table table-responsive table-light table-striped table-hover" style="overflow:auto;">
                                        <thead>
                                            <tr>
                                                <th class="col-2">ID</th>
                                                <th class="col-4">DEPARTMENT NAME</th>
                                                <th class="col-3">DESCRIPTION</th>
                                                <th class="col-2">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php
                                            
                                            if ($fetchlocationresult) {
                                                foreach ($fetchlocationresult as $data) {
                                                    echo "<tr> 
                                                            <td>{$data->id}</td>
                                                            <td>{$data->department_name}</td>
                                                            <td>{$data->description}</td>
                                                            <td style='display:flex; flex-direction:row; gap:10px;'> 
                                                                <div> 
                                                                    <form action='./connections/locationtable.php' method='post' onsubmit='return confirmDelete();'>
                                                                        <input type='hidden' name='deletedepartment' value='{$data->id}'>
                                                                        <button type='submit' class='btn' name='deleteButton' style='border:1px solid red'>
                                                                            <i class='bi bi-trash3'></i>
                                                                        </button>
                                                                    </form>
                                                                </div> 
                                                                <div>
                                                                    <a idlocationupdate='{$data->id}'
                                                                       deptnamelocation='{$data->department_name}' 
                                                                       depdescriptloc='{$data->description}'
                                                                       class='btn' data-bs-toggle='modal' data-bs-target='#updatelocationmodal' style='border:1px solid green'>
                                                                        <i class='bi bi-pen'></i>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>";
                                                }
                                            }
                                            
                                           ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                         </div>
                    </div>




                
            </div>    
            <!-- footer content -->
            <div class="footerContainer">
                <span>Visitor Logging system v0.1</span>
                <span> ICT MIS CARLOS HILADO MEMORIAL STATE UNIVERSITY</span>
            </div>
    </div> 

            <!-- location modal -->
            <!-- add destination  -->
                    <div class="modal fade" id="viewlocationmodal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">ADD LOCATION</h5>
                            </div>
                            <div class="modal-body">
                                <form action="./connections/locationtable.php" method="post">
                                    <label for="addDepartment">Department</label>
                                    <input type="text" class="form-control" id="addDepartment" name="department">
                                    <label for="addDescription">Description</label>
                                    <input type="text" class="form-control" id="addDescription" name="description">
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="addbtn">Add</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- update modal -->
                <!-- add destination  -->
                <div class="modal fade" id="updatelocationmodal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">UPDATE LOCATION</h5>
                    </div>
                    <div class="modal-body">
                        <form action="./connections/locationtable.php" method="post">
                            <label for="idlocupdate">Location ID</label>
                            <input type="text" class="form-control" id="idlocupdate" name="location_id" readonly>
                            <label for="updatedeptnameloc">Department Name</label>
                            <input type="text" class="form-control" id="updatedeptnameloc" name="department_name">
                            <label for="updatedescriploc">Description</label>
                            <input type="text" class="form-control" id="updatedescriploc" name="description">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="updatebtn">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            var updatemodallocation = document.getElementById('updatelocationmodal');
            updatemodallocation.addEventListener('show.bs.modal', function(event){
            var showbtn = event.relatedTarget;
            document.getElementById('idlocupdate').value = showbtn.getAttribute("idlocationupdate");
            document.getElementById('updatedeptnameloc').value = showbtn.getAttribute("deptnamelocation");
            document.getElementById('updatedescriploc').value = showbtn.getAttribute("depdescriptloc");
            });


        </script>
        
            
                <!-- data tables -->
                <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
                <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
                <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
                <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
                <script src="https://cdn.datatables.net/fixedcolumns/4.3.0/js/dataTables.fixedColumns.min.js"></script>
                <script src="./js/locationtable.js"></script>
                <!-- main bootstrap js -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
                <script src="./js/main.js"></script>

    </body>
</html>