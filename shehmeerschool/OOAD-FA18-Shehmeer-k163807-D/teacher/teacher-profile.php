<?php
require '../includes/DB.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
      crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
      crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>TSF SCHOOL</title>
</head>
<body>
    
    <nav class="navbar navbar-expand-sm sticky-top navbar-light bg-light mb-3">
        <div class="container">
            <a class="navbar-brand" href="#home">Teacher Panel</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="teacher.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="generatemarks.php">Marks</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">Announcement</a>
                        <div class="dropdown-menu">
                            <a href="addannouncement.php" class="dropdown-item">Make Announcements</a>
                            <a href="viewannouncement.php" class="dropdown-item">View Announcements</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="attendance.php">Attendance</a>
                    </li>
                    <li class="nav-item ml-3">
                        <a href="../includes/logout.php" class="btn btn-dark">Logout</a>
                    </li>
                    <li class="nav-item ml-4 d-none d-md-block my-0">
                        <a class="nav-link active" href="#"><img class="rounded-circle" src="../img/profile.png" style="width:70px;" alt="profile"></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section id="student-profile" class="py-5">
        <div class="container p-5" style="background:#E9ECEF;">
            <h2 class="display-4 text-center pb-5">Teacher Profile</h2>
            <div class="row">
                <div class="col-sm-3 my-4">
                    <img src="../img/profile.png" class="rounded-circle" style="width:180px;" alt="">
                </div>
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name" class="profile-styling">Name</label>
                                <input type="text" class="form-control px-0 py-2" style="border:0px;" value="<?php echo $_SESSION['Name']; ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="qualification" class="profile-styling">Qualification</label>
                                <input type="text" class="form-control px-0 py-2" style="border:0px;" value="<?php echo $_SESSION['Qualification']; ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="designation"class="profile-styling">Designation</label>
                                <input type="text" class="form-control px-0 py-2" style="border:0px;" value="<?php echo $_SESSION['Designation']; ?>" disabled>
                            </div>
                            
                            <div class="form-group">
                                <label for="ID" class="profile-styling">ID</label>
                                <input type="text" class="form-control px-0 py-2" style="border:0px;" value="<?php echo $_SESSION['ID']; ?>" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="address" class="profile-styling">Address</label>
                                <input name="" type="text" class="form-control px-0 py-2" style="border:0px;" disabled value="<?php echo $_SESSION['Address']; ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="contact#" class="profile-styling">Contact#</label>
                                <input name="" type="text" class="form-control px-0 py-2" style="border:0px;" disabled value="<?php echo $_SESSION['Contact']; ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="Email" class="profile-styling">Email</label>
                                <input name="" type="text" class="form-control px-0 py-2" style="border:0px;" disabled value="<?php echo $_SESSION['Email']; ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="dob" class="profile-styling">Date of Birth</label>
                                <input name="" type="text" class="form-control px-0 py-2" style="border:0px;" disabled value="<?php echo $_SESSION['DOB']; ?>"/>
                            </div>
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        

<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
crossorigin="anonymous"></script>
<script src="js/info.js"></script>


</body>
</html>