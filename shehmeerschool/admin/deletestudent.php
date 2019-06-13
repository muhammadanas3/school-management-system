<?php
$id=$_SESSION['id'];
$Query="DELETE FROM student WHERE SID='$id'";
$ConnectingDB->query($Query);
$Query="DELETE FROM student WHERE GrNo='$id'";
if($ConnectingDB->query($Query)) {
    echo "<script type='text/javascript'>alert('Deleted successfully.')</script>";
}
else {
    echo "<script type='text/javascript'>alert('Error!')</script>";
}
?>