<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitors Log</title>
    <!-- main boostraplink -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="./css/style.css">
   <link rel="icon" type="image/png" href="./img/logochmsu.png">
</head>
<body class="loginMainContainer">
   <div class="loginContainer">
            <div class="loginHeaderContainer">
                <div class="loginImageContainer">
                    <img src="./img/chmsulogo.png" alt="CHMSU" id="loginImageContent">
                </div>
                <div class="loginTitleContainer">
                    <h3> CARLOS HILADO MEMORIAL STATE UNIVERSITY</h3>
                    <h5 style="font-size: 17px;"> VISITOR LOGGING SYSTEM </h5>
                </div>
            </div>
            <form action="./connections/authentication.php" method="post">
                <div class="loginInputContainer">
                    <div class="mb-3">
                        
                        <label for="Username" class="form-label"> <b>USERNAME </b></label>
                        <input type="text" class="form-control" name="loginUsername" placeholder="johndoe2023" required>
                    </div>
                    <div class="mb-3">
                        <label for="Password" class="form-label"><b>PASSWORD</b></label>
                        <input type="password" class="form-control" name="loginPassword" placeholder="*********" required>
                    </div>
                </div>
                <div class="loginFooterContainer">
                    <button type="submit" class="btn btn-outline-success  btn-sm "name="loginSubmitbtn">LOGIN</button>
                    <button type="reset" class="btn btn-outline-danger  btn-sm" >CLEAR</button>
                </div>
                <div class="loginFooterRemarks">
                    <div>
                    <span>
                        PROPERTY OF:
                    </span>
                    </div>
                    <div>
                    <span>
                       CARLOS HILADO MEMORIAL STATE UNIVERSITY iCT OFFICE
                    </span>
                    </div>
                
                </div>
              
            </form>
   </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>