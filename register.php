<?php 
include("includes/config.php");
include("includes/classes/Account.php");
include("includes/classes/Constants.php");
$account = new Account($con);
include("includes/handlers/log-handler.php");
include("includes/handlers/reg-handler.php");

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
</head>
<body>
    <div class="container">
        <form action="register.php" id="loginForm"  method="POST">
            <h2>Login to youre account</h2>
            <p>
                <label for="loginName">Username</label>
                <input id="loginName" name="loginName" type="text" >
            </p>
            <p>
                <label for="loginPassword">Password</label>
                <input id="loginPassword" name="loginPassword" type="password" >
            </p>
            <button type="submit" name="logButton">LOG IN</button>
        </form>
        <form action="register.php" id="regForm"  method="POST">
            <h2>Create a new Account</h2>
            <p>
                <?php echo $account->getError(Constant::$usernameDoNotMuch); ?>
                <label for="regUserName">Username</label>
                <input value="<?php echo getInputValue('regUserName'); ?>" id="regUserName" name="regUserName" type="text" requared>
            </p>
            <p>
                <?php echo $account->getError(Constant::$firstNameDoNotMuch); ?>
                <label for="regFirstName">First Name</label>
                <input value="<?php echo getInputValue('regFirstName');?>" id="regFirstName" name="regFirstName" type="text" requared>
            </p>
            <p>
                <?php echo $account->getError(Constant::$lastNameDoNotMuch); ?>
                <label for="regLastName">Last Name</label>
                <input value="<?php echo getInputValue('regLastName'); ?>" id="regLastName" name="regLastName" type="text" requared>
            </p>
            <p>
                <?php echo $account->getError(Constant::$emailDoNotMuch); ?>
                <label for="regEmail">Email</label>
                <input value="<?php echo getInputValue('regEmail'); ?>" id="regEmail" name="regEmail" type="email" requared>
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
        </form>
    </div>
</body>
</html>