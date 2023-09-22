<?php
include('./connection.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chmsu_visitor_log";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST" || isset($loginSubmitbtn)) {
        $username = $_POST["loginUsername"];
        $password = $_POST["loginPassword"];
       
        $query = "SELECT * FROM tbl_administrator WHERE username = :Authusername AND pass = :Authpassword";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':Authusername', $username);
        $stmt->bindParam(':Authpassword', $password);
        $stmt->execute();
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
           
            header("Location: ../dashboard.php");
        } else {
         
            echo  "<script>
            setTimeout(function() {
                alert('Invalid Username and Password');
                window.location.href = '../index.php'; 
            }); 
          </script>" ;
            
            exit(); 
        }
    }
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
