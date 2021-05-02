<?php
$mysqli = new mysqli("mysql.eecs.ku.edu","xingtongzhang","eiFaez4r","xingtongzhang");
$UserN = $_POST["user"];
$content = $_POST["userPost"];
$Exist = FALSE;

if($mysqli->connect_errno)
{
     echo "<p>Connection Failed</p>";
     exit();
}

if ($UserN != "")
{
    if ($content != "")
    {
        $query = "SELECT user_id FROM Users";
        if($result = $mysqli->query($query))
        {
            while($row = $result->fetch_assoc())
            {

                if ($UserN == $row["user_id"])
                {
                    $Exist = TRUE;
                }
            }
            $result->free();
        }

        if ($Exist)
        {
            $query = "INSERT INTO Posts (content, author_id)
            VALUES ('$content', '$UserN')";
            if ($mysqli->query($query)==TRUE)
            {
                echo "<p>Added New Post</p><br>";
            }
            else
            {
                echo "<p>New Post Cannot be added</p><br>";
            }
        }
        else
        {
            echo "<p>Not Exist</p><br>";
        }
    }
    else
    {
        echo "<p>Cannot have a blank post.</p><br>";
    }
}
else
{
    echo "<p>Cannot have a blank username.</p><br>";
}

$mysqli->close();

?>