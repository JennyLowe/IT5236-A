<?php
# Start a session
session_start();

$sessionToken = $_SESSION['token'];
$cookieToken = $_COOKIE['token'];

if ($sessionToken != $cookieToken) {
    header('Location: login.php');
    exit;
}

# Define an error flag
$wsError = false;

# Specify the url of the web service and initialize
$url = 'https://n912kizrm9.execute-api.us-east-2.amazonaws.com/prod/GetAllShoppingItems';
$handle = curl_init($url);
curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);

# Get the response from the web service
$response = curl_exec($handle);

# Check the HTTP response code
$httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
if($httpCode == 200) {
        # A good response code means we can parse the JSON
        $items = json_decode($response, true);
} else {
        # A bad response code means we should display an error message
        $wsError = true;
}

?>

<!doctype html>
<html>
        <head>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Shopping List</title>
        </head>
        <body style="font-size: 4vw">
                <h1 style="font-size: 6vw">My Shopping List</h1>
                <hr>
                <?php if($wsError) { ?>
                        Error connecting to web service
                <?php } else { ?>
                        <h2>Shopping Items</h2>
                        <?php
                        # This web service returns a list, so...
                        # Loop thru each item in the list
                        foreach($items as $item) {
                                echo "<div>";
                                echo "<!--". $item['ItemID'] . "-->";
                                echo '<br>';
                                echo $item['DateAdded'];
                                echo '<br>';
                                echo $item['Description'];
                                echo '<br>';
                                echo $item['InStock'];
                                echo '<br>';
                                echo $item['ItemName'];
                                echo '<br>';
                                echo $item['Price'];
                                echo '<br>';
                                echo $item['Quantity'];
                                echo '</div>';
                                echo '<hr>';
                        }
                }
                ?>
</body>
