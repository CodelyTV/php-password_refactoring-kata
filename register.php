<html>
<head>
    <title>registration page - php salt and hash password - www.codeofaninja.com</title>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
</head>
<body>

<div id="loginForm">

    <?php
    // save the username and password
    if ($_POST) {

        try {
            // load database connection and password hasher library
            require 'libs/DbConnect.php';
            require 'libs/PasswordHash.php';

            /*
             * -prepare password to be saved
             * -concatinate the salt and entered password
             */
            $salt     = "ilovecodeofaninjabymikedalisay";
            $password = $salt . $_POST['password'];

            /*
             * '8' - base-2 logarithm of the iteration count used for password stretching
             * 'false' - do we require the hashes to be portable to older systems (less secure)?
             */
            $hasher   = new PasswordHash(8, false);
            $password = $hasher->HashPassword($password);

            // insert command
            $query = "INSERT INTO users SET email = ?, password = ?";

            $stmt = $con->prepare($query);

            $stmt->bindParam(1, $_POST['email']);
            $stmt->bindParam(2, $password);

            // execute the query
            if ($stmt->execute()) {
                echo "<div>Successful registration.</div>";
            } else {
                echo "<div>Unable to register. <a href='register.php'>Please try again.</a></div>";
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
            -required during registration
            -we are using HTML5 'email' type, 'required' keyword for a some validation, and a 'placeholder' for better UI
        -->
        <form action="register.php" method="post">

            <div id="formHeader">Registration Form</div>

            <div id="formBody">
                <div class="formField">
                    <input type="email" name="email" required placeholder="Email"/>
                </div>

                <div class="formField">
                    <input type="password" name="password" required placeholder="Password"/>
                </div>

                <div>
                    <input type="submit" value="Register" class="customButton"/>
                </div>
                <div id='userNotes'>
                    Already have an account? <a href='login.php'>Login</a>
                </div>
            </div>

        </form>

        <?php
    }
    ?>

</div>

</body>
</html>
