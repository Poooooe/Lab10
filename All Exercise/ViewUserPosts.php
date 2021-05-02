<?php
$mysqli = new mysqli("mysql.eecs.ku.edu","xingtongzhang","eiFaez4r","xingtongzhang");
$username = $_POST["username"];
if($mysqli->connect_errno)
{
     echo "<p>Connection Failed</p>";
     exit();
}

$query = "SELECT content FROM Posts WHERE author_id ='$username'";

if($result = $mysqli->query($query))
{
    echo "<p>Query worked</p><br>";
    echo "<table border=\"1\">";
    echo "<tr><td>".$username."'s Posts:</td></tr><br>";
    while($row = $result->fetch_assoc())
    {
        echo "<tr><td>".$row["content"]."</td></tr><br>";
    }

    $result->free();
}
else
{
    echo "<p>Query did not work</p>";
}

$mysqli->close();
?>