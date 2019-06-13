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
   if(isset($_POST['Add'])) {
        require 'registerstudent.php';
        header('Location: configure-student.php');
        die();
    }
}
?>
<body>
    <nav class="navbar navbar-expand-sm sticky-top navbar-light bg-light mb-3">
        <div class="container">
            <a href="student.php" class="mr-4"><i class="fas fa-arrow-left fa-2x text-dark"></i></a>
            <a class="navbar-brand" href="#home">Admin Pannel</a>
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

    
    <section id="add-student" class="py-5">
        <div class="container">
            <div style="width:75%;" class="m-auto bg-light p-5">
		<form action="student-register.php" method="POST">
                <h1 class="display-4 text-center mb-4">Add Student Information</h1>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input name="Name" type="text" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="father name">Guardian Name</label>
                            <input name="Guardian" type="text" class="form-control" placeholder="Guardian Name">
                        </div>
                        <div class="form-group">
                            <label for="guardian">Guardian CNIC</label>
                            <input name="CNIC" type="text" class="form-control" placeholder="Guardian CNIC">
                        </div>
                        <div class="form-group">
                            <label for="Gr#">Gr#</label>
                            <input name="GrNo" type="text" class="form-control" placeholder="GR#">
                        </div>
                        <div class="form-group">
                            <label for="roll#">Roll#</label>
                            <input name="RollNo" type="text" class="form-control" placeholder="Roll#">
                        </div>
                        <div class="form-group">
                            <label for="contact#">Contact#</label>
                            <input name="Contact" type="text" class="form-control" placeholder="Contact#">
                        </div>
                        
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input name="Email" type="text" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input name="Gender" type="radio" id="male" class="form-check-input" name="Gender" value="male">Male
                            </label>
                        </div>
                        <div class="form-check-inline mt-2">
                            <label class="form-check-label">
                                <input name="Gender" type="radio" id="female" class="form-check-input" name="Gender" value="female">Female
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="dob">Date of birth</label>
                            <input name="DOB" type="text" class="form-control" placeholder="Date Of Birth">
                        </div>
                        <div class="form-group">
                            <label for="class">Class</label>
                            <input name="Class" type="text" class="form-control" placeholder="Class">
                        </div>
                        <div class="form-group">
                            <label for="sec">Section</label>
                            <input name="Section" type="text" class="form-control" placeholder="Section">
                        </div>
                        <div class="form-group">
                            <label for="occupation">Father Occupation</label>
                            <input name="Occupation" type="text" class="form-control" placeholder="Father Occupation">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input name="Address" type="text" class="form-control" placeholder="Address">
                        </div>
                        <div class="form-group">
                            <label for="contact#">Home Contact#</label>
                            <input name="HomePhone" type="text" class="form-control" placeholder="Home Contact#">
                        </div>
                        <div class="form-group">
                            <label for="roll#">password</label>
                            <input name="Password" type="text" class="form-control" placeholder="Password">
                        </div>
                        
                        <div class="form-group mt-3">
                            <label for="file">Upload photo</label>
                            <input name="Photo" class="form-control-file" type="file" id="file">
                        </div>
    
                    </div>
                </div>
		<div class="row text-center my-5">
                    <div class="col">
                        <h2>Select Courses</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input name="subject[]" type="checkbox" class="form-check-input" value="English">English
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input name="subject[]" type="checkbox" class="form-check-input" value="Urdu">Urdu
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input name="subject[]" type="checkbox" class="form-check-input" value="Islamiat">Islamiat
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input name="subject[]" type="checkbox" class="form-check-input" value="Maths">Maths
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input name="subject[]" type="checkbox" class="form-check-input" value="Physics">Physics
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input name="subject[]" type="checkbox" class="form-check-input" value="Chemistry">Chemistry
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input name="subject[]" type="checkbox" class="form-check-input" value="Sindhi">Sindhi
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input name="subject[]" type="checkbox" class="form-check-input" value="Pakistan Studies">Pakistan Studies
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input name="subject[]" type="checkbox" class="form-check-input" value="Computer">Computer
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input name="subject[]" type="checkbox" class="form-check-input" value="Science">Science
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input name="subject[]" type="checkbox" class="form-check-input" value="Biology">Biology
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input name="subject[]" type="checkbox" class="form-check-input" value="Social Studies">Social Studies
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input name="subject[]" type="checkbox" class="form-check-input" value="Drawing">Drawing
                            </label>
                        </div>
                    </div>
                    <!-- <div class="col-sm-3">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input name="subject[]" type="checkbox" class="form-check-input" value="">Science
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input name="subject[]" type="checkbox" class="form-check-input" value="">Biology
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input name="subject[]" type="checkbox" class="form-check-input" value="">Social Studies
                            </label>
                        </div>
                    </div> -->
                </div>
                <div class="row mt-4">
                    <div class="col-12 text-right">
                        <button name="Add" class="btn btn-primary btn-sm add-button">Add</button>
                    </div>
                </div>
                </form>
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