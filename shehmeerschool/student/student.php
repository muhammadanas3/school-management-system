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
                        <a class="nav-link active" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="marks.php">Marks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="attendance.php">Attendance</a>
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

    <section id="student-body">

        <div class="container pb-5">
            <div class="row">
                <div class="card w-100 mt-5">
                    <div class="card-header bg-primary text-white" style="font-size:120%;">
                        Student Information
                    </div>
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-sm-4"><strong>Name: </strong><?php echo $_SESSION['Name']; ?></div>
                            <div class="col-sm-4"><strong>Contact No: </strong><?php echo $_SESSION['Contact']; ?></div>
                            <div class="col-sm-4"><strong>Gender: </strong><?php echo $_SESSION['Gender']; ?></div>
                        </div>
                        <div class="row text-center mt-3">
                            <div class="col-sm-4"><strong>Class: </strong><?php echo $_SESSION['ClassNo']; ?></div>
                            <div class="col-sm-4"><strong>Sec: </strong><?php echo $_SESSION['Section']; ?></div>
                            <div class="col-sm-4"><strong>Roll No: </strong><?php echo $_SESSION['RollNo']; ?></div>
                        </div>
                        <div class="row text-center mt-3">
                            <div class="col-sm-4"><strong>DOB: </strong><?php echo $_SESSION['DOB']; ?></div>
                            <div class="col-sm-4"><strong>Email: </strong><?php echo $_SESSION['Email']; ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card w-100 mt-5">
                    <div class="card-header bg-primary text-white" style="font-size:120%;">
                        Contact Information
                    </div>
                    <div class="card-body">
                        <div class="row text-center mt-3">
                            <div class="col"><strong>Home Phone: </strong><?php echo $_SESSION['Contact']; ?></div>
                        </div>
                        <div class="row text-center mt-3">
                            <div class="col"><strong>Address: </strong><?php echo $_SESSION['Address']; ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card w-100 mt-5">
                    <div class="card-header bg-primary text-white" style="font-size:120%;">
                        Family Information
                    </div>
                    <div class="card-body">
                        <div class="row text-center bg-light py-2">
                            <div class="col-sm-4"><strong>Name: </strong></div>
                            <div class="col-sm-4"><strong>Cnic: </strong></div>
                            <div class="col-sm-4"><strong>Contact: </strong></div>
                        </div>
                        <div class="row text-center mt-3">
                            <div class="col-sm-4"><?php echo $_SESSION['GuardianName']; ?></div>
                            <div class="col-sm-4"><?php echo $_SESSION['GuardianCNIC']; ?></div>
                            <div class="col-sm-4"><?php echo $_SESSION['Contact']; ?></div>
                        </div>   
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card w-100 mt-5">
                    <div class="card-header bg-primary text-white" style="font-size:120%;">
                        Attendance
                    </div>
                    <div class="card-body">
                        <div class="row text-center bg-light py-2">
                            <div class="col-sm-3 mb-2">January</div>
                            <div class="col-sm-9">
                            <div class="w-50">
                                <div class="bg-success p-3"></div>
                            </div>
                            </div>
                        </div>
                        <div class="row text-center bg-light py-2">
                            <div class="col-sm-3 mb-2">February</div>
                            <div class="col-sm-9">
                            <div class="w-100">
                                <div class="bg-primary p-3"></div>
                            </div>
                            </div>
                        </div>
                        <div class="row text-center bg-light py-2">
                            <div class="col-sm-3 mb-2">March</div>
                            <div class="col-sm-9">
                            <div class="w-75">
                                <div class="bg-danger p-3"></div>
                            </div>
                            </div>
                        </div>
                        <div class="row text-center bg-light py-2">
                            <div class="col-sm-3 mb-2">April</div>
                            <div class="col-sm-9">
                            <div class="w-25">
                                <div class="bg-warning p-3"></div>
                            </div>
                            </div>
                        </div>
                        <div class="row text-center bg-light py-2">
                            <div class="col-sm-3 mb-2">May</div>
                            <div class="col-sm-9">
                            <div class="w-100">
                                <div class="bg-info p-3"></div>
                            </div>
                            </div>
                        </div>
                        <div class="row text-center bg-light py-2">
                            <div class="col-sm-3 mb-2">June</div>
                            <div class="col-sm-9">
                            <div class="w-50">
                                <div class="bg-success p-3"></div>
                            </div>
                            </div>
                        </div>
                        <div class="row text-center bg-light py-2">
                            <div class="col-sm-3 mb-2">July</div>
                            <div class="col-sm-9">
                            <div class="w-100">
                                <div class="bg-primary p-3"></div>
                            </div>
                            </div>
                        </div>
                        <div class="row text-center bg-light py-2">
                            <div class="col-sm-3 mb-2">August</div>
                            <div class="col-sm-9">
                            <div class="w-75">
                                <div class="bg-danger p-3"></div>
                            </div>
                            </div>
                        </div>
                        <div class="row text-center bg-light py-2">
                            <div class="col-sm-3 mb-2">September</div>
                            <div class="col-sm-9">
                            <div class="w-25">
                                <div class="bg-warning p-3"></div>
                            </div>
                            </div>
                        </div>
                        <div class="row text-center bg-light py-2">
                            <div class="col-sm-3 mb-2">October</div>
                            <div class="col-sm-9">
                            <div class="w-100">
                                <div class="bg-info p-3"></div>
                            </div>
                            </div>
                        </div>
                        <div class="row text-center bg-light py-2">
                        <?php
                        $id=$_SESSION['ID'];
                        $Query="SELECT COUNT(*) AS mcount FROM attendance WHERE Date LIKE '____-11-__' AND Student='$id' AND Status='Present'";
                        $res=$ConnectingDB->query($Query);
                        $row=$res->fetch_assoc();
                        ?>
                            <div class="col-sm-3 mb-2">November</div>
                            <div class="col-sm-9">
                            <div class="w-<?php echo $row['mcount'];?>">
                                <div class="bg-danger p-3"></div>
                            </div>
                            </div>
                        </div>
                        <div class="row text-center bg-light py-2">
                        <?php
                        $id=$_SESSION['ID'];
                        $Query="SELECT COUNT(*) AS mcount FROM attendance WHERE Date LIKE '____-12-__' AND Student='$id' AND Status='Present'";
                        $res=$ConnectingDB->query($Query);
                        $row=$res->fetch_assoc();
                        ?>
                            <div class="col-sm-3 mb-2">December</div>
                            <div class="col-sm-9">
                            <div class="w-<?php echo $row['mcount'];?>">
                                <div class="bg-warning p-3"></div>
                            </div>
                            </div>
                        </div>
                        <div class="row bg-light py-2">
                            <div class="col-3 d-none d-sm-block"></div>
                            <div class="col-3">0</div>
                            <div class="col-3 text-center">50</div>
                            <div class="col-3 text-right">100</div>
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
                <form action="">
                <div class="form-group">
                    <label for="oldPass">Enter Old Password</label>
                    <input type="text" class="form-control" placeholder="Old Password">
                </div>

                <div class="form-group">
                    <label for="newPass">Enter New Password</label>
                    <input type="text" class="form-control" placeholder="New Password">
                </div>
                <div class="form-group">
                    <label for="RenewPass">Re-enter New Password</label>
                    <input type="text" class="form-control" placeholder="write it again">
                </div>
                </form>
            </div>
    
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary btn-block" value="Ok">
            </div>
    
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