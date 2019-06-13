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
<body>
    <nav class="navbar navbar-expand-sm sticky-top navbar-light bg-light mb-3">
        <div class="container">
            <a href="configure-student.php" class="mr-4"><i class="fas fa-arrow-left fa-2x text-dark"></i></a>
            <a class="navbar-brand" href="#home">Admin Panel</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto align-items-center">
                    <li class="nav-item m-2">
                        <div><i class="fa fa-user m-2"></i>Admin</div>
                    </li>
                    <li class="nav-item m-2">
                        <a href="../includes/logout.php" class="btn btn-dark">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section id="add-teaching-staff" class="py-5">
        <div class="container">
            <div style="width:75%;" class="m-auto bg-light p-5">
            <form action="student-update.php" method="POST">
                <?php
                $id=$_GET['id'];
                $Query = "SELECT * FROM student WHERE GrNo='$id'";
                $res=$ConnectingDB->query($Query);
                $row = $res->fetch_assoc();
                $cnic=$row['GuardianCNIC'];
                $Query = "SELECT * FROM guardian WHERE CNIC='$cnic'";
                $res=$ConnectingDB->query($Query);
                $row1 = $res->fetch_assoc();
                ?>
                <h1 class="display-4 text-center mb-4">Student Information</h1>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input name="Name" type="text" class="form-control" placeholder="Name" value="<?php echo $row['Name']?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="guardian_name">Guardian Name</label>
                            <input name="Guardian" type="text" class="form-control" placeholder="Guardian Name" value="<?php echo $row1['Name']?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="roll#">Roll#</label>
                            <input name="RollNo" type="text" class="form-control" placeholder="Roll#" value="<?php echo $row['RollNo']?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="contact#">Contact#</label>
                            <input name="Contact" type="text" class="form-control" placeholder="Contact#" value="<?php echo $row1['Mobile']?>" disabled>
                        </div>
                        
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input name="Email" type="text" class="form-control" placeholder="Email" value="<?php echo $row['Email']?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="occupation">Father Occupation</label>
                            <input name="Occupation" type="text" class="form-control" placeholder="Father Occupation" value="<?php echo $row1['Occupation']?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="grno">GrNo</label>
                            <input name="grno" type="text" class="form-control" placeholder="GrNo" value="<?php echo $row['GrNo']?>" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="class">Class</label>
                            <input name="Class" type="text" class="form-control" placeholder="Class" value="<?php echo $row['ClassNo']?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="sec">Section</label>
                            <input name="Section" type="text" class="form-control" placeholder="Section" value="<?php echo $row['Section']?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input name="Address" type="text" class="form-control" placeholder="Address" value="<?php echo $row['Address']?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="contact#">Home Contact#</label>
                            <input name="HomePhone" type="text" class="form-control" placeholder="Home Contact#" value="<?php echo $row['Contact']?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input name="Password" type="text" class="form-control" placeholder="Password" value="<?php echo $row['Password']?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="cnic">Guardian CNIC</label>
                            <input name="cnic" type="text" class="form-control" placeholder="Guardian CNIC" value="<?php echo $row1['CNIC']?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="dob">Date of Birth</label>
                            <input name="dob" type="text" class="form-control" placeholder="Date of Birth" value="<?php echo $row['DOB']?>" disabled>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12 text-right">
                        <a href="configure-student.php" name="Back" class="btn btn-primary btn-sm add-button">Back</a>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </section>

    <!-- <div class="modal fade text-dark" id="teaching-staff-modal">
        <div class="modal-dialog">
          <div class="modal-content">
                
            <div class="modal-header">
                  <h5 class="modal-title">Teacher Info</h5>
                  <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                  </button>
            </div>
    
            <div class="modal-body">
                  <form action="">
                    <img class="m-auto" src="img/profile.png" alt="profile image"
                    style="height: 200px; width:200px">
                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="text" class="form-control" id="name" value="Name" disabled>
                    </div>
    
                    <div class="form-group">
                        <label for="FName">Father Name</label>
                        <input type="text" class="form-control" id="fname" value="FName" disabled>
                    </div>
                    
                    <div class="form-group">
                          <label for="Qualification">Qualification</label>
                          <input type="text" class="form-control" id="qua" value="Qualification" disabled>
                    </div>
                    
                    <div class="form-group">
                        <label for="Gender">Gender</label>
                        <input type="text" class="form-control" id="gen" value="male" disabled>
                    </div>

                    <div class="form-group">
                        <label for="CNIC">C.N.I.C</label>
                        <input type="text" class="form-control" id="cnic" value="CNIC" disabled>
                    </div>

                    <div class="form-group">
                        <label for="salary">Salary</label>
                        <input type="text" class="form-control" id="sal" value="salary" disabled>
                    </div>
                    <div class="form-group">
                        <label for="designation">Dessignation</label>
                        <input type="text" class="form-control" id="des" value="designation" disabled>
                    </div>
                  </form>
            </div>
    
            <div class="modal-footer">
                  <input type="submit" class="btn btn-primary btn-block" id="edit" value="Edit">
            </div>
    
            </div>
        </div>
    </div> -->
        

<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
crossorigin="anonymous"></script>
<!-- <script src="js/info.js"></script> -->


</body>
</html>