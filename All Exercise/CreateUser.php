<?php
$mysqli = new mysqli("mysql.eecs.ku.edu","xingtongzhang","eiFaez4r","xingtongzhang");
$newUser = $_POST["user"];
$Exist = FALSE;

if($mysqli->connect_errno)
{
     echo "<p>Connection Failed</p>";
     exit();
}

$query = "SELECT user_id FROM Users";

if ($newUser != "")
{
    if($result = $mysqli->query($query))
    {
        while($row = $result->fetch_assoc())
        {
            if ($newUser == $row["user_id"])
            {
                $Exist = TRUE;
            }
        }

        $result->free();
    }
    if(!$Exist)
    {
        $query = "INSERT INTO Users (user_id) VALUES ('$newUser')";
     
        if($mysqli->query($query) == TRUE)
        {
            echo "<p>Added New Username</p>";
        }
        else
        {
            echo "<p>New Username not added</p>";
        }
     }
}
else
{
    echo "<p>Cannot have a blank username</p><br>";
}

$mysqli->close();

?>