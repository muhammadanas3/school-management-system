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
   if(isset($_POST['Add']))
    require 'addfee.php';
}
?>
<body>
    
    <nav class="navbar navbar-expand-sm sticky-top navbar-light bg-light mb-3">
        <div class="container">
            <a href="admin.php" class="mr-4"><i class="fas fa-arrow-left fa-2x text-dark"></i></a>
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

    <section id="student-fee" class="mt-5">
        <div class="container"><button class='btn btn-primary float-right' data-toggle='modal' data-target='#add-modal' id='Add'>+Add</button></div>
        <div class="container">
            <div class="row m-auto">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm table-striped text-center">
                        <thead>
                            <tr>
                                <th>Student</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Amount</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $Query="SELECT * FROM fee WHERE Status='Unpaid'";
                        $res=$ConnectingDB->query($Query);
                        ?>
                        <?php while($row = $res->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row['Student']; ?></td>
                                <td><?php echo $row['Date']; ?></td>
                                <td><?php echo $row['Status']; ?></td>
                                <td><?php echo $row['Amount']; ?></td>
                                <td><a href="">Print</a></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    
<div class="modal fade text-dark" id="add-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            Add Details
                        </h5>
                        <button class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="form-group">
                                <label for="name">ID</label>
                                <input name="id" type="text" class="form-control" placeholder="ID">
                            </div>
                            <div class="form-group">
                                <label for="name">Amount</label>
                                <input name="amount" type="text" class="form-control" placeholder="Amount">
                            </div>
                            <div>
                              <input class="btn btn-primary float-right" name="Add" value="Add" type="Submit">
                            </div>
                        </form>
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

<script src="js/script.js"></script>

</body>
</html>
