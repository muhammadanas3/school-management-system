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
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
   if(isset($_POST['Save'])) {
        require 'updatestaff.php';
        header('Location: configure-nonteaching-staff.php');
        die();
    }
}
?>
<body>
    <nav class="navbar navbar-expand-sm sticky-top navbar-light bg-light mb-3">
        <div class="container">
            <a href="nonteaching-staff.php" class="mr-4"><i class="fas fa-arrow-left fa-2x text-dark"></i></a>
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
            <form action="staff-update.php" method="POST">
                <?php
                $id=$_SESSION['id'];
                $Query = "SELECT * FROM staff WHERE ID='$id'";
                $res=$ConnectingDB->query($Query);
                $row = $res->fetch_assoc();
                ?>
                <h1 class="display-4 text-center mb-4">Edit Staff Information</h1>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input name="Name" type="text" class="form-control Names" placeholder="Name" value="<?php echo $row['Name']?>">
                        </div>
                        <div class="form-group">
                            <input name="Contact" type="text" class="form-control CNo" placeholder="Contact#" value="<?php echo $row['Contact']?>">
                        </div>
                        <div class="form-group">
                            <input name="Address" type="text" class="form-control Address" placeholder="Address" value="<?php echo $row['Address']?>">
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input name="CNIC" type="text" class="form-control cnic" placeholder="C.N.I.C" value="<?php echo $row['CNIC']?>">
                        </div>
                        <div class="form-group">
                            <input name="Salary" type="text" class="form-control sal" placeholder="Salary" value="<?php echo $row['Salary']?>">
                        </div>
                        <div class="form-group">
                            <input name="Design" type="text" class="form-control des" placeholder="designation" value="<?php echo $row['Designation']?>">
                        </div>
    
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12 text-right">
                        <button name="Save" class="btn btn-primary btn-sm add-button">Save Changes</button>
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