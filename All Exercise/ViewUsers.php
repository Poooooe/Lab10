<?php
$mysqli = new mysqli("mysql.eecs.ku.edu","xingtongzhang","eiFaez4r","xingtongzhang");
if($mysqli->connect_errno)
{
     echo "<p>Connection Failed</p>";
     exit();
}

$query = "SELECT user_id FROM Users";

if($result = $mysqli->query($query))
{
    echo "<table border=\"1\">";
    echo "<tr><td><b>Users:</b></td></tr><br>";
    while($row = $result->fetch_assoc())
    {
        echo "<tr><td>".$row["user_id"]."</td></tr><br>";
    }

    $result->free();
}

$mysqli->close();

?>