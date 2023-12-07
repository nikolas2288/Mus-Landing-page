<?php 
include("includes/config.php");
include("includes/classes/Account.php");
include("includes/classes/Constants.php");
$account = new Account($con);
include("includes/handlers/reg-handler.php");
include("includes/handlers/log-handler.php");

function getInputValue($name) {
    if (isset($_POST[$name])) {
        echo $_POST[$name];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Music landing Page</title>
    <link rel="stylesheet" type="text/css" href="assests/css/register.css" >
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="assests/js/register.js"></script>
</head>
<body>
    <?php 
    if (isset($_POST['regButton'])) {
        echo '<script>
                $(document).ready(function(){
                    $("#loginForm").hide();         
                    $("#regForm").show();
                })
            </script>';
    }
    else {
        echo '<script>
                $(document).ready(function(){
                    $("#loginForm").show();         
                    $("#regForm").hide();
                })
            </script>';
    }
    ?>
    
    <div id="background">
        <div class="loginContainer">
            <div id="container">
                <form action="register.php" id="loginForm"  method="POST">
                    <h2>Login to youre account</h2>
                    <p>
                        <label for="loginUsername">Username</label>
                        <input id="loginUsername" name="loginUsername" type="text" value="<?php getInputValue('loginUsername'); ?>" >
                        <?php echo $account->getError(Constant::$loginFailed); ?>
                    </p>
                    <p>
                        <label for="loginPassword">Password</label>
                        <input id="loginPassword" name="loginPassword" type="password" >
                    </p>
                    <button type="submit" name="loginButton">LOG IN</button>
                    <div class="hasAccountText">
                        <span id="hideLogin">Don't have an account yet? Signup here.</span>
                    </div>
                </form>

                <form action="register.php" id="regForm"  method="POST">
                    <h2>Create a new Account</h2>
                    <p>
                        <label for="regUserName">Username</label>
                        <input value="<?php echo getInputValue('regUserName'); ?>" id="regUserName" name="regUserName" type="text" requared>
                        <?php echo $account->getError(Constant::$usernameDoNotMuch); ?>
                        <?php echo $account->getError(Constant::$usernameTaken); ?>
                    </p>
                    <p>
                        <label for="regFirstName">First Name</label>
                        <input value="<?php echo getInputValue('regFirstName');?>" id="regFirstName" name="regFirstName" type="text" requared>
                        <?php echo $account->getError(Constant::$firstNameDoNotMuch); ?>
                    </p>
                    <p>
                        <label for="regLastName">Last Name</label>
                        <input value="<?php echo getInputValue('regLastName'); ?>" id="regLastName" name="regLastName" type="text" requared>
                        <?php echo $account->getError(Constant::$lastNameDoNotMuch); ?>
                    </p>
                    <p>
                        <label for="regEmail">Email</label>
                        <input value="<?php echo getInputValue('regEmail'); ?>" id="regEmail" name="regEmail" type="email" requared>
                        <?php echo $account->getError(Constant::$emailDoNotMuch); ?>
                        <?php echo $account->getError(Constant::$emailTaken); ?>
                    </p>
                    <p>
                        <label for="regPassword">Password</label>
                        <input id="regPassword" name="regPassword" type="password" /*value="asdasdasd2"*/ requared>
                        <?php echo $account->getError(Constant::$passwordDoNotMuch); ?>
                        <?php echo $account->getError(Constant::$passwordContain); ?>
                        <?php echo $account->getError(Constant::$passwordCharacter); ?>
                    </p>
                    <p>
                        <label for="regPassword2">Confirm Password</label>
                        <input id="regPassword2" name="regPassword2" type="password" /*value="asdasdasd2"*/ requared>
                    </p>
                    <button type="submit" name="regButton">SIGN UP</button>
                    <div class="hasAccountText">
                        <span id="hideRegister">Already have an account? Log here.</span>
                    </div>
                </form>
            </div>
            <div id="loginText">
                <h1>Get great music, right now</h1>
                <h2>Listen to loads of songs for free</h2>
                <ul>
                    <li>Discover music you'll fall in love with</li>
                    <li>Create youre own playlists</li>
                    <li>Follow artists to keep up to date</li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>