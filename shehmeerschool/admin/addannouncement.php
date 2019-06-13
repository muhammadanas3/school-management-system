<?php
if(!isset($_POST['Class'])) $varClass = null;
else if($_POST['Class']=='null') $varClass = null;
else $varClass = $_POST['Class'];
if(!isset($_POST['Section'])) $varSection = null;
else if($_POST['Section']=='null') $varSection = null;
else $varSection = $_POST['Section'];
if(!isset($_POST['Title'])) $varTitle = null;
else $varTitle = $_POST['Title'];
if(!isset($_POST['Text'])) $varText = null;
else $varText = $_POST['Text'];
if(!isset($_POST['File'])) $varFile = null;
else $varFile = $_POST['File'];
$Query = "INSERT INTO announcement(Class, Section, Title, Text, File) VALUES('$varClass', '$varSection', '$varTitle', '$varText', '$varFile')";
if($ConnectingDB->query($Query)) {
    echo "<script type='text/javascript'>alert('Added successfully.')</script>";
}
else {
    echo "<script type='text/javascript'>alert('Error!')</script>";
}
?>