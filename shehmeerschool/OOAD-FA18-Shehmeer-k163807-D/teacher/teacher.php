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
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
   if(isset($_POST['Change'])) {
        require 'changepass.php';
    }
}
?>
<body id="home">
    <nav class="navbar navbar-expand-sm sticky-top navbar-light bg-light mb-3">
        <div class="container">
            <a class="navbar-brand" href="#home">Teacher Panel</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="generatemarks.php">Marks</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">Announcement</a>
                        <div class="dropdown-menu">
                            <a href="makeannouncement.php" class="dropdown-item">Make Announcements</a>
                            <a href="viewannouncement.php" class="dropdown-item">View Announcements</a>
                        </div>
                      </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="announcement.php">Announcements</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="attendance.php">Attendance</a>
                    </li>
                    <li class="nav-item ml-3">
                        <a href="../includes/logout.php" class="btn btn-dark btn-sm">Logout</a>
                    </li>
                    <li class="nav-item ml-4 d-none d-md-block my-0">
                        <a class="nav-link" href="teacher-profile.php"><img class="rounded-circle" src="../img/profile.png" style="width:70px;" alt="profile"></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section id="student-body">

        <div class="container pb-5">
            <div class="row">
                <div class="card w-100 mt-5">
                    <div class="card-header bg-primary text-white" style="font-size:120%;">
                        Teacher Information
                    </div>
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-sm-3"><strong>Name: </strong><?php echo $_SESSION['Name']; ?></div>
                            <div class="col-sm-3"><strong>Contact No: </strong><?php echo $_SESSION['Contact']; ?></div>
                            <div class="col-sm-3"><strong>Gender: </strong><?php echo $_SESSION['Gender']; ?></div>
                            <div class="col-sm-3"><strong>Address: </strong><?php echo $_SESSION['Address']; ?></div>
                        </div>
                        </div>
                        <div class="row text-center mt-3">
                            <div class="col-sm-6"><strong>Qualification: </strong><?php echo $_SESSION['Qualification']; ?></div>
                            <div class="col-sm-6"><strong>Designation: </strong><?php echo $_SESSION['Designation']; ?></div>
                        </div>
                        <div class="row text-center mt-3">
                            <div class="col-sm-6"><strong>DOB: </strong><?php echo $_SESSION['DOB']; ?></div>
                            <div class="col-sm-6"><strong>Email: </strong><?php echo $_SESSION['Email']; ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row text-center mt-3">
                <div class="col">
                    <a href="" class="change-password" data-target="#changePassModal" data-toggle="modal" >Change Password</a>
                </div>
            </div>
        </div>

    </section>

    <div class="modal fade text-dark" id="changePassModal">
        <div class="modal-dialog">
            <div class="modal-content">
                
            <div class="modal-header">
                    <h5 class="modal-title">Change Password</h5>
                    <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                    </button>
            </div>
    
            <div class="modal-body">
                <form action="teacher.php" method="POST">

                <div class="form-group">
                    <label for="newPass">Enter New Password</label>
                    <input name="NewPass" type="text" class="form-control" placeholder="New Password">
                </div>
                <div class="form-group">
                    <label for="RenewPass">Re-enter New Password</label>
                    <input name="RetypePass" type="text" class="form-control" placeholder="Enter again">
                </div>
            </div>
    
            <div class="modal-footer">
                <input name="Change" type="submit" class="btn btn-primary btn-block" value="Change">
            </div>
                </form>

            </div>
        </div>
    </div>
        

<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
crossorigin="anonymous"></script>

  <script>
    // Get the current year for the copyright
    $('#year').text(new Date().getFullYear());

    $('body').scrollspy({target: '#main-nav'});


    $('#main-nav a').on('click', function(e){
	
      if(this.hash !== ''){

        e.preventDefault();
        const hash = this.hash;
        
        $('html, body').animate({

          scrollTop: $(hash).offset().top
        }, 900, function(){

          window.location.hash = hash;
        });
      }

    });
  </script>
</body>
</html>