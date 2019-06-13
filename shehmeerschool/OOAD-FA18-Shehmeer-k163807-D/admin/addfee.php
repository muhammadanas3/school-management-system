<?php
$id=$_POST['id'];
$amount=$_POST['amount'];
$date = date('Y-m-d');
$Query="INSERT INTO fee(Student, Date, Status, Amount) VALUES('$id', '$date', 'Unpaid', '$amount')";
if($ConnectingDB->query($Query)) {
    echo "<script type='text/javascript'>alert('Added successfully.')</script>";
}
else {
    echo "<script type='text/javascript'>alert('Error!')</script>";
}
?>