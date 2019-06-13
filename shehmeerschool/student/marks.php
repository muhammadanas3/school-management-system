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
                        <a class="nav-link active" href="#home">Marks</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="time-table.html">Time Table</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="attendance.php">Attendance</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="feedetails.php">Fee details</a>
                    </li>
                    <li class="nav-item">
                        <a href="../includes/logout.php" class="btn btn-dark btn-sm">Logout</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a href="viewAnnouncement.php" class="btn btn-danger btn-sm rounded-circle py-0">1</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section id="marks-body">

        <div class="container pb-5">
            <div id="accordion1">
                <div class="card">
                    <div class="card-header bg-primary">
                    <a class="collapsed card-link text-white" style="font-size:120%;" data-toggle="collapse" href="#collapseOne">
                        Quiz-I
                    </a>
                    </div>
                    <div id="collapseOne" class="collapse" data-parent="#accordion1">
                    <div class="card-body">
                        <!-- <div class="card"> -->
                            <div class="bg-light p-4">
                                <div class="row">
                                    <div class="col-12 text-center" style="font-size:120%;">
                                            <h3 class="display-5">Quiz-I Marks</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="card-body"> -->
                                <div class="row">
                                    <!-- <div class="col-md-6"> -->
                                        <div class="table-responsive">
                                            <table class="table table-striped mt-5">
                                                <thead class="text-center">
                                                    <tr>
                                                    <th>Subject</th>
                                                    <th>Total Marks</th>
                                                    <th>Marks Obtained</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                    <?php
                                                    $_SESSION['i']=0;
                                                    $_SESSION['t']=0;
                                                    $id=$_SESSION['ID'];
                                                    $Query="SELECT * FROM marks WHERE Student=$id";
                                                    $res=$ConnectingDB->query($Query); ?>
                                                    <?php while($row = $res->fetch_assoc()) { ?>
                                                            <tr>
                                                                <td><?php echo $row['Course']; ?></td>
                                                                <td><?php $_SESSION['i']=$_SESSION['i']+25;?>25</td>
                                                                <td><?php $_SESSION['t']=$_SESSION['t']+$row['Quiz1'];
                                                                      echo $row['Quiz1']; ?></td>
                                                            </tr>
                                                <?php }  ?>
                                                    <tr style="font-weight:bold;">
                                                        <td>Total</td>
                                                        <td><?php echo $_SESSION['i'];?></td>
                                                        <td><?php echo $_SESSION['t'];?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                </div>
                                <div class="row mt-5 text-right" style="font-weight:bold;">
                                    <div class="col-sm-6">Total Marks: <?php echo $_SESSION['i']; ?></div>
                                    <div class="col-sm-6">Result: <?php if($_SESSION['t']/$_SESSION['i']>=0.5) echo 'pass'; else echo 'fail';?></div>
                                </div>
                                <div class="row text-right mt-2" style="font-weight:bold;">
                                    <div class="col-sm-6">Total Marks obtained: <?php echo $_SESSION['t'];?></div>
                                </div>
                            <!-- </div> -->
                        <!-- </div> -->
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container pb-5">
            <div id="accordion2">
                <div class="card">
                    <div class="card-header bg-primary">
                    <a class="collapsed card-link text-white" style="font-size:120%;" data-toggle="collapse" href="#collapseTwo">
                        Quiz-II
                    </a>
                    </div>
                    <div id="collapseTwo" class="collapse" data-parent="#accordion2">
                    <div class="card-body">
                        <!-- <div class="card"> -->
                            <div class="bg-light p-4">
                                <div class="row">
                                    <div class="col-12 text-center" style="font-size:120%;">
                                            <h3 class="display-5">Quiz-II Marks</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="card-body"> -->
                                <div class="row">
                                    <!-- <div class="col-md-6"> -->
                                        <div class="table-responsive">
                                            <table class="table table-striped mt-5">
                                                <thead class="text-center">
                                                    <tr>
                                                    <th>Subject</th>
                                                    <th>Total Marks</th>
                                                    <th>Marks Obtained</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                    <?php
                                                    $_SESSION['i']=0;
                                                    $_SESSION['t']=0;
                                                    $id=$_SESSION['ID'];
                                                    $Query="SELECT * FROM marks WHERE Student=$id";
                                                    $res=$ConnectingDB->query($Query); ?>
                                                    <?php while($row = $res->fetch_assoc()) { ?>
                                                            <tr>
                                                                <td><?php echo $row['Course']; ?></td>
                                                                <td><?php $_SESSION['i']=$_SESSION['i']+25;?>25</td>
                                                                <td><?php $_SESSION['t']=$_SESSION['t']+$row['Quiz2'];
                                                                      echo $row['Quiz2']; ?></td>
                                                            </tr>
                                                <?php }  ?>
                                                    <tr style="font-weight:bold;">
                                                        <td>Total</td>
                                                        <td><?php echo $_SESSION['i'];?></td>
                                                        <td><?php echo $_SESSION['t'];?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                </div>
                                <div class="row mt-5 text-right" style="font-weight:bold;">
                                    <div class="col-sm-6">Total Marks: <?php echo $_SESSION['i']; ?></div>
                                    <div class="col-sm-6">Result: <?php if($_SESSION['t']/$_SESSION['i']>=0.5) echo 'pass'; else echo 'fail';?></div>
                                </div>
                                <div class="row text-right mt-2" style="font-weight:bold;">
                                    <div class="col-sm-6">Total Marks obtained: <?php echo $_SESSION['t'];?></div>
                                </div>
                            <!-- </div> -->
                        <!-- </div> -->
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container pb-5">
            <div id="accordion3">
                <div class="card">
                    <div class="card-header bg-primary">
                    <a class="collapsed card-link text-white" style="font-size:120%;" data-toggle="collapse" href="#collapseZero">
                        Quiz-III
                    </a>
                    </div>
                    <div id="collapseZero" class="collapse" data-parent="#accordion0">
                    <div class="card-body">
                        <!-- <div class="card"> -->
                            <div class="bg-light p-4">
                                <div class="row">
                                    <div class="col-12 text-center" style="font-size:120%;">
                                            <h3 class="display-5">Quiz-III Marks</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="card-body"> -->
                                <div class="row">
                                    <!-- <div class="col-md-6"> -->
                                        <div class="table-responsive">
                                            <table class="table table-striped mt-5">
                                                <thead class="text-center">
                                                    <tr>
                                                    <th>Subject</th>
                                                    <th>Total Marks</th>
                                                    <th>Marks Obtained</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                    <?php
                                                    $_SESSION['i']=0;
                                                    $_SESSION['t']=0;
                                                    $id=$_SESSION['ID'];
                                                    $Query="SELECT * FROM marks WHERE Student=$id";
                                                    $res=$ConnectingDB->query($Query); ?>
                                                    <?php while($row = $res->fetch_assoc()) { ?>
                                                            <tr>
                                                                <td><?php echo $row['Course']; ?></td>
                                                                <td><?php $_SESSION['i']=$_SESSION['i']+25;?>25</td>
                                                                <td><?php $_SESSION['t']=$_SESSION['t']+$row['Quiz3'];
                                                                      echo $row['Quiz3']; ?></td>
                                                            </tr>
                                                <?php }  ?>
                                                    <tr style="font-weight:bold;">
                                                        <td>Total</td>
                                                        <td><?php echo $_SESSION['i'];?></td>
                                                        <td><?php echo $_SESSION['t'];?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                </div>
                                <div class="row mt-5 text-right" style="font-weight:bold;">
                                    <div class="col-sm-6">Total Marks: <?php echo $_SESSION['i']; ?></div>
                                    <div class="col-sm-6">Result: <?php if($_SESSION['t']/$_SESSION['i']>=0.5) echo 'pass'; else echo 'fail';?></div>
                                </div>
                                <div class="row text-right mt-2" style="font-weight:bold;">
                                    <div class="col-sm-6">Total Marks obtained: <?php echo $_SESSION['t'];?></div>
                                </div>
                            <!-- </div> -->
                        <!-- </div> -->
                    </div>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="container pb-5">
            <div id="accordion4">
                <div class="card">
                    <div class="card-header bg-primary">
                    <a class="collapsed card-link text-white" style="font-size:120%;" data-toggle="collapse" href="#collapseFour">
                        First-Term
                    </a>
                    </div>
                    <div id="collapseFour" class="collapse" data-parent="#accordion4">
                    <div class="card-body">
                        <!-- <div class="card"> -->
                            <div class="bg-light p-4">
                                <div class="row">
                                    <div class="col-12 text-center" style="font-size:120%;">
                                            <h3 class="display-5">First Term Examination Marksheet</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="card-body"> -->
                                <div class="row">
                                    <!-- <div class="col-md-6"> -->
                                        <div class="table-responsive">
                                            <table class="table table-striped mt-5">
                                                <thead class="text-center">
                                                    <tr>
                                                    <th>Subject</th>
                                                    <th>Total Marks</th>
                                                    <th>Marks Obtained</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                    <?php
                                                    $_SESSION['i']=0;
                                                    $_SESSION['t']=0;
                                                    $id=$_SESSION['ID'];
                                                    $Query="SELECT * FROM marks WHERE Student=$id";
                                                    $res=$ConnectingDB->query($Query); ?>
                                                    <?php while($row = $res->fetch_assoc()) { ?>
                                                            <tr>
                                                                <td><?php echo $row['Course']; ?></td>
                                                                <td><?php $_SESSION['i']=$_SESSION['i']+50;?>50</td>
                                                                <td><?php $_SESSION['t']=$_SESSION['t']+$row['First_term'];
                                                                      echo $row['First_term']; ?></td>
                                                            </tr>
                                                <?php }  ?>
                                                    <tr style="font-weight:bold;">
                                                        <td>Total</td>
                                                        <td><?php echo $_SESSION['i'];?></td>
                                                        <td><?php echo $_SESSION['t'];?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                </div>
                                <div class="row mt-5 text-right" style="font-weight:bold;">
                                    <div class="col-sm-6">Total Marks: <?php echo $_SESSION['i']; ?></div>
                                    <div class="col-sm-6">Result: <?php if($_SESSION['t']/$_SESSION['i']>=0.5) echo 'pass'; else echo 'fail';?></div>
                                </div>
                                <div class="row text-right mt-2" style="font-weight:bold;">
                                    <div class="col-sm-6">Total Marks obtained: <?php echo $_SESSION['t'];?></div>
                                </div>
                            <!-- </div> -->
                        <!-- </div> -->
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container pb-5">
            <div id="accordion5">
                <div class="card">
                    <div class="card-header bg-primary">
                    <a class="collapsed card-link text-white" style="font-size:120%;" data-toggle="collapse" href="#collapseFive">
                        Half-Yearly
                    </a>
                    </div>
                    <div id="collapseFive" class="collapse" data-parent="#accordion5">
                    <div class="card-body">
                        <!-- <div class="card"> -->
                            <div class="bg-light p-4">
                                <div class="row">
                                    <div class="col-12 text-center" style="font-size:120%;">
                                            <h3 class="display-5">Half Year Examination Marksheet</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="card-body"> -->
                                <div class="row">
                                    <!-- <div class="col-md-6"> -->
                                        <div class="table-responsive">
                                            <table class="table table-striped mt-5">
                                                <thead class="text-center">
                                                    <tr>
                                                    <th>Subject</th>
                                                    <th>Total Marks</th>
                                                    <th>Marks Obtained</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                    <?php
                                                    $_SESSION['i']=0;
                                                    $_SESSION['t']=0;
                                                    $id=$_SESSION['ID'];
                                                    $Query="SELECT * FROM marks WHERE Student=$id";
                                                    $res=$ConnectingDB->query($Query); ?>
                                                    <?php while($row = $res->fetch_assoc()) { ?>
                                                            <tr>
                                                                <td><?php echo $row['Course']; ?></td>
                                                                <td><?php $_SESSION['i']=$_SESSION['i']+50;?>50</td>
                                                                <td><?php $_SESSION['t']=$_SESSION['t']+$row['Half_year'];
                                                                      echo $row['Half_year']; ?></td>
                                                            </tr>
                                                <?php }  ?>
                                                    <tr style="font-weight:bold;">
                                                        <td>Total</td>
                                                        <td><?php echo $_SESSION['i'];?></td>
                                                        <td><?php echo $_SESSION['t'];?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                </div>
                                <div class="row mt-5 text-right" style="font-weight:bold;">
                                    <div class="col-sm-6">Total Marks: <?php echo $_SESSION['i']; ?></div>
                                    <div class="col-sm-6">Result: <?php if($_SESSION['t']/$_SESSION['i']>=0.5) echo 'pass'; else echo 'fail';?></div>
                                </div>
                                <div class="row text-right mt-2" style="font-weight:bold;">
                                    <div class="col-sm-6">Total Marks obtained: <?php echo $_SESSION['t'];?></div>
                                </div>
                            <!-- </div> -->
                        <!-- </div> -->
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container pb-5">
            <div id="accordion6">
                <div class="card">
                    <div class="card-header bg-primary">
                    <a class="collapsed card-link text-white" style="font-size:120%;" data-toggle="collapse" href="#collapseSix">
                        Final
                    </a>
                    </div>
                    <div id="collapseSix" class="collapse" data-parent="#accordion6">
                    <div class="card-body">
                        <!-- <div class="card"> -->
                            <div class="bg-light p-4">
                                <div class="row">
                                    <div class="col-12 text-center" style="font-size:120%;">
                                            <h3 class="display-5">Final Term Examination Marksheet</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="card-body"> -->
                                <div class="row">
                                    <!-- <div class="col-md-6"> -->
                                        <div class="table-responsive">
                                            <table class="table table-striped mt-5">
                                                <thead class="text-center">
                                                    <tr>
                                                    <th>Subject</th>
                                                    <th>Total Marks</th>
                                                    <th>Marks Obtained</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                    <?php
                                                    $_SESSION['i']=0;
                                                    $_SESSION['t']=0;
                                                    $id=$_SESSION['ID'];
                                                    $Query="SELECT * FROM marks WHERE Student=$id";
                                                    $res=$ConnectingDB->query($Query); ?>
                                                    <?php while($row = $res->fetch_assoc()) { ?>
                                                            <tr>
                                                                <td><?php echo $row['Course']; ?></td>
                                                                <td><?php $_SESSION['i']=$_SESSION['i']+100;?>100</td>
                                                                <td><?php $_SESSION['t']=$_SESSION['t']+$row['Final'];
                                                                      echo $row['Final']; ?></td>
                                                            </tr>
                                                <?php }  ?>
                                                    <tr style="font-weight:bold;">
                                                        <td>Total</td>
                                                        <td><?php echo $_SESSION['i'];?></td>
                                                        <td><?php echo $_SESSION['t'];?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                </div>
                                <div class="row mt-5 text-right" style="font-weight:bold;">
                                    <div class="col-sm-6">Total Marks: <?php echo $_SESSION['i']; ?></div>
                                    <div class="col-sm-6">Result: <?php if($_SESSION['t']/$_SESSION['i']>=0.5) echo 'pass'; else echo 'fail';?></div>
                                </div>
                                <div class="row text-right mt-2" style="font-weight:bold;">
                                    <div class="col-sm-6">Total Marks obtained: <?php echo $_SESSION['t'];?></div>
                                </div>
                            <!-- </div> -->
                        <!-- </div> -->
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