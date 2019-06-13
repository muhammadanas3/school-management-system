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
    <link rel="stylesheet" href="css/style.css">
    <title>TSF School</title>
</head>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
   if(isset($_POST['Save'])) {
        require 'addattendance.php';
        header('Location: teacher.php');
        die();
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
                            <a class="nav-link" href="teacher.php">Home</a>
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
                        <li class="nav-item">
                            <a class="nav-link active" href="">Attendance</a>
                        </li>
                        <li class="nav-item ml-3">
                            <a href="../includes/logout.php" class="btn btn-dark">Logout</a>
                        </li>
                        <li class="nav-item ml-4 d-none d-md-block my-0">
                            <a class="nav-link" href="teacher-profile.php"><img class="rounded-circle" src="../img/profile.png" style="width:70px;" alt="profile"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    <section id="take-attendance">
        <div class="container">
            <form action="attendance.php" method="POST">
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <select name="Class" id="" class="form-control">
                            <option class="hidden"  selected disabled>Please select class</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>                                        
                        </select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <select name="Section" id="" class="form-control">
                            <option class="hidden"  selected disabled>Please select Section</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>                             
                        </select>
                    </div>
                </div>
                <div class="col-sm-3">
<!--                     <div class="form-group">
                        <select name="Date" id="" class="form-control">
                            <option class="hidden"  selected disabled>Please select date</option>
                            <option value=""></option>
                        </select>
                    </div> -->
                </div>
                <div class="col-sm-3">
                    <button name="Search" class="btn btn-outline-dark"><i class="fas fa-search"></i></button>
                </div>
            </div>
            </form>
            <form action="attendance.php" method="POST">
            <div class="row">
                <div class="col">
                    <h1 class="display-4 py-3">Attendance for <span class="month">%month%</span></h1>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Roll#</th>
                                    <th>Student Name</th>
                                    <th>Attendance</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(isset($_POST['Search'])) {
                                    $Class = $_POST['Class'];
                                    $Section = $_POST['Section'];
                                    $_SESSION['Class']=$Class;
                                    $_SESSION['Section']=$Section;
                                    $Query="SELECT * FROM student WHERE ClassNo=$Class AND Section='$Section'";
                                    $res=$ConnectingDB->query($Query);
                                }
                                ?>
                                <?php if(isset($_POST['Search'])) { while($row = $res->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $row['RollNo']; ?></td>
                                    <td><?php echo $row['Name']; ?></td>
                                    <td class="py-0">
                                        <div class="form-group">
                                            <select name="Status[]" id="" class="form-control p-0" style="border:0;">
                                                <option value="Present">Present</option>
                                                <option value="Absent">Absent</option>
                                                <option value="Leave">Leave</option>                         
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                    <?php } } ?>
                    <!-- -------------------- -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <button name="Save" class="btn btn-primary btn-lg float-right">Save</button>
                </div>
            </div>
        </form>
        </div>
    </section>
        

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

  <script>
        var now = new Date();
        var year = now.getFullYear();
        var month = now.getMonth();
        var data = now.getDate();
        var monthArr = ['January', 'Faburary', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        document.querySelector('.month').textContent = data + " "+monthArr[month] + " " + year;
  </script>
</body>
</html>