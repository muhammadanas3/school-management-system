<?php
$id=$_SESSION['id'];
if (!isset($_POST['Name'])) $varName=null;
else $varName=mysqli_real_escape_string($Connection, $_POST['Name']);
if (!isset($_POST['CNIC'])) $varCNIC=null;
else $varCNIC=mysqli_real_escape_string($Connection, $_POST['CNIC']);
if (!isset($_POST['Salary'])) $varSalary=null;
else $varSalary=mysqli_real_escape_string($Connection, $_POST['Salary']);
if (!isset($_POST['Design'])) $varDesign=null;
else $varDesign=mysqli_real_escape_string($Connection, $_POST['Design']);
if (!isset($_POST['Contact'])) $varContact=null;
else $varContact=mysqli_real_escape_string($Connection, $_POST['Contact']);
if (!isset($_POST['Address'])) $varAddress=null;
else $varAddress=mysqli_real_escape_string($Connection, $_POST['Address']);
$Query = "UPDATE staff
		  SET Name='$varName', CNIC='$varCNIC', Salary='$varSalary',
		      Designation='$varDesign', Contact='$varContact', Address='$varAddress'
		  WHERE ID='$id'";
if($ConnectingDB->query($Query)) {
    echo "<script type='text/javascript'>alert('Updated successfully.')</script>";
}
else {
    echo "<script type='text/javascript'>alert('Error!')</script>";
}
?>