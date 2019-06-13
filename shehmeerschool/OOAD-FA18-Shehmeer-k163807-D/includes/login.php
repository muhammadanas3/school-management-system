<?php
if(empty($_POST['ID']) || empty($_POST['Password']) || !isset($_POST['Type']))
{
  $_SESSION['Message']="All Fields must be filled out.";
}
else if(isset($_POST['Signin'])){
	$inputID=mysqli_real_escape_string($Connection,$_POST['ID']);
	$inputPassword=mysqli_real_escape_string($Connection, $_POST['Password']);
	if($_POST['Type']=='Student') {
		$Query="SELECT * FROM student WHERE GrNo='$inputID'";
		$res=$ConnectingDB->query($Query);
		if($res->num_rows > 0) {
			$row = $res->fetch_assoc();
			//$pass=base64_decode($row['Password']);
			//if ( $inputPassword != $pass )
     		if($inputPassword != $row['Password'])
     		{
				$_SESSION['Message']='Invalid ID or Password';
     		}
     		else {
				$_SESSION['Message']='Successfully Logged in';
				$_SESSION['Name']=$row['Name'];
				$_SESSION['ID']=$inputID;
				$_SESSION['Password']=$inputPassword;
				$_SESSION['GuardianName']=$row['GuardianName'];
				$_SESSION['ClassNo']=$row['ClassNo'];
				$_SESSION['Section']=$row['Section'];
				$_SESSION['RollNo']=$row['RollNo'];
				$_SESSION['Address']=$row['Address'];
				$_SESSION['Contact']=$row['Contact'];
				$_SESSION['DOB']=$row['DOB'];
				$_SESSION['GuardianCNIC']=$row['GuardianCNIC'];
				$_SESSION['Gender']=$row['Gender'];
				$_SESSION['Email']=$row['Email'];
				// $_SESSION['HomePhone']=$row['HomePhone'];
				$_SESSION['LoggedIn']='3';
     		}
		}
		else {
			$_SESSION['Message']='Invalid ID or Password';
		}
	}
	else if($_POST['Type']=='Teacher')
	{
		$Query="SELECT * FROM teacher WHERE ID='$inputID'";
		$res=$ConnectingDB->query($Query);
		if($res->num_rows > 0) {
			$row = $res->fetch_assoc();
			//$pass=base64_decode($row['Password']);
			//if ( $inputPassword != $pass )
     		if($inputPassword != $row['Password'])
     		{
				$_SESSION['Message']='Invalid ID or Password';
     		}
     		else {
				$_SESSION['Message']='Successfully Logged in';
				$_SESSION['Name']=$row['Name'];
				$_SESSION['ID']=$inputID;
				$_SESSION['Password']=$inputPassword;
				$_SESSION['Qualification']=$row['Qualification'];
				$_SESSION['CNIC']=$row['CNIC'];
				$_SESSION['Salary']=$row['Salary'];
				$_SESSION['Designation']=$row['Designation'];
				$_SESSION['Address']=$row['Address'];
				$_SESSION['Contact']=$row['Contact'];
				$_SESSION['Photo']=$row['Photo'];
				$_SESSION['Gender']=$row['Gender'];
				$_SESSION['Email']=$row['Email'];
				$_SESSION['DOB']=$row['DOB'];
				$_SESSION['LoggedIn']='2';
     		}
		}
		else {
			$_SESSION['Message']='Invalid ID or Password';
		}	
	}
	else if($_POST['Type']=='Admin')
	{
		if($inputID == 'admin' && $inputPassword == 'admin') {
			$_SESSION['Message']='Successfully Logged in';
			$_SESSION['LoggedIn']='1';
		}
		else {
			$_SESSION['Message']='Invalid ID or Password';
		}
	}
}
?>