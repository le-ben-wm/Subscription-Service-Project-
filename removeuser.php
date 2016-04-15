<html>
<head>
    <title>Symphonia</title>
</head>
<body>

<h1>Enter an email address to remove from the subscription service.</h1>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <fieldset>
        <label for="email">Email address:</label><br />
        <input id="email" name="email" type="text" size="30" /><br />
        <input type="submit" name="Remove" value="submit" />
    </fieldset>
</form>

<?php

if (isset($_POST['Remove'])) {

    $dbh = new PDO('mysql:host=localhost;dbname=sub_service', 'root', 'root');

    $email = $_POST['email'];

    if (!empty($email)) {

            $query = "DELETE FROM users WHERE email = :email";
            $stmt = $dbh->prepare($query);
            $stmt->execute(array('email' => $email));

            echo '<p style="color: red">Customer has been removed from the Symphonia subscription service: ' . $email . '</p>';
        }

    else {
        echo '<p style="color: red">Please enter an email</p>';
    }
}
?>

</body>
</html>