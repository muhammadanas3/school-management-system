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
   if(isset($_POST['calc'])) {
        $amount=$_POST['amount'];
        $Desc=$_POST['description'];
        $type=$_POST['type'];
        $Query="INSERT INTO expense(Item,Type,Cost) VALUES('$Desc','$type','$amount')";
        $res=$ConnectingDB->query($Query);
    }
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
                        <a href="../includes/logout" class="btn btn-dark">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section id="top">

        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <h1 class="display-4 text-white">Available budget in <span class="month">%month%</span></h1>
                </div>
            </div>
            <div class="row text-center mt-4">
                <div class="col bg-success rounded text-white">
                    <label for="totalbudget" class="lead">Total Budget</label>
                    <div class="totalBudget">2,345</div>
                </div>
            </div>
            <div class="row text-center mt-4">
                <div class="col-sm-6 bg-primary rounded-circle text-white pt-2">
                    <label for="income-text" class="lead">Income</label>
                    <div class="income-value">1,200</div>
                    <div class="income-percentage">&nbsp;</div>
                </div>
                <div class="col-sm-6 bg-danger rounded-circle text-white pt-2 pb-1">
                    <label for="expense-text" class="lead">Expense</label>
                    <div class="expense-value">1100</div>
                    <div class="expense-percentage">25%</div>
                </div>
            </div>
        </div>
    </section>

    <section id="bottom" class="bg-light p-4">
        <form action="expense.php" method="POST">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <select name="type" class="form-control input-type">
                            <option value="income">+</option>
                            <option value="expense">-</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <input name="description" type="text" class="form-control input-description" placeholder="description">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <input name="amount" type="text" class="form-control input-value" placeholder="amount">
                    </div>
                </div>
                <div class="col-sm-2 text-center">
                    <button name="calc" class="btn btn-outline-primary input-btn"><i class="far fa-check-circle"></i></button>
                </div>
            </div>
        </div>
    </form>
    </section>

    

    <section id="expense">
        <div class="container">
            <div class="row mt-4 parent">
                <div class="col-sm-6 p-3">
                    <div class="Income">
            
                        <h2 class="Income-heading text-center text-primary">Income</h2>
                        <div class="Income-list m-4">
                        
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 p-3">
                    <div class="Expense">
        
                        <h2 class="Expense-heading text-center text-danger">Expense</h2>
                        <div class="Expenses-list m-4">
                        
                        </div>
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

<script src="js/script.js"></script>

</body>
</html>
