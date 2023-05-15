<!--this page displays all the tweets in the data base -->
<?php
    //these are the credentials to log into the data base 
    $servername = "localhost";
    $username = "root";
    $password = "Devam123";
    $db = "web";
    $conn = mysqli_connect($servername, $username, $password, $db);
    
    //this checks if the connection to the data base works 
    if (!$conn) {
        echo "Error: Could not connect to database. " . mysqli_connect_error();
    }
    
    //this gets all the tweets from the data base and stores it in $results
    $queryString = "SELECT * FROM hisses";
    $queryEx = mysqli_query($conn, $queryString);
    $results = mysqli_fetch_all($queryEx, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Hisses</title>
        
        //this is the style portion for the view tweets page. 
        <style>
            /* CSS styles for the page */
            body {
                font-family: Arial, sans-serif;
                background-color: #f0f0f0;
            }
            .hiss {
                background-color: #fff;
                border: 1px solid #ddd;
                padding: 10px;
                margin-bottom: 10px;
            }
            .username {
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <h1>Hisses</h1>
        <?php
            //this for loop interates through every tweet stored in results. 
            foreach ($results as $result) {
                //this displays the username and text of the current tweet in the forloop
                
                echo '<div class="hiss">';
                echo '<p class="username">' . $result['username'] . '</p>';
                echo '<p class="hiss-text">' . $result['hiss'] . '</p>';
                echo '</div>';
            }
        ?>
    </body>
</html>
