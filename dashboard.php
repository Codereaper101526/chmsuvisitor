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
                <div class="navbarTitle" style="white-space: nowrap;">
                    <h4>CARLOS HILADO MEMORIAL STATE UNIVERSITY</h4>
                    <h6>VISITOR'S LOG SYSTEM</h6>
                </div>
               <?php
                include('./components/liveTimer.php');
               ?>
            </div>
           
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
               <!-- Main Content-->
                <div class="mainContentContainer">
                       <div class="bodyInsertContent">
                            <div class="InsertContentuppercontainer">
                                <div class="cameracontainer">
                                    <div class="videocameracontainer">
                                        <div class="videocameraheadercontainer">
                                                <span>CAMERA</span>
                                        </div>
                                        <div class="postioncontainer">
                                        <div class="videoposition">
                                                    <video id="webcam" autoplay playsinline style="width: 100%; height:100%; object-fit:cover;"></video>
                                                    <canvas id="canvas" class="d-none"></canvas>
                                                    <audio id="snapSound" src="audio/snap.wav" preload="auto"></audio>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="capturedimagecontainer">
                                        <div class="capturedcameraheadercontainer">
                                            <span>PHOTO</span>
                                        </div>
                                        <div class="postioncontainer">
                                            <div class="videoposition">
                                            <img id="capturedImage" src="" alt="Captured Image" style="width: 100%; height:100%; object-fit:cover;">
                                            </div>
                                        </div>       
                                    </div>
                                </div>
                                <div class="camerabuttoncontainer">
                                    <div class="videobtncontainer"><span><button class="btn btn-outline-primary" id="start">Start Webcam</button></span></div>
                                    <div class="videobtncontainer"><span><button class="btn btn-outline-success" id="takePicture">Capture</button></span></div>
                                </div>
                            </div>
                            <div class="InsertContentlowercontainer">
                                <div class="InsertFormContainer">
                                    <form action="./connections/formsubmittion.php" method="POST" class="formContainer" onsubmit="return validateForm()">
                                        <div class="InsertHeaderContainer mb-3">
                                            <h4 class="InsertHeaderDetails">INSERT DETAILS</h4>
                                        </div>
                                        <div class="InsertFullnameWrapper">
                                            <div class="InsertFullnameContainer">
                                                <div class="InsertFullnameDetails col-md-11">
                                                    <label for="fullname">Fullname:</label>
                                                    <input type="text" class="form-control" name="fullname" required/>
                                                </div>
                                            </div>
                                            <div class="InsertDestinationContainer">
                                                <div class="InsertDestinationDetails col-md-11">
                                                <?php
                                                        include('./connections/connection.php');

                                                        $fetchlocation = "SELECT DISTINCT department_name FROM tbl_location ORDER BY department_name ASC";

                                                        $statement = $conn->prepare($fetchlocation);
                                                        $statement->execute();
                                                        $fetchlocationresult = $statement->fetchAll(PDO::FETCH_OBJ);

                                                        if ($fetchlocationresult) {
                                                            echo ' <label for="selection">DEPARTMENT:</label>
                                                            <select name="selectedOptions[]" class="form-control" id="selection" multiple>'; // Start the multiple select element and define the name as an array
                                                            foreach($fetchlocationresult as $data) {
                                                                $departmentName = $data->department_name;
                                                                echo "<option value='$departmentName'>$departmentName</option>";
                                                            }
                                                            echo '</select>'; // End the select element
                                                        }
                                                        ?>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="InsertPurposeWrapper">
                                            <div class="InsertPurposeContainer">
                                                <div class="InsertPurposeDetails col-md-11">
                                                    <label for="purpose">Purpose:</label>
                                                    <input type="text" class="form-control" name="purpose" required/>
                                                </div>
                                            </div>
                                            <div class="InsertVisitorPassContainer">
                                                <div class="InsertVistorPassDetails col-md-11">
                                                    <label for="visitorpass">VisitorPass#:</label>
                                                    <input type="number" class="form-control" name="visitorPass" required/> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="InsertPlateNumberWrapper">
                                            <div class="InsertPlateNumberContainer">
                                                <div class="InsertPlateNumberDetails col-md-11">
                                                    <label for="platenumber">PlateNumber:</label>
                                                    <input type="text" class="form-control" name="plateNumber"/>
                                                </div>
                                            </div>
                                            <div class="InsertRemarksContainer">
                                                <div class="InsertRemarksDetails col-md-11">
                                                    <label for="remarks">Remarks:</label>
                                                    <input type="text" class="form-control" name="remarks"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="InsertButtonWrapper">
                                            <div class="InsertButtonContainer">
                                                <button type="submit" class="InsertButtonDetails btn btn-outline-primary" name="formsbmt" value="Submit" id="sbmtbtn" >Submit</button>
                                                <button type="reset" class="btn btn-outline-danger">Clear</button>
                                            </div>
                                            <div class="InsertImageContainer">
                                                <div class="InsertImageDetails">
                                                    
                                                     <label for="image" hidden>Image identification</label>
                                                     <input type="text" class="form-control" name="image" id="image" required  hidden>
                                                 
                                                </div>
                                            </div>
                                        </div>
                                    </form>   
                                </div>
                            </div>
                        </div>
                        <div class="bodyTableContent">
                        <table id="myTable" class="table table-light table-responsive table-striped table-hover">
                            <thead >
                                <tr>
                                <th scope="col">ID</th>
                                <th scope="col">FULLNAME</th>
                                <th scope="col">DESTINATION</th>
                                <th scope="col" class="w-50">DATE AND TIME</th>
                                <th scope="col">PURPOSE</th>
                                <th scope="col" class="w-50">VISITOR NUMBER</th>
                                <th scope="col">IMAGE</th>
                                <th scope="col">STATUS</th>
                                <th scope="col">ACTION</th>
                                <th hidden>Image nAME</th>
                               
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                include('./connections/connection.php');
                                

                                     $fetch = "SELECT * FROM tbl_visitors ORDER BY id DESC";
                                    $statement = $conn->prepare($fetch);
                                    $statement->execute();

                                    $visitorfetchresult = $statement->fetchAll(PDO::FETCH_OBJ);
                                    
                                    if ($visitorfetchresult) {
                                        foreach ($visitorfetchresult as $row) {
                                            // Convert the timeIn value to a 12-hour format (AM/PM)
                                            $timeInFormatted = date("Y-m-d h:i A", strtotime($row->Timein));
                                    
                                            echo "<tr>
                                                     <td>{$row->id}</td>
                                                    <td>{$row->fullname}</td>
                                                    <td>{$row->destination}</td>
                                                    <td>{$timeInFormatted}</td>
                                                    <td>{$row->purpose}</td>
                                                    <td>{$row->passnumber}</td>
                                                    <td>
                                                        <img src='capturedphoto/{$row->imagename}' alt='' style='width:85px;height:85 px;'>
                                                    </td>
                                                    <td> <div style='border:1px solid green; border-radius:20px;background-color:green;color:white;text-align:center;'>Active</div> </td>
                                                    
                                                    <td style='display:flex;flex-direction:column;justify-content:center;align-items:center;gap:5px;' >
                                                        <a
                                                         idshow='{$row->id}'
                                                          fullnameshow=' {$row->fullname}' 
                                                            destinationshow='{$row->destination}'
                                                             timeinshow='{$timeInFormatted}'
                                                                purposeshow='{$row->purpose}' 
                                                                    passnumbershow='{$row->passnumber}'
                                                                     platenumbershow='{$row->platenumber}'  
                                                                        remarkshow='{$row->remarks}'
                                                                            imagename='{$row->imagename}'  
                                                                 class='btn' data-bs-toggle='modal' data-bs-target='#viewfullmodal' style='border:1px solid blue;'>

                                                        <i class='bi bi-eye'></i> 

                                                        </a>
                                                    
                                                        <a
                                                        idupdate='{$row->id}'
                                                            fullnameupdate=' {$row->fullname}' 
                                                                destinationupdate='{$row->destination}'
                                                                 timeinupdate='{$timeInFormatted}'
                                                                    purposeupdate='{$row->purpose}' 
                                                                        passnumberupdate='{$row->passnumber}'
                                                                            platenumberupdate='{$row->platenumber}'  
                                                                                 remarkupdate='{$row->remarks}'
                                                                                    imagename='{$row->imagename}'  
                                                                 class='btn' data-bs-toggle='modal' data-bs-target='#updatemodal' style='border:1px solid green'>

                                                                 <i class='bi bi-pen'></i>

                                                        </a>

                                                        <a>
                                                        <div> 
                                                             <form action='./connections/visitortable.php' method='post' onsubmit='return confirmDelete();'>
                                                             <input type='hidden' name='deletevisitorid' value='{$row->id}'>
                                                             <button type='submit' class='btn' onclick='' name='deletevisitortrigger' style='border:1px solid red'>
                                                             <i class='bi bi-trash3'></i>
                                                             </button>
                                                                </a>
                                                          </form> 
                                                        </div> 
                                                        

                                                        <div> 
                                                             <form action='./connections/visitortable.php' method='post' onsubmit='return confirmArchive();'>
                                                             <input type='hidden' name='archivevisitorid' value='{$row->id}'>
                                                             <button type='submit' class='btn' onclick='' name='archivisitor' style='border:1px solid grey'>
                                                             <i class='bi bi-box-arrow-left'></i>
                                                             </button>
                                                                </a>
                                                          </form> 
                                                        </div> 


                                                        
                                                        
                                                   
                                                    
                                                    
                                                    
                                                    </td>
                                                    <td hidden>{$row->imagename}</td>
                                                  </tr>";
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

   
    <!-- Show Full Modal -->
<div class="modal fade" id="viewfullmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> VISITOR FULL DETAIL</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div style="width: 100%; height:300px; display:flex;justify-content:center;align-items:center;"> 
            <div>
            <img src="" id="imageInModal" alt=""></div>
        
            </div>
            <label for="idshowmodal">id</label>
                <input type="text" class="form-control"  id="idshowmodal" readonly>
            <label for="fullnameshowmodal">Fullname</label>
                <input type="text" class="form-control"  id="fullnameshowmodal" readonly>
            <label for="destinationshowmodal">Destination</label>
                <input type="text" class="form-control"  id="destinationshowmodal" readonly>
            <label for="timeInshowmodal">TimeIn</label>
                <input type="text" class="form-control"  id="timeInshowmodal" readonly>
            <label for="purposeshowmodal">Purpose</label>
                <input type="text" class="form-control"  id="purposeshowmodal" readonly>
            <label for="passnumbershowmodal">Passnumber</label>
                <input type="text" class="form-control"  id="passnumbershowmodal" readonly>
            <label for="platenumbershowmodal">Platenumber</label>
                <input type="text" class="form-control"  id="platenumbershowmodal" readonly>
            <label for="remarksshowmodal">Remarks</label>
                <input type="text" class="form-control"  id="remarksshowmodal" readonly>
            <label for="imageshowmodal">Imagename</label>
                <input type="text" class="form-control"  id="imageshowmodal" readonly>                                
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- update modal -->
<div class="modal fade" id="updatemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">UPDATE VISITOR </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form action="./connections/visitortable.php" method="post">
            <label for="idupdatemodal" hidden>Identification</label>
                <input type="text" class="form-control"  id="idupdatemodal" name="updatevisitorid"  hidden>
            <label for="fullnameshowmodal">Fullname</label>
                <input type="text" class="form-control"  id="fullnameupdatemodal" name="updatefullname">
            <label for="destinationshowmodal">Destination</label>
                <input type="text" class="form-control"  id="destinationupdatemodal" name="updatedestination">
            <label for="purposeshowmodal">Purpose</label>
                <input type="text" class="form-control"  id="purposeupdatemodal" name="updatepurpose">
            <label for="passnumbershowmodal">Passnumber</label>
                <input type="text" class="form-control"  id="passnumberupdatemodal" name="updatepassnum">
            <label for="platenumbershowmodal">Platenumber</label>
                <input type="text" class="form-control"  id="platenumberupdatemodal" name="updateplatenum">
            <label for="remarksshowmodal">Remarks</label>
                <input type="text" class="form-control"  id="remarksupdatemodal" name="updateremarks">                                     
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-outline-success" data-bs-dismiss="modal" name="submitupdate">Submit</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- data table -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/4.3.0/js/dataTables.fixedColumns.min.js"></script>
<script src="./js/dataTables.js"></script>
<!-- main bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="./js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/webcam-easy/dist/webcam-easy.min.js"></script>
<script>
        // Function to check if the webcam is available
        async function isWebcamAvailable() {
            try {
                const devices = await navigator.mediaDevices.enumerateDevices();
                const hasWebcam = devices.some(device => device.kind === 'videoinput');
                return hasWebcam;
            } catch (error) {
                console.error('Error checking webcam availability:', error);
                return false;
            }
        }

        // Function to start the camera
        async function startCamera() {
            try {
                const webcamAvailable = await isWebcamAvailable();
                if (webcamAvailable) {
                    await webcam.start();
                    webcamIsOpen = true; // Set the flag to indicate the webcam is open
                    console.log('Webcam started successfully.');
                } else {
                    console.warn('Webcam is not available on this device.');
                }
            } catch (error) {
                console.error('Error starting the webcam:', error);
            }
        }

        // Add a click event listener to the "Start Webcam" button
        document.getElementById("start").addEventListener('click', async () => {
            await startCamera(); // Start the camera when the button is clicked
        });
    </script>
    <script type="text/javascript">
        const webcamElement = document.getElementById('webcam');
        const canvasElement = document.getElementById('canvas');
        const snapSoundElement = document.getElementById('snapSound');
        const webcam = new Webcam(webcamElement, 'user', canvasElement, snapSoundElement);
        const capturedImageElement = document.getElementById('capturedImage');
        capturedImageElement.src = ''
        const downloadImageButton = document.getElementById('downloadImage');
        const imageContainerInput = document.getElementById("image");

       
        let webcamIsOpen = false;

        // document.getElementById("start").addEventListener('click', async () => {
        //     await webcam.start();
        //     webcamIsOpen = true; // Set the flag to indicate the webcam is open
        // });


        
        
        //         async function startCamera() {
        //     await webcam.start();
        //     webcamIsOpen = true; // Set the flag to indicate the webcam is open
        // }

        // // Call the startCamera function when the page loads
        // window.addEventListener('load', startCamera);

        let capturedImage = null; // Variable to store the captured image data

        document.getElementById("takePicture").addEventListener('click', async () => {
            if (webcamIsOpen) {
                const pic = await webcam.snap();
                const canvas = document.getElementById("canvas");
                const context = canvas.getContext('2d');
                const capture = new Image();
                capture.src = pic;
                capture.onload = () => {
                    context.drawImage(capture, 0, 0);
                    capturedImageElement.src = pic;

                    // Store the captured image data in the variable
                    capturedImage = pic;

                    // Generate a unique filename based on a timestamp in the format "yyyyMMddHHmmss"
                    const now = new Date();
                    const year = now.getFullYear();
                    const month = (now.getMonth() + 1).toString().padStart(2, '0'); // Month is 0-based
                    const day = now.getDate().toString().padStart(2, '0');
                    const hours = (now.getHours() % 12 || 12).toString().padStart(2, '0'); // Convert to 12-hour format
                    const minutes = now.getMinutes().toString().padStart(2, '0');
                    const ampm = now.getHours() >= 12 ? 'PM' : 'AM'; // Determine AM/PM
                    const timestamp = `${year}${month}${day}${hours}${minutes}${ampm}`;
                    const filename = "Captured_visitor_" + timestamp + ".jpg";

                    // Update the value of the imagecontainer input with the filename
                    imageContainerInput.value = filename;
                }
            } else {
                alert('Webcam is not open. Please click the "Start Webcam" button first.');
            }
        });

        // Add an event listener to the submit button to upload the captured image
        document.getElementById("sbmtbtn").addEventListener('click', () => {
            if (capturedImage) {
                // Send the captured image to a PHP script for processing with the same filename
                const formData = new FormData();
                formData.append('image', dataURItoBlob(capturedImage), imageContainerInput.value); // Use the filename from the input

                fetch('./connections/photoupload.php', {
                    method: "POST",
                    body: formData
                })
                .then((resp) => {
                    if (resp.status === 200) {
                        // alert('Image stored on the server.');
                        // Optionally, you can reset the capturedImage variable to null here
                        capturedImage = null;
                    } else {
                        alert('Failed to store the image on the server.');
                    }
                });
            } else {
                alert('Please capture an image before submitting.');
            }
        });

        document.getElementById("downloadImage").addEventListener('click', () => {
            const downloadLink = document.createElement('a');
            downloadLink.href = capturedImageElement.src;
            downloadLink.download = 'captured_image.jpg';
            downloadLink.click();
        });

        // Function to convert data URI to Blob
        function dataURItoBlob(dataURI) {
            const byteString = atob(dataURI.split(',')[1]);
            const mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];
            const ab = new ArrayBuffer(byteString.length);
            const ia = new Uint8Array(ab);
            for (let i = 0; i < byteString.length; i++) {
                ia[i] = byteString.charCodeAt(i);
            }
            return new Blob([ab], { type: mimeString });
        }
        function validateForm() {
        // Get references to form elements
        var fullname = document.getElementsByName("fullname")[0].value;
        var selectedOptions = document.getElementsByName("selectedOptions[]")[0].selectedOptions;
        var purpose = document.getElementsByName("purpose")[0].value;
        var visitorPass = document.getElementsByName("visitorPass")[0].value;

        // Check if any of the required fields are empty
        if (!fullname || !selectedOptions.length || !purpose|| !visitorPass) {
            alert("Please fill in all required fields before submitting.");
            return false; // Prevent form submission
        }

        // If all required fields are filled, allow the form to submit
        return true;
        }
        </script>
    
 
    </body>
</html>