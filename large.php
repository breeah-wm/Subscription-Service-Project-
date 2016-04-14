<html>
<head>
    <link href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/shift.css" rel="stylesheet">
    <link rel="stylesheet" href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/bootstrap.css">
    <link rel="stylesheet" href="large.css">
</head>
<body>
<div class="nav">
    <div class="container">
        <ul class="pull-left">
            <li><a href="homepage.html">Home</a></li>
            <li><a href="sign%20in.html">Sign In</a></li>
            <li><a href="contact.html">Contact</a></li>
        </ul>
        <ul class = "pull-right">
            <li><a href="subscription.html">Subscription</a></li>
            <li><a href="about.html">About</a></li>
        </ul>
    </div>
</div>
<center><section>
        <img src="http://i.imgur.com/zDXn4jM.png" alt="Medium Subscription">
        <h1>Large Subscription Box</h1>
        <h2>The Large Box comes with our seven most popular flavors:</h2>
        <h2><li>French Caramel Bean</li></h2>
        <h2><li>Vanilla Bean</li></h2>
        <h2><li>Pumpkin Spice</li></h2>
        <h2><li>Mocha</li></h2>
        <h2><li>Caramel Macchiato</li></h2>
        <h2><li>Hazlenut</li></h2>
        <h2><li>Butterscotch Cream</li></h2>
        <h3>The Large box comes with </h3>
    </section></center>


<?php
if(isset($_POST['submit'])) {
    try {
        $dbh = new PDO('mysql:host=127.0.0.1;dbname=subscription', 'root', 'root');
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
        echo $e->getMessage();
        die();
    }
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $query = "INSERT INTO `order` (`name`, `address`, `email`)
              VALUES(:name,:address,:email) ";
    $stmt = $dbh->prepare($query);
    $result = $stmt->execute(
        array(
            'name'        => $name,
            'address'     => $address,
            'email'       =>$email,
        )
    );
    if(!$result) {
        die('Error');
    }
}
?>
<center><section id="section2">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input id="name" name="name" placeholder="Full Name">
            <input id="address" name="address" placeholder="Address">
            <input id="email" name="email" placeholder="Email">
            <input id="submit" type="submit" value="Order">
        </form>
    </section></center>
</body>
</html>