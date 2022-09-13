<?php

$conn= new mysqli("localhost","root","","network");
if ($conn->connect_error)
    echo $conn->error;


?>