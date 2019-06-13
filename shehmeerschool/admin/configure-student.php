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
if(isset($_GET['id'])) {
  $_SESSION['id']=mysqli_real_escape_string($Connection,$_GET['id']);
  require 'deletestudent.php';
  unset($_GET['id']);
}
else if(isset($_GET['edit'])) {
  $_SESSION['id']=mysqli_real_escape_string($Connection,$_GET['edit']);
  header('Location: student-update.php');
  die();
}
?>
<body>    
    <nav class="navbar navbar-expand-sm sticky-top navbar-light bg-light mb-3">
        <div class="container">
            <a href="student.php" class="mr-4"><i class="fas fa-arrow-left fa-2x text-dark"></i></a>
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

    <section id="top-section">
            <div class="container">
                <form action="configure-student.php" method="POST">
                <div class="row">
                    <div class="col-4 text-center">
                        <div class="form-group">
                            <select name="Class" name="" id="" class="form-control">
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
                    <div class="col-4 text-center">
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
                    <div class="col-4 text-center">
                        <div class="input-group">
                            <input name="GrSearch" class="form-control py-2" type="search" placeholder="Search by Gr#" id="example-search-input">
                            <span class="input-group-append">
                                <button name="Search" class="btn btn-outline-secondary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </section>

        <section id="middle-section" class="py-5">
            <div class="container">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th onclick="sortTable(0)">Gr#</th>
                                    <th onclick="sortTable(1)">Roll#</th>
                                    <th onclick="sortTable(2)">Name</th>
                                    <th>Class</th>
                                    <th>Section</th>
                                    <th colspan="2" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(isset($_POST['Search'])) {
                                    if(!isset($_POST['GrSearch'])) $GrNo=null;
                                    else $GrNo = $_POST['GrSearch'];
                                    if(!isset($_POST['Class'])) $Class=null;
                                    else $Class = $_POST['Class'];
                                    if(!isset($_POST['Section'])) $Section=null;
                                    else $Section = $_POST['Section'];
                                    if ($GrNo != null) {
                                        $Query="SELECT * FROM student WHERE GrNo=$GrNo";
                                    }
                                    else if($Class == null) {
                                        $Query="SELECT * FROM student WHERE Section='$Section'";
                                    }
                                    else if($Section == null) {
                                        $Query="SELECT * FROM student WHERE ClassNo=$Class";
                                    }
                                    else {
                                        $Query="SELECT * FROM student WHERE ClassNo=$Class AND Section='$Section'";
                                    }
                                    $res=$ConnectingDB->query($Query);
                                }
                                ?>
                                <?php if(isset($_POST['Search'])) { while($row = $res->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $row['GrNo']; ?></td>
                                    <td><?php echo $row['RollNo']; ?></td>
                                    <td><a href="student-profile.php?id=<?php echo $row['GrNo'];?>"><?php echo $row['Name']; ?></a></td>
                                    <td><?php echo $row['ClassNo']; ?></td>
                                    <td><?php echo $row['Section']; ?></td>
                                    <td><a href="configure-student.php?edit=<?php echo $row['GrNo']; ?>">Edit</a></td>
                                    <td><a href="configure-student.php?id=<?php echo $row['GrNo']; ?>">Delete</a></td>
                                </tr>
                    <?php } } ?>
                            </tbody>
                        </table>
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

</body>
</html>    