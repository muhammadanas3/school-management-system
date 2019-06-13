<?php
$id=$_SESSION['id'];
if (!isset($_POST['Name'])) $varName=null;
else $varName=mysqli_real_escape_string($Connection, $_POST['Name']);
if (!isset($_POST['Qualify'])) $varQualify=null;
else $varQualify=mysqli_real_escape_string($Connection, $_POST['Qualify']);
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
if (!isset($_POST['Photo'])) $varPhoto=null;
else $varPhoto=mysqli_real_escape_string($Connection, $_POST['Photo']);
if (!isset($_POST['Email'])) $varEmail=null;
else $varEmail=mysqli_real_escape_string($Connection, $_POST['Email']);
$Query = "UPDATE teacher
		  SET Name='$varName', Qualification='$varQualify', CNIC='$varCNIC', Salary='$varSalary', Designation='$varDesign',
		      Contact='$varContact', Address='$varAddress', Photo='$varPhoto', Email='$varEmail'
		  WHERE ID='$id'";
if($ConnectingDB->query($Query)) {
    echo "<script type='text/javascript'>alert('Updated successfully.')</script>";
}
else {
    echo "<script type='text/javascript'>alert('Error!')</script>";
}
?>