<?php 
$servername = "localhost";
$username = "root";
$password = "";
$db = "contact";
// Create connection
$conn = new mysqli($servername, $username, $password,$db);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{
    $id = $_GET['id'];

    $sql = 'Delete from db where id='.$id;
    $res = mysqli_query($conn,$sql);
    echo "<script>alert('Deleted successfully')</script>";
    header('location:contactlist.php');
}
?>