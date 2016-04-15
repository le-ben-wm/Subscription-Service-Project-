<?php
require_once ('connection.php');
if (isset($_POST['submit'])) {
    $dbh = new PDO('mysql:host=localhost;dbname=sub_service', 'root', 'root');
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zipcode = $_POST['zipcode'];
    $cardtype = $_POST['cardtype'];
    $ccard = $_POST['ccard'];
    $expdate = $_POST['expdate'];
    $cvv = $_POST['cvv'];
    if (!empty($fname) &&
        !empty($lname) &&
        !empty($email) &&
        !empty($password) &&
        !empty($address) &&
        !empty($city) &&
        !empty($state) &&
        !empty($zipcode) &&
        !empty($ccard) &&
        !empty($cardtype) &&
        !empty($expdate) &&
        !empty($cvv)) {

        $query = "INSERT INTO users VALUES (0, NOW(), :fname, :lname, :email, :password, :address, :city, :state, :zipcode, :ccard, :cardtype, :cvv, :expdate)";
        $stmt = $dbh->prepare($query);
        $result = $stmt->execute(
            array(
                'fname' => $fname,
                'lname' => $lname,
                'email' => $email,
                'password' => $password,
                'address' => $address,
                'city' => $city,
                'state' => $state,
                'zipcode' => $zipcode,
                'cardtype' => $cardtype,
                'ccard' => $ccard,
                'expdate' => $expdate,
                'cvv' => $cvv,
            ));
        echo '<p>You have successfully registered for PRODUCT NAME</p>';
        echo '<p><a href="viewsub.php">View your subscription</a></p>';
    }

    else{
        echo '<p>An error has occurred, please try again.</p>';
    };
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Symphonia</title>
    <link rel="stylesheet" type="text/css" href="stylesheet1.css" />
</head>
<body>
<div id="register">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="text" name="fname" id="fname" placeholder="First Name"><br>
        <input type="text" name="lname" id="lname" placeholder="Last Name"><br>
        <input type="text" name="email" id="email" placeholder="Email"><br>
        <input type="password" name="pword" id="pword" placeholder="Password"><br>
        <input type="text" name="address" id="address" placeholder="Street Address"><br>
        <input type="text" name="city" id="city" placeholder="City">
        <select name="state">
            <option value="" disabled selected class="placeholder">State</option>
            <option value="Alabama">Alabama</option>
            <option value="Alaska">Alaska</option>
            <option value="Arizona">Arizona</option>
            <option value="Arkansas">Arkansas</option>
            <option value="California">California</option>
            <option value="Colorado">Colorado</option>
            <option value="Connecticut">Connecticut</option>
            <option value="Delaware">Deleware</option>
            <option value="Florida">Florida</option>
            <option value="Georgia">Georgia</option>
            <option value="Hawaii">Hawaii</option>
            <option value="Idaho">Idaho</option>
            <option value="Illinois">Illinois</option>
            <option value="Indiana">Indiana</option>
            <option value="Iowa">Iowa</option>
            <option value="Kansas">Kansas</option>
            <option value="Kentucky">Kentucky</option>
            <option value="Louisiana">Louisiana</option>
            <option value="Maine">Maine</option>
            <option value="Maryland">Maryland</option>
            <option value="Massachusetts">Massachusetts</option>
            <option value="Michigan">Michigan</option>
            <option value="Minnesota">Minnesota</option>
            <option value="Mississippi">Mississippi</option>
            <option value="Missouri">Missouri</option>
            <option value="Montana">Montana</option>
            <option value="Nebraska">Nebraska</option>
            <option value="Nevada">Nevada</option>
            <option value="New Hampshire">New Hampshire</option>
            <option value="New Jersey">New Jersey</option>
            <option value="New Mexico">New Mexico</option>
            <option value="New York">New York</option>
            <option value="North Carolina">North Carolina</option>
            <option value="North Dakota">North Dakota</option>
            <option value="Ohio">Ohio</option>
            <option value="Oklahoma">Oklahoma</option>
            <option value="Oregon">Oregon</option>
            <option value="Pennsylvania">Pennsylvania</option>
            <option value="Rhode Island">Rhode Island</option>
            <option value="South Carolina">South Carolina</option>
            <option value="South Dakota">South Dakota</option>
            <option value="Tennessee">Tennessee</option>
            <option value="Texas">Texas</option>
            <option value="Utah">Utah</option>
            <option value="Vermont">Vermont</option>
            <option value="Virginia">Virginia</option>
            <option value="Washington">Washington</option>
            <option value="West Virginia">West Virginia</option>
            <option value="Wisconsin">Wisconson</option>
            <option value="Wyoming">Wyoming</option>
        </select>
        <input type="number" name="zipcode" id="zipcode" placeholder="Zip/Postal Code" maxlength="5"><br>
        <select name="cardtype">
            <option value="" disabled selected class="placeholder">Card Type</option>
            <option value="American Express">American Express</option>
            <option value="Discover">Discover</option>
            <option value="Mastercard">Mastercard</option>
            <option value="Visa">Visa</option>
        </select><br>
        <input type="number" name="ccard" id="ccard" placeholder="Credit Card Number"><br>
        <input type="number" name='expdate' maxlength="4" placeholder="Exp. Date (mmyy)">
        <input type="number" name="cvv" id="cvv" placeholder="CVV" maxlength="4"><br>
        <input type="submit" value="Sign Up" name="submit" />
    </form>
</div>
</body>
</html>