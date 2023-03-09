<?php
session_start();
$conn = new mysqli("localhost", "root", "", "reglog") or die("Connect failed: %s\n". $conn -> error);

?>