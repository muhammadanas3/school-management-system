<?php
$varExam = $_POST['Exam'];
$varClass = $_POST['Class'];
$varSection = $_POST['Section'];
$varCourse = $_POST['Course'];
$varRollNo = $_POST['RollNo'];
$varMarks = $_POST['Marks'];
$Query="SELECT * FROM student WHERE ClassNo='$varClass' AND RollNo='$varRollNo' AND Section='$varSection'";
$res=$ConnectingDB->query($Query);
$row=$res->fetch_assoc();
$id=$row['GrNo'];
$Query="INSERT INTO marks(Student, $varExam, Course) VALUES('$id', '$varMarks', '$varCourse')";
if($ConnectingDB->query($Query)) {
    echo "<script type='text/javascript'>alert('Added successfully.')</script>";
}
else {
    echo "<script type='text/javascript'>alert('Error!')</script>";
}
?>