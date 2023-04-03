<?php
require_once('conn.php');
session_start();
if (isset($_SESSION['email'])) {
    $email = mysqli_real_escape_string($conn, $_SESSION['email']);
    $sql = "SELECT * FROM adminUser WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // $_SESSION['active'] = true;
        $query = "SELECT email, name, password FROM adminUser WHERE email='$email'";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            // Store data in variables
            while ($row = $result->fetch_assoc()) {
                $email = $row["email"];
                $name = $row["name"];
                $password = $row["password"];
            }
        } else {
            echo "No results found";
        }
    } else {
        header("Location: index.html");
    }
} else {
    header("Location: index.html");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
</head>
<body>
<nav class="navbar navbar-expand-lg shadow">
        <div class="container">
            <a class="navbar-brand" href="#">TM Heart</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="adminDashboard.php">Go back to
                            dashboard
                        </a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <a class="btn btn-danger btn-sm text-white" href="logout.php">Logout</a>
                </span>
            </div>
        </div>
    </nav>
<div class="container mx-auto my-5">
<div class="row mx-auto my-auto">
<div class="col-lg-8 col-md-6 col-sm-10 mx-auto my-auto">
<table class="table border mx-auto my-auto">
<thead>
<th>Name</th>
<th>Email</th>
<th id='passwordHeader' style='display:none'>Password</th>
</thead>
<tbody>
<td><?= htmlspecialchars($name); ?></td>
<td><?= htmlspecialchars($email); ?></td>
<td id='passwordData' style='display:none'><?= htmlspecialchars($password); ?></td> 
</tbody> 
</table> 
<button class="btn btn-sm btn-danger mt-3" id='toggleButton' onclick='togglePassword()'>Reveal Password</button> 
<script> 
function togglePassword() { 
var passwordHeader = document.getElementById('passwordHeader'); 
var passwordData = document.getElementById('passwordData'); 
var toggleButton = document.getElementById('toggleButton'); 

if (passwordHeader.style.display === 'none') { 
passwordHeader.style.display ='table-cell'; 
passwordData.style.display ='table-cell'; 
toggleButton.innerHTML ='Hide Password'; 
} else { 
passwordHeader.style.display ='none'; 
passwordData.style.display ='none'; 
toggleButton.innerHTML ='Reveal Password'; 

} } </script> </div> </div> </div> </body></html>