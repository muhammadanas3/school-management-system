<?php
$varGrNo=mysqli_real_escape_string($Connection, $_POST['GrNo']);
if (!isset($_POST['Name'])) $varName=null;
else $varName=mysqli_real_escape_string($Connection, $_POST['Name']);
if (!isset($_POST['Guardian'])) $varGuardian=null;
else $varGuardian=mysqli_real_escape_string($Connection, $_POST['Guardian']);
if (!isset($_POST['CNIC'])) $varCNIC=null;
else $varCNIC=mysqli_real_escape_string($Connection, $_POST['CNIC']);
if (!isset($_POST['GrNo'])) $varGrNo=null;
else $varGrNo=mysqli_real_escape_string($Connection, $_POST['GrNo']);
if (!isset($_POST['RollNo'])) $varRollNo=null;
else $varRollNo=mysqli_real_escape_string($Connection, $_POST['RollNo']);
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
if (!isset($_POST['Class'])) $varClass=null;
else $varClass=mysqli_real_escape_string($Connection, $_POST['Class']);
if (!isset($_POST['Section'])) $varSection=null;
else $varSection=mysqli_real_escape_string($Connection, $_POST['Section']);
if (!isset($_POST['Occupation'])) $varOccupation=null;
else $varOccupation=mysqli_real_escape_string($Connection, $_POST['Occupation']);
if (!isset($_POST['HomePhone'])) $varHomePhone=null;
else $varHomePhone=mysqli_real_escape_string($Connection, $_POST['HomePhone']);
echo $varName . ' ' . $varGuardian . ' ' .$varClass . ' ' .$varSection . ' ' .$varRollNo . ' ' .
		 $varGrNo . ' ' .$varAddress . ' ' .$varHomePhone . ' ' . $varPassword . ' ' .$varDOB . ' ' .
		$varGender . ' ' .$varEmail . ' ' . $varPhoto;
$Query = "INSERT INTO student(GrNo, Name, GuardianName,ClassNo,Section,RollNo,Address,Contact,Password,DOB,Gender,Email,Photo)
	  VALUES('$varGrNo','$varName','$varGuardian','$varClass','$varSection','$varRollNo',
		 '$varAddress','$varHomePhone','$varPassword','$varDOB','$varGender','$varEmail','$varPhoto')";
$ConnectingDB->query($Query);
$Query = "SELECT * FROM guardian WHERE CNIC='$varCNIC'";
$res = $ConnectingDB->query($Query);
if(!($res->num_rows > 0)) {
	$Query = "INSERT INTO guardian VALUES('$varCNIC', '$varGuardian', '$varOccupation', '$varContact')";
	if($ConnectingDB->query($Query)) {
		$Query = "UPDATE student SET GuardianCNIC='$varCNIC' WHERE GrNo='$varGrNo'";
		$ConnectingDB->query($Query);
	}
}
else {
	$Query = "UPDATE student SET GuardianCNIC='$varCNIC' WHERE GrNo='$varGrNo'";
	$ConnectingDB->query($Query);
}

for ($i = 0; $i < 13; $i++) {
if(isset($_POST['subject'][$i])) {
	echo $_POST['subject'][$i] . ' ';
	$course = $_POST['subject'][$i];
	$Query="INSERT INTO studies VALUES('$varGrNo', '$course')";
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