<?php
$id=$_SESSION['id'];
$Query="DELETE FROM staff WHERE ID=$id";
if($ConnectingDB->query($Query)) {
    echo "<script type='text/javascript'>alert('Deleted successfully.')</script>";
}
else {
    echo "<script type='text/javascript'>alert('Error!')</script>";
}
?>