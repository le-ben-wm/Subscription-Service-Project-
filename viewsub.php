<?php
require_once('connection.php');
if (isset($_POST['submit'])) {
    $dbh = new PDO('mysql:host=localhost;dbname=sub_service', 'root', 'root');
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (!empty($email) && !empty($password)) {
        $query = "SELECT * FROM users WHERE email = :email, password = :password LIMIT 1";
        $stmt = $dbh->prepare($query);
        $stmt->execute(array('email' => $email, 'password' => $password));
        $result = $stmt->fetchAll();
        echo '<table>';
        echo '<tr><th>Name</th><th>Date Subscribed</th><th>Email</th><th>Address</th><th>Credit Card #</th></tr>';
        foreach($result as $row) {
            echo '<tr><td>' . $row['fname'] . ' ' . $row['lname'] . '</td>';
            echo '<td>' . $row['date'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' . $row['address'] . ', ' . $row['city'] . ', ' . $row['state'] . ' ' . $row['zipcode'] . '</td>';
            echo '<td>' . str_repeat('*', strlen($row['ccard']) - 4) . substr($row['ccard'], -4) . '</td></tr>';
        }
        echo '</table>';
    }
    else {
        echo '<p>There was a problem processing your request</p>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<div id="checksub"
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Enter your email and password to check your subscription
    <input type="text" name="email" id="email" placeholder="Email" /><br>
    <input type="text" name="pword" id="pword" placeholder="Password" /><br>
    <input type="submit" value="Submit" name="submit">
</form>
</body>
</html>
