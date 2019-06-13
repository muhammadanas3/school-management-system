<?php
require 'includes/DB.php';
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
   if(isset($_POST['Signin']))
	require 'includes/login.php';
   if(isset($_POST['Ok']) && isset($_SESSION['LoggedIn'])) {
    if($_SESSION['LoggedIn'] == '1') {
        header("Location: admin/admin.php");
        die();
    }
    else if($_SESSION['LoggedIn'] == '2') {
        header("Location: teacher/teacher.php");
        die();
    }
    else if($_SESSION['LoggedIn'] == '3') {
        header("Location: student/student.php");
        die();
    }
   }
   else if(isset($_POST['Ok'])) {
        unset($_SESSION['Message']);
   }
}
?>
<body id="sign-in-main">
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body" id="Form">
                        <h5 class="card-title text-center">Sign In</h5>
                        
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        
                        <div class="mt-4">
                            <label for="id">Id:</label>
                            <input name="ID" type="text" id="inputId" class="form-control p-2" placeholder="Id" required autofocus>
                        </div>
            
                        <div class="mt-4">
                            <label for="password">Password</label>
                            <input name="Password" type="password" id="inputPassword" class="form-control p-2" placeholder="Password" required>
                        </div>
                        <div class="mt-4">
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input name="Type" type="radio" class="form-check-input" value="Admin">Admin
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input name="Type" type="radio" class="form-check-input" value="Student">Student
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input name="Type" type="radio" class="form-check-input" value="Teacher">Teacher
                                </label>
                            </div>
                        </div>
                        <button name="Signin" class="btn btn-primary btn-block text-uppercase mt-4 py-2">Sign in</button>
                        </form>

                    </div>
                    <div class="card-body d-none" id="Attempt">
                        <h5 class="card-title text-center">Alert</h5>
                        
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        
                        <div class="text-center" style="font-size:150%; ">
                            <?php if(isset($_SESSION['Message'])) echo $_SESSION['Message'];?>
                        </div>
                        
                        <button name="Ok" class="btn btn-primary btn-block text-uppercase mt-4 py-2">Ok</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php if(isset($_SESSION['Message'])) {
    echo '<script>
    var element = document.getElementById("Form");
    element.classList.add("d-none");
    var element1 = document.getElementById("Attempt");
    element1.classList.remove("d-none");
     </script>';
}
else {
    echo '<script>  
    var element = document.getElementById("Attempt");
    element.classList.add("d-none");
    var element1 = document.getElementById("Form");
    element1.classList.remove("d-none");
     </script>';
}
?>

<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
crossorigin="anonymous"></script>

</body>
</html>