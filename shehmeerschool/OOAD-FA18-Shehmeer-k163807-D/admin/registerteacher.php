<?php
$varID=mysqli_real_escape_string($Connection, $_POST['ID']);
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
if (!isset($_POST['Gender'])) $varGender=null;
else $varGender=mysqli_real_escape_string($Connection, $_POST['Gender']);
if (!isset($_POST['DOB'])) $varDOB=null;
else $varDOB=mysqli_real_escape_string($Connection, $_POST['DOB']);
if (!isset($_POST['Password'])) $varPassword=null;
else $varPassword=mysqli_real_escape_string($Connection, $_POST['Password']);
$Query = "INSERT INTO teacher VALUES('$varName', '$varID', '$varPassword', '$varQualify', '$varCNIC',
									 '$varSalary', '$varDesign', '$varContact', '$varAddress', '$varGender',
									 '$varPhoto', '$varEmail', '$varDOB')";
$res=$ConnectingDB->query($Query);
for ($i = 0; $i < 13; $i++) {
if(isset($_POST['subject'][$i])) {
	$course = $_POST['subject'][$i];
	$Query="INSERT INTO teaches VALUES('$varID', '$course')";
	$ConnectingDB->query($Query);
    }
}
// if($ConnectingDB->query($Query)) {
//     echo "<script type='text/javascript'>alert('Updated successfully.')</script>";
// }
// else {
//     echo "<script type='text/javascript'>alert('Error!')</script>";
// }
?>