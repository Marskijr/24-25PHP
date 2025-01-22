<?php

// Set up our variables and set them to empty
$user = $pass = "";

// Condition to detect form data and sanitize it
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = sanitize_inputs($_POST["user"]);
    $pass = sanitize_inputs($_POST["pass"]);
}
// Function to sanitize the data
function sanitize_inputs($data)
{
    // Trim method removes spaces at beginning and end
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//values for my SQL connection
$servername = "localhost";
$username = "root";
$password = "Nickfuryxd1723!";
$dbname = "db_auth";

$conn = mysqli_connect($servername, $username, $password, $dbname);

//check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());

}
echo "Connected Successfully";

// SQL query to retrieve DATA
$sql = "SELECT * FROM `login`";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    while($row = mysqli_fetch_assoc($result)) {
        if($row["User"] == $user && $row["Pass"] == $pass){
            echo "Login Successful";
        }else{
            echo "Login Failed";
        }
    }
}else {
    echo "0 results";
}



?>