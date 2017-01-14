<html>
<head>
    <title>login page - php salt and hash password - www.codeofaninja.com</title>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
</head>
<body>
<div id="loginForm">
<?php
// form is submitted, check if acess will be granted
if ($_POST) {

    try {
        // load database connection and password hasher library
        require 'libs/DbConnect.php';
        require 'libs/PasswordHash.php';

        // prepare query
        $query = "select email, password from users where email = ? limit 0,1";
        $stmt  = $con->prepare($query);

        // this will represent the first question mark
        $stmt->bindParam(1, $_POST['email']);

        // execute our query
        $stmt->execute();

        // count the rows returned
        $num = $stmt->rowCount();

        if ($num == 1) {

            //store retrieved row to a 'row' variable
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // hashed password saved in the database
            $storedPassword = $row['password'];

            // salt and entered password by the user
            $salt                 = "ilovecodeofaninjabymikedalisay";
            $postedPassword       = $_POST['password'];
            $saltedPostedPassword = $salt . $postedPassword;

            // instantiate PasswordHash to check if it is a valid password
            $hasher = new PasswordHash(8, false);
            $check  = $hasher->CheckPassword($saltedPostedPassword, $storedPassword);

            /*
             * access granted, for the next steps,
             * you may use my php login script with php sessions tutorial :)
             */
            if ($check) {
                echo "<div>Access granted.</div>";
            } // $check variable is false, access denied.
            else {
                echo "<div>Access denied. <a href='login.php'>Back.</a></div>";
            }
        } // no rows returned, access denied
        else {
            echo "<div>Access denied. <a href='login.php'>Back.</a></div>";
        }
    } //to handle error
    catch (PDOException $exception) {
        echo "Error: " . $exception->getMessage();
    }
} // show the registration form
else {
    ?>
    <!--
        -where the user will enter his email and password
        -required during login
        -we are using HTML5 'email' type, 'required' keyword for a some validation, and a 'placeholder' for better UI
    -->
    <form action="login.php" method="post">

        <div id="formHeader">Website Login</div>

        <div id="formBody">
            <div class="formField">
                <input type="email" name="email" required placeholder="Email"/>
            </div>

            <div class="formField">
                <input type="password" name="password" required placeholder="Password"/>
            </div>

            <div>
                <input type="submit" value="Login" class="customButton"/>
            </div>
        </div>
        <div id='userNotes'>
            New here? <a href='register.php'>Register for free</a>
        </div>
    </form>

    <?php
}
?>

</div>
</body>
</html>
