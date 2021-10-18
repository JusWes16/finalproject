<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/phpmotors.css" media="screen">
    <link rel="stylesheet" href="../css/normalize.css" media="screen">
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <title>Account Registration | PHP Motors</title>
</head>
<body>
    <div id="content">
        <header>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?> 
        </header>
        <nav>
            <?php echo $navList; ?>
        </nav>
        <main id="registration_page">
            <h1>Register</h1>
            <?php
                if(isset($message)){
                    echo "<p class='error_message'>$message</p>";
                    unset($message);
                }            
            ?>
            <form action="/phpmotors/accounts/index.php" method="post">
                <label for="clientFirstname">First Name<sup>*</sup></label>
                <input type="text" name="clientFirstname" id="clientFirstname" <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";}  ?> required>
                <label for="clientLastname">Last Name<sup>*</sup></label>
                <input type="text" name="clientLastname" id="clientLastname" <?php if(isset($clientLastname)){echo "value='$clientLastname'";}  ?> required>
                <label for="clientEmail">Email<sup>*</sup></label>
                <input type="email" name="clientEmail" id="clientEmail" <?php if(isset($clientEmail)){echo "value='$clientEmail'";}  ?> required>
                <label for="clientPassword">Password<sup>*</sup></label>
                <span>
                    Your password must be at least 8 characters and contain at 
                    least 1 uppercase character, 1 number and 1 special character
                </span>
                <input type="password" name="clientPassword" id="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                <input type="button" id="pswdBtn" value="Show Password">
                <input type="submit" name="submit" id="register_submit" value="Register">
                <input type="hidden" name="action" value="register">
            </form>
            <small><sup>*</sup> fields are required</small>
        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?> 
        </footer>
    </div>
    <script src="/phpmotors/js/library.js"></script>
</body>
</html>