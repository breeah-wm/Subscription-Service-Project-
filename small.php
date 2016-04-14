<html>
<head>
    <link href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/shift.css" rel="stylesheet">
    <link rel="stylesheet" href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/bootstrap.css">
    <link rel="stylesheet" href="small.css">
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
    <img src="http://i.imgur.com/urTdfUf.png" alt="Small Subscription">
    <h1>Small Subscription Box</h1>
    <h2>The Small Box comes with our three most popular flavors:</h2>
    <h2><li>French Caramel Bean</li></h2>
    <h2><li>Vanilla Bean</li></h2>
    <h2><li>Pumpkin Spice</li></h2>
    <h3>The small box comes with </h3>
</section></center>


<?php
$dbh = new PDO('mysql:host=localhost;dbname=subscription', 'root', 'root');
if(isset($_POST['submit'])) {
    $full_name = $_POST['full_name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $price = $_POST['price'];
    $query = "INSERT INTO orders (full_name, address, email, price) VALUES ('$full_name','$address','$email','$price') ";
    $stmt = $dbh->prepare($query);
    $result = $stmt->execute(
        array(
            'full_name'        => $full_name,
            'address'     => $address,
            'email'       => $email,
            'price'       => $price,
        )
    );
    //Mail function of the code
    $from = 'breeah.dickey@west-mec.org';
    $subject = 'Your order';
    $text = 'Your order has been received. You can expect in the time from of the 20th to the 25th of the current month.';
    $to = $email;
    $name =  $full_name;
    $msg = "Dear $name.\n $text";
    mail($to,$subject,$msg, 'From:'. $from);
}
?>
<center><section id="section2">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input id="full_name" name="full_name" placeholder="Full Name">
        <input id="address" name="address" placeholder="Address">
        <input id="email" name="email" placeholder="Email">
        <input id="price" name="price" type="hidden" value="14.99">
        <input id="submit" type="submit" value="Order">
    </form>
</section></center>
</body>
</html>