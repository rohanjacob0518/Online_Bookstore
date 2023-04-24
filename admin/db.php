<?php
$conn=mysqli_connect("localhost","root","","booksdb");
if(mysqli_connect_error())
{
    echo"Failed to connect to Mysql:".mysqli_connect_error();
}
?>