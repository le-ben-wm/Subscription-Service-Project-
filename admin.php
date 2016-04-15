<?php
require_once('authorize.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <link rel="stylesheet" type="text/css" href="stylesheet1.css" />
</head>
<body>
<h2>Symphonia Users Administration</h2>
<p>Below is a list of all members who have subscribed to this service. <a href="removeuser.php">Remove a user</a></p>
<p>Send the customers an email. <a href="emailusers.php">Send an Email</a></p>
<hr />
​
<?php

$dbh = new PDO('mysql:host=localhost;dbname=sub_service', 'root', 'root');

// Retrieve the score data from MySQL
$query = "SELECT * FROM users ORDER BY date ASC";
$stmt = $dbh->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll();

// Loop through the array of score data, formatting it as HTML
echo '<table>';
echo '<tr><th>Name</th><th>Date Subscribed</th><th>Email</th><th>Address</th><th>Credit Card #</th></tr>';
foreach($result as $row) {
    echo '<tr><td>' . $row['fname'] . ' ' . $row['lname'] . '</td>';
    echo '<td>' . $row['date'] . '</td>';
    echo '<td>' . $row['email'] . '</td>';
    echo '<td>' . $row['address'] . ', ' . $row['city'] . ', ' . $row['state'] . ' ' . $row['zipcode'] . '</td>';
    echo '<td>' . str_repeat('*', strlen($row['ccard']) - 4) . substr($row['ccard'], -4) . '</td>';
}
echo '</table>';
?>
​
</body>
</html>
