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
   if(isset($_POST['Add'])) {
        require 'addmarks.php';
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
                        <a class="nav-link active" href="">Marks</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">Announcement</a>
                        <div class="dropdown-menu">
                            <a href="makeannouncement.php" class="dropdown-item">Make Announcements</a>
                            <a href="viewannouncement.php" class="dropdown-item">View Announcements</a>
                        </div>
                    </li>
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

    <form action="generatemarks.php" method="POST">
    <section id="selction" class="py-5">

        <div class="container pb-5">
            
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <select name="Exam" id="" class="form-control">
                            <option class="hidden"  selected disabled>Please select Exam Type</option>
                            <option value="First_term">First Term</option>
                            <option value="Half_year">Half yearly</option>
                            <option value="Final">Final</option>
                            <option value="Quiz1">Quiz I</option>
                            <option value="Quiz2">Quiz II</option>
                            <option value="Quiz3">Quiz III</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <select name="Class" id="" class="form-control">
                            <option class="hidden"  selected disabled>Please select Class</option>
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
            </div>
            <div class="row mt-3">
                <div class="col-sm-6">
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
                <div class="col-sm-6">
                    <div class="form-group">
                        <select name="Course" id="" class="form-control">
                            <option class="hidden"  selected disabled>Please select Course</option>
                            <option value="English">English</option>
                            <option value="Urdu">Urdu</option>
                            <option value="Islamiat">Islamiat</option>
                            <option value="Maths">Maths</option>
                            <option value="Social Studies">Social Studies</option>
                            <option value="Biology">Biology</option>
                            <option value="Physics">Physics</option>                      
                            <option value="Chemistry">Chemistry</option>
                            <option value="Computer">Computer</option>
                        </select>
                    </div>
                </div>
            </div>
        
        </div>

    </section>
    <section id="marks-body" class="pb-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Roll#</th>>
                                    <th>Total Marks</th>
                                    <th>Marks Obtained</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>          
                                        <div class="form-group">
                                            <input name="RollNo" type="text" class="form-control" placeholder="Roll#">
                                        </div>
                                    </td>
                                    <td>          
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="total marks">
                                        </div>
                                    </td>
                                    <td>          
                                        <div class="form-group">
                                            <input name="Marks" type="text" class="form-control" placeholder="obtained marks">
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="col">
                    <button name="Add" class="btn btn-primary float-right">Add</button>
                </div>
            </div>
        </div>
    </section>
        </form>

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