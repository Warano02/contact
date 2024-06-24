<?php
$conn = mysqli_connect("localhost", "root", "", "calvinochat1.0");

if(!$conn){
    echo "An error occured while connecting to the database ! Try again leter";
}