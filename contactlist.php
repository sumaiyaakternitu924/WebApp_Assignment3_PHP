<?php
session_start();
if (!$_SESSION['name']=="admin"){
 header('location:login.html');
}
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
    $sql = 'select * from db';
    $res = mysqli_query($conn,$sql);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <section class="list d-flex flex-column align-items-center justify-content-center">
    <h1 class="mb-4"> Contact List</h1>

    <table id="example" class="table table-striped ">
        <thead>
        <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>City</th>
                <th>User Type</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
           
           
        </thead>
        <tbody>
        <?php
        if (mysqli_num_rows($res) > 0) {
            while ($rows = mysqli_fetch_assoc($res)) {
                $id = $rows["id"];
                echo ' <tr>
                <td>' .$rows["firstname"].'</td>
                <td>' .$rows["lastname"].'</td>
                <td>' .$rows["email"].'</td>
                <td>' .$rows["connumber"].'</td>
                <td>' .$rows["city"].'</td>
                <td>' .$rows["usertype"].'</td>
                <td>' .$rows["Message"].'</td>
                <td><a class="btn btn-danger" href='."contactdelete.php?id=".$id.'>Delete</a></td>

            </tr>
                ';
            }
        }
            ?>
           
        </tbody>
    </table>
    </section>
</body>
</html>