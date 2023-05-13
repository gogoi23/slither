<?php
    $servername = "localhost";
    $username = "root";
    $password = "Devam123";
    $db = "web";
    $conn = mysqli_connect($servername, $username, $password, $db);

    if (!$conn) {
        echo "Error: Could not connect to database. " . mysqli_connect_error();
    }

    $queryString = "SELECT * FROM hisses";
    $queryEx = mysqli_query($conn, $queryString);
    $results = mysqli_fetch_all($queryEx, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Hisses</title>
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
            foreach ($results as $result) {
                echo '<div class="hiss">';
                echo '<p class="username">' . $result['username'] . '</p>';
                echo '<p class="hiss-text">' . $result['hiss'] . '</p>';
                echo '</div>';
            }
        ?>
    </body>
</html>
