<?php
$id=$_SESSION['id'];
if (!isset($_POST['Name'])) $varName=null;
else $varName=mysqli_real_escape_string($Connection, $_POST['Name']);
if (!isset($_POST['Guardian'])) $varGuardian=null;
else $varGuardian=mysqli_real_escape_string($Connection, $_POST['Guardian']);
if (!isset($_POST['RollNo'])) $varRollNo=null;
else $varRollNo=mysqli_real_escape_string($Connection, $_POST['RollNo']);
if (!isset($_POST['Occupation'])) $varOccupation=null;
else $varOccupation=mysqli_real_escape_string($Connection, $_POST['Occupation']);
if (!isset($_POST['Class'])) $varClass=null;
else $varClass=mysqli_real_escape_string($Connection, $_POST['Class']);
if (!isset($_POST['Contact'])) $varContact=null;
else $varContact=mysqli_real_escape_string($Connection, $_POST['Contact']);
if (!isset($_POST['Address'])) $varAddress=null;
else $varAddress=mysqli_real_escape_string($Connection, $_POST['Address']);
if (!isset($_POST['Photo'])) $varPhoto=null;
else $varPhoto=mysqli_real_escape_string($Connection, $_POST['Photo']);
if (!isset($_POST['Email'])) $varEmail=null;
else $varEmail=mysqli_real_escape_string($Connection, $_POST['Email']);
if (!isset($_POST['Section'])) $varSection=null;
else $varSection=mysqli_real_escape_string($Connection, $_POST['Section']);
if (!isset($_POST['HomePhone'])) $varHomePhone=null;
else $varHomePhone=mysqli_real_escape_string($Connection, $_POST['HomePhone']);
if (!isset($_POST['Password'])) $varPassword=null;
else $varPassword=mysqli_real_escape_string($Connection, $_POST['Password']);
// $Query = "UPDATE teacher
// 		  SET Name='$varName', Qualification='$varQualify', CNIC='$varCNIC', Salary='$varSalary', Designation='$varDesign',
// 		      Contact='$varContact', Address='$varAddress', Photo='$varPhoto', Email='$varEmail'
// 		  WHERE ID='$id'";
// if($ConnectingDB->query($Query)) {
//     echo "<script type='text/javascript'>alert('Updated successfully.')</script>";
// }
// else {
//     echo "<script type='text/javascript'>alert('Error!')</script>";
// }
?>