<?php
//echo $_POST['Status'][0];
$Class=$_SESSION['Class'];
$Section=$_SESSION['Section'];
$Query="SELECT * FROM student WHERE ClassNo=$Class AND Section='$Section'";
$res=$ConnectingDB->query($Query);
$i=0;
while($row = $res->fetch_assoc()) {
	$GrNo=$row['GrNo'];
	$Status=$_POST['Status'][$i];
//	echo $GrNo . $Status; die();
	$order_date=date("Y-m-d");
	$Query="INSERT INTO attendance VALUES('$GrNo', '$order_date', '$Status')";
	$res1=$ConnectingDB->query($Query);
	$i=$i+1;
}
?>