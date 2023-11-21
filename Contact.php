<?php
$conn = new mysqli("localhost","root","","contact");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{
    if(isset($_POST['submit'])){
        $firstname = $_POST['firstname']; 
        $lastname = $_POST['lastname']; 
        $email = $_POST['email']; 
        $num = $_POST['number']; 
        $city = $_POST['city'];
        $usertype = $_POST['usertype'];
        $msg = $_POST['msg']; 
        $sql = "INSERT INTO `db` (`firstname`, `lastname`, `email`, `connumber`, `city`, `usertype`, `message`) VALUES ('$firstname', '$lastname', '$email', '$num', '$city', '$usertype', '$msg')";
    
    if (mysqli_query($conn, $sql)) {
      header('location:done.html');

    } else {
      echo "<script>alert('Error: '.$sql.'<br>' . mysqli_error($conn))</script>" ;
    }
    
    $conn->close();
}
}
?>