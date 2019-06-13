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
  require 'deleteteacher.php';
  unset($_GET['id']);
}
else if(isset($_GET['edit'])) {
  $_SESSION['id']=mysqli_real_escape_string($Connection,$_GET['edit']);
  header('Location: teacher-update.php');
  die();
}
?>
<body>
    <nav class="navbar navbar-expand-sm sticky-top navbar-light bg-light mb-3">
        <div class="container">
            <a href="teaching-staff.php" class="mr-4"><i class="fas fa-arrow-left fa-2x text-dark"></i></a>
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

    <section id="teaching-staff">
        <div class="container">
            <h1 class="h1 text-center py-5">Teaching Staff</h1>
            <div class="responsive-table">
                <table class="table table-striped text-center" id="teacher-table">
                    <thead>
                        <tr>
                            <th onclick="sortTable(0)">Sno</th>
                            <th onclick="sortTable(1)">Name</th>
                            <th onclick="sortTable(2)">Designation</th>
                            <th colspan="2" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $Query="SELECT * FROM teacher";
                        $res=$ConnectingDB->query($Query); ?>
                        <?php while($row = $res->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $row['ID']; ?></td>
                                    <td><a href="teacher-profile.php?id=<?php echo $row['ID']; ?>"><?php echo $row['Name']; ?></a></td>
                                    <td><?php echo $row['Designation']; ?></td>
                                    <td><a href="configure-teaching-staff.php?edit=<?php echo $row['ID']; ?>">Edit</a></td>
                                    <td><a href="configure-teaching-staff.php?id=<?php echo $row['ID']; ?>">Delete</a></td>
                                </tr>
                    <?php }  ?>
                    </tbody>
    
                </table>
            </div>
        </div>
    </section>


    <div class="modal fade text-dark" id="teaching-staff-modal">
            <div class="modal-dialog">
              <div class="modal-content">
                    
                <div class="modal-header">
                      <h5 class="modal-title">Teacher Info</h5>
                      <button class="close" data-dismiss="modal">
                        <span>&times;</span>
                      </button>
                </div>
        
                <div class="modal-footer">
                      <input type="submit" class="btn btn-primary btn-block" id="edit" value="Edit">
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
<!-- <script src="js/info.js"></script> -->

<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("teacher-table");
  switching = true;
  // Set the sorting direction to ascending:
  dir = "asc"; 
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /* Loop through all table rows (except the
    first, which contains table headers): */
    for (i = 1; i < (rows.length - 1); i++) {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      // Each time a switch is done, increase this count by 1:
      switchcount ++; 
    } else {
      /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>


</body>
</html>