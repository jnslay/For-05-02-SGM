<?php
session_start();
$con = mysqli_connect("localhost","root","","testing");

//this one controls when the needles prepared button is clicked, should add one to needles in patient and subtract one from
//needles prepared
if(isset($_POST['prepNeedle_in'])){
    $ret = "SELECT * FROM `in surgery tools` WHERE 1";
    $result = ($con->query($ret));
    $value = 0;
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $value = $row["Needles Prepared"] - 1;
        }
    if ($value < 0) {
        $value = 0;
    }
    $query  = "UPDATE `in surgery tools` SET `Needles Prepared`='$value' WHERE 1";
    $query_run = mysqli_query($con, $query);
    $needlePrepared = $value;
    header("Location: surgery-checklist.php");

    $ret = "SELECT * FROM `in surgery tools` WHERE 1";
    $result = ($con->query($ret));
    $value = 0;
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $value = $row["Needles In"] + 1;
    }
    if ($value < 0){
        $value = 0;
    }
    $query  = "UPDATE `in surgery tools` SET `Needles In`='$value' WHERE 1";
    $query_run = mysqli_query($con, $query);
    $needleIn = $value;
    
    }
    }
}

//this one controls when the sponges prepared button is clicked, should add one to sponges in patient and subtract one from
//sponges prepared
elseif(isset($_POST['prepSponge_in'])){
    $ret = "SELECT * FROM `in surgery tools` WHERE 1";
    $result = ($con->query($ret));
    $value = 0;
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $value = $row["Sponges Prepared"] - 1;
        }
    if ($value < 0) {
        $value = 0;
    }
    $query  = "UPDATE `in surgery tools` SET `Sponges Prepared`='$value' WHERE 1";
    $query_run = mysqli_query($con, $query);
    $spongePrepared = $value;
    header("Location: surgery-checklist.php");

    $ret = "SELECT * FROM `in surgery tools` WHERE 1";
    $result = ($con->query($ret));
    $value = 0;
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $value = $row["Sponges In"] + 1;
    }
    if ($value < 0){
        $value = 0;
    }
    $query  = "UPDATE `in surgery tools` SET `Sponges In`='$value' WHERE 1";
    $query_run = mysqli_query($con, $query);
    $spongeIn = $value;
    
    }
    }
}

//this one controls when the needles in button is clicked, should add one to needles out patient and subtract one from
//needles in
elseif(isset($_POST['inNeedle_Out'])){
    $ret = "SELECT * FROM `in surgery tools` WHERE 1";
    $result = ($con->query($ret));
    $value = 0;
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $value = $row["Needles In"] - 1;
        }
    if ($value < 0) {
        $value = 0;
    }
    $query  = "UPDATE `in surgery tools` SET `Needles In`='$value' WHERE 1";
    $query_run = mysqli_query($con, $query);
    $needleIn = $value;
    header("Location: surgery-checklist.php");

    $ret = "SELECT * FROM `in surgery tools` WHERE 1";
    $result = ($con->query($ret));
    $value = 0;
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $value = $row["Needles Out"] + 1;
    }
    if ($value < 0){
        $value = 0;
    }
    $query  = "UPDATE `in surgery tools` SET `Needles Out`='$value' WHERE 1";
    $query_run = mysqli_query($con, $query);
    $needleOut = $value;
    
    }
    }
}

//this one controls when the sponges in button is clicked, should add one to sponges out patient and subtract one from
//sponges in
elseif(isset($_POST['inSponge_Out'])){
    $ret = "SELECT * FROM `in surgery tools` WHERE 1";
    $result = ($con->query($ret));
    $value = 0;
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $value = $row["Sponges In"] - 1;
        }
    if ($value < 0) {
        $value = 0;
    }
    $query  = "UPDATE `in surgery tools` SET `Sponges In`='$value' WHERE 1";
    $query_run = mysqli_query($con, $query);
    $needleIn = $value;
    header("Location: surgery-checklist.php");

    $ret = "SELECT * FROM `in surgery tools` WHERE 1";
    $result = ($con->query($ret));
    $value = 0;
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $value = $row["Sponges Out"] + 1;
    }
    if ($value < 0){
        $value = 0;
    }
    $query  = "UPDATE `in surgery tools` SET `Sponges Out`='$value' WHERE 1";
    $query_run = mysqli_query($con, $query);
    $needleOut = $value;
    
    }
    }
}