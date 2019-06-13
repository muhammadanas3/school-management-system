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
<body id="home">
    <nav class="navbar navbar-expand-sm sticky-top navbar-light bg-light mb-3">
        <div class="container">
            <a class="navbar-brand" href="#home">Student Panel</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="student.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="marks.php">Marks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#home">Attendance</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">Fees</a>
                        <div class="dropdown-menu">
                            <a href="feedetails.php" class="dropdown-item">payment details</a>
                            <a href="payfee.php" class="dropdown-item">pay fees</a>
                        </div>
                    </li>
                    <li class="nav-item mx-2">
                        <a href="../includes/logout.php" class="btn btn-dark btn-sm">Logout</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a href="viewAnnouncement.php" class="btn btn-danger btn-sm rounded-circle py-0">1</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section id="student-attendance">
        <div class="container">
            <div class="dropdown">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    <?php if(isset($_GET['month'])) echo $_GET['month']; else echo 'Month'; ?>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="attendance.php?id=1&month=January">January</a>
                    <a class="dropdown-item" href="attendance.php?id=2&month=Feburary">Feburary</a>
                    <a class="dropdown-item" href="attendance.php?id=3&month=March">March</a>
                    <a class="dropdown-item" href="attendance.php?id=4&month=April">April</a>
                    <a class="dropdown-item" href="attendance.php?id=5&month=May">May</a>
                    <a class="dropdown-item" href="attendance.php?id=6&month=June">June</a>
                    <a class="dropdown-item" href="attendance.php?id=7&month=July">July</a>
                    <a class="dropdown-item" href="attendance.php?id=8&month=August">August</a>
                    <a class="dropdown-item" href="attendance.php?id=9&month=September">September</a>
                    <a class="dropdown-item" href="attendance.php?id=10&month=October">October</a>
                    <a class="dropdown-item" href="attendance.php?id=11&month=November">November</a>
                    <a class="dropdown-item" href="attendance.php?id=12&month=December">December</a>  
                </div>
            </div>
            <?php if(isset($_GET['month'])) {
                $GrNo=$_SESSION['ID'];
                $id=$_GET['id'];
                $Query="SELECT * FROM attendance WHERE Student='$GrNo' AND MONTH(Date) = $id";
                $res=$ConnectingDB->query($Query);
            }
            ?>
            <?php if(isset($_GET['month'])) { ?>
            <div class="row">
                <div class="col">
                    <h1 class="display-4 my-4 "></h1>
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm table-striped text-center w-50">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Attendance</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php while($row = $res->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $row['Date']; ?></td>
                                    <td><?php echo $row['Status']; ?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php } ?>
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
</body>
</html>