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
   if(isset($_POST['Submit'])) {
        $id=$_SESSION['ID'];
        $Query="SELECT Amount FROM fee WHERE Student='$id' AND Status='Unpaid'";
        $res=$ConnectingDB->query($Query);
        $row=$res->fetch_assoc();
        $_SESSION['Amount']=$row['Amount'];
        require 'includes/authorize-fee.php';
        if(!isset($_SESSION['Error'])) {
            echo "<script type='text/javascript'>alert('Student fees has been paid!')</script>";
        }
        else {
            echo "<script type='text/javascript'>alert('Transaction failed!')</script>";
        }
        $Query="UPDATE fee SET Status='Paid' WHERE Student=$id AND Status='Unpaid'";
        $res=$ConnectingDB->query($Query);
        header('Location: feedetails.php');
        die();
    }
}
?>
<?php
$id=$_SESSION['ID'];
$Query="SELECT * FROM fee WHERE Student=$id AND Status='Unpaid'";
$res=$ConnectingDB->query($Query);
if(!($res->num_rows > 0)) {
    echo "<script type='text/javascript'>alert('All dues are cleared for now.')</script>";
    header('Location: feedetails.php');
    die();
}
?>
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
                        <a class="nav-link" href="attendance.php">Attendance</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="" class="nav-link active dropdown-toggle" data-toggle="dropdown">Fees</a>
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

    <section id="payfee" class="py-5">
        <div class="container w-75 bg-light p-5">
            <div class="row">
                <div class="col">
                    <form action="payfee.php" method="POST">
                        <h1 class="my-4 text-center" style="font-family: Times New Roman, Times, serif;">Enter Credit Card Info</h1>
                        <div class="form-group mt-4">
                            <label for="credit#">Enter Credit card number</label>
                            <input name="CardNo" type="text" class="form-control" placeholder="1234567890">
                        </div>
                        <div class="form-group mt-4">
                            <label for="expire">Enter expiration date</label>
                            <input name="Expire" type="text" class="form-control" placeholder="Format: yyyy-mm">
                        </div>
                        <div class="form-group mt-4">
                            <label for="code">Enter card code</label>
                            <input name="CardCode" type="text" class="form-control" placeholder="123">
                        </div>
                        <!-- <h1 class="display-4 my-4 text-center">Enter Order Info</h1>
                        <div class="form-group mt-4">
                            <label for="invoice#">Enter Invoice number</label>
                            <input type="text" class="form-control" placeholder="10101">
                        </div>
                        <div class="form-group mt-4">
                            <label for="description">Enter Description</label>
                            <input type="text" class="form-control" placeholder="e.g: monthly fees">
                        </div> -->
                        <h1 class="my-4 text-center" style="font-family: Times New Roman, Times, serif;">Enter Customer Info</h1>
                        <div class="form-group mt-4">
                            <label for="fname">Enter first name</label>
                            <input name="Fname" type="text" class="form-control" placeholder="first name">
                        </div>
                        <div class="form-group mt-4">
                            <label for="lname">Enter last name</label>
                            <input name="Lname" type="text" class="form-control" placeholder="last name">
                        </div>
                        <div class="form-group mt-4">
                            <label for="cname">Enter Company name</label>
                            <input name="Company" type="text" class="form-control" placeholder="company name">
                        </div>
                        <div class="form-group mt-4">
                            <label for="address">Enter address</label>
                            <input name="Address" type="text" class="form-control" placeholder="address">
                        </div>
                        <div class="form-group mt-4">
                            <label for="city">Enter city</label>
                            <input name="City" type="text" class="form-control" placeholder="city">
                        </div>
                        <div class="form-group mt-4">
                            <label for="state">Enter state</label>
                            <input name="State" type="text" class="form-control" placeholder="state">
                        </div>
                        <div class="form-group mt-4">
                            <label for="zip">Enter zip code</label>
                            <input name="Zip" type="text" class="form-control" placeholder="zip code">
                        </div>
                        <div class="form-group mt-4">
                            <label for="name">Enter country</label>
                            <input name="Country" type="text" class="form-control" placeholder="country">
                        </div>
                        <div class="form-group mt-4">
                            <input name="Submit" type="submit" class="btn btn-primary float-right btn-lg rounded mt-4" value="Submit">
                        </div>

                    </form>
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