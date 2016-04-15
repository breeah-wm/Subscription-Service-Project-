<html>
<head>
    <link href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/shift.css" rel="stylesheet">
    <link rel="stylesheet" href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/bootstrap.css">
    <link rel="stylesheet" href="sign%20in.css">
</head>
<body>
<div class="nav">
    <div class="container">
        <ul class="pull-left">
            <li><a href="homepage.html">Home</a></li>
            <li><a href="sign%20up.php">Sign In</a></li>
            <li><a href="contact.html">Contact</a></li>
        </ul>
        <ul class = "pull-right">
            <li><a href="subscription.html">Subscription</a></li>
            <li><a href="about.html">About</a></li>
        </ul>
    </div>
</header>
    </div>
<?php
$dbh = new PDO('mysql:host=localhost;dbname=subscription', 'root', 'root');
if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $fn = $_POST['fn'];
    $ln = $_POST['ln'];
    $password = $_POST['password'];
    $query = "INSERT INTO info (fn, ln, email, password, approve) VALUES ('$fn','$ln','$email','$password', 0) ";
    $stmt = $dbh->prepare($query);
    $result = $stmt->execute(
        array(
            'fn'       => $fn,
            'ln'       => $ln,
            'email'    => $email,
            'password' => $password,
        )
    );
    //Mail function of the code
    $from = 'breeah.dickey@west-mec.org';
    $subject = 'Your account';
    $text = 'Your account has been made. Have fun ordering tea!';
    $to = $email;
    $name =  $fn. $ln;
    $msg = "Dear $name.\n $text";
    mail($to,$subject,$msg, 'From:'. $from);
}
?>
<div class="form-wrap">
    <div class="tabs">
        <h3 class="signup-tab"><a class="active" href="sign%20up.php">Sign Up</a></h3>
        <h3 class="login-tab"><a href="sign%20in.html">Sign In</a></h3>
    </div>
    <div class="tabs-content">
        <div id="signup-tab-content" class="active">
            <form class="signup-form" action="" method="post">
                <input type="text" class="input" id="fn" name="fn" autocomplete="off" placeholder="First Name">
                <input type="text" class="input" id="ln" name="ln" autocomplete="off" placeholder="Last Name">
                <input type="email" class="input" id="email" name="email" autocomplete="off" placeholder="Email">
                <input type="password" class="input" id="password" name="password" autocomplete="off" placeholder="Password">
                <input type="submit" name="submit" class="button" value="Sign Up">
            </form>
        </div>
    </div>
</div>
<a href="admin.php">Admin Page</a>
</body>
</html>