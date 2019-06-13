<?php
$id=$_SESSION['ID'];
$newPass=$_POST['NewPass'];
$Query="UPDATE teacher SET Password='NewPass' WHERE ID=$id";
if($ConnectingDB->query($Query)) {
    echo "<script type='text/javascript'>alert('Updated successfully.')</script>";
}
else {
    echo "<script type='text/javascript'>alert('Error!')</script>";
}
?>